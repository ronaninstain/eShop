<x-app-layout>
    <x-slot name="header">
<div class="flex">
    <h2 class="w-full font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Products') }}
    </h2>

    <div class="min-wid-max">
        <a href="{{ route('products.create') }}" class="p-2 bg-green-800 text-white">Create</a>
    </div>
</div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (Session::get('message'))
                     <div class="p-3 bg-green-200 mb-6">
                         {{ Session::get('message') }}
                     </div>
                    @endif
                    <Table class="w-full border-r border-b">
                        <tr>
                            <th class="border-l border-t px-2 py-1 text-left">Name</th>
                            <th class="border-l border-t px-2 py-1 text-center">Type</th>
                            <th class="border-l border-t px-2 py-1 text-center">Category</th>
                            <th class="border-l border-t px-2 py-1 text-center">Sub Category</th>
                            <th class="border-l border-t px-2 py-1 text-center">Actions</th>
                        </tr>

                        @foreach ($products as $product)
                               <tr>
                                   <td class="border-l border-t px-2 py-1 text-left">{{ $product->name }}</td>
                                   <td class="border-l border-t px-2 py-1 text-left">{{ $product->productType }}</td>
                                   <td class="border-l border-t px-2 py-1 text-center">{{ $product->productCategory->name ?? ""}}</td>
                                   <td class="border-l border-t px-2 py-1 text-center">{{ $product->productSub->name ?? ""}}</td>
                                   <td class="border-l border-t px-2 py-1 text-center">
                                       <a href="{{route('products.edit', $product->id)}}" class="p-0 pl-2 pr-2 bg-blue-800 text-white">Edit</a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-danger btn-block">Delete</button>
                                        </form>
                                   </td>
                               </tr>
                        @endforeach
                    </Table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
