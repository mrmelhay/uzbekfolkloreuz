<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'O\'zbek Folklori')</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontSize: {
                        sm: ['1.05rem', '1.5rem'], 
                    }
                }
            }
        }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Cormorant Garamond', serif;
            background-color: #f8f8f8;
        }
        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23F07F15' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #F07F15;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
        .nav-link.active::after {
            width: 100%;
        }
    </style>
    @stack('styles')
</head>
<body class="flex flex-col min-h-screen bg-gray-50 bg-pattern" x-data="{ mobileMenuOpen: false }">
    
    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="{{ \App\Helpers\LinkHelper::route('home') }}" class="flex-shrink-0 flex items-center">
                        <span class="text-2xl font-bold text-[#F07F15] tracking-tight">O'zbek Folklori</span>
                    </a>
                    <nav class="hidden md:ml-10 md:flex md:space-x-8">
                        <a href="{{ \App\Helpers\LinkHelper::route('home') }}" class="nav-link text-gray-900 inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('home') ? 'active' : '' }}">
                            {{ __('home') }}
                        </a>
                        @foreach(\App\Models\Category::where('status', 'published')->whereNull('parent_id')->get() as $category)
                            <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                                <a href="{{ \App\Helpers\LinkHelper::route('category.show', ['slug' => $category->slug]) }}" class="nav-link text-gray-500 hover:text-gray-900 inline-flex items-center px-1 pt-1 text-sm font-medium h-full cursor-pointer {{ request()->is('*'.$category->slug.'*') ? 'active text-gray-900' : '' }}">
                                    {{ $category->title }}
                                </a>
                                @if($category->children->count() > 0)
                                    <div x-show="open" 
                                         x-transition:enter="transition ease-out duration-200"
                                         x-transition:enter-start="opacity-0 translate-y-1"
                                         x-transition:enter-end="opacity-100 translate-y-0"
                                         x-transition:leave="transition ease-in duration-150"
                                         x-transition:leave-start="opacity-100 translate-y-0"
                                         x-transition:leave-end="opacity-0 translate-y-1"
                                         class="absolute left-0 mt-0 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                                        <div class="py-1" role="menu" aria-orientation="vertical">
                                            @foreach($category->children as $child)
                                                <a href="{{ \App\Helpers\LinkHelper::route('category.show', ['slug' => $child->slug]) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-[#F07F15]" role="menuitem">
                                                    {{ $child->title }}
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                        <!-- Static Pages Link -->
                        <a href="{{ \App\Helpers\LinkHelper::route('page.show', ['slug' => 'loyiha']) }}" class="nav-link text-gray-500 hover:text-gray-900 inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->is('*loyiha*') ? 'active text-gray-900' : '' }}">
                            {{ __('about_project') }}
                        </a>
                    </nav>
                </div>
                <div class="flex items-center">
                    <!-- Language Switcher -->
                    <div class="hidden md:ml-4 md:flex items-center space-x-2">
                        @php $currentRouteName = Route::currentRouteName(); $routeParams = Route::current()->parameters(); @endphp
                        <a href="{{ route($currentRouteName, array_merge($routeParams, ['locale' => 'uz'])) }}" class="text-sm font-medium {{ app()->getLocale() == 'uz' ? 'text-[#F07F15] font-bold' : 'text-gray-500 hover:text-gray-900' }}">UZ</a>
                        <span class="text-gray-300">|</span>
                        <a href="{{ route($currentRouteName, array_merge($routeParams, ['locale' => 'en'])) }}" class="text-sm font-medium {{ app()->getLocale() == 'en' ? 'text-[#F07F15] font-bold' : 'text-gray-500 hover:text-gray-900' }}">EN</a>
                    </div>
                    <!-- Mobile menu button -->
                    <div class="-mr-2 flex items-center md:hidden">
                        <button @click="mobileMenuOpen = !mobileMenuOpen" type="button" class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-[#F07F15]" aria-expanded="false">
                            <span class="sr-only">Open main menu</span>
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" class="md:hidden" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ \App\Helpers\LinkHelper::route('home') }}" class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium {{ request()->routeIs('home') ? 'bg-orange-50 border-[#F07F15] text-[#F07F15]' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }}">{{ __('home') }}</a>
                @foreach(\App\Models\Category::where('status', 'published')->whereNull('parent_id')->get() as $category)
                    <div x-data="{ subOpen: false }">
                         <div class="flex justify-between items-center pr-4">
                            <a href="{{ \App\Helpers\LinkHelper::route('category.show', ['slug' => $category->slug]) }}" class="block pl-3 py-2 border-l-4 text-base font-medium {{ request()->is('*'.$category->slug.'*') ? 'bg-orange-50 border-[#F07F15] text-[#F07F15]' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800' }}">
                                {{ $category->title }}
                            </a>
                            @if($category->children->count() > 0)
                                <button @click="subOpen = !subOpen" class="p-2 text-gray-500">
                                    <svg :class="{'rotate-180': subOpen}" class="w-4 h-4 transition-transform transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                </button>
                            @endif
                         </div>
                         <div x-show="subOpen" class="pl-6 space-y-1 bg-gray-50">
                            @foreach($category->children as $child)
                                <a href="{{ \App\Helpers\LinkHelper::route('category.show', ['slug' => $child->slug]) }}" class="block pl-3 pr-4 py-2 text-sm font-medium text-gray-500 hover:text-[#F07F15]">
                                    {{ $child->title }}
                                </a>
                            @endforeach
                         </div>
                    </div>
                @endforeach
                 <a href="{{ \App\Helpers\LinkHelper::route('page.show', ['slug' => 'loyiha']) }}" class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:bg-gray-50 hover:border-gray-300 hover:text-gray-800">{{ __('about_project') }}</a>
            </div>
            <div class="pt-4 pb-4 border-t border-gray-200">
                <div class="flex items-center px-4">
                     <div class="text-base font-medium text-gray-800">{{ __('choose_language') }}</div>
                </div>
                <div class="mt-3 space-y-1">
                     <a href="{{ route(Route::currentRouteName(), array_merge(Route::current()->parameters(), ['locale' => 'uz'])) }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">O'zbekcha</a>
                     <a href="{{ route(Route::currentRouteName(), array_merge(Route::current()->parameters(), ['locale' => 'en'])) }}" class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">English</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
        <div class="container mx-auto px-4 py-8 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-[#F07F15]">O'zbek Folklori</h3>
                    <p class="text-sm text-gray-300">
                        O'zbek xalq og'zaki ijodi, milliy qadriyatlar va madaniy merosimizni o'rganish va targ'ib qilishga bag'ishlangan portal.
                    </p>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-[#F07F15]">{{ __('quick_links') }}</h3>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li><a href="{{ \App\Helpers\LinkHelper::route('home') }}" class="hover:text-white">{{ __('home') }}</a></li>
                        <li><a href="{{ \App\Helpers\LinkHelper::route('page.show', ['slug' => 'loyiha']) }}" class="hover:text-white">{{ __('about_project') }}</a></li>
                        <li><a href="{{ route('admin.login') }}" class="hover:text-white">Admin kirish</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-lg font-semibold mb-4 text-[#F07F15]">{{ __('contact') }}</h3>
                    <ul class="space-y-2 text-sm text-gray-300">
                        <li>Email: info@uzbekfolklore.uz</li>
                        <li>Tel: +998 90 123 45 67</li>
                    </ul>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-700 pt-8 text-center text-sm text-gray-400">
                &copy; {{ date('Y') }} O'zbek Folklori. Barcha huquqlar himoyalangan.
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
