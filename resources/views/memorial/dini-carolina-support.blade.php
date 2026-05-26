<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tanda Kasih – {{ $memorialPage->person_name }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400&family=Cormorant+SC:wght@400;500;600&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&family=Inria+Serif:ital,wght@1,300;1,400&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }

        body {
            font-family: 'DM Sans', sans-serif;
            color: #ffffff;
            background: #0a0a0a;
            display: flex;
            justify-content: center;
            min-height: 100vh;
        }

        .page {
            width: min(100vw, 430px);
            min-height: 100vh;
            background: #0d0b0a;
            background-image: url("{{ asset('images/dini-carolina/bg hitam.svg') }}");
            background-size: 430px auto;
            background-position: center top;
            background-repeat: repeat-y;
            overflow-x: hidden;
            position: relative;
        }

        @media (min-width: 431px) {
            .page { box-shadow: 0 0 0 1px #1e1e1e, 0 32px 80px rgba(0, 0, 0, 0.6); }
        }

        /* ── Page header ── */
        .page-header {
            text-align: center;
            padding: 40px 28px 24px;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.78rem;
            color: #ffffff;
            text-decoration: none;
            letter-spacing: 0.04em;
            margin-bottom: 16px;
            opacity: 0.7;
            transition: opacity 0.15s;
        }
        .back-link:hover { opacity: 1; }

        .page-title {
            font-family: 'Cormorant SC', Georgia, serif;
            font-weight: 600;
            font-size: clamp(1.7rem, 8vw, 2.4rem);
            line-height: 1.1;
            color: #ffffff;
            letter-spacing: 0.04em;
        }

        .page-subtitle {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.78rem;
            color: #ffffff;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            margin-top: 6px;
        }

        /* ── Divider ── */
        .divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 0 48px 28px;
        }
        .div-line { flex: 1; height: 1px; background: rgba(255,255,255,0.12); }
        .div-ornament { font-size: 0.42rem; letter-spacing: 0.3em; color: rgba(255,255,255,0.3); }

        /* ── Alerts ── */
        .alert-success {
            margin: 0 24px 16px;
            padding: 12px 16px;
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 8px;
            background: rgba(255,255,255,0.07);
            color: #ffffff;
            font-size: 0.85rem;
            line-height: 1.6;
        }
        .alert-error {
            margin: 0 24px 16px;
            padding: 12px 16px;
            border: 1px solid rgba(255, 80, 80, 0.25);
            border-radius: 8px;
            background: rgba(255, 80, 80, 0.07);
            color: #ffffff;
            font-size: 0.85rem;
        }
        .alert-error ul { padding-left: 16px; }

        /* ── Account card ── */
        .account-card {
            margin: 0 24px 20px;
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 12px;
            padding: 20px;
            background: rgba(255,255,255,0.04);
            text-align: center;
        }

        .account-intro {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.78rem;
            color: #ffffff;
            line-height: 1.75;
            margin-bottom: 16px;
        }

        .account-label {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.68rem;
            font-weight: 500;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: #ffffff;
            margin-bottom: 6px;
        }

        .account-value {
            font-family: 'Inria Serif', Georgia, serif;
            font-style: italic;
            font-weight: 400;
            font-size: clamp(1.1rem, 5vw, 1.5rem);
            color: #ffffff;
            line-height: 1.45;
            white-space: pre-line;
        }

        /* ── Form card ── */
        .form-card {
            margin: 0 24px 24px;
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 12px;
            padding: 20px;
            background: rgba(255,255,255,0.04);
        }

        .form-section-label {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.72rem;
            font-weight: 500;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: #ffffff;
            margin-bottom: 16px;
            text-align: center;
        }

        .field { display: grid; gap: 5px; }
        .field + .field { margin-top: 10px; }

        .field label {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.72rem;
            font-weight: 500;
            color: #ffffff;
            letter-spacing: 0.05em;
        }

        .field input[type="text"],
        .field input[type="number"] {
            width: 100%;
            border: 1px solid rgba(255,255,255,0.14);
            border-radius: 8px;
            padding: 10px 12px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            color: #ffffff;
            background: rgba(255,255,255,0.05);
            outline: none;
            transition: border-color 0.15s;
        }
        .field input[type="text"]::placeholder,
        .field input[type="number"]::placeholder { color: rgba(255,255,255,0.35); }
        .field input[type="text"]:focus,
        .field input[type="number"]:focus {
            border-color: rgba(255,255,255,0.35);
            background: rgba(255,255,255,0.07);
        }

        .field input[type="file"] {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.8rem;
            color: #ffffff;
        }

        .field-hint {
            font-size: 0.72rem;
            color: rgba(255,255,255,0.5);
        }

        .btn-submit {
            width: 100%;
            margin-top: 16px;
            padding: 12px;
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 8px;
            background: rgba(255,255,255,0.08);
            color: #ffffff;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 0.06em;
            cursor: pointer;
            transition: background 0.18s, border-color 0.18s;
        }
        .btn-submit:hover {
            background: rgba(255,255,255,0.14);
            border-color: rgba(255,255,255,0.4);
        }

        /* ── Contributions list ── */
        .contributions-section {
            margin: 0 24px 48px;
        }

        .contributions-title {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.72rem;
            font-weight: 500;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: #ffffff;
            text-align: center;
            margin-bottom: 14px;
        }

        .contrib-card {
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 10px;
            background: rgba(255,255,255,0.04);
            padding: 14px 16px;
        }
        .contrib-card + .contrib-card { margin-top: 8px; }

        .contrib-name {
            font-family: 'DM Sans', sans-serif;
            font-weight: 600;
            font-size: 0.9rem;
            color: #ffffff;
        }

        .contrib-nominal {
            font-family: 'Inria Serif', Georgia, serif;
            font-style: italic;
            font-size: 1.05rem;
            color: #ffffff;
            margin-top: 2px;
        }

        .contrib-proof {
            font-size: 0.75rem;
            color: rgba(255,255,255,0.55);
            text-decoration: none;
            margin-top: 4px;
            display: inline-block;
        }
        .contrib-proof:hover { color: #ffffff; }

        .empty-state {
            border: 1px dashed rgba(255,255,255,0.15);
            border-radius: 10px;
            padding: 24px;
            text-align: center;
            color: #ffffff;
            font-size: 0.85rem;
            line-height: 1.6;
        }

        /* ── Pagination ── */
        .pg-wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            margin-top: 16px;
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
            transition: background 0.15s;
            white-space: nowrap;
        }
        .pg-btn:hover { background: rgba(255,255,255,0.08); }
        .pg-disabled {
            color: rgba(255,255,255,0.25);
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

        /* ── Footer ── */
        .footer {
            text-align: center;
            padding: 28px 0 40px;
            border-top: 1px solid rgba(255,255,255,0.08);
            margin-top: 12px;
        }
        .footer a {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.76rem;
            color: rgba(255,255,255,0.45);
            letter-spacing: 0.08em;
            text-decoration: none;
            transition: color 0.15s;
        }
        .footer a:hover { color: #ffffff; }
    </style>
</head>
<body>
<div class="page">

    <div class="page-header">
        <a class="back-link" href="{{ route('memorial.show', ['slug' => $memorialPage->slug]) }}">
            ← Kembali ke Memorial
        </a>

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

    {{-- Confirmation form --}}
    <div class="form-card" id="support-form">
        <p class="form-section-label">Konfirmasi Pengiriman</p>
        <form action="{{ route('memorial.support.store', ['slug' => $memorialPage->slug]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="field">
                <label for="name">Nama</label>
                <input type="text" id="name" name="name" placeholder="Nama lengkap" required value="{{ old('name') }}">
            </div>
            <div class="field">
                <label for="phone">
                    Nomor HP <span class="field-hint">(wajib diisi)</span>
                </label>
                <input type="text" id="phone" name="phone" placeholder="Contoh: 08123456789" required value="{{ old('phone') }}">
            </div>
            <div class="field">
                <label for="nominal">Nominal</label>
                <input type="text" id="nominal" name="nominal" placeholder="Contoh: 500000" required value="{{ old('nominal') }}">
            </div>
            <div class="field">
                <label for="proof_image">
                    Bukti transfer <span class="field-hint">(opsional)</span>
                </label>
                <input type="file" id="proof_image" name="proof_image" accept="image/jpeg,image/png,image/webp">
            </div>
            <button class="btn-submit" type="submit">Kirim Konfirmasi</button>
        </form>
    </div>

    {{-- Contributions list --}}
    <div class="contributions-section" id="support-list">
        @if ($supportContributions->isNotEmpty())
            <p class="contributions-title">Tanda Kasih Diterima</p>

            @foreach ($supportContributions as $contribution)
                <div class="contrib-card">
                    <p class="contrib-name">{{ $contribution->name }}</p>
                    <p class="contrib-nominal">Rp {{ number_format($contribution->nominal, 0, ',', '.') }}</p>
                    @if ($contribution->proof_image_path)
                        <a class="contrib-proof"
                           href="{{ Storage::url($contribution->proof_image_path) }}"
                           target="_blank" rel="noopener">Lihat bukti →</a>
                    @endif
                </div>
            @endforeach

            @if ($supportContributions->hasPages())
                <div class="pg-wrap">
                    @if ($supportContributions->onFirstPage())
                        <span class="pg-btn pg-disabled">← Sebelumnya</span>
                    @else
                        <a class="pg-btn" href="{{ $supportContributions->previousPageUrl() }}#support-list">← Sebelumnya</a>
                    @endif

                    <span class="pg-info">{{ $supportContributions->currentPage() }} / {{ $supportContributions->lastPage() }}</span>

                    @if ($supportContributions->hasMorePages())
                        <a class="pg-btn" href="{{ $supportContributions->nextPageUrl() }}#support-list">Selanjutnya →</a>
                    @else
                        <span class="pg-btn pg-disabled">Selanjutnya →</span>
                    @endif
                </div>
            @endif
        @endif
    </div>

    <footer class="footer">
        <a href="{{ route('home') }}">terkasih.com</a>
    </footer>

</div>
</body>
</html>
