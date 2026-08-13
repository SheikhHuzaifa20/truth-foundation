@php
    $logo = DB::table('imagetable')->where('id', 2)->first();
@endphp

<header class="site-header">

    <!-- Logo -->
    <div class="author-logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset($logo->img_path) }}" alt="Truth Foundation Logo">
        </a>
    </div>

    <!-- Menu -->
    <button class="menu-button" type="button" aria-label="Open menu">
        <span></span>
        <span></span>
        <span></span>
    </button>

</header>
