<?php
/**
 * Widget: Installation Costs Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Fire_Alarm_Installation_Fire_Costs extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-fire-costs'; }
    public function get_title()      { return __( 'HTE – Fire: Installation Costs', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-price-list'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'fire', 'costs', 'installation', 'pricing', 'Fire Alarm Installation Fire Costs' ]; }

    protected function register_controls() {

        /* ── Header ── */
        $this->start_controls_section( 'sec_header', [
            'label' => __( 'Header', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading_before', [
                'label'   => __( 'Heading – Before Highlight', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Installation', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading_highlight', [
                'label'   => __( 'Heading – Highlighted', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Costs', 'html-to-elementor' ),
            ] );

            $this->add_control( 'subheading', [
                'label'   => __( 'Subheading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Average prices for homes and businesses in the UK', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Cost Cards Repeater ── */
        $this->start_controls_section( 'sec_cards', [
            'label' => __( 'Cost Cards', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $card_rep = new \Elementor\Repeater();

            $card_rep->add_control( 'card_heading', [
                'label'   => __( 'Card Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Residential Properties', 'html-to-elementor' ),
            ] );

            $card_rep->add_control( 'card_price', [
                'label'   => __( 'Price', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '£190 – £300',
            ] );

            $card_rep->add_control( 'card_price_suffix', [
                'label'   => __( 'Price Suffix', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'avg per unit', 'html-to-elementor' ),
            ] );

            $card_rep->add_control( 'card_price_color', [
                'label'       => __( 'Price Color Class', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'text-orange',
                'description' => __( 'e.g. text-orange or text-navy', 'html-to-elementor' ),
            ] );

            $card_rep->add_control( 'card_text', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Generally covers basic smoke detection systems and integration into electrical frameworks.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'cost_cards', [
                'label'       => __( 'Cost Cards', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $card_rep->get_controls(),
                'default'     => [
                    [
                        'card_heading'      => __( 'Residential Properties', 'html-to-elementor' ),
                        'card_price'        => '£190 – £300',
                        'card_price_suffix' => __( 'avg per unit', 'html-to-elementor' ),
                        'card_price_color'  => 'text-orange',
                        'card_text'         => __( 'Generally covers basic smoke detection systems and integration into electrical frameworks.', 'html-to-elementor' ),
                    ],
                    [
                        'card_heading'      => __( 'Business Premises', 'html-to-elementor' ),
                        'card_price'        => '£500+',
                        'card_price_suffix' => __( 'per unit', 'html-to-elementor' ),
                        'card_price_color'  => 'text-navy',
                        'card_text'         => __( 'Accounts for sophisticated setups and multi-device networking necessary for larger spaces.', 'html-to-elementor' ),
                    ],
                ],
                'title_field' => '{{{ card_heading }}}',
            ] );

        $this->end_controls_section();

        /* ── Cost Factors Row ── */
        $this->start_controls_section( 'sec_factors', [
            'label' => __( 'Cost Factors Bar', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'factors_label', [
                'label'   => __( 'Bar Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Cost Factors:', 'html-to-elementor' ),
            ] );

            $factor_rep = new \Elementor\Repeater();
            $factor_rep->add_control( 'factor_icon', [
                'label'   => __( 'Lucide Icon', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'package',
            ] );
            $factor_rep->add_control( 'factor_text', [
                'label'   => __( 'Factor Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Installation Packages', 'html-to-elementor' ),
            ] );

            $this->add_control( 'factors', [
                'label'       => __( 'Factors', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $factor_rep->get_controls(),
                'default'     => [
                    [ 'factor_icon' => 'package',     'factor_text' => __( 'Installation Packages', 'html-to-elementor' ) ],
                    [ 'factor_icon' => 'wrench',       'factor_text' => __( 'Maintenance Costs', 'html-to-elementor' ) ],
                    [ 'factor_icon' => 'plus-circle',  'factor_text' => __( 'Additional Expenses', 'html-to-elementor' ) ],
                ],
                'title_field' => '{{{ factor_text }}}',
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-light-grey">
            <div class="max-w-4xl mx-auto px-4">

                <!-- Header -->
                <div class="text-center mb-16">
                    <h2 class="text-4xl lg:text-5xl font-black text-navy mb-4 italic uppercase">
                        <?php echo esc_html( $s['heading_before'] ); ?>
                        <?php if ( ! empty( $s['heading_highlight'] ) ) : ?>
                            <span class="text-orange"> <?php echo esc_html( $s['heading_highlight'] ); ?></span>
                        <?php endif; ?>
                    </h2>
                    <?php if ( ! empty( $s['subheading'] ) ) : ?>
                        <p class="text-navy/50 font-bold italic uppercase tracking-widest text-[10px]">
                            <?php echo esc_html( $s['subheading'] ); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <!-- Cost Cards -->
                <?php if ( ! empty( $s['cost_cards'] ) ) : ?>
                    <div class="grid md:grid-cols-2 gap-8">
                        <?php foreach ( $s['cost_cards'] as $card ) : ?>
                            <div class="bg-white p-10 rounded-[40px] shadow-sm border border-transparent hover:border-orange/20 transition-all">
                                <h3 class="text-xl font-black text-navy mb-4 italic">
                                    <?php echo esc_html( $card['card_heading'] ); ?>
                                </h3>
                                <div class="text-4xl font-black <?php echo esc_attr( $card['card_price_color'] ); ?> mb-4 italic">
                                    <?php echo esc_html( $card['card_price'] ); ?>
                                    <span class="text-xs uppercase text-navy/40 not-italic tracking-widest">
                                        <?php echo esc_html( $card['card_price_suffix'] ); ?>
                                    </span>
                                </div>
                                <p class="text-sm text-navy/60 italic font-medium leading-relaxed">
                                    <?php echo wp_kses_post( $card['card_text'] ); ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Cost Factors Bar -->
                <?php if ( ! empty( $s['factors'] ) ) : ?>
                    <div class="mt-8 p-10 bg-navy text-white rounded-[40px] italic">
                        <?php if ( ! empty( $s['factors_label'] ) ) : ?>
                            <p class="font-bold mb-4 italic opacity-80 uppercase tracking-widest text-xs">
                                <?php echo esc_html( $s['factors_label'] ); ?>
                            </p>
                        <?php endif; ?>
                        <div class="grid sm:grid-cols-3 gap-6 text-xs font-bold text-white/50">
                            <?php foreach ( $s['factors'] as $factor ) : ?>
                                <div class="flex items-center gap-2">
                                    <i data-lucide="<?php echo esc_attr( $factor['factor_icon'] ); ?>" class="w-4 h-4 text-orange"></i>
                                    <?php echo esc_html( $factor['factor_text'] ); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </section>
        <?php
    }
}