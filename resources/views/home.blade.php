@extends('layouts.app')

@section('content')
<div class="grid  gap-10 border-gray-200 rounded-lg shadow-sm mx-auto max-w-[90vw] @if(count($foods) == 1) grid-cols-1 place-foods-center
    @elseif(count($foods) == 2) grid-cols-2 justify-center
    @else grid-cols-3 @endif" controls>

    @foreach ($foods as $food)
    <div class="bg-gray-800 rounded-2xl shadow-lg max-w-[20em] w-full mx-auto">
        <div class="flex justify-center">
            <img class="rounded-t-lg w-full h-[200px] object-cover"
                src="{{ asset('storage/' . $food->image_url) }}"
                alt="{{ $food->title }}" />
        </div>



        <div class="p-5">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-red-700 dark:text-white">{{$food->title}}</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$food->description}}</p>
            <a href="{{route('foods.show', ['food' => $food->id])}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-full hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Read more
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>

    @endforeach
</div>

<a href="{{route('foods.create')}}">
    <button type="button" class="fixed bottom-5 left-5 text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-lg">
        Add
    </button>
</a>



@endsection