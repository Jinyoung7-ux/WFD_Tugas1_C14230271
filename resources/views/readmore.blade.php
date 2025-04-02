@inject('Carbon', 'Illuminate\Support\Carbon')
@extends('layouts.base')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-4xl">
    <!-- Header -->
    <header class="mb-6">
        <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white mb-2">
            {{ $food->title }}
        </h1>
        <small class="text-gray-400 text-sm">
            Last updated: {{ $Carbon::parse($food->updated_at)->isoFormat('Do MMMM Y, h:mm:ss A') }}
        </small>
    </header>

    <!-- Gambar Makanan -->
    @if($food->image_url !== null)
    <div class="mb-8 rounded-lg overflow-hidden shadow-lg">
        <img class="w-full h-auto max-h-[28rem] object-cover" 
             src="{{ asset('storage/' . $food->image_url) }}" 
             alt="{{ $food->title }}" />
    </div>
    @endif

    <!-- Deskripsi -->
    <div class="prose prose-invert max-w-none mb-10">
        <p class="text-gray-300 leading-relaxed">
            {{ $food->description }}
        </p>
    </div>

    <!-- Tombol Action -->
    <div class="flex flex-wrap items-center gap-4 mt-8">
        <a href="{{ route('foods.edit', ['food' => $food->id]) }}" 
           class="inline-flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-full transition-colors duration-200 text-sm font-medium">
            Edit
        </a>
        
        <form action="{{ route('foods.destroy', ['food' => $food->id]) }}" method="POST">
            @csrf
            @method("DELETE")
            <button type="submit" 
                    class="inline-flex items-center px-5 py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-full transition-colors duration-200 text-sm font-medium">
                Delete
            </button>
        </form>
    </div>

    <!-- Tombol Back -->
    <a href="{{ route('foods.index') }}" 
       class="fixed bottom-5 left-5 inline-flex items-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-full shadow-lg transition-all duration-200 text-sm font-medium">
        Back to List
    </a>
</div>
@endsection