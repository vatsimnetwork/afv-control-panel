@extends('_layouts.master')
@section('title', 'Airports')

@section('head')
  @parent
  <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <ol class="breadcrumb m-0 py-2 pl-0 bg-light">
        <li class="breadcrumb-item"><a href="{{ route('airports.index') }}">Airports</a></li>
        <li class="breadcrumb-item active"><b>Create</b></li>
      </ol>
    </div>
    <div class="card-body">
      @if ($errors->any())
      <div class="row">
        <div class="col">
          <div class="alert alert-danger pb-0">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        </div>
      </div>
      @endif

      <form class="form-horizontal text-center" method="POST" action="{{ route('airports.store') }}">
        @csrf
        <div class="row">
          <div class="col-12 col-md-3 mx-auto mr-md-0 px-auto pr-md-0">
            <div class="table-responsive">
              <table class="table table-bordered">
                <tr>
                  <th>ICAO</th>
                </tr>
                <tr>
                  <td>
                    <input type="text" class="form-control @error('icao') is-invalid @enderror text-center text-uppercase" name="icao" placeholder="ICAO" value="{{ old('icao') ?? null }}" minlength="3" maxlength="4" size="4" required>
                  </td>
                </tr>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-md-9 mx-auto ml-md-0 px-auto pl-md-0">
            <div class="table-responsive">
              <table class="table table-bordered">
                <tr>
                  <th>Name</th>
                </tr>
                <tr>
                  <td>
                    <input type="text" class="form-control @error('name') is-invalid @enderror text-center" name="name" placeholder="Name" value="{{ old('name') ?? null }}" minlength="4" maxlength="255" size="255" required>
                  </td>
                </tr>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col text-center">
            <button type="submit" class="btn btn-success btn-sm">Create</button>
          </div>
        </div>
        <!-- /.row -->
      </form>

    </div>
  </div>
</div>
<!-- /.container-fluid -->
@endsection