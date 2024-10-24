@extends('layouts.app2')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-calculator"></i>
            </span> Calculator Setting
        </h3>
    </div>
    @include('admin.inc.notify')
    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ url('update_calculator_settings') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="heading_one" class="form-label">Heading</label>
                            <input name="heading_one" type="text" required class="form-control" id="heading_one" placeholder="Heading" value="{{ $calcSettings->heading_one ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="text_one" class="form-label">Text</label>
                            <input name="text_one" type="text" required class="form-control" id="text_one" placeholder="Text" value="{{ $calcSettings->text_one ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="text_two" class="form-label">Text</label>
                            <input name="text_two" type="text" required class="form-control" id="text_two" placeholder="Text" value="{{ $calcSettings->text_two ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="heading_two" class="form-label">Heading</label>
                            <input name="heading_two" type="text" required class="form-control" id="heading_two" placeholder="Heading" value="{{ $calcSettings->heading_two ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="text_three" class="form-label">Text</label>
                            <input name="text_three" type="text" required class="form-control" id="text_three" placeholder="Text" value="{{ $calcSettings->text_three ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="text_four" class="form-label">Text</label>
                            <input name="text_four" type="text" required class="form-control" id="text_four" placeholder="Text" value="{{ $calcSettings->text_four ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="text_five" class="form-label">Text</label>
                            <input name="text_five" type="text" required class="form-control" id="text_five" placeholder="Text" value="{{ $calcSettings->text_five ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="text_six" class="form-label">Text</label>
                            <input name="text_six" type="text" required class="form-control" id="text_six" placeholder="Text" value="{{ $calcSettings->text_six ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="text_seven" class="form-label">Text</label>
                            <input name="text_seven" type="text" required class="form-control" id="text_seven" placeholder="Text" value="{{ $calcSettings->text_seven ?? '' }}">
                        </div>

                        <div class="form-group">
                            <label for="text_eight" class="form-label">Text</label>
                            <input name="text_eight" type="text" required class="form-control" id="text_eight" placeholder="Text" value="{{ $calcSettings->text_eight ?? '' }}">
                        </div>

                        <div class="form-group" style="display: none;">
                            <label for="text_nine" class="form-label">Text</label>
                            <input name="text_nine" type="text" required class="form-control" id="text_nine" placeholder="Text" value="{{ $calcSettings->text_nine ?? '' }}">
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
    CKEDITOR.replace('text2');
</script>
@endsection
