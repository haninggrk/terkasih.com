<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tanda Kasih — Keluarga</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500&family=Noto+Serif+Display:ital,wdth,wght@0,62.5,300;0,62.5,400&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'DM Sans', sans-serif;
            background: #eae6e0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .card {
            width: min(92vw, 380px);
            background: #faf9f7;
            border-radius: 16px;
            padding: 40px 32px 36px;
            text-align: center;
            box-shadow: 0 0 0 1px #d4d0cb, 0 16px 48px rgba(28,22,18,0.16);
        }
        .ornament { width: 56px; opacity: 0.55; margin: 0 auto 18px; display: block; }
        .title {
            font-family: 'Noto Serif Display', serif;
            font-stretch: extra-condensed;
            font-weight: 400;
            font-size: 2rem;
            color: #1a1614;
            margin-bottom: 6px;
        }
        .subtitle {
            font-size: 0.78rem;
            color: #9e9890;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-bottom: 28px;
        }
        .field { display: grid; gap: 6px; text-align: left; margin-bottom: 14px; }
        .field label { font-size: 0.72rem; font-weight: 500; color: #6e6862; letter-spacing: 0.05em; }
        .field input[type="password"] {
            width: 100%;
            padding: 11px 14px;
            border: 1px solid #d4d0cb;
            border-radius: 8px;
            background: #fff;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            color: #1a1614;
            outline: none;
            transition: border-color 0.18s;
        }
        .field input:focus { border-color: #8c8680; }
        .error { font-size: 0.78rem; color: #a04040; margin-bottom: 10px; }
        .btn {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #1a1614;
            color: #faf9f7;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.87rem;
            letter-spacing: 0.05em;
            cursor: pointer;
            transition: opacity 0.15s;
        }
        .btn:hover { opacity: 0.82; }
        .back { margin-top: 20px; font-size: 0.76rem; color: #9e9890; }
        .back a { color: #6e6862; text-decoration: underline; text-underline-offset: 3px; }
    </style>
</head>
<body>
<div class="card">
    <img class="ornament" src="{{ asset('images/flowers/Flower 4.png') }}" alt="">
    <h1 class="title">Tanda Kasih</h1>
    <p class="subtitle">Halaman Keluarga</p>

    @if ($errors->has('password'))
        <p class="error">{{ $errors->first('password') }}</p>
    @endif

    <form method="post" action="{{ route('memorial.tanda-kasih.login.post', ['slug' => $slug]) }}">
        @csrf
        <div class="field">
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" name="password" placeholder="••••••••" autofocus>
        </div>
        <button class="btn" type="submit">Masuk</button>
    </form>

    <p class="back">
        <a href="{{ route('memorial.show', ['slug' => $slug]) }}">← Kembali ke halaman memorial</a>
    </p>
</div>
</body>
</html>
