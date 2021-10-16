<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="w-full font-semibold text-xl text-gray-800 leading-tight">
                {{ __('SubCategory edit') }}
            </h2>
            <div class="min-wid-max">
                <a href="{{ route('subCategories.index') }}" class="p-2 bg-gray-800 text-white">Back</a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('subCategories.update', $subCategory->id) }}">
                        @csrf
                        @method('PUT')

                        <p class="mb-6">
                            <label for="name" class="w-full text-gray-600 text-sm uppercase">Name</label>
                            <input id="name" name="name" type="text" class="border p-3 w-full" value="{{ $subCategory->name }}">

                            @error('name')
                                <span class="block text-red-600">{{ $message }}</span>
                            @enderror
                        </p>

                        <p class="mb-6">
                            <label for="slug" class="w-full text-gray-600 text-sm uppercase">Description</label>
                            <input id="slug" name="slug" type="text" class="border p-3 w-full" value="{{ $subCategory->slug }}">
                        </p>

                        <p class="mb-6">
                            <label for="CategoryID" class="w-full text-gray-600 text-sm uppercase">Category</label>
                            <select name="CategoryID" id="CategoryID" class="border p-3 w-full">
                                <option value="">Select a Category</option>
                                @foreach ($categories as $item)
                                <option value="{{ $item->id }}" {{ $subCategory->CategoryID ===  $item->id ? 'selected' : ' '}}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </p>

                        <button type="submit" class="px-6 py-3 bg-gray-800 text-white">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
