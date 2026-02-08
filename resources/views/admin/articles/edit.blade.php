@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-lg font-medium text-gray-900">Edit Article</h2>
    </div>
    <form action="{{ route('articles.update', $article) }}" method="POST" class="p-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="title_uz" class="block text-sm font-medium text-gray-700">Title (UZ)</label>
                    <input type="text" name="title_uz" id="title_uz" value="{{ old('title_uz', $article->title_uz) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
                </div>

                <div>
                    <label for="title_en" class="block text-sm font-medium text-gray-700">Title (EN)</label>
                    <input type="text" name="title_en" id="title_en" value="{{ old('title_en', $article->title_en) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="category_id" id="category_id" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }} class="font-bold">
                                {{ $category->title_uz }} (Parent)
                            </option>
                            @foreach($category->children as $child)
                                <option value="{{ $child->id }}" {{ old('category_id', $article->category_id) == $child->id ? 'selected' : '' }}>
                                    &nbsp;&nbsp;&mdash; {{ $child->title_uz }}
                                </option>
                            @endforeach
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
                        <option value="published" {{ old('status', $article->status) == 'published' ? 'selected' : '' }}>Published</option>
                        <option value="draft" {{ old('status', $article->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    </select>
                </div>
            </div>

            <div>
                <label for="content_uz" class="block text-sm font-medium text-gray-700 mb-2">Content (UZ)</label>
                <textarea name="content_uz" id="content_uz">{{ old('content_uz', $article->content_uz) }}</textarea>
            </div>

            <div>
                <label for="content_en" class="block text-sm font-medium text-gray-700 mb-2">Content (EN)</label>
                <textarea name="content_en" id="content_en">{{ old('content_en', $article->content_en) }}</textarea>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('articles.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-300 mr-2">Cancel</a>
                <button type="submit" class="bg-[#F07F15] text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-[#d0690c]">Update</button>
            </div>
        </div>
    </form>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#content_uz'))
        .catch(error => { console.error(error); });
    
    ClassicEditor
        .create(document.querySelector('#content_en'))
        .catch(error => { console.error(error); });
</script>
@endsection
