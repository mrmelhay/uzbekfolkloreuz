@extends('admin.layouts.app')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm font-medium">Categories</h3>
        <p class="text-3xl font-bold text-gray-900 mt-2">{{ \App\Models\Category::count() }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm font-medium">Child Categories</h3>
        <p class="text-3xl font-bold text-gray-900 mt-2">{{ \App\Models\Category::whereNotNull('parent_id')->count() }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm font-medium">Articles</h3>
        <p class="text-3xl font-bold text-gray-900 mt-2">{{ \App\Models\Article::count() }}</p>
    </div>
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-gray-500 text-sm font-medium">Pages</h3>
        <p class="text-3xl font-bold text-gray-900 mt-2">{{ \App\Models\Page::count() }}</p>
    </div>
</div>

<div class="bg-white rounded-lg shadow">
    <div class="px-6 py-4 border-b border-gray-200">
        <h2 class="text-lg font-medium text-gray-900">Welcome to Admin Panel</h2>
    </div>
    <div class="p-6">
        <p class="text-gray-600">Select an item from the sidebar to manage content.</p>
    </div>
</div>
@endsection
