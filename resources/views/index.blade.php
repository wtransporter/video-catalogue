@extends('layouts.main')

@section('content')
    
    <div class="container mx-auto px-4 pt-16">
        <div class="popular-movies">
            <h2 class="uppercase text-orange-500 font-semibold tracking-wider text-lg">
                Popular movies
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @for ($i = 0; $i < 10; $i++)
                    <x-video-card />
                @endfor
            </div>
        </div><!-- End Popular movies -->

        <div class="now-playing-movies py-24">
            <h2 class="uppercase text-orange-500 font-semibold pt-16 tracking-wider text-lg">
                Now playing
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @for ($i = 0; $i < 10; $i++)
                    <x-video-card />
                @endfor
            </div>
        </div><!-- End now playing -->
    </div>

@endsection