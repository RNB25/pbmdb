<div style="padding-left: 100px;padding-right: 100px">
    <form class="columns is-multiline" method="POST" action="{{ route('siswa.registrasi') }}">
        @csrf
        <div class="column is-6">
            <label for="username" class="block mb-2 text-sm font-medium text-black">Username</label>
            <input name="username" type="text" id="username"
                class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="column is-6">
            <label for="password" class="block mb-2 text-sm font-medium text-black">Password</label>
            <input name="password" type="password" id="password"
                class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="column is-6">
            <label for="jalur_masuk" class="block mb-2 text-sm font-medium text-black">Jalur Masuk</label>
            <select name="jalur_masuk" id="jalur_masuk"
                class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
                <option selected disabled>Pilih</option>
                <option value="Online">Jalur Online</option>
            </select>
        </div>
        <div class="column is-6">
            <label for="nisn" class="block mb-2 text-sm font-medium text-black">NISN</label>
            <input name="nisn" type="text" id="nisn"
                class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="column is-6">
            <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-black">Nama Lengkap Sesuai Identitas
                (KTP/Ijazah)</label>
            <input name="nama_lengkap" type="text" id="nama_lengkap"
                class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="column is-6">
            <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-black">Tanggal Lahir</label>
            <input name="tanggal_lahir" type="date" id="tanggal_lahir"
                class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="column is-6">
            <label for="no_hp" class="block mb-2 text-sm font-medium text-black">No HP</label>
            <input name="no_hp" type="text" id="no_hp"
                class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="column is-6">
            <label for="email" class="block mb-2 text-sm font-medium text-black">Email</label>
            <input name="email" type="email" id="email"
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
