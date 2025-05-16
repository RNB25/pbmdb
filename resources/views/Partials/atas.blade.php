<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', '')</title>
    </title>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Bulma CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>

    <style>
        /* span,
        p {
            font-family: 'Arial', sans-serif;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        html.is-dark,
        body.is-dark {
            background-color: #121212;
            color: #ffffff;
        }

        body.is-dark input,
        body.is-dark textarea,
        body.is-dark select,
        body.is-dark .card,
        body.is-dark button {
            background-color: #33333364;
            color: #fff;
            border-color: #555;
        }

        body.is-dark input:focus,
        body.is-dark textarea:focus,
        body.is-dark button:focus {
            border-color: #ff4081;
            box-shadow: 0 0 0 2px rgba(255, 64, 129, 0.2);
        }

        input::placeholder {
            color: #333;
            opacity: 0.6;
        }

        body.is-dark input::placeholder {
            color: #eee;
            opacity: 0.8;
        }

        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .login-card {
            width: 100%;
            max-width: 400px;
            margin: auto;
        } */
    </style>
</head>
@include('Partials.Navbar')
