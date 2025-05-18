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
        <input name="no_hp" value="{{ $calonSiswa->no_hp }}" type="text" id="username" disabled
            class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="column is-12">
        <label for="username" class="block mb-2 text-sm font-medium text-black">Total Pembayaran Formulir</label>
        <input name="pembayaran" type="text" id="username"
            value="Rp. {{ number_format($pembayaranFormulir->jumlah_harga, 0, ',', '.') }}" disabled
            class="block w-full p-2 text-black border border-gray-300 rounded-lg bg-white text-xs focus:ring-blue-500 focus:border-blue-500">
    </div>
    <div class="column is-12">
        @if ($pembayaranFormulir['is_lunas'] == true)
            <button type="button" onclick="showSuccessToast()"
                class="w-full p-2 bg-green-600 text-white text-sm rounded hover:bg-green-700 transition duration-200">
                Sudah Lunas
            </button>
        @else
        <button type="submit" id="pay-button"
            class="w-full p-2 bg-blue-600 text-white text-sm rounded hover:bg-blue-700 transition duration-200">
            Bayar
        </button>
        @endif

        <div id="notif-lunas"
            class="hidden fixed top-5 right-5 bg-green-500 text-white px-4 py-2 rounded shadow-lg z-50">
            Sudah Lunas
        </div>

    </div>
    {{-- </form> --}}

    <div id="toast-success"
        class="hidden fixed top-5 right-5 z-50 flex items-center w-full max-w-xs p-4 text-white bg-green-500 rounded-lg shadow"
        role="alert">
        <div
            class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z" />
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ms-3 text-sm font-normal">Sudah Bayar.</div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 text-white hover:text-black rounded-lg p-1.5 hover:bg-green-600"
            onclick="hideSuccessToast()" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>

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

        function showSuccessToast() {
            const toast = document.getElementById('toast-success');
            toast.classList.remove('hidden');

            // Hilangkan otomatis setelah 3 detik
            setTimeout(() => {
                toast.classList.add('hidden');
            }, 3000);
        }

        function hideSuccessToast() {
            const toast = document.getElementById('toast-success');
            toast.classList.add('hidden');
        }
    </script>

</div>
