<?php
/**
 * VEDAMRIT Theme Functions and Definitions
 *
 * @package Vedamrit
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

define('VEDAMRIT_VERSION', '1.0.0');
define('VEDAMRIT_THEME_DIR', get_template_directory());
define('VEDAMRIT_THEME_URI', get_template_directory_uri());

/**
 * Theme Setup
 */
function vedamrit_theme_setup() {
    // Add default title tag support
    add_theme_support('title-tag');

    // Add post thumbnails support
    add_theme_support('post-thumbnails');

    // Add custom logo support
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));

    // Add HTML5 support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // WooCommerce Support
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');

    // Register Navigation Menus
    register_nav_menus(array(
        'primary' => __('Primary Navigation Menu', 'vedamrit'),
        'footer'  => __('Footer Navigation Menu', 'vedamrit'),
    ));
}
add_action('after_setup_theme', 'vedamrit_theme_setup');

/**
 * Enqueue Scripts and Styles
 */
function vedamrit_enqueue_assets() {
    // Enqueue Google Fonts (Playfair Display & Plus Jakarta Sans)
    wp_enqueue_style(
        'vedamrit-google-fonts',
        'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    // Enqueue Theme Stylesheet
    wp_enqueue_style('vedamrit-style', get_stylesheet_uri(), array(), VEDAMRIT_VERSION);

    // Enqueue Main Custom CSS
    wp_enqueue_style(
        'vedamrit-main-css',
        VEDAMRIT_THEME_URI . '/assets/css/main.css',
        array('vedamrit-style'),
        VEDAMRIT_VERSION
    );

    // Enqueue Main JavaScript
    wp_enqueue_script(
        'vedamrit-main-js',
        VEDAMRIT_THEME_URI . '/assets/js/main.js',
        array(),
        VEDAMRIT_VERSION,
        true
    );

    // Pass dynamic data & demo catalog to JavaScript
    wp_localize_script('vedamrit-main-js', 'vedamritData', array(
        'siteUrl'               => home_url('/'),
        'ajaxUrl'               => admin_url('admin-ajax.php'),
        'nonce'                 => wp_create_nonce('vedamrit_nonce'),
        'currency'              => '₹',
        'freeShippingThreshold' => 999,
        'standardShippingFee'   => 99,
        'products'              => vedamrit_get_products(),
        'categories'            => vedamrit_get_categories(),
        'ingredients'           => vedamrit_get_ingredients(),
        'articles'              => vedamrit_get_articles(),
    ));
}
add_action('wp_enqueue_scripts', 'vedamrit_enqueue_assets');

/**
 * Built-in Ayurvedic Product Catalog (Fallback & Standalone Demo)
 */
function vedamrit_get_products() {
    return array(
        array(
            'id'             => 'prod-amla-capsules',
            'slug'           => 'amla-herbal-capsules',
            'name'           => 'Amla Herbal Capsules',
            'sanskrit_name'  => 'Amalaki Rasayana',
            'tagline'        => 'Pure Indian Gooseberry for Daily Cellular Rejuvenation',
            'category'       => 'Herbal Supplements',
            'category_slug'  => 'herbal-supplements',
            'price'          => 599,
            'original_price' => 749,
            'rating'         => 4.9,
            'review_count'   => 142,
            'images'         => array(
                'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&q=80&w=1000',
                'https://images.unsplash.com/photo-1608571423902-eed4a5ad8108?auto=format&fit=crop&q=80&w=1000',
                'https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&q=80&w=1000',
            ),
            'description'    => 'Harvested sustainably from organic Indian wild orchards, our Amla Capsules encapsulate the purest Amalaki (Phyllanthus emblica). Celebrated in Charaka Samhita as the premier Rasayana, Amla is naturally rich in bio-available Vitamin C, bioflavonoids, and polyphenols to support everyday immunity, cellular vitality, and gentle metabolic balance.',
            'sizes'          => array('60 Vegetarian Capsules', '120 Vegetarian Capsules'),
            'default_size'   => '60 Vegetarian Capsules',
            'in_stock'       => true,
            'featured'       => true,
            'is_bestseller'  => true,
            'dosha'          => 'Tridoshic',
            'benefits'       => array(
                'High natural bio-available Vitamin C content',
                'Classical Ayurvedic Rasayana for cellular rejuvenation',
                'Promotes digestive fire (Agni) without creating excess heat',
                'Supports healthy hair, radiant skin, and natural immunity',
            ),
            'key_ingredients' => array(
                array(
                    'name'     => 'Organic Amla Fruit Extract',
                    'sanskrit' => 'Amalaki',
                    'purpose'  => 'Standardized to 45% tannins and bioflavonoids for optimal antioxidant support.',
                ),
                array(
                    'name'     => 'Organic Black Pepper',
                    'sanskrit' => 'Maricha',
                    'purpose'  => 'Added in micro-quantities to naturally enhance gut absorption and nutrient assimilation.',
                ),
            ),
            'full_ingredients' => 'Organic Amla Fruit Extract (Phyllanthus emblica) 500mg, Organic Pippali/Maricha (Piper nigrum) 10mg, Plant cellulose capsule (Hypromellose). Zero fillers, gluten-free, 100% vegan.',
            'directions'      => array(
                'Take 1 to 2 capsules daily after meals with warm water or lukewarm milk.',
                'Best taken consistently in the morning for sustained vitality throughout the day.',
            ),
            'safety_precautions' => array(
                'Store in a cool, dry place away from direct sunlight.',
                'Not intended to diagnose, treat, cure, or prevent any medical condition.',
                'Pregnant or nursing mothers, and individuals on blood-thinners should consult a qualified Ayurvedic or medical practitioner prior to use.',
            ),
            'faqs'            => array(
                array(
                    'question' => 'How is this different from synthetic Vitamin C (Ascorbic acid)?',
                    'answer'   => 'Unlike synthetic ascorbic acid synthesized in laboratories, our Amla capsules deliver whole-food Vitamin C naturally bonded with bioflavonoids, tannins, and minerals, resulting in superior biological absorption and gentle digestion.',
                ),
                array(
                    'question' => 'Which Dosha does Amla balance?',
                    'answer'   => 'Amla is unique in Ayurveda because it pacifies all three doshas (Vata, Pitta, and Kapha), with exceptional soothing properties for Pitta due to its cooling energetic post-digestive effect.',
                ),
            ),
        ),
        array(
            'id'             => 'prod-neem-face-cleanser',
            'slug'           => 'neem-face-cleanser',
            'name'           => 'Neem Clarifying Botanical Cleanser',
            'sanskrit_name'  => 'Nimba Shodhan',
            'tagline'        => 'Gentle Purifying Botanical Wash with Vetiver & Pure Tea Tree',
            'category'       => 'Skin Care',
            'category_slug'  => 'skin-care',
            'price'          => 449,
            'original_price' => 499,
            'rating'         => 4.8,
            'review_count'   => 98,
            'images'         => array(
                'https://images.unsplash.com/photo-1556228720-195a672e8a03?auto=format&fit=crop&q=80&w=1000',
                'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&q=80&w=1000',
                'https://images.unsplash.com/photo-1608248597359-216a693c0616?auto=format&fit=crop&q=80&w=1000',
            ),
            'description'    => 'Formulated in an artisan base of steam-distilled Vetiver water and fresh wild Neem leaf extract, this mild gel cleanser removes atmospheric pollutants and excess sebum without stripping your skin’s natural lipid barrier. Cold-pressed neem leaves deliver age-old purifying benefits to balance blemish-prone and oily skin types.',
            'sizes'          => array('150 ml', '250 ml'),
            'default_size'   => '150 ml',
            'in_stock'       => true,
            'featured'       => true,
            'is_bestseller'  => true,
            'dosha'          => 'Pitta',
            'benefits'       => array(
                'Deeply cleanses pores without tightness or dryness',
                'Soothes irritated, congested, and acne-prone skin',
                'Balances excess sebum secretion through natural astringency',
                'Infused with steam-distilled Vetiver (Khus) for a grounding herbal aroma',
            ),
            'key_ingredients' => array(
                array(
                    'name'     => 'Wild Neem Leaf Extract',
                    'sanskrit' => 'Nimba',
                    'purpose'  => 'Naturally clarifies and balances microbes while soothing epidermal inflammation.',
                ),
                array(
                    'name'     => 'Vetiver Root Hydrosol',
                    'sanskrit' => 'Ushira',
                    'purpose'  => 'Provides gentle cooling hydration and minimizes the appearance of enlarged pores.',
                ),
            ),
            'full_ingredients' => 'Aqua, Vetiveria Zizanioides Floral Water, Aloe Barbadensis Leaf Juice*, Coco-Glucoside, Azadirachta Indica Leaf Extract, Glycerin, Melaleuca Alternifolia Oil, Citric Acid, Potassium Sorbate.',
            'directions'      => array(
                'Dampen face and neck with lukewarm water.',
                'Dispense 1-2 pumps onto palms, create a gentle lather, and massage in upward circular motions for 45-60 seconds.',
                'Rinse thoroughly and pat dry with a soft clean towel.',
            ),
            'safety_precautions' => array(
                'For external cosmetic use only.',
                'Perform a 24-hour patch test inside the elbow before first facial application.',
            ),
            'faqs'            => array(
                array(
                    'question' => 'Will this make my skin feel dry or tight?',
                    'answer'   => 'No. Our formula uses ultra-mild coconut-derived surfactants paired with aloe juice, leaving your skin soft, calm, and balanced.',
                ),
            ),
        ),
        array(
            'id'             => 'prod-herbal-hair-oil',
            'slug'           => 'herbal-hair-oil',
            'name'           => 'Keshya Botanical Hair Oil',
            'sanskrit_name'  => 'Bhringraj & Brahmi Tailam',
            'tagline'        => 'Classical Slow-Cooked Sesame Elixir for Scalp Health & Lustrous Strands',
            'category'       => 'Hair Care',
            'category_slug'  => 'hair-care',
            'price'          => 649,
            'original_price' => 799,
            'rating'         => 4.9,
            'review_count'   => 215,
            'images'         => array(
                'https://images.unsplash.com/photo-1608248597359-216a693c0616?auto=format&fit=crop&q=80&w=1000',
                'https://images.unsplash.com/photo-1617897903246-719242758050?auto=format&fit=crop&q=80&w=1000',
                'https://images.unsplash.com/photo-1508746829417-e6f548d8d6ed?auto=format&fit=crop&q=80&w=1000',
            ),
            'description'    => 'Prepared following the venerable Sneha Pak Vidhi (traditional slow-cooking herbal infusion), this potent hair oil combines fresh Bhringraj ("King of Hair") and Brahmi in cold-pressed black sesame oil and virgin coconut oil. It promotes micro-circulation at the follicles, cools mental tension (Shiro Abhyanga), and restores natural hair shine.',
            'sizes'          => array('100 ml', '200 ml'),
            'default_size'   => '200 ml',
            'in_stock'       => true,
            'featured'       => true,
            'is_bestseller'  => true,
            'dosha'          => 'Tridoshic',
            'benefits'       => array(
                'Deeply nourishes roots and hair follicles from scalp level',
                'Relieves everyday stress and calms an overactive mind during head massage',
                'Tames flyaways, prevents split ends, and revives lacklustre strands',
                '100% natural, unrefined herbal infusion with zero mineral oils or silicones',
            ),
            'key_ingredients' => array(
                array(
                    'name'     => 'Bhringraj Herb',
                    'sanskrit' => 'Eclipta Alba',
                    'purpose'  => 'Celebrated in classical Ayurveda for promoting lush hair growth and deep natural color.',
                ),
                array(
                    'name'     => 'Brahmi Leaves',
                    'sanskrit' => 'Bacopa Monnieri',
                    'purpose'  => 'Provides cooling calm to the scalp, relieving thermal buildup and scalp itchiness.',
                ),
            ),
            'full_ingredients' => 'Sesamum Indicum Seed Oil*, Cocos Nucifera Oil*, Eclipta Alba Extract, Bacopa Monnieri Extract, Emblica Officinalis Extract, Hibiscus Flower Extract. *Cold Pressed.',
            'directions'      => array(
                'Warm a small quantity of oil between your palms.',
                'Part hair in sections and gently massage onto scalp for 10-15 minutes.',
                'Leave on for at least 1-2 hours or overnight before washing.',
            ),
            'safety_precautions' => array(
                'For topical scalp and hair use only.',
                'Shake lightly before each use as natural herbal micro-sediments settle naturally.',
            ),
            'faqs'            => array(
                array(
                    'question' => 'Does this oil contain artificial fragrance or mineral oil?',
                    'answer'   => 'Absolutely not. Every single drop comes from whole herbal extracts, pure cold-pressed seeds, and natural essential botanicals.',
                ),
            ),
        ),
        array(
            'id'             => 'prod-aloe-vera-gel',
            'slug'           => 'aloe-vera-gel',
            'name'           => 'Pure Soothing Aloe Vera Gel',
            'sanskrit_name'  => 'Kumari Prasadan',
            'tagline'        => '99% Cold-Extracted Inner Leaf Gel with Rose Water & Cucumber',
            'category'       => 'Skin Care',
            'category_slug'  => 'skin-care',
            'price'          => 399,
            'original_price' => 450,
            'rating'         => 4.8,
            'review_count'   => 110,
            'images'         => array(
                'https://images.unsplash.com/photo-1512290900672-1f5574044a79?auto=format&fit=crop&q=80&w=1000',
                'https://images.unsplash.com/photo-1616683693504-3ea7e9ad6fec?auto=format&fit=crop&q=80&w=1000',
                'https://images.unsplash.com/photo-1563178406-4cdc2923acbc?auto=format&fit=crop&q=80&w=1000',
            ),
            'description'    => 'Hand-filleted from mature organically cultivated Indian Aloe Vera (Kumari) plants, our lightweight soothing gel delivers instant, weightless hydration. Enriched with pure steam-distilled Kannauj Rose Water and cooling cucumber juice, it soothes sun exposure, hydrates parched skin, and doubles as an exceptional lightweight hair styling gel.',
            'sizes'          => array('200 g', '400 g'),
            'default_size'   => '200 g',
            'in_stock'       => true,
            'featured'       => true,
            'is_bestseller'  => true,
            'dosha'          => 'Pitta',
            'benefits'       => array(
                'Instantly calms sunburn, razor irritation, and redness',
                'Ultra-light, non-sticky hydration suitable for all weather conditions',
                'Multipurpose: works as day moisturizer, sleeping mask, or scalp soother',
                'Free from artificial green colorants, alcohol, and petroleum derivatives',
            ),
            'key_ingredients' => array(
                array(
                    'name'     => 'Organic Aloe Vera Inner Gel',
                    'sanskrit' => 'Kumari',
                    'purpose'  => 'Delivers essential polysaccharides, amino acids, and minerals for rapid skin recovery.',
                ),
            ),
            'full_ingredients' => 'Aloe Barbadensis Leaf Juice (99% pure inner leaf)*, Rosa Damascena Flower Water, Cucumis Sativus Extract, Plant Glycerin, Xanthan Gum, Potassium Sorbate.',
            'directions'      => array(
                'Apply generously to clean face, body, or scalp as needed.',
                'Can be chilled in the refrigerator for an ultra-refreshing summer cooling mask.',
            ),
            'safety_precautions' => array(
                'For external cosmetic use only.',
                'Store in a cool place away from direct sunlight.',
            ),
            'faqs'            => array(
                array(
                    'question' => 'Why is the gel translucent rather than bright green?',
                    'answer'   => 'Real aloe inner leaf gel is naturally clear and translucent! Commercial products that appear neon green have synthetic dyes added. We keep our gel 100% natural.',
                ),
            ),
        ),
        array(
            'id'             => 'prod-triphala-powder',
            'slug'           => 'triphala-powder',
            'name'           => 'Triphala Digestive Churna',
            'sanskrit_name'  => 'Triphala Churna (Three Fruits)',
            'tagline'        => 'Balanced Blend of Amalaki, Haritaki, and Bibhitaki for Gut Harmony',
            'category'       => 'Digestive Wellness',
            'category_slug'  => 'digestive-wellness',
            'price'          => 349,
            'original_price' => 399,
            'rating'         => 4.9,
            'review_count'   => 167,
            'images'         => array(
                'https://images.unsplash.com/photo-1596755389378-c31d21fd1273?auto=format&fit=crop&q=80&w=1000',
                'https://images.unsplash.com/photo-1608571423902-eed4a5ad8108?auto=format&fit=crop&q=80&w=1000',
                'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&q=80&w=1000',
            ),
            'description'    => 'Triphala is arguably the most revered daily herbal formulation in the Vedic tradition. Consisting of equal measures of Amalaki (Emblica officinalis), Haritaki (Terminalia chebula), and Bibhitaki (Terminalia bellirica), this gentle, non-habit-forming digestive powder tones the gastrointestinal tract, supports healthy daily elimination, and nurtures healthy gut flora.',
            'sizes'          => array('100 g', '250 g'),
            'default_size'   => '100 g',
            'in_stock'       => true,
            'featured'       => true,
            'is_bestseller'  => true,
            'dosha'          => 'Tridoshic',
            'benefits'       => array(
                'Gently promotes regular, natural bowel movements without cramping',
                'Supports optimal nutrient assimilation and gut microbiome balance',
                'Traditional Ayurvedic detoxifier (Shodhana) that is gentle for long-term use',
                'Contains five of the six traditional Ayurvedic tastes (shad-rasa)',
            ),
            'key_ingredients' => array(
                array(
                    'name'     => 'Haritaki',
                    'sanskrit' => 'Terminalia Chebula',
                    'purpose'  => 'Vata-balancing, supports natural tone of the digestive tract.',
                ),
            ),
            'full_ingredients' => '100% Certified Organic powder of Emblica officinalis fruit (Amalaki)*, Terminalia chebula fruit (Haritaki)*, and Terminalia bellirica fruit (Bibhitaki)* (1:1:1).',
            'directions'      => array(
                'Mix 1/2 to 1 teaspoon in a glass of warm water.',
                'Stir well, and drink 30 minutes before sleep or first thing in the morning.',
            ),
            'safety_precautions' => array(
                'Not recommended during pregnancy or for individuals experiencing acute diarrhea.',
            ),
            'faqs'            => array(
                array(
                    'question' => 'Is Triphala habit-forming like synthetic laxatives?',
                    'answer'   => 'No. Triphala is not an aggressive irritant laxative. It is a nutritional bowel toner that strengthens digestive rhythm over time.',
                ),
            ),
        ),
        array(
            'id'             => 'prod-ashwagandha-capsules',
            'slug'           => 'ashwagandha-capsules',
            'name'           => 'Ashwagandha Vitality Capsules',
            'sanskrit_name'  => 'Medhya Rasayana KSM-66',
            'tagline'        => 'Standardized Full-Spectrum Root Extract for Stress Resilience & Restful Sleep',
            'category'       => 'Herbal Supplements',
            'category_slug'  => 'herbal-supplements',
            'price'          => 699,
            'original_price' => 850,
            'rating'         => 4.9,
            'review_count'   => 310,
            'images'         => array(
                'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&q=80&w=1000',
                'https://images.unsplash.com/photo-1608571423902-eed4a5ad8108?auto=format&fit=crop&q=80&w=1000',
                'https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&q=80&w=1000',
            ),
            'description'    => 'Harnessing organic Withania somnifera roots cultivated in the semi-arid soils of Madhya Pradesh, our Ashwagandha capsules deliver pure adaptogenic support. Prized in Ayurveda as a premier Balya (strength-giver) and Medhya Rasayana (clarity and calm), it assists the body in adapting to psychological and physical stressors, stabilizing evening cortisol, and promoting deeper slumber.',
            'sizes'          => array('60 Vegetarian Capsules', '120 Vegetarian Capsules'),
            'default_size'   => '60 Vegetarian Capsules',
            'in_stock'       => true,
            'featured'       => true,
            'is_bestseller'  => true,
            'dosha'          => 'Vata',
            'benefits'       => array(
                'Promotes calm focus and resistance to everyday mental stress',
                'Encourages deeper, more restorative non-REM sleep cycles',
                'Supports physical endurance, stamina, and muscular vitality (Ojas)',
                '100% root extract with minimum 5% withanolides; no aerial parts used',
            ),
            'key_ingredients' => array(
                array(
                    'name'     => 'Standardized Ashwagandha Root Extract',
                    'sanskrit' => 'Withania Somnifera',
                    'purpose'  => 'Provides full-spectrum withanolides without chemical solvent residues.',
                ),
            ),
            'full_ingredients' => 'Standardized Organic Ashwagandha Root Extract 600mg, Piper Longum Extract 10mg, Plant Cellulose Capsule (HPMC). Zero artificial binders.',
            'directions'      => array(
                'Take 1 capsule twice daily with meals or warm milk before bedtime.',
            ),
            'safety_precautions' => array(
                'If you are pregnant, nursing, or have a thyroid condition, consult your physician before taking adaptogens.',
            ),
            'faqs'            => array(
                array(
                    'question' => 'When is the best time of day to take Ashwagandha?',
                    'answer'   => 'Many take one capsule with breakfast for daytime stress resilience, and one with dinner or warm milk for restorative night rest.',
                ),
            ),
        ),
        array(
            'id'             => 'prod-tulsi-drops',
            'slug'           => 'tulsi-holy-basil-drops',
            'name'           => 'Tulsi Holy Basil Drops',
            'sanskrit_name'  => 'Surasa Prana Arka',
            'tagline'        => 'Liquid Botanical Extract of Rama, Krishna, and Vana Tulsi for Prana & Immunity',
            'category'       => 'Daily Wellness Essentials',
            'category_slug'  => 'daily-wellness-essentials',
            'price'          => 299,
            'original_price' => 350,
            'rating'         => 4.8,
            'review_count'   => 76,
            'images'         => array(
                'https://images.unsplash.com/photo-1601056441527-e43594191630?auto=format&fit=crop&q=80&w=1000',
                'https://images.unsplash.com/photo-1608248597359-216a693c0616?auto=format&fit=crop&q=80&w=1000',
                'https://images.unsplash.com/photo-1508746829417-e6f548d8d6ed?auto=format&fit=crop&q=80&w=1000',
            ),
            'description'    => 'Known as the "Queen of Herbs," Holy Basil (Tulsi) has been cultivated outside Indian households for centuries for its protective, purifying spiritual and biological properties. Our liquid drops concentrate the hydro-steam extracts of three unique species—Rama, Krishna, and wild Vana Tulsi—to clear the respiratory passage, support respiratory comfort, and uplift mental clarity.',
            'sizes'          => array('30 ml', '60 ml'),
            'default_size'   => '30 ml',
            'in_stock'       => true,
            'featured'       => false,
            'is_bestseller'  => false,
            'dosha'          => 'Kapha',
            'benefits'       => array(
                'Quick and easy to add into warm water, herbal teas, or morning smoothies',
                'Supports healthy respiratory comfort and seasonal defense',
                'Relieves atmospheric congestion and balances heavy Kapha tendencies',
            ),
            'key_ingredients' => array(
                array(
                    'name'     => 'Triple Tulsi Extract',
                    'sanskrit' => 'Ocimum Sanctum (Surasa)',
                    'purpose'  => 'Synergistic hydro-steam extraction of three indigenous basil varieties.',
                ),
            ),
            'full_ingredients' => 'Steam Distilled Extract of Rama Tulsi, Krishna Tulsi, Vana Tulsi in Deionized Water with USP Grade Plant Glycerin. Alcohol-free.',
            'directions'      => array(
                'Add 4 to 5 drops to a cup of warm water, green tea, or warm milk.',
            ),
            'safety_precautions' => array(
                'Consult a healthcare provider before using if you are taking blood thinning medications.',
            ),
            'faqs'            => array(
                array(
                    'question' => 'Does this contain alcohol?',
                    'answer'   => 'No, our Tulsi drops are water-and-vegetable-glycerin extracted, entirely free of alcohol.',
                ),
            ),
        ),
        array(
            'id'             => 'prod-kumkumadi-oil',
            'slug'           => 'kumkumadi-rejuvenating-oil',
            'name'           => 'Kumkumadi Miraculous Radiant Oil',
            'sanskrit_name'  => 'Kumkumadi Tailam',
            'tagline'        => 'Authentic 26-Herb Kashmiri Saffron Infusion for Youthful Luminosity',
            'category'       => 'Skin Care',
            'category_slug'  => 'skin-care',
            'price'          => 1199,
            'original_price' => 1499,
            'rating'         => 5.0,
            'review_count'   => 184,
            'images'         => array(
                'https://images.unsplash.com/photo-1617897903246-719242758050?auto=format&fit=crop&q=80&w=1000',
                'https://images.unsplash.com/photo-1620916566398-39f1143ab7be?auto=format&fit=crop&q=80&w=1000',
                'https://images.unsplash.com/photo-1608248597359-216a693c0616?auto=format&fit=crop&q=80&w=1000',
            ),
            'description'    => 'Regarded as the crowning jewel of Ayurvedic cosmetology, Kumkumadi Tailam is an opulent, slow-decocted beauty nectar. Blended with grade-A Kashmiri saffron stamens (Kumkuma), Indian Sandalwood, Lotus pollen, and 23 sacred botanical roots in cold-pressed sesame oil and goat milk, it bestows a gilded, lit-from-within complexion and diminishes fine discoloration.',
            'sizes'          => array('15 ml', '30 ml'),
            'default_size'   => '30 ml',
            'in_stock'       => true,
            'featured'       => false,
            'is_bestseller'  => true,
            'dosha'          => 'Tridoshic',
            'benefits'       => array(
                'Restores luminous natural glow and brightens dull, tired skin',
                'Helps diminish the appearance of dark spots, pigmentation, and fine lines',
                'Luxurious, non-greasy absorption that imparts deep cellular moisture',
            ),
            'key_ingredients' => array(
                array(
                    'name'     => 'Kashmiri Saffron',
                    'sanskrit' => 'Kumkuma',
                    'purpose'  => 'Renowned for imparting radiant golden complexion and evening skin tone.',
                ),
            ),
            'full_ingredients' => 'Sesamum Indicum Seed Oil*, Crocus Sativus Stigmas, Red Sandalwood, Lotus Flower, Vetiver Root, Manjistha, Licorice, Goat Milk. *Cold Pressed.',
            'directions'      => array(
                'After cleansing, take 3 to 4 drops on your fingertips and gently press onto damp face and neck.',
            ),
            'safety_precautions' => array(
                'For external beauty application only.',
            ),
            'faqs'            => array(
                array(
                    'question' => 'Can I use this oil if I have oily skin?',
                    'answer'   => 'Yes! For oily skin, use only 1-2 drops onto damp skin before bed.',
                ),
            ),
        ),
    );
}

/**
 * Built-in Categories Data
 */
function vedamrit_get_categories() {
    return array(
        array(
            'id'          => 'cat-supplements',
            'slug'        => 'herbal-supplements',
            'name'        => 'Herbal Supplements',
            'description' => 'Concentrated classical herbs to sustain vitality, immunity, and natural inner resilience.',
            'image'       => 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&q=80&w=800',
        ),
        array(
            'id'          => 'cat-hair-care',
            'slug'        => 'hair-care',
            'name'        => 'Hair Care',
            'description' => 'Time-honored botanical oils and herbal infusions to nourish roots and promote lustrous lengths.',
            'image'       => 'https://images.unsplash.com/photo-1608248597359-216a693c0616?auto=format&fit=crop&q=80&w=800',
        ),
        array(
            'id'          => 'cat-skin-care',
            'slug'        => 'skin-care',
            'name'        => 'Skin Care',
            'description' => 'Pure Ayurvedic botanicals, hydrosols, and therapeutic oils for a nourished, balanced glow.',
            'image'       => 'https://images.unsplash.com/photo-1556228720-195a672e8a03?auto=format&fit=crop&q=80&w=800',
        ),
        array(
            'id'          => 'cat-digestive',
            'slug'        => 'digestive-wellness',
            'name'        => 'Digestive Wellness',
            'description' => 'Support your inner digestive fire (Agni) with classical churna blends and gut tonics.',
            'image'       => 'https://images.unsplash.com/photo-1596755389378-c31d21fd1273?auto=format&fit=crop&q=80&w=800',
        ),
        array(
            'id'          => 'cat-daily-essentials',
            'slug'        => 'daily-wellness-essentials',
            'name'        => 'Daily Wellness Essentials',
            'description' => 'Simple, pure herbal remedies designed to weave the harmony of Ayurveda into modern daily life.',
            'image'       => 'https://images.unsplash.com/photo-1601056441527-e43594191630?auto=format&fit=crop&q=80&w=800',
        ),
    );
}

/**
 * Built-in Sacred Ingredients Spotlight
 */
function vedamrit_get_ingredients() {
    return array(
        array(
            'id'             => 'ing-amla',
            'name'           => 'Amla (Indian Gooseberry)',
            'sanskrit_name'  => 'Amalaki',
            'botanical_name' => 'Phyllanthus emblica',
            'traditional_use'=> 'Revered as a prime Rasayana (rejuvenator) and cooling tonic for Pitta balance.',
            'dosha_impact'   => 'Tridoshic (Balances Vata, Pitta, and Kapha)',
            'description'    => 'Traditionally celebrated in classical Ayurvedic texts for supporting longevity, healthy digestion, and radiant complexion. Modern nutritional research notes that Amla is exceptionally concentrated in natural Vitamin C and polyphenols.',
            'image'          => 'https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&q=80&w=800',
            'product_slugs'  => array('amla-herbal-capsules', 'triphala-powder', 'herbal-hair-oil'),
        ),
        array(
            'id'             => 'ing-neem',
            'name'           => 'Neem (Indian Lilac)',
            'sanskrit_name'  => 'Nimba',
            'botanical_name' => 'Azadirachta indica',
            'traditional_use'=> 'Traditional bitter herb used for blood purification (Rakta Shodhana) and skin cooling.',
            'dosha_impact'   => 'Pacifies Pitta & Kapha',
            'description'    => 'Known historically as the "village dispensary," Neem is celebrated for its bitter, cooling properties that clear metabolic heat and promote clear, comfortable skin.',
            'image'          => 'https://images.unsplash.com/photo-1556228720-195a672e8a03?auto=format&fit=crop&q=80&w=800',
            'product_slugs'  => array('neem-face-cleanser'),
        ),
        array(
            'id'             => 'ing-tulsi',
            'name'           => 'Tulsi (Holy Basil)',
            'sanskrit_name'  => 'Surasa / Tulasi',
            'botanical_name' => 'Ocimum sanctum',
            'traditional_use'=> 'Sacred adaptogen revered for opening respiratory prana and soothing the spirit.',
            'dosha_impact'   => 'Pacifies Kapha & Vata',
            'description'    => 'Worshipped as an auspicious life-affirming plant across India, Tulsi is traditionally brewed to ease respiratory congestion, support clear breathing, and clear mental fog.',
            'image'          => 'https://images.unsplash.com/photo-1601056441527-e43594191630?auto=format&fit=crop&q=80&w=800',
            'product_slugs'  => array('tulsi-holy-basil-drops'),
        ),
        array(
            'id'             => 'ing-ashwagandha',
            'name'           => 'Ashwagandha (Indian Ginseng)',
            'sanskrit_name'  => 'Ashwagandha',
            'botanical_name' => 'Withania somnifera',
            'traditional_use'=> 'Nourishing adaptogen (Balya) traditionally used to build vitality (Ojas) and calm mental agitation.',
            'dosha_impact'   => 'Pacifies Vata & Kapha',
            'description'    => 'A cornerstone of traditional rejuvenation therapies, Ashwagandha root has supported physical stamina, groundedness, and restful slumber for millennia.',
            'image'          => 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&q=80&w=800',
            'product_slugs'  => array('ashwagandha-capsules'),
        ),
        array(
            'id'             => 'ing-aloe-vera',
            'name'           => 'Aloe Vera',
            'sanskrit_name'  => 'Kumari',
            'botanical_name' => 'Aloe barbadensis',
            'traditional_use'=> 'Cooling, soothing succulent used to calm Pitta fire in the skin and digestive tract.',
            'dosha_impact'   => 'Pacifies Pitta; neutral for Kapha and Vata',
            'description'    => 'In Sanskrit, Kumari translates to "youthful maiden," referring to its traditional capacity to sustain vitality and youthful moisture in the skin.',
            'image'          => 'https://images.unsplash.com/photo-1563178406-4cdc2923acbc?auto=format&fit=crop&q=80&w=800',
            'product_slugs'  => array('aloe-vera-gel', 'neem-face-cleanser'),
        ),
        array(
            'id'             => 'ing-turmeric',
            'name'           => 'Turmeric (Golden Root)',
            'sanskrit_name'  => 'Haridra',
            'botanical_name' => 'Curcuma longa',
            'traditional_use'=> 'The sacred golden spice used for warming digestive fire, joint ease, and skin radiance.',
            'dosha_impact'   => 'Tridoshic (balances all three doshas in moderation)',
            'description'    => 'Haridra holds a sacred place in Ayurvedic rituals, cooking, and apothecary traditions for its bright yellow vitality and clarifying warmth.',
            'image'          => 'https://images.unsplash.com/photo-1615397349754-cfa2066a298e?auto=format&fit=crop&q=80&w=800',
            'product_slugs'  => array('kumkumadi-rejuvenating-oil'),
        ),
    );
}

/**
 * Built-in Journal Articles
 */
function vedamrit_get_articles() {
    return array(
        array(
            'id'       => 'art-ayurveda-basics',
            'slug'     => 'understanding-basics-of-ayurveda',
            'title'    => 'Understanding the Basics of Ayurveda: The Three Doshas Explained',
            'excerpt'  => 'Ayurveda views every individual as a unique blend of nature’s five fundamental elements. Discover your dominant constitutional energies—Vata, Pitta, and Kapha.',
            'author'   => 'Dr. Ananya Sharma',
            'date'     => 'October 12, 2026',
            'read_time'=> '6 min read',
            'category' => 'Ayurvedic Philosophy',
            'image'    => 'https://images.unsplash.com/photo-1506126613408-eca07ce68773?auto=format&fit=crop&q=80&w=800',
            'content'  => array(
                'Ayurveda, which translates from Sanskrit as "the science of life" (Ayu = life, Veda = knowledge), is an over 5,000-year-old healing tradition originating in the Indian subcontinent. Rather than viewing the human body as an isolated machine, Ayurveda perceives us as an inseparable microcosm of the natural world.',
                'At the core of this wisdom lies the Panchamahabhutas—the five great elements: Space (Akasha), Air (Vayu), Fire (Agni), Water (Jala), and Earth (Prithvi). In living organisms, these elements coalesce into three functional governing bio-energies known as Doshas: Vata, Pitta, and Kapha.',
                'Vata governs motion, circulation, nervous system impulses, and breath. Composed of Air and Space, Vata energy is light, dry, cold, and mobile. When balanced, it fosters creativity and enthusiasm; when aggravated, it can manifest as restless anxiety and dry skin.',
                'Pitta embodies metabolic transformation and digestion. Formed from Fire and Water, Pitta is hot, sharp, and penetrating. It regulates our internal body temperature and nutrient breakdown.',
                'Kapha provides physical stability, lubrication, and endurance. Composed of Earth and Water, Kapha is cool, heavy, and steady. It cushions our joints and maintains hydration.',
            ),
        ),
        array(
            'id'       => 'art-daily-routine',
            'slug'     => 'building-simple-daily-wellness-routine',
            'title'    => 'Building a Simple Daily Wellness Routine (Dinacharya)',
            'excerpt'  => 'How synchronizing your daily rhythm with natural solar cycles can transform your energy, digestion, and mental peace without overwhelming your modern schedule.',
            'author'   => 'Devika Nair',
            'date'     => 'October 18, 2026',
            'read_time'=> '5 min read',
            'category' => 'Daily Rituals',
            'image'    => 'https://images.unsplash.com/photo-1515377905703-c4788e51af15?auto=format&fit=crop&q=80&w=800',
            'content'  => array(
                'In our hyper-connected, round-the-clock world, our internal circadian rhythms frequently fall out of step with natural diurnal cycles. The ancient Ayurvedic practice of Dinacharya (daily routine) offers a grounded blueprint for living in harmony with nature’s cadence.',
                '1. Mindful Awakening: Awaken ideally just before sunrise (Brahma Muhurta), when the environment is tranquil and dominated by light, pure Sattvic energy.',
                '2. Warm Hydration: Before tea or coffee, drink a tall glass of warm water, optionally with a drop of Tulsi, to awaken sluggish digestion and flush morning toxins (Ama).',
                '3. Oral Cleansing: Scrape your tongue using a copper tongue cleaner to remove the coating accumulated overnight.',
                '4. Self-Massage (Abhyanga): Spend 5 to 10 minutes applying warm herbal sesame oil to your limbs moving toward the heart.',
            ),
        ),
        array(
            'id'       => 'art-ayurvedic-ingredients',
            'slug'     => 'beginners-guide-to-ayurvedic-ingredients',
            'title'    => 'A Beginner’s Guide to Ayurvedic Ingredients: Sourcing, Purity & Wisdom',
            'excerpt'  => 'From adaptogenic Ashwagandha to the balancing power of Triphala, learn how authentic whole-plant botanicals work gently with your body over time.',
            'author'   => 'Vikramaditya Sen',
            'date'     => 'October 22, 2026',
            'read_time'=> '7 min read',
            'category' => 'Herbal Wisdom',
            'image'    => 'https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&q=80&w=800',
            'content'  => array(
                'Walking down modern wellness aisles, one is bombarded by isolated chemical compounds and mega-dose synthetic vitamins. In contrast, Ayurveda has championed whole-spectrum herbal wisdom for millennia.',
                'Why does whole-plant preparation matter? In nature, active phytochemicals never exist in isolation. In Amla, Vitamin C is naturally buffered by complex bioflavonoids and tannins.',
                'When selecting Ayurvedic supplements, prioritize transparency: look for wild-crafted or sustainably cultivated whole herbs and clean extraction methods.',
            ),
        ),
    );
}
