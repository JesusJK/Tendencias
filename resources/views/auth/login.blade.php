@extends('layouts.applogin')

@section('content')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login con WaveCanvas</title>
    <script src="https://cdn.tailwindcss.com"></script>
   
</head>
<body class="bg-green-900">

    <div class="bg-white p-8 rounded-xl shadow-2xl w-96 z-10">
        <h2 class="text-3xl font-bold text-center text-green-900">Iniciar Sesión</h2>
        <p class="text-center text-gray-500">Ingrese sus credenciales</p>

        <form action="{{ route('login') }}" method="POST" class="mt-6">
            @csrf

            <div>
                <label class="block font-semibold">Correo Electrónico</label>
                <input type="email" name="email" required class="form-control @error('email') is-invalid @enderror w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
                @enderror
            </div>

            <div class="mt-4">
                <label class="block font-semibold">Contraseña</label>
                <input type="password" name="password" required class="form-control @error('password') is-invalid @enderror w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500" autocomplete="current-password">
                @error('password')
               <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
               </span>
                @enderror
            </div>

            <!-- Recuperar contraseña -->
            @if (Route::has('password.request'))
                <div class="text-right mt-2">
                    <a href="{{ route('password.request') }}" class="text-green-600 text-sm hover:underline">¿Olvidaste tu contraseña?</a>
                </div>
            @endif

            <button type="submit" class="mt-4 w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition duration-300 ease-in-out">
                Iniciar Sesión
            </button>
        </form>

        <p class="text-center text-gray-600 mt-4">¿No tienes una cuenta?  
            <a href="{{ route('register') }}" class="text-green-700 font-semibold hover:underline">Regístrate aquí</a>
        </p>

    </div>
</body>
</html>

@endsection
