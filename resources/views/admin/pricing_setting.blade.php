@extends('layouts.app2')

@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="mdi mdi-currency-usd"></i>
            </span> Pricing Setting
        </h3>
    </div>
    @include('admin.inc.notify')
    <div class="row justify-content-center">
        <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th> Name </th>
                          <th> Amount </th>
                          <th> Duration </th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($plan_db as $plan)
                        @php
                        $monthlyPrice = ($loop->iteration > 4) ? round($plan->price / 12) : $plan->price;
                        $numLength = strlen((string)$monthlyPrice);
                        $curNumClass = ($numLength == 2) ? 'cur-num cr1' : 'cur-num';
                    @endphp
                        <tr>
                          <td> {{ $plan->name }} </td>
                          <td> $ {{ $monthlyPrice }} </td>
                          <td> {{ $plan->duration }} </td>
                        <td>
                            <a href="{{ route('edit_pricing', ['id' => $plan->id, 'duration' => $plan->duration]) }}" class="btn btn-warning btn-sm">Edit</a>
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

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('text');
</script>
@endsection
