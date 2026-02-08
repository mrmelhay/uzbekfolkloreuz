@extends('admin.layouts.app')

@section('content')
<div class="bg-white rounded-lg shadow overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
        <h2 class="text-lg font-medium text-gray-900">Media Library</h2>
        <a href="{{ route('media.create') }}" class="bg-[#F07F15] text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-[#d0690c]">
            Upload New
        </a>
    </div>
    <div class="p-6 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
        @foreach($media as $item)
        <div class="group relative bg-gray-50 rounded-lg p-2 border hover:shadow-md transition">
            <div class="aspect-w-1 aspect-h-1 mb-2 overflow-hidden rounded bg-gray-200">
                <img src="{{ $item->path }}" alt="{{ $item->alt_text_uz }}" class="object-cover w-full h-32">
            </div>
            <p class="text-xs text-gray-500 truncate" title="{{ $item->filename }}">{{ $item->filename }}</p>
            <div class="flex justify-between items-center mt-2">
                <button onclick="copyToClipboard('{{ $item->path }}')" class="bg-blue-600 hover:bg-blue-700 text-white text-xs font-bold py-1 px-2 rounded shadow transition duration-200 ease-in-out">Copy URL</button>
                <form action="{{ route('media.destroy', $item) }}" method="POST" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white text-xs font-bold py-1 px-2 rounded shadow transition duration-200 ease-in-out" onclick="return confirm('Delete this file?')">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $media->links() }}
    </div>
</div>

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        alert('URL copied to clipboard!');
    }, function(err) {
        console.error('Could not copy text: ', err);
    });
}
</script>
@endsection
