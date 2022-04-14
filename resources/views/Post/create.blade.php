<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold leading-tight">
            {{ __('Create a Post') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

     <div class="my-5">
        @foreach ($errors->all() as $error)
            <span class="block text-red-500"> {{ $error }}</span>
        @endforeach
     </div>

        

        <form action="{{ route('posts.store') }}"method="post" enctype="multipart/form-data" class="mt-10">
            @csrf

            <x-label for="title" value="Title" />
            <x-input id="title" name="title" type="text" />

            <x-label for="body" value="Content" />
            <textarea id="body" name="Body" /></textarea>

            <x-label for="image" value="Picture" />
            <x-input id="image" name="immage" type="file" />

            <x-label for="category" value="Category" />

            <select name="category" id="category">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

            </select>


                <x-button style="display: block !important;" class="mt-10" >Create</x-button>




        </form>   

       
    </div>

</x-app-layout>