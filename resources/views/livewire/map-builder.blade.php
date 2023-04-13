<div class="container mx-auto bg-white m-2 rounded p-4">
    <div class="py-4">
        <main role="main" class="w-full">
            <h1 class="font-bold text-2xl">Hello, {{auth()->user()->name}}!  It is nice to see you in {{$map->name}}.</h1>
            <x-map.grid rows="{{$map->rows}}" columns="{{$map->columns}}" tiles="{{$map->metadata?->tiles}}"></x-map.grid>
        </main>
    </div>
</div>
