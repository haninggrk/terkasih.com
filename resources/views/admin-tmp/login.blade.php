<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin · Terkasih</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: system-ui, sans-serif; background: #f4f2ef; display: flex; align-items: center; justify-content: center; min-height: 100vh; }
        .card { background: #fff; border-radius: 12px; padding: 40px 36px; width: 100%; max-width: 360px; box-shadow: 0 2px 16px rgba(0,0,0,.08); }
        h1 { font-size: 1.1rem; font-weight: 600; color: #1a1614; margin-bottom: 6px; }
        p.sub { font-size: 0.8rem; color: #9e9890; margin-bottom: 28px; }
        label { display: block; font-size: 0.78rem; font-weight: 500; color: #4a4440; margin-bottom: 5px; }
        input { width: 100%; border: 1px solid #d4d0cb; border-radius: 8px; padding: 9px 12px; font-size: 0.9rem; margin-bottom: 14px; outline: none; }
        input:focus { border-color: #a09890; }
        .btn { width: 100%; background: #1a1614; color: #fff; border: none; border-radius: 8px; padding: 11px; font-size: 0.9rem; cursor: pointer; }
        .btn:hover { background: #333; }
        .err { background: #fdf0ee; border: 1px solid #f5c6bb; border-radius: 8px; padding: 10px 13px; font-size: 0.82rem; color: #b84c30; margin-bottom: 16px; }
    </style>
</head>
<body>
<div class="card">
    <h1>Admin Panel</h1>
    <p class="sub">terkasih.com · Eric Pramono</p>

    @if ($errors->has('auth'))
        <div class="err">{{ $errors->first('auth') }}</div>
    @endif

    <form method="POST" action="{{ route('admin-tmp.login.post') }}">
        @csrf
        <label>Username</label>
        <input type="text" name="username" value="{{ old('username') }}" required autofocus>
        <label>Password</label>
        <input type="password" name="password" required>
        <button class="btn" type="submit">Masuk</button>
    </form>
</div>
</body>
</html>
