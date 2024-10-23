@extends('layouts.app2')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-comment-account"></i>
            </span> Testimonials
        </h3>
    </div>

    @include('admin.inc.notify')

    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Testimonials List</h4>
                    <a href="{{ route('testimonials.create') }}" class="btn btn-gradient-primary mb-3">Add Testimonial</a>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Text</th>
                                    <th>Name</th>
                                    <th>Store</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($testimonials as $testimonial)
                                <tr>
                                    <td><img src="{{ url($testimonial->image) }}" width="100"></td>
                                    <td>{{ Str::limit($testimonial->text, 50) }}</td>
                                    <td>{{ $testimonial->name }}</td>
                                    <td>{{ $testimonial->store }}</td>
                                    <td>
                                        <a href="{{ route('testimonials.edit', $testimonial->id) }}" class="btn btn-info btn-sm">Edit</a>
                                        <form action="{{ route('testimonials.destroy', $testimonial->id) }}" method="POST" style="display:inline;">
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
@endsection
