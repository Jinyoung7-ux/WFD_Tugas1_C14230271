@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8 lg:gap-10">
        @foreach ($foods as $food)
        <div class="bg-gray-800 rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 w-full max-w-md mx-auto transform hover:-translate-y-1">
            <div class="aspect-w-16 aspect-h-9">
                <img class="w-full h-48 sm:h-56 object-cover" src="{{ asset('storage/'.$food->image_url) }}" alt="{{ $food->title }}" />
            </div>

            <div class="p-5 sm:p-6">
                <a href="#">
                    <h5 class="mb-2 text-xl sm:text-2xl font-bold text-white">{{$food->title}}</h5>
                </a>
                <p class="mb-4 text-sm sm:text-base text-gray-300 line-clamp-3">{{$food->description}}</p>
                <a href="{{route('foods.show', ['food' => $food->id])}}" class="inline-flex items-center px-4 py-2 text-sm sm:text-base font-medium text-center text-white bg-gradient-to-r from-red-600 to-red-500 hover:from-red-700 hover:to-red-600 rounded-full transition-all duration-300">
                    Read more
                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <a href="{{route('foods.create')}}" class="fixed bottom-5 right-5 sm:bottom-8 sm:right-8 group">
        <button type="button" class="text-white bg-gradient-to-br from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 font-medium rounded-full text-sm px-5 py-2.5 sm:px-6 sm:py-3 text-center shadow-lg transition-all duration-300 transform hover:scale-105 group-hover:shadow-xl">
            <span class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                <span class="hidden sm:inline">Add Food</span>
                <span class="sm:hidden">Add</span>
            </span>
        </button>
    </a>
</div>
@endsection