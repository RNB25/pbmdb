<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dark Mode with Bulma</title>
  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>
  <!-- Bulma CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css"/>
  <style>
    span, p {
      font-family: 'Arial', sans-serif;
    }
    html, body {
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
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="columns is-multiline">
      <div class="column is-8">
        <div style="display: flex; justify-content: center; align-items: center; height: 765px;">
          <img src="{{ asset('asset/img-login.svg') }}" alt="Login Image" style="width: 500px;">
        </div>
      </div>
      <div class="column is-4" >
        <div style="display: flex; justify-content: center; align-items: center;position: relative;">
            <div class="card login-card" style="margin-top: 250px">
              <div class="card-image" style="text-align: center; margin-top: 40px;position: relative;">
                <span style="font-size: 25px; font-weight: bold;">Login</span>
                <a  style="position: absolute; top:-90px; right:20px;" class="" onclick="toggleDarkMode()" > <i id="theme-icon" data-lucide="sun"></i></a>
              </div>
              <div class="card-content">

                <form action="/login" method="POST">
                  <div class="field">
                    <div class="control">
                      <input class="input is-rounded" type="text" placeholder="Username" required />
                    </div>
                  </div>
                  <div class="field">
                    <div class="control" style="margin-top: 30px">
                      <input class="input is-rounded" type="password" placeholder="Password" required />
                    </div>
                  </div>
                  <div class="field">
                    <div class="control" style="margin-top: 30px">
                      <button class="button is-primary is-fullwidth is-rounded">Login</button>
                    </div>
                  </div>
                </form>

              </div>
            </div>
        </div>
      <div class="columns is-multiline" >
        <div class="column is-12" style="text-align: center;margin-top: 10px" >
            {{-- <span style="">lorem </span> --}}
        </div>
      </div>
      </div>
    </div>
  </div>

  <script>
    lucide.createIcons();

    function toggleDarkMode() {
      const isDark = document.body.classList.toggle('is-dark');
      document.documentElement.classList.toggle('is-dark', isDark);
      localStorage.setItem('darkMode', isDark ? 'enabled' : 'disabled');

      const icon = document.getElementById('theme-icon');
      icon.setAttribute('data-lucide', isDark ? 'sun' : 'moon');
      lucide.createIcons();
    }

    window.addEventListener('DOMContentLoaded', () => {
      const isDark = localStorage.getItem('darkMode') === 'enabled';
      if (isDark) {
        document.body.classList.add('is-dark');
        document.documentElement.classList.add('is-dark');
      }
      const icon = document.getElementById('theme-icon');
      icon.setAttribute('data-lucide', isDark ? 'sun' : 'moon');
      lucide.createIcons();
    });
  </script>
</body>
</html>
