@if ($errors->any())
  @foreach ($errors->all() as $error)
  <div class="alert alert-danger">
    <button type="button" aria-hiden="true" class="close" onclick="this.parentElement.style.display='none'"></button>
    <span>
      <b> Advertencia - </b> {{ $error}}
    </span>
  </div>
  @endforeach
  @endif

@if(session('successMsg'))
  <div class="alert alert-success">
    <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display">
      <span>
        <b></b>
      </span>
    </button>
  </div>
@endif



