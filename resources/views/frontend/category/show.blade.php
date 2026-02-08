@extends('frontend.layouts.app')

@section('title', $category->title_uz . ' - O\'zbek Folklori')

@section('content')
<div class="bg-gray-50 py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumbs -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ \App\Helpers\LinkHelper::route('home') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-[#F07F15]">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                        Asosiy
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">{{ $category->title_uz }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="text-center mb-12">
            <h1 class="text-3xl font-bold text-gray-900 mb-8">{{ $category->title }}</h1>
            <div class="h-1 w-24 bg-[#F07F15] mx-auto"></div>
        </div>

        @if($category->children->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($category->children as $child)
                <a href="{{ route('category.show', ['slug' => $child->slug]) }}" class="group block bg-white rounded-lg shadow-md hover:shadow-xl transition duration-300 overflow-hidden border border-gray-100">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="w-10 h-10 bg-[#F07F15] bg-opacity-10 rounded-full flex items-center justify-center group-hover:bg-[#F07F15] transition">
                                <svg class="w-5 h-5 text-[#F07F15] group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </div>
                            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Bo'lim</span>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 group-hover:text-[#F07F15] transition mb-2">{{ $child->title_uz }}</h2>
                        <p class="text-gray-600 text-sm">Maqolalar soni: {{ $child->articles->where('status', 'published')->count() }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        @elseif($category->articles->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($category->articles as $article)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-100 group hover:shadow-xl transition duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <span class="text-gray-500 text-xs">{{ $article->created_at->format('d.m.Y') }}</span>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-gray-900 group-hover:text-[#F07F15] transition">
                            <a href="{{ \App\Helpers\LinkHelper::route('article.show', ['slug' => $article->slug]) }}">
                                {{ Str::limit($article->title, 60) }}
                            </a>
                        </h3>
                        <p class="text-gray-600 mb-4 line-clamp-3">
                            {{ strip_tags($article->content) }}
                        </p>
                        <a href="{{ \App\Helpers\LinkHelper::route('article.show', ['slug' => $article->slug]) }}" class="inline-flex items-center text-[#F07F15] font-medium hover:underline">
                            Batafsil
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <p class="text-gray-500 text-lg">Bu bo'limda hali ma'lumotlar yo'q.</p>
            </div>
        @endif
    </div>
</div>
@endsection
