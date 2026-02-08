@extends('admin.layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white rounded-lg shadow overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-lg font-medium text-gray-900">Upload Media</h2>
    </div>
    <form action="{{ route('media.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
        @csrf
        <div class="grid grid-cols-1 gap-6">
            <div>
                <label for="file" class="block text-sm font-medium text-gray-700">File</label>
                <input type="file" name="file" id="file" required class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#F07F15] file:text-white hover:file:bg-[#d0690c]">
                <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
            </div>

            <div>
                <label for="alt_text_uz" class="block text-sm font-medium text-gray-700">Alt Text (UZ)</label>
                <input type="text" name="alt_text_uz" id="alt_text_uz" value="{{ old('alt_text_uz') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
            </div>

            <div>
                <label for="alt_text_en" class="block text-sm font-medium text-gray-700">Alt Text (EN)</label>
                <input type="text" name="alt_text_en" id="alt_text_en" value="{{ old('alt_text_en') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
            </div>

            <div class="flex justify-end">
                <a href="{{ route('media.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-300 mr-2">Cancel</a>
                <button type="submit" class="bg-[#F07F15] text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-[#d0690c]">Upload</button>
            </div>
        </div>
    </form>
</div>
@endsection
