@extends('layouts.main')

@section('content')
	@if (Session::has('status'))
		<div class="container flex flex-col md:flex-row w-1/3 justify-center mx-auto px-2 py-2">
			<p class="w-full h-full py-2 px-2 border-1 border-green-700 text-green-200 bg-green-500 rounded italic">{{ Session::get('status') }}</p>
		</div>
	@endif
	<div class="container flex flex-col md:flex-row justify-center mx-auto px-4 py-4">
		<form class="w-full max-w-lg" action="/articles" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="flex flex-wrap -mx-3 mb-6">
				<div class="w-full px-3 mb-6 md:mb-0">
					<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
						Title
					</label>
					<input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" 
						id="title" name="title" type="text" placeholder="Title">
					@if ($errors->has('title'))
						<p class="text-red-500 text-xs italic">{{ $errors->first('title') }}</p>
					@endif
				</div>
				<div class="w-full px-3">
					<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="description">
						Description
					</label>
					<textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" 
						id="description" name="description" type="text" placeholder="Description" rows="5"></textarea>
					@if ($errors->has('description'))
						<p class="text-red-500 text-xs italic">{{ $errors->first('description') }}</p>
					@endif
				</div>
			</div>
			<div class="flex flex-wrap -mx-3 mb-2">
				<div class="w-full px-3">
					<div class="w-full bg-grey-lighter">
						<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="file_path">
							File path
						</label>
						<input type="file" name="file_path" id="file_path" class="appearance-none block bg-orange-500 mt-2 rounded px-1 py-1
						text-gray-900 focus:outline-none hover:bg-orange-600 cursor-pointer">
					</div>
					@if ($errors->has('path'))
						<p class="text-red-500 text-xs italic">{{ $errors->first('path') }}</p>
					@endif
				</div>
			</div>
			<div class="flex flex-wrap -mx-3 mb-2">
				<div class="w-full md:w-2/3 px-3 mb-6 md:mb-0">
					<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="image_path">
						Image path
					</label>
					<input class="appearance-none block bg-orange-500 mt-2 rounded px-1 py-1
						text-gray-900 focus:outline-none hover:bg-orange-600 cursor-pointer" type="file" name="image_path" id="image_path">
				</div>
				<div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
					<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="type">
						Type
					</label>
					<div class="relative">
						<select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-2 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
							id="type" name="type">
							<option>Text</option>
							<option>Video</option>
						</select>
						<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
							<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
						</div>
					</div>
				</div>
			</div>
			<div class="w-1/3 -mx-3 px-3 pt-4 mb-6 md:mb-0">
				<button class="flex items-center bg-orange-500 text-gray-900
					rounded font-semibold px-3 py-2 hover:bg-orange-600
					transition ease-in-out duration-150">
					<span>Submit</span>
				</button>
			</div>
		</form>
    </div>		

@endsection