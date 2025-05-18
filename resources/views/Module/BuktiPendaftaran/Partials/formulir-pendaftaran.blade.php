<div class="m-4">
    <form action="" method="POST">
        <div class="columns is-multiline">
            <!-- BIODATA SISWA -->
            <div class="column is-12">
                <h2 class="text-lg font-bold mb-4">BIODATA SISWA</h2>
            </div>

            <div class="column is-6">
                <label for="nama_lengkap" class="block mb-2 text-sm font-medium text-black">Nama Lengkap</label>
                <input name="nama_lengkap" type="text" id="nama_lengkap"
                    value="{{ $calonSiswa['nama_lengkap'] ?? '' }}"
                    class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="column is-6">
                <label for="nama_panggilan" class="block mb-2 text-sm font-medium text-black">Nama Panggilan</label>
                <input name="nama_panggilan" type="text" id="nama_panggilan"
                    value="{{ $calonSiswa['nama_panggilan'] ?? '' }}"
                    class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="column is-6">
                <div class="columns is-multiline">
                    <div class="column is-6">
                        <label for="tempat_lahir" class="block mb-2 text-sm font-medium text-black">Tempat Lahir</label>
                        <input name="tempat_lahir" type="text" id="tempat_lahir"
                            value="{{ $calonSiswa['tempat_lahir'] ?? '' }}"
                            class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="column is-6">
                        <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-black">Tanggal
                            Lahir</label>

                        @error('tanggal_lahir')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror

                        <input name="tanggal_lahir" type="date" id="tanggal_lahir"
                            value="{{ old('tanggal_lahir', isset($calonSiswa['tanggal_lahir']) ? \Carbon\Carbon::parse($calonSiswa['tanggal_lahir'])->format('Y-m-d') : '') }}"
                            class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
                    </div>

                </div>
            </div>

            <div class="column is-6">
                <label for="agama" class="block mb-2 text-sm font-medium text-black">Agama</label>
                <input name="agama" type="text" id="agama" value="{{ $calonSiswa['agama'] ?? '' }}"
                    class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="column is-12">
                <label for="alamat" class="block mb-2 text-sm font-medium text-black">Alamat</label>
                <input type="text" name="alamat" id="alamat" rows="2"
                    value="{{ $calonSiswa['alamat'] ?? '' }}"
                    class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500"></input>
            </div>

            <div class="column is-6">
                <label for="no_hp" class="block mb-2 text-sm font-medium text-black">Nomor Tlp/HP</label>
                <input name="no_hp" type="tel" id="no_hp" value="{{ $calonSiswa['no_hp'] ?? '' }}"
                    class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
            </div>

            {{-- <div class="column is-6">
                <label for="masuk_kelas" class="block mb-2 text-sm font-medium text-black">Masuk Kelas</label>
                <input name="masuk_kelas" type="text" id="masuk_kelas"
                    class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
            </div> --}}

            <!-- BIODATA ORANG TUA -->
            <div class="column is-12 mt-6">
                <h2 class="text-lg font-bold mb-4">BIODATA ORANG TUA/WALI</h2>
            </div>

            <div class="column is-6">
                <label for="nama_ayah" class="block mb-2 text-sm font-medium text-black">Nama Ayah</label>
                <input name="nama_ayah" type="text" id="nama_ayah"
                    class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="column is-6">
                <label for="nama_ibu" class="block mb-2 text-sm font-medium text-black">Nama Ibu</label>
                <input name="nama_ibu" type="text" id="nama_ibu"
                    class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="column is-6">
                <label for="ttl_ayah" class="block mb-2 text-sm font-medium text-black">Tempat, Tanggal Lahir
                    Ayah</label>
                <input name="ttl_ayah" type="text" id="ttl_ayah" placeholder="Contoh: Jakarta, 1 Januari 1980"
                    class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="column is-6">
                <label for="ttl_ibu" class="block mb-2 text-sm font-medium text-black">Tempat, Tanggal Lahir
                    Ibu</label>
                <input name="ttl_ibu" type="text" id="ttl_ibu" placeholder="Contoh: Bandung, 3 Maret 1982"
                    class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="column is-6">
                <label for="pendidikan_ayah" class="block mb-2 text-sm font-medium text-black">Pendidikan Ayah</label>
                <input name="pendidikan_ayah" type="text" id="pendidikan_ayah"
                    class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="column is-6">
                <label for="pendidikan_ibu" class="block mb-2 text-sm font-medium text-black">Pendidikan Ibu</label>
                <input name="pendidikan_ibu" type="text" id="pendidikan_ibu"
                    class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="column is-6">
                <label for="pekerjaan_ayah" class="block mb-2 text-sm font-medium text-black">Pekerjaan Ayah</label>
                <input name="pekerjaan_ayah" type="text" id="pekerjaan_ayah"
                    class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="column is-6">
                <label for="pekerjaan_ibu" class="block mb-2 text-sm font-medium text-black">Pekerjaan Ibu</label>
                <input name="pekerjaan_ibu" type="text" id="pekerjaan_ibu"
                    class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="column is-12">
                <label for="alamat_ortu" class="block mb-2 text-sm font-medium text-black">Alamat Orang Tua</label>
                <textarea name="alamat_ortu" id="alamat_ortu" rows="2"
                    class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500"></textarea>
            </div>

            <div class="column is-6">
                <label for="no_hp_ayah" class="block mb-2 text-sm font-medium text-black">No HP Ayah</label>
                <input name="no_hp_ayah" type="tel" id="no_hp_ayah"
                    class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
            </div>

            <!-- PERSYARATAN -->
            <div class="column is-12 mt-6">
                <h2 class="text-lg font-bold mb-4">PERSYARATAN YANG DISERAHKAN</h2>
            </div>

            <div class="column is-6">
                <label for="ijazah" class="block mb-2 text-sm font-medium text-black">Fotokopi Ijazah</label>
                <input name="ijazah" type="file" id="ijazah"
                    class="block w-full text-sm text-black file:mr-4 file:py-2 file:px-4
                           file:rounded-lg file:border-0 file:text-sm file:font-semibold
                           file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            </div>

            <div class="column is-6">
                <label for="akta" class="block mb-2 text-sm font-medium text-black">Fotokopi Akta
                    Kelahiran</label>
                <input name="akta" type="file" id="akta"
                    class="block w-full text-sm text-black file:mr-4 file:py-2 file:px-4
                           file:rounded-lg file:border-0 file:text-sm file:font-semibold
                           file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            </div>

            <div class="column is-6">
                <label for="kk" class="block mb-2 text-sm font-medium text-black">Fotokopi Kartu
                    Keluarga</label>
                <input name="kk" type="file" id="kk"
                    class="block w-full text-sm text-black file:mr-4 file:py-2 file:px-4
                           file:rounded-lg file:border-0 file:text-sm file:font-semibold
                           file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            </div>

            <div class="column is-6">
                <label for="foto" class="block mb-2 text-sm font-medium text-black">Pas Foto 3x4 (3
                    lembar)</label>
                <input name="foto" type="file" id="foto"
                    class="block w-full text-sm text-black file:mr-4 file:py-2 file:px-4
                           file:rounded-lg file:border-0 file:text-sm file:font-semibold
                           file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
            </div>


            <div class="column is-12 mt-4">
                <button type="submit"
                    class="w-full p-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition duration-200">
                    Kirim
                </button>
            </div>
        </div>
    </form>
</div>
