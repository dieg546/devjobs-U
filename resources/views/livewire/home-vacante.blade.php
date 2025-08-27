<div>

    @livewire('filtrar-vacantes')

    <div class=" py-12">

        <div class=" max-w-7xl mx-auto">

            <h3 class=" font-extrabold text-4xl text-gray-300 mb-12">
                Nuestras Vacantes Disponibles
            </h3>   

            <div class=" bg-slate-600 shadow-sm rounded-lg p-6 divide-y divide-gray-300">

                @forelse ($vacantes as $vacante)
                    
                    <div class=" flex flex-col gap-5 md:gap-0 md:flex-row md:flex md:justify-between md:items-center py-5">

                        <div class=" md:flex-1">

                            <a 
                                href="{{route('vacantes.show',$vacante)}}"
                                class="text-3xl font-extrabold text-white"

                            >
                                {{$vacante->titulo}}
                            </a>

                            <p class=" text-base text-gray-300 font-bold mb-3">
                                {{$vacante->empresa}}
                            </p>

                            <p class=" text-base text-gray-300">
                                Ultimo dia para postularse:
                                <span class=" font-bold text-white">{{$vacante->ultimo_dia->format('d/m/Y')}}</span>
                            </p>

                        </div>

                        <div class="">
                            <a 
                                href="{{route('vacantes.show',$vacante)}}"
                                class="p-3 bg-teal-500 font-bold rounded-lg block text-center text-slate-800"
                            >
                                Ver Vacante
                            </a>
                        </div>

                    </div>

                @empty
                    
                    <p class=" p-3 text-center text-gray-400">
                        No hay vacantes disponibles
                    </p>

                @endforelse

            </div>

        </div>

    </div>
</div>
