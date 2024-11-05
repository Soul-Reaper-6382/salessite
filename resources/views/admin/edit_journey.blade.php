@extends('layouts.app2')

@section('content')

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-text"></i>
            </span> Edit Journey
        </h3>
    </div>
    @include('admin.inc.notify')
    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('update_journey', $journey->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="path" class="form-label">Image or Video</label>
                            <input name="path" type="file" class="form-control" id="path">
                            @if ($journey->path)
                                <div class="mt-2">
                                    @if (in_array(pathinfo($journey->path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'PNG']))
                                        <img src="{{ url($journey->path) }}" style="width: 100px; height: 100px;">
                                    @elseif (in_array(pathinfo($journey->path, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov', 'webm']))
                                        <video width="100" controls>
                                            <source src="{{ url($journey->path) }}" type="video/{{ pathinfo($journey->path, PATHINFO_EXTENSION) }}">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="heading" class="form-label">Heading</label>
                            <input name="heading" type="text" class="form-control" id="heading" value="{{ $journey->heading }}" required>
                        </div>

                        <div class="form-group">
                            <label for="label" class="form-label">Label</label>
                            <input name="label" type="text" class="form-control" id="label" value="{{ $journey->label }}" required>
                        </div>

                        <div class="form-group">
                            <label for="text-editor" class="form-label">Text Editor</label>
                            <textarea name="text" id="text-editor">{{ $journey->text }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="button" class="form-label">Button Text</label>
                            <input name="button" type="text" class="form-control" id="button" value="{{ $journey->button }}">
                        </div>

                        <div class="form-group">
                            <label for="link" class="form-label">Button Link</label>
                            <input name="link" type="text" class="form-control" id="link" value="{{ $journey->link }}">
                        </div>

                        <button type="submit" class="btn btn-gradient-primary me-2 mt-3" style="float:right;">Update Journey</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('text-editor');
    window.addEventListener('load', function() {
        setTimeout(function() {
            // Select all close buttons for CKEditor notifications
            const closeButtons = document.querySelectorAll('.cke_notification_close');
            closeButtons.forEach(button => button.click()); // Click each button to close notifications
        }, 1000); // Adjust delay as needed to ensure notifications have rendered
    });
</script>
@endsection
