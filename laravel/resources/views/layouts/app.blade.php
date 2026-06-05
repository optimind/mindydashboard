<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Mindy — @yield('title', 'Dashboard')</title>

    {{-- Google Fonts: Nunito + JetBrains Mono --}}
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/mindy.css') }}" />
</head>
<body>

<div id="app">

    {{-- Sidebar --}}
    <x-sidebar :route="$route ?? 'dashboard'" />

    {{-- Main column --}}
    <div class="main-col">

        {{-- Top bar --}}
        <header class="topbar" role="banner">
            <div class="topbar-left">
                <h1 class="topbar-title">@yield('title', 'Dashboard')</h1>
                <p class="topbar-subtitle">@yield('subtitle', '')</p>
            </div>

            <div class="topbar-center">
                <label class="search-box" for="global-search" aria-label="Global search">
                    <x-icon name="search" :size="16" :stroke="2" class="search-icon" />
                    <input
                        id="global-search"
                        type="search"
                        class="search-input"
                        placeholder="Search inquiries, products, customers…"
                        autocomplete="off"
                        aria-label="Search inquiries, products, customers"
                    />
                    <kbd class="search-kbd" aria-label="Keyboard shortcut Command K">⌘K</kbd>
                </label>
            </div>

            <div class="topbar-right">
                {{-- Credits chip --}}
                <div class="topbar-credits-chip" aria-label="10 credits remaining, resets June 1">
                    <x-icon name="bolt" :size="14" :stroke="2" class="chip-icon" />
                    <span>10 credits · resets Jun 1</span>
                </div>

                {{-- Bell --}}
                <button class="topbar-icon-btn" aria-label="Notifications (1 unread)">
                    <x-icon name="bell" :size="20" :stroke="2" />
                    <span class="topbar-bell-dot" aria-hidden="true"></span>
                </button>

                {{-- User pill --}}
                <button class="user-pill" aria-label="User menu — Wendy Ang" aria-haspopup="true">
                    <span class="user-avatar" aria-hidden="true">WA</span>
                    <span class="user-name">Wendy Ang</span>
                    <x-icon name="more" :size="16" :stroke="2" class="user-more" />
                </button>
            </div>
        </header>

        {{-- Page content --}}
        <main id="main-content" tabindex="-1">
            @yield('content')
        </main>

    </div>{{-- /.main-col --}}

</div>{{-- /#app --}}

<script src="{{ asset('js/mindy.js') }}"></script>
</body>
</html>
