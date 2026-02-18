<x-app-layout>
    <div class="max-w3xl mx-auto py-6 px-4">
        <h1 class="text-2xl font-bold text-white mb-6">
            Tambah Mahasiswa
        </h1>

        <form action="{{ route('mahasiswa.store') }}" method="POST" class="space-y-4">
            @csrf

            {{-- NIM --}}
            <div>
                <label class="block text-sm font-medium text-gray-400">NIM</label>
                <input type="number" name="nim" value="{{ old('nim') }}"
                    class="mt-1 block w-full border-gray 300 rounded shadow-sm">

                @error('nim')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Nama --}}
            <div>
                <label class="block text-sm font-medium text-gray-400">Nama</label>
                <input type="text" name="nama" value="{{ old('nama') }}"
                    class="mt-1 block w-full border-gray 300 rounded shadow-sm">

                @error('nama')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- Prodi --}}
            <div>
                <label class="block text-sm font-medium text-gray-400">Prodi</label>
                <input type="text" name="prodi" value="{{ old('prodi') }}"
                    class="mt-1 block w-full border-gray-300 rounded shadow-sm">
                
                @error('prodi')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Angkatan --}}
            <div>
                <label class="block text-sm font-medium text-gray-400">Angkatan</label>
                <input type="number" name="angkatan" value="{{ old('angkatan') }}"
                    class="mt-1 block w-full border-gray-300 rounded shadow-sm">

                @error('angkatan')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-400">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="mt-1 block w-full border-gray-300 rounded shadow-sm">
                
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            {{-- Submit --}}
            <div class="flex justify-between pt-4">
                <a href="{{ route('mahasiswa.index')}}"
                    class="bg-gray-600 hover:bg-gray-700 hover:underline text-white font-medium px-4 py-2 rounded shadow">
                    Kembali
                </a>

                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-4 py-2 rounded shadow">Submit
                </button>
            </div>
        </form>
    </div>
</x-app-layout>