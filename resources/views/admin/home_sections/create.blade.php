@extends('admin.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-lg shadow overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-lg font-medium text-gray-900">Create Home Section</h2>
    </div>
    <form action="{{ route('home_sections.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
        @csrf
        <div class="grid grid-cols-1 gap-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="title_uz" class="block text-sm font-medium text-gray-700">Title (UZ)</label>
                    <input type="text" name="title_uz" id="title_uz" value="{{ old('title_uz') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
                </div>
                <div>
                    <label for="title_en" class="block text-sm font-medium text-gray-700">Title (EN)</label>
                    <input type="text" name="title_en" id="title_en" value="{{ old('title_en') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
                </div>
            </div>

            <div>
                 <label for="content_uz" class="block text-sm font-medium text-gray-700">Content (UZ)</label>
                 <textarea name="content_uz" id="content_uz" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">{{ old('content_uz') }}</textarea>
            </div>
            <div>
                 <label for="content_en" class="block text-sm font-medium text-gray-700">Content (EN)</label>
                 <textarea name="content_en" id="content_en" rows="5" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">{{ old('content_en') }}</textarea>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#F07F15] file:text-white hover:file:bg-[#d0690c]">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="order" class="block text-sm font-medium text-gray-700">Order</label>
                    <input type="number" name="order" id="order" value="{{ old('order', 0) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
                </div>
                <div class="flex items-center mt-6">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="h-4 w-4 text-[#F07F15] focus:ring-[#F07F15] border-gray-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-gray-900">Active</label>
                </div>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('home_sections.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-300 mr-2">Cancel</a>
                <button type="submit" class="bg-[#F07F15] text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-[#d0690c]">Create</button>
            </div>
        </div>
    </form>
</div>
@endsection
