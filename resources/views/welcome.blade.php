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

        <a href="https://wa.me/6281250205040?text=Halo%2C%20saya%20ingin%20membuat%20halaman%20kenangan%20digital%20di%20Terkasih.com" target="_blank" style="display: inline-flex; align-items: center; gap: 8px; margin-top: 16px; padding: 12px 24px; background: #25D366; color: #fff; border-radius: 999px; text-decoration: none; font-size: 0.9rem; font-weight: 500; transition: background 0.2s;" onmouseover="this.style.background='#1da851'" onmouseout="this.style.background='#25D366'">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
            WhatsApp
        </a>
    </div>

    <p class="footer">terkasih.com</p>
</body>
</html>