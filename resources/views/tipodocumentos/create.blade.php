@extends('layouts.app')
@section('title','Crear Tipo Documentos')
@section('content')
<div class="content-wrapper">
    <!-- Encabezado -->
    <section class="content-header">
        <div class="container-fluid">
        </div>
        @include('layouts.partial.msg')
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- Encabezado de la Tarjeta -->
                        <div class="card-header bg-secondary">
                           <h3>@yield('title')</h3>                
                        </div>
                        <form action="{{ route('tipodocumentos.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Abreviatura <strong style="color:red;">(*)</strong></label>
                                        <input type="text" class="form-control" name="abreviatura" placeholder="Por ejemplo, CC" value="{{ old('abreviatura') }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nombre <strong style="color:red;">(*)</strong></label>
                                            <input type="text" class="form-control" name="nombre" placeholder="Por ejemplo, Cedula" autocomplete="off" value="{{ old('nombre') }}">
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" class="form-control" name="estado" value="1">
								<input type="hidden" class="form-control" name="registradopor" value="{{ Auth::user()->id }}">
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('tipodocumentos.index') }}" class="btn btn-danger btn-block btn-flat">Atras</a>
									</div>
                                </div>
                            </div>
                        </form>                    
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
