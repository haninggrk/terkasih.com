<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rest in Peace - {{ $memorialPage->person_name }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;0,700;1,400&family=Great+Vibes&family=Lato:wght@300;400&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f6f5f3;
            --panel: #ffffff;
            --ink: #1a1a1a;
            --muted: #6b6b6b;
            --gold: #7a6a58;
            --line: #dddbd8;
            --rose: #d4d0cb;
        }
        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            margin: 0;
            background: #e8e6e2;
            color: var(--ink);
            font-family: "Cormorant Garamond", Georgia, serif;
            text-align: center;
            overflow-x: hidden;
            display: flex;
            justify-content: center;
        }
        .mobile-viewport {
            width: min(100vw, 430px);
            min-height: 100vh;
            background: #ffffff;
            position: relative;
            overflow: hidden;
        }
        .container {
            width: calc(100% - 24px);
            max-width: 900px;
            margin: 0 auto;
            position: relative;
            z-index: 4;
        }

        .hero {
            padding: 24px 0 22px;
            position: relative;
            overflow: hidden;
        }
        .hero-glow {
            position: absolute;
            inset: auto 50% -110px;
            width: 540px;
            height: 540px;
            transform: translateX(-50%);
            border-radius: 999px;
            background: radial-gradient(circle, rgba(180, 175, 168, 0.12) 0%, rgba(180, 175, 168, 0) 68%);
            filter: blur(3px);
            pointer-events: none;
            z-index: 0;
        }
        .hero-ornaments {
            position: absolute;
            inset: 0;
            pointer-events: none;
            z-index: 2;
        }
        .ornament {
            position: absolute;
            width: 94px;
            height: 94px;
            border-radius: 24px 60px 34px 60px;
            border: 1px solid rgba(160, 155, 148, 0.22);
            background:
                radial-gradient(circle at 30% 28%, rgba(255, 255, 255, 0.90) 0%, rgba(255, 255, 255, 0) 52%),
                linear-gradient(150deg, rgba(220, 218, 214, 0.38) 0%, rgba(240, 238, 234, 0.28) 100%);
            opacity: 0.60;
            animation: sway 6.8s ease-in-out infinite;
            will-change: transform;
        }
        .ornament::before,
        .ornament::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            background: rgba(180, 176, 170, 0.45);
        }
        .ornament::before {
            width: 24px;
            height: 44px;
            left: 20px;
            top: 20px;
            transform: rotate(-22deg);
        }
        .ornament::after {
            width: 24px;
            height: 44px;
            right: 20px;
            top: 19px;
            transform: rotate(22deg);
        }
        .ornament.left-top { left: -18px; top: 140px; animation-duration: 7.8s; }
        .ornament.left-mid { left: 6px; top: 410px; width: 72px; height: 72px; animation-duration: 6.1s; }
        .ornament.right-top { right: -20px; top: 110px; animation-duration: 8.6s; }
        .ornament.right-mid { right: 2px; top: 382px; width: 70px; height: 70px; animation-duration: 6.5s; }

        .hero-lottie-corner {
            position: absolute;
            width: 105px;
            opacity: 0.76;
            animation: swingSoft 9s ease-in-out infinite;
            transform-origin: top center;
        }
        .hero-lottie-corner.left { left: -8px; top: 22px; }
        .hero-lottie-corner.right { right: -8px; top: 12px; animation-delay: .8s; }

        .petal-rail {
            position: absolute;
            top: 0;
            bottom: 0;
            width: 72px;
            pointer-events: none;
            overflow: hidden;
            z-index: 1;
        }
        .petal-rail.left { left: 0; }
        .petal-rail.right { right: 0; }

        .hero h1 {
            margin: 10px 0 0;
            font-size: clamp(2rem, 9vw, 3.6rem);
            line-height: 1.1;
        }
        .hero-stage {
            opacity: 0;
            transform: translateY(20px) scale(.98);
        }
        body.page-ready .hero-stage {
            animation: heroIn .82s cubic-bezier(.2, .9, .2, 1) forwards;
            animation-delay: var(--stage-delay, 0s);
        }
        .label {
            margin: 0;
            letter-spacing: .1em;
            text-transform: uppercase;
            font-size: .8rem;
            color: #8e7f73;
        }
        .subtitle { margin: 8px 0 0; color: var(--muted); font-size: 1.05rem; }
        .date-line { margin: 14px 0 0; color: #645953; font-size: 1.05rem; }

        .portrait-wrap {
            width: min(210px, 52vw);
            margin: 0 auto;
            position: relative;
        }
        .portrait-outline {
            position: absolute;
            inset: -6px;
            border-radius: 999px;
            border: 1.5px solid #b0ada8;
            box-shadow: 0 0 0 4px #f4f3f1;
        }
        .portrait {
            width: 100%;
            aspect-ratio: 1 / 1;
            object-fit: cover;
            border-radius: 999px;
            border: 3px solid #fff;
            box-shadow: 0 12px 36px rgba(40, 38, 36, 0.14);
            position: relative;
            z-index: 1;
        }

        .flower-lottie {
            margin: 8px auto 0;
            width: 138px;
            opacity: .92;
            animation: pulseFloat 5s ease-in-out infinite;
        }
        .flower-svg {
            width: 100%;
            height: 100%;
        }
        .flower-outer {
            transform-origin: 50% 50%;
            animation: flowerSpin 18s linear infinite;
        }
        .flower-inner {
            transform-origin: 50% 50%;
            animation: flowerSpin 14s linear infinite reverse;
        }

        .lang-toggle {
            display: flex;
            justify-content: center;
            gap: 8px;
            margin-bottom: 16px;
        }
        .lang-toggle button {
            border: 1px solid #d0cdc8;
            background: #fff;
            color: #4a4744;
            border-radius: 999px;
            padding: 5px 12px;
            cursor: pointer;
            font-family: 'Lato', sans-serif;
            font-size: 0.78rem;
            letter-spacing: 0.06em;
        }
        .lang-toggle button.active { background: #1c1c1c; color: #fff; border-color: #1c1c1c; }

        .verse {
            margin-top: 14px;
            padding: 16px;
            background: #f8f8f7;
            border: 1px solid #e0ddd8;
            border-radius: 12px;
            line-height: 1.7;
            font-style: italic;
            color: #3a3a38;
        }

        .section-nav {
            position: sticky;
            top: 0;
            z-index: 30;
            display: flex;
            justify-content: center;
            gap: 4px;
            overflow-x: auto;
            padding: 10px 8px;
            background: rgba(255, 255, 255, 0.94);
            backdrop-filter: blur(8px);
            border-top: 1px solid #e0ddd8;
            border-bottom: 1px solid #e0ddd8;
        }
        .section-nav a {
            color: #6b6b6b;
            text-decoration: none;
            white-space: nowrap;
            font-family: 'Lato', sans-serif;
            font-size: .78rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 5px 10px;
            border-radius: 999px;
            border: 1px solid transparent;
            transition: background .2s ease, border-color .2s ease, color .2s ease;
        }
        .section-nav a:hover,
        .section-nav a.active {
            color: #1a1a1a;
            border-color: #c8c5c0;
            background: #f4f3f1;
        }

        .section {
            padding: 14px 0;
            position: relative;
            z-index: 2;
        }
        .panel {
            background: var(--panel);
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 24px 20px;
            box-shadow: 0 8px 24px rgba(30, 28, 26, 0.06);
            position: relative;
            overflow: hidden;
        }
        .panel::before,
        .panel::after {
            content: "";
            position: absolute;
            width: 36px;
            height: 36px;
            border: 1px solid #d8d6d2;
            opacity: .5;
        }
        .panel::before { top: 10px; left: 10px; border-right: 0; border-bottom: 0; border-radius: 8px 0 0 0; }
        .panel::after { bottom: 10px; right: 10px; border-left: 0; border-top: 0; border-radius: 0 0 8px 0; }

        .panel-flower {
            position: absolute;
            width: 62px;
            height: 62px;
            opacity: .2;
            pointer-events: none;
            animation: swingSoft 8s ease-in-out infinite;
        }
        .panel-flower.left { left: -18px; top: 18px; }
        .panel-flower.right { right: -18px; bottom: 16px; animation-delay: .8s; }

        h2 {
            margin: 0 0 14px;
            font-size: clamp(1.3rem, 5.5vw, 1.8rem);
            font-weight: 600;
            letter-spacing: -0.01em;
            color: #1a1a1a;
        }
        p { margin: 0; line-height: 1.7; }
        .muted { color: var(--muted); }

        .grid {
            display: grid;
            gap: 12px;
            grid-template-columns: 1fr;
        }
        .item {
            border: 1px solid #e8e6e2;
            border-radius: 10px;
            padding: 14px 12px;
            background: #fafaf9;
        }

        ul.clean {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        ul.clean li { margin: 5px 0; }

        form { display: grid; gap: 10px; margin-top: 14px; }
        input, textarea, select {
            width: 100%;
            border-radius: 8px;
            border: 1px solid #d0cdc8;
            padding: 11px 12px;
            background: #fafaf9;
            font: inherit;
            color: inherit;
            text-align: center;
        }
        textarea { min-height: 120px; resize: vertical; }
        .checklist {
            display: flex;
            gap: 8px 12px;
            flex-wrap: wrap;
            justify-content: center;
        }
        .checklist label {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: 1px solid #d8d6d2;
            padding: 6px 10px;
            border-radius: 999px;
            background: #fafaf9;
        }
        .checklist input { width: auto; }

        .button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            border-radius: 999px;
            border: none;
            text-decoration: none;
            background: #1c1c1c;
            color: #fff;
            padding: 11px 22px;
            cursor: pointer;
            font: inherit;
            font-family: 'Lato', sans-serif;
            font-size: 0.85rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            margin-top: 10px;
        }
        .button.alt {
            background: #fff;
            color: #1c1c1c;
            border: 1px solid #c8c5c0;
        }

        .cards {
            margin-top: 14px;
            display: grid;
            gap: 10px;
            grid-template-columns: 1fr;
        }
        .card {
            border: 1px solid #e8e6e2;
            border-radius: 10px;
            padding: 16px;
            background: #fff;
            text-align: left;
        }
        .card.highlight {
            border-color: #a0a09a;
            border-left: 3px solid #4a4744;
            background: #f8f8f7;
        }
        .badge {
            display: inline-block;
            margin-bottom: 6px;
            padding: 3px 10px;
            border-radius: 999px;
            background: #ebebea;
            color: #3a3a38;
            font-family: 'Lato', sans-serif;
            font-size: .74rem;
            letter-spacing: 0.06em;
            text-transform: uppercase;
        }
        .photos {
            margin-top: 8px;
            display: flex;
            justify-content: center;
            gap: 8px;
            flex-wrap: wrap;
        }
        .photos img {
            width: 88px;
            height: 88px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #e8dacc;
        }
        .empty {
            border: 1px dashed #d8d6d2;
            border-radius: 10px;
            padding: 14px;
            background: #fafaf9;
            color: #888;
            font-family: 'Lato', sans-serif;
            font-size: 0.9rem;
        }

        .tint-warm { background: #ffffff; border-left: 3px solid #b8b3ac; }
        .tint-blush { background: #fafaf9; border-left: 3px solid #a0a09a; }
        .tint-lavender { background: #f8f8f7; border-left: 3px solid #8a8880; }
        .tint-rose { background: #f5f5f4; border-left: 3px solid #6e6b65; }

        .reveal {
            opacity: 0;
            transition: opacity .7s cubic-bezier(.22, 1, .36, 1), transform .7s cubic-bezier(.22, 1, .36, 1);
            transform: translateY(24px);
        }
        .reveal[data-anim='left'] { transform: translateX(-34px); }
        .reveal[data-anim='right'] { transform: translateX(34px); }
        .reveal[data-anim='zoom'] { transform: translateY(20px) scale(.94); }
        .reveal.in-view {
            opacity: 1;
            transform: translate(0, 0) scale(1);
        }

        .bloom-group {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            user-select: none;
            margin: 2px 0;
        }
        .bloom-icon {
            display: inline-block;
            color: #b0aba4;
            opacity: 0;
            transform: scale(.05) rotate(-45deg);
            will-change: transform, opacity;
        }
        .bloom-icon.mid { color: #7a756e; font-size: 1.3rem; }
        .bloom-icon.bloomed { animation: bloomIn .8s cubic-bezier(.34, 1.56, .64, 1) forwards; }

        .footer {
            margin-top: 16px;
            padding: 24px 0 40px;
            position: relative;
            z-index: 4;
        }

        .petals {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 50%;
            width: min(100vw, 430px);
            transform: translateX(-50%);
            pointer-events: none;
            overflow: hidden;
            z-index: 1;
        }
        .petal {
            position: absolute;
            width: 9px;
            height: 9px;
            border-radius: 45% 55% 52% 48%;
            background: rgba(200, 198, 194, 0.55);
            opacity: .4;
            animation: drift 11s linear infinite;
        }
        .petal:nth-child(2n) {
            background: rgba(220, 218, 214, 0.50);
            width: 7px;
            height: 7px;
            animation-duration: 13s;
        }

        @keyframes drift {
            from { transform: translateY(-14vh) translateX(0) rotate(0deg); }
            to { transform: translateY(110vh) translateX(45px) rotate(260deg); }
        }
        @keyframes bloomIn {
            0% { opacity: 0; transform: scale(.05) rotate(-50deg); }
            65% { opacity: 1; transform: scale(1.12) rotate(6deg); }
            100% { opacity: 1; transform: scale(1) rotate(0); }
        }
        @keyframes heroIn {
            from { opacity: 0; transform: translateY(20px) scale(.98); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        @keyframes pulseFloat {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        @keyframes sway {
            0%, 100% { transform: translateY(0) rotate(-3deg); }
            50% { transform: translateY(-9px) rotate(3deg); }
        }
        @keyframes swingSoft {
            0%, 100% { transform: rotate(-4deg) translateY(0); }
            50% { transform: rotate(4deg) translateY(-5px); }
        }
        @keyframes flowerSpin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @media (min-width: 900px) {
            .cards { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }
        /* ── Arc text ── */
        .rip-arc { margin: 0 auto 4px; display: flex; justify-content: center; }
        .arc-text {
            font-family: 'Great Vibes', cursive;
            font-size: 22px;
            fill: #3a3530;
            letter-spacing: 0.02em;
        }
        /* ── Botanical corner illustrations ── */
        .botanical {
            position: absolute;
            pointer-events: none;
            z-index: 1;
            opacity: 0.68;
        }
        .botanical.left  { left: -14px; bottom: -10px; width: 185px; }
        .botanical.right { right: -14px; bottom: -10px; width: 185px; transform: scaleX(-1); }

        /* ── Lang toggle in corner ── */
        .lang-toggle {
            position: absolute;
            top: 14px;
            right: 14px;
            display: flex;
            gap: 4px;
            z-index: 10;
        }

        @media (min-width: 431px) {
            .mobile-viewport {
                box-shadow: 0 0 0 1px #d8d6d2, 0 26px 72px rgba(30, 28, 26, 0.18);
            }
        }
        @media (prefers-reduced-motion: reduce) {
            html { scroll-behavior: auto; }
            .petal, .ornament, .hero-lottie-corner, .flower-lottie, .panel-flower, .hero-stage, .reveal, .bloom-icon {
                animation: none !important;
                transition: none !important;
                transform: none !important;
                opacity: 1 !important;
            }
        }
    </style>
</head>
<body>
<div class="mobile-viewport">
<div class="petals" aria-hidden="true">
    @for ($i = 0; $i < 18; $i++)
        <span class="petal" style="left: {{ rand(0, 100) }}%; animation-delay: -{{ rand(0, 12) }}s;"></span>
    @endfor
</div>

<main>
    <section class="hero" id="top">
        <div class="hero-glow" aria-hidden="true"></div>

        {{-- Botanical left --}}
        <svg class="botanical left" viewBox="0 0 200 320" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <g stroke="#4a4744" stroke-linecap="round" stroke-linejoin="round" fill="none">
                <!-- Main stem -->
                <path d="M 90 320 C 88 260 75 200 70 140 C 65 80 80 40 85 10" stroke-width="1.4"/>
                <!-- Large lily bloom left -->
                <path d="M 70 110 C 40 95 10 105 5 90 C 0 75 30 60 55 75 C 45 55 50 25 65 20 C 80 15 90 40 80 65 C 100 50 125 55 128 70 C 131 85 110 98 90 90 Z" stroke-width="1.1" fill="rgba(200,198,194,0.12)"/>
                <path d="M 70 110 C 68 95 72 80 75 70" stroke-width="0.8"/>
                <path d="M 70 110 C 55 100 45 88 40 80" stroke-width="0.8"/>
                <path d="M 70 110 C 85 100 95 88 98 78" stroke-width="0.8"/>
                <!-- Smaller bloom -->
                <path d="M 75 185 C 50 175 28 185 25 172 C 22 159 48 148 65 160 C 58 142 64 120 76 116 C 88 112 95 135 87 152 C 102 140 120 144 122 156 C 124 168 107 178 92 172 Z" stroke-width="1.0" fill="rgba(200,198,194,0.10)"/>
                <!-- Leaf left large -->
                <path d="M 82 150 C 55 140 20 155 8 180 C 5 188 12 195 20 190 C 40 178 65 160 82 150 Z" stroke-width="1.0" fill="rgba(180,178,174,0.14)"/>
                <!-- Leaf right -->
                <path d="M 83 200 C 110 185 145 195 155 215 C 158 223 150 230 142 226 C 122 215 100 210 83 200 Z" stroke-width="1.0" fill="rgba(180,178,174,0.12)"/>
                <!-- Leaf middle -->
                <path d="M 79 240 C 52 228 30 238 22 255 C 19 263 27 270 36 265 C 55 254 70 245 79 240 Z" stroke-width="0.9" fill="rgba(180,178,174,0.10)"/>
                <!-- Small bud -->
                <path d="M 86 60 C 80 48 76 38 82 28 C 88 18 96 22 98 32 C 100 42 94 54 86 60 Z" stroke-width="0.9" fill="rgba(200,198,194,0.15)"/>
                <!-- Berries -->
                <circle cx="55" cy="130" r="4.5" stroke-width="0.8" fill="rgba(180,178,174,0.18)"/>
                <circle cx="46" cy="120" r="3.5" stroke-width="0.8" fill="rgba(180,178,174,0.15)"/>
                <circle cx="62" cy="118" r="3" stroke-width="0.8" fill="rgba(180,178,174,0.15)"/>
                <!-- Thin sprigs -->
                <path d="M 78 280 C 55 270 35 278 28 292" stroke-width="0.8"/>
                <path d="M 80 300 C 60 292 42 298 38 310" stroke-width="0.8"/>
            </g>
        </svg>

        {{-- Botanical right (mirrored via CSS) --}}
        <svg class="botanical right" viewBox="0 0 200 320" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <g stroke="#4a4744" stroke-linecap="round" stroke-linejoin="round" fill="none">
                <path d="M 90 320 C 88 260 75 200 70 140 C 65 80 80 40 85 10" stroke-width="1.4"/>
                <path d="M 70 110 C 40 95 10 105 5 90 C 0 75 30 60 55 75 C 45 55 50 25 65 20 C 80 15 90 40 80 65 C 100 50 125 55 128 70 C 131 85 110 98 90 90 Z" stroke-width="1.1" fill="rgba(200,198,194,0.12)"/>
                <path d="M 70 110 C 68 95 72 80 75 70" stroke-width="0.8"/>
                <path d="M 70 110 C 55 100 45 88 40 80" stroke-width="0.8"/>
                <path d="M 70 110 C 85 100 95 88 98 78" stroke-width="0.8"/>
                <path d="M 75 185 C 50 175 28 185 25 172 C 22 159 48 148 65 160 C 58 142 64 120 76 116 C 88 112 95 135 87 152 C 102 140 120 144 122 156 C 124 168 107 178 92 172 Z" stroke-width="1.0" fill="rgba(200,198,194,0.10)"/>
                <path d="M 82 150 C 55 140 20 155 8 180 C 5 188 12 195 20 190 C 40 178 65 160 82 150 Z" stroke-width="1.0" fill="rgba(180,178,174,0.14)"/>
                <path d="M 83 200 C 110 185 145 195 155 215 C 158 223 150 230 142 226 C 122 215 100 210 83 200 Z" stroke-width="1.0" fill="rgba(180,178,174,0.12)"/>
                <path d="M 79 240 C 52 228 30 238 22 255 C 19 263 27 270 36 265 C 55 254 70 245 79 240 Z" stroke-width="0.9" fill="rgba(180,178,174,0.10)"/>
                <path d="M 86 60 C 80 48 76 38 82 28 C 88 18 96 22 98 32 C 100 42 94 54 86 60 Z" stroke-width="0.9" fill="rgba(200,198,194,0.15)"/>
                <circle cx="55" cy="130" r="4.5" stroke-width="0.8" fill="rgba(180,178,174,0.18)"/>
                <circle cx="46" cy="120" r="3.5" stroke-width="0.8" fill="rgba(180,178,174,0.15)"/>
                <circle cx="62" cy="118" r="3" stroke-width="0.8" fill="rgba(180,178,174,0.15)"/>
                <path d="M 78 280 C 55 270 35 278 28 292" stroke-width="0.8"/>
                <path d="M 80 300 C 60 292 42 298 38 310" stroke-width="0.8"/>
            </g>
        </svg>

        <div id="petals-left" class="petal-rail left" aria-hidden="true"></div>
        <div id="petals-right" class="petal-rail right" aria-hidden="true"></div>

        <div class="container" style="position: relative; z-index: 4; padding-top: 10px;">
            <div class="lang-toggle hero-stage" style="--stage-delay: .02s;">
                <button type="button" class="active" data-lang="id">ID</button>
                <button type="button" data-lang="en">EN</button>
            </div>

            {{-- Arched "In Loving Memory of" --}}
            <div class="rip-arc hero-stage" style="--stage-delay: .10s; padding-top: 22px;">
                <svg viewBox="0 0 320 90" width="300" height="90" overflow="visible">
                    <defs>
                        <path id="rip-arc-path" d="M 18 80 A 144 144 0 0 1 302 80"/>
                    </defs>
                    <text class="arc-text">
                        <textPath href="#rip-arc-path" startOffset="50%" text-anchor="middle">In Loving Memory of</textPath>
                    </text>
                </svg>
            </div>

            <div class="portrait-wrap hero-stage" style="--stage-delay: .28s; margin-top: 0;">
                <span class="portrait-outline" aria-hidden="true"></span>
                <img class="portrait" src="{{ asset('images/eric.jpg') }}" alt="{{ $memorialPage->person_name }}">
            </div>

            <h1 class="hero-stage" style="--stage-delay: .38s; margin-top: 18px; font-size: clamp(2.4rem, 10vw, 4rem); font-weight: 700; letter-spacing: -0.01em; line-height: 1.05;">{{ $memorialPage->person_name }}</h1>

            <p class="date-line hero-stage" style="--stage-delay: .45s; font-family: 'Lato', sans-serif; font-weight: 300; letter-spacing: 0.08em; font-size: 0.92rem; color: #555;">{{ optional($memorialPage->birth_date)->format('F d, Y') ?? 'DD-MM-YYYY' }} &ndash; {{ optional($memorialPage->death_date)->format('F d, Y') ?? 'DD-MM-YYYY' }}</p>

            <p class="subtitle hero-stage" style="--stage-delay: .52s; margin-top: 10px; font-style: italic; color: var(--muted);">{{ $memorialPage->subtitle }}</p>

            <div class="verse hero-stage" style="--stage-delay: .6s; margin-top: 18px; border-color: #d8d6d2; background: #f8f8f7;">
                <p data-lang-id="{{ $memorialPage->verse_text_id }}" data-lang-en="{{ $memorialPage->verse_text_en }}">{{ $memorialPage->verse_text_id }}</p>
                <p class="muted" style="margin-top: 6px; font-family: 'Lato', sans-serif; font-size: 0.82rem; letter-spacing: 0.06em; text-transform: uppercase;">{{ $memorialPage->verse_reference }}</p>
            </div>

            <p class="hero-stage" style="margin-top: 14px; --stage-delay: .68s; color: var(--muted); font-size: 0.97rem;" data-lang-id="{{ $memorialPage->description_id }}" data-lang-en="{{ $memorialPage->description_en }}">{{ $memorialPage->description_id }}</p>
        </div>
    </section>

    <nav class="section-nav">
        <a href="#family">Family</a>
        <a href="#funeral">Funeral</a>
        <a href="#support">Support</a>
        <a href="#memories">Memories</a>
        <a href="#rsvp">RSVP</a>
    </nav>

    <div class="container">
        @if (session('status'))
            <p class="panel reveal" style="margin-top: 12px;" data-anim="up">{{ session('status') }}</p>
        @endif

        @if ($errors->any())
            <div class="panel reveal" style="margin-top: 12px;" data-anim="up">
                <p><strong>Please check the form fields:</strong></p>
                <ul class="clean" style="margin-top: 8px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <section class="section" id="family">
        <div class="container panel tint-warm reveal" data-anim="left">
            <span class="panel-flower left" aria-hidden="true"></span>
            <span class="panel-flower right" aria-hidden="true"></span>
            <h2>Family Information</h2>
            <div class="grid">
                <div class="item">
                    <p class="label">Istri</p>
                    <p>{{ $memorialPage->wife_name }}</p>
                </div>
                <div class="item">
                    <p class="label">Anak</p>
                    <ul class="clean">
                        @foreach (array_values($memorialPage->children ?? []) as $child)
                            <li>{{ $child }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="item">
                    <p class="label">Ayah Mertua</p>
                    <p>{{ $memorialPage->father_in_law }}</p>
                </div>
                <div class="item">
                    <p class="label">Ibu Mertua</p>
                    <p>{{ $memorialPage->mother_in_law }}</p>
                </div>
            </div>
        </div>
    </section>

    <div class="bloom-group" aria-hidden="true">
        <span class="bloom-icon">&#10047;</span>
        <span class="bloom-icon mid">&#10047;</span>
        <span class="bloom-icon">&#10047;</span>
    </div>

    <section class="section" id="funeral">
        <div class="container panel tint-blush reveal" data-anim="right">
            <span class="panel-flower left" aria-hidden="true"></span>
            <span class="panel-flower right" aria-hidden="true"></span>
            <h2>Funeral Information</h2>
            <p>{{ $memorialPage->funeral_resting_place }}</p>
            <p style="margin-top: 5px;">{{ $memorialPage->burial_information }}</p>

            <div style="margin-top: 12px;" class="item">
                <p class="label">Jadwal</p>
                <ul class="clean">
                    <li>{{ $memorialPage->schedule_closing_coffin }}</li>
                    <li>{{ $memorialPage->schedule_comfort_service }}</li>
                    <li>{{ $memorialPage->schedule_departure_service }}</li>
                </ul>
            </div>
        </div>
    </section>

    <div class="bloom-group" aria-hidden="true">
        <span class="bloom-icon">&#10047;</span>
        <span class="bloom-icon mid">&#10047;</span>
        <span class="bloom-icon">&#10047;</span>
    </div>

    <section class="section" id="support">
        <div class="container panel tint-lavender reveal" data-anim="zoom">
            <span class="panel-flower left" aria-hidden="true"></span>
            <span class="panel-flower right" aria-hidden="true"></span>
            <h2>Tanda Kasih & Dukungan</h2>
            <p data-lang-id="{{ $memorialPage->support_intro_id }}" data-lang-en="{{ $memorialPage->support_intro_en }}">{{ $memorialPage->support_intro_id }}</p>
            <p style="margin-top: 8px;"><strong>{{ $memorialPage->support_account_placeholder }}</strong></p>
            <a class="button" href="{{ route('memorial.support.page', ['slug' => $memorialPage->slug]) }}">Buka Tab Dukungan</a>
        </div>
    </section>

    <div class="bloom-group" aria-hidden="true">
        <span class="bloom-icon">&#10047;</span>
        <span class="bloom-icon mid">&#10047;</span>
        <span class="bloom-icon">&#10047;</span>
    </div>

    <section class="section" id="memories">
        <div class="container panel tint-rose reveal" data-anim="left">
            <span class="panel-flower left" aria-hidden="true"></span>
            <span class="panel-flower right" aria-hidden="true"></span>
            <h2>Memories & Tributes</h2>
            <form action="{{ route('memorial.tributes.store', ['slug' => $memorialPage->slug]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="name" placeholder="Nama" required>
                <div class="checklist">
                    @foreach (['Teman', 'Saudara', 'Rekan kerja', 'Tetangga', 'Lainnya'] as $relation)
                        <label><input type="checkbox" name="relations[]" value="{{ $relation }}"> {{ $relation }}</label>
                    @endforeach
                </div>
                <textarea name="message" placeholder="Pesan, doa, cerita, atau kenangan..." required></textarea>
                <input type="file" name="photos[]" multiple accept="image/jpeg,image/png,image/webp">
                <p class="muted">Max 3 foto. Gambar akan dikompresi otomatis.</p>
                <button class="button" type="submit">Kirim Kenangan</button>
            </form>

            <div class="cards">
                @forelse ($tributes as $tribute)
                    <article class="card {{ $tribute->is_highlighted ? 'highlight' : '' }}">
                        @if ($tribute->is_highlighted)
                            <span class="badge">Highlight Tribute</span>
                        @endif
                        <p><strong>{{ $tribute->name }}</strong></p>
                        <p class="muted">{{ implode(', ', $tribute->relations ?? []) }}</p>
                        <p style="margin-top: 7px;">{{ $tribute->message }}</p>
                        @if (! empty($tribute->photos))
                            <div class="photos">
                                @foreach ($tribute->photos as $photo)
                                    <img src="{{ asset('storage/' . $photo) }}" alt="Tribute photo">
                                @endforeach
                            </div>
                        @endif
                        <p style="margin-top: 8px;" class="muted">Reaksi: Heart | Candle</p>
                    </article>
                @empty
                    <div class="empty">Belum ada kenangan tertulis. Cerita kecil Anda bisa sangat berarti bagi keluarga.</div>
                @endforelse
            </div>
            <div style="margin-top: 12px;">{{ $tributes->links() }}</div>
        </div>
    </section>

    <div class="bloom-group" aria-hidden="true">
        <span class="bloom-icon">&#10047;</span>
        <span class="bloom-icon mid">&#10047;</span>
        <span class="bloom-icon">&#10047;</span>
    </div>

    <section class="section" id="rsvp">
        <div class="container panel tint-warm reveal" data-anim="right">
            <span class="panel-flower left" aria-hidden="true"></span>
            <span class="panel-flower right" aria-hidden="true"></span>
            <h2>RSVP</h2>
            <form action="{{ route('memorial.rsvps.store', ['slug' => $memorialPage->slug]) }}" method="post">
                @csrf
                <input type="text" name="name" placeholder="Nama" required>
                <select name="attendance" required>
                    <option value="">Pilih Kehadiran</option>
                    <option value="yes">Hadir</option>
                    <option value="maybe">Mungkin Hadir</option>
                    <option value="no">Tidak Hadir</option>
                </select>
                <input type="number" name="guest_count" min="1" max="10" value="1" required>
                <input type="text" name="note" placeholder="Catatan (optional)">
                <button class="button" type="submit">Kirim RSVP</button>
            </form>

            <div class="cards">
                @forelse ($rsvps as $rsvp)
                    <article class="card">
                        <p><strong>{{ $rsvp->name }}</strong></p>
                        <p class="muted">Status: {{ $rsvp->attendance }} | Tamu: {{ $rsvp->guest_count }}</p>
                        @if ($rsvp->note)
                            <p style="margin-top: 6px;">{{ $rsvp->note }}</p>
                        @endif
                    </article>
                @empty
                    <div class="empty">Belum ada RSVP. Kehadiran dan doa Anda sangat berarti bagi keluarga.</div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container panel reveal" data-anim="up">
            <span class="panel-flower left" aria-hidden="true"></span>
            <span class="panel-flower right" aria-hidden="true"></span>
            <h2>Home Terkasih.com</h2>
            <p class="muted">Ruang digital untuk mengenang dan merayakan kehidupan orang-orang tercinta.</p>
            <a class="button alt" href="{{ route('home') }}">Home Terkasih.com</a>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <p><strong>Memerlukan bantuan untuk membuat halaman berita duka?</strong></p>
            <p style="margin-top: 6px;">Email: hello@terkasih.com</p>
            <p>WhatsApp Cia: +62 812-0000-0000</p>
        </div>
    </footer>
</main>

<script>
    requestAnimationFrame(() => {
        document.body.classList.add('page-ready');
    });

    const langButtons = document.querySelectorAll('[data-lang]');
    const translatables = document.querySelectorAll('[data-lang-id][data-lang-en]');

    const applyLanguage = (lang) => {
        translatables.forEach((element) => {
            element.textContent = lang === 'en' ? element.dataset.langEn : element.dataset.langId;
        });

        langButtons.forEach((button) => {
            button.classList.toggle('active', button.dataset.lang === lang);
        });
    };

    langButtons.forEach((button) => {
        button.addEventListener('click', () => applyLanguage(button.dataset.lang));
    });

    const revealEls = document.querySelectorAll('.reveal');
    const bloomGroups = document.querySelectorAll('.bloom-group');

    if ('IntersectionObserver' in window) {
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                entry.target.classList.add('in-view');
                revealObserver.unobserve(entry.target);
            });
        }, { threshold: 0.09, rootMargin: '0px 0px -40px 0px' });

        revealEls.forEach((el) => revealObserver.observe(el));

        const bloomObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                entry.target.querySelectorAll('.bloom-icon').forEach((icon, i) => {
                    setTimeout(() => icon.classList.add('bloomed'), i * 120);
                });

                bloomObserver.unobserve(entry.target);
            });
        }, { threshold: 0.6 });

        bloomGroups.forEach((group) => bloomObserver.observe(group));

        const navLinks = document.querySelectorAll('.section-nav a');
        const targets = Array.from(navLinks)
            .map((link) => document.querySelector(link.getAttribute('href')))
            .filter(Boolean);

        const navObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                navLinks.forEach((link) => {
                    link.classList.toggle('active', link.getAttribute('href') === `#${entry.target.id}`);
                });
            });
        }, { threshold: 0.55 });

        targets.forEach((section) => navObserver.observe(section));
    } else {
        revealEls.forEach((el) => el.classList.add('in-view'));
        document.querySelectorAll('.bloom-icon').forEach((icon) => icon.classList.add('bloomed'));
    }

    const floatingDecor = document.querySelectorAll('[data-float]');
    let decorTicking = false;

    const moveFloatingDecor = () => {
        const offset = window.scrollY;
        floatingDecor.forEach((element) => {
            const depth = Number(element.dataset.float || 0);
            element.style.transform = `translateY(${offset * (depth / 100)}px)`;
        });
        decorTicking = false;
    };

    const onFloatingScroll = () => {
        if (decorTicking) {
            return;
        }

        decorTicking = true;
        window.requestAnimationFrame(moveFloatingDecor);
    };

    window.addEventListener('scroll', onFloatingScroll, { passive: true });
    moveFloatingDecor();

    const railColors = [
        'rgba(180,178,174,0.65)',
        'rgba(200,198,195,0.55)',
        'rgba(160,158,154,0.70)',
        'rgba(220,218,215,0.50)',
        'rgba(190,188,184,0.60)',
    ];

    const styleNode = document.createElement('style');
    styleNode.textContent = `
        @keyframes railFall {
            0% { opacity: 0; transform: translateY(-60px) translateX(0) rotate(0deg) scale(.7); }
            6% { opacity: var(--op, .8); }
            85% { opacity: calc(var(--op, .8) * .75); }
            100% { transform: translateY(110vh) translateX(var(--dx, 30px)) rotate(var(--rot, 400deg)) scale(1.1); opacity: 0; }
        }
    `;
    document.head.appendChild(styleNode);

    const spawnPetal = (container) => {
        const petal = document.createElement('div');
        const size = Math.floor(Math.random() * 14 + 10);
        const dur = (Math.random() * 7 + 7).toFixed(2);
        const delay = (Math.random() * 14).toFixed(2);
        const left = (Math.random() * (container.offsetWidth || 70)).toFixed(1);
        const dx = ((Math.random() - 0.5) * 70).toFixed(1);
        const rot = ((Math.random() * 520 + 120) * (Math.random() < 0.5 ? 1 : -1)).toFixed(0);
        const op = (Math.random() * 0.25 + 0.65).toFixed(2);
        const color = railColors[Math.floor(Math.random() * railColors.length)];

        petal.style.cssText = `
            position:absolute;
            width:${size}px;
            height:${Math.floor(size * 0.64)}px;
            background:${color};
            top:0;
            left:${left}px;
            border-radius:100% 0;
            opacity:0;
            pointer-events:none;
            animation: railFall ${dur}s ${delay}s ease-in-out infinite;
            --dx:${dx}px;
            --rot:${rot}deg;
            --op:${op};
        `;

        container.appendChild(petal);
    };

    const leftRail = document.getElementById('petals-left');
    const rightRail = document.getElementById('petals-right');

    for (let i = 0; i < 12; i += 1) {
        if (leftRail) {
            spawnPetal(leftRail);
        }

        if (rightRail) {
            spawnPetal(rightRail);
        }
    }
</script>
</div>
</body>
</html>
