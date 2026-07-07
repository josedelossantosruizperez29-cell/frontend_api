<x-layouts::app :title="__('Dashboard')">
    <div class="max-w-7xl mx-auto px-6 py-10">


        <div class="flex items-center justify-between mb-10">

            <div>
                <h1 class="text-5xl font-bold text-white tracking-tight">
                    Todas las Funciones
                </h1>

                <p class="text-gray-400 mt-2 text-lg">
                    Administración de Funcioness.
                </p>
            </div>

            <a href="{{ route('funciones.create') }}" class="relative left-[740px] top-[-60px] bg-blue-600 hover:bg-blue-700 transition-all duration-300
       text-white px-6 py-3 rounded-2xl font-medium
       shadow-lg shadow-blue-500/20 inline-flex items-center gap-2 whitespace-nowrap">
                <span class="text-2xl">+</span>
                Crear una nueva function
            </a>
            <select name="cargo" id="cargo"
                class="w-full rounded-xl border border-gray-300 px-4 py-3 bg-white focus:ring-2 focus:ring-blue-500 outline-none">

                <option selected disabled>
                    Seleccione un cargo
                </option>
                @foreach ($todosLosCargos as $dato)
                    <option value="{{ $dato['id'] }}" {{ ($cargoFiltro == $dato['id']) ? 'selected' : ''  }}>
                        {{ $dato['nombre_cargo']}}

                    </option>

                @endforeach

            </select>

        </div>

        {{-- GRID --}}
        <div class="grid gap-8 [grid-template-columns:repeat(auto-fit,minmax(320px,1fr))]">

            @forelse($datos as $dato)


                <article class="group bg-white rounded-2xl
                                           border border-gray-100
                                           shadow-sm
                                           hover:shadow-2xl
                                           hover:-translate-y-1
                                           transition-all duration-300
                                           overflow-hidden">


                    <div class="p-6 pb-4 flex items-center gap-4 border-b border-gray-100">

                        <div class="w-14 h-14 shrink-0 rounded-2xl bg-blue-100
                                                flex items-center justify-center">
                            <span class="text-blue-600 text-2xl font-bold">
                                {{ strtoupper(substr($dato['descripcion_funcion'], 0, 1)) }}
                            </span>
                        </div>

                        <div class="min-w-0">
                            <h2 class="text-xl font-bold text-gray-800 truncate">
                                {{ $dato['descripcion_funcion'] }}
                            </h2>


                            <span class="inline-block mt-1 text-xs font-semibold text-blue-600
                                                     bg-blue-50 px-2.5 py-0.5 rounded-full">
                                Cargo
                            </span>
                        </div>

                    </div>


                    <div class="px-6 py-5">
                        <p class="text-gray-600 text-[15px] leading-relaxed">
                            {{ Str::limit($dato['descripcion_funcion'], 140) }}
                        </p>
                    </div>


                    <div class="px-6 pb-6 flex items-center gap-2">

                        <a href="{{ route('funciones.edit', $dato['id']) }}" class="flex-1 text-center px-4 py-2 rounded-xl
                                                   bg-gray-100 hover:bg-gray-200
                                                   text-gray-700 text-sm font-medium
                                                   transition">
                            Editar
                        </a>

                        <a href="{{ route('funciones.show', $dato['id']) }}" class="flex-1 text-center px-4 py-2 rounded-xl
                                                   bg-blue-600 hover:bg-blue-700
                                                   text-white text-sm font-medium
                                                   transition">
                            Ver
                        </a>

                        <form method="POST" action="{{ route('funciones.destroy', $dato['id']) }}">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-2 rounded-xl
                                                   bg-red-50 hover:bg-red-100
                                                   text-red-600
                                                   transition" title="Eliminar">
                                eliminar
                            </button>
                        </form>

                    </div>

                </article>

            @empty


                <div class="col-span-full">

                    <div class="bg-white rounded-3xl p-14 text-center shadow-lg">

                        <div class="text-7xl mb-5">

                        </div>

                        <h2 class="text-3xl font-bold text-gray-700 mb-3">
                            Actualmente no hay funciones registrados
                        </h2>

                        <p class="text-gray-500 mb-8">
                            AGREGA UNA FUNCION
                        </p>

                        <a href="{{ route('funciones.create') }}" class="inline-flex items-center gap-2
                                                   bg-blue-600 hover:bg-blue-700
                                                   text-white px-6 py-3 rounded-2xl
                                                   font-medium transition">
                            + Crear Funcion
                        </a>

                    </div>

                </div>

            @endforelse
        </div>
        @if($paginacion)
            <div class="flex justify-center gap-4 mt-8">

                @if($paginacion['prev_page_url'])
                    <a href="{{ route('funciones.index', ['page' => $paginacion['current_page'] - 1]) }}"
                        class="px-4 py-2 bg-gray-300 rounded">
                        Anterior
                    </a>
                @endif

                <span class="text-white">
                    Página {{ $paginacion['current_page'] }}
                    de
                    {{ $paginacion['last_page'] }}
                </span>

                @if($paginacion['next_page_url'])
                    <a href="{{ route('funciones.index', ['page' => $paginacion['current_page'] + 1]) }}"
                        class="px-4 py-2 bg-blue-600 text-white rounded">
                        Siguiente
                    </a>
                @endif

            </div>
        @endif

    </div>

    </div>

    <script>
        document.getElementById('cargo').addEventListener('change', function () {
            let id = this.value;
            if (id == "") {
                window.location.href = "{{ route('funciones.index') }}";
            } else {
                window.location.href = "{{ route('funciones.index') }}?cargo=" + id;
            }
        });
    </script>

</x-layouts::app>