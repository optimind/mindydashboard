/**
 * mindy.js — Sidebar collapse + global interactivity
 * Mindy Dashboard · Laravel Blade edition
 */

(function () {
  'use strict';

  /* ── Constants ─────────────────────────────────────────── */
  var STORAGE_KEY   = 'mindy_sidebar_collapsed';
  var COLLAPSED_CLS = 'collapsed';

  /* ── Sidebar collapse / expand ─────────────────────────── */
  function initSidebar() {
    var sidebar = document.getElementById('sidebar');
    var toggle  = document.getElementById('sidebar-toggle');

    if (!sidebar || !toggle) return;

    /* Restore persisted state before first paint */
    var stored = localStorage.getItem(STORAGE_KEY);
    if (stored === 'true') {
      sidebar.classList.add(COLLAPSED_CLS);
      sidebar.setAttribute('data-collapsed', 'true');
    }

    toggle.addEventListener('click', function () {
      var isCollapsed = sidebar.classList.toggle(COLLAPSED_CLS);
      sidebar.setAttribute('data-collapsed', isCollapsed ? 'true' : 'false');
      localStorage.setItem(STORAGE_KEY, isCollapsed ? 'true' : 'false');
      toggle.setAttribute(
        'aria-label',
        isCollapsed ? 'Expand sidebar' : 'Collapse sidebar'
      );
    });
  }

  /* ── Search keyboard shortcut (⌘K / Ctrl+K) ─────────────── */
  function initSearchShortcut() {
    var input = document.getElementById('global-search');
    if (!input) return;

    document.addEventListener('keydown', function (e) {
      var isMac = navigator.platform.toUpperCase().indexOf('MAC') >= 0;
      var trigger = isMac ? (e.metaKey && e.key === 'k') : (e.ctrlKey && e.key === 'k');
      if (trigger) {
        e.preventDefault();
        input.focus();
        input.select();
      }
      /* Esc dismisses focus from search */
      if (e.key === 'Escape' && document.activeElement === input) {
        input.blur();
      }
    });
  }

  /* ── Bootstrap ──────────────────────────────────────────── */
  function init() {
    initSidebar();
    initSearchShortcut();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
