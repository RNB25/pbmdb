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
<body>

</body>
</html>
