/**
 * VEDAMRIT Theme Main JavaScript
 * Interactive E-Commerce, Persistent Cart Drawer, Modals, Filters
 */

(function () {
    'use strict';

    // Global Data supplied by wp_localize_script or fallback
    const config = window.vedamritData || {
        siteUrl: '/',
        currency: '₹',
        freeShippingThreshold: 999,
        standardShippingFee: 99,
        products: [],
        categories: [],
        ingredients: [],
    };

    /* ==========================================================================
       1. Toast Notifications
       ========================================================================== */
    function showToast(message) {
        const toast = document.getElementById('vedamrit-toast');
        const text = document.getElementById('toast-message');
        if (!toast || !text) return;

        text.textContent = message;
        toast.style.display = 'block';

        setTimeout(() => {
            toast.style.display = 'none';
        }, 3600);
    }

    /* ==========================================================================
       2. Persistent Cart Management (LocalStorage)
       ========================================================================== */
    const CART_STORAGE_KEY = 'vedamrit_wp_cart';

    function getCart() {
        try {
            const raw = localStorage.getItem(CART_STORAGE_KEY);
            return raw ? JSON.parse(raw) : [];
        } catch (e) {
            return [];
        }
    }

    function saveCart(cart) {
        try {
            localStorage.setItem(CART_STORAGE_KEY, JSON.stringify(cart));
        } catch (e) {}
        renderCartUI();
    }

    function addToCart(product, size, qty) {
        const cart = getCart();
        const selectedSize = size || product.default_size || (product.sizes && product.sizes[0]) || 'Standard';
        const quantity = parseInt(qty, 10) || 1;
        const itemId = `${product.id}-${selectedSize}`;

        const existing = cart.find(item => item.id === itemId);
        if (existing) {
            existing.quantity += quantity;
        } else {
            cart.push({
                id: itemId,
                productId: product.id,
                name: product.name,
                slug: product.slug,
                price: product.price,
                originalPrice: product.original_price,
                size: selectedSize,
                image: product.images[0],
                quantity: quantity
            });
        }

        saveCart(cart);
        showToast(`Added "${product.name}" (${selectedSize}) to your bag.`);
        openCartDrawer();
    }

    function removeFromCart(itemId) {
        const cart = getCart().filter(item => item.id !== itemId);
        saveCart(cart);
        showToast('Item removed from your bag.');
    }

    function updateCartQuantity(itemId, newQty) {
        let cart = getCart();
        if (newQty <= 0) {
            removeFromCart(itemId);
            return;
        }
        cart = cart.map(item => {
            if (item.id === itemId) {
                return { ...item, quantity: newQty };
            }
            return item;
        });
        saveCart(cart);
    }

    function clearCart() {
        saveCart([]);
    }

    function renderCartUI() {
        const cart = getCart();
        const headerBadge = document.getElementById('header-cart-badge');
        const drawerBadge = document.getElementById('cart-drawer-badge');
        const itemsContainer = document.getElementById('cart-drawer-items');
        const subtotalEl = document.getElementById('cart-subtotal-val');
        const shippingEl = document.getElementById('cart-shipping-val');
        const totalEl = document.getElementById('cart-total-val');
        const footerArea = document.getElementById('cart-drawer-footer');
        const shippingBar = document.getElementById('free-shipping-bar');
        const shippingMsg = document.getElementById('free-shipping-message');
        const shippingPercent = document.getElementById('free-shipping-percent');

        // Calculate counts & totals
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        const isFreeShipping = subtotal >= config.freeShippingThreshold || subtotal === 0;
        const shippingFee = isFreeShipping ? 0 : config.standardShippingFee;
        const total = subtotal + shippingFee;

        // Update badges
        if (headerBadge) headerBadge.textContent = totalItems;
        if (drawerBadge) drawerBadge.textContent = totalItems;

        // Update Free shipping progress
        if (shippingBar && shippingMsg && shippingPercent) {
            if (subtotal === 0) {
                shippingBar.style.width = '0%';
                shippingMsg.textContent = `Add ₹${config.freeShippingThreshold} more for Free Delivery across India`;
                shippingPercent.textContent = '0%';
            } else if (subtotal >= config.freeShippingThreshold) {
                shippingBar.style.width = '100%';
                shippingMsg.innerHTML = '<strong>🎉 You unlocked Free Delivery in India!</strong>';
                shippingPercent.textContent = '100%';
            } else {
                const diff = config.freeShippingThreshold - subtotal;
                const pct = Math.min(100, Math.round((subtotal / config.freeShippingThreshold) * 100));
                shippingBar.style.width = `${pct}%`;
                shippingMsg.innerHTML = `Add <strong>₹${diff}</strong> more for Free Delivery`;
                shippingPercent.textContent = `${pct}%`;
            }
        }

        // Render item list
        if (itemsContainer) {
            if (cart.length === 0) {
                itemsContainer.innerHTML = `
                    <div style="text-align: center; padding: 60px 20px;">
                        <div style="font-size: 36px; margin-bottom: 12px; color: var(--color-sage-300);">🛍️</div>
                        <h4 style="font-size: 18px; margin-bottom: 6px;">Your bag is empty</h4>
                        <p style="font-size: 12px; color: var(--text-muted); margin-bottom: 20px;">Explore our classical collection of whole-herb supplements and oils.</p>
                        <a href="${config.siteUrl}shop/" class="btn btn-primary" style="padding: 10px 20px; font-size: 12px;">Explore Collection →</a>
                    </div>
                `;
                if (footerArea) footerArea.style.display = 'none';
            } else {
                if (footerArea) footerArea.style.display = 'block';

                let html = '';
                cart.forEach(item => {
                    html += `
                        <div class="cart-item-row" data-item-id="${item.id}">
                            <img src="${item.image}" alt="${item.name}" class="cart-item-thumb">
                            <div class="cart-item-info">
                                <div>
                                    <div class="cart-item-title-row">
                                        <a href="${config.siteUrl}shop/${item.slug}/" class="cart-item-name">${item.name}</a>
                                        <button class="cart-item-remove-btn" data-remove-id="${item.id}" title="Remove item">✕</button>
                                    </div>
                                    <span class="cart-item-size">${item.size}</span>
                                </div>
                                <div class="cart-item-qty-price-row">
                                    <div class="cart-stepper">
                                        <button class="cart-qty-btn-minus" data-id="${item.id}">-</button>
                                        <span>${item.quantity}</span>
                                        <button class="cart-qty-btn-plus" data-id="${item.id}">+</button>
                                    </div>
                                    <span class="cart-item-price-calc">₹${item.price * item.quantity}</span>
                                </div>
                            </div>
                        </div>
                    `;
                });
                itemsContainer.innerHTML = html;
            }
        }

        if (subtotalEl) subtotalEl.textContent = `₹${subtotal}`;
        if (shippingEl) shippingEl.textContent = shippingFee === 0 ? 'FREE' : `₹${shippingFee}`;
        if (totalEl) totalEl.textContent = `₹${total}`;

        // Also update Checkout modal values if present
        const checkoutSubtotal = document.getElementById('checkout-subtotal-val');
        const checkoutShipping = document.getElementById('checkout-shipping-val');
        const checkoutTotal = document.getElementById('checkout-total-val');
        if (checkoutSubtotal) checkoutSubtotal.textContent = `₹${subtotal}`;
        if (checkoutShipping) checkoutShipping.textContent = shippingFee === 0 ? 'FREE' : `₹${shippingFee}`;
        if (checkoutTotal) checkoutTotal.textContent = `₹${total}`;
    }

    /* ==========================================================================
       3. Drawers & Modals
       ========================================================================== */
    function openCartDrawer() {
        document.getElementById('cart-drawer')?.classList.add('open');
    }
    function closeCartDrawer() {
        document.getElementById('cart-drawer')?.classList.remove('open');
    }

    function openSearchModal() {
        const modal = document.getElementById('search-modal');
        if (modal) {
            modal.classList.add('open');
            setTimeout(() => {
                document.getElementById('live-search-input')?.focus();
            }, 50);
        }
    }
    function closeSearchModal() {
        document.getElementById('search-modal')?.classList.remove('open');
    }

    function openAccountModal() {
        document.getElementById('account-modal')?.classList.add('open');
    }
    function closeAccountModal() {
        document.getElementById('account-modal')?.classList.remove('open');
    }

    function openCheckoutModal() {
        closeCartDrawer();
        const modal = document.getElementById('demo-checkout-modal');
        if (modal) {
            document.getElementById('checkout-form-view').style.display = 'block';
            document.getElementById('checkout-success-view').style.display = 'none';
            modal.classList.add('open');
        }
    }
    function closeCheckoutModal() {
        document.getElementById('demo-checkout-modal')?.classList.remove('open');
    }

    function openQuickView(productId) {
        const product = config.products.find(p => p.id === productId);
        if (!product) return;

        const content = document.getElementById('quick-view-content');
        if (!content) return;

        const discount = product.original_price ? Math.round(((product.original_price - product.price) / product.original_price) * 100) : 0;
        const defaultSize = product.default_size || product.sizes[0];

        content.innerHTML = `
            <div class="quick-view-gallery">
                <img id="qv-main-img" src="${product.images[0]}" alt="${product.name}">
            </div>
            <div class="quick-view-details">
                <div>
                    <span style="font-size: 11px; font-weight: 700; text-transform: uppercase; color: var(--color-sage-500);">${product.category} • ${product.dosha}</span>
                    <h3 style="font-size: 24px; margin: 6px 0;">${product.name}</h3>
                    <p style="font-style: italic; font-size: 12px; color: var(--color-sage-500); margin-bottom: 12px;">${product.sanskrit_name || ''}</p>
                    <div style="font-size: 22px; font-weight: 700; margin-bottom: 12px;">
                        ₹${product.price}
                        ${product.original_price ? `<span style="font-size: 14px; color: var(--color-sage-500); text-decoration: line-through; margin-left: 6px;">₹${product.original_price}</span>` : ''}
                        ${discount > 0 ? `<span class="badge-discount" style="margin-left: 6px;">${discount}% OFF</span>` : ''}
                    </div>
                    <p style="font-size: 13px; color: var(--text-muted); line-height: 1.5; margin-bottom: 16px;">${product.tagline}</p>
                    
                    <div style="margin-bottom: 20px;">
                        <label style="display: block; font-size: 11px; font-weight: 700; text-transform: uppercase; margin-bottom: 6px;">Select Size:</label>
                        <div class="size-options-row" id="qv-sizes-row">
                            ${product.sizes.map((sz, idx) => `
                                <button class="size-opt-btn ${sz === defaultSize ? 'active' : ''}" data-size="${sz}">${sz}</button>
                            `).join('')}
                        </div>
                    </div>
                </div>

                <div>
                    <div style="display: flex; gap: 10px; margin-bottom: 12px;">
                        <div class="cart-stepper" style="border-radius: var(--radius-md);">
                            <button id="qv-minus" style="padding: 8px 14px;">-</button>
                            <span id="qv-qty-val" style="padding: 0 10px;">1</span>
                            <button id="qv-plus" style="padding: 8px 14px;">+</button>
                        </div>
                        <button id="qv-add-btn" class="btn btn-primary" style="flex: 1;">
                            Add to Bag
                        </button>
                    </div>
                    <a href="${config.siteUrl}shop/${product.slug}/" style="font-size: 12px; font-weight: 600; color: var(--color-forest-800); text-decoration: underline;">View Full Botanical Details →</a>
                </div>
            </div>
        `;

        // Bind quick view events
        let selectedSize = defaultSize;
        let qty = 1;

        const sizeBtns = content.querySelectorAll('#qv-sizes-row .size-opt-btn');
        sizeBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                sizeBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                selectedSize = btn.dataset.size;
            });
        });

        const qtyEl = content.querySelector('#qv-qty-val');
        content.querySelector('#qv-minus')?.addEventListener('click', () => {
            if (qty > 1) {
                qty--;
                qtyEl.textContent = qty;
            }
        });
        content.querySelector('#qv-plus')?.addEventListener('click', () => {
            qty++;
            qtyEl.textContent = qty;
        });

        content.querySelector('#qv-add-btn')?.addEventListener('click', () => {
            addToCart(product, selectedSize, qty);
            closeQuickView();
        });

        document.getElementById('quick-view-modal')?.classList.add('open');
    }

    function closeQuickView() {
        document.getElementById('quick-view-modal')?.classList.remove('open');
    }

    /* ==========================================================================
       4. Search Modal Live Matching
       ========================================================================== */
    function initSearch() {
        const searchInput = document.getElementById('live-search-input');
        const resultsArea = document.getElementById('search-matches-list');
        if (!searchInput || !resultsArea) return;

        function runSearch(query) {
            const q = query.trim().toLowerCase();
            if (!q) {
                resultsArea.innerHTML = '';
                return;
            }

            const matches = config.products.filter(p => {
                return (
                    p.name.toLowerCase().includes(q) ||
                    p.category.toLowerCase().includes(q) ||
                    p.tagline.toLowerCase().includes(q) ||
                    (p.sanskrit_name && p.sanskrit_name.toLowerCase().includes(q))
                );
            });

            if (matches.length === 0) {
                resultsArea.innerHTML = `
                    <div style="padding: 20px; text-align: center; color: var(--text-muted); font-size: 13px;">
                        No remedies found for "${query}". Try searching "Amla", "Hair Oil", or "Ashwagandha".
                    </div>
                `;
            } else {
                resultsArea.innerHTML = matches.map(m => `
                    <a href="${config.siteUrl}shop/${m.slug}/" class="search-match-item">
                        <img src="${m.images[0]}" alt="${m.name}">
                        <div style="flex: 1; min-width: 0;">
                            <strong style="font-size: 13px; display: block; color: var(--color-forest-900);">${m.name}</strong>
                            <small style="font-size: 11px; color: var(--color-sage-500);">${m.category} • ${m.dosha}</small>
                        </div>
                        <span style="font-size: 13px; font-weight: 700; color: var(--color-forest-900);">₹${m.price}</span>
                    </a>
                `).join('');
            }
        }

        searchInput.addEventListener('input', e => runSearch(e.target.value));

        // Trending tag pills
        document.querySelectorAll('.trending-tag').forEach(tagBtn => {
            tagBtn.addEventListener('click', () => {
                const tag = tagBtn.dataset.tag;
                searchInput.value = tag;
                runSearch(tag);
            });
        });
    }

    /* ==========================================================================
       5. Shop Catalog Client Filtering
       ========================================================================== */
    function initShopFilter() {
        const grid = document.getElementById('shop-catalog-grid');
        if (!grid) return;

        let activeCategory = 'All';
        let activeDosha = 'All';
        let maxPrice = 1500;
        let queryFilter = '';
        let sortBy = 'featured';

        const catBtns = document.querySelectorAll('.cat-pill-btn');
        const doshaRadios = document.querySelectorAll('input[name="dosha_filter"]');
        const priceSlider = document.getElementById('shop-price-slider');
        const priceValDisplay = document.getElementById('price-slider-val');
        const searchInput = document.getElementById('shop-live-filter-input');
        const sortSelect = document.getElementById('shop-sort-select');
        const resetBtn = document.getElementById('shop-reset-filters-btn');
        const clearBtn = document.getElementById('sidebar-clear-btn');
        const emptyStateReset = document.getElementById('empty-state-reset-btn');
        const countDisplay = document.getElementById('shop-results-count');
        const noResultsMsg = document.getElementById('shop-no-results');

        // Check URL params for initial category
        const urlParams = new URLSearchParams(window.location.search);
        const catParam = urlParams.get('category');
        const doshaParam = urlParams.get('dosha');

        if (catParam) {
            const match = config.categories.find(c => c.slug === catParam);
            if (match) activeCategory = match.name;
        }
        if (doshaParam) {
            activeDosha = doshaParam;
        }

        function filterAndSortCards() {
            const cards = Array.from(grid.querySelectorAll('.product-card'));
            let visibleCount = 0;

            cards.forEach(card => {
                const cat = card.dataset.category;
                const dosha = card.dataset.dosha;
                const price = parseFloat(card.dataset.price);
                const name = card.dataset.name;

                const matchCat = activeCategory === 'All' || cat === activeCategory;
                const matchDosha = activeDosha === 'All' || dosha === activeDosha || dosha === 'Tridoshic';
                const matchPrice = price <= maxPrice;
                const matchQuery = !queryFilter || name.includes(queryFilter.toLowerCase());

                if (matchCat && matchDosha && matchPrice && matchQuery) {
                    card.style.display = 'flex';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            // Sorting visible cards
            const visibleCards = cards.filter(c => c.style.display !== 'none');
            if (sortBy === 'price-low') {
                visibleCards.sort((a, b) => parseFloat(a.dataset.price) - parseFloat(b.dataset.price));
            } else if (sortBy === 'price-high') {
                visibleCards.sort((a, b) => parseFloat(b.dataset.price) - parseFloat(a.dataset.price));
            } else if (sortBy === 'rating') {
                visibleCards.sort((a, b) => parseFloat(b.dataset.rating) - parseFloat(a.dataset.rating));
            }
            visibleCards.forEach(c => grid.appendChild(c));

            // Update result counts & empty state
            if (countDisplay) countDisplay.textContent = `Showing ${visibleCount} remedies`;
            if (noResultsMsg) noResultsMsg.style.display = visibleCount === 0 ? 'block' : 'none';

            // Reset button display
            const isFiltered = activeCategory !== 'All' || activeDosha !== 'All' || maxPrice < 1500 || queryFilter;
            if (resetBtn) resetBtn.style.display = isFiltered ? 'inline-block' : 'none';

            // Sync category pills active state
            catBtns.forEach(btn => {
                if (btn.dataset.category === activeCategory) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });
        }

        // Bind Category buttons
        catBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                activeCategory = btn.dataset.category;
                filterAndSortCards();
            });
        });

        // Bind Dosha Radios
        doshaRadios.forEach(radio => {
            if (radio.value === activeDosha) radio.checked = true;
            radio.addEventListener('change', () => {
                activeDosha = radio.value;
                filterAndSortCards();
            });
        });

        // Bind Price Slider
        if (priceSlider && priceValDisplay) {
            priceSlider.addEventListener('input', e => {
                maxPrice = parseFloat(e.target.value);
                priceValDisplay.textContent = `₹${maxPrice}`;
                filterAndSortCards();
            });
        }

        // Live text filter
        if (searchInput) {
            searchInput.addEventListener('input', e => {
                queryFilter = e.target.value.trim();
                filterAndSortCards();
            });
        }

        // Sort Select
        if (sortSelect) {
            sortSelect.addEventListener('change', e => {
                sortBy = e.target.value;
                filterAndSortCards();
            });
        }

        // Reset Filter Handlers
        function resetAll() {
            activeCategory = 'All';
            activeDosha = 'All';
            maxPrice = 1500;
            queryFilter = '';
            sortBy = 'featured';
            if (priceSlider) priceSlider.value = 1500;
            if (priceValDisplay) priceValDisplay.textContent = '₹1500';
            if (searchInput) searchInput.value = '';
            if (sortSelect) sortSelect.value = 'featured';
            doshaRadios.forEach(r => { if (r.value === 'All') r.checked = true; });
            filterAndSortCards();
        }

        resetBtn?.addEventListener('click', resetAll);
        clearBtn?.addEventListener('click', resetAll);
        emptyStateReset?.addEventListener('click', resetAll);

        filterAndSortCards();
    }

    /* ==========================================================================
       6. Product Detail Page Interactions
       ========================================================================== */
    function initProductDetail() {
        const detailCard = document.querySelector('.product-detail-card');
        if (!detailCard) return;

        const productId = detailCard.dataset.productId;
        const product = config.products.find(p => p.id === productId);
        if (!product) return;

        const mainImg = document.getElementById('detail-main-img');
        const thumbs = document.querySelectorAll('.gallery-thumbs-row .thumb-btn');
        const sizeBtns = document.querySelectorAll('.size-options-row .size-opt-btn');
        let selectedSize = product.default_size || (product.sizes && product.sizes[0]);
        let quantity = 1;

        // Thumbnail switcher
        thumbs.forEach(thumb => {
            thumb.addEventListener('click', () => {
                thumbs.forEach(t => t.classList.remove('active'));
                thumb.classList.add('active');
                if (mainImg) mainImg.src = thumb.dataset.imgSrc;
            });
        });

        // Size picker
        sizeBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                sizeBtns.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                selectedSize = btn.dataset.size;
            });
        });

        // Quantity controls
        const qtyVal = document.getElementById('qty-val');
        const addBtnText = document.getElementById('detail-add-btn-text');

        function updatePriceText() {
            if (addBtnText) {
                addBtnText.textContent = `Add to Bag (₹${product.price * quantity})`;
            }
        }

        document.getElementById('qty-minus')?.addEventListener('click', () => {
            if (quantity > 1) {
                quantity--;
                if (qtyVal) qtyVal.textContent = quantity;
                updatePriceText();
            }
        });

        document.getElementById('qty-plus')?.addEventListener('click', () => {
            quantity++;
            if (qtyVal) qtyVal.textContent = quantity;
            updatePriceText();
        });

        // Add to Bag Button
        document.getElementById('detail-add-to-cart-btn')?.addEventListener('click', () => {
            addToCart(product, selectedSize, quantity);
        });

        // Buy Now Button
        document.getElementById('detail-buy-now-btn')?.addEventListener('click', () => {
            addToCart(product, selectedSize, quantity);
            openCheckoutModal();
        });

        // Accordions
        document.querySelectorAll('.accordion-trigger').forEach(trigger => {
            trigger.addEventListener('click', () => {
                const item = trigger.closest('.accordion-item');
                item.classList.toggle('active');
            });
        });

        // FAQs
        document.querySelectorAll('.faq-trigger').forEach(trigger => {
            trigger.addEventListener('click', () => {
                const item = trigger.closest('.faq-accordion-item');
                item.classList.toggle('active');
            });
        });
    }

    /* ==========================================================================
       7. Event Listeners Initializer
       ========================================================================== */
    function initEvents() {
        // Announcement bar close
        document.getElementById('announcement-close')?.addEventListener('click', () => {
            const bar = document.getElementById('vedamrit-announcement');
            if (bar) bar.style.display = 'none';
        });

        // Mobile drawer toggle
        const mobileDrawer = document.getElementById('mobile-menu-drawer');
        document.getElementById('mobile-menu-toggle')?.addEventListener('click', () => {
            mobileDrawer?.classList.add('open');
        });
        document.getElementById('mobile-drawer-close')?.addEventListener('click', () => {
            mobileDrawer?.classList.remove('open');
        });
        document.getElementById('drawer-backdrop')?.addEventListener('click', () => {
            mobileDrawer?.classList.remove('open');
        });

        // Cart Drawer
        document.getElementById('cart-drawer-trigger')?.addEventListener('click', openCartDrawer);
        document.getElementById('cart-drawer-close')?.addEventListener('click', closeCartDrawer);
        document.getElementById('cart-drawer-backdrop')?.addEventListener('click', closeCartDrawer);

        // Cart Drawer item actions (delegated)
        document.getElementById('cart-drawer-items')?.addEventListener('click', e => {
            const removeBtn = e.target.closest('[data-remove-id]');
            if (removeBtn) {
                removeFromCart(removeBtn.dataset.removeId);
                return;
            }

            const minusBtn = e.target.closest('.cart-qty-btn-minus');
            if (minusBtn) {
                const id = minusBtn.dataset.id;
                const item = getCart().find(i => i.id === id);
                if (item) updateCartQuantity(id, item.quantity - 1);
                return;
            }

            const plusBtn = e.target.closest('.cart-qty-btn-plus');
            if (plusBtn) {
                const id = plusBtn.dataset.id;
                const item = getCart().find(i => i.id === id);
                if (item) updateCartQuantity(id, item.quantity + 1);
                return;
            }
        });

        // Checkout Launcher
        document.getElementById('checkout-trigger-btn')?.addEventListener('click', openCheckoutModal);
        document.getElementById('checkout-modal-close')?.addEventListener('click', closeCheckoutModal);
        document.getElementById('checkout-backdrop')?.addEventListener('click', closeCheckoutModal);

        // Demo Order Submission
        document.getElementById('demo-order-form')?.addEventListener('submit', e => {
            e.preventDefault();
            const orderId = `VED-${Math.floor(100000 + Math.random() * 900000)}`;
            const name = document.getElementById('order-name')?.value || 'Guest Patron';
            const city = document.getElementById('order-city')?.value || 'Bengaluru';
            const state = document.getElementById('order-state')?.value || 'Karnataka';

            const cart = getCart();
            const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const fee = subtotal >= config.freeShippingThreshold ? 0 : config.standardShippingFee;
            const total = subtotal + fee;

            document.getElementById('receipt-order-id').textContent = orderId;
            document.getElementById('receipt-name').textContent = name;
            document.getElementById('receipt-destination').textContent = `${city}, ${state}`;
            document.getElementById('receipt-total').textContent = `₹${total}`;

            document.getElementById('checkout-form-view').style.display = 'none';
            document.getElementById('checkout-success-view').style.display = 'block';

            clearCart();
        });

        document.getElementById('continue-shopping-btn')?.addEventListener('click', () => {
            closeCheckoutModal();
        });

        // Search Modal
        document.getElementById('search-modal-trigger')?.addEventListener('click', openSearchModal);
        document.getElementById('search-modal-close')?.addEventListener('click', closeSearchModal);
        document.getElementById('search-backdrop')?.addEventListener('click', closeSearchModal);

        // Account Modal
        document.getElementById('account-modal-trigger')?.addEventListener('click', openAccountModal);
        document.getElementById('account-modal-close')?.addEventListener('click', closeAccountModal);
        document.getElementById('account-backdrop')?.addEventListener('click', closeAccountModal);

        document.getElementById('demo-account-form')?.addEventListener('submit', e => {
            e.preventDefault();
            showToast('Welcome to Vedamrit Circle!');
            closeAccountModal();
        });

        // Quick View Close
        document.getElementById('quick-view-close')?.addEventListener('click', closeQuickView);
        document.getElementById('quick-view-backdrop')?.addEventListener('click', closeQuickView);

        // Global delegate for "Add" and "Quick View" on product cards
        document.addEventListener('click', e => {
            const addBtn = e.target.closest('.add-to-cart-btn');
            if (addBtn) {
                e.preventDefault();
                const prodId = addBtn.dataset.productId;
                const product = config.products.find(p => p.id === prodId);
                if (product) addToCart(product);
                return;
            }

            const qvBtn = e.target.closest('.quick-view-btn');
            if (qvBtn) {
                e.preventDefault();
                openQuickView(qvBtn.dataset.productId);
                return;
            }
        });

        // Global ESC key handler
        window.addEventListener('keydown', e => {
            if (e.key === 'Escape') {
                closeCartDrawer();
                closeSearchModal();
                closeAccountModal();
                closeCheckoutModal();
                closeQuickView();
            }
        });

        // Newsletter form
        document.getElementById('vedamrit-newsletter-form')?.addEventListener('submit', e => {
            e.preventDefault();
            const input = document.getElementById('newsletter-email');
            const feedback = document.getElementById('newsletter-feedback');
            if (input && feedback) {
                feedback.textContent = `Thank you for joining our circle! A welcoming guide has been sent to ${input.value}.`;
                input.value = '';
            }
        });
    }

    // Initialize on DOMContentLoaded
    document.addEventListener('DOMContentLoaded', () => {
        renderCartUI();
        initEvents();
        initSearch();
        initShopFilter();
        initProductDetail();
    });

})();
