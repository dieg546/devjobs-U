<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Candidatos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 class=" text-4xl font-bold text-center mb-10 text-slate-500">
                        Candidatos de Vacante: <span class="  text-white font-bold">{{$vacante->titulo}}</span>
                    </h1>

                    <div class=" md:flex md:justify-center p-5">

                        <ul class=" divide-y divide-white w-full">

                            @forelse ($vacante->candidato as $candidato)
                                
                                <li class=" p-3 flex items-center">

                                    <div class=" flex-1">
                                        <p class=" text-xl  text-white font-bold">
                                            {{$candidato->user->name}}
                                        </p>

                                        <p class=" text-md font-medium text-gray-400">
                                            {{$candidato->user->email}}
                                        </p>

                                        <p class=" text-md font-medium text-gray-400">
                                            Dia que se postulo: <span class=" font-normal text-white">{{$candidato->created_at->diffForHumans()}}</span>
                                        </p>

                                    </div>

                                    <div>

                                        <a 
                                            href="{{asset('storage/cvs/' . $candidato->cv)}}"
                                            class=" inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm 
                                            leading-5 font-medium rounded-full bg-white text-black hover:bg-slate-400"
                                            target="_blank"
                                            rel="noreferrer noopener"
                                        >
                                            Ver CV
                                        </a>

                                    </div>

                                </li>

                            @empty
                                
                                <p class=" p-3 text-center text-sm text-gray-500">Parece que aun no tienes candidatos</p>

                            @endforelse

                        </ul>

                    </div>
    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
