@if (session('alert'))
  <div class="alert alert-danger text-center w-25 mx-auto">
    {{ session('alert') }}
  </div>
@endif
