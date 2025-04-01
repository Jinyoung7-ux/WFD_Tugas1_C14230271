@inject('Carbon', 'Illuminate\Support\Carbon')
@extends('layouts.base')

@section('content')
<h1 class="mb-1 text-4xl font-bold tracking-tight text-white sm:text-5xl">{{ $food->title }}</h1>
<small class="text-base text-gray-500">{{ $Carbon::parse($food->updated_at)->isoFormat('Do MMMM Y, h:mm:ss A') }}</small>
@if($food->image_url !== null)
<img class="mx-auto w-[35em] h-[22em] mt-3" src="{{ asset('storage/' . $food->image_url) }}" />
@endif
<p class="mt-6 text-base text-gray-300 max-w-[41em] text-justify break-words">{{ $food->description }}</p>

<button>
    <a href="{{ route('foods.index') }}" class="fixed bottom-5 left-5 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-lg">Back</a>
</button>

<div class="mt-1 flex gap-3">
    <a href="{{ route('foods.edit', ['food' => $food->id]) }}">
        <button class="bg-blue-700 text-white px-5 py-1 rounded-full ">Edit</button>
    </a>
    <form action="{{ route('foods.destroy', ['food' => $food->id]) }}" method="POST" class="ml-1">
        @csrf
        @method("DELETE")
        <button class="bg-red-700 px-5 text-white py-1 rounded-full">Delete</button>
    </form>
</div>

@endsection