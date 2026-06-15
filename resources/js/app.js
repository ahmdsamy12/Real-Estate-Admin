/**
 * Real Estate Admin — app.js
 * Handles: sidebar toggle, property search, status filter
 */

import './bootstrap';

document.addEventListener('DOMContentLoaded', () => {

    /* ── Sidebar toggle (mobile) ─────────────────────── */
    const sidebarEl   = document.getElementById('sidebar');
    const overlayEl   = document.getElementById('sidebar-overlay');
    const openBtn     = document.getElementById('sidebar-open');
    const closeBtn    = document.getElementById('sidebar-close');

    function openSidebar() {
        sidebarEl?.classList.remove('-translate-x-full');
        overlayEl?.classList.remove('hidden');
    }
    function closeSidebar() {
        sidebarEl?.classList.add('-translate-x-full');
        overlayEl?.classList.add('hidden');
    }

    openBtn?.addEventListener('click', openSidebar);
    closeBtn?.addEventListener('click', closeSidebar);
    overlayEl?.addEventListener('click', closeSidebar);

    /* ── Properties search + filter ─────────────────── */
    const searchInput  = document.getElementById('property-search');
    const filterStatus = document.getElementById('filter-status');
    const filterType   = document.getElementById('filter-type');
    const propertyCards = document.querySelectorAll('[data-property-card]');

    function filterProperties() {
        const query  = (searchInput?.value || '').toLowerCase().trim();
        const status = (filterStatus?.value || '').toLowerCase();
        const type   = (filterType?.value || '').toLowerCase();

        propertyCards.forEach(card => {
            const name    = (card.dataset.name    || '').toLowerCase();
            const cardSt  = (card.dataset.status  || '').toLowerCase();
            const cardTy  = (card.dataset.type    || '').toLowerCase();

            const matchQuery  = !query  || name.includes(query);
            const matchStatus = !status || cardSt === status;
            const matchType   = !type   || cardTy === type;

            card.style.display = (matchQuery && matchStatus && matchType) ? '' : 'none';
        });

        // Show empty state if all cards hidden
        const visibleCount = [...propertyCards].filter(c => c.style.display !== 'none').length;
        const emptyState = document.getElementById('properties-empty');
        if (emptyState) {
            emptyState.style.display = visibleCount === 0 ? '' : 'none';
        }
    }

    searchInput?.addEventListener('input', filterProperties);
    filterStatus?.addEventListener('change', filterProperties);
    filterType?.addEventListener('change', filterProperties);

    /* ── Gallery image switcher (detail page) ────────── */
    const thumbs    = document.querySelectorAll('[data-thumb]');
    const mainImage = document.getElementById('gallery-main');

    thumbs.forEach(thumb => {
        thumb.addEventListener('click', () => {
            if (mainImage) mainImage.src = thumb.dataset.thumb;
            thumbs.forEach(t => t.classList.remove('ring-2', 'ring-brand-500'));
            thumb.classList.add('ring-2', 'ring-brand-500');
        });
    });

});
