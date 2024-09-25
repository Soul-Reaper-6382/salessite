@extends('layouts.app2')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-comment-account"></i>
            </span> Add Testimonial
        </h3>
    </div>

    @include('admin.inc.notify')

    <div class="row justify-content-center">
        <div class="col-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="forms-sample" action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="store">Store</label>
                            <input type="text" name="store" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="text">Testimonial Text</label>
                            <textarea name="text" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image (optional)</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-gradient-primary me-2">Add Testimonial</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
