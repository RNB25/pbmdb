<div style="padding-left: 100px; padding-right: 100px">
    <form class="columns is-multiline" method="POST" action="{{ route('siswa.registrasi') }}">
        @csrf

        <div class="column is-6">
            <label for="username" class="block mb-2 text-sm font-medium text-black">Username</label>
            @error('username')
                <p class="text-red-500 text-sm">{{ $message }}</p>
            @enderror
            <input name="username" type="text" id="username" value="{{ old('username') }}"
                class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="column is-6">
            <label for="password" class="block mb-2 text-sm font-medium text-black">Password</label>
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <input name="password" type="password" id="password"
                class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="column is-6">
            <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-black">Nama Lengkap</label>
            @error('nama_lengkap')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <input name="nama_lengkap" type="text" id="nama_lengkap" value="{{ old('nama_lengkap') }}"
                class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="column is-6">
            <label for="nama_panggilan" class="block mb-2 text-sm font-medium text-black">Nama Panggilan</label>
            @error('nama_panggilan')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <input name="nama_panggilan" type="text" id="nama_panggilan" value="{{ old('nama_panggilan') }}"
                class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="column is-6">
            <label for="jenis_kelamin" class="block mb-2 text-sm font-medium text-black">Jenis Kelamin</label>
            @error('jenis_kelamin')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <select name="jenis_kelamin" id="jenis_kelamin"
                class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
                <option disabled {{ old('jenis_kelamin') ? '' : 'selected' }}>Pilih</option>
                <option value="1" {{ old('jenis_kelamin') == '1' ? 'selected' : '' }}>Pria</option>
                <option value="2" {{ old('jenis_kelamin') == '2' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="column is-6">
            <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-black">Tempat Lahir</label>
            @error('tempat_lahir')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <input name="tempat_lahir" type="text" id="tempat_lahir" value="{{ old('tempat_lahir') }}"
                class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="column is-6">
            <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-black">Tanggal Lahir</label>
            @error('tanggal_lahir')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <input name="tanggal_lahir" type="date" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="column is-6">
            <label for="agama" class="block mb-2 text-sm font-medium text-black">Agama</label>
            @error('agama')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <input name="agama" type="text" id="agama" value="{{ old('agama') }}"
                class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="column is-6">
            <label for="email" class="block mb-2 text-sm font-medium text-black">Email</label>
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <input name="email" type="email" id="email" value="{{ old('email') }}"
                class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="column is-6">
            <label for="alamat" class="block mb-2 text-sm font-medium text-black">Alamat</label>
            @error('alamat')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <input name="alamat" type="text" id="alamat" value="{{ old('alamat') }}"
                class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="column is-6">
            <label for="jalur_masuk" class="block mb-2 text-sm font-medium text-black">Jalur Masuk</label>
            @error('jalur_masuk')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <select name="jalur_masuk" id="jalur_masuk"
                class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
                <option disabled {{ old('jalur_masuk') ? '' : 'selected' }}>Pilih</option>
                <option value="Online" {{ old('jalur_masuk') == 'Online' ? 'selected' : '' }}>Jalur Online</option>
            </select>
        </div>

        <div class="column is-6">
            <label for="nisn" class="block mb-2 text-sm font-medium text-black">NISN</label>
            @error('nisn')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <input name="nisn" type="text" id="nisn" value="{{ old('nisn') }}"
                class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="column is-6">
            <label for="no_hp" class="block mb-2 text-sm font-medium text-black">No HP</label>
            @error('no_hp')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <input name="no_hp" type="text" id="no_hp" value="{{ old('no_hp') }}"
                class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="column is-12">
            <button type="submit"
                class="w-full p-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition duration-200">
                Simpan
            </button>
        </div>
    </form>
</div>
