<div class="bg-slate-700 p-5 mt-10 flex flex-col justify-center items-center">
   <h3 class=" text-center text2xl font bold my-4">Postularme a esta Vacante</h3>

   @if (session()->has('mensaje'))
       
      <div class=" p-3 uppercase border border-green-500 bg-green-300 text-green-600 font-bold">
         {{session('mensaje')}}
      </div>

   @endif

   <form method="POST" wire:submit="subirCurriculum" class=" w-96 mt-5">

      <div class=" mb-4">

         <x-input-label for="cv" :value="__('Curriculum u Hoja de Vida')" />

         <x-text-input 

            id="cv" 
            class="block mt-1 w-full"
            type="file"
            accept=".pdf"
            wire:model="cv" 

         />

         @error('cv')
             
         
            @livewire('mostrar-alerta', ['message' => $message])
            

         @enderror

         <x-primary-button class=" w-full my-3 justify-center">
            {{__('Enviar Curriculum')}}
         </x-primary-button>

      </div>

   </form>

</div>
