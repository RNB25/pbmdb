<div style="padding-left: 100px;padding-right: 100px" class="columns is-multiline">
    {{-- <form class="columns is-multiline" method="POST" action="{{ route('siswa.registrasi') }}"> --}}
    @csrf
    <div class="column is-6">
        <label for="username" class="block mb-2 text-sm font-medium text-black">Username</label>
        <input name="username" value="{{ $user->username }}" type="text" id="username" disabled
            class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="column is-6">
        <label for="username" class="block mb-2 text-sm font-medium text-black">Nama Lengkap</label>
        <input name="nama_lengkap" value="{{ $user->name }}" type="text" id="username" disabled
            class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="column is-6">
        <label for="username" class="block mb-2 text-sm font-medium text-black">Jalur Masuk</label>
        <input name="jalur_masuk" value="{{ $calonSiswa->jalur_masuk }}" type="text" id="username" disabled
            class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="column is-6">
        <label for="username" class="block mb-2 text-sm font-medium text-black">No Handphone</label>
        <input name="no_hp" value="{{ $calonSiswa->jalur_masuk }}" type="text" id="username" disabled
            class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="column is-12">
        <label for="username" class="block mb-2 text-sm font-medium text-black">Total Pembayaran Formulir</label>
        <input name="pembayaran" type="text" id="username"
            value="Rp. {{ number_format($pembayaranFormulir->jumlah_harga, 0, ',', '.') }}" disabled
            class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="column is-12">
        <button type="submit" id="pay-button"
            class="w-full p-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition duration-200">
            Bayar
        </button>

    </div>
    {{-- </form> --}}

    <script>
        document.addEventListener('click', function(e) {
            if (e.target && e.target.id === 'pay-button') {
                const snapToken = '{{ $pembayaranFormulir->snap_token }}';
                console.log('Token:', snapToken);

                if (!snapToken || snapToken === '') {
                    alert('Snap token tidak ditemukan');
                    return;
                }

                window.snap.pay(snapToken, {
                    onSuccess: function(result) {
                        alert("payment success!");
                        console.log(result);
                    },
                    onPending: function(result) {
                        alert("waiting your payment!");
                        console.log(result);
                    },
                    onError: function(result) {
                        alert("payment failed!");
                        console.log(result);
                    },
                    onClose: function() {
                        alert('you closed the popup without finishing the payment');
                    }
                });
            }
        });
    </script>

</div>
