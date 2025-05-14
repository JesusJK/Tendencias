<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Biblioteca Interactiva</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 1.5s ease-in-out;
        }
    </style>
</head>
<body class="h-screen flex items-center justify-center bg-cover bg-center relative">

    <!-- Capa oscura para mejor visibilidad del contenido -->
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>

    <!-- Contenedor Principal -->
    <div class="relative bg-black bg-opacity-60 text-white p-8 rounded-lg shadow-lg fade-in text-center w-96">
        <h1 class="text-3xl font-bold mb-2">Bienvenido a la Biblioteca de Kevin Damian</h1>
        <p class="text-gray-300">Accede a tu cuenta o regístrate para comenzar.</p>
        
        <!-- Botones -->
        <div class="flex flex-col gap-4 mt-6">
            <a href="{{ route('login') }}" class="px-6 py-3 rounded-md bg-blue-500 hover:bg-blue-600 transition-all text-white font-bold shadow-md">
                Iniciar sesion
            </a>
            <a href="{{ route('register') }}" class="px-6 py-3 rounded-md border border-white hover:bg-white hover:text-black transition-all font-bold shadow-md">
                Registrarse
            </a>
        </div>
    </div>

    <!-- Script para cambiar fondo dinámico -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const images = [
                "https://images.unsplash.com/photo-1521587760476-6c12a4b040da?fm=jpg&q=60&w=3000",

            ];
            const bgImage = images[Math.floor(Math.random() * images.length)];
            document.body.style.backgroundImage = `url('${bgImage}')`;
        });
    </script>

</body>
</html>