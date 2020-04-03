@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex">
        <div id="lessons" class="col-md-4">
            <button class="btn btn-lg btn-dark mb-1" data-toggle="modal" data-target="#exampleModal">Add New Lesson</button><br>
                <a href="/course/{{ $course->id }}/course" id="lesson" class="btn text-left w-100 p-3">Introduction</a>
            @foreach($course->lesson as $lessons)
                <div class="d-flex my-1" style="border:1px solid #ababab">
                    <a href="/lesson/{{$lessons->id}}/delete" class="btn btn-sm p-2 btn-danger mr-1" data-id="{{ $lessons->id }}" id="delete_lesson">X</a> 
                    <a href="/lesson/{{$lessons->id}}/edit" class="btn btn-sm p-2 btn-warning" data-id="{{ $lessons->id }}" id="edit_lesson">E</a> 
                    <a href="/course/{{ $course->id }}/lesson/{{ $lessons->id }}" id="lesson" class="btn p-3 text-left w-100">{{ $lessons->lesson_title }}</a>
                    
                </div> 
            @endforeach
        </div>
        <div class="col-8">
            @if(!isset($lesson))
                <h1>{{ $course->course_name }}</h1>
                {{--  <img src="{{ tenant_asset($course->course_thumb) }}" style="width:300px" alt=""> <br>  --}}
                {!! $course->video->video_url !!} <br>
                {{ $course->course_description }} <br><br>
           @else
                <h1>{{ $lesson->lesson_title }}</h1>
                {!! $lesson->video->video_url ?? $lesson->lesson_video !!} <br>
                {{ $lesson->lesson_description }} <br><br>

           @endif
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="/add-lesson" enctype="multipart/form-data" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="course_id" value="{{$course->id}}">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add New Lesson</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group row">
                  <label for="lesson_title" class="col-md-4 col-form-label text-md-right">{{ __('Lesson Title') }}</label>
      
                  <div class="col-md-6">
                      <input id="name" type="text" class="form-control @error('lesson_title') is-invalid @enderror" name="lesson_title" value="{{ old('lesson_title') }}" required autocomplete="name" autofocus>
      
                      @error('lesson_title')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div class="form-group row">
                  <label for="course_intro" class="col-md-4 col-form-label text-md-right">{{ __('Lesson Video') }}</label>
      
                  <div class="col-md-6">
                      {{--  <input type="checkbox" id="switch_type" checked name="upload">Upload<br />  --}}
      
                      <input id="lesson_video"  type="file" class="form-control @error('course_intro') is-invalid @enderror" name="lesson_video" value="{{ old('lesson_video') }}" >
                      <small><em>The Youtube link will be used if it is populated instead of the file upload</em></small>
                      <input id="lesson_video_youtube" placeholder="Copy Youtube URL Here" type="text" class="form-control @error('lesson_video_youtube') is-invalid @enderror" name="lesson_video_youtube" value="{{ old('lesson_video_youtube') }}">
                      
                      @error('lesson_video')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div class="form-group row">
                  <label for="lesson_description" class="col-md-4 col-form-label text-md-right">{{ __('Lesson description') }}</label>
      
                  <div class="col-md-6">
                      <textarea id="lesson_description" type="file"  accept="video/*" class="form-control @error('lesson_description') is-invalid @enderror" name="lesson_description"> {{ old('lesson_description') }}</textarea>
      
                      @error('lesson_description')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
            </div>
            {{ csrf_token() }}
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
    </form>
</div>
@endsection
@push('scripts')

<script>
    $(document).ready(function(){

       // $(document).on('click', '#delete_lesson', function(e)
       //     {
       //         e.preventDefault();
       //         var id = $(this).attr('data-id')
       //         axios.post('/lesson/'+id+'/delete', {
       //             id: id,
       //             _token: '{{ csrf_token() }}'
       //           })
       //           .then(function (response) {
       //               $(this).parent().fadeOut()
       //             console.log(response);
       //           })
       //           .catch(function (error) {
       //             console
       //     })
       //     })

    })


 </script>
@endpush
