<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        canvas {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen bg-gray-900">

    <!-- Lienzo del efecto Wave -->
    <canvas id="waveCanvas"></canvas>

    <!-- Contenedor del formulario -->
    <div class="bg-white p-8 rounded-xl shadow-2xl w-96 z-10">
        <h2 class="text-3xl font-bold text-center text-gray-800">Recuperar Contraseña</h2>
        <p class="text-center text-gray-500">Ingresa tu correo para recibir instrucciones</p>

        @if (session('status'))
            <div class="mt-4 p-3 bg-green-100 text-green-800 rounded-lg">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}" class="mt-6">
            @csrf

            <div>
                <label class="block text-gray-700 font-semibold">Correo Electrónico</label>
                <input type="email" name="email" required class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit" class="mt-4 w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300 ease-in-out">
                Restablecer Contraseña
            </button>
        </form>

        <!-- Ir al Login -->
        <p class="text-center text-gray-600 mt-4">
            <a href="/" class="text-blue-500 font-semibold hover:underline">Volver al Inicio</a>
        </p>
    </div>

    <!-- Script para la animación del efecto WaveCanvas -->
    <script>
        const canvas = document.getElementById("waveCanvas");
        const ctx = canvas.getContext("2d");

        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;

        let waveOffset = 0;

        function drawWave() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.fillStyle = "rgba(0, 123, 255, 0.3)";
            
            ctx.beginPath();
            for (let i = 0; i < canvas.width; i++) {
                let y = Math.sin(i * 0.02 + waveOffset) * 20 + 100;
                ctx.lineTo(i, y);
            }
            ctx.lineTo(canvas.width, canvas.height);
            ctx.lineTo(0, canvas.height);
            ctx.closePath();
            ctx.fill();

            waveOffset += 0.05;
            requestAnimationFrame(drawWave);
        }

        drawWave();

        window.addEventListener("resize", () => {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
        });
    </script>
</body>
</html>
