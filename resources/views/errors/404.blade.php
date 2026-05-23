<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Tidak Ditemukan — Terkasih.com</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500&family=Noto+Serif+Display:wdth,wght@62.5,300;62.5,400&display=swap" rel="stylesheet">

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
            text-align: center;
        }

        .flowers {
            position: relative;
            height: 160px;
            width: min(100%, 380px);
            margin-bottom: -12px;
            pointer-events: none;
        }
        .fl { position: absolute; top: 0; width: 150px; opacity: 0.65; }
        .fl-l { left: 0; }
        .fl-r { right: 0; transform: scaleX(-1); }

        .brand {
            font-family: 'Dancing Script', cursive;
            font-size: 1.05rem;
            color: #6e6862;
            letter-spacing: 0.01em;
            margin-bottom: 8px;
        }

        .code {
            font-family: 'Noto Serif Display', serif;
            font-size: 5rem;
            font-weight: 300;
            color: #2a2420;
            line-height: 1;
            letter-spacing: -0.02em;
            margin-bottom: 12px;
        }

        .message {
            font-size: 1rem;
            color: #6e6862;
            line-height: 1.7;
            max-width: 300px;
            margin: 0 auto 28px;
        }

        .btn {
            display: inline-block;
            padding: 11px 28px;
            border: 1.5px solid #2a2420;
            border-radius: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.87rem;
            letter-spacing: 0.05em;
            color: #2a2420;
            text-decoration: none;
            transition: background 0.18s, color 0.18s;
        }
        .btn:hover { background: #2a2420; color: #faf9f7; }

        .footer {
            position: fixed;
            bottom: 20px;
            right: 24px;
            font-size: 0.72rem;
            color: #c4bfb8;
            letter-spacing: 0.06em;
        }
    </style>
</head>
<body>

    <div class="flowers">
        <img class="fl fl-l" src="{{ asset('images/flowers/Flower 1.png') }}" alt="">
        <img class="fl fl-r" src="{{ asset('images/flowers/Flower 1.png') }}" alt="">
    </div>

    <p class="brand">In Loving Memory</p>
    <p class="code">404</p>
    <p class="message">Halaman yang Anda cari tidak ditemukan atau sudah dipindahkan.</p>
    <a class="btn" href="{{ route('home') }}">Kembali ke beranda</a>

    <p class="footer">terkasih.com</p>

</body>
</html>
