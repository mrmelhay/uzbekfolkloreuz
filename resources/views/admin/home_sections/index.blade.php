@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
        <h2 class="text-lg font-medium text-gray-900">Home Sections (Text + Image)</h2>
        <a href="{{ route('home_sections.create') }}" class="bg-[#F07F15] text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-[#d0690c]">
            Add New
        </a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title (UZ)</th>
                     <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($sections as $section)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $section->order }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($section->image)
                            <img src="{{ $section->image }}" class="h-10 w-16 object-cover rounded">
                        @else
                            <span class="text-gray-400">No image</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $section->title_uz }}</td>
                     <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $section->is_active ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ $section->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <a href="{{ route('home_sections.edit', $section) }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded shadow transition duration-200 ease-in-out mr-2">Edit</a>
                        <form action="{{ route('home_sections.destroy', $section) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded shadow transition duration-200 ease-in-out" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
