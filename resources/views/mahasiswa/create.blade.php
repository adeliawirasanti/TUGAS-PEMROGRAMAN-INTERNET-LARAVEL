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
    <div class="error">
      <ul>
        @foreach ($errors->all() as $error)
          <li style="color:red;">{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route('mahasiswa.store') }}">
    @csrf

    <input type="text" name="nim" placeholder="NIM" required>
    <input type="text" name="nama" placeholder="Nama Mahasiswa" required>

    <!-- Dropdown Fakultas -->
    <select id="fakultas" name="fakultas_id" required>
      <option value="">-- Pilih Fakultas --</option>
      @foreach($fakultas as $f)
        <option value="{{ $f->id }}">{{ $f->nama }}</option>
      @endforeach
    </select>

    <!-- Dropdown Program Studi -->
    <select id="program_studi" name="program_studi_id" required>
      <option value="">-- Pilih Program Studi --</option>
    </select>

    <button type="submit">Simpan</button>
  </form>
</div>

<script>
  const fakultasSelect = document.getElementById('fakultas');
  const prodiSelect = document.getElementById('program_studi');

  const prodiData = @json(\App\Models\ProgramStudi::with('fakultas')->get());

  fakultasSelect.addEventListener('change', function() {
    const selectedFakultasId = this.value;
    prodiSelect.innerHTML = '<option value="">-- Pilih Program Studi --</option>';

    const filteredProdi = prodiData.filter(p => p.fakultas_id == selectedFakultasId);
    filteredProdi.forEach(p => {
      const option = document.createElement('option');
      option.value = p.id;
      option.textContent = p.nama;
      prodiSelect.appendChild(option);
    });
  });
</script>
</body>
</html>
