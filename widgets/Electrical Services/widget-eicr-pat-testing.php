<?php
/**
 * Widget: EICR PAT Testing
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Eicr_Pat_Testing extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-eicr-pat-testing'; }
    public function get_title()      { return __( 'HTE – PAT Testing', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-plug'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'pat', 'testing', 'appliance' ]; }

    protected function register_controls() {

        /* ── Left Column ────────────────────────────────────────────── */
        $this->start_controls_section( 'sec_left', [
            'label' => __( 'Left Column', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Appliance Safety', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'What is PAT Testing?', 'html-to-elementor' ),
            ] );

            $this->add_control( 'intro', [
                'label'   => __( 'Intro Paragraph', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Portable Appliance Testing (PAT) proves that electrical items don\'t pose shock or fire risks. Any portable appliance that is plugged into a socket needs to undergo PAT testing.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'mandatory_heading', [
                'label'   => __( 'Mandatory Sub-heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Is PAT Testing Mandatory?', 'html-to-elementor' ),
            ] );

            $this->add_control( 'mandatory_text', [
                'label'   => __( 'Mandatory Paragraph', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::WYSIWYG,
                'default' => 'While highly recommended for all landlords to ensure safety, it is <strong>strictly mandatory for HMOs</strong> (Houses in Multiple Occupation). Landlords must maintain communal area electrics and comply with licensing conditions set by councils.',
            ] );

        $this->end_controls_section();

        /* ── Benefits List ──────────────────────────────────────────── */
        $this->start_controls_section( 'sec_benefits', [
            'label' => __( 'Benefits List', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'benefits_heading', [
                'label'   => __( 'Benefits Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Benefits of PAT Testing', 'html-to-elementor' ),
            ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'benefit_text', [
                'label'   => __( 'Benefit', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Benefit item.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'benefits', [
                'label'       => __( 'Benefits', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'benefit_text' => 'Reduces the risk of electrical fires.' ],
                    [ 'benefit_text' => 'Protects tenants from electric shocks.' ],
                    [ 'benefit_text' => 'Demonstrates a clear duty of care.' ],
                ],
                'title_field' => '{{{ benefit_text }}}',
            ] );

        $this->end_controls_section();

        /* ── Right Card ─────────────────────────────────────────────── */
        $this->start_controls_section( 'sec_right', [
            'label' => __( 'Right Appliances Card', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'card_heading', [
                'label'   => __( 'Card Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Appliances Requiring Testing', 'html-to-elementor' ),
            ] );

            $this->add_control( 'card_subtext', [
                'label'   => __( 'Card Sub-text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Any appliance provided by the landlord requires testing, including:', 'html-to-elementor' ),
            ] );

            $repeater2 = new \Elementor\Repeater();

            $repeater2->add_control( 'appliance_icon', [
                'label'   => __( 'Icon (Lucide)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'zap',
            ] );

            $repeater2->add_control( 'appliance_name', [
                'label'   => __( 'Appliance Name', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Appliance', 'html-to-elementor' ),
            ] );

            $this->add_control( 'appliances', [
                'label'       => __( 'Appliances', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater2->get_controls(),
                'default'     => [
                    [ 'appliance_icon' => 'coffee',       'appliance_name' => 'Kettles' ],
                    [ 'appliance_icon' => 'utensils',     'appliance_name' => 'Toasters' ],
                    [ 'appliance_icon' => 'refrigerator', 'appliance_name' => 'Fridges' ],
                    [ 'appliance_icon' => 'microwave',    'appliance_name' => 'Microwaves' ],
                    [ 'appliance_icon' => 'tv',           'appliance_name' => 'TVs' ],
                    [ 'appliance_icon' => 'wind',         'appliance_name' => 'Vacuums' ],
                    [ 'appliance_icon' => 'lamp',         'appliance_name' => 'Lamps' ],
                    [ 'appliance_icon' => 'plug-2',       'appliance_name' => 'Extension Leads' ],
                ],
                'title_field' => '{{{ appliance_name }}}',
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-navy text-white relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <!-- Left Column -->
                    <div class="fade-in">
                        <?php if ( ! empty( $s['eyebrow'] ) ) : ?>
                            <h2 class="text-sm font-bold text-electric uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                        <?php endif; ?>

                        <?php if ( ! empty( $s['heading'] ) ) : ?>
                            <h3 class="text-4xl font-bold mb-6"><?php echo esc_html( $s['heading'] ); ?></h3>
                        <?php endif; ?>

                        <?php if ( ! empty( $s['intro'] ) ) : ?>
                            <p class="text-lg text-white/70 mb-6"><?php echo esc_html( $s['intro'] ); ?></p>
                        <?php endif; ?>

                        <div class="mb-8">
                            <?php if ( ! empty( $s['mandatory_heading'] ) ) : ?>
                                <h4 class="text-xl font-bold mb-3 text-electric"><?php echo esc_html( $s['mandatory_heading'] ); ?></h4>
                            <?php endif; ?>
                            <?php if ( ! empty( $s['mandatory_text'] ) ) : ?>
                                <p class="text-white/70"><?php echo wp_kses_post( $s['mandatory_text'] ); ?></p>
                            <?php endif; ?>
                        </div>

                        <?php if ( ! empty( $s['benefits_heading'] ) ) : ?>
                            <h4 class="text-xl font-bold mb-4"><?php echo esc_html( $s['benefits_heading'] ); ?></h4>
                        <?php endif; ?>

                        <?php if ( ! empty( $s['benefits'] ) ) : ?>
                        <ul class="space-y-3 text-white/80">
                            <?php foreach ( $s['benefits'] as $item ) : ?>
                                <li class="flex items-center gap-3">
                                    <i data-lucide="check-circle-2" class="text-safety w-5 h-5"></i>
                                    <?php echo esc_html( $item['benefit_text'] ); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>

                    <!-- Right Card -->
                    <div class="relative slide-in-right">
                        <div class="glass-dark p-8 rounded-3xl shadow-2xl border border-white/10 relative z-10">
                            <?php if ( ! empty( $s['card_heading'] ) ) : ?>
                                <h4 class="text-2xl font-bold mb-6"><?php echo esc_html( $s['card_heading'] ); ?></h4>
                            <?php endif; ?>
                            <?php if ( ! empty( $s['card_subtext'] ) ) : ?>
                                <p class="text-white/60 text-sm mb-6"><?php echo esc_html( $s['card_subtext'] ); ?></p>
                            <?php endif; ?>

                            <?php if ( ! empty( $s['appliances'] ) ) : ?>
                            <div class="grid grid-cols-2 gap-4">
                                <?php foreach ( $s['appliances'] as $item ) : ?>
                                    <div class="flex items-center gap-3 p-3 bg-white/5 rounded-xl border border-white/10">
                                        <i data-lucide="<?php echo esc_attr( $item['appliance_icon'] ); ?>" class="text-electric"></i>
                                        <?php echo esc_html( $item['appliance_name'] ); ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}
