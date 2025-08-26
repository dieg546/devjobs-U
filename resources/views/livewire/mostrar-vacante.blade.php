<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

        @forelse ($vacantes as $vacante)
            
            <div class="p-6 text-gray-900 border-b dark:text-gray-100  items-center gap-5  md:flex md:row md:justify-between ">
                
                <div class=" leading-10">
                    
                    <a href="{{route('vacantes.show',['vacante'=>$vacante])}}" class=" text-xl font-bold">
                        {{$vacante->titulo}}
                    </a>

                    <p class="text-sm text-gray-300 font-bold"> 
                        {{$vacante->empresa}}
                    </p>

                    <p class="text-sm text-gray-500 font-bold mt-2">
                        Ultimo Día: {{$vacante->ultimo_dia->format('d/m/Y')}}
                    </p>

                </div>

                <div class=" flex gap-3 items-stretch flex-col mt-5 md:mt-0 md:flex-row">

                    <a  
                        href="{{route('candidatos.index',$vacante)}}"
                        class=" p-2 bg-slate-200 text-black uppercase font-bold text-sm rounded-lg text-center"
                    >Candidatos</a>
                    <a 
                        href="{{route('vacantes.edit',['vacante'=>$vacante])}}"
                        class=" p-2 bg-blue-600 text-white uppercase font-bold text-sm rounded-lg text-center"
                    >Editar</a>
                    

                    {{-- dispatch Permite comunicacion con JS --}}
                    {{-- wire:click="eliminar({{$vacante->id}})"  --}}

                    <button
                        
                        onclick="eliminar('{{$vacante->id}}')" 
                        class=" p-2 bg-red-600 text-white uppercase font-bold text-sm rounded-lg text-center"
                    >Eliminar</button>

                </div>

            </div>

        @empty
            
            <p class=" text-center text-white font-bold p-3">Aun no tienes vacantes creadas, Crea una!</p>

        @endforelse

    </div>




</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
   
    <script>

        
        function eliminar(id){

            const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                    },
                    buttonsStyling: true
                });
                swalWithBootstrapButtons.fire({
                    title: "Estas seguro?", 
                    text: "Estas apunto de eliminar esta vacante!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Si, Eliminarla",
                    cancelButtonText: "No, cancelar!",  
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {

                        let vacante={}

                        Livewire.dispatch('eliminarVacante',[id]);

                        swalWithBootstrapButtons.fire({
                            title: "Eliminada!",
                            text: "Tu Vacante ha sido eliminada.",
                            icon: "success"
                        });
                    } else if (
                    /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({
                            title: "Cancelado",
                            text: "Tu vacante no ha sido eliminada.",
                            icon: "error"
                        });
                    }
                });

        }

        document.addEventListener('livewire:initialized',()=>{

            Livewire.on('mostrarAlerta',vacante=>{

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                    },
                    buttonsStyling: true
                });
                swalWithBootstrapButtons.fire({
                    title: "Estas seguro?",
                    text: "Estas apunto de eliminar esta vacante!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Si, Eliminarla",
                    cancelButtonText: "No, cancelar!",  
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {

                        console.log(vacante);

                        Livewire.dispatch('eliminarVacante',[vacante["vacante"]]);

                        swalWithBootstrapButtons.fire({
                            title: "Eliminada!",
                            text: "Tu Vacante ha sido eliminada.",
                            icon: "success"
                        });
                    } else if (
                    /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({
                            title: "Cancelado",
                            text: "Tu vacante no ha sido eliminada.",
                            icon: "error"
                        });
                    }
                });

            })

        });

    </script>

@endpush






