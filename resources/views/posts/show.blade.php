<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{ $post->name }}</h1>
        <div class="text-lg text-gray-500 mb-2">
            {!!$post->extract !!}
        </div>
        <div class="grid grid-cols-3 gap-6">
            {{-- Contenido principal --}}
            <div class="col-span-2">
                <figure>
                    @if ($post->image)
                        <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($post->image->url) }}"
                            alt="">
                    @else
                        <img class="w-full h-80 object-cover object-center"
                            src="https://cdn.pixabay.com/photo/2020/11/22/20/45/colorful-5767937_960_720.jpg"
                            alt="">
                    @endif
                </figure>
                <div class="text-base text-gray-500 mt-4">
                    {!!$post->body!!}
                </div>
            </div>
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Más en {{ $post->category->name }}</h1>
                <ul>
                    @foreach ($similares as $similar)
                        @if ($similar->id !== $post->id) {{-- Verificar si el post es diferente al actual --}}
                            <li class="mb-4">
                                <a class="flex" href="{{ route('posts.show', $similar) }}">
                                    @if ($similar->image)
                                        <img class="w-full h-80 object-cover object-center"
                                            src="{{ Storage::url($similar->image->url) }}" alt="">
                                    @else
                                        <img class="w-full h-80 object-cover object-center"
                                            src="https://cdn.pixabay.com/photo/2020/11/22/20/45/colorful-5767937_960_720.jpg"
                                            alt="">
                                    @endif
                                    <span class="m-2 text-gray-600">{{ $similar->name }}</span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </aside>            
        </div>
    </div>
</x-app-layout>
