@extends('layouts.app2')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-clipboard-text"></i>
            </span> Graphic Text Setting
        </h3>
    </div>
    @include('admin.inc.notify')
    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ url('update_graphic_settings') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="heading_one" class="form-label">Heading</label>
                            <input name="heading_one" type="text" required class="form-control" id="heading_one" placeholder="Heading" value="{{ $g_textSettings->heading ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="heading_two" class="form-label">text</label>
                            <input name="heading_two" type="text" required class="form-control" id="heading_two" placeholder="Heading" value="{{ $g_textSettings->text ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="text" class="form-label">Text</label>
                            <textarea name="text" required class="form-control" id="text" placeholder="Text">{{ $g_textSettings->text2 ?? '' }}</textarea>
                        </div>
                      
                        <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('text');
</script>
@endsection
