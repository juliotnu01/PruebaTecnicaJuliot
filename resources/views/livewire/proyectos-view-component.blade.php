<div class="h-[90vh] w-[90vw] " >
    <div class="my-10 border-y-[5px] border-y-red-500 text-center text-[60px] w-6/12 mx-auto font-bold  " >
        <p>Portafolio</p>
    </div>
    <div class="w-11/12 mx-auto mt-4 h-full  grid grid-cols-3 gap-4 " >
        @foreach($proyectos as $key => $proyecto) Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas sint aspernatur illo nemo eum, veritatis veniam suscipit, sequi ullam quo corrupti sunt rerum atque. Voluptatum recusandae excepturi sequi inventore vero.
            <div class="w-11/12 bg-no-repeat relatieve h-96 bg-yellow-500 bg-local bg-cover bg-center group"  style="background-image: url(' {{ $proyecto->url_img }} ')">
                <div class="bg-red-600 opacity-80 text-white p-4 h-full w-full hidden group-hover:block" >
                    <div class="  border-white border-[2px] w-full h-full p-4 font-bold" >
                        <p class="text-[30px] mb-4 " > {{ $proyecto->titulo }} </p>
                        <p>
                            {{ $proyecto->descripcion  }}
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
