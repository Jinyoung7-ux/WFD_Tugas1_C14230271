@extends('layouts.base')

@section('content')
<h1 class="mb-1 text-4xl font-bold tracking-tight text-white sm:text-5xl">{{ Str::title($mode) }} Food</h1>
    <form action="{{ $mode == 'ADD' ? route('foods.store') : route('foods.update', ['food' => $foods->id]) }}"
        method="POST" enctype="multipart/form-data">
        @csrf
        @if ($mode !== 'ADD')
            @method('PUT')
        @endif

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-4">
                <label for="title" class="block text-sm/6 font-medium text-gray-300">Title</label>
                <div class="mt-2">
                    <div
                        class="flex items-center rounded-md pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-white">
                        <input type="text" name="title" id="title"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-white placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="Title" value="{{ $mode !== 'ADD' ? $foods->title : '' }}" />
                    </div>
                </div>
                @error('title')
                    <div class="text-red-700">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-span-full">
                <label for="content" class="block text-sm/6 font-medium text-gray-300">Description</label>
                <div class="mt-2">
                    <textarea name="description" id="description" rows="3"
                        class="text-white caret-white border border-gray-300 block w-full rounded-md px-3 py-1.5 text-base -outline-offset-1 outline-white placeholder:text-gray-400 focus-within:outline-2 focus-within:-outline-offset-2 focus:outline-none focus-within:outline-white focus:border-white focus:border-2 sm:text-sm/6"
                        placeholder="Food description...">{{ $mode !== 'ADD' ? $foods->description : '' }}</textarea>
                </div>
                @error('content')
                    <div class="text-red-700">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-span-full">
                <label for="image" class="block text-sm/6 font-medium text-gray-300">Image</label>
                <div class="mt-2">
                    <div
                        class="flex items-center rounded-md pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-white">
                
                        <input type="file" name="image" id="image"
                            class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-400   placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                            placeholder="Image">
                    </div>
                </div>
                @error('image')
                    <div class="text-red-700">{{ $message }}</div>
                @enderror
            </div>

            <button
                class="inline-flex items-center gap-2 justify-center rounded-full py-2 px-3 text-sm outline-offset-2 transition active:transition-none bg-blue-500 font-semibold text-zinc-100 hover:bg-zinc-700 active:bg-zinc-800 active:text-zinc-100/70 flex-none"
                type="submit">Save</button>
            <a href="{{ route('foods.index') }}">
                <button
                    class="inline-flex items-center gap-2 justify-center rounded-full py-2 px-3 text-sm outline-offset-2 transition active:transition-none bg-blue-500 font-semibold text-zinc-100 hover:bg-zinc-700 active:bg-zinc-800 active:text-zinc-100/70 flex-none"
                    type="button">Cancel</button>
            </a>
        </div>
    </form>
@endsection