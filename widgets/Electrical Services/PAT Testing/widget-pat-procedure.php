<?php
/**
 * Widget: PAT Testing – Procedure / Inspection Steps Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_PAT_Procedure extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-pat-procedure'; }
    public function get_title()      { return __( 'HTE – PAT: Procedure Steps', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-flow'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'pat', 'procedure', 'steps', 'inspection', 'testing', 'process', 'electrical' ]; }

    protected function register_controls() {

        /* ── Header ── */
        $this->start_controls_section( 'sec_header', [
            'label' => __( 'Section Header', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'The Inspection', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'PAT Testing Procedure: What Happens During an Inspection?', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Steps ── */
        $this->start_controls_section( 'sec_steps', [
            'label' => __( 'Procedure Steps', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'step_title', [
                'label'   => __( 'Step Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Visual Inspection', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'step_desc', [
                'label'   => __( 'Step Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( '2–3 mins per item. Checking cables, plugs, and casing.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'steps', [
                'label'       => __( 'Steps', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'step_title' => 'Visual Inspection', 'step_desc' => '2–3 mins per item. Checking cables, plugs, and casing.' ],
                    [ 'step_title' => 'Earth Continuity',  'step_desc' => '1–2 mins. Verifying the grounding for Class I appliances.' ],
                    [ 'step_title' => 'Insulation Test',   'step_desc' => '2 mins. Ensuring no leakage from internal wiring.' ],
                    [ 'step_title' => 'Polarity Test',     'step_desc' => '1 min. Checking live/neutral wires are correct.' ],
                    [ 'step_title' => 'Labelling',         'step_desc' => "1 min. Passed items get durable 'Next Test' labels." ],
                ],
                'title_field' => '{{{ step_title }}}',
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-light-grey overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Header -->
                <div class="text-center mb-16">
                    <h2 class="text-sm font-bold text-electric uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <h3 class="text-4xl font-extrabold text-navy"><?php echo esc_html( $s['heading'] ); ?></h3>
                </div>

                <!-- Timeline -->
                <div class="relative">
                    <!-- Dashed connector line (desktop) -->
                    <div class="absolute top-1/2 left-0 w-full h-1 bg-gray-200 -translate-y-1/2 hidden lg:block border-dashed"></div>

                    <div class="grid lg:grid-cols-<?php echo count( $s['steps'] ); ?> gap-8 relative z-10"
                         style="grid-template-columns: repeat(<?php echo count( $s['steps'] ); ?>, minmax(0, 1fr));">
                        <?php
                        $num = 0;
                        foreach ( $s['steps'] as $step ) :
                            $num++;
                        ?>
                            <div class="bg-white p-6 rounded-3xl shadow-sm text-center border border-gray-100 hover:shadow-xl transition-all group">
                                <div class="w-12 h-12 bg-electric text-white rounded-2xl flex items-center justify-center mx-auto mb-6 font-bold group-hover:-translate-y-2 transition-transform">
                                    <?php echo esc_html( $num ); ?>
                                </div>
                                <h5 class="font-bold mb-2"><?php echo esc_html( $step['step_title'] ); ?></h5>
                                <p class="text-xs text-navy/50"><?php echo esc_html( $step['step_desc'] ); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>
        </section>
        <?php
    }
}