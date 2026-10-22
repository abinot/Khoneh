(function () {
    'use strict';

    var root = document.querySelector('[data-ab-root]');
    if (!root) return;
    root.classList.add('ab-js');

    /* ───────────── پوسته ───────────── */
    var STORE_KEY = 'abinot-theme';
    var toggle = root.querySelector('[data-ab-theme-toggle]');

    function readStored() {
        try {
            var v = window.localStorage.getItem(STORE_KEY);
            return (v === 'dark' || v === 'light') ? v : null;
        } catch (e) { return null; }
    }
    function writeStored(v) {
        try { window.localStorage.setItem(STORE_KEY, v); } catch (e) { /* بدون ذخیره ادامه می‌دهیم */ }
    }
    function appDark() { return document.documentElement.classList.contains('dark'); }
    function currentTheme() { return root.getAttribute('data-ab-theme') || (appDark() ? 'dark' : 'light'); }

    var saved = readStored();
    if (saved) {
        root.setAttribute('data-ab-theme', saved);
    } else if (appDark()) {
        root.setAttribute('data-ab-theme', 'dark');
    }

    if (toggle) {
        toggle.addEventListener('click', function () {
            var next = currentTheme() === 'dark' ? 'light' : 'dark';
            root.setAttribute('data-ab-theme', next);
            writeStored(next);
        });
    }

    /* ───────────── ظهور هنگام اسکرول ───────────── */
    var reveals = Array.prototype.slice.call(root.querySelectorAll('.ab-reveal'));
    var reduce = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if ('IntersectionObserver' in window && !reduce) {
        var io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) { entry.target.classList.add('is-in'); io.unobserve(entry.target); }
            });
        }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });
        reveals.forEach(function (el) { io.observe(el); });
    } else {
        reveals.forEach(function (el) { el.classList.add('is-in'); });
    }

    /* ───────────── پنجرهٔ نامه‌ها ───────────── */
    var letterRoot = root.querySelector('[data-ab-letters]');
    var modal = root.querySelector('[data-ab-modal]');
    if (!letterRoot || !modal) return;

    var backdrop = modal.querySelector('[data-ab-modal-backdrop]');
    var card = modal.querySelector('[data-ab-modal-card]');
    var closeButton = modal.querySelector('[data-ab-modal-close]');
    var panels = Array.prototype.slice.call(modal.querySelectorAll('[data-ab-modal-panel]'));
    var opener = null, closeTimer = null, closing = false;
    var prevBody = '', prevRoot = '';

    function focusables() {
        return Array.prototype.slice.call(card.querySelectorAll(
            'a[href], button:not([disabled]), input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])'
        )).filter(function (el) { return !el.closest('[hidden]') && el.getAttribute('aria-hidden') !== 'true'; });
    }

    function openModal(index, button) {
        if (closeTimer) window.clearTimeout(closeTimer);
        closing = false;
        opener = button;

        panels.forEach(function (panel) {
            panel.hidden = panel.getAttribute('data-ab-modal-panel') !== String(index);
        });
        var active = panels[Number(index)];
        var heading = active && active.querySelector('h2');
        if (heading && heading.id) modal.setAttribute('aria-labelledby', heading.id);

        prevBody = document.body.style.overflow;
        prevRoot = document.documentElement.style.overflow;
        modal.hidden = false;
        modal.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
        document.documentElement.style.overflow = 'hidden';

        window.requestAnimationFrame(function () { modal.classList.add('is-open'); });
        closeButton.focus();
    }

    function closeModal() {
        if (modal.hidden || closing) return;
        closing = true;
        modal.classList.remove('is-open');
        modal.setAttribute('aria-hidden', 'true');

        closeTimer = window.setTimeout(function () {
            modal.hidden = true;
            document.body.style.overflow = prevBody;
            document.documentElement.style.overflow = prevRoot;
            closing = false;
            if (opener && typeof opener.focus === 'function') opener.focus();
        }, 300);
    }

    letterRoot.querySelectorAll('[data-ab-letter]').forEach(function (button) {
        button.addEventListener('click', function () { openModal(button.getAttribute('data-ab-letter'), button); });
    });
    closeButton.addEventListener('click', closeModal);
    backdrop.addEventListener('click', closeModal);

    document.addEventListener('keydown', function (event) {
        if (modal.hidden) return;
        if (event.key === 'Escape') { event.preventDefault(); closeModal(); return; }
        if (event.key !== 'Tab') return;

        var items = focusables();
        if (!items.length) { event.preventDefault(); card.focus(); return; }
        var first = items[0], last = items[items.length - 1];
        if (event.shiftKey && document.activeElement === first) { event.preventDefault(); last.focus(); }
        else if (!event.shiftKey && document.activeElement === last) { event.preventDefault(); first.focus(); }
    });
})();
