<?php
/**
 * The Footer for VEDAMRIT Theme
 *
 * @package Vedamrit
 */
?>

<!-- Footer -->
<footer class="vedamrit-footer">
    <!-- Newsletter Section -->
    <section class="footer-newsletter">
        <div class="vedamrit-container newsletter-container">
            <span class="subheading-pill">VEDAMRIT DISPATCHES</span>
            <h2 class="section-title">A Little Wellness, Delivered.</h2>
            <p class="section-subtitle">
                Receive thoughtfully curated seasonal Ayurvedic rituals, ingredient deep dives, and early invitations to small-batch herbal harvests.
            </p>
            <form id="vedamrit-newsletter-form" class="newsletter-form">
                <input type="email" id="newsletter-email" class="newsletter-input" placeholder="Enter your email address" required>
                <button type="submit" class="btn btn-primary newsletter-btn">
                    <span>Subscribe</span>
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="btn-icon-svg">
                        <line x1="22" y1="2" x2="11" y2="13"></line>
                        <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                    </svg>
                </button>
            </form>
            <p id="newsletter-feedback" class="newsletter-feedback"></p>
            <p class="newsletter-note">We honor your privacy. Unsubscribe at any time with a single click.</p>
        </div>
    </section>

    <!-- Main Footer Links -->
    <div class="footer-main">
        <div class="vedamrit-container footer-grid">
            <!-- Brand Column -->
            <div class="footer-col footer-col-brand">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="brand-link">
                    <div class="brand-icon-wrapper">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="brand-icon-svg">
                            <path d="M12 2L12 22" />
                            <path d="M12 7C8.5 7 6 9.5 6 13C6 17 12 21 12 21" />
                            <path d="M12 7C15.5 7 18 9.5 18 13C18 17 12 21 12 21" />
                        </svg>
                    </div>
                    <span class="brand-title">VEDAMRIT</span>
                </a>
                <p class="footer-bio">
                    Rooted in classical Ayurvedic principles and modern botanical purity. We handcraft small-batch wellness formulations to restore balance, calm, and vitality in everyday life.
                </p>
                <div class="social-links">
                    <a href="https://instagram.com" target="_blank" rel="noopener noreferrer" class="social-btn" aria-label="Instagram">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="social-svg"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="https://facebook.com" target="_blank" rel="noopener noreferrer" class="social-btn" aria-label="Facebook">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="social-svg"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="https://youtube.com" target="_blank" rel="noopener noreferrer" class="social-btn" aria-label="YouTube">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="social-svg"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Shop Categories -->
            <div class="footer-col">
                <h3 class="footer-col-title">Shop Botanicals</h3>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(home_url('/shop/?category=herbal-supplements')); ?>">Herbal Supplements</a></li>
                    <li><a href="<?php echo esc_url(home_url('/shop/?category=hair-care')); ?>">Hair Care & Oils</a></li>
                    <li><a href="<?php echo esc_url(home_url('/shop/?category=skin-care')); ?>">Skin Care & Hydrosols</a></li>
                    <li><a href="<?php echo esc_url(home_url('/shop/?category=digestive-wellness')); ?>">Digestive Churnas</a></li>
                    <li><a href="<?php echo esc_url(home_url('/shop/?category=daily-wellness-essentials')); ?>">Daily Wellness Essentials</a></li>
                </ul>
            </div>

            <!-- Our World -->
            <div class="footer-col">
                <h3 class="footer-col-title">Our World</h3>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(home_url('/philosophy/')); ?>">Our Philosophy</a></li>
                    <li><a href="<?php echo esc_url(home_url('/ingredients/')); ?>">Ingredient Directory</a></li>
                    <li><a href="<?php echo esc_url(home_url('/journal/')); ?>">Wellness Journal</a></li>
                    <li><a href="<?php echo esc_url(home_url('/philosophy/#sourcing')); ?>">Ethical Wild-Harvesting</a></li>
                    <li><a href="<?php echo esc_url(home_url('/philosophy/#quality')); ?>">Quality Standards & Testing</a></li>
                </ul>
            </div>

            <!-- Customer Care -->
            <div class="footer-col">
                <h3 class="footer-col-title">Customer Care</h3>
                <div class="footer-contact-info">
                    <p class="contact-label">Demo Support Care:</p>
                    <p class="contact-value">care@vedamrit-ayurveda.demo</p>
                    <p class="contact-label">Toll Free (India):</p>
                    <p class="contact-value">1800-VEDA-CARE (Demo)</p>
                    <div class="contact-address">
                        <p class="contact-label">Apothecary Studio:</p>
                        <p>Plot 48, Herbal Valley, Rishikesh, Uttarakhand - 249201</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statutory Healthcare Disclaimer -->
        <div class="vedamrit-container">
            <div class="regulatory-disclaimer-card">
                <p class="disclaimer-header">🌿 Authentic Ayurvedic Heritage & Healthcare Disclaimer:</p>
                <p>
                    The products, traditional Ayurvedic perspectives, and lifestyle rituals described on this website are inspired by traditional Indian systems of medicine (Ayurveda). Statements made regarding herbal ingredients and their traditional benefits have not been evaluated for medical disease cure or treatment. Our formulations are dietary and cosmetic wellness essentials intended to support everyday wellbeing. If you are pregnant, nursing, taking prescription pharmaceuticals, or have an ongoing medical condition, please consult a qualified healthcare professional before incorporating new herbal supplements into your routine. This website is a conceptual brand presentation for VEDAMRIT.
                </p>
            </div>
        </div>

        <!-- Bottom Copyright Row -->
        <div class="vedamrit-container footer-bottom-row">
            <p>© <?php echo date('Y'); ?> VEDAMRIT Botanicals. All rights reserved. WordPress Client Showcase.</p>
            <div class="footer-legal-links">
                <a href="<?php echo esc_url(home_url('/philosophy/')); ?>">Privacy Policy</a>
                <a href="<?php echo esc_url(home_url('/philosophy/')); ?>">Terms of Service</a>
                <a href="<?php echo esc_url(home_url('/philosophy/')); ?>">Shipping & Returns</a>
            </div>
        </div>
    </div>
</footer>

<!-- Slide-Over Shopping Bag Drawer -->
<div id="cart-drawer" class="vedamrit-modal-drawer">
    <div class="modal-backdrop" id="cart-drawer-backdrop"></div>
    <div class="cart-drawer-panel">
        <div class="cart-drawer-header">
            <div class="cart-title-wrap">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="cart-title-icon"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                <h3 class="cart-drawer-title">Your Botanical Bag</h3>
                <span id="cart-drawer-badge" class="cart-header-count">0</span>
            </div>
            <button id="cart-drawer-close" class="drawer-close-btn" aria-label="Close cart">✕</button>
        </div>

        <!-- Free Delivery Progress Bar -->
        <div class="free-shipping-card">
            <div class="free-shipping-info">
                <span id="free-shipping-message">Add ₹999 more for Free Delivery across India</span>
                <span id="free-shipping-percent">0%</span>
            </div>
            <div class="progress-bar-track">
                <div id="free-shipping-bar" class="progress-bar-fill" style="width: 0%;"></div>
            </div>
        </div>

        <!-- Cart Items List Container -->
        <div id="cart-drawer-items" class="cart-items-container">
            <!-- Rendered dynamically by main.js -->
        </div>

        <!-- Cart Footer -->
        <div id="cart-drawer-footer" class="cart-drawer-footer">
            <div class="cart-summary-lines">
                <div class="summary-line">
                    <span>Subtotal</span>
                    <span id="cart-subtotal-val">₹0</span>
                </div>
                <div class="summary-line">
                    <span>Standard Shipping</span>
                    <span id="cart-shipping-val">₹99</span>
                </div>
                <div class="summary-line summary-total">
                    <span>Estimated Total</span>
                    <span id="cart-total-val">₹0</span>
                </div>
                <p class="cart-tax-note">All taxes included. Packed sustainably in recyclable glass.</p>
            </div>
            <button id="checkout-trigger-btn" class="btn btn-primary btn-block checkout-btn">
                <span>Proceed to Checkout</span>
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="btn-icon-svg"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
            </button>
            <div class="cart-trust-badges">
                <span>🔒 256-Bit SSL Encrypted</span>
                <span>•</span>
                <span>🌿 100% Authentic Botanicals</span>
            </div>
        </div>
    </div>
</div>

<!-- Quick View Modal -->
<div id="quick-view-modal" class="vedamrit-modal">
    <div class="modal-backdrop" id="quick-view-backdrop"></div>
    <div class="modal-dialog quick-view-dialog">
        <button id="quick-view-close" class="modal-close-btn" aria-label="Close modal">✕</button>
        <div id="quick-view-content" class="quick-view-layout">
            <!-- Dynamically populated by main.js -->
        </div>
    </div>
</div>

<!-- Search Modal -->
<div id="search-modal" class="vedamrit-modal">
    <div class="modal-backdrop" id="search-backdrop"></div>
    <div class="modal-dialog search-dialog">
        <div class="search-input-header">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="search-input-icon"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <input type="text" id="live-search-input" class="live-search-input" placeholder="Search herbal supplements, oils, skin cleansers, ingredients...">
            <button id="search-modal-close" class="search-close-btn" aria-label="Close search">✕</button>
        </div>
        <div id="search-results-area" class="search-results-area">
            <div class="search-trending-tags">
                <span class="trending-title">Trending Ayurvedic Searches</span>
                <div class="trending-pills">
                    <button class="pill-btn trending-tag" data-tag="Amla">Amla</button>
                    <button class="pill-btn trending-tag" data-tag="Hair Oil">Hair Oil</button>
                    <button class="pill-btn trending-tag" data-tag="Ashwagandha">Ashwagandha</button>
                    <button class="pill-btn trending-tag" data-tag="Neem">Neem</button>
                    <button class="pill-btn trending-tag" data-tag="Kumkumadi">Kumkumadi</button>
                    <button class="pill-btn trending-tag" data-tag="Triphala">Triphala</button>
                </div>
            </div>
            <div id="search-matches-list" class="search-matches-list"></div>
        </div>
    </div>
</div>

<!-- Demo Checkout Modal -->
<div id="demo-checkout-modal" class="vedamrit-modal">
    <div class="modal-backdrop" id="checkout-backdrop"></div>
    <div class="modal-dialog checkout-dialog">
        <div class="checkout-banner">
            <span>🔒 VEDAMRIT Interactive Demo Checkout</span>
            <span class="demo-tag">DEMO MODE • NO REAL CHARGES</span>
        </div>
        <button id="checkout-modal-close" class="modal-close-btn" aria-label="Close checkout">✕</button>

        <div id="checkout-form-view" class="checkout-content-padding">
            <div class="checkout-header-intro">
                <h3 class="checkout-title">Shipping & Order Details</h3>
                <p class="checkout-subtitle">Interactive demo for client presentation. Enter test delivery information:</p>
            </div>
            <form id="demo-order-form" class="checkout-form-grid">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" id="order-name" value="Aditya Kashyap" required>
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" id="order-email" value="aditya.k@example.com" required>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" id="order-phone" value="+91 98765 43210" required>
                </div>
                <div class="form-group">
                    <label>Delivery Address</label>
                    <input type="text" id="order-address" value="42, Lotus Greens, Indiranagar" required>
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" id="order-city" value="Bengaluru" required>
                </div>
                <div class="form-group form-group-half">
                    <div>
                        <label>State</label>
                        <input type="text" id="order-state" value="Karnataka" required>
                    </div>
                    <div>
                        <label>PIN Code</label>
                        <input type="text" id="order-pin" value="560038" required>
                    </div>
                </div>

                <div class="form-group full-width">
                    <label>Payment Method (Simulated)</label>
                    <div class="payment-method-selector">
                        <label class="payment-pill active">
                            <input type="radio" name="payment_mode" value="upi" checked>
                            <strong>UPI / QR Code</strong>
                            <small>GPay, PhonePe, Paytm</small>
                        </label>
                        <label class="payment-pill">
                            <input type="radio" name="payment_mode" value="card">
                            <strong>Cards / Netbanking</strong>
                            <small>Visa, RuPay, Master</small>
                        </label>
                        <label class="payment-pill">
                            <input type="radio" name="payment_mode" value="cod">
                            <strong>Cash on Delivery</strong>
                            <small>Pay on arrival</small>
                        </label>
                    </div>
                </div>

                <div class="checkout-order-summary-box full-width">
                    <div class="summary-line">
                        <span>Items Subtotal</span>
                        <span id="checkout-subtotal-val">₹0</span>
                    </div>
                    <div class="summary-line">
                        <span>Shipping</span>
                        <span id="checkout-shipping-val">FREE</span>
                    </div>
                    <div class="summary-line summary-total">
                        <span>Total Payable</span>
                        <span id="checkout-total-val">₹0</span>
                    </div>
                </div>

                <div class="checkout-action-row full-width">
                    <p class="ssl-note">🔒 256-bit SSL encrypted • Safe demo transaction</p>
                    <button type="submit" class="btn btn-primary checkout-submit-btn">
                        <span>Place Demo Order</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Simulated Success View -->
        <div id="checkout-success-view" class="checkout-success-view" style="display: none;">
            <div class="success-icon-badge">✓</div>
            <span class="subheading-pill">DEMO ORDER CONFIRMED</span>
            <h3 class="section-title">Thank You for Trusting VEDAMRIT</h3>
            <p class="section-subtitle">Your order confirmation and tracking link have been simulated for client review.</p>
            <div class="order-receipt-card">
                <div class="receipt-row">
                    <span>Order Reference:</span>
                    <strong id="receipt-order-id">VED-849201</strong>
                </div>
                <div class="receipt-row">
                    <span>Recipient:</span>
                    <span id="receipt-name">Aditya Kashyap</span>
                </div>
                <div class="receipt-row">
                    <span>Delivery To:</span>
                    <span id="receipt-destination">Bengaluru, Karnataka</span>
                </div>
                <div class="receipt-row">
                    <span>Estimated Arrival:</span>
                    <span class="receipt-highlight">3 - 5 Business Days</span>
                </div>
                <div class="receipt-row receipt-total-row">
                    <span>Total Paid:</span>
                    <strong id="receipt-total">₹0</strong>
                </div>
            </div>
            <button id="continue-shopping-btn" class="btn btn-primary">Continue Browsing Apothecary</button>
        </div>
    </div>
</div>

<!-- Account Modal -->
<div id="account-modal" class="vedamrit-modal">
    <div class="modal-backdrop" id="account-backdrop"></div>
    <div class="modal-dialog account-dialog">
        <div class="account-modal-header">
            <div class="account-icon-wrap">👤</div>
            <h3 class="account-title">Vedamrit Circle</h3>
            <p class="account-subtitle">Personalized Ayurvedic wellness & seasonal harvest updates</p>
        </div>
        <button id="account-modal-close" class="modal-close-btn" aria-label="Close modal">✕</button>
        <div class="account-modal-body">
            <form id="demo-account-form" class="account-form">
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" placeholder="your.email@example.com" value="wellness@vedamrit.demo" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Access Member Portal (Demo)</button>
            </form>
            <div class="account-perks-list">
                <div class="perk-item">✦ Early access to small-batch seasonal harvests</div>
                <div class="perk-item">✦ Personalized Dosha consultation guidance</div>
                <div class="perk-item">✦ Order status & dispatch tracking</div>
            </div>
        </div>
    </div>
</div>

<!-- Floating Toast Container -->
<div id="vedamrit-toast" class="vedamrit-toast" style="display: none;">
    <div class="toast-card">
        <span class="toast-icon">✓</span>
        <span id="toast-message" class="toast-text">Item added to your bag.</span>
    </div>
</div>

<?php wp_footer(); ?>
</body>
</html>
