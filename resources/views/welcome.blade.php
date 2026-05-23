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
            background: #eae6e0;
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
            margin-top: 40px;
            font-size: 0.72rem;
            color: #b8b3ac;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }
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

        <p class="footer">terkasih.com</p>
    </div>
</body>
</html>

    <style>
        :root {
            --bg: #fefcf9;
            --ink: #2d2927;
            --muted: #6f6763;
            --line: #e7ddd4;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            background: radial-gradient(circle at top, #fff 0%, var(--bg) 62%);
            font-family: "Cormorant Garamond", Georgia, serif;
            color: var(--ink);
            padding: 24px;
        }
        .wrap {
            width: min(780px, 100%);
            text-align: center;
        }
        h1 { font-size: clamp(2rem, 6vw, 3.6rem); margin: 0; }
        p { margin: 10px auto 0; max-width: 600px; color: var(--muted); line-height: 1.7; }
        .search {
            margin-top: 26px;
            border: 1px solid var(--line);
            border-radius: 999px;
            padding: 8px;
            display: flex;
            gap: 8px;
            background: #fff;
            box-shadow: 0 15px 40px rgba(74, 59, 48, 0.07);
        }
        input {
            border: none;
            width: 100%;
            padding: 12px 18px;
            border-radius: 999px;
            outline: none;
            font: inherit;
            color: inherit;
        }
        a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 999px;
            text-decoration: none;
            color: #fff;
            background: #2f2b2a;
            padding: 11px 18px;
            white-space: nowrap;
        }
        .quick {
            margin-top: 14px;
            display: inline-flex;
            gap: 10px;
        }
        .quick a {
            background: transparent;
            color: #4d433e;
            border: 1px solid #d8c9bb;
            padding: 8px 14px;
        }
    </style>
</head>
<body>
    <div class="wrap">
        <h1>Terkasih.com</h1>
        <p>Ruang digital untuk mengenang dan merayakan kehidupan orang-orang tercinta.</p>

        <div class="search">
            <input type="text" value="Eric Pramono" readonly>
            <a href="{{ route('memorial.show', ['slug' => 'eric-pramono']) }}">Buka Halaman</a>
        </div>

        <div class="quick">
            <a href="{{ route('memorial.show', ['slug' => 'eric-pramono']) }}">Eric Pramono</a>
            <a href="/admin">Admin Panel</a>
        </div>
    </div>
</body>
</html>
