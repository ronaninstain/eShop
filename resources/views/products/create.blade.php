<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="w-full font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Add Product') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf


                        <p class="mb-6">
                            <label for="name" class="w-full text-gray-600 text-sm uppercase">Name</label>
                            <input id="name" name="name" type="text" class="border p-3 w-full" placeholder="product name">
                        </p>

                        <p class="mb-6">
                            <label for="productType" class="w-full text-gray-600 text-sm uppercase">Type</label>
                            <input id="productType" name="productType" type="text" class="border p-3 w-full" placeholder="product type">
                        </p>

                        <p class="mb-6">
                            <label for="CategoryID" class="w-full text-gray-600 text-sm uppercase">Category</label>
                            <select name="CategoryID" id="CategoryID" class="border p-3 w-full" >
                                <option value="">Category</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </p>
                        <p class="mb-6">
                            <label for="SubCategoryID" class="w-full text-gray-600 text-sm uppercase">Sub Category</label>
                            <select name="SubCategoryID" id="SubCategoryID" class="border p-3 w-full" >
                                <option value="">Sub Category</option>
                                @foreach ($subProducts as $subProduct)
                                    <option value="{{ $subProduct->id }}">{{ $subProduct->name }}</option>
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

