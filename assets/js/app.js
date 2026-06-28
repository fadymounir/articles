/* ============================================================
   Theme + Language toggle + Sidebar
   ============================================================ */

(function () {
  const root = document.documentElement;

  /* ---------- Theme ---------- */
  const savedTheme = localStorage.getItem('theme') || 'dark';
  root.setAttribute('data-theme', savedTheme);
  updateThemeIcon(savedTheme);

  /* ---------- Language ---------- */
  const savedLang = localStorage.getItem('lang') || 'en';
  root.setAttribute('data-lang', savedLang);
  root.setAttribute('lang', savedLang);
  root.setAttribute('dir', savedLang === 'ar' ? 'rtl' : 'ltr');
  updateLangButton(savedLang);

  /* ---------- Click handler ---------- */
  document.addEventListener('click', function (e) {
    if (e.target.closest('#theme-toggle')) {
      const cur = root.getAttribute('data-theme');
      const next = cur === 'dark' ? 'light' : 'dark';
      root.setAttribute('data-theme', next);
      localStorage.setItem('theme', next);
      updateThemeIcon(next);
    }
    if (e.target.closest('#lang-toggle')) {
      const cur = root.getAttribute('data-lang');
      const next = cur === 'ar' ? 'en' : 'ar';
      root.setAttribute('data-lang', next);
      root.setAttribute('lang', next);
      root.setAttribute('dir', next === 'ar' ? 'rtl' : 'ltr');
      localStorage.setItem('lang', next);
      updateLangButton(next);
    }
    if (e.target.closest('#sidebar-toggle')) {
      toggleSidebar();
    }
    if (e.target.closest('#sidebar-backdrop')) {
      closeSidebar();
    }
    // On mobile, close sidebar when picking a topic
    if (window.innerWidth <= 900 && e.target.closest('.sidebar-item a')) {
      closeSidebar();
    }
  });

  function updateThemeIcon(t) {
    const btn = document.getElementById('theme-toggle');
    if (!btn) return;
    btn.innerHTML = t === 'dark' ? '☀️' : '🌙';
    btn.title = t === 'dark' ? 'Switch to light mode' : 'Switch to dark mode';
  }
  function updateLangButton(l) {
    const btn = document.getElementById('lang-toggle');
    if (!btn) return;
    btn.innerHTML = l === 'ar' ? 'EN' : 'AR';
    btn.title = l === 'ar' ? 'Switch to English' : 'التحويل إلى العربية';
  }

  /* ---------- Sidebar open/close (mobile) ---------- */
  function toggleSidebar() {
    const sb = document.getElementById('sidebar');
    const bd = document.getElementById('sidebar-backdrop');
    if (!sb) return;
    sb.classList.toggle('open');
    bd && bd.classList.toggle('show');
  }
  function closeSidebar() {
    const sb = document.getElementById('sidebar');
    const bd = document.getElementById('sidebar-backdrop');
    sb && sb.classList.remove('open');
    bd && bd.classList.remove('show');
  }

  /* ---------- Sidebar search ---------- */
  const sbSearch = document.getElementById('sidebar-search-input');
  if (sbSearch) {
    sbSearch.addEventListener('input', function () {
      const q = this.value.toLowerCase().trim();
      let totalVisible = 0;
      document.querySelectorAll('.sidebar-item').forEach(item => {
        const kw = item.getAttribute('data-keywords') || '';
        const match = !q || kw.includes(q);
        item.style.display = match ? '' : 'none';
        if (match) totalVisible++;
      });
      // Hide empty parts
      document.querySelectorAll('.sidebar-part').forEach(part => {
        const visible = [...part.querySelectorAll('.sidebar-item')]
                          .some(i => i.style.display !== 'none');
        part.style.display = visible ? '' : 'none';
      });
      const empty = document.getElementById('sidebar-search-empty');
      if (empty) empty.hidden = totalVisible !== 0;

      // Also filter the main index grid if present
      const grid = document.querySelectorAll('.topic-card');
      if (grid.length) {
        grid.forEach(card => {
          const text = card.textContent.toLowerCase();
          card.style.display = (!q || text.includes(q)) ? '' : 'none';
        });
        document.querySelectorAll('.part-section').forEach(part => {
          const visible = [...part.querySelectorAll('.topic-card')]
                            .some(c => c.style.display !== 'none');
          part.style.display = visible ? '' : 'none';
        });
      }
    });

    // Keyboard: '/' to focus sidebar search
    document.addEventListener('keydown', function (e) {
      if (e.key === '/' && document.activeElement.tagName !== 'INPUT') {
        e.preventDefault();
        sbSearch.focus();
      }
      if (e.key === 'Escape' && document.activeElement === sbSearch) {
        sbSearch.value = '';
        sbSearch.dispatchEvent(new Event('input'));
        sbSearch.blur();
      }
    });
  }

  /* ---------- Auto-scroll sidebar to active item ---------- */
  const active = document.querySelector('.sidebar-item.active');
  if (active) {
    active.scrollIntoView({ block: 'center' });
  }
})();
