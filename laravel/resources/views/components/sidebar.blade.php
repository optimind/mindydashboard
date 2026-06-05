@props(['route' => 'dashboard'])

<aside class="sidebar" id="sidebar" data-collapsed="false" aria-label="Main navigation">

    {{-- Toggle button --}}
    <button class="toggle-btn" id="sidebar-toggle" aria-label="Toggle sidebar" title="Toggle sidebar">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2"
             stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M9 18l6-6-6-6"/>
        </svg>
    </button>

    {{-- Logo --}}
    <a href="{{ route('dashboard') }}" class="sidebar-logo" aria-label="Mindy home">
        <div class="sidebar-logo-mark" aria-hidden="true">M</div>
        <span class="sidebar-label sidebar-logo-text">Mindy</span>
    </a>

    <nav class="sidebar-nav" aria-label="Workspace navigation">
        <p class="sidebar-section-label sidebar-label">Workspace</p>

        <a href="{{ route('dashboard') }}"
           class="sidebar-nav-item {{ $route === 'dashboard' ? 'active' : '' }}"
           aria-current="{{ $route === 'dashboard' ? 'page' : 'false' }}">
            <span class="sidebar-nav-icon" aria-hidden="true">
                <x-icon name="chart" :size="20" :stroke="2" />
            </span>
            <span class="sidebar-label">Dashboard</span>
        </a>

        <a href="{{ route('chat') }}"
           class="sidebar-nav-item {{ $route === 'chat' ? 'active' : '' }}"
           aria-current="{{ $route === 'chat' ? 'page' : 'false' }}">
            <span class="sidebar-nav-icon" aria-hidden="true">
                <x-icon name="message" :size="20" :stroke="2" />
            </span>
            <span class="sidebar-label">Chat</span>
            <span class="sidebar-badge sidebar-label" aria-label="3 unread messages">3</span>
        </a>

        <a href="{{ route('products') }}"
           class="sidebar-nav-item {{ $route === 'products' ? 'active' : '' }}"
           aria-current="{{ $route === 'products' ? 'page' : 'false' }}">
            <span class="sidebar-nav-icon" aria-hidden="true">
                <x-icon name="bolt" :size="20" :stroke="2" />
            </span>
            <span class="sidebar-label">Products</span>
        </a>

        <a href="{{ route('inquiries') }}"
           class="sidebar-nav-item {{ $route === 'inquiries' ? 'active' : '' }}"
           aria-current="{{ $route === 'inquiries' ? 'page' : 'false' }}">
            <span class="sidebar-nav-icon" aria-hidden="true">
                <x-icon name="inbox" :size="20" :stroke="2" />
            </span>
            <span class="sidebar-label">Inquiries</span>
        </a>
    </nav>

    <nav class="sidebar-nav sidebar-nav--account" aria-label="Account navigation">
        <p class="sidebar-section-label sidebar-label">Account</p>

        <a href="{{ route('integrations') }}"
           class="sidebar-nav-item {{ $route === 'integrations' ? 'active' : '' }}"
           aria-current="{{ $route === 'integrations' ? 'page' : 'false' }}">
            <span class="sidebar-nav-icon" aria-hidden="true">
                <x-icon name="users" :size="20" :stroke="2" />
            </span>
            <span class="sidebar-label">Facebook Connect</span>
        </a>

        <a href="{{ route('security') }}"
           class="sidebar-nav-item {{ $route === 'security' ? 'active' : '' }}"
           aria-current="{{ $route === 'security' ? 'page' : 'false' }}">
            <span class="sidebar-nav-icon" aria-hidden="true">
                <x-icon name="shield" :size="20" :stroke="2" />
            </span>
            <span class="sidebar-label">Change Password</span>
        </a>

        <a href="{{ route('settings') }}"
           class="sidebar-nav-item {{ $route === 'settings' ? 'active' : '' }}"
           aria-current="{{ $route === 'settings' ? 'page' : 'false' }}">
            <span class="sidebar-nav-icon" aria-hidden="true">
                <x-icon name="settings" :size="20" :stroke="2" />
            </span>
            <span class="sidebar-label">Settings</span>
        </a>
    </nav>

    {{-- Spacer --}}
    <div class="sidebar-spacer" aria-hidden="true"></div>

    {{-- Credits card --}}
    <div class="credits-card" aria-label="Credits usage">
        <div class="credits-card-header">
            <x-icon name="bolt" :size="16" :stroke="2" class="credits-icon" />
            <span class="sidebar-label credits-title">AI Credits</span>
        </div>
        <div class="credits-card-body sidebar-label">
            <div class="credits-numbers">
                <span class="credits-used">10</span>
                <span class="credits-sep">/</span>
                <span class="credits-total">200</span>
            </div>
            <p class="credits-reset sidebar-label">Resets Jun 1</p>
        </div>
        <div class="credits-bar-track" aria-hidden="true">
            <div class="credits-bar-fill" style="width: 5%"></div>
        </div>
        <a href="{{ route('settings') }}" class="credits-topup sidebar-label">Top-up</a>
    </div>

</aside>
