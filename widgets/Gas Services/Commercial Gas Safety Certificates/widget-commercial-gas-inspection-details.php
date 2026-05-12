<?php
/**
 * Widget: Gas Inspection Details (section header + 6-card feature grid)
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Commercial_Gas_Inspection_Details extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-gas-inspection-details'; }
    public function get_title()      { return __( 'HTE – Gas Inspection Details', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-icon-box'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'gas', 'inspection', 'features', 'included', 'Commercial' ]; }

    protected function register_controls() {

        /* ── Section Header ── */
        $this->start_controls_section( 'sec_header', [
            'label' => __( 'Section Header', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "What's Included in Your Inspection?",
            ] );

            $this->add_control( 'heading_highlight', [
                'label'       => __( 'Highlighted Word', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'Included',
                'description' => __( 'This word will be highlighted in the accent color.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'subheading', [
                'label'   => __( 'Subheading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'A rigorous safety check by commercial gas specialists to ensure 100% compliance.',
            ] );

        $this->end_controls_section();

        /* ── Feature Cards Repeater ── */
        $this->start_controls_section( 'sec_cards', [
            'label' => __( 'Feature Cards', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'card_icon', [
                'label'   => __( 'Icon (Lucide name)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'activity',
            ] );

            $repeater->add_control( 'card_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Feature Title',
            ] );

            $repeater->add_control( 'card_text', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Feature description text.',
            ] );

            $this->add_control( 'cards', [
                'label'       => __( 'Cards', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'card_icon' => 'activity',  'card_title' => 'Gas Meter & Pipework',      'card_text' => 'Full soundness test on the gas distribution system to ensure no leaks exist from the meter to the appliances.' ],
                    [ 'card_icon' => 'wind',       'card_title' => 'Extraction & Interlocking', 'card_text' => 'Checking if the canopy fan works correctly and is interlocked to the gas supply, ensuring gas shuts off if the fan fails.' ],
                    [ 'card_icon' => 'gauge',      'card_title' => 'Burner & Pressure Checks',  'card_text' => 'Precise measurements of gas pressure and burner performance to ensure appliances are operating safely and efficiently.' ],
                    [ 'card_icon' => 'eye',        'card_title' => 'Visual Inspection',          'card_text' => 'Checking for correct installation, adequate ventilation, and any signs of damage or wear that could lead to a safety fault.' ],
                    [ 'card_icon' => 'file-check', 'card_title' => 'Digital Certification',      'card_text' => 'Results recorded digitally and emailed within 24 hours of a pass, including any recommendations for minor repairs.' ],
                    [ 'card_icon' => 'calendar',   'card_title' => 'Annual Reminders',           'card_text' => "Stay compliant automatically. We'll contact you 30 days before your certificate is due to expire next year." ],
                ],
                'title_field' => '{{{ card_title }}}',
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();

        $heading   = esc_html( $s['heading'] );
        $highlight = esc_html( $s['heading_highlight'] );
        if ( $highlight && strpos( $heading, $highlight ) !== false ) {
            $heading = str_replace( $highlight, '<span class="text-safety">' . $highlight . '</span>', $heading );
        }
        ?>
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4">

                <div class="text-center mb-16">
                    <h2 class="text-4xl font-black text-navy mb-4"><?php echo wp_kses_post( $heading ); ?></h2>
                    <?php if ( ! empty( $s['subheading'] ) ) : ?>
                        <p class="text-navy/60 max-w-2xl mx-auto italic font-medium"><?php echo esc_html( $s['subheading'] ); ?></p>
                    <?php endif; ?>
                </div>

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php foreach ( $s['cards'] as $card ) : ?>
                        <div class="p-8 rounded-2xl bg-white border border-gray-100 hover:border-electric/30 transition-all hover:shadow-xl group">
                            <div class="w-12 h-12 bg-navy text-white rounded-xl flex items-center justify-center mb-6 shadow-lg shadow-navy/20 group-hover:scale-110 transition-transform">
                                <i data-lucide="<?php echo esc_attr( $card['card_icon'] ); ?>" class="w-6 h-6 text-electric"></i>
                            </div>
                            <h4 class="font-black text-lg mb-4 italic"><?php echo esc_html( $card['card_title'] ); ?></h4>
                            <p class="text-navy/60 text-sm leading-relaxed"><?php echo wp_kses_post( $card['card_text'] ); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php
    }
}