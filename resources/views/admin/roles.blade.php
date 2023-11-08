@extends('layouts/contentLayoutMaster')

@section('title', 'Roles')

@section('vendor-style')
  <!-- Vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/dataTables.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/responsive.bootstrap5.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/buttons.bootstrap5.min.css')) }}">
@endsection
@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
@endsection

@section('content')

<!-- table -->
<div class="card">

    <div class="card-header">
        <div class="row">
            <div class="col-12">
                <button class="btn btn-primary" data-bs-target="#addRoleModal" data-bs-toggle="modal">Add New Role</button>
            </div>
            <div class="col-12 mt-2 text-center">
                @if ($errors->has('name'))
                    <div class="alert alert-danger" role="alert">
                        {{$errors->first('name')}}
                    </div>
                @endif
                @if(session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{session()->get('message')}}
                </div>
                @endif
            </div>
        </div>
    </div>


  <div class="table-responsive">
    <table class="user-list-table table" id="myTable" >
      <thead class="table-light">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Role</th>
          <th></th>
        </tr>
      </thead>
      <meta name="csrf-token" id="cs" content="{{csrf_token()}}">
      <tbody>

      </tbody>
    </table>
  </div>
</div>
<!-- table -->

@include('content/_partials/_modals/modal-add-role')
@endsection

@section('vendor-script')
  <!-- Vendor js files -->
  <script src="{{ asset(mix('vendors/js/tables/datatable/jquery.dataTables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.responsive.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/responsive.bootstrap5.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap5.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->

  <script src="{{ asset(mix('js/scripts/mainjs/getting-data.js')) }}"></script>
  {{-- <script src="{{ asset(mix('js/scripts/pages/modal-add-role.js')) }}"></script> --}}
  {{-- <script src="{{ asset(mix('js/scripts/pages/app-access-roles.js')) }}"></script> --}}
@endsection
