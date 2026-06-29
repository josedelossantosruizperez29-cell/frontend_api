<x-layouts::app :title="__('Dashboard')">
    <div class="max-w-7xl mx-auto px-6 py-10">

        {{-- HEADER --}}
        <div class="flex items-center justify-between mb-10">
            

            <div>
                <h1 class="text-5xl font-bold text-white tracking-tight">
                    Empleados
                </h1>

                <p class="text-gray-400 mt-2 text-lg">
                    Administración de Empleados.
                </p>
            </div>

            <a href="{{ route('empleados.create') }}" class="relative left-[270px] bg-blue-600 hover:bg-blue-700 transition-all duration-300
                   text-white px-6 py-3 rounded-2xl font-medium
                   shadow-lg shadow-blue-500/20 flex items-center gap-2">
                <span class="text-2xl">+</span>
                Agregar Empleado
            </a>
            <a href="" class="hover:scale-110 transition"> <img class="w-6 h-6" src="https://i.postimg.cc/Qx8djyxX/papelera-de-reciclaje.png" alt="Papelera"></a>

        </div>

        {{-- GRID --}}
        <div class="grid gap-8 [grid-template-columns:repeat(auto-fit,minmax(320px,1fr))]">

            @forelse($datos as $dato)

                <article class="bg-white/95 backdrop-blur-sm
                           border border-gray-200
                           rounded-3xl
                           p-7
                           shadow-lg
                           hover:shadow-2xl
                           hover:-translate-y-1
                           transition-all duration-300">


                    <div class="flex items-start justify-between mb-5">

                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">
                                {{ $dato['nombre'] }}
                            </h2>

                            <p class="text-gray-500 text-sm mt-1">
                                EmpleaPro
                            </p>
                        </div>

                        <div class="w-12 h-12 rounded-2xl bg-blue-100 
                                    flex items-center justify-center">

                            <span class="text-blue-600 text-xl font-bold">
                                {{ strtoupper(substr($dato['nombre'], 0, 1)) }}
                            </span>

                        </div>

                    </div>


                    <p class="text-gray-600 leading-relaxed text-[15px] mb-6">
                        {{'Salario: ' .Str::limit($dato['salario'], 140) }}
                    </p>


                    <div class="flex items-center justify-between">

                        <span class="text-sm text-gray-400">
                            Laravel Project
                        </span>

                        <div class="flex gap-3">

                            <a href="#" class="px-4 py-2 rounded-xl
                                       bg-gray-100 hover:bg-gray-200
                                       text-gray-700 text-sm font-medium
                                       transition">
                                Editar
                            </a>

                            <a href="{{ route('empleados.detalle_empleado',$dato['id']) }}" class="px-4 py-2 rounded-xl
                                       bg-blue-600 hover:bg-blue-700
                                       text-white text-sm font-medium
                                       transition">
                                Ver
                            </a>
                            <form method="POST" action="{{route('empleados.destroy', $dato['id']) }}" >
                                @csrf
                                @method('DELETE')
                                <button class="px-4 py-2 rounded-xl
                                       bg-red-600 hover:bg-red-700
                                       text-white text-sm font-medium
                                       transition">
                                    Eliminar
                                </button>
                            </form>

                        </div>

                    </div>

                </article>

            @empty

                {{-- EMPTY STATE --}}
                <div class="col-span-full">

                    <div class="bg-white rounded-3xl p-14 text-center shadow-lg">

                        <div class="text-7xl mb-5">

                        </div>

                        <h2 class="text-3xl font-bold text-gray-700 mb-3">
                            No tienes proyectos
                        </h2>

                        <p class="text-gray-500 mb-8">
                            Comienza creando tu primer proyecto.
                        </p>

                        <a href="" class="inline-flex items-center gap-2
                                   bg-blue-600 hover:bg-blue-700
                                   text-white px-6 py-3 rounded-2xl
                                   font-medium transition">
                            + Crear proyecto
                        </a>

                    </div>

                </div>

            @endforelse

        </div>

    </div>

</x-layouts::app>