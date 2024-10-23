@extends('layouts.app2')

@section('content')
<style type="text/css">
	.card .card-body {
    padding: 0.5rem 0.5rem;
}

p.text-sm.text-gray-700.leading-5 {
    margin-top: 15px !important;
    text-align: center !important;
}
</style>
 <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
            </div>
            @include('admin.inc.notify')
            <div class="row">
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Users
                    </h4>
                    <h2 class="">{{ $user_count }}</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Trial Users
                    </h4>
                    <h2 class="">{{ $user_trial }}</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-dark card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Subscriptions
                    </h4>
                    <h2 class="">{{ $user_subscription }}</h2>
                  </div>
                </div>
              </div>
              <div class="col-md-3 stretch-card grid-margin">
                <div class="card bg-gradient-success card-img-holder text-white">
                  <div class="card-body">
                    <img src="assets/images/dashboard/circle.svg" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Registered Store Licences
                    </h4>
                    <h2 class="mb-5">{{ $user_register_lic }}</h2>
                  </div>
                </div>
              </div>
            
            
          </div>

          <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Register License No</h4>
                   <table class="table table-striped">
                       <thead>
                <tr>
                    <th>License Number</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($licenses as $license)
                    <tr>
                        <td>{{ $license->lic_no }}</td>
                    </tr>
                @endforeach
            </tbody>
                    </table>
                    <div class="d-flex mt-3" style="justify-content: right !important;">
                    {{ $licenses->links() }} <!-- Pagination links -->
                    </div>
                    <button id="download-csv" class="btn btn-primary mt-3">Download All as CSV</button>
                  </div>
                </div>
              </div>
            </div>


<script>
  $(document).ready(function(){
    $('svg').remove();
  })
        document.getElementById('download-csv').addEventListener('click', function() {
            window.location.href = '{{ route('licenses.downloadAllCsv') }}';
        });
    </script>
@endsection