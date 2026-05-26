<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>In Loving Memory — {{ $memorialPage->person_name }}</title>

    {{-- Open Graph / Social Sharing --}}
    <meta property="og:type"        content="website">
    <meta property="og:site_name"   content="Terkasih.com">
    <meta property="og:url"         content="{{ url()->current() }}">
    <meta property="og:title"       content="In Loving Memory — {{ $memorialPage->person_name }}">
    <meta property="og:description" content="{{ $memorialPage->subtitle ?? 'Halaman kenangan digital di Terkasih.com' }}">
    <meta property="og:image"       content="{{ url('images/dini-og.jpg') }}">
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="In Loving Memory — {{ $memorialPage->person_name }}">
    <meta name="twitter:description" content="{{ $memorialPage->subtitle ?? 'Halaman kenangan digital di Terkasih.com' }}">
    <meta name="twitter:image"       content="{{ url('images/dini-og.jpg') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&family=Inria+Serif:ital,wght@0,300;1,300;1,400&family=Noto+Serif+Display:ital,wdth,wght@0,62.5,300;0,62.5,400;0,62.5,600;1,62.5,300&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }

        body {
            background: #0a0a0a;
            font-family: 'DM Sans', sans-serif;
            color: #ffffff;
            display: flex;
            justify-content: center;
            min-height: 100vh;
        }

        .page {
            width: min(100vw, 430px);
            min-height: 100vh;
            background: #0d0b0a;
            background-image: url("{{ asset('images/dini-carolina/bg hitam.svg') }}");
            background-size: 4000px auto;
            background-position: center top;
            background-repeat: repeat-y;
            overflow-x: hidden;
            position: relative;
        }

        @media (min-width: 431px) {
            .page { box-shadow: 0 0 0 1px #1e1e1e, 0 32px 80px rgba(0, 0, 0, 0.6); }
        }

        /* ── Hero ── */
        .hero {
            position: relative;
            text-align: center;
            padding-bottom: 0;
        }

        /* Flower left/right decoration */
        .hero-flowers {
            position: relative;
            width: 100%;
            height: 290px;
            pointer-events: none;
            user-select: none;
        }

        .flower-kiri-kanan {
            position: absolute;
            left: -10%;
            top: 50%;
            width: 300px;
            height: auto;
            pointer-events: none;
            user-select: none;
            opacity: 0.9;
            z-index: 3;
            /* mirror */
            transform: translate(-50%, -50%) scaleX(-1); ;
        }

         .flower-kiri-kanan-2 {
            position: absolute;
            right: -80%;
            top: 50%;
            width: 300px;
            height: auto;
            pointer-events: none;
            user-select: none;
            opacity: 0.9;
            z-index: 3;
            /* mirror */
            transform: translate(-50%, -50%);
        }

        /* if on mobile, flower-kiri-kanan-2 should have right of -90% */
        @media (max-width: 430px) {
            .flower-kiri-kanan-2 {
                right: -85%;
            }
        }

        /* Portrait */
        .portrait-ring {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 5;
            border-radius: 50%;
            padding: 4px;
            background: #0d0d0d;
            border: 1.5px solid rgba(255, 255, 255, 0.25);
            box-shadow: 0 0 0 6px #0d0d0d, 0 0 0 8px rgba(255,255,255,0.12), 0 12px 40px rgba(0,0,0,0.7);
        }

        .portrait {
            width: 170px;
            height: 170px;
            border-radius: 50%;
            object-fit: cover;
            object-position: center top;
            border: 2px solid rgba(255,255,255,0.18);
            display: block;
            background: #1a1a1a;
        }

        /* ── Hero body ── */
        .hero-body {
            padding: 14px 28px 0;
            position: relative;
            z-index: 2;
            margin-top: -20px
        }

        .person-name {
            font-family: Tahoma, sans-serif;
            font-weight: 400;
            font-size: clamp(2rem, 9vw, 3.2rem);
            line-height: 1.05;
            letter-spacing: -0.01em;
            color: #ffffff;
        }

        .age-row {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 12px;
        }

        .age-dots {
            color: #ffffff;
            font-size: 0.55rem;
            letter-spacing: 0.3em;
        }

        .age-text {
            font-family: 'DM Sans', sans-serif;
            font-weight: 300;
            font-size: 0.83rem;
            letter-spacing: 0.12em;
            color: #ffffff;
        }

        .verse-block {
            margin-top: 20px;
            padding: 0 8px;
        }

        .verse-text {
            font-family: Tahoma, sans-serif;
            font-style: italic;
            font-weight: 300;
            font-size: 0.93rem;
            line-height: 1.78;
            color: #ffffff;
        }

        .verse-ref {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.76rem;
            color: #ffffff;
            margin-top: 6px;
            letter-spacing: 0.05em;
        }

        .hero-description {
            font-family: 'DM Sans', sans-serif;
            font-weight: 300;
            font-size: 0.88rem;
            line-height: 1.82;
            color: #ffffff;
            margin-top: 16px;
            padding: 0 4px;
        }

        /* ── Share ── */
        .share-row {
            margin-top: 22px;
            display: flex;
            justify-content: center;
        }
        .share-btn {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 9px 22px;
            border: 1px solid rgba(255,255,255,0.22);
            border-radius: 999px;
            background: transparent;
            color: #ffffff;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.78rem;
            letter-spacing: 0.06em;
            cursor: pointer;
            transition: background 0.18s, color 0.18s, border-color 0.18s;
            -webkit-tap-highlight-color: transparent;
        }
        .share-btn:hover, .share-btn.copied {
            background: rgba(255,255,255,0.1);
            color: #ffffff;
            border-color: rgba(255,255,255,0.4);
        }
        .share-btn svg { flex-shrink: 0; }

        /* ── Ornamental dividers ── */
        .svg-divider-wrap {
            text-align: center;
            padding: 4px 0;
            pointer-events: none;
            user-select: none;
        }

        .svg-divider {
            width: 260px;
            height: auto;
            max-width: 70%;
            display: inline-block;
            pointer-events: none;
            user-select: none;
        }

        /* ── Section ── */
        .section {
            padding: 0 32px;
            text-align: center;
        }

        .section-block { margin-bottom: 24px; }

        .s-heading {
            font-family: Tahoma, sans-serif;
            font-weight: 400;
            font-size: 0.78rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: #ffffff;
            margin-bottom: 16px;
        }

        .s-label {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.72rem;
            font-weight: 400;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: #ffffff;
            margin-bottom: 5px;
        }

        .s-value {
            font-family: Tahoma, sans-serif;
            font-weight: 500;
            font-size: clamp(1.1rem, 5vw, 1.5rem);
            color: #ffffff;
            line-height: 1.35;
            white-space: pre-line;
        }

        .s-value.sm {
            font-size: clamp(0.95rem, 4.4vw, 1.28rem);
        }

        .s-address {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.78rem;
            color: #ffffff;
            margin-top: 5px;
            letter-spacing: 0.03em;
        }

        .s-italic {
            font-style: italic;
            color: #ffffff;
        }

        /* ── Support ── */
        .support-note {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.85rem;
            color: #ffffff;
            line-height: 1.75;
            margin-bottom: 20px;
        }

        .btn-outline {
            display: inline-block;
            padding: 11px 32px;
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 8px;
            background: transparent;
            color: #ffffff;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.84rem;
            letter-spacing: 0.06em;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.18s, color 0.18s, border-color 0.18s;
        }
        .btn-outline:hover {
            background: rgba(255,255,255,0.08);
            color: #ffffff;
            border-color: rgba(255,255,255,0.5);
        }

        /* ── Memories ── */
        .memories-section { padding: 0 32px; text-align: center; }

        .memories-title {
            font-family: Tahoma, sans-serif;
            font-weight: 400;
            font-size: 1.45rem;
            letter-spacing: 0.08em;
            color: #ffffff;
            margin-bottom: 6px;
        }

        .memories-ornament {
            display: flex;
            justify-content: center;
            margin: 8px 0 14px;
        }

        .memories-sub {
            font-family: 'DM Sans', sans-serif;
            font-weight: 300;
            font-size: 0.86rem;
            color: #ffffff;
            line-height: 1.65;
            margin-bottom: 24px;
        }

        /* ── Tribute form ── */
        .tribute-form {
            display: grid;
            gap: 10px;
            text-align: left;
            margin-bottom: 28px;
        }

        .tribute-form input,
        .tribute-form textarea,
        .tribute-form select {
            width: 100%;
            padding: 11px 14px;
            border: 1px solid rgba(255,255,255,0.14);
            border-radius: 8px;
            background: rgba(255,255,255,0.05);
            font-family: 'DM Sans', sans-serif;
            font-size: 0.87rem;
            color: #ffffff;
            outline: none;
            transition: border-color 0.18s;
        }
        .tribute-form input::placeholder,
        .tribute-form textarea::placeholder { color: rgba(255,255,255,0.3); }
        .tribute-form input:focus,
        .tribute-form textarea:focus { border-color: rgba(255,255,255,0.35); }
        .tribute-form textarea { min-height: 112px; resize: vertical; }

        .checklist {
            display: flex;
            flex-wrap: wrap;
            gap: 6px 8px;
        }

        .checklist label {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.8rem;
            padding: 5px 11px;
            border: 1px solid rgba(255,255,255,0.18);
            border-radius: 999px;
            cursor: pointer;
            color: #ffffff;
            background: rgba(255,255,255,0.04);
            transition: border-color 0.15s, background 0.15s;
        }
        .checklist label:hover { border-color: rgba(255,255,255,0.35); }
        .checklist input[type="checkbox"] { width: auto; accent-color: rgba(255,255,255,0.6); }

        .form-hint {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.74rem;
            color: #ffffff;
        }

        .btn-fill {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 12px;
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 8px;
            background: rgba(255,255,255,0.07);
            color: #ffffff;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.87rem;
            letter-spacing: 0.05em;
            cursor: pointer;
            transition: background 0.18s, border-color 0.18s;
        }
        .btn-fill:hover {
            background: rgba(255,255,255,0.12);
            border-color: rgba(255,255,255,0.4);
        }

        /* ── Tribute cards ── */
        .tc-section-header { text-align: center; margin: 22px 0 14px; }
        .tc-section-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.82rem;
            font-weight: 400;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #ffffff;
            margin-top: 4px;
        }
        .tribute-cards { display: grid; gap: 10px; margin-top: 4px; }

        .tribute-card {
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 10px;
            background: rgba(255,255,255,0.04);
            text-align: left;
            overflow: hidden;
        }
        .tribute-card.highlighted {
            border-color: rgba(255,255,255,0.2);
            border-left: 3px solid rgba(255,255,255,0.4);
            background: rgba(255,255,255,0.07);
        }

        /* Photos: edge-to-edge */
        .tc-photos {
            display: flex;
            gap: 2px;
            flex-wrap: nowrap;
        }
        .tc-photos img {
            flex: 1 1 0;
            min-width: 0;
            height: 160px;
            object-fit: cover;
            border-radius: 0;
            cursor: zoom-in;
            transition: opacity 0.15s;
        }
        .tc-photos img:hover { opacity: 0.82; }
        .tc-photos[data-count="1"] img { height: 210px; }
        .tc-photos[data-count="2"] img { height: 160px; }
        .tc-photos[data-count="3"] img { height: 130px; }

        .tc-body { padding: 13px 16px 15px; }

        .tc-message {
            font-family: 'Inria Serif', serif;
            font-size: 1rem;
            line-height: 1.68;
            color: #ffffff;
            margin-bottom: 12px;
        }

        .tc-footer {
            border-top: 1px solid rgba(255,255,255,0.08);
            padding-top: 9px;
        }

        .tc-name {
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
            font-size: 0.87rem;
            color: #ffffff;
            margin-bottom: 2px;
        }
        .tc-relation {
            font-size: 0.74rem;
            color: #ffffff;
        }

        /* ── Photo modal ── */
        #photo-modal {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: rgba(0, 0, 0, 0.92);
            align-items: center;
            justify-content: center;
            padding: 20px;
            cursor: zoom-out;
        }
        #photo-modal.open { display: flex; }
        #pm-img {
            max-width: 90vw;
            max-height: 88vh;
            object-fit: contain;
            border-radius: 6px;
            box-shadow: 0 8px 48px rgba(0, 0, 0, 0.8);
            cursor: default;
        }

        .empty-state {
            padding: 20px 16px;
            text-align: center;
            color: #ffffff;
            font-size: 0.84rem;
            line-height: 1.6;
            border: 1px dashed rgba(255,255,255,0.15);
            border-radius: 10px;
        }

        /* ── Pagination ── */
        .pg-wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            margin-top: 16px;
            padding: 2px 0 6px;
        }
        .pg-btn {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.8rem;
            color: #ffffff;
            text-decoration: none;
            padding: 8px 14px;
            border: 1px solid rgba(255,255,255,0.14);
            border-radius: 8px;
            background: rgba(255,255,255,0.04);
            transition: background 0.15s, color 0.15s;
            white-space: nowrap;
        }
        .pg-btn:hover { background: rgba(255,255,255,0.08); color: #fff; }
        .pg-disabled {
            color: #ffffff;
            border-color: rgba(255,255,255,0.06);
            pointer-events: none;
        }
        .pg-info {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.76rem;
            color: #ffffff;
            text-align: center;
            flex: 1;
        }

        /* ── Alerts ── */
        .alert-success {
            margin: 0 32px 0;
            padding: 12px 16px;
            border-radius: 8px;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.14);
            font-size: 0.86rem;
            color: #ffffff;
            text-align: center;
            line-height: 1.6;
        }

        .form-notice {
            margin: 0 0 18px;
            padding: 13px 16px;
            border-radius: 8px;
            background: rgba(255, 80, 80, 0.08);
            border: 1px solid rgba(255, 80, 80, 0.2);
            text-align: left;
        }
        .form-notice p.fn-title {
            font-size: 0.8rem;
            font-weight: 500;
            color: rgba(255, 150, 130, 0.9);
            margin-bottom: 5px;
        }
        .form-notice ul {
            list-style: none;
            font-size: 0.8rem;
            color: rgba(255, 150, 130, 0.75);
            line-height: 1.75;
            padding-left: 2px;
        }
        .form-notice ul li::before { content: '— '; opacity: 0.6; }

        /* ── Footer ── */
        .footer {
            padding: 36px 32px 52px;
            text-align: center;
            margin-top: 36px;
            border-top: 1px solid rgba(255,255,255,0.08);
        }
        .footer-headline {
            font-family: 'DM Sans', sans-serif;
            font-weight: 400;
            font-size: 0.68rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: #ffffff;
            line-height: 1.9;
            margin-bottom: 12px;
        }
        .footer-brand {
            display: inline-block;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.76rem;
            color: #ffffff;
            letter-spacing: 0.1em;
            text-decoration: none;
            padding: 8px 22px;
            border: 1px solid rgba(255,255,255,0.18);
            border-radius: 6px;
            transition: background 0.18s, color 0.18s, border-color 0.18s;
        }
        .footer-brand:hover {
            background: rgba(255,255,255,0.06);
            color: #fff;
            border-color: rgba(255,255,255,0.35);
        }

        /* ── Animations ── */
        @keyframes fadeSlideUp {
            from { opacity: 0; transform: translateY(-14px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .hero-flowers { animation: fadeSlideUp 1.2s ease both; }
        .hero-body    { animation: fadeSlideUp 1.2s 0.28s ease both; }

        .reveal {
            opacity: 0;
            transition: opacity 0.72s ease;
        }
        .reveal.visible { opacity: 1; }

        /* ── Inline divider ornament ── */
        .divider-inline {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 20px 48px;
        }
        .div-line { flex: 1; height: 1px; background: rgba(255,255,255,0.1); }
        .div-ornament { font-size: 0.42rem; letter-spacing: 0.28em; color: rgba(255,255,255,0.25); }

        /* ── Memories dark background (below 'Kenangan Terkasih') ── */
        .memories-dark-section {
            background: linear-gradient(to bottom, rgba(13, 11, 10, 0) 0%, #0d0b0a 80px);
        }
    </style>
</head>
<body>
<div class="page">

    {{-- ── Hero ── --}}
    <section class="hero" id="top">
            <div style="margin-top: 48px; font-family: 'DM Sans', sans-serif; font-size: 1.25rem;">In loving memory of</div>
            <div class="svg-divider-wrap reveal" style="margin-top: 0px;">
                <img class="svg-divider" style="width:50%" src="{{ asset('images/dini-carolina/divider atas.svg') }}" alt="" aria-hidden="true">
            </div>
        <div class="hero-flowers" aria-hidden="true">

            <img class="flower-kiri-kanan"
                 src="{{ asset('images/dini-carolina/flower kiri kanan.svg') }}"
                 alt="">
            <img class="flower-kiri-kanan-2"
                 src="{{ asset('images/dini-carolina/flower kiri kanan.svg') }}"
                 alt="">
            <div class="portrait-ring">
                <img class="portrait"
                     src="{{ asset('images/dini.png') }}"
                     alt="{{ $memorialPage->person_name }}"
                     onerror="this.style.background='#1a1a1a';">
            </div>
        </div>

        <div class="hero-body">
            <h1 class="person-name">Margareta Dini<br>Carolina Vrisaba</h1>

            <div class="age-row">
                <span class="age-dots">• • •</span>
                <span class="age-text">Dalam usia 40 tahun</span>
                <span class="age-dots">• • •</span>
            </div>

            <div class="verse-block">
                <p class="verse-text">&ldquo;{{ $memorialPage->verse_text_id }}&rdquo;</p>
                <p class="verse-ref">{{ $memorialPage->verse_reference }}</p>
            </div>

            <p class="hero-description">
                {{ $memorialPage->description_id }}<br>
                {{ $memorialPage->subtitle }}
            </p>

 
        </div>
    </section>

    {{-- Divider atas SVG --}}
    <div class="svg-divider-wrap reveal" style="margin: 4px 0;">
        <img class="svg-divider" src="{{ asset('images/dini-carolina/divider bawah.svg') }}" alt="" aria-hidden="true">
    </div>


    {{-- @if (session('status'))
        <div class="alert-success" style="margin-top: 16px;">{{ session('status') }}</div>
    @endif --}}

    {{-- ── Family ── --}}
    <div class="section reveal" id="family" style="padding-top: 4px;">

        <p class="s-heading">Kami yang mengasihi</p>

        <div class="section-block reveal" data-delay="0">
            <p class="s-label">Papa:</p>
            <p class="s-value sm">{{ $memorialPage->father_in_law }}</p>
        </div>

        <div class="section-block reveal" data-delay="80">
            <p class="s-label">Mama:</p>
            <p class="s-value sm">{{ $memorialPage->mother_in_law }}</p>
        </div>

        <div class="section-block reveal" data-delay="160">
            <p class="s-label">Saudara:</p>
            <p class="s-value sm">Yuliana Eka Dewi</p>
            <p class="s-value sm">Anastasia W</p>
        </div>

        <div class="section-block reveal" data-delay="240">
            <p class="s-value sm s-italic">Beserta segenap keluarga tercinta</p>
        </div>

    </div>

    {{-- Divider bawah SVG --}}
    <div class="svg-divider-wrap reveal" style="margin: 4px 0;">
        <img class="svg-divider" src="{{ asset('images/dini-carolina/divider bawah.svg') }}" alt="" aria-hidden="true">
    </div>

    {{-- ── Funeral ── --}}
    <div class="section" id="funeral" style="padding-top: 28px;">

        <div class="section-block reveal" data-delay="0">
            <p class="s-label">Disemayamkan di</p>
            <p class="s-value">{{ $memorialPage->funeral_resting_place }}</p>
            <p class="s-address">Jl. Demak No. 90-92 Surabaya</p>
        </div>

        <div class="section-block reveal" data-delay="80">
            <p class="s-label">Ibadah Tutup Peti</p>
            <p class="s-value">{{ $memorialPage->schedule_closing_coffin }}</p>
        </div>

        <div class="section-block reveal" data-delay="160">
            <p class="s-label">Ibadah Penghiburan</p>
            <p class="s-value">{{ $memorialPage->schedule_comfort_service }}</p>
        </div>

        <div class="section-block reveal" data-delay="240">
            <p class="s-label">Ibadah Pemberangkatan</p>
            <p class="s-value">{{ $memorialPage->schedule_departure_service }}</p>
        </div>

        <div class="section-block reveal" data-delay="320">
            <p class="s-label">Pemberangkatan</p>
            <p class="s-value">Rabu, 27 Mei 2026 Pk. 08:30 WIB</p>
        </div>

        <div class="section-block reveal" data-delay="400">
            <p class="s-label">Dimakamkan di</p>
            <p class="s-value">{{ $memorialPage->burial_information }}</p>
        </div>

                   <div class="share-row">
                <button class="share-btn" id="share-btn" onclick="shareMemorial()" type="button" aria-label="Bagikan halaman ini">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/>
                        <line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/>
                    </svg>
                    <span id="share-label">Bagikan</span>
                </button>
            </div>
    </div>

    {{-- Inline ornament divider --}}
    <div class="svg-divider-wrap reveal" style="margin: 4px 0;">
        <img class="svg-divider" src="{{ asset('images/dini-carolina/divider bawah.svg') }}" alt="" aria-hidden="true">
    </div>


    {{-- ── Support ── --}}
    @if (!$memorialPage->support_hidden)
    <div class="section reveal" id="support">
        <p class="support-note">
            Bagi keluarga dan sahabat yang ingin menyampaikan<br>
            tanda kasih kepada keluarga dapat klik tombol di bawah ini.
        </p>
        <a class="btn-outline" href="{{ route('memorial.support.page', ['slug' => $memorialPage->slug]) }}">
            Kirim tanda kasih
        </a>
    </div>

    <div class="svg-divider-wrap reveal" style="margin: 4px 0;">
        <img class="svg-divider" src="{{ asset('images/dini-carolina/divider bawah.svg') }}" alt="" aria-hidden="true">
    </div>

    @endif

    {{-- Leaf ornament above memories --}}


    {{-- ── Memories ── --}}
    <div class="memories-section" id="memories" style="padding-top: 8px;">
        <p class="memories-title">Kenangan &amp; Doa</p>

        <div style="text-align:center; padding: 0 32px;" aria-hidden="true">
            <img src="{{ asset('images/dini-carolina/leaf bawah kenangan.svg') }}" alt=""
                style="width: 100%; max-width: 80px; display: inline-block; opacity: 0.7; pointer-events: none; user-select: none;">
        </div>

        <p class="memories-sub">Bagikan kenangan, doa, dan pesan kasih untuk keluarga</p>

        @if ($errors->any())
            <div class="form-notice">
                <p class="fn-title">Mohon lengkapi form di bawah ini</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="tribute-form"
            action="{{ route('memorial.tributes.store', ['slug' => $memorialPage->slug]) }}"
            method="post"
            enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" placeholder="Nama Anda" value="{{ old('name') }}" required>
            <div style="display:grid; gap:4px;">
                <input type="tel" name="phone" placeholder="Nomor HP (opsional)" value="{{ old('phone') }}">
                <p style="font-size:0.72rem; color:rgba(255,255,255,0.25); line-height:1.55;">Nomor tidak akan ditampilkan secara publik — hanya untuk keperluan keluarga jika ingin menghubungi.</p>
            </div>
            <div class="checklist">
                @foreach (['Keluarga', 'Sahabat', 'Kolega', 'Lainnya'] as $relation)
                    <label>
                        <input type="checkbox" name="relations[]" value="{{ $relation }}"
                            {{ in_array($relation, old('relations', [])) ? 'checked' : '' }}
                            @if($relation === 'Lainnya') id="cb-lainnya-dc" @endif>
                        {{ $relation }}
                    </label>
                @endforeach
                <div id="lainnya-input-dc" style="display:none; margin-top:6px; width:100%;">
                    <input type="text" name="relation_other" placeholder="Tulis relasi Anda..." value="{{ old('relation_other') }}" style="margin-bottom:0;">
                </div>
            </div>
            <textarea name="message" placeholder="Pesan, doa, cerita, atau kenangan..." required>{{ old('message') }}</textarea>
            <input type="file" name="photos[]" multiple accept="image/jpeg,image/png,image/webp">
            <p class="form-hint">Foto opsional &middot; maks. 3 foto (JPG/PNG/WebP)</p>
            <button class="btn-fill" type="submit">Kirim Kenangan</button>
        </form>

        <div class="tc-section-header">
    <div class="svg-divider-wrap reveal" style="margin: 4px 0;">
        <img class="svg-divider" src="{{ asset('images/dini-carolina/divider bawah.svg') }}" alt="" aria-hidden="true">
    </div>

            <p class="memories-title" style="font-size:1.1rem;">Kenangan Terkasih</p>
        </div>{{-- /.tc-section-header --}}
    </div>{{-- /.memories-section --}}

    <div class="memories-dark-section">
        <div class="memories-ornament" style="margin-top:6px;" aria-hidden="true">
            <svg width="48" height="14" viewBox="0 0 48 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 7 Q12 0 24 7 Q36 14 48 7" stroke="rgba(255,255,255,0.25)" stroke-width="1.2" fill="none"/>
            </svg>
        </div>

        <div style="padding: 0 32px; text-align: center;">
        <div id="tribute-list">
        <div class="tribute-cards">
            @forelse ($tributes as $tribute)
                <article class="tribute-card {{ $tribute->is_highlighted ? 'highlighted' : '' }}">
                    @if (!empty($tribute->photos))
                        <div class="tc-photos" data-count="{{ count($tribute->photos) }}">
                            @foreach ($tribute->photos as $photo)
                                <img class="tc-photo-img" src="{{ asset('storage/' . $photo) }}" alt="Foto kenangan">
                            @endforeach
                        </div>
                    @endif
                    <div class="tc-body">
                        <p class="tc-message">{{ $tribute->message }}</p>
                        <div class="tc-footer">
                            <p class="tc-name">{{ $tribute->name }}</p>
                            @if (!empty($tribute->relations))
                                <p class="tc-relation">{{ implode(', ', $tribute->relations) }}</p>
                            @endif
                        </div>
                    </div>
                </article>
            @empty
                <div class="empty-state">
                    Belum ada kenangan tertulis.<br>
                    Cerita kecil Anda bisa sangat berarti bagi keluarga.
                </div>
            @endforelse
        </div>

        <div class="pagination-wrap">{{ $tributes->links() }}</div>
        </div>{{-- /#tribute-list --}}
        </div>{{-- /padding-inner --}}

    {{-- ── Footer ── --}}
    <footer class="footer reveal">
        <p class="footer-headline">
            Please join us as we say goodbye to<br>a loving sister and friend.
        </p>
        <a class="footer-brand" href="{{ route('home') }}">terkasih.com</a>
    </footer>

    </div>{{-- /.memories-dark-section --}}
</div>

{{-- Photo lightbox modal --}}
<div id="photo-modal" role="dialog" aria-modal="true" aria-label="Pratinjau foto">
    <img id="pm-img" src="" alt="Foto kenangan diperbesar">
</div>

<script>
(function () {
    var obs = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (entry.isIntersecting) {
                var el = entry.target;
                var delay = el.dataset.delay;
                if (delay) { el.style.transitionDelay = delay + 'ms'; }
                el.classList.add('visible');
                obs.unobserve(el);
            }
        });
    }, { threshold: 0.08 });

    document.querySelectorAll('.reveal').forEach(function (el) {
        obs.observe(el);
    });

    // 'Lainnya' custom relation input
    var cbLainnya = document.getElementById('cb-lainnya-dc');
    var lainnyaWrap = document.getElementById('lainnya-input-dc');
    if (cbLainnya && lainnyaWrap) {
        function syncLainnya() {
            lainnyaWrap.style.display = cbLainnya.checked ? 'block' : 'none';
        }
        cbLainnya.addEventListener('change', syncLainnya);
        syncLainnya();
    }

    // Photo lightbox
    var modal = document.getElementById('photo-modal');
    var pmImg = document.getElementById('pm-img');
    if (modal && pmImg) {
        modal.addEventListener('click', function () {
            modal.classList.remove('open');
            pmImg.src = '';
        });
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') { modal.classList.remove('open'); pmImg.src = ''; }
        });
    }

    // AJAX pagination
    function bindLightbox() {
        if (!modal || !pmImg) { return; }
        document.querySelectorAll('#tribute-list .tc-photo-img').forEach(function (img) {
            img.addEventListener('click', function (e) {
                e.stopPropagation();
                pmImg.src = this.src;
                modal.classList.add('open');
            });
        });
    }

    function bindPagination() {
        document.querySelectorAll('#tribute-list a.pg-btn').forEach(function (a) {
            a.addEventListener('click', function (e) {
                e.preventDefault();
                history.pushState(null, '', this.href);
                loadTributes(this.href);
            });
        });
    }

    function loadTributes(url) {
        var list = document.getElementById('tribute-list');
        if (!list) { return; }
        list.style.opacity = '0.4';
        fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
            .then(function (res) { return res.text(); })
            .then(function (html) {
                var parser = new DOMParser();
                var doc = parser.parseFromString(html, 'text/html');
                var incoming = doc.getElementById('tribute-list');
                if (incoming) {
                    list.innerHTML = incoming.innerHTML;
                    list.style.opacity = '1';
                    bindPagination();
                    bindLightbox();
                    list.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            })
            .catch(function () { list.style.opacity = '1'; });
    }

    window.addEventListener('popstate', function () {
        loadTributes(location.href);
    });

    bindPagination();
    bindLightbox();
}());

// Share button
function shareMemorial() {
    var btn = document.getElementById('share-btn');
    var label = document.getElementById('share-label');
    var url = window.location.href.split('?')[0];
    var title = 'In Loving Memory — {{ $memorialPage->person_name }}';
    var text = `Rest in peace sahabat dan saudara terkasih,

{{ $memorialPage->person_name }} 🧡

Informasi kedukaan dan tanda kasih dapat disampaikan melalui:
${url}

Semoga keluarga diberi ketabahan dan kekuatan.`;

    if (navigator.share) {
        navigator.share({ title: title, text: text }).catch(function () {});
    } else {
        navigator.clipboard.writeText(url).then(function () {
            label.textContent = 'Tersalin!';
            btn.classList.add('copied');
            setTimeout(function () {
                label.textContent = 'Bagikan';
                btn.classList.remove('copied');
            }, 2000);
        }).catch(function () {
            window.prompt('Salin tautan ini:', url);
        });
    }
}
</script>
</body>
</html>
