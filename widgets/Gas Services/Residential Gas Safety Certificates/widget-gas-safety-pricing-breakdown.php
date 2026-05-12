<?php
/**
 * Widget: Gas Safety – Pricing Breakdown Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Gas_Safety_Pricing_Breakdown extends \Elementor\Widget_Base {

    /* ── Identity ─────────────────────────────────────────────────────── */

    public function get_name()       { return 'hte-gas-safety-pricing-breakdown'; }
    public function get_title()      { return __( 'HTE – Gas Safety Pricing Breakdown', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-price-list'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'pricing', 'breakdown', 'fees', 'quote', 'gas', 'safety' ]; }

    /* ── Controls ─────────────────────────────────────────────────────── */

    protected function register_controls() {

        /* ── Header ── */
        $this->start_controls_section( 'sec_header', [
            'label' => __( 'Section Header', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Pricing Breakdown', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Understanding Your Quote', 'html-to-elementor' ),
            ] );

            $this->add_control( 'subheading', [
                'label'   => __( 'Sub-Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Transparent pricing with no surprises. Here is how we calculate your London rate.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Cards ── */
        $this->start_controls_section( 'sec_cards', [
            'label' => __( 'Breakdown Cards', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'card_icon', [
                'label'   => __( 'Lucide Icon Name', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'flame',
            ] );

            $repeater->add_control( 'card_icon_color', [
                'label'   => __( 'Icon Color Class', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'text-electric',
            ] );

            $repeater->add_control( 'card_icon_bg', [
                'label'   => __( 'Icon BG Class', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'bg-electric/10',
            ] );

            $repeater->add_control( 'card_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Appliance Count', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'card_desc', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Each gas-fired unit (Boiler, Fire, Hob, Oven) requires a dedicated safety report.', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'card_is_cta', [
                'label'        => __( 'Is CTA Card (Dark)?', 'html-to-elementor' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'html-to-elementor' ),
                'label_off'    => __( 'No', 'html-to-elementor' ),
                'return_value' => 'yes',
                'default'      => '',
            ] );

            $repeater->add_control( 'card_cta_text', [
                'label'     => __( 'CTA Link Text', 'html-to-elementor' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __( 'Get Portfolio Rates', 'html-to-elementor' ),
                'condition' => [ 'card_is_cta' => 'yes' ],
            ] );

            $repeater->add_control( 'card_cta_link', [
                'label'     => __( 'CTA Link URL', 'html-to-elementor' ),
                'type'      => \Elementor\Controls_Manager::URL,
                'default'   => [ 'url' => 'tel:02081455369' ],
                'condition' => [ 'card_is_cta' => 'yes' ],
            ] );

            $this->add_control( 'breakdown_cards', [
                'label'       => __( 'Cards', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'card_icon' => 'flame',        'card_icon_color' => 'text-electric', 'card_icon_bg' => 'bg-electric/10', 'card_title' => 'Appliance Count',    'card_desc' => "Each gas-fired unit (Boiler, Fire, Hob, Oven) requires a dedicated safety report. Most London homes have 2 (Boiler + Hob). Our base price covers the first major appliance.", 'card_is_cta' => '' ],
                    [ 'card_icon' => 'map-pin',      'card_icon_color' => 'text-safety',   'card_icon_bg' => 'bg-safety/10',   'card_title' => 'Zero Travel Fees',   'card_desc' => "We don't charge for travel time, congestion charges, or parking within the M25 boundary. The price you see is the price you pay, all-inclusive of logistics.", 'card_is_cta' => '' ],
                    [ 'card_icon' => 'calendar',     'card_icon_color' => 'text-orange',   'card_icon_bg' => 'bg-orange/10',   'card_title' => 'Urgent Booking',     'card_desc' => 'Need it today? Emergency same-day certificates may incur a small priority fee, typically starting from £20 extra for immediate response and dispatch.', 'card_is_cta' => '' ],
                    [ 'card_icon' => 'key',          'card_icon_color' => 'text-navy',     'card_icon_bg' => 'bg-navy/5',      'card_title' => 'Key Collection',     'card_desc' => 'We can collect keys from local estate agents within 2 miles of the property for a small £15 admin fee, perfect for busy landlords and property managers.', 'card_is_cta' => '' ],
                    [ 'card_icon' => 'building-2',   'card_icon_color' => 'text-safety',   'card_icon_bg' => 'bg-safety/10',   'card_title' => 'Commercial Service', 'card_desc' => 'Larger commercial kitchens, restaurants, or properties with multiple meters require specialist quotes. We provide bespoke rates for commercial portfolios.', 'card_is_cta' => '' ],
                    [ 'card_icon' => '',             'card_icon_color' => '',              'card_icon_bg' => '',               'card_title' => 'Portfolio Discount', 'card_desc' => 'Managing 5+ properties in London? We offer significant discounts for block bookings and annual service contracts. Save up to 25% across your portfolio.', 'card_is_cta' => 'yes', 'card_cta_text' => 'Get Portfolio Rates', 'card_cta_link' => [ 'url' => 'tel:02081455369' ] ],
                ],
                'title_field' => '{{{ card_title }}}',
            ] );

        $this->end_controls_section();
    }

    /* ── Render ───────────────────────────────────────────────────────── */

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="section-pricing-breakdown py-24 bg-light-grey">
            <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Header -->
                <div class="text-center mb-16">
                    <h2 class="text-sm font-bold text-electric uppercase tracking-widest mb-4"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <h3 class="text-4xl font-bold text-navy mb-4 font-heading"><?php echo esc_html( $s['heading'] ); ?></h3>
                    <p class="text-lg text-navy/60"><?php echo esc_html( $s['subheading'] ); ?></p>
                </div>

                <!-- Cards -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php foreach ( $s['breakdown_cards'] as $card ) :
                        $is_cta = ( 'yes' === $card['card_is_cta'] );
                    ?>
                        <?php if ( $is_cta ) :
                            $cta_target = ! empty( $card['card_cta_link']['is_external'] ) ? ' target="_blank"' : '';
                            $cta_norel  = ! empty( $card['card_cta_link']['nofollow'] )    ? ' rel="nofollow"'  : '';
                        ?>
                            <div class="bg-navy p-10 rounded-[2.5rem] text-white shadow-xl flex flex-col justify-between group overflow-hidden relative">
                                <div class="absolute -right-10 -top-10 w-48 h-48 bg-electric/10 rounded-full blur-3xl"></div>
                                <div class="relative z-10">
                                    <h4 class="font-bold text-2xl mb-4 font-heading"><?php echo esc_html( $card['card_title'] ); ?></h4>
                                    <p class="text-white/60 leading-relaxed mb-6"><?php echo esc_html( $card['card_desc'] ); ?></p>
                                </div>
                                <a href="<?php echo esc_url( $card['card_cta_link']['url'] ); ?>"<?php echo $cta_target . $cta_norel; ?>
                                   class="relative z-10 text-electric font-bold flex items-center gap-2 hover:gap-4 transition-all">
                                    <?php echo esc_html( $card['card_cta_text'] ); ?>
                                    <i data-lucide="arrow-right"></i>
                                </a>
                            </div>
                        <?php else : ?>
                            <div class="bg-white p-10 rounded-[2.5rem] border border-gray-100 shadow-sm hover:shadow-md transition-all group overflow-hidden relative">
                                <div class="absolute -right-10 -top-10 w-32 h-32 <?php echo esc_attr( $card['card_icon_bg'] ); ?> rounded-full transition-transform group-hover:scale-150 opacity-50"></div>
                                <?php if ( ! empty( $card['card_icon'] ) ) : ?>
                                    <div class="w-14 h-14 <?php echo esc_attr( $card['card_icon_bg'] ); ?> <?php echo esc_attr( $card['card_icon_color'] ); ?> rounded-2xl flex items-center justify-center mb-8 relative z-10">
                                        <i data-lucide="<?php echo esc_attr( $card['card_icon'] ); ?>" class="w-7 h-7"></i>
                                    </div>
                                <?php endif; ?>
                                <h4 class="font-bold text-xl text-navy mb-4 relative z-10"><?php echo esc_html( $card['card_title'] ); ?></h4>
                                <p class="text-navy/60 leading-relaxed relative z-10"><?php echo esc_html( $card['card_desc'] ); ?></p>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php
    }
}