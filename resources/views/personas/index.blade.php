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
						
								<a href="#" class="btn btn-primary float-right" title="Nuevo"><i class="fas fa-plus nav-icon"></i></a>
							
	                    </div>
                        <div class="card-bod">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="w-3 ">id</th>
                                        <th>nombre</th>
                                        <th>numeroDocumento</th>
                                        <th>telefono</th>
                                             
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($personas as $persona)
                                    <tr>
                                        <td>{{$persona->id}}</td>
                                        <td>{{$persona->nombre}}</td>
                                        <td>{{$persona->N_documento}}</td>
                                        <td>{{$persona->telefono}}</td>
                                        <td></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
@endsection