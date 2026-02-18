<x-app-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-white px-4 py-2 rounded shadow">
                Data Mahasiswa
            </h1>
            <a href="{{ route('mahasiswa.create') }}"
            class="bg-blue-600 font-medium hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
            + Tambah Mahasiswa
            </a>
        </div>

        {{-- Notifikasi --}}
        @if (session('success'))
            <div class="bg-green-200 border border-green-400 px-4 py-3 rounded mb-4">
                <p class="text-green-600 font-semibold">{{ session('success') }}</p>
            </div>
        @endif

        {{-- Search --}}
        <form method="GET" action="{{ route('mahasiswa.index') }}" class="mb-4"">
            <input type="text" name="search" placeholder="Cari nama atau prodi..." value="{{ request('search') }}"
                class="border rounded px-3 py-2">
            <button class="bg-gray-700 text-white font-medium px-4 py-2 rounded hover:bg-gray-800">
                Cari
            </button>
        </form>

        {{-- Tabel Data Mahasiswa --}}
        <div class="bg-white shadow rounded overflow-hidden">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-gray-200 text-gray-600 uppercase text-xs">
                    <tr>
                        <th class="px-6 py-3">NIM</th>
                        <th class="px-6 py-3">Nama</th>
                        <th class="px-6 py-3">Prodi</th>
                        <th class="px-6 py-3">Angkatan</th>
                        <th class="px-6 py-3">Email</th>
                        <th class="px-6 py-3 text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse ($mahasiswa as $mhs)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $mhs->nim }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900">{{ $mhs->nama }}</td>
                            <td class="px-6 py-4">{{ $mhs->prodi }}</td>
                            <td class="px-6 py-4">{{ $mhs->angkatan }}</td>
                            <td class="px-6 py-4">{{ $mhs->email }}</td>

                            <td class="px-6 py-4 text-center space-x-2">
                                <a href="{{ route('mahasiswa.edit', $mhs) }}"
                                    class="text-blue-600 hover:underline">
                                    Edit
                                </a>

                                <form action="{{ route('mahasiswa.destroy', $mhs) }}"
                                        method="POST"
                                        class="inline">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        onclick="return confirm('Yakin ingin menghapus?')"
                                        class="text-red-600 hover:underline">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-6 text-gray-500">
                                Data mahasiswa belum tersedia.
                            </td>
                        </tr>
                        
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $mahasiswa->links() }}
        </div>
    </div>
</x-app-layout>