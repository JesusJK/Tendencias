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
						
                            <a href="{{ route('tipodocumentos.create') }}" class="btn btn-primary float-right" title="Nuevo Tipo de documento">
                                    <i class="fas fa-plus nav-icon"></i> Nuevo
                            </a>
							
	                    </div>
                        <div class="card-bod">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="w-3 ">id</th>
                                        <th>nombre</th>
                                        <th>abreviatura</th>     
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tipodocumentos as $tipodocumento)
                                    <tr>
                                        <td>{{$tipodocumento->id}}</td>
                                        <td>{{$tipodocumento->nombre}}</td>
                                        <td>{{$tipodocumento->abreviatura}}</td>
                                        <td>
                                            <form action="{{ route('tipodocumentos.destroy', $tipodocumento->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este tipo de documento?')">
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