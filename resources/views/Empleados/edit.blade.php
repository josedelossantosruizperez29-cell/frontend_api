<x-layouts::app :title="__('Dashboard')">
<div class="min-h-screen bg-slate-100 flex justify-center items-center p-8">

    <div class="w-full max-w-4xl bg-white rounded-3xl shadow-2xl overflow-hidden">

        <!-- Encabezado -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-8 text-white">

            <div class="flex items-center gap-6">

                <div class="w-24 h-24 rounded-full bg-white/20 flex items-center justify-center text-4xl font-bold">
                    JP
                </div>

                <div>
                    <h1 class="text-4xl font-bold">
                        Juan Pérez Gómez
                    </h1>

                    <p class="text-blue-100 text-lg mt-2">
                        Desarrollador Full Stack
                    </p>
                </div>

            </div>

        </div>

        <!-- Información -->
        <div class="p-8">

            <h2 class="text-2xl font-semibold text-gray-800 mb-6">
                Información del Empleado
            </h2>

            <div class="grid md:grid-cols-2 gap-6">

                <div class="bg-slate-50 rounded-xl p-5 border">
                    <p class="text-sm text-gray-500">Nombre Completo</p>
                    <h3 class="text-xl font-semibold mt-1">
                        Juan Pérez Gómez
                    </h3>
                </div>

                <div class="bg-slate-50 rounded-xl p-5 border">
                    <p class="text-sm text-gray-500">Cargo</p>
                    <h3 class="text-xl font-semibold mt-1">
                        Desarrollador Full Stack
                    </h3>
                </div>

                <div class="bg-slate-50 rounded-xl p-5 border">
                    <p class="text-sm text-gray-500">Salario</p>
                    <h3 class="text-2xl font-bold text-green-600">
                        $4.500.000
                    </h3>
                </div>

                <div class="bg-slate-50 rounded-xl p-5 border">
                    <p class="text-sm text-gray-500">Área</p>
                    <h3 class="text-xl font-semibold">
                        Tecnología
                    </h3>
                </div>

            </div>

            <!-- Funciones -->
            <div class="mt-8">

                <h2 class="text-2xl font-semibold text-gray-800 mb-4">
                    Funciones del Cargo
                </h2>

                <div class="bg-slate-50 rounded-xl border p-6">

                    <ul class="space-y-3 text-gray-700">

                        <li>✅ Desarrollar nuevas funcionalidades del sistema.</li>

                        <li>✅ Corregir errores reportados por los usuarios.</li>

                        <li>✅ Mantener y optimizar la base de datos.</li>

                        <li>✅ Participar en reuniones de planificación.</li>

                        <li>✅ Documentar el código y los procesos.</li>

                    </ul>

                </div>

            </div>

            <!-- Botones -->
            <div class="mt-10 flex justify-end gap-4">

                <a href="#"
                   class="px-6 py-3 rounded-xl bg-gray-200 hover:bg-gray-300 font-medium">
                    Volver
                </a>

                <a href="#"
                   class="px-6 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-medium shadow-lg">
                    Editar Empleado
                </a>

            </div>

        </div>

    </div>

</div>
</x-layouts::app>