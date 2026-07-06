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
            <form action="{{ route('empleados.update', $datos['id']) }}" method="post">
                @method('PUT')
                <div class="p-8">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Nombre -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">
                                Nombre
                            </label>

                            <input name="nombre" type="text" placeholder="Ingrese el nombre"
                                value="{{ $datos['nombre'] }}"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>

                        <!-- Apellido -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">
                                Apellido
                            </label>

                            <input name="apellido" type="text" placeholder="Ingrese el apellido"
                                value="{{ $datos['apellido'] }}"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>

                        <!-- Salario -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">
                                Salario
                            </label>

                            <input name="salario" type="number" placeholder="$0" value="{{ $datos['salario'] }}"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>

                        <!-- Cargo -->
                        <div>
                            <label class="block mb-2 font-semibold text-gray-700">
                                Cargo
                            </label>

                            <select name="cargo" id="cargo"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 bg-white focus:ring-2 focus:ring-blue-500 outline-none">

                            </select>
                        </div>

                    </div>
                    <!-- Fecha -->
                    <div>
                        <label class="block mb-2 font-semibold text-gray-700">
                            Fecha
                        </label>

                        <input name="fecha" type="date" value="{{ $datos['fecha_nacimiento'] }}"
                            class="w-full rounded-xl border border-gray-300 px-4 py-3 bg-white focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>

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
    <script>
        //meteremos los 2 arrays para mostra en el select primero el cargo que tiene el empleado
        const cargoDelEmpleado = '{{ $datos['id_cargo'] }}';
        const todosLosCargos = @json($todosLosCargos);

        const cargoSelect = document.getElementById('cargo');
        for (let i = 0; i < todosLosCargos.length; i++) {
            const cargo = todosLosCargos[i];
            const option = document.createElement('option');
            option.value = cargo.id;
            option.textContent = cargo.nombre_cargo;
            if (cargo.id == cargoDelEmpleado) {
                option.selected = true;
                option.name = "cargo";
                option.style.backgroundColor = "green";
            }
            cargoSelect.appendChild(option);
        }
    </script>

</x-layouts::app>