<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Tambah Mahasiswa</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('style-template.css') }}">
</head>
<body>
<a href="{{ route('mahasiswa.index') }}" class="kembali">← Kembali</a>
<div class="container">
  <h2>Tambah Mahasiswa</h2>

  @if ($errors->any())
    <div style="color:red;">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('mahasiswa.store') }}">
    @csrf
    <input type="text" name="nim" placeholder="NIM" required>
    <input type="text" name="nama" placeholder="Nama Lengkap" required>
    <input type="text" name="prodi" placeholder="Program Studi" required>
    <button type="submit">Simpan</button>
  </form>
</div>
</body>
</html>
