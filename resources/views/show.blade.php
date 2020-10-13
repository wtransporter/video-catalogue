@extends('layouts.main')

@section('content')

    <div class="movie-info border-b border-gray-800">
        <div class="container flex flex-col md:flex-row items-center mx-auto px-4 py-16">
            <img class="w-64 md:w-96" src="{{ asset('storage/'.$article->type.'/'.$article->image) }}" alt="Bloodshot">
            <div class="md:ml-24">
                <h2 class="text-4xl font-semibold pt-10">
                    {{ $article->title }}
                </h2>
                <div class="flex flex-wrap items-center text-sm text-gray-400">
                    <span>
                        <svg class="w-3 fill-current text-orange-500" viewBox="0 0 16 16" class="bi bi-star-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                        </svg>
                    </span>
                    <span class="ml-2">85%</span>
                    <span class="mx-2">|</span>
                    <span>Mar 13 2020</span>
                    <span class="mx-2">|</span>
                    <span>Action, Horor, SF, Drama</span>
                </div>

                <p class="text-gray-300 mt-8">
                    {{ $article->description }}
                </p>

                <div class="mt-8">
                    <h4 class="text-white font-semibold">
                        Cast
                    </h4>
                    <div class="flex mt-4">
                        <div>
                            <div>Bong John</div>
                            <div class="text-sm text-gray-400">Screenplay, Story</div>
                        </div>
                        <div class="ml-8">
                            <div>Huan John</div>
                            <div class="text-sm text-gray-400">Story</div>
                        </div>
                    </div>
                </div>

                <div class="mt-8">
                    <a href="{{ asset('storage/'.$article->type.'/'.$article->video) }}" type="iframe"
                    data-mediabox="1" data-mediabox-width="640" data-mediabox-height="480"
                    >
                        <button class="flex items-center focus:outline-none bg-orange-500 text-gray-900
                            rounded font-semibold px-3 py-2 hover:bg-orange-600
                            transition ease-in-out duration-150">
                            <svg class="w-6 fill-current" viewBox="0 0 16 16" class="bi bi-play-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/>
                            </svg>
                            <span class="ml-2">Play video</span>
                        </button>
                    </a>
                </div>
                @auth
                    <div class="mt-8">
                        <a href="{{ route('article.edit', $article->slug) }}">
                            <button class="flex items-center focus:outline-none bg-orange-500 text-gray-900
                                rounded font-semibold px-3 py-2 hover:bg-orange-600
                                transition ease-in-out duration-150">
                                <svg class="w-4 fill-current" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                                <span class="ml-2">Edit</span>
                            </button>
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div> <!-- End movie info -->

    <div class="move-cast border-b border-gray-800">

        <div class="container mx-auto px-4 py-10">
            <h2 class="text-4xl font-semibold">Cast</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                <div class="mt-8">
                    <a href="#">
                        <img src="/images/posters/Vin.jpg" alt="Bloodshot"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray-300">Vin Diesel</a>
                        <div class="text-gray-400 text-sm">Action, Horor, SF</div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="/images/posters/Vin.jpg" alt="Bloodshot"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray-300">Vin Diesel</a>
                        <div class="text-gray-400 text-sm">Action, Horor, SF</div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="/images/posters/Vin.jpg" alt="Bloodshot"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray-300">Vin Diesel</a>
                        <div class="text-gray-400 text-sm">Action, Horor, SF</div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="/images/posters/Vin.jpg" alt="Bloodshot"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray-300">Vin Diesel</a>
                        <div class="text-gray-400 text-sm">Action, Horor, SF</div>
                    </div>
                </div>
                <div class="mt-8">
                    <a href="#">
                        <img src="/images/posters/Vin.jpg" alt="Bloodshot"
                            class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="#" class="text-lg mt-2 hover:text-gray-300">Vin Diesel</a>
                        <div class="text-gray-400 text-sm">Action, Horor, SF</div>
                    </div>
                </div>
            </div>

        </div>
    </div> <!-- End movie cast -->
    
@endsection

