<x-app-layout>
    <x-slot name="header">
<div class="flex">
    <h2 class="w-full font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Categories') }}
    </h2>

    <div class="min-wid-max">
        <a href="{{ route('categories.create') }}" class="p-2 bg-green-800 text-white">Create</a>
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
                            <th class="border-l border-t px-2 py-1 text-center">Description</th>
                            <th class="border-l border-t px-2 py-1 text-center">Consumers</th>
                            <th class="border-l border-t px-2 py-1 text-center">Category Count</th>
                            <th class="border-l border-t px-2 py-1 text-center">Products</th>
                            <th class="border-l border-t px-2 py-1 text-center">Actions</th>
                        </tr>

                        @foreach ($categories as $category)
                               <tr>
                                   <td class="border-l border-t px-2 py-1 text-left">{{ $category->name }}</td>
                                   <td class="border-l border-t px-2 py-1 text-center">{{ $category->slug }}</td>
                                   <td class="border-l border-t px-2 py-1 text-center">{{ $category->userID }}</td>
                                   <td class="border-l border-t px-2 py-1 text-center">{{ $category->subCategory->count() }}</td>
                                   <td class="border-l border-t px-2 py-1 text-center">{{ $category->Product->count() }}</td>

                                   <td class="border-l border-t px-2 py-1 text-center">
                                       <a href="{{route('categories.edit', $category->id)}}" class="p-0 pl-2 pr-2 bg-blue-800 text-white">Edit</a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST">
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
