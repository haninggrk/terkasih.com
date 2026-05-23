<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard · Terkasih</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: system-ui, sans-serif; background: #f4f2ef; color: #1a1614; font-size: 0.9rem; }

        /* Layout */
        .topbar { background: #1a1614; color: #fff; padding: 14px 28px; display: flex; align-items: center; justify-content: space-between; }
        .topbar h1 { font-size: 0.95rem; font-weight: 600; }
        .topbar span { font-size: 0.78rem; color: #9e9890; margin-left: 10px; }
        .main { max-width: 900px; margin: 28px auto; padding: 0 16px 60px; }

        /* Section card */
        .panel { background: #fff; border-radius: 12px; padding: 24px; margin-bottom: 20px; box-shadow: 0 1px 6px rgba(0,0,0,.07); }
        .panel h2 { font-size: 0.88rem; font-weight: 600; text-transform: uppercase; letter-spacing: .08em; color: #9e9890; margin-bottom: 16px; }

        /* Buttons */
        .btn { display: inline-flex; align-items: center; gap: 6px; border: none; border-radius: 8px; padding: 8px 16px; font-size: 0.82rem; cursor: pointer; font-family: inherit; }
        .btn-dark { background: #1a1614; color: #fff; }
        .btn-dark:hover { background: #333; }
        .btn-red { background: #fdf0ee; color: #b84c30; border: 1px solid #f5c6bb; }
        .btn-red:hover { background: #fde4e0; }
        .btn-green { background: #edf7f0; color: #2d7a4f; border: 1px solid #b8dfc8; }
        .btn-green:hover { background: #daf0e4; }
        .btn-sm { padding: 5px 11px; font-size: 0.78rem; }
        .btn-logout { background: transparent; color: #c4bfb8; border: 1px solid #3a3432; border-radius: 7px; padding: 6px 13px; font-size: 0.78rem; cursor: pointer; }
        .btn-logout:hover { color: #fff; border-color: #666; }

        /* Toggle row */
        .toggle-row { display: flex; align-items: center; justify-content: space-between; gap: 12px; }
        .toggle-label { font-size: 0.9rem; }
        .toggle-label small { display: block; color: #9e9890; font-size: 0.76rem; margin-top: 2px; }
        .badge { display: inline-block; border-radius: 6px; padding: 2px 9px; font-size: 0.72rem; font-weight: 600; }
        .badge-on { background: #edf7f0; color: #2d7a4f; }
        .badge-off { background: #fdf0ee; color: #b84c30; }

        /* Table */
        table { width: 100%; border-collapse: collapse; font-size: 0.84rem; }
        th { text-align: left; font-weight: 600; font-size: 0.75rem; text-transform: uppercase; letter-spacing: .06em; color: #9e9890; padding: 0 8px 10px; border-bottom: 1px solid #eceae6; }
        td { padding: 10px 8px; border-bottom: 1px solid #f2f0ec; vertical-align: middle; }
        tr:last-child td { border-bottom: none; }
        tr.hidden-row { opacity: 0.45; }
        .table-wrap { overflow-x: auto; }
        .order-input { width: 64px; border: 1px solid #d4d0cb; border-radius: 6px; padding: 4px 7px; text-align: center; font-size: 0.85rem; }
        .thumb-row { display: flex; flex-wrap: wrap; gap: 4px; }
        .thumb { width: 40px; height: 40px; border-radius: 6px; object-fit: cover; display: block; cursor: zoom-in; }
        .thumb-placeholder { width: 40px; height: 40px; border-radius: 6px; background: #f2f0ec; display: flex; align-items: center; justify-content: center; font-size: 0.7rem; color: #c4bfb8; }
        .msg-cell { max-width: 240px; color: #4a4440; font-size: 0.82rem; }
        /* Pagination */
        .pg-admin { display: flex; gap: 6px; align-items: center; margin-top: 16px; flex-wrap: wrap; font-size: 0.82rem; }
        .pg-admin a, .pg-admin span { padding: 5px 10px; border-radius: 7px; border: 1px solid #d4d0cb; color: #1a1614; text-decoration: none; }
        .pg-admin span.active { background: #1a1614; color: #fff; border-color: #1a1614; }
        .pg-admin span.disabled { color: #c4bfb8; pointer-events: none; }
        .pg-admin a:hover { background: #f4f2ef; }

        /* Contribution cards */
        .contrib-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(240px, 1fr)); gap: 12px; }
        .contrib-card { border: 1px solid #eceae6; border-radius: 10px; padding: 14px; }
        .contrib-card strong { display: block; font-size: 0.9rem; margin-bottom: 3px; }
        .contrib-card .nominal { font-size: 1rem; font-weight: 700; color: #2d7a4f; margin-bottom: 8px; }
        .contrib-card .date { font-size: 0.72rem; color: #9e9890; }
        .contrib-card img { display: block; width: 100%; border-radius: 7px; margin-top: 10px; cursor: zoom-in; }
        .no-proof { font-size: 0.75rem; color: #c4bfb8; margin-top: 6px; }

        /* Flash */
        .flash { background: #edf7f0; border: 1px solid #b8dfc8; border-radius: 8px; padding: 10px 16px; margin-bottom: 16px; font-size: 0.84rem; color: #2d7a4f; }

        /* Sort form save btn */
        .sort-actions { margin-top: 14px; display: flex; justify-content: flex-end; }

        /* Proof modal */
        #proof-modal { display:none; position:fixed; inset:0; background:rgba(0,0,0,.75); z-index:9999; align-items:center; justify-content:center; }
        #proof-modal.open { display:flex; }
        #proof-modal img { max-width:90vw; max-height:90vh; border-radius:10px; }
    </style>
</head>
<body>

<div class="topbar">
    <div>
        <h1>Admin Panel <span>Eric Pramono · terkasih.com</span></h1>
    </div>
    <form method="POST" action="{{ route('admin-tmp.logout') }}">
        @csrf
        <button class="btn-logout" type="submit">Keluar</button>
    </form>
</div>

<div class="main">

    @if (session('success'))
        <div class="flash">{{ session('success') }}</div>
    @endif

    {{-- ── Section: Pengaturan ── --}}
    <div class="panel">
        <h2>Pengaturan</h2>

        {{-- Toggle Support --}}
        <div class="toggle-row" style="padding: 12px 0; border-bottom: 1px solid #f2f0ec;">
            <div class="toggle-label">
                Seksi "Kirim Tanda Kasih"
                <small>Tampilkan atau sembunyikan tombol donasi di halaman memorial</small>
            </div>
            <div style="display:flex; align-items:center; gap:12px;">
                <span class="badge {{ $page->support_hidden ? 'badge-off' : 'badge-on' }}">
                    {{ $page->support_hidden ? 'Tersembunyi' : 'Tampil' }}
                </span>
                <form method="POST" action="{{ route('admin-tmp.toggle-support') }}">
                    @csrf
                    <button class="btn btn-sm {{ $page->support_hidden ? 'btn-green' : 'btn-red' }}" type="submit">
                        {{ $page->support_hidden ? 'Tampilkan' : 'Sembunyikan' }}
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- ── Section: Kenangan Terkasih ── --}}
    <div class="panel">
        <h2>Kenangan Terkasih ({{ $tributes->total() }} pesan)</h2>

        <form method="POST" action="{{ route('admin-tmp.sort-orders') }}">
            @csrf
            <div class="table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>Urutan</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Relasi</th>
                        <th>Pesan</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tributes as $tribute)
                        @php $firstPhoto = !empty($tribute->photos) ? $tribute->photos[0] : null; @endphp
                        <tr class="{{ $tribute->is_hidden ? 'hidden-row' : '' }}">
                            <td>
                                <input class="order-input" type="number" name="orders[{{ $tribute->id }}]"
                                    value="{{ in_array($tribute->sort_order, [0, 9999]) ? '' : $tribute->sort_order }}"
                                    placeholder="9999" min="1">
                            </td>
                            <td>
                                @if (!empty($tribute->photos))
                                    <div class="thumb-row">
                                        @foreach ($tribute->photos as $photo)
                                            <img class="thumb" src="{{ asset('storage/' . $photo) }}" alt="" onclick="openProof(this.src)">
                                        @endforeach
                                    </div>
                                @else
                                    <div class="thumb-placeholder">—</div>
                                @endif
                            </td>
                            <td style="font-weight:500; white-space:nowrap;">{{ $tribute->name }}</td>
                            <td style="color:#9e9890; white-space:nowrap;">{{ implode(', ', $tribute->relations ?? []) }}</td>
                            <td>
                                <span class="msg-cell" title="{{ $tribute->message }}">{{ mb_strimwidth($tribute->message, 0, 50, '…') }}</span>
                            </td>
                            <td>
                                <span class="badge {{ $tribute->is_hidden ? 'badge-off' : 'badge-on' }}">
                                    {{ $tribute->is_hidden ? 'Disembunyikan' : 'Tampil' }}
                                </span>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin-tmp.tribute.toggle', $tribute->id) }}">
                                    @csrf
                                    <button class="btn btn-sm {{ $tribute->is_hidden ? 'btn-green' : 'btn-red' }}" type="submit" formnovalidate>
                                        {{ $tribute->is_hidden ? 'Tampilkan' : 'Sembunyikan' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7" style="color:#9e9890; padding:20px 8px;">Belum ada kenangan.</td></tr>
                    @endforelse
                </tbody>
            </table>

            @if ($tributes->count())
                <div class="sort-actions">
                    <button class="btn btn-dark" type="submit">Simpan Urutan</button>
                </div>
            @endif
            </div>{{-- .table-wrap --}}
        </form>

        {{-- Pagination --}}
        @if ($tributes->hasPages())
            <div class="pg-admin">
                {{-- Previous --}}
                @if ($tributes->onFirstPage())
                    <span class="disabled">&lsaquo; Prev</span>
                @else
                    <a href="{{ $tributes->previousPageUrl() }}">&lsaquo; Prev</a>
                @endif

                {{-- Page numbers --}}
                @foreach ($tributes->getUrlRange(1, $tributes->lastPage()) as $pg => $url)
                    @if ($pg == $tributes->currentPage())
                        <span class="active">{{ $pg }}</span>
                    @else
                        <a href="{{ $url }}">{{ $pg }}</a>
                    @endif
                @endforeach

                {{-- Next --}}
                @if ($tributes->hasMorePages())
                    <a href="{{ $tributes->nextPageUrl() }}">Next &rsaquo;</a>
                @else
                    <span class="disabled">Next &rsaquo;</span>
                @endif
            </div>
        @endif
    </div>

    {{-- ── Section: Bukti Sumbangan ── --}}
    <div class="panel">
        <h2>Bukti Sumbangan ({{ $contributions->count() }})</h2>

        @if ($contributions->isEmpty())
            <p style="color:#9e9890;">Belum ada sumbangan masuk.</p>
        @else
            <div class="contrib-grid">
                @foreach ($contributions as $c)
                    <div class="contrib-card">
                        <strong>{{ $c->name }}</strong>
                        <div class="nominal">Rp {{ number_format($c->nominal, 0, ',', '.') }}</div>
                        <div class="date">{{ $c->created_at->format('d M Y, H:i') }}</div>
                        @if ($c->proof_image_path)
                            <img src="{{ asset('storage/' . $c->proof_image_path) }}"
                                alt="Bukti {{ $c->name }}"
                                onclick="openProof(this.src)">
                        @else
                            <p class="no-proof">Tidak ada foto bukti</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</div>

{{-- Proof lightbox --}}
<div id="proof-modal" onclick="closeProof()">
    <img id="proof-img" src="" alt="Bukti sumbangan">
</div>

<script>
function openProof(src) {
    document.getElementById('proof-img').src = src;
    document.getElementById('proof-modal').classList.add('open');
}
function closeProof() {
    document.getElementById('proof-modal').classList.remove('open');
    document.getElementById('proof-img').src = '';
}
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') { closeProof(); }
});
</script>

</body>
</html>
