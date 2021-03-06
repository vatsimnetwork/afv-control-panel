<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    @section('head')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ config('app.name') }} | @yield('title', 'Console')</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    @show
  </head>
  
  <body id="page-top">
    {{-- Page Wrapper --}}
    <div id="wrapper">
      {{-- Sidebar --}}
      @include('_partials._sidebar')
      {{-- End of Sidebar --}}

      {{-- Content Wrapper --}}
      <div id="content-wrapper" class="d-flex flex-column">
        {{-- Main Content --}}
        <div id="content">
          {{-- Topbar --}}
          @include('_partials._top_nav')
          {{-- End of Topbar --}}
  
          {{-- Begin Page Content --}}
          @yield('content')
          {{-- End of Page Content --}}
        </div>
        {{-- End of Main Content --}}
  
        {{-- Footer --}}
        @include('_partials._footer')
        {{-- End of Footer --}}
      </div>
      {{-- End of Content Wrapper --}}
    </div>
    {{-- End of Page Wrapper --}}
  
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>
  
    @section('modals')
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    @show
  
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
  
    <!-- Page level plugins -->
    <script src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
  
    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>

    @if(session()->has("error") || session()->has("success") || session()->has("warn"))
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
    @if(session()->has("error"))
    <script language="javascript">
        Swal.fire({
            title: "<b>{{ session('error')[0] }}</b>",
            html: "{{ session('error')[1] }}",
            type: 'error'
        })
    </script>
    @endif
    @if(session()->has("warn"))
    <script language="javascript">
        Swal.fire({
            title: "<b>{{ session('warn')[0] }}</b>",
            html: "{{ session('warn')[1] }}",
            type: 'warning'
        })
    </script>
    @endif
    @if(session()->has("success"))
    <script language="javascript">
        Swal.fire({
            title: "<b>{{ session('success')[0] }}</b>",
            html: "{{ session('success')[1] }}",
            type: 'success'
        })
    </script>
    @endif
    @endif
  
  </body>

</html>
