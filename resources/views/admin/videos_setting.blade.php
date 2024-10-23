@extends('layouts.app2')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-video"></i>
            </span> Videos Setting
        </h3>
    </div>
    @include('admin.inc.notify')
    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ url('update_video_settings') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="video_one" class="form-label">Intro Video</label>
                            <input name="video_one" type="file" class="form-control @error('video_one') is-invalid @enderror" id="video_one">
                                @error('video_one')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @if ($videoSettings && $videoSettings->video_one)
                                <video width="320" height="240" controls>
                                    <source src="{{ asset($videoSettings->video_one) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="video_two" class="form-label">Integrations Video</label>
                            <input name="video_two" type="file" class="form-control @error('video_two') is-invalid @enderror" id="video_two">
                             @error('video_two')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @if ($videoSettings && $videoSettings->video_two)
                                <video width="320" height="240" controls>
                                    <source src="{{ asset($videoSettings->video_two) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @endif
                        </div>
                      
                        <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
