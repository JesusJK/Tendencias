@extends('layouts.app')
@section('title','Crear Personas')
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
                        <form action="{{ route('personas.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Nombre <strong style="color:red;">(*)</strong></label>
                                        <input type="text" class="form-control" name="nombre" placeholder="Por ejemplo, Spike" value="{{ old('nombre') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Tipo Documento <strong style="color:red;">(*)</strong></label>
                                        <select name="tipo_documento_id" class="form-control">
                                            <option value="">Seleccione tipo de documento</option>
                                            @foreach ($tipos as $tipo)
                                            <option value="{{ $tipo->id }}" {{ old('tipo_documento_id') == $tipo->id ? 'selected' : '' }}>
                                            {{ $tipo->abreviatura }} - {{ $tipo->nombre }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>                               
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Numero Documento <strong style="color:red;">(*)</strong></label>
                                        <input type="text" class="form-control" name="n_documento" placeholder="Por ejemplo, 111111111" value="{{ old('n_documento') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Correo <strong style="color:red;">(*)</strong></label>
                                        <input type="text" class="form-control" name="correo" placeholder="Por ejemplo, correoexample123@example.com" value="{{ old('correo') }}">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Telefono <strong style="color:red;">(*)</strong></label>
                                        <input type="text" class="form-control" name="telefono" placeholder="Por ejemplo, 3109998887" value="{{ old('telefono') }}">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Foto <strong style="color:red;">(*)</strong></label>
                                        <input type="file" name="foto" class="form-control" accept="image/*">
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
										<a href="{{ route('personas.index') }}" class="btn btn-danger btn-block btn-flat">Atras</a>
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