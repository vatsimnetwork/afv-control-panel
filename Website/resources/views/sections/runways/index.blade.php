@extends('_layouts.master')
@section('title', 'Airports')

@section('head')
  @parent
  <!-- Custom styles for this page -->
  <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid">
  <div class="card shadow">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <ol class="breadcrumb m-0 py-2 pl-0 bg-light">
        <li class="breadcrumb-item"><a href="{{ route('airports.index') }}">Airports</a></li>
        <li class="breadcrumb-item"><a href="{{ route('airports.show', ['airport' => $airport]) }}">{{ $airport->icao }}</a></li>
        <li class="breadcrumb-item active"><b>Runways</b></li>
      </ol>
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
              <th></th>
            </tr>
          </thead>
          @if($airport->runways()->exists())
          <tbody>
            @foreach($airport->runways()->cursor() as $runway)
            <tr>
              <td class="align-middle text-uppercase">{{ $runway->designator }}</td>
              <td class="align-middle">{{ $runway->heading }}</td>
              <td class="align-middle">
                <form action="{{ route('airports.runways.show', ['airport' => $airport, 'runway' => $runway]) }}" method="GET">
                  <button class="btn btn-sm btn-outline-primary shadow-sm" action="submit">View</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
          @else
          <tbody>
            <tr>
              <td colspan="3" class="align-middle">No runways found</td>
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