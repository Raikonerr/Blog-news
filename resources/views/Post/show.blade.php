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

     {{-- Comments --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          
                @foreach($post->comments as $comment)
                <h4 style="color: Orange">{{ $comment->user->name }}</h4>
                <p>{{ $comment->body }}</p>
            <div class="container mx-auto ">
                <div class="columns-2">
                <a href="{{ route('comment.update', $comment->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('comment.destroy', $comment->id) }}" method="">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
            </div>

        





                @endforeach
                
            </div>
        </div> 

            {{-- input create comment --}}
            <form action="{{ route('comments.addPostComment', $post) }}" method="POST">
                @csrf
                <div class="flex items-center">
                    <input type="text" name="body" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" placeholder="Comment">
                    <button type="submit" class="bg-blue-400 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        {{ __('Comment') }}
                    </button>
                    

                   
                </div>
            </form>
            
       

</x-app-layout>