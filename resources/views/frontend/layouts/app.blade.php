<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="/photos/icon_v3.png">

    <title>@yield('title', 'O\'zbek Folklori')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

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
            background-color: #f3f4f6;
        }

        /* Improve content readability - specifically targeting main content areas */
        main p, main h1, main h2, main h3, main h4, main h5, main h6 {
            color: #000000 !important;
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
            background-color: #ffffff;
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

<body class="flex flex-col min-h-screen"
    style="background-image: url('/photos/backgound_1.png'); background-attachment: fixed; background-repeat: repeat;"
    x-data="{ mobileMenuOpen: false }">
    <div
        class="flex-grow flex flex-col bg-white w-full lg:w-[96%] max-w-[1800px] mx-auto shadow-2xl my-1 md:my-4 overflow-hidden border border-gray-200">


        <!-- Header -->
        <header class="bg-[#F07F15] shadow-md sticky top-0 z-50">
            <div class="container mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-20">
                    <div class="flex items-center">
                        <a href="{{ \App\Helpers\LinkHelper::route('home') }}" class="flex-shrink-0 flex items-center">
                            <img src="/photos/icon_v3.png" alt="Logo" class="h-12 w-auto mr-3">
                            <span class="text-2xl font-bold text-white tracking-tight">O'zbek Folklori</span>
                        </a>
                        <nav class="hidden md:ml-10 md:flex md:space-x-8">
                            <a href="{{ \App\Helpers\LinkHelper::route('home') }}"
                                class="nav-link text-white inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->routeIs('home') ? 'active' : '' }}">
                                {{ __('home') }}
                            </a>
                            @foreach(\App\Models\Category::where('status', 'published')->whereNull('parent_id')->get() as $category)
                                <div class="relative group" x-data="{ open: false }" @mouseenter="open = true"
                                    @mouseleave="open = false">
                                    <a href="{{ \App\Helpers\LinkHelper::route('category.show', ['slug' => $category->slug]) }}"
                                        class="nav-link text-orange-50 hover:text-white inline-flex items-center px-1 pt-1 text-sm font-medium h-full cursor-pointer {{ request()->is('*' . $category->slug . '*') ? 'active text-white' : '' }}">
                                        {{ $category->title }}
                                    </a>
                                    @if($category->children->count() > 0)
                                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                            x-transition:enter-start="opacity-0 translate-y-1"
                                            x-transition:enter-end="opacity-100 translate-y-0"
                                            x-transition:leave="transition ease-in duration-150"
                                            x-transition:leave-start="opacity-100 translate-y-0"
                                            x-transition:leave-end="opacity-0 translate-y-1"
                                            class="absolute left-0 mt-0 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                                            <div class="py-1" role="menu" aria-orientation="vertical">
                                                @foreach($category->children as $child)
                                                    <a href="{{ \App\Helpers\LinkHelper::route('category.show', ['slug' => $child->slug]) }}"
                                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-[#F07F15]"
                                                        role="menuitem">
                                                        {{ $child->title }}
                                                    </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                            <!-- Static Pages Link -->
                            <a href="{{ \App\Helpers\LinkHelper::route('page.show', ['slug' => 'loyiha']) }}"
                                class="nav-link text-orange-50 hover:text-white inline-flex items-center px-1 pt-1 text-sm font-medium {{ request()->is('*loyiha*') ? 'active text-white' : '' }}">
                                {{ __('about_project') }}
                            </a>
                        </nav>
                    </div>
                    <div class="flex items-center">
                        <!-- Language Switcher -->
                        <div class="hidden md:ml-4 md:flex items-center space-x-2">
                            @php $currentRouteName = Route::currentRouteName();
                            $routeParams = Route::current()->parameters(); @endphp
                            <a href="{{ route($currentRouteName, array_merge($routeParams, ['locale' => 'uz'])) }}"
                                class="text-sm font-medium {{ app()->getLocale() == 'uz' ? 'text-white font-bold underline' : 'text-orange-100 hover:text-white' }}">UZ</a>
                            <span class="text-orange-300">|</span>
                            <a href="{{ route($currentRouteName, array_merge($routeParams, ['locale' => 'en'])) }}"
                                class="text-sm font-medium {{ app()->getLocale() == 'en' ? 'text-white font-bold underline' : 'text-orange-100 hover:text-white' }}">EN</a>
                        </div>
                        <!-- Mobile menu button -->
                        <div class="-mr-2 flex items-center md:hidden">
                            <button @click="mobileMenuOpen = !mobileMenuOpen" type="button"
                                class="bg-orange-600 inline-flex items-center justify-center p-2 rounded-md text-white hover:text-white hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                                aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu -->
            <div x-show="mobileMenuOpen" class="md:hidden" x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="transform opacity-0 scale-95"
                x-transition:enter-end="transform opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="transform opacity-100 scale-100"
                x-transition:leave-end="transform opacity-0 scale-95">
                <div class="pt-2 pb-3 space-y-1">
                    <a href="{{ \App\Helpers\LinkHelper::route('home') }}"
                        class="block pl-3 pr-4 py-2 border-l-4 text-base font-medium {{ request()->routeIs('home') ? 'bg-orange-50 border-[#F07F15] text-[#F07F15]' : 'border-transparent text-black hover:bg-gray-50 hover:border-gray-300 hover:text-orange-600' }}">{{ __('home') }}</a>
                    @foreach(\App\Models\Category::where('status', 'published')->whereNull('parent_id')->get() as $category)
                        <div x-data="{ subOpen: false }">
                            <div class="flex justify-between items-center pr-4">
                                <a href="{{ \App\Helpers\LinkHelper::route('category.show', ['slug' => $category->slug]) }}"
                                    class="block pl-3 py-2 border-l-4 text-base font-medium {{ request()->is('*' . $category->slug . '*') ? 'bg-orange-50 border-[#F07F15] text-[#F07F15]' : 'border-transparent text-black hover:bg-gray-50 hover:border-gray-300 hover:text-orange-600' }}">
                                    {{ $category->title }}
                                </a>
                                @if($category->children->count() > 0)
                                    <button @click="subOpen = !subOpen" class="p-2 text-gray-500">
                                        <svg :class="{'rotate-180': subOpen}" class="w-4 h-4 transition-transform transform"
                                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </button>
                                @endif
                            </div>
                            <div x-show="subOpen" class="pl-6 space-y-1 bg-gray-50">
                                @foreach($category->children as $child)
                                    <a href="{{ \App\Helpers\LinkHelper::route('category.show', ['slug' => $child->slug]) }}"
                                        class="block pl-3 pr-4 py-2 text-sm font-medium text-gray-700 hover:text-[#F07F15]">
                                        {{ $child->title }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <a href="{{ \App\Helpers\LinkHelper::route('page.show', ['slug' => 'loyiha']) }}"
                        class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-black hover:bg-gray-50 hover:border-gray-300 hover:text-orange-600">{{ __('about_project') }}</a>
                </div>
                <div class="pt-4 pb-4 border-t border-gray-200">
                    <div class="flex items-center px-4">
                        <div class="text-base font-medium text-black">{{ __('choose_language') }}</div>
                    </div>
                    <div class="mt-3 space-y-1">
                        <a href="{{ route(Route::currentRouteName(), array_merge(Route::current()->parameters(), ['locale' => 'uz'])) }}"
                            class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">O'zbekcha</a>
                        <a href="{{ route(Route::currentRouteName(), array_merge(Route::current()->parameters(), ['locale' => 'en'])) }}"
                            class="block px-4 py-2 text-base font-medium text-gray-500 hover:text-gray-800 hover:bg-gray-100">English</a>
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
                        <div class="flex items-center mb-4">
                            <img src="/photos/icon_v3.png" alt="Logo" class="h-10 w-auto mr-3">
                            <h3 class="text-lg font-semibold text-[#F07F15]">O'zbek Folklori</h3>
                        </div>
                        <p class="text-sm text-gray-300">
                            O'zbek xalq og'zaki ijodi, milliy qadriyatlar va madaniy merosimizni o'rganish va targ'ib
                            qilishga bag'ishlangan portal.
                        </p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-4 text-[#F07F15]">{{ __('quick_links') }}</h3>
                        <ul class="space-y-2 text-sm text-gray-300">
                            <li><a href="{{ \App\Helpers\LinkHelper::route('home') }}"
                                    class="hover:text-white">{{ __('home') }}</a></li>
                            <li><a href="{{ \App\Helpers\LinkHelper::route('page.show', ['slug' => 'loyiha']) }}"
                                    class="hover:text-white">{{ __('about_project') }}</a></li>
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

    </div>
    @stack('scripts')
</body>

</html>