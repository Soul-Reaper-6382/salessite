@extends('layouts.app2')

@section('content')
<style>
    p.no {
    color: #5252527d !important;
    text-decoration: line-through;
}
</style>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">Edit Plan: {{ $plan_db->name }}</h3>
    </div>
    @include('admin.inc.notify')
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('update_pricing', $plan_db->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Plan Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $plan_db->name }}" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Plan Price ({{ $plan_db->duration }})</label>
                            <input type="number" name="price" class="form-control" value="{{ $plan_db->price }}" required>
                        </div>

                         <div class="form-group">
                            <label for="stripe_plan_id">Stripe plan id</label>
                            <input type="text" name="stripe_plan_id" class="form-control" value="{{ $plan_db->stripe_plan }}" required>
                        </div>

                        <div class="form-group">
                        <label for="duration">Duration</label>
                        <select name="duration" class="form-control" required>
                            <option value="monthly" {{ $plan_db->duration == 'monthly' ? 'selected' : '' }}>Monthly</option>
                            <option value="yearly" {{ $plan_db->duration == 'yearly' ? 'selected' : '' }}>Yearly</option>
                        </select>
                    </div>


                        <button type="submit" class="btn btn-gradient-primary">Update Plan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col-lg-8">
                <div class="card">
                  <div class="card-body">
                    <div class="form-group">
    <p style="text-align: center;
    font-size: 20px;
    font-weight: 700;">Plan Features</p>
    <div id="keys-container">
        @foreach($plan_db->keys as $key)
        <div class="row mb-2">
            <div class="col-md-3">
                <p class="{{ $key->given }}"> {{ $key->key_name }} </p>
            </div>
            <div class="col-md-5">
                @if ($key->video_url)
                <p><a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#videoModal{{ $key->id }}">View Video</a></p>
                @else
                <p class=""> Video null </p>

                            @endif
            </div>
            <div class="col-md-4" style="display: flex;">
                <form action="{{ route('delete_key', ['id' => $plan_db->id, 'key_id' => $key->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button style="margin: 5px;
    padding: 10px;" type="submit" class="btn btn-danger">Delete</button>
                </form>
                                <button style="margin: 5px;
    padding: 10px;" type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editKeyModal{{ $key->id }}">Edit</button>
            </div>
        </div>



        <!-- Modal for viewing video -->
        <div class="modal fade" id="videoModal{{ $key->id }}" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel{{ $key->id }}" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="videoModalLabel{{ $key->id }}">View Video for {{ $key->key_name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="justify-content: center;display: flex;">
                        <video width="90%" height="90%" controls>
                            <source src="{{ asset($key->video_url) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>

         <!-- Modal for editing key -->
        <div class="modal fade" id="editKeyModal{{ $key->id }}" tabindex="-1" role="dialog" aria-labelledby="editKeyModalLabel{{ $key->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editKeyModalLabel{{ $key->id }}">Edit Feature</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('update_key', ['id' => $plan_db->id, 'key_id' => $key->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="key_name">Feature Name</label>
                                <input type="text" name="key_name" class="form-control" value="{{ $key->key_name }}" required>
                            </div>
                            <!-- New Type Field (uncut/cut) -->
                    <div class="form-group">
                        <label for="given">Type</label>
                        <select class="form-control" name="given">
                            <option value="yes" {{ $key->given == 'yes' ? 'selected' : '' }}>Uncut</option>
                            <option value="no" {{ $key->given == 'no' ? 'selected' : '' }}>Cut</option>
                        </select>
                    </div>
                            <div class="form-group">
                                <label for="video_url">Upload New Video (optional)</label>
                                <input type="file" name="video_url" class="form-control" accept="video/*">
                            </div>
                            <button type="submit" class="btn btn-primary">Update Feature</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Add new key -->
<hr>
<form action="{{ route('add_key', $plan_db->id) }}" method="POST" enctype="multipart/form-data">
    @csrf

<div class="form-group">
    <label for="key_name">Add New Feature</label>
    <input type="text" name="key_name" class="form-control" placeholder="Feature Name" required>
</div>
<div class="form-group">
    <label for="key_name">Type</label>
    <select class="form-control" name="given">
        <option value="yes">uncut</option>
        <option value="no">cut</option>
    </select>
</div>
<div class="form-group">
    <label for="video_url">Feature Video (optional)</label>
    <input type="file" name="video_url" class="form-control">
</div>

<button type="submit" class="btn btn-gradient-primary">Add Feature</button>
</form>
                  </div>
              </div>
          </div>
    </div>
</div>
@endsection
