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
    <meta property="og:image"       content="{{ url('images/eric-og.jpg') }}">
    <meta property="og:image:width" content="1091">
    <meta property="og:image:height" content="1280">
    <meta name="twitter:card"        content="summary_large_image">
    <meta name="twitter:title"       content="In Loving Memory — {{ $memorialPage->person_name }}">
    <meta name="twitter:description" content="{{ $memorialPage->subtitle ?? 'Halaman kenangan digital di Terkasih.com' }}">
    <meta name="twitter:image"       content="{{ url('images/eric-og.jpg') }}">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500&family=Inria+Serif:ital,wght@0,300;1,300;1,400&family=Noto+Serif+Display:ital,wdth,wght@0,62.5,300;0,62.5,400;0,62.5,600;1,62.5,300&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }

        body {
            background: #e5e2dd;
            font-family: 'DM Sans', sans-serif;
            color: #2a2420;
            display: flex;
            justify-content: center;
            min-height: 100vh;
        }

        .page {
            width: min(100vw, 430px);
            min-height: 100vh;
            background: #faf9f7;
            overflow-x: hidden;
            position: relative;
        }

        @media (min-width: 431px) {
            .page { box-shadow: 0 0 0 1px #d4d0cb, 0 32px 80px rgba(28, 22, 18, 0.24); }
        }

        /* ── Side florals ── */
        .side-floral {
            position: absolute;
            pointer-events: none;
            user-select: none;
            z-index: 0;
            opacity: 0.32;
            mix-blend-mode: multiply;
        }
        .sf-1 {
            width: 110px;
            right: -28px;
            top: 640px;
            transform: rotate(22deg);
        }
        .sf-2 {
            width: 100px;
            left: -22px;
            top: 1080px;
            transform: rotate(-18deg) scaleX(-1);
        }
        .sf-3 {
            width: 105px;
            right: -24px;
            top: 1560px;
            transform: rotate(-12deg);
        }
        .sf-4 {
            width: 95px;
            left: -20px;
            top: 2050px;
            transform: rotate(16deg) scaleX(-1);
        }

        /* ── Hero ── */
        .hero { position: relative; text-align: center; }

        .hero-florals {
            position: relative;
            height: 270px;
        }

        .floral {
            position: absolute;
            top: 0;
            width: 210px;
            pointer-events: none;
            user-select: none;
        }
        .floral-left { left: -68px; }
        .floral-right { right: -68px; transform: scaleX(-1); }

        .arc-wrap {
            position: absolute;
            top: 120px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 4;
            pointer-events: none;
        }

        .portrait-ring {
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 5;
            border-radius: 50%;
            padding: 5px;
            background: #faf9f7;
            border: 1.5px solid #c4bfb8;
            box-shadow: 0 0 0 5px #faf9f7, 0 0 0 7px rgba(196, 191, 184, 0.4), 0 10px 32px rgba(40, 34, 28, 0.15);
        }

        .portrait {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #fff;
            display: block;
        }

        /* ── Hero body ── */
        .hero-body { padding: 28px 32px 0; }

        .person-name {
            font-family: 'Noto Serif Display', serif;
            font-stretch: extra-condensed;
            font-weight: 400;
            font-size: clamp(2.5rem, 11vw, 3.8rem);
            line-height: 1.05;
            letter-spacing: -0.01em;
            color: #1a1614;
        }

        .date-range {
            font-family: 'DM Sans', sans-serif;
            font-weight: 300;
            font-size: 0.83rem;
            letter-spacing: 0.07em;
            color: #6e6862;
            margin-top: 6px;
        }

        .verse-block {
            margin-top: 20px;
            padding: 0 4px;
        }

        .verse-text {
            font-family: 'Inria Serif', Georgia, serif;
            font-style: italic;
            font-weight: 300;
            font-size: 0.93rem;
            line-height: 1.72;
            color: #1a1614;
        }

        .verse-ref {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.76rem;
            color: #1a1614;
            margin-top: 5px;
            letter-spacing: 0.03em;
        }

        .hero-description {
            font-family: 'DM Sans', sans-serif;
            font-weight: 300;
            font-size: 0.88rem;
            line-height: 1.78;
            color: #1a1614;
            margin-top: 14px;
            padding: 0 4px;
        }

        .hero-subtitle {
            font-family: 'DM Sans', sans-serif;
            font-weight: 300;
            font-size: 0.8rem;
            letter-spacing: 0.08em;
            color: #1a1614;
            margin-top: 10px;
        }

        /* ── Divider ── */
        .divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 26px 48px;
            color: #c0bbb4;
        }

        .div-line {
            flex: 1;
            height: 1px;
            background: #dedad4;
        }

        .div-ornament {
            font-size: 0.55rem;
            letter-spacing: 0.25em;
            color: #c0bbb4;
        }

        /* ── Section ── */
        .section { padding: 0 32px; text-align: center; }

        .section-block { margin-bottom: 22px; }

        .s-label {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.72rem;
            font-weight: 500;
            letter-spacing: 0.13em;
            text-transform: uppercase;
            color: #1a1614;
            margin-bottom: 5px;
        }

        .s-value {
            font-family: 'Inria Serif', Georgia, serif;
            font-weight: 700;
            font-size: clamp(1.05rem, 4.8vw, 1.45rem);
            color: #1a1614;
            line-height: 1.35;
            white-space: pre-line;
        }

        .s-value.sm {
            font-size: clamp(0.92rem, 4.2vw, 1.25rem);
        }

        .s-address {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.8rem;
            color: #9e9890;
            margin-top: 4px;
            letter-spacing: 0.02em;
        }

        /* ── Support ── */
        .support-intro {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.7rem;
            font-weight: 400;
            letter-spacing: 0.11em;
            text-transform: uppercase;
            color: #6e6862;
            line-height: 1.85;
            margin-bottom: 14px;
        }

        .support-account {
            font-family: 'Inria Serif', Georgia, serif;
            font-weight: 400;
            font-size: clamp(1.3rem, 6vw, 1.9rem);
            color: #1a1614;
            line-height: 1.35;
            margin-bottom: 14px;
            white-space: pre-line;
        }

        .support-note {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.82rem;
            color: #6e6862;
            line-height: 1.65;
            margin-bottom: 18px;
        }

        .btn-outline {
            display: inline-block;
            padding: 10px 26px;
            border: 1px solid #b8b3ac;
            border-radius: 6px;
            background: transparent;
            color: #3e3832;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.82rem;
            letter-spacing: 0.06em;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.18s, color 0.18s;
        }
        .btn-outline:hover { background: #1a1614; color: #faf9f7; border-color: #1a1614; }

        /* ── Memories ── */
        .memories-title {
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
            font-size: 0.76rem;
            letter-spacing: 0.24em;
            text-transform: uppercase;
            color: #1a1614;
            margin-bottom: 8px;
        }

        .memories-ornament {
            display: flex;
            justify-content: center;
            margin-bottom: 10px;
        }

        .memories-sub {
            font-family: 'DM Sans', sans-serif;
            font-weight: 300;
            font-size: 0.86rem;
            color: #6e6862;
            line-height: 1.65;
            margin-bottom: 22px;
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
            border: 1px solid #d4d0cb;
            border-radius: 8px;
            background: #ffffff;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.87rem;
            color: #2a2420;
            outline: none;
            transition: border-color 0.18s;
        }
        .tribute-form input:focus,
        .tribute-form textarea:focus { border-color: #8c8680; }
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
            padding: 5px 10px;
            border: 1px solid #d4d0cb;
            border-radius: 999px;
            cursor: pointer;
            color: #4a4440;
            background: #faf9f7;
            transition: border-color 0.15s;
        }
        .checklist label:hover { border-color: #9e9890; }
        .checklist input[type="checkbox"] { width: auto; accent-color: #4a4440; }

        .form-hint {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.74rem;
            color: #9e9890;
        }

        .btn-fill {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #2a2420;
            color: #faf9f7;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.87rem;
            letter-spacing: 0.05em;
            cursor: pointer;
            transition: background 0.18s;
        }
        .btn-fill:hover { background: #1a1614; }

        /* ── Tribute cards ── */
        .tc-section-header { text-align: center; margin: 22px 0 14px; }
        .tc-section-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.82rem;
            font-weight: 500;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: #9e9890;
            margin-top: 4px;
        }
        .tribute-cards { display: grid; gap: 10px; margin-top: 4px; }

        .tribute-card {
            border: 1px solid #e8e4df;
            border-radius: 10px;
            background: #ffffff;
            text-align: left;
            overflow: hidden;
        }
        .tribute-card.highlighted {
            border-color: #c0bbb4;
            border-left: 3px solid #4a4440;
            background: #f8f7f5;
        }

        /* Photos: edge-to-edge at top of card */
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
        .tc-photos img:hover { opacity: 0.88; }
        .tc-photos[data-count="1"] img { height: 210px; }
        .tc-photos[data-count="2"] img { height: 160px; }
        .tc-photos[data-count="3"] img { height: 130px; }

        /* Card body */
        .tc-body { padding: 13px 16px 15px; }

        .tc-message {
            font-family: 'Inria Serif', serif;
            font-size: 1rem;
            line-height: 1.68;
            color: #3e3832;
            margin-bottom: 12px;
        }

        .tc-footer {
            border-top: 1px solid #eeebe6;
            padding-top: 9px;
        }

        .tc-name {
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
            font-size: 0.87rem;
            color: #1a1614;
            margin-bottom: 2px;
        }
        .tc-relation {
            font-size: 0.74rem;
            color: #9e9890;
        }

        /* ── Photo modal ── */
        #photo-modal {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: rgba(18, 14, 12, 0.9);
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
            box-shadow: 0 8px 48px rgba(0, 0, 0, 0.6);
            cursor: default;
        }

        .empty-state {
            padding: 20px 16px;
            text-align: center;
            color: #9e9890;
            font-size: 0.84rem;
            line-height: 1.6;
            border: 1px dashed #d4d0cb;
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
            color: #4a4440;
            text-decoration: none;
            padding: 8px 14px;
            border: 1px solid #d4d0cb;
            border-radius: 8px;
            background: #fff;
            transition: background 0.15s, color 0.15s;
            white-space: nowrap;
        }
        .pg-btn:hover { background: #f2f0ec; }
        .pg-disabled {
            color: #c4bfb8;
            border-color: #eceae6;
            pointer-events: none;
        }
        .pg-info {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.76rem;
            color: #9e9890;
            text-align: center;
            flex: 1;
        }

        /* ── Alerts ── */
        .alert-success {
            margin: 0 32px 0;
            padding: 12px 16px;
            border-radius: 8px;
            background: #f2f0ec;
            border: 1px solid #d4d0cb;
            font-size: 0.86rem;
            color: #4a4440;
            text-align: center;
            line-height: 1.6;
        }

        .form-notice {
            margin: 0 0 18px;
            padding: 13px 16px;
            border-radius: 8px;
            background: #fdf8f5;
            border: 1px solid #e0cfc9;
            text-align: left;
        }
        .form-notice p.fn-title {
            font-size: 0.8rem;
            font-weight: 500;
            color: #7c4038;
            margin-bottom: 5px;
            letter-spacing: 0.01em;
        }
        .form-notice ul {
            list-style: none;
            font-size: 0.8rem;
            color: #8a5248;
            line-height: 1.75;
            padding-left: 2px;
        }
        .form-notice ul li::before {
            content: '— ';
            opacity: 0.6;
        }

        /* ── Footer ── */
        .footer {
            padding: 36px 32px 52px;
            text-align: center;
            margin-top: 36px;
            border-top: 1px solid #e8e4df;
        }
        .footer-headline {
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
            font-size: 0.7rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #6e6862;
            line-height: 1.9;
            margin-bottom: 10px;
        }
        .footer-brand {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.76rem;
            color: #9e9890;
            letter-spacing: 0.08em;
            text-decoration: none;
        }
        .footer-brand:hover { color: #4a4440; }

        /* ── Hero entrance ── */
        @keyframes fadeSlideUp {
            from { opacity: 0; transform: translateY(-14px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .hero-florals { animation: fadeSlideUp 1.1s ease both; }
        .hero-body    { animation: fadeSlideUp 1.1s 0.28s ease both; }

        /* ── Scroll reveal ── */
        .reveal {
            opacity: 0;
            transition: opacity 0.72s ease;
        }
        .reveal.visible { opacity: 1; }
    </style>
</head>
<body>
<div class="page">

    {{-- Side floral decorations --}}
    <img class="side-floral sf-1" src="{{ asset('images/flowers/Flower 2.png') }}" aria-hidden="true" alt="">
    <img class="side-floral sf-2" src="{{ asset('images/flowers/Flower 3.png') }}" aria-hidden="true" alt="">
    <img class="side-floral sf-3" src="{{ asset('images/flowers/Flower 2.png') }}" aria-hidden="true" alt="">
    <img class="side-floral sf-4" src="{{ asset('images/flowers/Flower 3.png') }}" aria-hidden="true" alt="">

    {{-- ── Hero ── --}}
    <section class="hero" id="top">

        <div class="hero-florals" aria-hidden="true">
            <img class="floral floral-left" src="{{ asset('images/flowers/Flower 1.png') }}" alt="">
            <img class="floral floral-right" src="{{ asset('images/flowers/Flower 1.png') }}" alt="">

            <div class="arc-wrap">
                <svg viewBox="0 0 280 68" width="264" height="68" overflow="visible" aria-label="In Loving Memory">
                    <defs>
                        <path id="ilm-arc" d="M 14 62 A 130 130 0 0 1 266 62"/>
                    </defs>
                    <text>
                        <textPath href="#ilm-arc" startOffset="50%" text-anchor="middle"
                            style="font-family: 'Noto Serif Display', serif; font-size: 20px; fill: #3e3832; letter-spacing: 0.02em;">
                            In Loving Memory
                        </textPath>
                    </text>
                </svg>
            </div>

            <div class="portrait-ring">
                <img class="portrait" src="{{ asset('images/eric.jpg') }}" alt="Eric Pramono">
            </div>
        </div>

        <div class="hero-body">
            <h1 class="person-name">Eric Pramono</h1>

            <p class="date-range">12 Januari 1978 &nbsp;–&nbsp; 23 Mei 2026</p>

            <div class="verse-block">
                <p class="verse-text">&ldquo;I have fought the good fight, I have finished the race, I have kept the faith.&rdquo;</p>
                <p class="verse-ref">(2 Timothy 4:7)</p>
            </div>

            <p class="hero-description">
                Telah berpulang ke rumah Bapa dengan tenang<br>
                pada hari Sabtu, 23 Mei 2026 Pk. 07:26 WIB
            </p>
        </div>
    </section>

    @if (session('status'))
        <div class="alert-success" style="margin-top: 18px;">{{ session('status') }}</div>
    @endif

    {{-- ── Divider ── --}}
    <div class="divider reveal">
        <span class="div-line"></span>
        <span class="div-ornament">✦ ✦ ✦</span>
        <span class="div-line"></span>
    </div>

    {{-- ── Family ── --}}
    <div class="section" id="family">

        <p class="s-label" style="margin-bottom: 16px;">Kami yang mengasihi</p>

        <div class="section-block reveal" data-delay="0">
            <p class="s-label">Istri tercinta:</p>
            <p class="s-value">Sofia Linawaty</p>
        </div>

        <div class="section-block reveal" data-delay="80">
            <p class="s-label">Anak-anak tercinta:</p>
            <p class="s-value sm">Philip Sidney Pramono</p>
            <p class="s-value sm">Noah Griffith Pramono</p>
            <p class="s-value sm">Hugo Faith Pramono</p>
            <p class="s-value sm">Xavier Joy Pramono</p>
        </div>

        <div class="section-block reveal" data-delay="160">
            <p class="s-label">Papa:</p>
            <p class="s-value sm">Pek Tji Kiong (†)</p>
        </div>

        <div class="section-block reveal" data-delay="240">
            <p class="s-label">Papa mertua:</p>
            <p class="s-value sm">Ong Tjing Fong (Edi Yongki)</p>
        </div>

        <div class="section-block reveal" data-delay="320">
            <p class="s-label">Mama:</p>
            <p class="s-value sm">Tienneke Hartanto (†)</p>
        </div>

        <div class="section-block reveal" data-delay="400">
            <p class="s-label">Mama mertua:</p>
            <p class="s-value sm">Lie Kwik Djin (†)</p>
        </div>

        <div class="section-block reveal" data-delay="480">
            <p class="s-value sm" style="font-style: italic;">Beserta segenap famili kami tercinta</p>
        </div>

    </div>

    {{-- ── Divider ── --}}
    <div class="divider reveal">
        <span class="div-line"></span>
        <span class="div-ornament">✦ ✦ ✦</span>
        <span class="div-line"></span>
    </div>

    {{-- ── Funeral ── --}}
    <div class="section" id="funeral">

        <div class="section-block reveal" data-delay="0">
            <p class="s-label">Disemayamkan di</p>
            <p class="s-value">Rumah Duka Adi Jasa<br>Ruang VIP-A</p>
            <p class="s-address">Jl. Demak No. 90-92 Surabaya</p>
        </div>

        <div class="section-block reveal" data-delay="80">
            <p class="s-label">Ibadah Tutup Peti</p>
            <p class="s-value">Minggu, 24 Mei 2026 Pk. 15:00 WIB</p>
        </div>

        <div class="section-block reveal" data-delay="160">
            <p class="s-label">Ibadah Penghiburan</p>
            <p class="s-value">Selasa, 26 Mei 2026 Pk. 19:00 WIB</p>
        </div>

        <div class="section-block reveal" data-delay="240">
            <p class="s-label">Ibadah Pemberangkatan</p>
            <p class="s-value">Rabu, 27 Mei 2026 Pk. 09:30 WIB</p>
        </div>

        <div class="section-block reveal" data-delay="320">
            <p class="s-label">Pemberangkatan</p>
            <p class="s-value">Rabu, 27 Mei 2026 Pk. 10:00 WIB</p>
        </div>

        <div class="section-block reveal" data-delay="400">
            <p class="s-label">Dimakamkan di</p>
            <p class="s-value">Makam Eka Praya</p>
        </div>

    </div>

    {{-- ── Divider ── --}}
    <div class="divider reveal">
        <span class="div-line"></span>
        <span class="div-ornament">✦ ✦ ✦</span>
        <span class="div-line"></span>
    </div>

    {{-- ── Support (toggled via admin panel) ── --}}
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

    <div class="divider reveal">
        <span class="div-line"></span>
        <span class="div-ornament">✦ ✦ ✦</span>
        <span class="div-line"></span>
    </div>
    @endif

    {{-- ── Memories ── --}}
    <div class="section reveal" id="memories">
        <p class="memories-title">Kenangan &amp; Doa</p>

        <div class="memories-ornament" aria-hidden="true">
            <img src="{{ asset('images/flowers/Flower 4.png') }}" alt="" style="width: 72px; opacity: 0.55;">
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
            <div class="checklist">
                @foreach (['Keluarga', 'Sahabat', 'Kolega', 'Lainnya'] as $relation)
                    <label>
                        <input type="checkbox" name="relations[]" value="{{ $relation }}"
                            {{ in_array($relation, old('relations', [])) ? 'checked' : '' }}
                            @if($relation === 'Lainnya') id="cb-lainnya" @endif>
                        {{ $relation }}
                    </label>
                @endforeach
                <div id="lainnya-input" style="display:none; margin-top: 6px;">
                    <input type="text" name="relation_other" placeholder="Tulis relasi Anda..." value="{{ old('relation_other') }}" style="margin-bottom:0;">
                </div>
            </div>
            <textarea name="message" placeholder="Pesan, doa, cerita, atau kenangan..." required>{{ old('message') }}</textarea>
            <input type="file" name="photos[]" multiple accept="image/jpeg,image/png,image/webp">
            <p class="form-hint">Foto opsional &middot; maks. 3 foto (JPG/PNG/WebP)</p>
            <button class="btn-fill" type="submit">Kirim Kenangan</button>
        </form>

        <div class="tc-section-header">
            <div class="divider" style="margin-bottom:16px;">
                <span class="div-line"></span>
                <span class="div-ornament">✦ ✦ ✦</span>
                <span class="div-line"></span>
            </div>
            <p class="memories-title">Kenangan Terkasih</p>
            <div class="memories-ornament" aria-hidden="true">
                <img src="{{ asset('images/flowers/Flower 4.png') }}" alt="" style="width: 56px; opacity: 0.55;">
            </div>
        </div>

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
    </div>

    {{-- ── Footer ── --}}
    <footer class="footer reveal">
        <p class="footer-headline">
            Please join us as we say goodbye to<br>a loving brother and friend.
        </p>
        <a class="footer-brand" href="{{ route('home') }}">terkasih.com</a>
    </footer>

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
    var cbLainnya = document.getElementById('cb-lainnya');
    var lainnyaWrap = document.getElementById('lainnya-input');
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
</script>
</body>
</html>
