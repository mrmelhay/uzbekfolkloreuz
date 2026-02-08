@extends('admin.layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-lg shadow overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-lg font-medium text-gray-900">Edit Slider</h2>
    </div>
    <form action="{{ route('sliders.update', $slider) }}" method="POST" enctype="multipart/form-data" class="p-6">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 gap-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="title_uz" class="block text-sm font-medium text-gray-700">Title (UZ)</label>
                    <input type="text" name="title_uz" id="title_uz" value="{{ old('title_uz', $slider->title_uz) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
                </div>
                <div>
                    <label for="title_en" class="block text-sm font-medium text-gray-700">Title (EN)</label>
                    <input type="text" name="title_en" id="title_en" value="{{ old('title_en', $slider->title_en) }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="subtitle_uz" class="block text-sm font-medium text-gray-700">Subtitle (UZ)</label>
                    <input type="text" name="subtitle_uz" id="subtitle_uz" value="{{ old('subtitle_uz', $slider->subtitle_uz) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
                </div>
                <div>
                    <label for="subtitle_en" class="block text-sm font-medium text-gray-700">Subtitle (EN)</label>
                    <input type="text" name="subtitle_en" id="subtitle_en" value="{{ old('subtitle_en', $slider->subtitle_en) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
                </div>
            </div>

            <div>
                 <label for="description_uz" class="block text-sm font-medium text-gray-700">Description (UZ)</label>
                 <textarea name="description_uz" id="description_uz" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">{{ old('description_uz', $slider->description_uz) }}</textarea>
            </div>
            <div>
                 <label for="description_en" class="block text-sm font-medium text-gray-700">Description (EN)</label>
                 <textarea name="description_en" id="description_en" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">{{ old('description_en', $slider->description_en) }}</textarea>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Desktop Image</label>
                    @if($slider->image)
                        <div class="mb-2">
                            <img src="{{ $slider->image }}" alt="Current Image" class="h-20 w-auto rounded">
                        </div>
                    @endif
                    <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#F07F15] file:text-white hover:file:bg-[#d0690c]">
                    <p class="mt-1 text-xs text-gray-500">Leave empty to keep current image</p>
                </div>
                <div>
                    <label for="image_mobile" class="block text-sm font-medium text-gray-700">Mobile Image (Optional)</label>
                    @if($slider->image_mobile)
                        <div class="mb-2">
                            <img src="{{ $slider->image_mobile }}" alt="Current Mobile Image" class="h-20 w-auto rounded">
                        </div>
                    @endif
                    <input type="file" name="image_mobile" id="image_mobile" class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#F07F15] file:text-white hover:file:bg-[#d0690c]">
                    <p class="mt-1 text-xs text-gray-500">Leave empty to keep current image</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="button_text_uz" class="block text-sm font-medium text-gray-700">Button Text (UZ)</label>
                    <input type="text" name="button_text_uz" id="button_text_uz" value="{{ old('button_text_uz', $slider->button_text_uz) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
                </div>
                <div>
                    <label for="button_text_en" class="block text-sm font-medium text-gray-700">Button Text (EN)</label>
                    <input type="text" name="button_text_en" id="button_text_en" value="{{ old('button_text_en', $slider->button_text_en) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
                </div>
                <div>
                    <label for="button_url" class="block text-sm font-medium text-gray-700">Button URL</label>
                    <input type="text" name="button_url" id="button_url" value="{{ old('button_url', $slider->button_url) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="order" class="block text-sm font-medium text-gray-700">Order</label>
                    <input type="number" name="order" id="order" value="{{ old('order', $slider->order) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border p-2">
                </div>
                <div class="flex items-center mt-6">
                    <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $slider->is_active) ? 'checked' : '' }} class="h-4 w-4 text-[#F07F15] focus:ring-[#F07F15] border-gray-300 rounded">
                    <label for="is_active" class="ml-2 block text-sm text-gray-900">Active</label>
                </div>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('sliders.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md text-sm font-medium hover:bg-gray-300 mr-2">Cancel</a>
                <button type="submit" class="bg-[#F07F15] text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-[#d0690c]">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
