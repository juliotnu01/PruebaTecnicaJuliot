<div class="p-10">
    <div class="flex gap-2" x-data="{url_img: '', isBorrador:false, showModal: false }">
        <div class="h-[100vh] w-full max-w-[380px] shadow-md border-[1px] border-[#cfcfcf]">
            <div class=" p-4 text-[26px] font-bold border-b-[1px] border-b-[#cecece]">
                <p> Crear Proyecto</p>
            </div>
            <div class="p-4">
                <img :src="url_img== '' ? 'https://img2.freepng.es/20180428/isw/kisspng-lorem-ipsum-mountain-range-teufelsmauer-range-vector-5ae53f7d743805.5372050615249734374761.jpg' : url_img" alt="" srcset="">
            </div>
            <form wire:submit="store">
                <div class="flex flex-col w-11/12 mx-auto my-4 group">
                    <x-label for="titulo" value="Titulo" class="text-[15px] group-hover:text-blue-400" />
                    <x-input placeholder="Ingrese titulo" id="titulo" wire:model="titulo" />

                </div>
                <div class="flex flex-col w-11/12 mx-auto my-4 group">
                    <x-label for="descripcion" value="Descripcion" class="text-[15px] group-hover:text-blue-400" />
                    <textarea id="descripcion" wire:model="descripcion" placeholder="Ingrese descripcion" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"></textarea>

                </div>
                <div class="flex flex-col w-11/12 mx-auto my-4 group">
                    <div class="mb-3">
                        <x-label for="formFileLg" class="mb-2 inline-block text-neutral-700 " value="Selecciona una foto" />
                        <x-input wire:model="img" @change="url_img = URL.createObjectURL($event.target.files[0])" class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border border-solid border-neutral-300 bg-clip-padding px-3 py-[0.32rem] font-normal leading-[2.15] text-neutral-700 transition duration-300 ease-in-out file:-mx-3 file:-my-[0.32rem] file:cursor-pointer file:overflow-hidden file:rounded-none file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3 file:py-[0.32rem] file:text-neutral-700 file:transition file:duration-150 file:ease-in-out file:[border-inline-end-width:1px] file:[margin-inline-end:0.75rem] hover:file:bg-neutral-200 focus:border-primary focus:text-neutral-700 focus:shadow-te-primary focus:outline-none " id="formFileLg" type="file" />
                    </div>
                </div>
                <div class="flex  w-11/12 mx-auto my-4 group justify-end gap-2">
                    <div class="flex items-center justify-start space-x-2 cursor-pointer">
                        <input type="checkbox" id="toggle" class="hidden" :value="isBorrador" wire:model="isBorrador">
                        <label for="toggle" class="flex items-center cursor-pointer" @click="isBorrador = ! isBorrador">
                            <div :class="{'w-10 h-6 bg-green-400 rounded-full p-1': isBorrador, 'w-10 h-6 bg-orange-400 rounded-full p-1': !isBorrador}">
                                <div :class="{'w-4 h-4 bg-white rounded-full transform translate-x-0 transition-transform': !isBorrador, 'w-4 h-4 bg-white rounded-full transform translate-x-full transition-transform': isBorrador }"></div>
                            </div>
                            <span class="ml-2" x-text="isBorrador.toString() == 'false' ? 'Borrador' : 'Publicar'" />
                        </label>
                    </div>
                </div>
                <div class="w-full  text-center">
                    <x-button> Crear </x-button>
                </div>
            </form>
        </div>
        <div class="flex flex-col w-full ">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                    <div class="overflow-hidden">
                        <table class="min-w-full text-left text-sm font-light">
                            <thead class="border-b font-medium dark:border-neutral-500">
                                <tr>
                                    <th scope="col" class="px-6 py-4">#</th>
                                    <th scope="col" class="px-6 py-4">Titulo</th>
                                    <th scope="col" class="px-6 py-4">Descripcion</th>
                                    <th scope="col" class="px-6 py-4">Imagen</th>
                                    <th scope="col" class="px-6 py-4">Borrador</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($proyectos != null)
                                @foreach($proyectos as $key => $proyecto)
                                <tr class="border-b dark:border-neutral-500">
                                    <td class=" px-6 py-4 font-medium">{{ $proyecto->id }}</td>
                                    <td class=" px-6 py-4 max-w-xl break-words">{{ $proyecto->titulo }}</td>
                                    <td class=" px-6 py-4 max-w-xl break-words">{{ $proyecto->descripcion }}</td>
                                    <td class=" px-6 py-4">
                                        <img class="w-[36px] h-[26px]"  src="{{ $proyecto->url_img }}" />
                                    </td>
                                    <td class=" px-6 py-4">
                                        <div class="flex items-center justify-start space-x-2 cursor-pointer" x-data="{ isRegistroBorrador{!! $proyecto->id !!}: {!! $proyecto->isBorrador  !!} == 1 ? true : false }" >
                                            <input type="checkbox" id="toggle" class="hidden" :value="isRegistroBorrador{!! $proyecto->id !!}" wire:model="isBorrador">
                                            <label for="toggle" class="flex items-center cursor-pointer" @click="isRegistroBorrador{!! $proyecto->id !!} = ! isRegistroBorrador{!! $proyecto->id !!}" wire:click.prevent="toggleIsBorrador({{$key}})" >
                                                <div :class="{'w-10 h-6 bg-green-400 rounded-full p-1': isRegistroBorrador{!! $proyecto->id !!}, 'w-10 h-6 bg-orange-400 rounded-full p-1': !isRegistroBorrador{!! $proyecto->id !!}}">
                                                    <div :class="{'w-4 h-4 bg-white rounded-full transform translate-x-0 transition-transform': !isRegistroBorrador{!! $proyecto->id !!}, 'w-4 h-4 bg-white rounded-full transform translate-x-full transition-transform': isRegistroBorrador{!! $proyecto->id !!} }"></div>
                                                </div>
                                                <span class="ml-2" x-text="isRegistroBorrador{!! $proyecto->id !!}.toString() == 'false' ? 'Borrador' : 'Publicar'" />
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <button>
                                            <svg width="26px" height="26px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-black hover:text-yellow-500" >
                                                <path d="M5 15L4 16V20H8L14 14M18 10L21 7L17 3L14 6M18 10L17 11M18 10L14 6M14 6L7.5 12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                        <button wire:click.prevent="DeleteRegistro({{$proyecto->id}})">
                                            <svg width="26px" height="26px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-black hover:text-red-500" >
                                                <path d="M10 12V17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M14 12V17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M4 7H20" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </button>
                                        
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    <div>
<div>