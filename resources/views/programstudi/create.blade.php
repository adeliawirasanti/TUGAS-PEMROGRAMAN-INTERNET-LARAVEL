<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Tambah Program Studi</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('style-template.css') }}">
</head>
<body>
<a href="/programstudi" class="kembali">← Kembali</a>

<div class="container">
  <h2>Tambah Program Studi</h2>

  <form method="POST" action="{{ route('programstudi.store') }}">
    @csrf
    <input type="text" name="nama" placeholder="Nama Program Studi" required>

    <select name="fakultas_id" required>
      <option value="">-- Pilih Fakultas --</option>
      @foreach($fakultas as $f)
        <option value="{{ $f->id }}">{{ $f->nama }}</option>
      @endforeach
    </select>

    <button type="submit">Simpan</button>
  </form>
</div>
</body>
</html>
