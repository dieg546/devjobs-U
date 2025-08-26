<div class="md:w-1/2 ">

    <form class="space-y-5" enctype="multipart/form-data" wire:submit.prevent='crearVacante' method="POST">
        <div class="w-full">
            <x-input-label for="titulo" :value="__('Titulo Vacante')" />

            <x-text-input id="titulo" 
                class="block mt-1 w-full p-3" 
                type="text" wire:model="titulo" 
                :value="old('titulo')" 
                placeholder="Titulo Vacante"            
            />

            @error('titulo')
                @livewire('mostrar-alerta',['message' => $message])
            @enderror

        </div>

        <div class="w-full">
            <x-input-label for="salario" :value="__('Salario Mensual')" />

            <select wire:model="salario" id="salario" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
                <option value="">-- Selecciona un salario --</option>

                @foreach ($salarios as $salario)
                    <option value="{{$salario->id}}">{{$salario->salario}}</option>    
                @endforeach
            </select>

            @error('salario')
                @livewire('mostrar-alerta',['message' => $message])
            @enderror

        </div>

        <div class="w-full">
            <x-input-label for="categoria" :value="__('Categoria')" />

            <select wire:model="categoria" id="categoria" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm w-full">
            
                <option value="">-- Selecciona una categoria --</option>

                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>    
                @endforeach
            </select>

            @error('categoria')
                @livewire('mostrar-alerta',['message' => $message])
            @enderror


        </div>

        <div class="w-full">
            <x-input-label for="empresa" :value="__('Empresa')" />

            <x-text-input id="empresa" 
                class="block mt-1 w-full p-3" 
                type="text" wire:model="empresa" 
                :value="old('empresa')" 
                placeholder="Empresa"            
            />

            @error('empresa')
                @livewire('mostrar-alerta',['message' => $message])
            @enderror


        </div>

        <div class="w-full">
            <x-input-label for="ultimo_dia" :value="__('Ultimo dia para postularse')" />

            <x-text-input id="ultimo_dia" 
                class="block mt-1 w-full p-3" 
                type="date" wire:model="ultimo_dia" 
                :value="old('ultimo_dia')" 
                           
            />

            @error('ultimo_dia')
                @livewire('mostrar-alerta',['message' => $message])
            @enderror


        </div>

        <div class="w-full">
            <x-input-label for="descripcion" :value="__('Descripcion Vacante')" />

            <textarea wire:model="descripcion" 
                id="descripcion" 
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 
                    focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 
                    dark:focus:ring-indigo-600 rounded-md shadow-sm w-full h-72"
            ></textarea>

            @error('descripcion')
                @livewire('mostrar-alerta',['message' => $message])
            @enderror


        </div>

        <div class="w-full">
            <x-input-label for="imagen" :value="__('Imagen Aqui')" />

            <x-text-input id="imagen" 
                class="block mt-1 w-full p-3" 
                type="file" wire:model="imagen"
                accept="image/*" 
                             
            />

            <div class="my-5">

                @if ($imagen)
                    
                    <img src="{{$imagen->temporaryUrl()}}" alt="imagen vacante">

                @endif

            </div>

            @error('imagen')
                @livewire('mostrar-alerta',['message' => $message])
            @enderror


        </div>

        <x-primary-button class="w-full justify-center">

            Crear Vacante

        </x-primary-button>

    </form>
</div>
 