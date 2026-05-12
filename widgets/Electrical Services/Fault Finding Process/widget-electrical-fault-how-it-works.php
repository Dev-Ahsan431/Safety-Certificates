<?php
/**
 * Widget: Electrical Fault Finding – How It Works Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Electrical_Fault_How_It_Works extends \Elementor\Widget_Base {

    /* ── Identity ─────────────────────────────────────────────────────── */

    public function get_name()       { return 'hte-electrical-fault-how-it-works'; }
    public function get_title()      { return __( 'HTE – Electrical Fault: How It Works', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-flow'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'electrical', 'process', 'steps', 'how', 'works', 'fault' ]; }

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
                'default' => __( 'Process', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'How Electrical Fault Finding Works', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Steps ── */
        $this->start_controls_section( 'sec_steps', [
            'label' => __( 'Steps', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'step_number_bg', [
                'label'       => __( 'Number Badge BG Class', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'description' => __( 'e.g. bg-navy, bg-electric, bg-safety, bg-orange', 'html-to-elementor' ),
                'default'     => 'bg-navy',
            ] );

            $repeater->add_control( 'step_title', [
                'label'   => __( 'Step Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Diagnostic Tools Overview', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'step_desc', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Utilizing advanced digital multimeters and insulation testers for precise fault diagnosis.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'steps', [
                'label'       => __( 'Steps', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'step_number_bg' => 'bg-navy',
                        'step_title'     => 'Diagnostic Tools Overview',
                        'step_desc'      => 'Utilizing advanced digital multimeters and insulation testers for precise fault diagnosis.',
                    ],
                    [
                        'step_number_bg' => 'bg-electric',
                        'step_title'     => 'Circuit Analysis',
                        'step_desc'      => 'Detailed examination of your electrical system to identify abnormalities and load imbalances.',
                    ],
                    [
                        'step_number_bg' => 'bg-safety',
                        'step_title'     => 'Safety Compliance',
                        'step_desc'      => 'Verifying that every circuit meets British Standards (BS 7671) and safety thresholds.',
                    ],
                    [
                        'step_number_bg' => 'bg-orange',
                        'step_title'     => 'Expert Repair',
                        'step_desc'      => 'Immediate rectification of identified faults to restore full safe functionality.',
                    ],
                ],
                'title_field' => '{{{ step_title }}}',
            ] );

        $this->end_controls_section();
    }

    /* ── Render ───────────────────────────────────────────────────────── */

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-white relative overflow-hidden">
            <div class="absolute inset-0 bg-navy opacity-[0.02] z-0"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="bg-white rounded-[40px] shadow-[0_20px_100px_rgba(11,31,58,0.05)] border border-gray-100 p-8 lg:p-16">

                    <!-- Header -->
                    <div class="text-center mb-16">
                        <h2 class="text-sm font-bold text-electric uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                        <h3 class="text-4xl font-bold text-navy mb-4"><?php echo esc_html( $s['heading'] ); ?></h3>
                    </div>

                    <!-- Steps -->
                    <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-12 relative">
                        <!-- Connector line (desktop only) -->
                        <div class="hidden lg:block absolute top-8 left-[calc(12.5%+2rem)] right-[calc(12.5%+2rem)] h-0.5 bg-gray-100 z-0"></div>

                        <?php
                        $step_num = 0;
                        foreach ( $s['steps'] as $step ) :
                            $step_num++;
                        ?>
                            <div class="relative z-10 text-center">
                                <div class="w-16 h-16 mx-auto <?php echo esc_attr( $step['step_number_bg'] ); ?> text-white rounded-2xl flex items-center justify-center font-bold text-xl mb-6 shadow-xl transition-transform hover:scale-110">
                                    <?php echo esc_html( $step_num ); ?>
                                </div>
                                <h4 class="font-bold text-navy mb-3"><?php echo esc_html( $step['step_title'] ); ?></h4>
                                <p class="text-sm text-navy/60 leading-relaxed"><?php echo esc_html( $step['step_desc'] ); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}