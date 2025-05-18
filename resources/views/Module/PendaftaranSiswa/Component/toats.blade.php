@php
    $success = session('success_pendaftaran');
    session()->forget('success_pendaftaran');
@endphp
@if ($success)
    <div id="toast-success"
        class="fixed top-5 right-5 z-50 flex items-center w-full max-w-xs p-4 text-white bg-green-500 rounded-lg shadow"
        role="alert">
        <div
            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-100 bg-green-600 rounded-lg">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414L9 14.414l7.121-7.121a1 1 0 000-1.414z" />
            </svg>
        </div>
        <div class="ms-3 text-sm font-normal">
            {{ $success }}
        </div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 text-white hover:text-black rounded-lg p-1.5 hover:bg-green-600"
            onclick="document.getElementById('toast-success').remove()" aria-label="Close">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 14 14">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13" />
            </svg>
        </button>
    </div>
    <script>
        setTimeout(() => {
            const toast = document.getElementById('toast-success');
            if (toast) toast.remove();
        }, 5000);
    </script>
@endif

@if(session('success'))
    <div id="toast-success"
        class="fixed top-5 right-5 z-50 flex items-center w-full max-w-xs p-4 text-white bg-green-500 rounded-lg shadow"
        role="alert">
        <div
            class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-100 bg-green-600 rounded-lg">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M16.707 5.293a1 1 0 00-1.414 0L9 11.586 6.707 9.293a1 1 0 00-1.414 1.414L9 14.414l7.121-7.121a1 1 0 000-1.414z" />
            </svg>
        </div>
        <div class="ms-3 text-sm font-normal">
            {{ session('success') }}
        </div>
        <button type="button"
            class="ms-auto -mx-1.5 -my-1.5 text-white hover:text-black rounded-lg p-1.5 hover:bg-green-600"
            onclick="document.getElementById('toast-success').remove()" aria-label="Close">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 14 14">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13" />
            </svg>
        </button>
    </div>

    <script>
        setTimeout(() => {
            const toast = document.getElementById('toast-success');
            if (toast) toast.remove();
        }, 5000);
    </script>
@endif
