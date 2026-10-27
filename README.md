# VEDAMRIT | Premium Ayurvedic Brand WordPress & WooCommerce Theme

> **Ancient Wisdom. Everyday Wellness.**  
> A luxury, minimalist, nature-inspired WordPress theme and e-commerce experience designed for authentic Indian Ayurvedic brands.

---

## 🌿 Overview

**VEDAMRIT** is a production-grade custom WordPress theme built for client presentations and real-world deployment. It balances 5,000-year-old Vedic principles with contemporary, minimalist digital design.

### Design Principles
- **Nature-Inspired Palette**: Warm ivory (`#FBF9F5`, `#F4EEE3`), deep forest green (`#142E20`, `#1C3C2B`), muted sage (`#67866F`), and warm botanical gold (`#D4A753`).
- **Typography**: Editorial serif headings (`Playfair Display`) paired with clean sans-serif body text (`Plus Jakarta Sans`).
- **High-Definition Imagery**: Clean, real Ayurvedic lifestyle and botanical photography (amber apothecary glass, mortar and pestle, cold-pressed oils, wild-harvested herbs).
- **Ethical Integrity**: Clear disclaimers distinguishing traditional Ayurvedic properties from unsupported medical disease claims.

---

## 📦 What's Included in this Repository

```
├── vedamrit-theme.zip              # Ready-to-upload WordPress Theme Zip Archive
├── docker-compose.yml              # 1-Command Local WordPress + MySQL Stack
├── demo-data/
│   └── demo-content.xml            # WordPress WXR Demo Content Import file
└── wp-content/
    └── themes/
        └── vedamrit/               # Full uncompressed WordPress Theme source
            ├── style.css           # Theme metadata & CSS custom properties
            ├── functions.php       # Enqueues, menus, WooCommerce hooks & catalog
            ├── header.php          # Announcement bar, logo, sticky nav & mobile drawer
            ├── footer.php          # Dispatches newsletter, footer links, modals & cart
            ├── front-page.php      # Full 12-section editorial Homepage
            ├── page-shop.php       # Shop catalog with Dosha, Category & Price filters
            ├── single-product.php  # Detailed product page with gallery & accordions
            ├── page-philosophy.php # Brand story, Doshas explainer & Sourcing standards
            ├── page-ingredients.php# Sacred Botanicals Directory
            ├── index.php           # Wellness Journal listing
            ├── single.php          # Single Journal article layout
            ├── woocommerce.php     # WooCommerce integration wrapper
            ├── assets/
            │   ├── css/main.css    # Responsive luxury Ayurvedic stylesheet
            │   └── js/main.js      # Cart drawer, search, quick view & checkout
```

---

## 🚀 How to Install and Run

### Option 1: Upload Theme to Any Existing WordPress Site (Recommended)
1. In your WordPress Admin Dashboard, navigate to **Appearance > Themes > Add New > Upload Theme**.
2. Click **Choose File** and select [`vedamrit-theme.zip`](file:///Users/kamalnayan/AAURVEDIC/vedamrit-theme.zip).
3. Click **Install Now**, then click **Activate**.
4. *(Optional)* Go to **Tools > Import > WordPress** and upload [`demo-data/demo-content.xml`](file:///Users/kamalnayan/AAURVEDIC/demo-data/demo-content.xml) to import demo pages, categories, and articles.

---

### Option 2: Run Locally via Docker (Zero Configuration)
If you have Docker installed on your computer, run:

```bash
docker compose up -d
```

Open [http://localhost:8080](http://localhost:8080) in your browser:
- Complete the standard 30-second WordPress setup.
- The `vedamrit` theme is already mounted in `wp-content/themes/vedamrit/`.
- In WordPress Admin, navigate to **Appearance > Themes** and click **Activate** on **VEDAMRIT**.

To stop the containers:
```bash
docker compose down
```

---

## ✨ Features & User Journeys

### 1. Homepage (`front-page.php`)
- **Announcement Bar**: Top banner with complimentary shipping highlights and dismiss toggle.
- **Sticky Blur Navigation**: Header with custom botanical leaf symbol, live search trigger, account access modal, and animated cart count badge.
- **Hero Section**: Editorial layout with headline *"Ancient Wisdom. Everyday Wellness."*, supporting copy, and direct collection & philosophy CTAs.
- **Four Trust Highlights**: *Inspired by Ayurveda*, *Thoughtfully Sourced Ingredients*, *Quality-Focused Formulations*, and *Wellness for Everyday Life*.
- **Featured Categories**: 5 visual cards (*Herbal Supplements*, *Hair Care*, *Skin Care*, *Digestive Wellness*, *Daily Wellness Essentials*).
- **Bestselling Products Grid**: 6 classical products with prices in INR, authentic discount badges, star ratings, and direct Add to Cart / Quick-View.
- **Our Philosophy**: Split image-and-text editorial on whole-herb synergy and ethical Indian wild-harvesting.
- **Ingredient Spotlight**: Showcase of 6 revered Indian botanicals (*Amla*, *Neem*, *Tulsi*, *Ashwagandha*, *Aloe Vera*, *Turmeric*) with Sanskrit nomenclature and dosha classifications.
- **Lifestyle Banner**: *"Make Wellness a Daily Ritual"* visual banner.
- **Community Reflections**: Verified purchaser review previews with 5-star ratings and authentic notes.
- **Wellness Journal**: 3 educational articles on Ayurvedic doshas, Dinacharya routines, and whole-herb preparation.
- **Footer**: Newsletter subscription with validation, brand story, catalog links, demo support details, and statutory health disclaimer.

### 2. Shop Catalog (`page-shop.php`)
- **Interactive Multi-Filter Sidebar**: Filter by Category, Dosha constitution (*Vata*, *Pitta*, *Kapha*, *Tridoshic*), and Price slider (₹300 - ₹1,500).
- **Real-Time In-Page Search**: Instant filter by herb or remedy name.
- **Sorting**: Featured, Price: Low to High, Price: High to Low, and Highest Rated.

### 3. Product Detail Page (`single-product.php`)
- **Multi-Image Gallery**: Clickable thumbnail switcher with smooth transitions.
- **Size Selector & Quantity Stepper**: Switch between sizes (e.g. 60 vs 120 capsules, 100ml vs 200ml) with dynamic subtotal recalculation.
- **Action Buttons**: *"Add to Bag"* with toast notifications and *"Instant Checkout"* launching the demo checkout directly.
- **Deep-Dive Accordions**:
  1. Classical Ayurvedic Heritage & Dosha Energetics
  2. Key Botanicals & Full Ingredient Transparency
  3. Suggested Daily Usage & Dinacharya Ritual
  4. Safety Precautions & Healthcare Advisory
  5. Shipping & Return Timelines across India
- **FAQ Accordion & Complementary Products**: Interactive product Q&A and related remedies.

### 4. Cart & Demo Checkout (`footer.php` & `assets/js/main.js`)
- **Persistent State**: Cart items persist in `localStorage` across refreshes.
- **Free Shipping Progress Bar**: Real-time progress meter unlocking free delivery across India on orders over ₹999.
- **Interactive Demo Checkout Modal**: Shipping address inputs, simulated payment options (UPI / QR Code, Cards, Cash on Delivery), and a realistic order confirmation view with simulated Order IDs (e.g. `VED-849201`).
