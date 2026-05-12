<?php
/**
 * Widget: EICR Fault Finding Process
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Eicr_Fault_Finding extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-eicr-fault-finding'; }
    public function get_title()      { return __( 'HTE – Fault Finding Process', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-flow'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'fault', 'process', 'steps', 'eicr' ]; }

    protected function register_controls() {

        /* ── Section Header ─────────────────────────────────────────── */
        $this->start_controls_section( 'sec_header', [
            'label' => __( 'Section Header', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Expertise', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Our Fault-Finding Process', 'html-to-elementor' ),
            ] );

            $this->add_control( 'description', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'We don\'t just tick boxes. We actively identify and resolve electrical issues to keep your property safe.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Steps Repeater ─────────────────────────────────────────── */
        $this->start_controls_section( 'sec_steps', [
            'label' => __( 'Process Steps', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'step_icon', [
                'label'   => __( 'Icon (Lucide)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'zap',
            ] );

            $repeater->add_control( 'step_number', [
                'label'   => __( 'Step Number', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '1.',
            ] );

            $repeater->add_control( 'step_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Step Title', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'step_desc', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Step description goes here.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'steps', [
                'label'       => __( 'Steps', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'step_icon' => 'search',        'step_number' => '1.', 'step_title' => 'Diagnostic Tools',    'step_desc' => 'Utilizing advanced tools and technology for precise fault diagnosis, ensuring no hidden issues are missed.' ],
                    [ 'step_icon' => 'activity',      'step_number' => '2.', 'step_title' => 'Circuit Analysis',    'step_desc' => 'Detailed examination of your electrical system, testing loads, resistance, and overall circuit integrity.' ],
                    [ 'step_icon' => 'shield-check',  'step_number' => '3.', 'step_title' => 'Safety Compliance',   'step_desc' => 'Prioritizing your safety with every check and repair, ensuring all work meets strict BS 7671 standards.' ],
                ],
                'title_field' => '{{{ step_number }}} {{{ step_title }}}',
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-1/2 h-full bg-light-grey clip-diagonal-reverse opacity-50 z-0"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

                <div class="mb-16 md:w-1/2 fade-in">
                    <?php if ( ! empty( $s['eyebrow'] ) ) : ?>
                        <h2 class="text-sm font-bold text-electric uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <?php endif; ?>
                    <?php if ( ! empty( $s['heading'] ) ) : ?>
                        <h3 class="text-4xl font-bold text-navy mb-4"><?php echo esc_html( $s['heading'] ); ?></h3>
                    <?php endif; ?>
                    <?php if ( ! empty( $s['description'] ) ) : ?>
                        <p class="text-lg text-navy/70"><?php echo esc_html( $s['description'] ); ?></p>
                    <?php endif; ?>
                </div>

                <?php if ( ! empty( $s['steps'] ) ) : ?>
                <div class="grid md:grid-cols-3 gap-8">
                    <?php foreach ( $s['steps'] as $item ) : ?>
                        <div class="bg-white border border-gray-100 rounded-3xl p-8 shadow-lg hover:border-electric/30 transition-colors fade-in">
                            <div class="w-12 h-12 bg-electric/10 text-electric rounded-xl flex items-center justify-center mb-6">
                                <i data-lucide="<?php echo esc_attr( $item['step_icon'] ); ?>"></i>
                            </div>
                            <h4 class="text-xl font-bold text-navy mb-4">
                                <?php echo esc_html( $item['step_number'] ); ?> <?php echo esc_html( $item['step_title'] ); ?>
                            </h4>
                            <p class="text-navy/70"><?php echo esc_html( $item['step_desc'] ); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>

            </div>
        </section>
        <?php
    }
}
