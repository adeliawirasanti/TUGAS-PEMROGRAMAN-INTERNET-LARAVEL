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

  <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa->id) }}">
    @csrf
    @method('PUT')

    <label for="nim"></label>
    <input type="text" name="nim" id="nim" value="{{ $mahasiswa->nim }}" required>

    <label for="nama"></label>
    <input type="text" name="nama" id="nama" value="{{ $mahasiswa->nama }}" required>

    <label for="fakultas_id"></label>
    <select name="fakultas_id" id="fakultas_id" required>
      <option value="">-- Pilih Fakultas --</option>
      @foreach ($fakultas as $f)
        <option value="{{ $f->id }}" {{ $f->id == $mahasiswa->fakultas_id ? 'selected' : '' }}>
          {{ $f->nama }}
        </option>
      @endforeach
    </select>

    <label for="program_studi_id"></label>
    <select name="program_studi_id" id="program_studi_id" required>
      <option value="">-- Pilih Program Studi --</option>
      @foreach ($programstudi as $p)
        <option value="{{ $p->id }}" {{ $p->id == $mahasiswa->program_studi_id ? 'selected' : '' }}>
          {{ $p->nama }}
        </option>
      @endforeach
    </select>

    <button type="submit">Perbarui</button>
  </form>
</div>
</body>
</html>

