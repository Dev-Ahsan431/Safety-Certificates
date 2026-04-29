<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Residential_Electrical_Process extends \Elementor\Widget_Base {

    public function get_name()       { return 'eicr_process'; }
    public function get_title()      { return __( 'EICR – Inspection Process', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-flow'; }
    public function get_keywords()   { return [ 'hte', 'Process', 'packages', 'residential',  'electrical' ]; }

    protected function _register_controls() {

        /* ── HEADER ── */
        $this->start_controls_section( 'section_header', [ 'label' => __( 'Section Header', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'eyebrow', [ 'label' => __( 'Eyebrow', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'WorkFlow' ] );
            $this->add_control( 'heading', [ 'label' => __( 'Heading', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Inspection Process' ] );
        $this->end_controls_section();

        /* ── STEPS ── */
        $this->start_controls_section( 'section_steps', [ 'label' => __( 'Steps', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $rep = new \Elementor\Repeater();
            $rep->add_control( 'icon',        [ 'label' => __( 'Icon', 'plugin-name' ),        'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'eye' ] );
            $rep->add_control( 'icon_color',  [ 'label' => __( 'Icon Class', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'text-electric', 'description' => 'e.g. text-electric or text-safety' ] );
            $rep->add_control( 'badge_class', [ 'label' => __( 'Badge BG', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'bg-navy',       'description' => 'e.g. bg-navy, bg-electric, bg-safety' ] );
            $rep->add_control( 'title',       [ 'label' => __( 'Title', 'plugin-name' ),       'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Initial Assessment' ] );
            $rep->add_control( 'description', [ 'label' => __( 'Description', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Full visual inspection of the installation followed by a preliminary system health check.' ] );
            $this->add_control( 'steps', [
                'label'   => __( 'Steps', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $rep->get_controls(),
                'default' => [
                    [ 'icon' => 'eye',              'icon_color' => 'text-electric', 'badge_class' => 'bg-navy',    'title' => 'Initial Assessment',         'description' => 'Full visual inspection of the installation followed by a preliminary system health check.' ],
                    [ 'icon' => 'zap',              'icon_color' => 'text-electric', 'badge_class' => 'bg-electric','title' => 'Testing & Verification',      'description' => 'In-depth technical testing (Continuity, Insulation Resistance, Polarity, RCD Timing).' ],
                    [ 'icon' => 'clipboard-check',  'icon_color' => 'text-safety',   'badge_class' => 'bg-safety',  'title' => 'Results & Recommendations',   'description' => 'Detailed classification (C1, C2, C3, FI) plus expert suggestions for your electrical system.' ],
                ],
                'title_field' => '{{{ title }}}',
            ] );
        $this->end_controls_section();

        /* ── STYLE ── */
        $this->start_controls_section( 'style_s', [ 'label' => __( 'Colours', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'section_bg',   [ 'label' => __( 'Section BG', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#F8FAFC', 'selectors' => [ '{{WRAPPER}} .proc-section'  => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'eyebrow_col',  [ 'label' => __( 'Eyebrow', 'plugin-name' ),       'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .proc-eyebrow'  => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'heading_col',  [ 'label' => __( 'Heading', 'plugin-name' ),       'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .proc-heading'  => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'step_title',   [ 'label' => __( 'Step Title', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .proc-title'    => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'step_desc',    [ 'label' => __( 'Step Desc', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'rgba(11,31,58,0.6)', 'selectors' => [ '{{WRAPPER}} .proc-desc' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'line_color',   [ 'label' => __( 'Progress Line Fill', 'plugin-name' ),'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .proc-line-fill' => 'background-color:{{VALUE}};' ] ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s     = $this->get_settings_for_display();
        $steps = $s['steps'];
        $cols  = count( $steps );
        ?>
        <section class="proc-section py-24 relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16 fade-in">
                    <h2 class="proc-eyebrow text-sm font-bold uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <h3 class="proc-heading text-4xl font-bold mb-4"><?php echo esc_html( $s['heading'] ); ?></h3>
                </div>
                <div class="grid md:grid-cols-<?php echo $cols; ?> gap-12 relative">
                    <!-- Progress line -->
                    <div class="hidden md:block absolute top-[60px] left-[15%] right-[15%] h-1 bg-navy/5 z-0">
                        <div class="proc-line-fill h-full w-1/<?php echo $cols; ?>"></div>
                    </div>
                    <?php foreach ( $steps as $i => $step ) : ?>
                    <div class="relative z-10 text-center fade-in">
                        <div class="w-28 h-28 mx-auto bg-white rounded-full flex items-center justify-center shadow-xl mb-8 relative border-4 border-light-grey">
                            <span class="absolute -top-2 -right-2 w-10 h-10 <?php echo esc_attr( $step['badge_class'] ); ?> text-white rounded-full flex items-center justify-center font-bold">
                                <?php echo $i + 1; ?>
                            </span>
                            <i data-lucide="<?php echo esc_attr( $step['icon'] ); ?>" class="w-12 h-12 <?php echo esc_attr( $step['icon_color'] ); ?>"></i>
                        </div>
                        <h4 class="proc-title text-2xl font-bold mb-4"><?php echo esc_html( $step['title'] ); ?></h4>
                        <p class="proc-desc text-sm leading-relaxed"><?php echo esc_html( $step['description'] ); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}