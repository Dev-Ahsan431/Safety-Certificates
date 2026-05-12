<?php
/**
 * Widget: Gas Safety – Pricing Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Gas_Safety_Pricing extends \Elementor\Widget_Base {

    /* ── Identity ─────────────────────────────────────────────────────── */

    public function get_name()       { return 'hte-gas-safety-pricing'; }
    public function get_title()      { return __( 'HTE – Gas Safety Pricing', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-price-table'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'pricing', 'price', 'table', 'gas', 'safety', 'cp12' ]; }

    /* ── Controls ─────────────────────────────────────────────────────── */

    protected function register_controls() {

        /* ── Section Header ── */
        $this->start_controls_section( 'sec_header', [
            'label' => __( 'Section Header', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Transparent Pricing', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Low Cost, High Standard', 'html-to-elementor' ),
            ] );

            $this->add_control( 'subheading', [
                'label'   => __( 'Sub-Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'No hidden travel fees or weekend surcharges. Fixed London prices for all CP12 certificates.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Pricing Cards ── */
        $this->start_controls_section( 'sec_cards', [
            'label' => __( 'Pricing Cards', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'card_title', [
                'label'   => __( 'Plan Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( '1 Appliance', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'card_price', [
                'label'   => __( 'Price', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '£57.99',
            ] );

            $repeater->add_control( 'card_subtitle', [
                'label'   => __( 'Sub-Title / Type', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Gas Safety – CP12', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'card_features', [
                'label'       => __( 'Features (one per line)', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => "Safety Inspection\nFlue Testing\nVentilation Check",
                'description' => __( 'One feature per line.', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'card_btn_text', [
                'label'   => __( 'Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Book Now', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'card_btn_link', [
                'label'   => __( 'Button Link', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => 'tel:02081455369' ],
            ] );

            $repeater->add_control( 'card_is_featured', [
                'label'        => __( 'Featured / Popular?', 'html-to-elementor' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'html-to-elementor' ),
                'label_off'    => __( 'No', 'html-to-elementor' ),
                'return_value' => 'yes',
                'default'      => '',
            ] );

            $repeater->add_control( 'card_featured_badge', [
                'label'     => __( 'Featured Badge Text', 'html-to-elementor' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __( 'Popular', 'html-to-elementor' ),
                'condition' => [ 'card_is_featured' => 'yes' ],
            ] );

            $this->add_control( 'pricing_cards', [
                'label'       => __( 'Cards', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'card_title'    => '1 Appliance',
                        'card_price'    => '£57.99',
                        'card_subtitle' => 'Gas Safety – CP12',
                        'card_features' => "Safety Inspection\nFlue Testing\nVentilation Check",
                        'card_btn_text' => 'Book Now',
                        'card_btn_link' => [ 'url' => 'tel:02081455369' ],
                        'card_is_featured' => '',
                    ],
                    [
                        'card_title'         => '2 Appliances',
                        'card_price'         => '£67.99',
                        'card_subtitle'      => 'Gas Safety – CP12',
                        'card_features'      => "Safety Inspection\nFlue Testing\nVentilation Check",
                        'card_btn_text'      => 'Book Now',
                        'card_btn_link'      => [ 'url' => 'tel:02081455369' ],
                        'card_is_featured'   => 'yes',
                        'card_featured_badge'=> 'Popular',
                    ],
                    [
                        'card_title'    => '3 Appliances',
                        'card_price'    => '£77.99',
                        'card_subtitle' => 'Gas Safety – CP12',
                        'card_features' => "Safety Inspection\nFlue Testing\nVentilation Check",
                        'card_btn_text' => 'Book Now',
                        'card_btn_link' => [ 'url' => 'tel:02081455369' ],
                        'card_is_featured' => '',
                    ],
                    [
                        'card_title'    => '4+ Appliances',
                        'card_price'    => '£87.99',
                        'card_subtitle' => 'Gas Safety – CP12',
                        'card_features' => "Safety Inspection\nFlue Testing\nVentilation Check",
                        'card_btn_text' => 'Book Now',
                        'card_btn_link' => [ 'url' => 'tel:02081455369' ],
                        'card_is_featured' => '',
                    ],
                ],
                'title_field' => '{{{ card_title }}} – {{{ card_price }}}',
            ] );

        $this->end_controls_section();
    }

    /* ── Render ───────────────────────────────────────────────────────── */

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section id="pricing" class="section-pricing py-24 bg-light-grey">
            <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Header -->
                <div class="text-center max-w-3xl mx-auto mb-20">
                    <h2 class="text-sm font-bold text-electric uppercase tracking-[0.2em] mb-4"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <h3 class="text-4xl md:text-5xl font-bold text-navy mb-6 font-heading"><?php echo esc_html( $s['heading'] ); ?></h3>
                    <p class="text-lg text-navy/60"><?php echo esc_html( $s['subheading'] ); ?></p>
                </div>

                <!-- Cards -->
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <?php foreach ( $s['pricing_cards'] as $card ) :
                        $is_featured = ( 'yes' === $card['card_is_featured'] );
                        $features    = array_filter( array_map( 'trim', explode( "\n", $card['card_features'] ) ) );
                        $btn_target  = ! empty( $card['card_btn_link']['is_external'] ) ? ' target="_blank"' : '';
                        $btn_norel   = ! empty( $card['card_btn_link']['nofollow'] )    ? ' rel="nofollow"'  : '';
                        ?>
                        <div class="<?php echo $is_featured ? 'bg-white rounded-3xl p-8 border-2 border-electric shadow-xl transition-all transform lg:-translate-y-4 flex flex-col relative overflow-hidden' : 'bg-white rounded-3xl p-8 border border-gray-100 shadow-sm hover:shadow-xl transition-all group flex flex-col'; ?>">

                            <?php if ( $is_featured && ! empty( $card['card_featured_badge'] ) ) : ?>
                                <div class="absolute top-4 right-4 bg-electric text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest">
                                    <?php echo esc_html( $card['card_featured_badge'] ); ?>
                                </div>
                            <?php endif; ?>

                            <h4 class="text-xl font-bold text-navy mb-2"><?php echo esc_html( $card['card_title'] ); ?></h4>
                            <div class="text-3xl font-bold text-navy mb-4 font-heading"><?php echo esc_html( $card['card_price'] ); ?></div>
                            <div class="text-sm font-semibold text-navy/40 mb-6 uppercase tracking-wider"><?php echo esc_html( $card['card_subtitle'] ); ?></div>

                            <ul class="space-y-3 mb-8 flex-grow">
                                <?php foreach ( $features as $feature ) : ?>
                                    <li class="flex items-center gap-2 text-sm text-navy/70">
                                        <i data-lucide="check" class="w-4 h-4 text-safety"></i>
                                        <?php echo esc_html( $feature ); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <a href="<?php echo esc_url( $card['card_btn_link']['url'] ); ?>"<?php echo $btn_target . $btn_norel; ?>
                               class="<?php echo $is_featured ? 'w-full py-4 rounded-xl bg-electric text-white font-bold hover:bg-navy transition-all shadow-lg shadow-electric/20 text-center' : 'w-full py-4 rounded-xl border-2 border-navy text-navy font-bold hover:bg-navy hover:text-white transition-all text-center'; ?>">
                                <?php echo esc_html( $card['card_btn_text'] ); ?>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php
    }
}