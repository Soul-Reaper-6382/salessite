@extends('layouts.app2')

@section('content')

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-text"></i>
            </span> Edit Step
        </h3>
    </div>
    @include('admin.inc.notify')
    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('update_step', $step->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="imageorvideo" class="form-label">Image or Video</label>
                            <input name="imageorvideo" type="file" class="form-control" id="imageorvideo">
                            @if ($step->file)
                                <div class="mt-2">
                                    @if (in_array(pathinfo($step->file, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'gif']))
                                        <img src="{{ url($step->file) }}" style="width: 100px; height: 100px; border-radius: 0;">
                                    @elseif (in_array(pathinfo($step->file, PATHINFO_EXTENSION), ['mp4', 'avi', 'mov','webm']))
                                        <video width="100" controls>
                                            <source src="{{ url($step->file) }}" type="video/{{ pathinfo($step->file, PATHINFO_EXTENSION) }}">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="heading" class="form-label">Heading</label>
                            <input name="heading" type="text" class="form-control" id="heading" value="{{ $step->heading }}" required>
                        </div>

                        <div class="form-group">
                            <label for="text-editor" class="form-label">Text Editor</label>
                            <textarea name="text" id="text-editor">{{ $step->text }}</textarea>
                        </div>

                        <div id="buttons-container">
                            <label for="buttons" class="form-label">Buttons</label>
                            @if($step->buttons)
                                @foreach($step->buttons as $index => $button)
                                    <div class="button-group mb-2" data-index="{{ $index }}">
                                        <input name="buttons[{{ $index }}][text]" type="text" class="form-control mb-1" placeholder="Button Text" value="{{ $button['text'] }}">
                                        <input name="buttons[{{ $index }}][link]" type="url" class="form-control mb-1" placeholder="Button Link" value="{{ $button['link'] }}">
                                        <input name="buttons[{{ $index }}][color]" type="color" class="form-control mb-1" placeholder="Button Color" value="{{ $button['color'] }}">
                                        <button type="button" class="btn btn-danger remove-button">Remove</button>
                                    </div>
                                @endforeach
                            @else
                                <div class="button-group mb-2" data-index="0">
                                    <input name="buttons[0][text]" type="text" class="form-control mb-1" placeholder="Button Text">
                                    <input name="buttons[0][link]" type="url" class="form-control mb-1" placeholder="Button Link">
                                    <input name="buttons[0][color]" type="color" class="form-control mb-1" placeholder="Button Color">
                                    <button type="button" class="btn btn-danger remove-button">Remove</button>
                                </div>
                            @endif
                        </div>
                        <button type="button" id="add-button" class="btn btn-info">Add Button</button>

                        <button type="submit" class="btn btn-gradient-primary me-2 mt-3" style="float:right;">Update Step</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('text-editor');

    let buttonIndex = {{ count($step->buttons) }};
    document.getElementById('add-button').addEventListener('click', function() {
        const container = document.getElementById('buttons-container');
        const buttonGroup = document.createElement('div');
        buttonGroup.classList.add('button-group', 'mb-2');
        buttonGroup.dataset.index = buttonIndex;

        buttonGroup.innerHTML = `
            <input name="buttons[${buttonIndex}][text]" type="text" class="form-control mb-1" placeholder="Button Text">
            <input name="buttons[${buttonIndex}][link]" type="url" class="form-control mb-1" placeholder="Button Link">
            <input name="buttons[${buttonIndex}][color]" type="color" class="form-control mb-1" placeholder="Button Color">
            <button type="button" class="btn btn-danger remove-button">Remove</button>
        `;

        container.appendChild(buttonGroup);

        buttonIndex++;
    });

    document.getElementById('buttons-container').addEventListener('click', function(e) {
        if (e.target && e.target.matches('button.remove-button')) {
            e.target.parentElement.remove();
        }
    });
</script>
@endsection
