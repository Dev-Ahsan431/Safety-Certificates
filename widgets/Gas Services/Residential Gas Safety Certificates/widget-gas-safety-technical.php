<?php
/**
 * Widget: Gas Safety – Technical Expertise Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Gas_Safety_Technical extends \Elementor\Widget_Base {

    /* ── Identity ─────────────────────────────────────────────────────── */

    public function get_name()       { return 'hte-gas-safety-technical'; }
    public function get_title()      { return __( 'HTE – Gas Safety Technical Expertise', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-settings'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'technical', 'expertise', 'appliances', 'boiler', 'gas', 'safety' ]; }

    /* ── Controls ─────────────────────────────────────────────────────── */

    protected function register_controls() {

        /* ── Header ── */
        $this->start_controls_section( 'sec_header', [
            'label' => __( 'Section Header', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Technical Expertise', 'html-to-elementor' ),
            ] );

            $this->add_control( 'subheading', [
                'label'   => __( 'Sub-heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'We inspect all residential gas appliances to industry standards.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Expertise Cards ── */
        $this->start_controls_section( 'sec_cards', [
            'label' => __( 'Expertise Cards', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'card_icon', [
                'label'   => __( 'Lucide Icon Name', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'flame',
            ] );

            $repeater->add_control( 'card_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Boilers', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'card_desc', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Combination, System, and Regular boilers. We perform full flue-gas analysis (FGA) to verify burn ratios and extraction efficiency.', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'card_bar_width', [
                'label'       => __( 'Progress Bar Width (%)', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::SLIDER,
                'size_units'  => [ '%' ],
                'range'       => [ '%' => [ 'min' => 0, 'max' => 100 ] ],
                'default'     => [ 'size' => 100, 'unit' => '%' ],
            ] );

            $this->add_control( 'expertise_cards', [
                'label'       => __( 'Cards', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'card_icon'      => 'flame',
                        'card_title'     => 'Boilers',
                        'card_desc'      => 'Combination, System, and Regular boilers. We perform full flue-gas analysis (FGA) to verify burn ratios and extraction efficiency.',
                        'card_bar_width' => [ 'size' => 100, 'unit' => '%' ],
                    ],
                    [
                        'card_icon'      => 'chef-hat',
                        'card_title'     => 'Cookers & Hobs',
                        'card_desc'      => 'Checking stability brackets, flexible hose longevity, and flame-failure safety mechanisms. Essential for tenant safety.',
                        'card_bar_width' => [ 'size' => 80, 'unit' => '%' ],
                    ],
                    [
                        'card_icon'      => 'thermometer',
                        'card_title'     => 'Fireplaces',
                        'card_desc'      => 'Inspecting catchment spaces, spillage testing for extraction, and gas pressure checks for decorative fuel-effect fires.',
                        'card_bar_width' => [ 'size' => 75, 'unit' => '%' ],
                    ],
                ],
                'title_field' => '{{{ card_title }}}',
            ] );

        $this->end_controls_section();
    }

    /* ── Render ───────────────────────────────────────────────────────── */

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="section-technical py-24 bg-white">
            <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Header -->
                <div class="text-center mb-20">
                    <h3 class="text-4xl font-bold text-navy mb-4 font-heading"><?php echo esc_html( $s['heading'] ); ?></h3>
                    <p class="text-lg text-navy/60"><?php echo esc_html( $s['subheading'] ); ?></p>
                </div>

                <!-- Cards -->
                <div class="grid md:grid-cols-3 gap-12">
                    <?php foreach ( $s['expertise_cards'] as $card ) :
                        $bar_width = ! empty( $card['card_bar_width']['size'] ) ? intval( $card['card_bar_width']['size'] ) : 100;
                        // Convert to a Tailwind-friendly inline style for the bar width
                    ?>
                        <div class="p-8 bg-light-grey rounded-[2.5rem] border border-gray-100">
                            <h4 class="text-xl font-bold text-navy mb-4 flex items-center gap-3">
                                <i data-lucide="<?php echo esc_attr( $card['card_icon'] ); ?>" class="text-electric"></i>
                                <?php echo esc_html( $card['card_title'] ); ?>
                            </h4>
                            <p class="text-sm text-navy/60 leading-relaxed mb-6"><?php echo esc_html( $card['card_desc'] ); ?></p>
                            <div class="h-1 bg-navy/5 rounded-full overflow-hidden">
                                <div class="h-full bg-safety rounded-full" style="width: <?php echo esc_attr( $bar_width ); ?>%"></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php
    }
}