<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen bg-white text-gray-900">
    @if ($errors->has('login'))
        @php
            $loginError = json_decode($errors->first('login'), true);
        @endphp
        <div id="toast-danger"
            class="fixed top-5 right-5 z-10 flex items-center w-full max-w-xs p-4 text-white bg-red-500 rounded-lg shadow"
            role="alert">
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-100 bg-red-600 rounded-lg">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                </svg>
            </div>
            <div class="ms-3 text-sm font-normal">
                {{ $loginError['message'] ?? 'Terjadi kesalahan saat login' }}
            </div>
            <button type="button"
                class="ms-auto -mx-1.5 -my-1.5 text-white hover:text-black rounded-lg p-1.5 hover:bg-red-600"
                onclick="document.getElementById('toast-danger').remove()" aria-label="Close">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 14 14">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13" />
                </svg>
            </button>
        </div>

        <script>
            setTimeout(() => {
                const toast = document.getElementById('toast-danger');
                if (toast) {
                    toast.classList.add('opacity-0');
                    setTimeout(() => toast.remove(), 300);
                }
            }, 5000);

            document.getElementById('close-toast')?.addEventListener('click', () => {
                const toast = document.getElementById('toast-danger');
                toast?.classList.add('opacity-0');
                setTimeout(() => toast.remove(), 300);
            });
        </script>
    @endif

    <div class="flex h-screen">
        <!-- Left Side -->
        <div
            class="w-2/3 bg-gradient-to-r from-green-600/30 to-white border-r border-gray-300 flex items-center justify-center">
            <img src="{{ asset('asset/img-login.svg') }}" alt="Login Image" class="w-full max-w-md" />
        </div>

        <!-- Right Side (Form) -->
        <div class="w-1/3 flex flex-col justify-center px-10 bg-white">
            <div class="flex justify-center mb-4">
                <img class="w-36" src="{{ asset('asset/logo/logo-smp-nav-removebg-preview.png') }}"
                    alt="Logo Sekolah" />
            </div>

            <div class="text-center font-semibold text-xl mb-1">
                SMP Karya Guna Jaya
            </div>
            <div class="text-center italic text-sm text-gray-600 mb-8">
                Login to your Account
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-4">
                    <label for="username" class="block mb-1 text-sm font-medium">Username</label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 rounded-l-md">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                            </svg>
                        </span>
                        <input type="text" name="username" id="username" placeholder="Username"
                            class="w-full rounded-r-md bg-white text-black border border-gray-300 p-2.5 text-sm focus:ring-green-500 focus:border-green-500" />
                    </div>
                </div>

                <div class="mb-2">
                    <label for="password" class="block mb-1 text-sm font-medium">Password</label>
                    <div class="flex">
                        <span
                            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 rounded-l-md">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M8 10V7a4 4 0 1 1 8 0v3h1a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h1Zm2-3a2 2 0 1 1 4 0v3h-4V7Zm2 6a1 1 0 0 1 1 1v3a1 1 0 1 1-2 0v-3a1 1 0 0 1 1-1Z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        <input type="password" name="password" id="password" placeholder="Password"
                            class="w-full rounded-r-md bg-white text-black border border-gray-300 p-2.5 text-sm focus:ring-green-500 focus:border-green-500" />
                    </div>
                </div>

                <!-- Forgot Password -->
                <div class="text-right mb-6">
                    <a href="#" class="italic text-sm text-gray-500 hover:underline">Forgot Password?</a>
                </div>

                <!-- Button -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="w-1/2 bg-gradient-to-r from-green-600 to-green-500 text-white py-2.5 rounded-lg text-sm hover:from-green-700 hover:to-green-600 focus:ring-4 focus:ring-green-300">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
