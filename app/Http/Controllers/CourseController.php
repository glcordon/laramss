<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Cohensive\Embed\Facades\Embed;
use Illuminate\Support\Facades\Storage;
use Vimeo\Laravel\Facades\Vimeo;

class CourseController extends Controller
{
    public function show(Course $course)
    {
       
        return view('course.show', compact('course'));
    }
    public function create(Request $request){
        $thumb_path = Storage::disk('public')->put('thumbs',$request->course_thumb);
        if($request->course_intro_youtube)
        {
            $embed= Embed::make($request->course_intro_youtube)->parseUrl();
            if ($embed) {
                // Set width of the embed.
                $embed->setAttribute(['width' => 600]);
            
                // Print html: '<iframe width="600" height="338" src="//www.youtube.com/embed/uifYHNyH-jA" frameborder="0" allowfullscreen></iframe>'.
                // Height will be set automatically based on provider width/height ratio.
                // Height could be set explicitly via setAttr() method.
                $intro_path = $embed->getHtml();
            }
        }else{
            $video = Vimeo::upload($request->file('course_intro'), [
                'name' => $request->course_title,
                'privacy' => [
                    'view' => 'anybody'
                    ]
                    ]);
                    
            $videoData =  Vimeo::request($video, ['per_page' => 1], 'GET');
            $intro_path =$videoData['body']['embed']['html'];
        }
        $course = new Course;
        $course->course_name = $request->course_name;
        $course->course_thumb = $thumb_path;
        $course->course_description = $request->course_description;
        $course->save();
        
        $course->video()->create(['video_url' => $intro_path]);
        
        return redirect('/course/'. $course->id . '/course/');

    }
    public function list()
    {
        $courses = Course::get();
        return view('course.list', compact('courses'));
    }
    public function edit(Course $course)
    {
        return view('course.create', compact('course'));
    }
    public function delete(Course $course)
    {
        $course->lesson()->delete();
        $course->delete();
        return redirect('/list');
    }
}
