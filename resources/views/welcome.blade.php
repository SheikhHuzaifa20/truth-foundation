@extends('layouts.main')
@section('content')
    <!-- Author Hero Section -->
    <section class="author-section">

        <div class="container-fluid p-0 h-100">

            <div class="row g-0 h-100">

                <!-- LEFT SIDE -->
                <div class="col-lg-6 col-md-6 col-12 author-content">

                    <div class="author-text">

                        <div class="author-monogram">
                            {{ $banner->title }}
                        </div>

                        <h1>
                            {{ $banner->heading }}
                        </h1>

                        {!! $banner->description !!}
                    </div>

                </div>


                <!-- RIGHT SIDE -->
                <div class="col-lg-6 col-md-6 col-12 author-image-wrapper">

                    <img src="{{ $banner->image }}" alt="Qiu Min Ji" class="author-img">

                </div>

            </div>

        </div>

    </section>


    <!-- =========================================
                                                    ABOUT SECTION
                                                ========================================= -->

    <section class="about-section">

        <div class="container-fluid p-0 h-100">

            <div class="row g-0 h-100">

                <!-- LEFT ORANGE AREA -->
                <div class="col-lg-4 col-md-4 col-12 about-orange"></div>


                <!-- RIGHT CONTENT AREA -->
                <div class="col-lg-8 col-md-8 col-12 about-main">

                    <!-- ABOUT IMAGE -->
                    <div class="about-image-wrapper">

                        <img src="{{ $about->image }}" alt="About Qiu Min Ji" class="about-img">

                    </div>


                    <!-- ABOUT TEXT -->
                    <div class="about-content">

                        <h2>
                            {{ $about->name }}
                        </h2>

                        {!! $about->content !!}

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- =========================================
                                                    HAPPY CUSTOMERS SECTION
                                                ========================================= -->

    <section class="customers-section">

        <div class="customers-container">

            <!-- SECTION HEADER -->
            <div class="customers-header">

                <span class="customers-label">
                    TESTIMONIALS
                </span>

                <h2 class="customers-title">
                    {{$section[0]->value}}
                </h2>

            </div>


            <!-- =================================
                                                            TESTIMONIAL SLIDER
                                                        ================================= -->

            <div class="customers-slider">

                <div class="customers-track">


                    <!-- CARD 1 -->
                    @foreach ($testimonial as $t)
                        <article class="customer-card">

                            <div class="customer-top">

                                <div class="customer-stars">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <span class="star {{ $i <= $t->rating ? '' : 'empty' }}"
                                            style="color:#ffc600;">★</span>
                                    @endfor
                                </div>

                                <span class="customer-quote">
                                    “
                                </span>

                            </div>

                            <h3 class="customer-heading">
                                {{ $t->title }}
                            </h3>

                            <p class="customer-description">
                                {!! $t->description !!}
                            </p>

                            <div class="customer-profile">

                                <img src="{{ $t->image }}" alt="{{ $t->customer_name }}" class="customer-img">

                                <div class="customer-info">

                                    <span>
                                        {{ $t->customer_name }}
                                    </span>

                                    <small>
                                        {{ $t->customer_profession }}
                                    </small>

                                </div>

                            </div>

                        </article>
                    @endforeach


                </div>

            </div>

        </div>

    </section>


    <!-- =========================================
                                                    MY ARTICLES SECTION
                                                ========================================= -->

    <section class="articles-section">

        <div class="articles-container">

            <!-- SECTION HEADER -->
            <div class="articles-header">

                <!-- LEFT SIDE -->
                <div class="articles-heading-wrap">

                    <span class="articles-label">
                        MY ARTICLES
                    </span>

                    <h2>
                        {{$section[1]->value}}
                    </h2>

                </div>


                <!-- RIGHT SIDE -->
                <div class="articles-header-description mt-3" style="width: 600px;">

                    {!! $section[2]->value !!}

                </div>

            </div>


            <!-- =================================
                        ARTICLES GRID
                    ================================= -->

            <div class="articles-grid">

                @foreach ($blog as $b)
                    <article class="article-card">

                        <div class="article-image">

                            <img src="{{ $b->image }}" alt="Pro Bono case letter">

                            <span class="article-number">
                                01
                            </span>

                        </div>
                        <div class="article-content">

                            <h3>
                                {{ $b->title }}
                            </h3>

                            {!! $b->description !!}

                            <a href="{{ route('articles_detail', $b->id) }}" class="article-link">
                                Read Article
                                <span>↗</span>
                            </a>

                        </div>

                    </article>
                @endforeach


            </div>


            <div class="articles-note">

                <span></span>

                <p>
                    These articles represent the author's personal views,
                    experiences and claims.
                </p>

            </div>

        </div>

    </section>


    <!-- =========================================
                CONTACT SECTION
            ========================================= -->

    <section class="contact-section">

        <div class="container-fluid p-0 h-100">

            <div class="row g-0 h-100">

                <!-- ORANGE BACKGROUND -->
                <div class="col-lg-4 col-md-4 col-12 contact-orange"></div>


                <!-- CONTACT MAIN AREA -->
                <div class="col-lg-8 col-md-8 col-12 contact-main">

                    <!-- CONTACT FORM BOX -->
                    <div class="contact-form-box">

                        <h2>{{ $section[3]->value }}</h2>

                        <form action="{{ route('inquiry.store') }}" method="POST">
                            @csrf

                            <div class="contact-name-row">

                                <input type="text" placeholder="First Name" name="fname">

                                <input type="text" placeholder="Last Name" name="lname">

                            </div>

                            <input type="text" placeholder="Subject" name="extra_content">

                            <textarea placeholder="notes" name="notes"></textarea>

                            <button type="submit">
                                Send your message
                            </button>

                        </form>

                    </div>


                    <!-- GET IN TOUCH -->
                    <div class="contact-info">

                        <h3>{{ $section[4]->value }}</h3>

                        {!! $section[5]->value !!}


                        <!-- LOCATION -->
                        <div class="contact-item">

                            <div class="contact-icon">
                                <img src="{{ asset('asset/images/location.png') }}" alt="Location">
                            </div>

                            <div class="contact-item-text mt-2">
                                <p>
                                    {{ $location->flag_value }}
                                </p>
                            </div>

                        </div>


                        <!-- EMAIL -->
                        <div class="contact-item">

                            <div class="contact-icon">
                                <img src="{{ asset('asset/images/message.png') }}" alt="Email">
                            </div>

                            <div class="contact-item-text mt-2">
                                <p>
                                    {{ $email->flag_value }}
                                </p>
                            </div>

                        </div>


                        <!-- PHONE -->
                        <div class="contact-item">

                            <div class="contact-icon">
                                <img src="{{ asset('asset/images/call.png') }}" alt="Phone">
                            </div>

                            <div class="contact-item-text mt-2">
                                <p>
                                    {{ $phone->flag_value }}
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection
@section('css')
    <style>

    </style>
@endsection

@section('js')
    <script type="text/javascript"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const slider = document.querySelector('.customers-slider');
            const track = document.querySelector('.customers-track');

            if (!slider || !track) {
                return;
            }

            const cards = Array.from(track.querySelectorAll('.customer-card'));

            if (cards.length === 0) {
                return;
            }

            // Original cards ki copy automatically create karo
            cards.forEach(function(card) {
                const clone = card.cloneNode(true);
                track.appendChild(clone);
            });

            let position = 0;
            let speed = 0.5;
            let animationFrame;

            function animateSlider() {

                position -= speed;

                /*
                 * First set ki total width
                 * calculate karke usi point par reset hoga.
                 */
                const firstCard = track.querySelector('.customer-card');

                if (firstCard) {

                    const cardWidth = firstCard.offsetWidth;

                    const gap = parseFloat(
                        window.getComputedStyle(track).gap
                    ) || 0;

                    const originalSetWidth =
                        (cardWidth + gap) * cards.length;

                    if (Math.abs(position) >= originalSetWidth) {
                        position = 0;
                    }
                }

                track.style.transform = `translate3d(${position}px, 0, 0)`;

                animationFrame = requestAnimationFrame(animateSlider);
            }

            animateSlider();


            // Hover par slider pause
            slider.addEventListener('mouseenter', function() {
                speed = 0;
            });

            slider.addEventListener('mouseleave', function() {
                speed = 0.5;
            });


            // Resize par position reset
            window.addEventListener('resize', function() {
                position = 0;
            });

        });
    </script>
@endsection
