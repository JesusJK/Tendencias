@extends('layouts.app')
@section ('content')
<div class="content-wrapper">
    <section class="content-header">
		<div class="container-fluid">
		</div>
    </section>
<section class="content">
	<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header bg-secondary" style="font-size: 1.75rem;font-weight: 500; line-height: 1.2; margin-bottom: 0.5rem;">
							@yield('title')
						
                                <a href="{{ route('personas.create') }}" class="btn btn-primary float-right" title="Nuevo Tipo de documento">
                                    <i class="fas fa-plus nav-icon"></i> Nuevo
                                </a>
							
	                    </div>
                        <div class="card-bod">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="w-3 ">id</th>
                                        <th>nombre</th>
                                        <th>Tipo Documento</th>
                                        <th>Numero Documento</th>
                                        <th>Correo</th>
                                        <th>Telefono</th>
                                        <th>Foto</th>     
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personas as $persona)
                                    <tr>
                                        <td>{{$persona->id}}</td>
                                        <td>{{$persona->nombre}}</td>
                                        <td>
                                            {{ $persona->tipoDocumento->abreviatura ?? 'Sin tipo' }}
                                        </td>
                                        <td>{{$persona->n_documento}}</td>
                                        <td>{{$persona->correo}}</td>
                                        <td>{{$persona->telefono}}</td>
                                        <td>
                                            @if ($persona->foto)
                                                <img src="{{ asset('storage/' . $persona->foto) }}" width="80" height="80" style="object-fit: cover; border-radius: 8px;" alt="Foto">
                                            @else
                                                <span>Sin foto</span>
                                            @endif
                                        </td>z
                                        <td>
                                            <form action="{{ route('personas.destroy', $persona->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar esta persona?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
@endsection