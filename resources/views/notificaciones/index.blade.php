<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 class="text-4xl font-bold text-center mb-10">Mis Notificaciones</h1>

                    @forelse ($notificaciones as $notificacion)
                        
                        <div class=" p-5 border-b border-gray-700 gap-5  md:flex md:justify-between md:items-center">

                            <div class="">

                                <p class=" text-gray-400">
                                    Tienes un nuevo candidato en:
                                    <span class=" text-white font-bold">{{$notificacion->data['nombre_vacante']}}</span>
                                </p>

                                <p class=" text-gray-400">
                                    Hace: 
                                    <span class=" text-white font-bold">{{$notificacion->created_at->diffForHumans()}}</span>
                                </p>
                            </div>

                            <div class=" my-5 md:my-0">
                                <a href="#" class="p-3 bg-teal-500 font-bold rounded-lg">
                                    Ver Candidato 
                                </a>
                            </div>

                        </div>

                    @empty
                        
                        <p class=" text-center text-gray-500">
                            Parece que no tienes notificaciones.
                        </p>

                    @endforelse
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
