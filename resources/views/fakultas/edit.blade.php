<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Edit Fakultas</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('style-template.css') }}">
</head>
<body>
<a href="{{ route('fakultas.index') }}" class="kembali">← Kembali</a>
<div class="container">
  <h2>Edit Fakultas</h2>

  @if ($errors->any())
    <div class="error">
      <ul>
        @foreach ($errors->all() as $error)
          <li style="color:red;">{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('fakultas.update', $fakultas->id) }}">
    @csrf
    @method('PUT')
    <input type="text" name="nama" value="{{ $fakultas->nama }}" placeholder="Nama Fakultas" required>
    <button type="submit">Perbarui</button>
  </form>
</div>
</body>
</html>
