@extends('frontend.layouts.app')

@section('title', 'O\'zbek Folklori - Bosh Sahifa')

@section('content')
    <!-- Hero Slider -->
    @if($sliders->count() > 0)
        <div class="relative h-[50vh] md:h-[75vh] overflow-hidden">
            <div class="swiper main-slider h-full">
                <div class="swiper-wrapper">
                    @foreach($sliders as $slider)
                        <div class="swiper-slide relative">
                            <div class="absolute inset-0">
                                <img src="{{ $slider->image }}" alt="{{ $slider->title }}" class="hidden md:block w-full h-full object-cover">
                                <img src="{{ $slider->image_mobile ?? $slider->image }}" alt="{{ $slider->title }}" class="block md:hidden w-full h-full object-cover">
                                <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                            </div>
                            <div class="relative z-10 container mx-auto px-4 h-full flex flex-col justify-center text-white">
                                <h2 class="text-3xl md:text-5xl font-bold mb-2">{{ $slider->title }}</h2>
                                @if($slider->subtitle)
                                    <h3 class="text-xl md:text-2xl font-medium mb-4 text-[#F07F15]">{{ $slider->subtitle }}</h3>
                                @endif
                                @if($slider->description)
                                    <p class="text-lg md:text-xl mb-8 max-w-2xl">{{ $slider->description }}</p>
                                @endif
                                @if($slider->button_text && $slider->button_url)
                                    <div>
                                        <a href="{{ $slider->button_url }}" class="inline-block bg-[#F07F15] text-white px-8 py-3 rounded-full font-bold hover:bg-[#d0690c] transition duration-300">
                                            {{ $slider->button_text }}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
                <!-- Navigation -->
                <div class="swiper-button-next text-[#F07F15]"></div>
                <div class="swiper-button-prev text-[#F07F15]"></div>
            </div>
        </div>
    @endif

    <!-- Home Sections (Text + Image) -->
    @if($homeSections->count() > 0)
        @foreach($homeSections as $index => $section)
            <section class="py-16 {{ $index % 2 == 0 ? 'bg-white' : 'bg-gray-50' }}">
                <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col {{ $index % 2 == 0 ? 'md:flex-row' : 'md:flex-row-reverse' }} items-center gap-12">
                        <div class="md:w-1/2">
                            <h2 class="text-3xl font-bold text-black mb-6">{{ $section->title }}</h2>
                            <div class="text-lg text-black leading-relaxed whitespace-pre-line">
                                {{ $section->content }}
                            </div>
                        </div>
                        <div class="md:w-1/2">
                            @if($section->image)
                                <img src="{{ $section->image }}" alt="{{ $section->title }}" class="rounded-2xl shadow-xl w-full h-auto object-cover border-4 border-white">
                            @else
                                <div class="bg-gray-200 rounded-2xl aspect-video flex items-center justify-center text-gray-400">
                                    No Image
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        @endforeach
    @endif

    <!-- Latest Articles -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">{{ __('latest_articles') }}</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($latestArticles as $article)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-100 group hover:shadow-xl transition duration-300">
                        <div class="p-6">
                             <div class="flex items-center justify-between mb-4">
                                <span class="bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">
                                    {{ $article->category->title ?? 'Kategoriya' }}
                                </span>
                                <span class="text-gray-700 text-xs">{{ $article->created_at->format('d.m.Y') }}</span>
                            </div>
                            <h3 class="text-xl font-bold mb-2 text-black group-hover:text-[#F07F15] transition">
                                <a href="{{ \App\Helpers\LinkHelper::route('article.show', ['slug' => $article->slug]) }}">
                                    {{ Str::limit($article->title, 60) }}
                                </a>
                            </h3>
                            <p class="text-black mb-4 line-clamp-3">
                                {{ strip_tags($article->content) }}
                            </p>
                            <a href="{{ \App\Helpers\LinkHelper::route('article.show', ['slug' => $article->slug]) }}" class="inline-flex items-center text-[#F07F15] font-medium hover:underline">
                                {{ __('read_more_long') }}
                                <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
             <div class="mt-12 text-center">
                <a href="#" class="inline-block border-2 border-[#F07F15] text-[#F07F15] px-8 py-3 rounded-full font-bold hover:bg-[#F07F15] hover:text-white transition duration-300">
                    {{ __('all_articles') }}
                </a>
            </div>
        </div>
    </section>

    <!-- Categories Preview -->
    <section class="py-16 bg-gray-50 bg-pattern">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
             <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">{{ __('sections') }}</h2>
             <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Static categories for now, dynamic later if needed -->
                 <a href="{{ \App\Helpers\LinkHelper::route('category.show', ['slug' => 'ozbek-folklori']) }}" class="group block bg-white rounded-xl shadow-md p-6 hover:-translate-y-1 transition duration-300">
                    <div class="w-12 h-12 bg-[#F07F15] bg-opacity-10 rounded-full flex items-center justify-center mb-4 group-hover:bg-[#F07F15] transition">
                        <svg class="w-6 h-6 text-[#F07F15] group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-black mb-2">{{ __('card_uzbek_folklore_title') }}</h3>
                    <p class="text-sm text-gray-700">{{ __('card_uzbek_folklore_desc') }}</p>
                 </a>
                 <a href="{{ \App\Helpers\LinkHelper::route('category.show', ['slug' => 'folklorshunos-olimlar']) }}" class="group block bg-white rounded-xl shadow-md p-6 hover:-translate-y-1 transition duration-300">
                    <div class="w-12 h-12 bg-[#F07F15] bg-opacity-10 rounded-full flex items-center justify-center mb-4 group-hover:bg-[#F07F15] transition">
                        <svg class="w-6 h-6 text-[#F07F15] group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                     <h3 class="text-lg font-bold text-black mb-2">{{ __('card_scholars_title') }}</h3>
                    <p class="text-sm text-gray-700">{{ __('card_scholars_desc') }}</p>
                 </a>
                 <a href="{{ \App\Helpers\LinkHelper::route('category.show', ['slug' => 'folklor-ansambllari']) }}" class="group block bg-white rounded-xl shadow-md p-6 hover:-translate-y-1 transition duration-300">
                    <div class="w-12 h-12 bg-[#F07F15] bg-opacity-10 rounded-full flex items-center justify-center mb-4 group-hover:bg-[#F07F15] transition">
                        <svg class="w-6 h-6 text-[#F07F15] group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 3-2 3-2zm0 0v-8"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-black mb-2">{{ __('card_ensembles_title') }}</h3>
                    <p class="text-sm text-gray-700">{{ __('card_ensembles_desc') }}</p>
                 </a>
                 <a href="{{ \App\Helpers\LinkHelper::route('category.show', ['slug' => 'folklor-janrlari']) }}" class="group block bg-white rounded-xl shadow-md p-6 hover:-translate-y-1 transition duration-300">
                    <div class="w-12 h-12 bg-[#F07F15] bg-opacity-10 rounded-full flex items-center justify-center mb-4 group-hover:bg-[#F07F15] transition">
                        <svg class="w-6 h-6 text-[#F07F15] group-hover:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-black mb-2">{{ __('card_genres_title') }}</h3>
                    <p class="text-sm text-gray-700">{{ __('card_genres_desc') }}</p>
                 </a>
             </div>
        </div>
    </section>

@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    .swiper-button-next, .swiper-button-prev {
        color: #fff;
        background: rgba(0,0,0,0.3);
        padding: 20px;
        border-radius: 50%;
        width: 20px;
        height: 20px;
    }
    .swiper-button-next::after, .swiper-button-prev::after {
        font-size: 20px;
        font-weight: bold;
    }
    .swiper-pagination-bullet-active {
        background-color: #F07F15;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".main-slider", {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
@endpush
