<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Edit Mahasiswa</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('style-template.css') }}">
</head>
<body>
<a href="{{ route('mahasiswa.index') }}" class="kembali">← Kembali</a>
<div class="container">
  <h2>Edit Mahasiswa</h2>

  @if ($errors->any())
    <div style="color:red;">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('mahasiswa.update', $m->id) }}">
    @csrf
    @method('PUT')
    <input type="text" name="nim" value="{{ $m->nim }}" required>
    <input type="text" name="nama" value="{{ $m->nama }}" required>
    <input type="text" name="prodi" value="{{ $m->prodi }}" required>
    <button type="submit">Perbarui</button>
  </form>
</div>
</body>
</html>
