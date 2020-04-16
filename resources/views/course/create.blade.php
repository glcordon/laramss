@extends('layouts.app')

@section('content')
<div class="container pt-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ isset($course) ? __('Edit Course -') . $course->course_name  : __('Add Course')  }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('create-course') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="course_name" class="col-md-4 col-form-label text-md-right">{{ __('Course Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('course_name') is-invalid @enderror" name="course_name" value="{{ $course->course_name ?? old('course_name') }}" required autocomplete="name" autofocus>

                                @error('course_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="course_intro" class="col-md-4 col-form-label text-md-right">{{ __('Course Intro Video') }}</label>

                            <div class="col-md-6">
                                {{--  <input type="checkbox" id="switch_type" checked name="upload">Upload<br />  --}}

                                <input id="course_intro"  type="file" class="form-control @error('course_intro') is-invalid @enderror" name="course_intro" value="{{ old('course_intro') }}"  accept="video/*">
                                <small><em>The Youtube/Vimeo link will be used if it is populated instead of the file upload</em></small>
                                <input id="course_intro_youtube" placeholder="Copy Youtube/Vimeo URL Here" type="text" class="form-control @error('course_intro') is-invalid @enderror" name="course_intro_youtube" value="{{ old('course_intro') }}">
                                
                                @error('course_intro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="course_thumb" class="col-md-4 col-form-label text-md-right">{{ __('Course thumb') }}</label>

                            <div class="col-md-6">
                                @if(isset($course))
                                <img src="{{ tenant_asset($course->course_thumb) }}" style="width:300px" alt=""> <br>
                                @endif
                                <input id="course_thumb" type="file" class="form-control @error('course_thum') is-invalid @enderror" name="course_thumb" value="{{ old('course_thumb') }}" required autocomplete="text"  accept="image/*">
                                @error('course_thumb')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="course_description" class="col-md-4 col-form-label text-md-right">{{ __('Course description') }}</label>

                            <div class="col-md-6">
                                <textarea id="course_description" type="file" class="form-control @error('course_description') is-invalid @enderror" name="course_description"> {{ $course->course_description ?? old('course_description') }}</textarea>

                                @error('course_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Course') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')

<script type='text/javascript'>
    $(function()
    {
        $("#switch_type").click(function(){
            $('#course_type').prop('type', 'text');
            if($(this).is(':checked'))
            {
                $('#course_intro').prop('type', 'file');
    
            }
     
       });

    })
    </script>
@endpush
