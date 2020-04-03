@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex flex-wrap">
       @foreach ($courses as $course)
            <div class="course p-4 text-lg-center">
                <a href="/course/{{$course->id}}/course">
                    <img src="{{ tenant_asset($course->course_thumb) }}" style="width:300px" alt=""> <br>
                    {{ $course->course_name }} 
                    <br>
                    <a href="/course/{{$course->id}}/delete" class="btn btn-danger">Delete</a> -
                    <a href="/course/{{$course->id}}/edit" class="btn btn-warning">Edit</a>
                </a>
            </div>
       @endforeach
    </div>
</div>
@endsection
@push('scripts')

<script>

    $(document).ready(function(){
        $("#switch_type").click(function(){
            $('#course_type').prop('type', 'text');
            if($(this).is(':checked'))
            {
                $('#course_intro').prop('type', 'file');
            }
        });

        $


    })
    </script>
@endpush
