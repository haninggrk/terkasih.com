<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tanda Kasih – {{ $memorialPage->person_name }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,300&family=Inria+Serif:ital,wght@1,300;1,400&family=Noto+Serif+Display:wdth,wght@62.5,300;62.5,400;62.5,600&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'DM Sans', sans-serif;
            color: #1a1614;
            background: #eae6e0;
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
            .page { box-shadow: 0 0 0 1px #d4d0cb, 0 32px 80px rgba(28,22,18,0.24); }
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
        .sf-1 { width: 110px; right: -28px; top: 320px; transform: rotate(22deg); }
        .sf-2 { width: 100px; left: -22px; top: 720px; transform: rotate(-18deg) scaleX(-1); }

        /* ── Page header ── */
        .page-header {
            text-align: center;
            padding: 36px 28px 24px;
            position: relative;
            z-index: 1;
        }

        .header-ornament {
            margin: 0 auto 14px;
            width: 64px;
            opacity: 0.6;
        }

        .page-title {
            font-family: 'Noto Serif Display', serif;
            font-stretch: extra-condensed;
            font-weight: 400;
            font-size: clamp(1.8rem, 8vw, 2.6rem);
            line-height: 1.1;
            color: #1a1614;
        }

        .page-subtitle {
            font-size: 0.78rem;
            color: #9e9890;
            letter-spacing: 0.09em;
            text-transform: uppercase;
            margin-top: 6px;
        }

        /* ── Back link ── */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.78rem;
            color: #6e6862;
            text-decoration: none;
            letter-spacing: 0.04em;
            margin-bottom: 8px;
        }
        .back-link:hover { color: #1a1614; }

        /* ── Divider ── */
        .divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 0 48px 24px;
            color: #c0bbb4;
        }
        .div-line { flex: 1; height: 1px; background: #dedad4; }
        .div-ornament { font-size: 0.5rem; letter-spacing: 0.4em; color: #c4bfb8; }

        /* ── Account card ── */
        .account-card {
            margin: 0 24px 24px;
            border: 1px solid #dedad4;
            border-radius: 12px;
            padding: 20px;
            background: #fff;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .account-intro {
            font-size: 0.78rem;
            color: #6e6862;
            line-height: 1.7;
            margin-bottom: 14px;
        }

        .account-label {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.68rem;
            font-weight: 500;
            letter-spacing: 0.13em;
            text-transform: uppercase;
            color: #9e9890;
            margin-bottom: 5px;
        }

        .account-value {
            font-family: 'Inria Serif', Georgia, serif;
            font-style: italic;
            font-weight: 400;
            font-size: clamp(1.1rem, 5vw, 1.5rem);
            color: #1a1614;
            line-height: 1.4;
            white-space: pre-line;
        }

        /* ── Form card ── */
        .form-card {
            margin: 0 24px 24px;
            border: 1px solid #dedad4;
            border-radius: 12px;
            padding: 20px;
            background: #fff;
            position: relative;
            z-index: 1;
        }

        .form-section-label {
            font-size: 0.72rem;
            font-weight: 500;
            letter-spacing: 0.13em;
            text-transform: uppercase;
            color: #9e9890;
            margin-bottom: 14px;
            text-align: center;
        }

        .field { display: grid; gap: 5px; }
        .field + .field { margin-top: 10px; }

        .field label {
            font-size: 0.72rem;
            font-weight: 500;
            color: #6e6862;
            letter-spacing: 0.05em;
        }

        .field input[type="text"],
        .field input[type="number"] {
            width: 100%;
            border: 1px solid #dedad4;
            border-radius: 8px;
            padding: 10px 12px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            color: #1a1614;
            background: #faf9f7;
            outline: none;
            transition: border-color 0.15s;
        }
        .field input:focus { border-color: #b8b3ac; background: #fff; }

        .field input[type="file"] {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.8rem;
            color: #6e6862;
        }

        .btn-submit {
            width: 100%;
            margin-top: 16px;
            padding: 12px;
            border: none;
            border-radius: 8px;
            background: #1a1614;
            color: #faf9f7;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 0.06em;
            cursor: pointer;
            transition: opacity 0.15s;
        }
        .btn-submit:hover { opacity: 0.85; }

        /* ── Contributions list ── */
        .contributions-section {
            margin: 0 24px 40px;
            position: relative;
            z-index: 1;
        }

        .contributions-title {
            font-size: 0.72rem;
            font-weight: 500;
            letter-spacing: 0.13em;
            text-transform: uppercase;
            color: #9e9890;
            text-align: center;
            margin-bottom: 14px;
        }

        .contrib-card {
            border: 1px solid #dedad4;
            border-radius: 10px;
            background: #fff;
            padding: 14px 16px;
        }
        .contrib-card + .contrib-card { margin-top: 8px; }

        .contrib-name {
            font-weight: 600;
            font-size: 0.9rem;
            color: #1a1614;
        }

        .contrib-nominal {
            font-family: 'Inria Serif', Georgia, serif;
            font-style: italic;
            font-size: 1.05rem;
            color: #4a4440;
            margin-top: 2px;
        }

        .contrib-proof {
            font-size: 0.75rem;
            color: #9e9890;
            text-decoration: none;
            margin-top: 4px;
            display: inline-block;
        }
        .contrib-proof:hover { color: #1a1614; }

        .empty-state {
            border: 1px dashed #dedad4;
            border-radius: 10px;
            padding: 24px;
            text-align: center;
            color: #9e9890;
            font-size: 0.85rem;
            line-height: 1.6;
        }

        /* ── Alert ── */
        .alert-success {
            margin: 0 24px 16px;
            padding: 12px 16px;
            border: 1px solid #b8d4b4;
            border-radius: 8px;
            background: #f0f7f0;
            color: #2d5a2d;
            font-size: 0.85rem;
        }
        .alert-error {
            margin: 0 24px 16px;
            padding: 12px 16px;
            border: 1px solid #d4b8b8;
            border-radius: 8px;
            background: #f7f0f0;
            color: #5a2d2d;
            font-size: 0.85rem;
        }
        .alert-error ul { padding-left: 16px; }
    </style>
</head>
<body>
<div class="page">

    <img class="side-floral sf-1" src="{{ asset('images/flowers/Flower 2.png') }}" aria-hidden="true" alt="">
    <img class="side-floral sf-2" src="{{ asset('images/flowers/Flower 3.png') }}" aria-hidden="true" alt="">

    <div class="page-header">
        <a class="back-link" href="{{ route('memorial.show', ['slug' => $memorialPage->slug]) }}">← Kembali ke Memorial</a>

        <div class="header-ornament" aria-hidden="true">
            <img src="{{ asset('images/flowers/Flower 4.png') }}" alt="" style="width: 64px; opacity: 0.55;">
        </div>

        <h1 class="page-title">Tanda Kasih</h1>
        <p class="page-subtitle">{{ $memorialPage->person_name }}</p>
    </div>

    <div class="divider">
        <span class="div-line"></span>
        <span class="div-ornament">✦ ✦ ✦</span>
        <span class="div-line"></span>
    </div>

    @if (session('status'))
        <div class="alert-success">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Account info --}}
    <div class="account-card">
        <p class="account-intro">{{ $memorialPage->support_intro_id }}</p>
        <p class="account-label">Transfer ke</p>
        <p class="account-value">{{ $memorialPage->support_account_placeholder }}</p>
    </div>

    {{-- Form --}}
    <div class="form-card">
        <p class="form-section-label">Konfirmasi Pengiriman</p>
        <form action="{{ route('memorial.support.store', ['slug' => $memorialPage->slug]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" placeholder="Nama lengkap" required value="{{ old('name') }}">
            </div>
            <div class="field">
                <label for="nominal">Nominal</label>
                <input type="text" id="nominal" name="nominal" placeholder="Contoh: 500000" required value="{{ old('nominal') }}">
            </div>
            <div class="field">
                <label for="proof_image">Konfirmasi pengiriman <span style="color:#b8b3ac">(opsional)</span></label>
                <input type="file" id="proof_image" name="proof_image" accept="image/jpeg,image/png,image/webp">
            </div>
            <button class="btn-submit" type="submit">Kirim Konfirmasi</button>
        </form>
    </div>

    {{-- Contributions list --}}
    @if ($supportContributions->isNotEmpty())
    <div class="contributions-section" id="support-list">
        <p class="contributions-title">Telah Disampaikan</p>

        @foreach ($supportContributions as $sc)
            <div class="contrib-card">
                <p class="contrib-name">{{ $sc->name }}</p>
                <p class="contrib-nominal">Rp{{ number_format($sc->nominal, 0, ',', '.') }}</p>
                @if ($sc->proof_image_path)
                    <a class="contrib-proof" href="{{ asset('storage/' . $sc->proof_image_path) }}" target="_blank" rel="noopener">Lihat bukti transfer →</a>
                @endif
            </div>
        @endforeach

        <div style="margin-top: 16px; text-align: center; font-size: 0.8rem; color: #9e9890;">
            {{ $supportContributions->links() }}
        </div>
    </div>
    @else
    <div class="contributions-section" id="support-list">
        <div class="empty-state">
            Belum ada yang terkirim.<br>Kehadiran dan doa Anda sudah sangat berarti.
        </div>
    </div>
    @endif

</div>
</body>
</html>