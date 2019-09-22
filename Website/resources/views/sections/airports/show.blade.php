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
      <h6 class="m-0 font-weight-bold">Details</h6>
      <div class="dropdown no-arrow">
        <form class="d-none d-sm-inline-block" action="{{ route('airports.edit', ['airport' => $airport]) }}" method="GET">
          <button class="btn btn-sm btn-warning shadow-sm" action="submit"><i class="fas fa-pen fa-sm text-white-50"></i> Edit</button>
        </form>
        <button class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-toggle="modal" data-target="#deleteConfirmation"><i class="fas fa-times-circle fa-sm text-white-50"></i> Delete</button>
      </div>
    </div>
    <div class="card-body">
      <div class="row text-center">
        <div class="col-12 col-md-3 mx-auto mr-md-0 px-auto pr-md-0">
          <div class="table-responsive">
            <table class="table table-bordered mb-2 mb-md-0">
              <tr>
                <th>ICAO</th>
              </tr>
              <tr>
                <td>
                  <div type="text" class="text-center text-uppercase">{{ $airport->icao }}</div>
                </td>
              </tr>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-md-9 mx-auto ml-md-0 px-auto pl-md-0">
          <div class="table-responsive">
            <table class="table table-bordered mb-0">
              <tr>
                <th>Name</th>
              </tr>
              <tr>
                <td>
                  <div type="text" class="text-center">{{ $airport->name }}</div>
                </td>
              </tr>
            </table>
          </div>
          <!-- /.table-responsive -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
  </div>

  <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold">Runways</h6>
      <form class="dropdown no-arrow" action="{{ route('airports.runways.create', ['airport' => $airport]) }}" method="GET">
        <button action="submit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus-circle fa-sm text-white-50"></i> Add New</button>
      </form>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered text-center my-auto w-100" id="dataTable" cellspacing="0">
          <thead>
            <tr>
              <th>Designator</th>
              <th>Heading</th>
            </tr>
          </thead>
          @if($airport->runways()->exists())
          <tbody>
            <tr>
              <td class="align-middle">{{ $airport->icao }}</td>
              <td class="align-middle">{{ $airport->name }}</td>
            </tr>
          </tbody>
          @else
          <tbody>
            <tr>
              <td colspan="2" class="align-middle">No runways found</td>
            </tr>
          </tbody>
          @endif
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
@endsection


@section('modals')
  @parent
  <!-- Delete Modal-->
  <div class="modal fade" id="deleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmation" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteConfirmationLabel">Confirm deletion</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Doing this will delete all of its runways and runway configurations too. There is no way back.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <form action="{{ route('airports.destroy', ['airport' => $airport]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" action="submit">Delete</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection