<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold leading-tight">
            {{ __('Welcome what\'s on your mind ?') }}
        </h2>
    </x-slot>
    <div class="overflow-x-hidden bg-gray-100">
       
    
        <div class="px-6 py-8">
            <div class="container flex justify-between mx-auto">
                <div class="w-full lg:w-8/12">
                    <div class="flex items-center justify-between">
                        <h1 class="text-xl font-bold text-gray-700 md:text-2xl">Post</h1>
                        <div>
                            <select class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option>Latest</option>
                                <option>Last Week</option>
                            </select>
                        </div>
                    </div>
                    @foreach($posts as $post)
                    <div class="mt-6">
                        <div class="max-w-4xl px-10 py-6 mx-auto bg-white rounded-lg shadow-md">
                            <div class="flex items-center justify-between">
                                <span class="font-light text-gray-600">{{ $post->created_at->format('d M Y h:m') }}</span>
                                <a href="#"
                                    class="px-2 py-1 font-bold text-gray-100 bg-gray-600 rounded hover:bg-gray-500">
                                    {{ $post->category->name}}
                                </a>
                            </div>
                            <div class="mt-2">
                                    <a href="#" class="text-2xl font-bold text-gray-700 hover:underline">
                                       {{ $post->title }}
                                    </a>
                                    <p class="mt-2 text-gray-600">
                                        {{ Str::limit($post->Body, 120) }}
                                    </p>
                            </div>
                            <div class="flex items-center justify-between mt-4"><a href="{{ route('posts.show', $post) }}" class="text-gray-600 hover:text-gray-500">Read more</a>
                                <div>
                                    <a href="#" class="flex items-center">
                                        <img src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=731&amp;q=80"
                                            alt="avatar" class="hidden object-cover w-10 h-10 mx-4 rounded-full sm:block">
                                        <h1 class="font-bold text-gray-700 hover:underline">
                                            {{ $post->user->name }}
                                        </h1>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                   @endforeach
                    <div class="mt-8">
                        <div class="flex">
                            <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-500 bg-white rounded-md cursor-not-allowed">
                                previous
                            </a>
                        
                            <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                                1
                            </a>
                        
                            <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                                2
                            </a>
                        
                            <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                                3
                            </a>
                        
                            <a href="#" class="px-3 py-2 mx-1 font-medium text-gray-700 bg-white rounded-md hover:bg-blue-500 hover:text-white">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
                @include('partials.sidebar')
            </div>
        </div>
       @include('partials.footer')
    </div>

</x-app-layout>