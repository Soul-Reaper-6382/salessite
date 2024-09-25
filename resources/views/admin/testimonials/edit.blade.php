@extends('layouts.app2')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-comment-account"></i>
            </span> Edit Testimonial
        </h3>
    </div>

    @include('admin.inc.notify')

    <div class="row justify-content-center">
        <div class="col-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $testimonial->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="store">Store</label>
                            <input type="text" name="store" class="form-control" value="{{ $testimonial->store }}" required>
                        </div>

                        <div class="form-group">
                            <label for="text">Testimonial Text</label>
                            <textarea name="text" class="form-control" required>{{ $testimonial->text }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Image (optional)</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ url($testimonial->image) }}" width="100" class="mt-2">
                        </div>

                        <button type="submit" class="btn btn-gradient-primary me-2">Update Testimonial</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
