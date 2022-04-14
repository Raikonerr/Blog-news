<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <img src="{{ asset("/storage/" . $post->immage) }}" alt="">

        <div>
            {{ $post->Body }}
        </div>


    
     </div>
       

</x-app-layout>