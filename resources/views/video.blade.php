@extends('layouts.main')

@section('content')
    <div class="container mx-auto flex flex-col md:flex-row justify-center py-16">
        <video id="myVideo" width="920" height="706" controls autoplay='true' loop='true'
            class="focus:outline-none">
            <source src="/videos/{{ $file }}" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
    </div>
@endsection