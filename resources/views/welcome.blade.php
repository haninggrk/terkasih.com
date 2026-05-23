<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Terkasih.com — Ruang Kenangan Digital</title>
    <meta name="description" content="Ruang digital untuk mengenang dan merayakan kehidupan orang-orang tercinta.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500&family=Inria+Serif:ital,wght@1,300;1,400&family=Noto+Serif+Display:wdth,wght@62.5,300;62.5,400&display=swap" rel="stylesheet">

    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            min-height: 100vh;
            background: radial-gradient(circle at top, #fff 0%, #faf9f7 65%);
            font-family: 'DM Sans', sans-serif;
            color: #1a1614;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 40px 24px;
        }

        .page {
            width: min(100%, 480px);
            text-align: center;
            position: relative;
        }

        /* ── Floral ── */
        .hero-flowers {
            position: relative;
            height: 180px;
            margin-bottom: -20px;
            overflow: visible;
            pointer-events: none;
        }
        .hf-left, .hf-right {
            position: absolute;
            top: 0;
            width: 160px;
            opacity: 0.7;
        }
        .hf-left  { left: -40px; }
        .hf-right { right: -40px; transform: scaleX(-1); }

        /* ── Brand ── */
        .brand {
            font-family: 'Dancing Script', cursive;
            font-size: clamp(1.5rem, 6vw, 2.1rem);
            color: #4a4440;
            letter-spacing: 0.02em;
            margin-bottom: 4px;
        }

        .wordmark {
            font-family: 'Noto Serif Display', serif;
            font-stretch: extra-condensed;
            font-weight: 300;
            font-size: clamp(3rem, 12vw, 5rem);
            line-height: 1;
            color: #1a1614;
            letter-spacing: -0.01em;
        }

        /* ── Divider ── */
        .divider {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 22px 0;
            color: #c4bfb8;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background: #d4d0cb;
        }
        .divider span { font-size: 0.45rem; letter-spacing: 0.5em; }

        /* ── Tagline ── */
        .tagline {
            font-family: 'Inria Serif', serif;
            font-style: italic;
            font-weight: 300;
            font-size: clamp(1rem, 4vw, 1.25rem);
            line-height: 1.7;
            color: #4a4440;
        }

        .sub {
            font-size: 0.82rem;
            color: #9e9890;
            line-height: 1.7;
            margin-top: 10px;
        }

        /* ── Footer ── */
        .footer {
            position: fixed;
            bottom: 20px;
            right: 24px;
            font-size: 0.7rem;
            color: #c4bfb8;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }

        /* ── Search ── */
        .search-bar {
            margin-top: 28px;
            display: flex;
            border: 1px solid #d8d0c8;
            border-radius: 999px;
            background: #fff;
            box-shadow: 0 8px 28px rgba(74,59,48,0.07);
            overflow: hidden;
        }
        .search-bar input {
            flex: 1;
            border: none;
            padding: 13px 20px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.95rem;
            color: #1a1614;
            background: transparent;
            outline: none;
        }
        .search-bar input::placeholder { color: #b8b3ac; }
        .search-bar button {
            border: none;
            background: #2f2b2a;
            color: #fff;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.88rem;
            font-weight: 500;
            padding: 13px 22px;
            border-radius: 999px;
            margin: 5px;
            cursor: pointer;
            letter-spacing: 0.02em;
        }
        .search-bar button:hover { background: #4a4440; }

        /* ── Contact ── */
        .contact {
            margin-top: 30px;
            padding-top: 22px;
            border-top: 1px solid #e8e4df;
            font-size: 0.8rem;
            color: #9e9890;
            line-height: 2;
        }
        .contact strong {
            display: block;
            margin-bottom: 4px;
            font-size: 0.78rem;
            color: #b8b3ac;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            font-weight: 500;
        }
        .contact a {
            color: #4a4440;
            text-decoration: none;
            font-weight: 500;
        }
        .contact a:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="page">

        <div class="hero-flowers" aria-hidden="true">
            <img class="hf-left"  src="{{ asset('images/flowers/Flower 1.png') }}" alt="">
            <img class="hf-right" src="{{ asset('images/flowers/Flower 1.png') }}" alt="">
        </div>

        <p class="brand">In Loving Memory</p>
        <h1 class="wordmark">Terkasih</h1>

        <div class="divider"><span>✦ ✦ ✦</span></div>

        <p class="tagline">Ruang digital untuk mengenang<br>dan merayakan kehidupan orang-orang tercinta.</p>

        <p class="sub">Setiap kenangan berharga. Setiap doa berarti.</p>

        {{-- <form class="search-bar" action="{{ route('memorial.search') }}" method="GET">
            <input type="text" name="q" placeholder="Nama orang terkasih" autocomplete="off" required>
            <button type="submit">Cari</button>
        </form> --}}

        <p class="contact">
            <strong>Buat halaman kenangan</strong>
            Hubungi kami apabila Anda membutuhkan obituary untuk orang terkasih.<br>
            <a href="mailto:halo.terkasih@gmail.com">halo.terkasih@gmail.com</a>
        </p>
    </div>

    <p class="footer">terkasih.com</p>
</body>
</html>