@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Encabezado -->
    <section class="content-header">
        <div class="container-fluid">
        </div>
        @include('layouts.partial.msg')
    </section>

    <!-- Contenido Principal -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- Encabezado de la Tarjeta -->
                        <div class="card-header bg-secondary" style="font-size: 1.75rem; font-weight: 500; line-height: 1.2; margin-bottom: 0.5rem;">
                            @yield('title')
                            <a href="{{ route('prestamos.create') }}" method="POST" class="btn btn-primary float-right" title="Nuevo Préstamo">
                                <i class="fas fa-plus nav-icon"></i> Nuevo
                            </a>
                        </div>

                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="w-3">ID</th>
                                        <th>Persona</th>
                                        <th>Material</th>
                                        <th>Fecha de Prestamo</th>
                                        <th>Fecha de Devolucion</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prestamos as $prestamo)
                                        <tr>
                                            <td>{{ $prestamo->id }}</td>
                                            <td>{{ $prestamo->persona->nombre ?? 'Sin Asignar' }}</td>
                                            <td>{{ $prestamo->material }}</td>
                                            <td>{{ $prestamo->fecha_prestamo }}</td>
                                            <td>{{ $prestamo->fecha_devolucion ?? 'Pendiente' }}</td>
                                            <td>{{ ucfirst($prestamo->estado) }}</td>
                                            <td>
                                                @if ($prestamo->estado === 'activo')
                                                    <span class="badge badge-success">{{ ucfirst($prestamo->estado) }}</span>
                                                @elseif ($prestamo->estado === 'devuelto')
                                                    <span class="badge badge-info">{{ ucfirst($prestamo->estado) }}</span>
                                                @elseif ($prestamo->estado === 'retrasado')
                                                    <span class="badge badge-danger">{{ ucfirst($prestamo->estado) }}</span>
                                                @else
                                                    <span class="badge badge-secondary">{{ ucfirst($prestamo->estado) }}</span>
                                                @endif
                                            </td>
                                            <td>
                                            <form action="{{ route('prestamos.destroy', $prestamo->id) }}" method="POST" style="display: inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar este préstamo?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                            </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
