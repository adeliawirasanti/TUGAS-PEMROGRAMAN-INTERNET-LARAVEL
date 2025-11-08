<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Daftar Mahasiswa</h3>

                        {{-- TOMBOL TAMBAH MAHASISWA --}}
                        <a href="{{ route('mahasiswa.create') }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded-md transition">
                            + Tambah Mahasiswa
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full border border-gray-300 rounded-lg">
                            <thead class="bg-gray-100">
                                <tr class="text-left">
                                    <th class="px-4 py-2 border">No</th>
                                    <th class="px-4 py-2 border">Nama</th>
                                    <th class="px-4 py-2 border">NIM</th>
                                    <th class="px-4 py-2 border">Fakultas</th>
                                    <th class="px-4 py-2 border">Program Studi</th>
                                    <th class="px-4 py-2 border">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mahasiswas as $index => $mhs)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                                        <td class="px-4 py-2 border">{{ $mhs->nama }}</td>
                                        <td class="px-4 py-2 border">{{ $mhs->nim }}</td>
                                        <td class="px-4 py-2 border">{{ $mhs->fakultas->nama_fakultas ?? '-' }}</td>
                                        <td class="px-4 py-2 border">{{ $mhs->programStudi->nama_prodi ?? '-' }}</td>
                                        <td class="px-4 py-2 border text-center">
                                            <a href="{{ route('mahasiswa.edit', $mhs->id) }}" class="text-blue-600 hover:underline">Edit</a> |
                                            <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="text-red-600 hover:underline">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="px-4 py-4 text-center text-gray-500">
                                            Belum ada data mahasiswa.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
