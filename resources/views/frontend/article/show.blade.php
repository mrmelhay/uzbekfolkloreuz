@extends('frontend.layouts.app')

@section('title', $article->title_uz . ' - O\'zbek Folklori')

@section('content')
<div class="bg-white py-12">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumbs -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 flex-wrap">
                <li class="inline-flex items-center">
                    <a href="{{ \App\Helpers\LinkHelper::route('home') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-[#F07F15]">
                        Asosiy
                    </a>
                </li>
                @if($article->category->parent)
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="{{ route('category.show', ['slug' => $article->category->parent->slug]) }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-[#F07F15] md:ml-2">{{ $article->category->parent->title_uz }}</a>
                    </div>
                </li>
                @endif
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <a href="{{ \App\Helpers\LinkHelper::route('category.show', ['slug' => $article->category->slug]) }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-[#F07F15] md:ml-2">{{ $article->category->title }}</a>
                    </div>
                </li>
            </ol>
        </nav>

        <article class="max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-black mb-4">{{ $article->title }}</h1>
            
            <div class="flex items-center text-sm text-gray-700 mb-8 pb-8 border-b border-gray-100">
                <span class="flex items-center mr-6">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ $article->created_at->format('d.m.Y') }}
                </span>
                <span class="flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ ceil(str_word_count(strip_tags($article->content_uz)) / 200) }} daqiqa o'qish
                </span>
            </div>

            <div class="prose prose-lg prose-indigo max-w-none text-black">
                {!! $article->content_uz !!}
            </div>
            
            <div class="mt-12 pt-8 border-t border-gray-100">
                <div class="flex justify-between items-center">
                     <div>
                        <span class="font-bold text-black">Ulashish:</span>
                        <!-- Social share buttons could go here -->
                     </div>
                </div>
            </div>
        </article>

        @if($relatedArticles->count() > 0)
            <div class="max-w-4xl mx-auto mt-16 pt-12 border-t border-gray-200">
                <h2 class="text-2xl font-bold text-black mb-8">O'xshash maqolalar</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($relatedArticles as $related)
                        <div class="group">
                             <span class="text-xs text-gray-700 block mb-2">{{ $related->created_at->format('d.m.Y') }}</span>
                            <h3 class="font-bold text-lg text-black group-hover:text-[#F07F15] transition mb-2">
                                <a href="{{ \App\Helpers\LinkHelper::route('article.show', ['slug' => $related->slug]) }}">
                                    {{ Str::limit($related->title, 60) }}
                                </a>
                            </h3>
                            <a href="{{ \App\Helpers\LinkHelper::route('article.show', ['slug' => $related->slug]) }}" class="text-[#F07F15] hover:text-[#d0690c] text-sm font-medium">Batafsil</a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
