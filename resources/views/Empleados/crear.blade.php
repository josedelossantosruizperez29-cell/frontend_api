<x-layouts::app :title="__('Dashboard')">
    <div class="min-h-screen bg-slate-100 flex items-center justify-center p-8">

        <div class="w-full max-w-4xl bg-white rounded-3xl shadow-2xl overflow-hidden">

            <!-- Encabezado -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-8 py-6">
                <h1 class="text-3xl font-bold text-white">
                    Registrar Empleado
                </h1>

                <p class="text-blue-100 mt-2">
                    Complete la información del empleado.
                </p>
            </div>

            <!-- Contenido -->
            <form action="{{ route('empleados.store') }}" method="post">
                <div class="p-8">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Nombre -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">
                                Nombre
                            </label>

                            <input name="nombre" type="text" placeholder="Ingrese el nombre"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>
                        @error('nombre')
                            <p class="text-red-500 text-xs mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                        <!-- Apellido -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">
                                Apellido
                            </label>

                            <input name="apellido" type="text" placeholder="Ingrese el apellido"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>
                        @error('apellido')
                            <p class="text-red-500 text-xs mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                        <!-- Salario -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">
                                Salario
                            </label>

                            <input name="salario" type="number" placeholder="$0"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>
                        @error('salario')
                            <p class="text-red-500 text-xs mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                        <!-- Cargo -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">
                                Cargo
                            </label>

                            <select name="cargo" id="cargo"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 bg-white focus:ring-2 focus:ring-blue-500 outline-none">

                                <option selected disabled>
                                    Seleccione un cargo
                                </option>
                                @foreach ($todosLosCargos as $dato)
                                    <option value="{{ $dato['id'] }}">
                                        {{ $dato['nombre_cargo']}}

                                    </option>

                                @endforeach

                            </select>
                        </div>
                        @error('id_cargo')
                            <p class="text-red-500 text-xs mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>
                    <!-- Fecha -->
                    <div>
                        <label class="block mb-2 font-semibold text-gray-700">
                            Fecha de nacimiento
                        </label>

                        <input name="fecha" type="date"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 bg-white focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    @error('fecha_nacimiento')
                        <p class="text-red-500 text-xs mt-2">
                            {{ $message }}
                        </p>
                    @enderror

                    <!-- Funciones -->

                    <!-- Botones -->
                    <div class="flex justify-end gap-4 mt-10">

                        <a href="{{ route('empleados.index') }}"
                            class="px-6 py-3 rounded-xl bg-gray-200 hover:bg-gray-300 font-semibold transition">
                            Cancelar
                        </a>

                        <button type="submit"
                            class="px-8 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold shadow-lg transition">
                            Guardar Empleado
                        </button>

                    </div>
            </form>

        </div>

    </div>

    </div>
</x-layouts::app>