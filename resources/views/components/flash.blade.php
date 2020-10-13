@if (Session::has('status'))
<div class="container flex flex-col md:flex-row w-1/3 justify-center mx-auto px-2 py-2">
    <p class="w-full h-full py-2 px-2 border-1 border-green-700 text-green-200 bg-green-500 rounded italic">{{ Session::get('status') }}</p>
</div>
@endif