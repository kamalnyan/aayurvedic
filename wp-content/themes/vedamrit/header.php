<?php
/**
 * The Header for VEDAMRIT Theme
 *
 * @package Vedamrit
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Announcement Bar -->
<div id="vedamrit-announcement" class="vedamrit-announcement">
    <div class="vedamrit-container announcement-container">
        <div class="announcement-spacer"></div>
        <div class="announcement-content">
            <span class="announcement-sparkle">✦</span>
            <span>Discover the wisdom of Ayurveda, thoughtfully made for modern living.</span>
            <span class="announcement-divider">•</span>
            <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="announcement-link">
                Complimentary Shipping on Orders Above ₹999
            </a>
        </div>
        <button id="announcement-close" class="announcement-close-btn" aria-label="Dismiss announcement">✕</button>
    </div>
</div>

<!-- Sticky Main Navigation -->
<header id="vedamrit-header" class="vedamrit-header">
    <div class="vedamrit-container header-container">
        <!-- Mobile Menu Toggle -->
        <button id="mobile-menu-toggle" class="mobile-menu-btn" aria-label="Open Navigation Menu">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="icon-svg">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </button>

        <!-- Brand Logo with Botanical Symbol -->
        <div class="brand-logo-area">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="brand-link">
                <div class="brand-icon-wrapper">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="brand-icon-svg">
                        <path d="M12 2L12 22" />
                        <path d="M12 7C8.5 7 6 9.5 6 13C6 17 12 21 12 21" />
                        <path d="M12 7C15.5 7 18 9.5 18 13C18 17 12 21 12 21" />
                        <path d="M12 12C9.5 12 8 13.5 8 15.5" />
                        <path d="M12 12C14.5 12 16 13.5 16 15.5" />
                    </svg>
                </div>
                <div class="brand-text">
                    <span class="brand-title">VEDAMRIT</span>
                    <span class="brand-tagline">Ayurvedic Botanicals</span>
                </div>
            </a>
        </div>

        <!-- Desktop Navigation Links -->
        <nav class="desktop-nav" aria-label="Main Navigation">
            <ul class="nav-links-list">
                <li><a href="<?php echo esc_url(home_url('/')); ?>" class="nav-link <?php echo is_front_page() ? 'active' : ''; ?>">Home</a></li>
                <li><a href="<?php echo esc_url(home_url('/shop/')); ?>" class="nav-link">Shop</a></li>
                <li><a href="<?php echo esc_url(home_url('/philosophy/')); ?>" class="nav-link">Our Philosophy</a></li>
                <li><a href="<?php echo esc_url(home_url('/ingredients/')); ?>" class="nav-link">Ingredients</a></li>
                <li><a href="<?php echo esc_url(home_url('/journal/')); ?>" class="nav-link">Journal</a></li>
            </ul>
        </nav>

        <!-- Header Action Icons -->
        <div class="header-actions">
            <!-- Search Icon -->
            <button id="search-modal-trigger" class="action-btn" aria-label="Search remedies" title="Search">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="icon-svg">
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </button>

            <!-- Account Icon -->
            <button id="account-modal-trigger" class="action-btn" aria-label="My Account" title="Account">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="icon-svg">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </button>

            <!-- Shopping Bag Icon -->
            <button id="cart-drawer-trigger" class="action-btn cart-btn" aria-label="Shopping Bag" title="Shopping Bag">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="icon-svg">
                    <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                    <line x1="3" y1="6" x2="21" y2="6"></line>
                    <path d="M16 10a4 4 0 0 1-8 0"></path>
                </svg>
                <span id="header-cart-badge" class="cart-badge">0</span>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Drawer -->
<div id="mobile-menu-drawer" class="mobile-drawer">
    <div class="drawer-backdrop" id="drawer-backdrop"></div>
    <div class="drawer-content">
        <div class="drawer-header">
            <div class="brand-text">
                <span class="brand-title">VEDAMRIT</span>
            </div>
            <button id="mobile-drawer-close" class="drawer-close-btn" aria-label="Close menu">✕</button>
        </div>
        <nav class="drawer-nav">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="drawer-link">Home</a>
            <a href="<?php echo esc_url(home_url('/shop/')); ?>" class="drawer-link">Shop All Botanicals</a>
            <a href="<?php echo esc_url(home_url('/philosophy/')); ?>" class="drawer-link">Our Philosophy</a>
            <a href="<?php echo esc_url(home_url('/ingredients/')); ?>" class="drawer-link">Sacred Ingredients</a>
            <a href="<?php echo esc_url(home_url('/journal/')); ?>" class="drawer-link">Wellness Journal</a>
        </nav>
        <div class="drawer-footer">
            <p class="drawer-quote">Ancient Wisdom. Everyday Wellness.</p>
            <p class="drawer-info">100% Botanical Purity • Made in India</p>
        </div>
    </div>
</div>
