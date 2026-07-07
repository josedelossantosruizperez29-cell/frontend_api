<x-layouts::app :title="__('Dashboard')">
    <div class="min-h-screen bg-slate-100 flex items-center justify-center p-8">

        <div class="w-full max-w-4xl bg-white rounded-3xl shadow-2xl overflow-hidden">

            <!-- Encabezado -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-8 py-6">
                <h1 class="text-3xl font-bold text-white">
                    Registrar fucnion cargo
                </h1>

                <p class="text-blue-100 mt-2">
                    Complete la información funcion cargo
                </p>
            </div>

            <!-- Contenido -->
            <form action="{{ route('funciones.update', $datos['id']) }}" method="post">
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
                                value="{{ $datos['descripcion_funcion'] }}"
                                class="w-full rounded-xl border border-gray-300 px-4 py-3 focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>
                        @error('nombre_cargo')
                            <p class="text-red-500 text-xs mt-2">
                                {{ $message }}
                            </p>
                        @enderror


                        <!-- Funciones -->

                        <!-- Botones -->
                        <div class="flex justify-end gap-4 mt-10">

                            <a href="{{ route('funciones.index') }}"
                                class="px-6 py-3 rounded-xl bg-gray-200 hover:bg-gray-300 font-semibold transition">
                                Cancelar
                            </a>

                            <button type="submit"
                                class="px-8 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white font-semibold shadow-lg transition">
                                actualizar fucnion
                            </button>

                        </div>
            </form>

        </div>

    </div>

    </div>

</x-layouts::app>