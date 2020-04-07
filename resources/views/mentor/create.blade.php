@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Mentor</div>
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('create-tenant') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="mentor_name" class="col-md-4 col-form-label text-md-right">{{ __('Mentor Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('mentor_name') is-invalid @enderror" name="mentor_name" value="{{ $mentor->mentor_name ?? old('mentor_name') }}" required autocomplete="name" autofocus>

                                @error('mentor_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mentor_name" class="col-md-4 col-form-label text-md-right">{{ __('Desired Subdomain') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('desired_name') is-invalid @enderror" name="desired_name" value="{{ $mentor->desired_name ?? old('desired_name') }}" required autocomplete="name" autofocus>

                                @error('desired_subdomain')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mentor_email" class="col-md-4 col-form-label text-md-right">{{ __('Mentor Email') }}</label>

                            <div class="col-md-6">
                                <input id="mentor_email" type="text" class="form-control @error('mentor_email') is-invalid @enderror" name="mentor_email" value="{{ $mentor->mentor_email ?? old('mentor_email') }}" required autocomplete="email">

                                @error('mentor_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mentor_thumb" class="col-md-4 col-form-label text-md-right">{{ __('Mentor thumb') }}</label>

                            <div class="col-md-6">
                                @if(isset($mentor))
                                <img src="{{ tenant_asset($mentor->mentor_thumb) }}" style="width:300px" alt=""> <br>
                                @endif
                                <input id="mentor_thumb" type="file" class="form-control @error('mentor_thum') is-invalid @enderror" name="mentor_thumb" value="{{ old('mentor_thumb') }}" required autocomplete="text"  accept="image/*">
                                @error('mentor_thumb')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mentor_description" class="col-md-4 col-form-label text-md-right">{{ __('Mentor description') }}</label>

                            <div class="col-md-6">
                                <textarea id="mentor_description" type="file" class="form-control @error('mentor_description') is-invalid @enderror" name="mentor_description"> {{ $mentor->mentor_description ?? old('mentor_description') }}</textarea>

                                @error('mentor_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create mentor') }}
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
            $('#mentor_type').prop('type', 'text');
            if($(this).is(':checked'))
            {
                $('#mentor_intro').prop('type', 'file');
    
            }
     
       });

    })
    </script>
@endpush
