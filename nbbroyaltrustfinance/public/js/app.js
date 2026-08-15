/* Nbb Trust Kapital — site behaviour
   Mobile nav drawer, sticky header shadow, back-to-top.
   No dependencies. */
(function () {
  'use strict';

  /* ---------- Mobile nav drawer ---------- */
  var toggle = document.getElementById('nav-toggle');
  var drawer = document.getElementById('nav-drawer');
  var scrim = document.getElementById('nav-scrim');
  var closeBtn = document.getElementById('nav-drawer-close');

  function openDrawer() {
    drawer.classList.add('is-open');
    scrim.classList.add('is-open');
    drawer.setAttribute('aria-hidden', 'false');
    toggle.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
  }

  function closeDrawer() {
    drawer.classList.remove('is-open');
    scrim.classList.remove('is-open');
    drawer.setAttribute('aria-hidden', 'true');
    toggle.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  }

  if (toggle && drawer) {
    toggle.addEventListener('click', function () {
      var isOpen = drawer.classList.contains('is-open');
      isOpen ? closeDrawer() : openDrawer();
    });
    closeBtn && closeBtn.addEventListener('click', closeDrawer);
    scrim && scrim.addEventListener('click', closeDrawer);

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape') closeDrawer();
    });

    // Close drawer whenever a link inside it is used
    drawer.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', closeDrawer);
    });
  }

  /* ---------- Sticky header shadow on scroll ---------- */
  var header = document.getElementById('site-header');
  function onScroll() {
    if (!header) return;
    if (window.scrollY > 8) {
      header.classList.add('is-scrolled');
    } else {
      header.classList.remove('is-scrolled');
    }

    var toTop = document.getElementById('to-top');
    if (toTop) {
      if (window.scrollY > 480) {
        toTop.classList.add('is-visible');
      } else {
        toTop.classList.remove('is-visible');
      }
    }
  }
  document.addEventListener('scroll', onScroll, { passive: true });
  onScroll();

  /* ---------- Back to top ---------- */
  var toTopBtn = document.getElementById('to-top');
  if (toTopBtn) {
    toTopBtn.addEventListener('click', function () {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  /* ---------- Mark current nav link ---------- */
  var here = window.location.pathname.replace(/\/+$/, '') || '/';
  document.querySelectorAll('.nav__links a, .nav-drawer__links a').forEach(function (a) {
    var path = a.getAttribute('href');
    try {
      var url = new URL(a.href);
      path = url.pathname.replace(/\/+$/, '') || '/';
    } catch (e) {}
    if (path === here) {
      a.setAttribute('aria-current', 'page');
    }
  });
})();
