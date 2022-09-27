<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong>Copyright &copy;{{ env('APP_AUTHOR') }}</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b>
    {{-- get version from env --}}
    {{ env('APP_VERSION') }}
  </div>
</footer>
