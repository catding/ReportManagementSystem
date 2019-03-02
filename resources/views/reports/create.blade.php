@extends('layouts.app')

@section('title', 'New Report')

@section('content')
<div class="row">
    @include('flash::message')
    @if ($errors->any())
        <div class="alert alert-danger col-12">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
     @endif
    
</div>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header h3">{{ __('createReport.formTitle') }}</div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ action('ReportController@store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">{{ __('createReport.titleField') }}</span>
                            </div>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>                          
                        {{-- <div class="form-group">
                            <label class="h5" for="title">{{ __('createReport.titleField') }}</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div> --}}
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">{{ __('createReport.description') }}</span>
                            </div>
                            <textarea class="form-control" id="description" rows="3" name="description" aria-label="description"></textarea>
                        </div>
                    </div>     
                    {{-- <div class="form-group">
                        <label class="h5" for="description">{{ __('createReport.description') }}</label>
                        <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                    </div>                          --}}
                    <div class="form-group">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="group">{{ __('createReport.group') }}</label>
                            </div>
                            <select class="custom-select form-control" id="group" name="group">
                                @foreach($groups as $group)
                                    <option value="{{ $group->title }}">{{ $group->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">{{ __('createReport.tags') }}</span>
                            </div>
                        <input type="text" class="form-control" id="tags" name="tags" placeholder="{{ __('createReport.tagsHelper') }}">
                        </div> 
                    </div>                             
                    {{-- <div class="form-group">
                        <label class="h5" for="group">{{ __('createReport.group') }}</label>
                        <select class="form-control" id="group" name="group">
                            @foreach($groups as $group)
                            <option value="{{ $group->title }}">{{ $group->title }}</option>
                            @endforeach
                        </select>
                    </div> --}}
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">{{ __('createReport.uploadImages') }}</span>
                        </div>
                        <div class="custom-file">
                            <input class="custom-file-input" id="photos" type="file" name="photos[]" accept=".jpg, .jpeg, .png, .gif" multiple>
                            <label class="custom-file-label" id="uploadPhotosLabel" for="photos">{{ __('createReport.uploadImages') }}</label>
                        </div>
                    </div>    

                    {{-- <div class="form-group">
                        <label class="h5" for="photos">{{ __('createReport.uploadImages') }}<span class="h6">{{ __('createReport.uploadImagesHelper') }}</span></label>
                        <input id="photos" class="d-block" type="file" name="photos[]" accept=".gif,.jpg,.jpeg,.png" multiple>
                    </div>     --}}

                    <div class="form-group marginForSubmitButton">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">{{ __('createReport.uploadAudios') }}</span>
                            </div>
                            <div class="custom-file">
                                <input class="custom-file-input" id="audios" type="file" name="audios[]" accept=".mp3" multiple>
                                <label class="custom-file-label" id="uploadAudiosLabel" for="audios">{{ __('createReport.uploadAudios') }}</label>
                            </div>
                        </div>        
                   </div>
                    {{-- <div class="form-group">
                        <label class="h5" for="audios">{{ __('createReport.uploadAudios') }} <span class="h6">{{ __('createReport.uploadAudiosHelper') }}</span></label>
                        <input type="file" class="d-block" name="audios[]" accept=".mp3" multiple>
                    </div> --}}
                    <button type="submit" class="btn btn-primary btn-block submitReportButton">{{ __('createReport.submitButton') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('photos').addEventListener('change', function (e) {
            var files = [];
            for (var i = 0; i < $(this)[0].files.length; i++) {
                files.push($(this)[0].files[i].name);
            }

            if (files.length > 1)
                document.getElementById('uploadPhotosLabel').innerHTML = files.length + ' files selected';
            else
                document.getElementById('uploadPhotosLabel').innerHTML = files.join(', ');
        });

        document.getElementById('audios').addEventListener('change', function (e) {
            var files = [];
            for (var i = 0; i < $(this)[0].files.length; i++) {
                files.push($(this)[0].files[i].name);
            }

            if (files.length > 1)
                document.getElementById('uploadAudiosLabel').innerHTML = files.length + ' files selected';
            else
                document.getElementById('uploadAudiosLabel').innerHTML = files.join(', ');
        });

    })
</script>