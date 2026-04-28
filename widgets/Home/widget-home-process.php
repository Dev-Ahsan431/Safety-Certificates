<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Home_Process extends \Elementor\Widget_Base {

    public function get_name() { return 'home_process'; }
    public function get_title() { return __( 'Home – How It Works', 'HTE', 'plugin-name' ); }
    public function get_icon() { return 'eicon-flow'; }
    public function get_categories() { return [ 'general' ]; }

    protected function _register_controls() {

        /* ── SECTION HEADER ── */
        $this->start_controls_section( 'section_header', [ 'label' => __( 'Section Header', 'plugin-name' ) ] );
            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Text', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'How It Works',
            ] );
            $this->add_control( 'title', [
                'label'   => __( 'Title', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '4 Simple Steps to Compliance',
            ] );
            $this->add_control( 'description', [
                'label'   => __( 'Description', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "We've streamlined the process to get your property certified with zero hassle.",
            ] );
        $this->end_controls_section();

        /* ── STEPS ── */
        $this->start_controls_section( 'section_steps', [ 'label' => __( 'Steps', 'plugin-name' ) ] );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control( 'step_icon', [
                'label'   => __( 'Lucide Icon Name', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'file-text',
            ] );
            $repeater->add_control( 'step_icon_color', [
                'label'   => __( 'Icon Color Class', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'text-electric',
                'description' => 'e.g. text-electric or text-safety',
            ] );
            $repeater->add_control( 'step_badge_color', [
                'label'   => __( 'Step Number Badge Color', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'bg-electric',
                'description' => 'e.g. bg-electric or bg-safety',
            ] );
            $repeater->add_control( 'step_title', [
                'label'   => __( 'Step Title', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Request Quote',
            ] );
            $repeater->add_control( 'step_description', [
                'label'   => __( 'Step Description', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Fill out our quick form to get an instant, transparent price.',
            ] );
            $this->add_control( 'steps', [
                'label'       => __( 'Steps', 'plugin-name' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'step_icon' => 'file-text',      'step_icon_color' => 'text-electric', 'step_badge_color' => 'bg-electric', 'step_title' => 'Request Quote',     'step_description' => 'Fill out our quick form to get an instant, transparent price.' ],
                    [ 'step_icon' => 'calendar',        'step_icon_color' => 'text-electric', 'step_badge_color' => 'bg-electric', 'step_title' => 'Schedule',           'step_description' => 'Pick a time that works for you or your tenants.' ],
                    [ 'step_icon' => 'clipboard-check', 'step_icon_color' => 'text-safety',   'step_badge_color' => 'bg-safety',   'step_title' => 'Expert Assessment',  'step_description' => 'Our certified engineers conduct a thorough inspection.' ],
                    [ 'step_icon' => 'award',           'step_icon_color' => 'text-safety',   'step_badge_color' => 'bg-safety',   'step_title' => 'Get Certified',      'step_description' => 'Receive your digital, legally-binding certificates within 24h.' ],
                ],
                'title_field' => '{{{ step_title }}}',
            ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $steps = $s['steps'];
        ?>
        <section id="process" class="py-24 bg-white relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <!-- Header -->
                <div class="text-center max-w-3xl mx-auto mb-16 fade-in">
                    <h2 class="text-sm font-bold text-electric uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <h3 class="text-4xl font-bold text-navy mb-4"><?php echo esc_html( $s['title'] ); ?></h3>
                    <p class="text-lg text-navy/70"><?php echo esc_html( $s['description'] ); ?></p>
                </div>

                <!-- Steps -->
                <div class="grid md:grid-cols-<?php echo count( $steps ); ?> gap-8 relative">
                    <!-- Connecting line (desktop) -->
                    <div class="hidden md:block absolute top-12 left-[12.5%] right-[12.5%] h-0.5 bg-gradient-to-r from-electric/20 via-electric to-safety/20 z-0"></div>

                    <?php $i = 1; foreach ( $steps as $step ) : ?>
                    <div class="relative z-10 text-center fade-in">
                        <div class="w-24 h-24 mx-auto bg-white border-4 border-light-grey rounded-full flex items-center justify-center shadow-xl mb-6 relative group hover:border-<?php echo esc_attr( str_replace( 'text-', '', $step['step_icon_color'] ) ); ?> transition-colors">
                            <div class="absolute -top-2 -right-2 w-8 h-8 <?php echo esc_attr( $step['step_badge_color'] ); ?> text-white rounded-full flex items-center justify-center font-bold"><?php echo $i; ?></div>
                            <i data-lucide="<?php echo esc_attr( $step['step_icon'] ); ?>" class="w-10 h-10 <?php echo esc_attr( $step['step_icon_color'] ); ?>"></i>
                        </div>
                        <h4 class="text-xl font-bold text-navy mb-2"><?php echo esc_html( $step['step_title'] ); ?></h4>
                        <p class="text-navy/60 text-sm"><?php echo esc_html( $step['step_description'] ); ?></p>
                    </div>
                    <?php $i++; endforeach; ?>
                </div>

            </div>
        </section>
        <?php
    }
}