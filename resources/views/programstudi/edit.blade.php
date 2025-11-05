<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Edit Program Studi</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('style-template.css') }}">
</head>
<body>
<a href="/programstudi" class="kembali">← Kembali</a>

<div class="container">
  <h2>Edit Program Studi</h2>

  <form method="POST" action="{{ route('programstudi.update', $programstudi->id) }}">
    @csrf
    @method('PUT')
    <input type="text" name="nama" value="{{ $programstudi->nama }}" required>

    <select name="fakultas_id" required>
      @foreach($fakultas as $f)
        <option value="{{ $f->id }}" {{ $f->id == $programstudi->fakultas_id ? 'selected' : '' }}>
          {{ $f->nama }}
        </option>
      @endforeach
    </select>

    <button type="submit">Perbarui</button>
  </form>
</div>
</body>
</html>
