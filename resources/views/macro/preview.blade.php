<div class="flex items-center justify-between p-4 m-4 bg-white rounded-md dark:bg-darker">   
    <div class="">
        <h2 class="text-2xl font-semibold"><a href="/macro/{{ $macro->id }}">{{ $macro->titulo }}</a></h2>
        <p class="text-gray-600">{{ $macro->descripcion }}</p>
        <p><a href="/macro/{{ $macro->id }}">[ Ver más... ]</a></p>
    </div>
</div>