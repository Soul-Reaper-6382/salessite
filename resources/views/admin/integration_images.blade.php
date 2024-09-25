@extends('layouts.app2')

@section('content')

<style type="text/css">
  .row-mas {
  columns: 5;
  column-gap: 1rem;
}

.row-mas .item {
  display: block;
  width: 100%;
  margin-bottom: 3rem;
    position: relative;
}
.row-mas .item img {
  width: 100%;
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}

form.delete_img_parent {
    position: absolute;
    top: -20px;
    left: -15px;
}
</style>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-image"></i>
            </span> Integration Images and Categories
        </h3>
    </div>
    @include('admin.inc.notify')
    <div class="row justify-content-center">
        <div class="col-6 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">
                    <h4>Add New Category</h4>
            <form action="{{ route('add_category') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <button type="submit" class="btn btn-gradient-primary me-2">Add Category</button>
            </form>

            <h4 class="mt-2">Available Categories</h4>
            <ul class="list-group">
                @foreach($categories as $category)
                    <li class="list-group-item">
                        {{ $category->name }}

                        <button class="btn btn-primary btn-sm" onclick="editCategory({{ $category->id }})">Edit</button>
                        <form action="{{ route('delete_category', $category->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </li>
                @endforeach
            </ul>
                   
                </div>
            </div>
        </div>

        <div class="col-6 grid-margin stretch-card">

            <div class="card">
                <div class="card-body">
                   <h4>Add New Integration Image</h4>
            <form action="{{ route('add_integration_images') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="category">Select Category</label>
                    <select name="cat_id" class="form-control" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="heading">Heading</label>
                    <input type="text" class="form-control" name="heading" required>
                </div>

                <div class="form-group">
                    <label for="text">Text</label>
                    <textarea class="form-control" name="text" required></textarea>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" name="image" required>
                </div>

                <button type="submit" class="btn btn-gradient-primary me-2">Add Integration</button>
            </form>
                   
                </div>
            </div>
        </div>

    </div>

    <div class="row justify-content-center">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                                    <!-- Tabs Navigation -->
                <ul class="nav nav-tabs" id="categoryTabs" role="tablist">
                    @foreach($categories as $category)
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="tab-{{ $category->id }}" href="javascript:void(0)" onclick="loadCategoryImages({{ $category->id }})">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>

                <!-- Container for displaying category-specific images and details -->
                <div id="categoryContent" class="mt-4">
                    <p>Select a category to view its integrations.</p>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Editing Category -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="editCategoryForm" action="" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="categoryName">Category Name</label>
            <input type="text" class="form-control" id="categoryName" name="name" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
  </div>
</div>


<!-- Modal for Editing Image -->
<div class="modal fade" id="editImageModal" tabindex="-1" aria-labelledby="editImageModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="editImageForm" action="" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editImageModalLabel">Edit Image</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="heading">Heading</label>
            <input type="text" class="form-control" id="heading" name="heading_upd" required>
          </div>
          <div class="form-group">
            <label for="text">Text</label>
            <textarea class="form-control" id="text" name="text_upd" required></textarea>
          </div>
          <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="cat_id_upd" required>
              <option value="" disabled selected>Select a category</option>
              @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="image">Change Image</label>
            <input type="file" class="form-control" id="image" name="image_upd">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
  </div>
</div>

<script>
    function editImage(id) {
    $.ajax({
        url: 'edit_image/' + id,  // Fetch the image data
        method: 'GET',
        success: function(data) {
            $('#heading').val(data.heading);
            $('#text').val(data.text);
            $('#category').val(data.cat_id); // Set the selected category
            $('#editImageForm').attr('action', 'update_image/' + id);  // Set the action to the correct route
            $('#editImageModal').modal('show');  // Show the modal
        }
    });
}

</script>


<script>
    function loadCategoryImages(categoryId) {
        $.ajax({
            url: 'category_images/' + categoryId,
            method: 'GET',
            success: function(response) {
                if (response.images.length > 0) {
                    let content = '<div class="row">';
                    response.images.forEach(function(image) {
                        let text = image.text.substring(0, 20);
                        content += `
                            <div class="col-md-6 item" style="border: 1px solid #ccc;
    padding: 10px;">
                                <img src="{{ url('` + image.image + `') }}" alt="Image" style="width:200px;height:auto">
                                <h5>${image.heading}</h5>
                                <p>${text}</p>
                                <form action="{{ url('delete_integration_images/${image.id}') }}" method="POST" style="display:contents;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                                <button class="btn btn-primary" onclick="editImage(${image.id})">Edit</button>
                            </div>`;
                    });
                    content += '</div>';
                    $('#categoryContent').html(content);
                } else {
                    $('#categoryContent').html('<p>No images found for this category.</p>');
                }
            },
            error: function(error) {
                $('#categoryContent').html('<p>Error fetching data.</p>');
            }
        });
    }
</script>

<script>
    function editCategory(id) {
        // Send an AJAX request to get the category data
        $.ajax({
            url: 'edit_category/' + id,
            method: 'GET',
            success: function(data) {
                // Populate the modal form with the category data
                $('#categoryName').val(data.name);
                
                // Set the action for the form to the correct update route
                $('#editCategoryForm').attr('action', 'update_category/' + id);
                
                // Show the modal
                $('#editCategoryModal').modal('show');
            }
        });
    }
</script>

@endsection
