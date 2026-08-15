/* Nbb Trust Kapital — Admin Console behaviour
   Sidebar drawer, profile dropdown, generic confirm modal for
   Approve/Suspend/Remove actions, and the Add Funds live preview. */
(function () {
  'use strict';

  /* ---------- Sidebar (mobile off-canvas) ---------- */
  var sidebar = document.getElementById('db-sidebar');
  var scrim = document.getElementById('db-scrim');
  var toggleBtn = document.getElementById('db-sidebar-toggle');
  var closeBtn = document.getElementById('db-sidebar-close');

  function openSidebar() {
    sidebar.classList.add('is-open');
    scrim.classList.add('is-open');
    toggleBtn && toggleBtn.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
  }
  function closeSidebar() {
    sidebar.classList.remove('is-open');
    scrim.classList.remove('is-open');
    toggleBtn && toggleBtn.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
  }
  toggleBtn && toggleBtn.addEventListener('click', function () {
    sidebar.classList.contains('is-open') ? closeSidebar() : openSidebar();
  });
  closeBtn && closeBtn.addEventListener('click', closeSidebar);
  scrim && scrim.addEventListener('click', closeSidebar);
  document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeSidebar(); });

  /* ---------- Profile dropdown ---------- */
  var profileToggle = document.getElementById('db-profile-toggle');
  var profileMenu = document.getElementById('db-profile-menu');
  if (profileToggle && profileMenu) {
    profileToggle.addEventListener('click', function (e) {
      e.stopPropagation();
      var open = profileMenu.classList.toggle('is-open');
      profileToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
    document.addEventListener('click', function () {
      profileMenu.classList.remove('is-open');
      profileToggle.setAttribute('aria-expanded', 'false');
    });
  }

  /* ---------- Toast ---------- */
  var toast = document.getElementById('db-toast');
  var toastText = document.getElementById('db-toast-text');
  var toastTimer;
  function showToast(message) {
    if (!toast) return;
    toastText.textContent = message;
    toast.classList.add('is-visible');
    clearTimeout(toastTimer);
    toastTimer = setTimeout(function () { toast.classList.remove('is-visible'); }, 3200);
  }

  /* ---------- Generic confirm modal ----------
     Any button with [data-confirm] triggers this. Expected data attributes:
     data-confirm-title, data-confirm-body, data-confirm-label,
     data-confirm-style ("danger" | "primary"), data-success-message
  */
  var modal = document.getElementById('confirm-modal');
  var modalTitle = document.getElementById('confirm-modal-title');
  var modalBody = document.getElementById('confirm-modal-body');
  var modalConfirm = document.getElementById('confirm-modal-confirm');
  var modalCancel = document.getElementById('confirm-modal-cancel');
  var pendingRow = null;
  var pendingSuccessMessage = '';

  function openModal(trigger) {
    var title = trigger.getAttribute('data-confirm-title') || 'Confirm action';
    var body = trigger.getAttribute('data-confirm-body') || 'Are you sure you want to proceed?';
    var label = trigger.getAttribute('data-confirm-label') || 'Confirm';
    var style = trigger.getAttribute('data-confirm-style') || 'danger';

    modalTitle.textContent = title;
    modalBody.innerHTML = body;
    modalConfirm.textContent = label;
    modalConfirm.className = 'btn btn--block ' + (style === 'primary' ? 'btn--primary' : 'btn--danger');

    pendingRow = trigger.closest('[data-row]');
    pendingSuccessMessage = trigger.getAttribute('data-success-message') || 'Action completed.';

    modal.classList.add('is-open');
  }
  function closeModal() { modal.classList.remove('is-open'); pendingRow = null; }

  document.addEventListener('click', function (e) {
    var trigger = e.target.closest('[data-confirm]');
    if (trigger) { e.preventDefault(); openModal(trigger); }
  });
  modalCancel && modalCancel.addEventListener('click', closeModal);
  modal && modal.addEventListener('click', function (e) { if (e.target === modal) closeModal(); });

  modalConfirm && modalConfirm.addEventListener('click', function () {
    // Front-end only: visually reflects the action. Wire this up to your
    // real endpoint (e.g. fetch PATCH /admin/users/{id}/suspend) in production.
    if (pendingRow) { pendingRow.setAttribute('data-just-actioned', 'true'); }
    showToast(pendingSuccessMessage);
    closeModal();
  });

  /* ---------- Add Funds: live balance preview ---------- */
  var clientSelect = document.getElementById('af-client');
  var amountInput = document.getElementById('af-amount');
  var currentBalanceEl = document.getElementById('af-current-balance');
  var previewBalanceEl = document.getElementById('af-preview-balance');
  var previewAmountEl = document.getElementById('af-preview-amount');

  function formatMoney(n) {
    return '£' + n.toLocaleString('en-GB', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
  }

  function updatePreview() {
    if (!clientSelect || !amountInput) return;
    var opt = clientSelect.options[clientSelect.selectedIndex];
    var current = parseFloat(opt ? opt.getAttribute('data-balance') : 0) || 0;
    var amount = parseFloat(amountInput.value) || 0;

    if (currentBalanceEl) currentBalanceEl.textContent = formatMoney(current);
    if (previewAmountEl) previewAmountEl.textContent = amount > 0 ? '+' + formatMoney(amount) : formatMoney(0);
    if (previewBalanceEl) previewBalanceEl.textContent = formatMoney(current + amount);
  }

  clientSelect && clientSelect.addEventListener('change', updatePreview);
  amountInput && amountInput.addEventListener('input', updatePreview);
  updatePreview();

  /* ---------- Client: balance visibility toggle ---------- */
  document.querySelectorAll('[data-balance-toggle]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var card = btn.closest('[data-balance-card]');
      if (!card) return;
      var el = card.querySelector('.account-card__balance');
      if (!el) return;
      var isHidden = el.classList.toggle('is-hidden');
      if (isHidden) {
        el.dataset.realText = el.textContent;
        el.textContent = '••••••';
      } else if (el.dataset.realText) {
        el.textContent = el.dataset.realText;
      }
    });
  });

  var addFundsForm = document.getElementById('add-funds-form');
  if (addFundsForm) {
    addFundsForm.addEventListener('submit', function (e) {
      e.preventDefault();
      showToast('Funds request submitted for approval.');
    });
  }
})();
