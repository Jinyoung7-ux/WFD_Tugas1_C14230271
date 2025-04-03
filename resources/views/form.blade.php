@extends('layouts.base')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="mb-8 text-3xl font-bold tracking-tight text-white sm:text-4xl">{{ Str::title($mode) }} Food</h1>
    
    <form action="{{ $mode == 'ADD' ? route('foods.store') : route('foods.update', ['food' => $foods->id]) }}" 
          method="POST" enctype="multipart/form-data" 
          class="space-y-8">
        @csrf
        @if ($mode !== 'ADD')
            @method('PUT')
        @endif

        <!-- Judul -->
        <div class="space-y-2">
            <label for="title" class="block text-sm font-medium text-gray-300">Title</label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <input type="text" name="title" id="title"
                       class="block w-full rounded-md border-0 py-2 px-3 bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                       placeholder="Enter food title"
                       value="{{ $mode !== 'ADD' ? $foods->title : old('title') }}">
            </div>
            @error('title')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>











        

        <!-- Deskripsi -->
        <div class="space-y-2">
            <label for="description" class="block text-sm font-medium text-gray-300">Description</label>
            <div class="mt-1">
                <textarea name="description" id="description" rows="4"
                          class="block w-full rounded-md border-0 py-2 px-3 bg-gray-700 text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                          placeholder="Enter food description">{{ $mode !== 'ADD' ? $foods->description : old('description') }}</textarea>
            </div>
            @error('description')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <!-- Gambar -->
        <div class="space-y-2">
            <label for="image" class="block text-sm font-medium text-gray-300">Image</label>
            <div class="mt-1">
                <input type="file" name="image" id="image"
                       class="block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-500 file:text-white hover:file:bg-blue-600">
            </div>
            @error('image')
                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
            @enderror
            @if($mode !== 'ADD' && $foods->image_url)
                <div class="mt-2">
                    <span class="text-xs text-gray-400">Current image:</span>
                    <img src="{{ asset('storage/'.$foods->image_url) }}" alt="Current food image" class="mt-1 h-20 rounded-full">
                </div>
            @endif
        </div>

        <!-- Tombol -->
        <div class="flex flex-col sm:flex-row gap-3 pt-4">
            <button type="submit"
                    class="inline-flex justify-center rounded-full bg-blue-600 py-2 px-4 text-sm font-semibold text-white shadow-sm hover:bg-blue-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600 transition-colors duration-200">
                Save
            </button>
            <a href="{{ route('foods.index') }}"
               class="inline-flex justify-center rounded-full bg-gray-600 py-2 px-4 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600 transition-colors duration-200 text-center">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection