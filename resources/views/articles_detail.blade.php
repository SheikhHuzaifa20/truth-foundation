@extends('layouts.main')

@section('content')

    <!-- =========================================================
         ARTICLE BANNER
    ========================================================== -->
    <section class="article-banner">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-xl-10">

                    <div class="article-banner-content">

                        <span class="article-label">
                            TRUTH REPORT
                        </span>

                        <h1>
                            {{ $blog->title }}
                        </h1>

                        <div class="article-banner-line"></div>

                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- =========================================================
         ARTICLE CONTENT
    ========================================================== -->
    <section class="article-section">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-12 col-xl-9">

                    <article class="article-content">

                        {{-- =================================================
                             MAIN DESCRIPTION
                        ================================================== --}}
                        @if (!empty($blog->description))

                            <div class="article-detail-description main-description">
                                {!! $blog->description !!}
                            </div>

                        @endif


                        {{-- =================================================
                             MAIN BLOG IMAGE
                        ================================================== --}}
                        @if (!empty($blog->image))

                            <figure class="article-detail-main-image">

                                <img
                                    src="{{ asset($blog->image) }}"
                                    alt="{{ $blog->title }}"
                                >

                            </figure>

                        @endif


                        {{-- =================================================
                             INNER DESCRIPTION
                        ================================================== --}}
                        @if (!empty($blog->inner_desc))

                            <div class="article-detail-description inner-description">
                                {!! $blog->inner_desc !!}
                            </div>

                        @endif


                        {{-- =================================================
                             ADDITIONAL CONTENT BLOCKS
                        ================================================== --}}
                        @if (!empty($blog->content_blocks) && is_array($blog->content_blocks))

                            <div class="additional-content">

                                @foreach ($blog->content_blocks as $block)

                                    {{-- =====================================
                                         ADDITIONAL IMAGE
                                    ====================================== --}}
                                    @if (($block['type'] ?? '') === 'image')

                                        @if (!empty($block['path']))

                                            <figure class="article-detail-additional-image">

                                                <img
                                                    src="{{ asset($block['path']) }}"
                                                    alt="{{ $blog->title }}"
                                                >

                                            </figure>

                                        @endif

                                    @endif


                                    {{-- =====================================
                                         ADDITIONAL DESCRIPTION
                                    ====================================== --}}
                                    @if (($block['type'] ?? '') === 'description')

                                        @if (!empty($block['content']))

                                            <div class="article-detail-description additional-description">
                                                {!! $block['content'] !!}
                                            </div>

                                        @endif

                                    @endif

                                @endforeach

                            </div>

                        @endif

                    </article>

                </div>

            </div>
        </div>
    </section>

@endsection


@section('css')

<style>

    /* =========================================================
       ARTICLE BANNER
    ========================================================= */

    .article-banner {
        position: relative;

        padding: 125px 20px 105px;

        background:
            linear-gradient(
                135deg,
                #f8f9fb 0%,
                #ffffff 50%,
                #f2f4f7 100%
            );

        border-bottom: 1px solid #eeeeee;

        overflow: hidden;
    }


    .article-banner::before {
        content: "";

        position: absolute;

        width: 420px;
        height: 420px;

        border-radius: 50%;

        background: rgba(0, 0, 0, 0.025);

        top: -220px;
        left: -150px;
    }


    .article-banner::after {
        content: "";

        position: absolute;

        width: 350px;
        height: 350px;

        border-radius: 50%;

        background: rgba(0, 0, 0, 0.025);

        right: -130px;
        bottom: -220px;
    }


    .article-banner-content {
        position: relative;

        z-index: 2;

        max-width: 980px;

        margin: 0 auto;

        text-align: center;
    }


    .article-label {
        display: inline-flex;

        align-items: center;
        justify-content: center;

        padding: 9px 18px;

        border: 1px solid #dcdcdc;

        border-radius: 50px;

        background: rgba(255, 255, 255, 0.85);

        color: #555555;

        font-size: 11px;

        font-weight: 700;

        letter-spacing: 2.5px;

        line-height: 1;

        text-transform: uppercase;

        margin-bottom: 25px;
    }


    .article-banner h1 {
        max-width: 950px;

        margin: 0 auto;

        color: #151515;

        font-size: 56px;

        font-weight: 700;

        line-height: 1.15;

        letter-spacing: -1.2px;

        text-wrap: balance;
    }


    .article-banner-line {
        width: 55px;

        height: 3px;

        margin: 30px auto 0;

        background: #151515;

        border-radius: 10px;
    }


    /* =========================================================
       ARTICLE SECTION
    ========================================================= */

    .article-section {
        padding: 65px 20px 100px;

        background: #ffffff;
    }


    .article-content {
        width: 100%;

        max-width: 860px;

        margin: 0 auto;
    }


    /* =========================================================
       ARTICLE DESCRIPTION
    ========================================================= */

    .article-detail-description {
        width: 100%;

        max-width: none;

        margin: 0;

        color: #3a3a3a;

        font-size: 18px;

        font-weight: 400;

        line-height: 1.85;

        letter-spacing: 0.05px;

        text-align: left;
    }


    /* =========================================================
       PARAGRAPHS
    ========================================================= */

    .article-detail-description p {
        margin: 0 0 22px;

        padding: 0;

        color: #3a3a3a;

        font-size: 18px;

        line-height: 1.85;
    }


    .article-detail-description p:last-child {
        margin-bottom: 0;
    }


    .article-detail-description p:first-child {
        margin-top: 0;
    }


    /* =========================================================
       HEADINGS
    ========================================================= */

    .article-detail-description h2,
    .article-detail-description h3,
    .article-detail-description h4,
    .article-detail-description h5,
    .article-detail-description h6 {

        color: #171717;

        font-weight: 700;

        line-height: 1.35;

        letter-spacing: -0.25px;

        margin-left: 0;

        margin-right: 0;
    }


    .article-detail-description h2 {
        font-size: 30px;

        margin-top: 42px;

        margin-bottom: 18px;
    }


    .article-detail-description h3 {
        font-size: 26px;

        margin-top: 36px;

        margin-bottom: 16px;
    }


    .article-detail-description h4 {
        font-size: 22px;

        margin-top: 30px;

        margin-bottom: 14px;
    }


    .article-detail-description h5 {
        font-size: 20px;

        margin-top: 26px;

        margin-bottom: 12px;
    }


    .article-detail-description h6 {
        font-size: 18px;

        margin-top: 24px;

        margin-bottom: 10px;
    }


    /* =========================================================
       BOLD TEXT
    ========================================================= */

    .article-detail-description strong,
    .article-detail-description b {

        color: #171717;

        font-weight: 700;
    }


    /* =========================================================
       LINKS
    ========================================================= */

    .article-detail-description a {

        color: #222222;

        text-decoration: underline;

        text-decoration-thickness: 1px;

        text-underline-offset: 3px;
    }


    /* =========================================================
       LISTS
    ========================================================= */

    .article-detail-description ul,
    .article-detail-description ol {

        margin-top: 10px;

        margin-bottom: 24px;

        padding-left: 28px;
    }


    .article-detail-description li {

        margin-bottom: 9px;

        padding-left: 4px;

        line-height: 1.8;
    }


    .article-detail-description li:last-child {
        margin-bottom: 0;
    }


    /* =========================================================
       BLOCKQUOTE
    ========================================================= */

    .article-detail-description blockquote {

        margin: 30px 0;

        padding: 18px 24px;

        border-left: 3px solid #222222;

        background: #f7f7f7;

        color: #444444;

        font-size: 19px;

        line-height: 1.75;
    }


    /* =========================================================
       MAIN DESCRIPTION
    ========================================================= */

    .main-description {

        margin-bottom: 32px;
    }


    /* =========================================================
       INNER DESCRIPTION
    ========================================================= */

    .inner-description {

        margin-top: 0;

        margin-bottom: 30px;
    }


    /* =========================================================
       ADDITIONAL CONTENT
    ========================================================= */

    .additional-content {

        margin-top: 8px;
    }


    /* =========================================================
       ADDITIONAL DESCRIPTION
    ========================================================= */

    .additional-description {

        margin-top: 12px;

        margin-bottom: 30px;
    }


    /* =========================================================
       MAIN BLOG IMAGE
    ========================================================= */

    .article-detail-main-image {

        width: 100%;

        margin: 32px 0 34px;

        padding: 0;

        overflow: hidden;

        border-radius: 12px;

        background: #f5f5f5;
    }


    .article-detail-main-image img {

        display: block;

        width: 100%;

        height: auto;

        max-width: 100%;

        object-fit: cover;

        border-radius: 12px;
    }


    /* =========================================================
       ADDITIONAL IMAGE
    ========================================================= */

    .article-detail-additional-image {

        width: 100%;

        margin: 28px 0 20px;

        padding: 0;

        overflow: hidden;

        border-radius: 12px;

        background: #f5f5f5;
    }


    .article-detail-additional-image img {

        display: block;

        width: 100%;

        height: auto;

        max-width: 100%;

        object-fit: cover;

        border-radius: 12px;
    }


    /* =========================================================
       DESCRIPTION → IMAGE
    ========================================================= */

    .article-detail-description + .article-detail-main-image {

        margin-top: 28px;
    }


    .article-detail-description + .article-detail-additional-image {

        margin-top: 28px;
    }


    /* =========================================================
       IMAGE → DESCRIPTION
    ========================================================= */

    .article-detail-main-image + .article-detail-description {

        margin-top: 20px;
    }


    .article-detail-additional-image + .article-detail-description {

        margin-top: 12px;
    }


    /* =========================================================
       TABLET
    ========================================================= */

    @media (max-width: 1199px) {

        .article-banner {

            padding: 105px 20px 90px;
        }


        .article-banner h1 {

            font-size: 48px;
        }


        .article-section {

            padding: 55px 20px 85px;
        }

    }


    /* =========================================================
       TABLET / SMALL LAPTOP
    ========================================================= */

    @media (max-width: 991px) {

        .article-banner {

            padding: 90px 20px 75px;
        }


        .article-banner h1 {

            font-size: 42px;

            letter-spacing: -0.8px;
        }


        .article-section {

            padding: 50px 20px 75px;
        }


        .article-content {

            max-width: 800px;
        }


        .article-detail-description {

            font-size: 17px;

            line-height: 1.8;
        }


        .article-detail-description p {

            font-size: 17px;

            line-height: 1.8;

            margin-bottom: 20px;
        }


        .article-detail-main-image {

            margin: 28px 0 30px;
        }


        .article-detail-additional-image {

            margin: 25px 0 18px;
        }

    }


    /* =========================================================
       MOBILE
    ========================================================= */

    @media (max-width: 767px) {

        .article-banner {

            padding: 70px 18px 60px;
        }


        .article-label {

            padding: 8px 15px;

            font-size: 10px;

            letter-spacing: 2px;

            margin-bottom: 20px;
        }


        .article-banner h1 {

            font-size: 32px;

            line-height: 1.2;

            letter-spacing: -0.4px;
        }


        .article-banner-line {

            width: 45px;

            height: 2px;

            margin-top: 24px;
        }


        .article-section {

            padding: 40px 15px 60px;
        }


        .article-content {

            max-width: 100%;
        }


        .article-detail-description {

            font-size: 16px;

            line-height: 1.8;
        }


        .article-detail-description p {

            font-size: 16px;

            line-height: 1.8;

            margin-bottom: 18px;
        }


        .article-detail-description h2 {

            font-size: 25px;

            margin-top: 32px;

            margin-bottom: 14px;
        }


        .article-detail-description h3 {

            font-size: 22px;

            margin-top: 28px;

            margin-bottom: 13px;
        }


        .article-detail-description h4 {

            font-size: 19px;

            margin-top: 24px;

            margin-bottom: 12px;
        }


        .article-detail-description h5 {

            font-size: 18px;

            margin-top: 22px;

            margin-bottom: 10px;
        }


        .main-description {

            margin-bottom: 25px;
        }


        .inner-description {

            margin-top: 0;

            margin-bottom: 25px;
        }


        .additional-content {

            margin-top: 5px;
        }


        .additional-description {

            margin-top: 10px;

            margin-bottom: 24px;
        }


        .article-detail-main-image {

            margin: 25px 0 27px;

            border-radius: 9px;
        }


        .article-detail-main-image img {

            border-radius: 9px;
        }


        .article-detail-additional-image {

            margin: 22px 0 15px;

            border-radius: 9px;
        }


        .article-detail-additional-image img {

            border-radius: 9px;
        }


        .article-detail-description blockquote {

            padding: 15px 18px;

            margin: 22px 0;

            font-size: 17px;

            line-height: 1.7;
        }

    }

</style>

@endsection