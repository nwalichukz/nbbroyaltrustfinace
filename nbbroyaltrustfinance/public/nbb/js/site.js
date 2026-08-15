/* Maraso Trust Bank — layout interactions. No framework dependency. */
(function () {
  'use strict';

  // ---- Mobile primary nav toggle -----------------------------------------
  var navToggle = document.querySelector('[data-nav-toggle]');
  var primaryNav = document.querySelector('[data-primary-nav]');

  if (navToggle && primaryNav) {
    navToggle.addEventListener('click', function () {
      var isOpen = primaryNav.classList.toggle('is-open');
      navToggle.setAttribute('aria-expanded', String(isOpen));
    });
  }

  // ---- Locale / country switcher dropdowns -------------------------------
  // Supports multiple switcher instances on one page (desktop + mobile).
  var switchers = document.querySelectorAll('[data-locale-switcher]');

  switchers.forEach(function (switcher) {
    var toggle = switcher.querySelector('[data-locale-toggle]');
    var menu = switcher.querySelector('[data-locale-menu]');
    if (!toggle || !menu) return;

    toggle.addEventListener('click', function (event) {
      event.stopPropagation();
      var isOpen = menu.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', String(isOpen));

      // Close any other open switcher on the page.
      switchers.forEach(function (other) {
        if (other !== switcher) {
          other.querySelector('[data-locale-menu]')?.classList.remove('is-open');
          other.querySelector('[data-locale-toggle]')?.setAttribute('aria-expanded', 'false');
        }
      });
    });
  });

  document.addEventListener('click', function () {
    switchers.forEach(function (switcher) {
      switcher.querySelector('[data-locale-menu]')?.classList.remove('is-open');
      switcher.querySelector('[data-locale-toggle]')?.setAttribute('aria-expanded', 'false');
    });
  });

  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape') {
      switchers.forEach(function (switcher) {
        switcher.querySelector('[data-locale-menu]')?.classList.remove('is-open');
        switcher.querySelector('[data-locale-toggle]')?.setAttribute('aria-expanded', 'false');
      });
      if (primaryNav) primaryNav.classList.remove('is-open');
    }
  });
})();
