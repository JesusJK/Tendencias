@extends('layouts.applogin')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body class="bg-white">
    <div class="bg-white p-8 my-3 rounded-xl shadow-2xl w-[700px]">
        <h2 class="text-3xl font-bold text-center text-green-900">Registro</h2>
        <p class="text-center text-gray-500">Crea una nueva cuenta</p>

        <form method="POST" action="{{ route('register') }}" class="mt-6">
            @csrf

            <div>
                <label class="block font-semibold">Nombre</label>
                <input type="text" name="name" required class="form-control @error('name') is-invalid @enderror w-full p-1 border rounded-lg focus:ring-2 focus:ring-blue-500" value="{{ old('name') }}" autocomplete="name" autofocus>
                @error('name')
             <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
             </span>
                @enderror
            </div>

            <div class="mt-4">
                <label class="block font-semibold">Correo Electrónico</label>
                <input type="email" name="email" required class="form-control @error('email') is-invalid @enderror w-full p-1 border rounded-lg focus:ring-2 focus:ring-blue-500" value="{{ old('email') }}" autocomplete="email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror   
            </div>

            <div class="mt-4">
                <label class="block font-semibold">Contraseña</label>
                <input type="password" name="password" required class="form-control @error('password') is-invalid @enderror w-full p-1 border rounded-lg focus:ring-2 focus:ring-blue-500" autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="mt-4">
                <label class="block font-semibold">Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" required class="form-control w-full p-1 border rounded-lg focus:ring-2 focus:ring-blue-500" autocomplete="new-password">
            </div>



            <button type="submit" class="mt-4 w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition duration-300 ease-in-out">
                Registrarse
            </button>
        </form>

        <p class="text-center text-gray-600 mt-4">¿Ya tienes una cuenta?  
            <a href="{{ route('login') }}" class="text-green-700 font-semibold hover:underline">Inicia sesión</a>
        </p>
    </div>
    
</body>
</html>

@endsection