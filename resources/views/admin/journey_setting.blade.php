@extends('layouts.app2')

@section('content')

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-text"></i>
            </span> Journey Setting
        </h3>
    </div>
    @include('admin.inc.notify')
    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('add_journey_settings') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="path" class="form-label">Image or Video</label>
                            <input name="path" type="file" class="form-control" id="path" required>
                        </div>

                        <div class="form-group">
                            <label for="heading" class="form-label">Heading</label>
                            <input name="heading" type="text" class="form-control" id="heading" required>
                        </div>

                        <div class="form-group">
                            <label for="label" class="form-label">Label</label>
                            <input name="label" type="text" class="form-control" id="label" required>
                        </div>

                        <div class="form-group">
                            <label for="text-editor" class="form-label">Text Editor</label>
                            <textarea name="text" id="text-editor"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="button" class="form-label">Button Text</label>
                            <input name="button" type="text" class="form-control" id="button">
                        </div>

                         <div class="form-group">
                            <label for="link" class="form-label">Button Link</label>
                            <input name="link" type="text" class="form-control" id="link">
                        </div>

                        <button type="submit" class="btn btn-gradient-primary me-2 mt-3" style="float:right;">Add journeys</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">All journeyss</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Heading</th>
                                    <th>Label</th>
                                    <th>Text</th>
                                    <th>Image/Video</th>
                                    <th>Button</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($journey as $journeys)
                                <tr>
                                    <td>{{ $journeys->id }}</td>
                                    <td>{{ $journeys->heading }}</td>
                                    <td>{{ $journeys->label }}</td>
                                    <td>{!! \Illuminate\Support\Str::limit($journeys->text, 50, '...') !!}</td>
                                    <td>
                                        @if (in_array(pathinfo($journeys->path, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif', 'PNG']))
                                            <img src="{{ url($journeys->path) }}" style="width: 100px; height: 100px; border-radius: 0;">
                                        @elseif (in_array(pathinfo($journeys->path, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov','webm']))
                                            <video width="100" controls>
                                                <source src="{{ url($journeys->path) }}" type="video/{{ pathinfo($journeys->path, PATHINFO_EXTENSION) }}">
                                                Your browser does not support the video tag.
                                            </video>
                                        @endif
                                    </td>
                                    <td>{{ $journeys->button }}</td>
                                    <td>
                                        <a href="{{ route('edit_journey', $journeys->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('delete_journey', $journeys->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
