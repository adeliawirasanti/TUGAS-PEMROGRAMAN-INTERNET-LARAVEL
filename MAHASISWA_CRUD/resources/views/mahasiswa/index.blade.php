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

  <table>
    <tr>
      <th>ID</th>
      <th>NIM</th>
      <th>Nama</th>
      <th>Prodi</th>
      <th>Aksi</th>
    </tr>
    @foreach($mahasiswa as $m)
      <tr>
        <td>{{ $m->id }}</td>
        <td>{{ $m->nim }}</td>
        <td>{{ $m->nama }}</td>
        <td>{{ $m->prodi }}</td>
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
