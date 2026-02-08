@extends('admin.layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-lg font-medium text-gray-900">Edit Category</h2>
    </div>
    <form action="{{ route('categories.update', $category) }}" method="POST" class="p-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-6">
            <div>
                <label for="title_uz" class="block text-sm font-medium text-gray-700">Title (UZ)</label>
                <input type="text" name="title_uz" id="title_uz" value="{{ old('title_uz', $category->title_uz) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
            </div>

            <div>
                <label for="parent_id" class="block text-sm font-medium text-gray-700">Parent Category</label>
                <select name="parent_id" id="parent_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
                    <option value="">None (Root Category)</option>
                    @foreach($parents as $parent)
                        <option value="{{ $parent->id }}" {{ old('parent_id', $category->parent_id) == $parent->id ? 'selected' : '' }}>
                            {{ $parent->title_uz }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="title_en" class="block text-sm font-medium text-gray-700">Title (EN)</label>
                <input type="text" name="title_en" id="title_en" value="{{ old('title_en', $category->title_en) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
                    <option value="published" {{ old('status', $category->status) == 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ old('status', $category->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('categories.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-300 mr-2">Cancel</a>
                <button type="submit" class="bg-[#F07F15] text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-[#d0690c]">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
