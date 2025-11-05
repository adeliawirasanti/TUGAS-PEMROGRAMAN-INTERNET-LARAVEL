<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Daftar Mahasiswa</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('style-template.css') }}">
</head>
<body>
<a href="/" class="kembali">← Kembali</a>
<div class="container" style="max-width: 900px;">
  <h2>Daftar Mahasiswa</h2>

  @if (session('success'))
    <p style="color:green;">{{ session('success') }}</p>
  @endif

  <div style="text-align:right; margin-bottom:20px;">
    <a href="{{ route('mahasiswa.create') }}" class="btn" style="background:#3A345B;">Tambah Mahasiswa</a>
  </div>

  <!-- 🔍 FILTER FORM -->
  <form method="GET" action="{{ route('mahasiswa.index') }}" style="margin-bottom: 20px;">
    <div style="display: flex; gap: 10px; align-items: center;">
      <select name="fakultas_id">
        <option value="">-- Semua Fakultas --</option>
        @foreach($fakultas as $f)
          <option value="{{ $f->id }}" {{ $f->id == request('fakultas_id') ? 'selected' : '' }}>
            {{ $f->nama }}
          </option>
        @endforeach
      </select>

      <select name="program_studi_id">
        <option value="">-- Semua Prodi --</option>
        @foreach($programstudi as $p)
          <option value="{{ $p->id }}" {{ $p->id == request('program_studi_id') ? 'selected' : '' }}>
            {{ $p->nama }}
          </option>
        @endforeach
      </select>

      <input type="text" name="nim" placeholder="Cari NIM..." value="{{ request('nim') }}" />

      <button type="submit" class="btn" style="background:#3A345B;">Filter</button>
      <a href="{{ route('mahasiswa.index') }}" class="btn" style="background:#808080;">Reset</a>
    </div>
  </form>
  <!-- 🔍 END FILTER FORM -->

  <table>
    <tr>
      <th>ID</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Fakultas</th>
      <th>Prodi</th>
      <th>Aksi</th>
    </tr>
    @foreach($mahasiswa as $m)
      <tr>
        <td>{{ $m->id }}</td>
        <td>{{ $m->nim }}</td>
        <td>{{ $m->nama }}</td>
        <td>{{ $m->fakultas->nama ?? '-' }}</td>
        <td>{{ $m->programStudi->nama ?? '-' }}</td>
        <td>
          <a href="{{ route('mahasiswa.edit', $m->id) }}" class="btn">Edit</a>
          <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" style="background:#b22222; color:white; border:none; padding:12px 15px; border-radius:8px; cursor:pointer;">Hapus</button>
          </form>
        </td>
      </tr>
    @endforeach
  </table>
</div>
</body>
</html>
