@if(isset($success))
<div class="row">
  <div class="col-12">
    <div class="alert alert-success" role="alert">
      {{ $success }}
    </div>
  </div>
</div>
@endif
@if(isset($error))
<div class="row">
  <div class="col-12">
    <div class="alert alert-danger" role="alert">
      {{ $error }}
    </div>
  </div>
</div>
@endif
<div class="alert alert-success" role="alert">
  Tes
</div>
