<?php

namespace App\Http\Controllers;

use App\Course;
use App\Lesson;
use Illuminate\Http\Request;
use Vimeo\Laravel\Facades\Vimeo;
use Cohensive\Embed\Facades\Embed;
use Illuminate\Support\Facades\Storage;


class LessonController extends Controller
{
    public function add(Request $request)
    {
        $course = Course::findOrFail($request->course_id);
        if($request->lesson_video_youtube)
        {
            $embed= Embed::make($request->lesson_video_youtube)->parseUrl();
            if ($embed) {
                // Set width of the embed.
                $embed->setAttribute(['width' => 600]);
            
                // Print html: '<iframe width="600" height="338" src="//www.youtube.com/embed/uifYHNyH-jA" frameborder="0" allowfullscreen></iframe>'.
                // Height will be set automatically based on provider width/height ratio.
                // Height could be set explicitly via setAttr() method.
                $intro_path = $embed->getHtml();
            }
        }else{
            $video = Vimeo::upload($request->file('lesson_video'), [
                'name' => $request->lesson_title,
                'privacy' => [
                    'view' => 'anybody'
                    ]
                    ]);
                    
            $videoData =  Vimeo::request($video, ['per_page' => 1], 'GET');
            $intro_path =$videoData['body']['embed']['html'];
        }
        $lesson = new Lesson;
        $lesson->lesson_title = $request->lesson_title;
        $lesson->lesson_video = $intro_path;
        $lesson->lesson_description = $request->lesson_description;
        $course->lesson()->create($lesson->toArray());
        $lesson->video()->create(['video_url' => $intro_path]);
        return redirect()->back();
    }

    public function show(Course $course, Lesson $lesson)
    {
        return view('course.show', compact('course', 'lesson'));
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();
        return redirect('/course/'.$lesson->course->id.'/course');
    }
}
