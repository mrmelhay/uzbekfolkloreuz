<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="/photos/icon_v3.png">
    <title>Admin Panel - Uzbek Folklore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
     <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 text-white flex-shrink-0 hidden md:block">
            <div class="h-16 flex items-center justify-center border-b border-gray-800">
                <h1 class="text-xl font-bold text-[#F07F15]">Folklore Admin</h1>
            </div>
            <nav class="mt-4 px-2 space-y-1">
                <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('admin.dashboard') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    Dashboard
                </a>
                <a href="{{ route('categories.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('categories.*') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    Categories
                </a>

                <a href="{{ route('articles.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('articles.*') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    Articles
                </a>
                <a href="{{ route('pages.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('pages.*') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    Pages
                </a>
                <a href="{{ route('sliders.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('sliders.*') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    Home Sliders
                </a>
                <a href="{{ route('home_sections.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('home_sections.*') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    Home Sections
                </a>
                <a href="{{ route('media.index') }}" class="group flex items-center px-4 py-3 text-sm font-medium rounded-md {{ request()->routeIs('media.*') ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
                    Media
                </a>
                <form action="{{ route('admin.logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="w-full group flex items-center px-4 py-3 text-sm font-medium rounded-md text-red-300 hover:bg-red-900/50 hover:text-white">
                        Logout
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto focus:outline-none">
             <div class="md:hidden pl-4 pt-4">
                <button type="button" class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
                    <span class="sr-only">Open sidebar</span>
                    <!-- Menu icon -->
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            
            <div class="px-8 py-6">
                @if(session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
                
                @if($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Message:</strong>
                        <span class="block sm:inline">Please check the form for errors.</span>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
