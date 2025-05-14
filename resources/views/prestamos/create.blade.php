@extends('layouts.app')
@section('title','Crear Prestamo')
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
                        <form action="{{ route('prestamos.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label>Persona <strong style="color:red;">(*)</strong></label>
                                    <select name="persona_id" class="form-control select2" required>
                                        <option value="">Buscar persona...</option>
                                        @foreach($personas as $persona)
                                            <option value="{{ $persona->id }}" {{ old('persona_id') == $persona->id ? 'selected' : '' }}>
                                                {{ $persona->id }} - {{ $persona->nombre }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label>Material <strong style="color:red;">(*)</strong></label>
                                    <input type="text" class="form-control" name="material" placeholder="Nombre del material" value="{{ old('material') }}">
                                </div>
                            </div>

                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha de Préstamo <strong style="color:red;">(*)</strong></label>
                                    <input type="datetime-local" class="form-control" name="fecha_prestamo" value="{{ old('fecha_prestamo') }}">
                                </div>
                            </div>
                            
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label>Fecha de Entrega</label> 
                                    <input type="datetime-local" class="form-control" name="fecha_entrega" value="{{ old('fecha_entrega') }}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label>Días de Retraso <strong style="color:red;">(*)</strong></label>
                                    <input type="number" class="form-control" name="dias_retraso" placeholder="0" value="{{ old('dias_retraso') }}">
                                </div>
                            </div>
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <div class="form-group">
                                    <label>Estado <strong style="color:red;">(*)</strong></label>
                                    <select name="estado" class="form-control" required>
                                        <option value="activo" {{ old('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
                                        <option value="devuelto" {{ old('estado') == 'devuelto' ? 'selected' : '' }}>Devuelto</option>
                                        <option value="retrasado" {{ old('estado') == 'retrasado' ? 'selected' : '' }}>Retrasado</option>
                                    </select>
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
										<a href="{{ route('prestamos.index') }}" class="btn btn-danger btn-block btn-flat">Atras</a>
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

