<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - {{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Tailwind CSS / CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Figtree', 'sans-serif'],
                    },
                    colors: {
                        black: '#000000',
                        white: '#ffffff',
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans antialiased bg-white text-black min-h-screen">
    
    <!-- Navigation -->
    <nav class="border-b border-black bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}" class="text-black font-black text-xl tracking-tighter uppercase">
                            Lab<span class="text-gray-400">App</span>
                        </a>
                    </div>
                </div>

                <!-- Settings Dropdown -->
                <div class="flex items-center ml-6">
                    <div class="flex items-center gap-6">
                        <div class="text-right hidden sm:block">
                            <div class="text-sm font-bold text-black uppercase tracking-wide">{{ Auth::user()->name }}</div>
                            <div class="text-xs text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
                        
                        <!-- Logout Button -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-black border border-transparent rounded-none font-bold text-xs text-white uppercase tracking-widest hover:bg-gray-800 transition ease-in-out duration-150">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
                <!-- User Card -->
                <div class="md:col-span-2 bg-black text-white p-8 shadow-2xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mt-10 -mr-10 w-40 h-40 bg-gray-800 rounded-full blur-3xl opacity-50"></div>
                    <div class="relative z-10 flex flex-col md:flex-row items-start justify-between gap-8">
                        <div>
                            <p class="text-gray-400 text-xs font-bold uppercase tracking-[0.2em] mb-2">Authenticated User</p>
                            <h3 class="text-5xl font-black mb-1">{{ Auth::user()->name }}</h3>
                            <p class="text-gray-400 font-mono text-sm">@ {{ Auth::user()->username }}</p>
                            
                            <div class="mt-8 flex items-center gap-4">
                                <span class="px-3 py-1 border border-white/20 text-xs font-bold uppercase tracking-wider flex items-center gap-2">
                                    <span class="w-2 h-2 rounded-full {{ Auth::user()->is_active ? 'bg-white' : 'bg-gray-600' }}"></span>
                                    {{ Auth::user()->is_active ? 'Active Status' : 'Inactive' }}
                                </span>
                            </div>
                        </div>
                        <div class="text-right">
                             <div class="bg-gray-900 p-4 border border-gray-800">
                                <span class="block text-gray-500 text-xs uppercase tracking-widest mb-1">Last Seen</span>
                                <span class="block text-white font-mono text-xl">
                                    {{ Auth::user()->last_login ? \Carbon\Carbon::parse(Auth::user()->last_login)->diffForHumans() : 'Now' }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stat Card: Total Users -->
                <div class="bg-white border-2 border-black p-8 flex flex-col justify-center relative shadow-[8px_8px_0px_0px_rgba(0,0,0,1)]">
                    <p class="text-gray-500 text-xs font-bold uppercase tracking-widest">Total Registered</p>
                    <div class="mt-4 flex items-baseline">
                        <span class="text-6xl font-black text-black tracking-tighter">
                            {{ \App\Models\User::count() }}
                        </span>
                    </div>
                    <div class="mt-6 w-full bg-gray-100 h-1">
                        <div class="bg-black h-1" style="width: 70%"></div>
                    </div>
                    <p class="mt-2 text-xs text-gray-400 font-mono">System Growth: +12%</p>
                </div>
            </div>

            <!-- Activity Section -->
            <div class="bg-white border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50">
                    <h3 class="text-sm font-bold text-black uppercase tracking-widest">System Logs</h3>
                    <span class="text-xs font-mono text-gray-400">LIVE FEED</span>
                </div>
                <div class="p-0">
                    <ul class="divide-y divide-gray-100">
                         <!-- Static Item 1 -->
                        <li class="p-6 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="w-2 h-2 bg-black rounded-full"></div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-black">User <span class="font-bold">{{ Auth::user()->name }}</span> initiated a new session.</p>
                                    <p class="text-xs text-gray-400 font-mono mt-1">{{ date('H:i:s') }} - Authentication Success</p>
                                </div>
                            </div>
                        </li>
                        <!-- Static Item 2 -->
                        <li class="p-6 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-600">Background worker completed scheduled maintenance.</p>
                                    <p class="text-xs text-gray-400 font-mono mt-1">10 mins ago - System Job</p>
                                </div>
                            </div>
                        </li>
                        <!-- Static Item 3 -->
                         <li class="p-6 hover:bg-gray-50 transition-colors">
                            <div class="flex items-center gap-4">
                                <div class="w-2 h-2 bg-gray-300 rounded-full"></div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium text-gray-600">Database migration batch #2024_02_08 executed.</p>
                                    <p class="text-xs text-gray-400 font-mono mt-1">1 hour ago - Migration</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
