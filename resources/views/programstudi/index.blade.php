<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Daftar Program Studi</title>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('style-template.css') }}">
</head>
<body>
<a href="/" class="kembali">← Kembali</a>

<div class="container daftar">
  <h2>Daftar Program Studi</h2>

  @if (session('success'))
    <p class="success">{{ session('success') }}</p>
  @endif

  <div style="text-align:right; margin-bottom:20px;">
    <a href="{{ route('programstudi.create') }}" class="btn" style="background:#3A345B;">Tambah Program Studi</a>
  </div>

  <table>
    <tr>
      <th>ID</th>
      <th>Nama Program Studi</th>
      <th>Fakultas</th>
      <th>Aksi</th>
    </tr>
    @foreach($programstudi as $p)
      <tr>
        <td>{{ $p->id }}</td>
        <td>{{ $p->nama }}</td>
        <td>{{ $p->fakultas->nama ?? '-' }}</td>
        <td>
          <a href="{{ route('programstudi.edit', $p->id) }}" class="btn">Edit</a>
          <form action="{{ route('programstudi.destroy', $p->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn" style="background:#b22222; color:white;"
              onclick="return confirm('Yakin ingin menghapus program studi ini?')">
              Hapus
            </button>
          </form>
        </td>
      </tr>
    @endforeach
  </table>
</div>
</body>
</html>
