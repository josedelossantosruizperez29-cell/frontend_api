<x-layouts::app :title="__('Dashboard')">
<div class="min-h-screen bg-slate-100 flex justify-center items-center p-8">

    <div class="w-full max-w-4xl bg-white rounded-3xl shadow-2xl overflow-hidden">

        <!-- Encabezado -->
        <div class="bg-gradient-to-r from-blue-600 to-indigo-700 p-8 text-white">

            <div class="flex items-center gap-6">

                <div class="w-24 h-24 rounded-full bg-white/20 flex items-center justify-center text-4xl font-bold">
                     {{strtoupper(substr($datos['empleado'], 0, 2))}}
                </div>

                <div>
                    <h1 class="text-4xl font-bold">
                       {{$datos['empleado'] }}
                    </h1>

                    <p class="text-blue-100 text-lg mt-2">
                        {{ 'cargo: '.$datos['cargo'] }}
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
                        {{ $datos['empleado'] }}
                    </h3>
                </div>

                <div class="bg-slate-50 rounded-xl p-5 border">
                    <p class="text-sm text-gray-500">Cargo</p>
                    <h3 class="text-xl font-semibold mt-1">
                        {{$datos['cargo']}}
                    </h3>
                </div>

                <div class="bg-slate-50 rounded-xl p-5 border">
                    <p class="text-sm text-gray-500">Salario</p>
                    <h3 class="text-2xl font-bold text-green-600">
                        {{ '$'.$datos['salario'] }}
                    </h3>
                </div>

                <div class="bg-slate-50 rounded-xl p-5 border">
                    <p class="text-sm text-gray-500">Funciones Totales</p>
                    <h3 class="text-xl font-semibold">
                        {{ count($datos['funciones']) }}
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
                        @foreach ($datos['funciones'] as $funcion )
                              <li>✅ {{$funcion}}</li>
                        @endforeach

                    </ul>

                </div>

            </div>

            <!-- Botones -->
            <div class="mt-10 flex justify-end gap-4">

                <a href="{{ route('empleados.index') }}"
                   class="px-6 py-3 rounded-xl bg-gray-200 hover:bg-gray-300 font-medium">
                    Volver
                </a>

            </div>

        </div>

    </div>

</div>
</x-layouts::app>