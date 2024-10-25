@extends('layouts.app2')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-clipboard-text"></i>
            </span> About Us Settings
        </h3>
    </div>
    @include('admin.inc.notify')

    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('update_about_settings') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Heading One -->
                        <div class="form-group">
                            <label for="heading_one">Heading One</label>
                            <input type="text" name="heading_one" id="heading_one" class="form-control" 
                                   value="{{ $about->heading_one ?? '' }}" required>
                        </div>

                        <!-- Heading Two -->
                        <div class="form-group">
                            <label for="heading_two">Heading Two</label>
                            <input type="text" name="heading_two" id="heading_two" class="form-control" 
                                   value="{{ $about->heading_two ?? '' }}">
                        </div>

                        <!-- Heading Three -->
                        <div class="form-group">
                            <label for="heading_three">Heading Three</label>
                            <input type="text" name="heading_three" id="heading_three" class="form-control" 
                                   value="{{ $about->heading_three ?? '' }}">
                        </div>

                        <!-- Text One -->
                        <div class="form-group">
                            <label for="text_one">Text One</label>
                            <textarea name="text_one" id="text_one" class="form-control" required>{{ $about->text_one ?? '' }}</textarea>
                        </div>

                        <!-- Text Two -->
                        <div class="form-group">
                            <label for="text_two">Text Two</label>
                            <textarea name="text_two" id="text_two" class="form-control">{{ $about->text_two ?? '' }}</textarea>
                        </div>

                        <!-- Text Three -->
                        <div class="form-group">
                            <label for="text_three">Text Three</label>
                            <textarea name="text_three" id="text_three" class="form-control">{{ $about->text_three ?? '' }}</textarea>
                        </div>

                        <!-- Image One -->
                        <div class="form-group">
                            <label for="image_one">Image One</label>
                            <input type="file" name="image_one" id="image_one" class="form-control">
                            @if(isset($about->image_one))
                                <img src="{{ url($about->image_one) }}" width="100px" alt="Image One">
                            @endif
                        </div>

                        <!-- Image Two -->
                        <div class="form-group">
                            <label for="image_two">Image Two</label>
                            <input type="file" name="image_two" id="image_two" class="form-control">
                            @if(isset($about->image_two))
                                <img src="{{ url($about->image_two) }}" width="100px" alt="Image Two">
                            @endif
                        </div>
                        
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('text_one');
    CKEDITOR.replace('text_two');
    CKEDITOR.replace('text_three');
</script>
@endsection
