<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tanda Kasih — {{ $memorialPage->person_name }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600&family=Inria+Serif:ital,wght@0,300;1,300;1,400&family=Noto+Serif+Display:ital,wdth,wght@0,62.5,300;0,62.5,400&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #eae6e0;
            color: #1a1614;
            display: flex;
            justify-content: center;
            min-height: 100vh;
        }

        .page {
            width: min(100vw, 430px);
            min-height: 100vh;
            background: #faf9f7;
            overflow-x: hidden;
        }

        @media (min-width: 431px) {
            .page { box-shadow: 0 0 0 1px #d4d0cb, 0 32px 80px rgba(28,22,18,0.24); }
        }

        /* ── Header ── */
        .page-header {
            text-align: center;
            padding: 40px 28px 20px;
        }
        .ornament { width: 64px; opacity: 0.55; margin: 0 auto 16px; display: block; }
        .page-title {
            font-family: 'Noto Serif Display', serif;
            font-stretch: extra-condensed;
            font-weight: 400;
            font-size: clamp(2rem, 9vw, 3rem);
            color: #1a1614;
            line-height: 1.05;
        }
        .page-sub {
            font-size: 0.78rem;
            color: #9e9890;
            letter-spacing: 0.09em;
            text-transform: uppercase;
            margin-top: 6px;
        }

        /* ── Divider ── */
        .divider {
            display: flex; align-items: center; justify-content: center;
            gap: 10px; padding: 20px 48px;
        }
        .div-line { flex: 1; height: 1px; background: #dedad4; }
        .div-ornament { font-size: 0.5rem; letter-spacing: 0.4em; color: #c4bfb8; }

        /* ── Intro card ── */
        .intro-card {
            margin: 0 24px 20px;
            background: #fff;
            border: 1px solid #dedad4;
            border-radius: 12px;
            padding: 20px 22px;
            text-align: center;
        }
        .intro-text {
            font-family: 'Inria Serif', Georgia, serif;
            font-style: italic;
            font-weight: 300;
            font-size: 0.95rem;
            line-height: 1.75;
            color: #3e3832;
        }
        .total-wrap {
            margin-top: 16px;
            padding-top: 14px;
            border-top: 1px solid #f0ede8;
        }
        .total-label {
            font-size: 0.68rem;
            font-weight: 500;
            letter-spacing: 0.13em;
            text-transform: uppercase;
            color: #9e9890;
            margin-bottom: 4px;
        }
        .total-value {
            font-family: 'Inria Serif', Georgia, serif;
            font-weight: 400;
            font-size: clamp(1.4rem, 6vw, 2rem);
            color: #1a1614;
        }
        .total-count {
            font-size: 0.76rem;
            color: #9e9890;
            margin-top: 2px;
        }

        /* ── Table / list ── */
        .section-wrap { margin: 0 24px 40px; }
        .section-label {
            font-size: 0.68rem;
            font-weight: 500;
            letter-spacing: 0.13em;
            text-transform: uppercase;
            color: #9e9890;
            text-align: center;
            margin-bottom: 12px;
        }

        .contrib-item {
            background: #fff;
            border: 1px solid #dedad4;
            border-radius: 10px;
            padding: 14px 16px;
            display: grid;
            grid-template-columns: 1fr auto;
            align-items: start;
            gap: 6px;
        }
        .contrib-item + .contrib-item { margin-top: 8px; }

        .ci-left { min-width: 0; }
        .ci-name {
            font-weight: 500;
            font-size: 0.92rem;
            color: #1a1614;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .ci-phone {
            font-size: 0.75rem;
            color: #9e9890;
            margin-top: 1px;
        }
        .ci-date {
            font-size: 0.72rem;
            color: #b8b3ac;
            margin-top: 3px;
        }
        .ci-right { text-align: right; }
        .ci-nominal {
            font-family: 'Inria Serif', Georgia, serif;
            font-style: italic;
            font-size: 1.05rem;
            color: #3e3832;
            white-space: nowrap;
        }
        .ci-slip {
            display: inline-block;
            margin-top: 6px;
            font-size: 0.72rem;
            color: #6e6862;
            text-decoration: none;
            padding: 3px 10px;
            border: 1px solid #d4d0cb;
            border-radius: 999px;
            transition: background 0.15s, color 0.15s;
        }
        .ci-slip:hover { background: #1a1614; color: #faf9f7; border-color: #1a1614; }

        .empty-state {
            border: 1px dashed #dedad4;
            border-radius: 10px;
            padding: 28px;
            text-align: center;
            color: #9e9890;
            font-size: 0.85rem;
            line-height: 1.65;
        }

        /* ── Photo lightbox ── */
        #photo-modal {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 9999;
            background: rgba(18, 14, 12, 0.92);
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
            box-shadow: 0 8px 48px rgba(0,0,0,0.6);
            cursor: default;
        }

        /* ── Footer ── */
        .footer {
            padding: 24px 28px 44px;
            text-align: center;
            border-top: 1px solid #e8e4df;
        }
        .footer a {
            font-size: 0.76rem;
            color: #9e9890;
            letter-spacing: 0.08em;
            text-decoration: none;
        }
        .footer a:hover { color: #4a4440; }
    </style>
</head>
<body>
<div class="page">

    <div class="page-header">
        <img class="ornament" src="{{ asset('images/flowers/Flower 4.png') }}" alt="">
        <h1 class="page-title">Tanda Kasih</h1>
        <p class="page-sub">{{ $memorialPage->person_name }}</p>
    </div>

    <div class="divider">
        <span class="div-line"></span>
        <span class="div-ornament">✦ ✦ ✦</span>
        <span class="div-line"></span>
    </div>

    {{-- Intro & total --}}
    <div class="intro-card">
        <p class="intro-text">
            Setiap tanda kasih yang diterima adalah wujud cinta dan kepedulian yang tulus.<br>
            Semoga setiap kebaikan ini menjadi berkat yang mengalir kembali<br>
            berlipat ganda kepada para pemberi.
        </p>
        <div class="total-wrap">
            <p class="total-label">Total Tanda Kasih</p>
            <p class="total-value">Rp {{ number_format($total, 0, ',', '.') }}</p>
            <p class="total-count">dari {{ $contributions->count() }} orang</p>
        </div>
    </div>

    <div class="divider">
        <span class="div-line"></span>
        <span class="div-ornament">✦ ✦ ✦</span>
        <span class="div-line"></span>
    </div>

    {{-- List --}}
    <div class="section-wrap">
        <p class="section-label">Daftar Tanda Kasih</p>

        @forelse ($contributions as $item)
            <div class="contrib-item">
                <div class="ci-left">
                    <p class="ci-name">{{ $item->name }}</p>
                    @if ($item->phone)
                        <p class="ci-phone">{{ $item->phone }}</p>
                    @endif
                    <p class="ci-date">{{ $item->created_at->timezone('Asia/Jakarta')->format('d M Y, H:i') }} WIB</p>
                </div>
                <div class="ci-right">
                    <p class="ci-nominal">Rp {{ number_format($item->nominal, 0, ',', '.') }}</p>
                    @if ($item->proof_image_path)
                        <a class="ci-slip" href="#"
                            data-src="{{ asset('storage/' . $item->proof_image_path) }}"
                            onclick="openPhoto(this); return false;">
                            Lihat Slip
                        </a>
                    @endif
                </div>
            </div>
        @empty
            <div class="empty-state">
                Belum ada tanda kasih yang masuk.
            </div>
        @endforelse
    </div>

    <footer class="footer">
        <a href="{{ route('memorial.show', ['slug' => $memorialPage->slug]) }}">← Kembali ke halaman memorial</a>
    </footer>

</div>

{{-- Lightbox --}}
<div id="photo-modal" role="dialog" aria-modal="true" aria-label="Lihat slip">
    <img id="pm-img" src="" alt="Slip tanda kasih">
</div>

<script>
function openPhoto(el) {
    var modal = document.getElementById('photo-modal');
    var img = document.getElementById('pm-img');
    img.src = el.dataset.src;
    modal.classList.add('open');
}
document.getElementById('photo-modal').addEventListener('click', function () {
    this.classList.remove('open');
    document.getElementById('pm-img').src = '';
});
document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        document.getElementById('photo-modal').classList.remove('open');
        document.getElementById('pm-img').src = '';
    }
});
</script>
</body>
</html>
