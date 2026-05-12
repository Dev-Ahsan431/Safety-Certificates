<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Residential_Electrical_Pillars extends \Elementor\Widget_Base {

    public function get_name()       { return 'eicr_pillars'; }
    public function get_title()      { return __( 'EICR – Core Pillars', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-columns'; }
    public function get_keywords()   { return [ 'hte', 'Pillars', 'packages', 'residential',  'electrical' ]; }

    protected function _register_controls() {

        /* ── HEADER ── */
        $this->start_controls_section( 'section_header', [ 'label' => __( 'Section Header', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'eyebrow', [ 'label' => __( 'Eyebrow', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Standards' ] );
            $this->add_control( 'heading', [ 'label' => __( 'Heading', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Core Pillars of Compliance' ] );
        $this->end_controls_section();

        /* ── PILLARS ── */
        $this->start_controls_section( 'section_pillars', [ 'label' => __( 'Pillar Items', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $rep = new \Elementor\Repeater();
            $rep->add_control( 'icon',     [ 'label' => __( 'Icon', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'calendar-clock' ] );
            $rep->add_control( 'title',    [ 'label' => __( 'Title', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Frequency' ] );
            $rep->add_control( 'subtitle', [ 'label' => __( 'Sub-title', 'plugin-name' ),'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Mandatory 5-Year Cycle' ] );
            $this->add_control( 'pillars', [
                'label'   => __( 'Pillars', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $rep->get_controls(),
                'default' => [
                    [ 'icon' => 'calendar-clock',  'title' => 'Frequency',     'subtitle' => 'Mandatory 5-Year Cycle' ],
                    [ 'icon' => 'user-check-2',    'title' => 'Personnel',     'subtitle' => 'Qualified & Registered' ],
                    [ 'icon' => 'clipboard-list',  'title' => 'Reporting',     'subtitle' => 'Comprehensive Analysis' ],
                    [ 'icon' => 'briefcase',        'title' => 'Obligations',   'subtitle' => 'Legal Duty of Care' ],
                    [ 'icon' => 'file-text',        'title' => 'Documentation', 'subtitle' => 'Proof of Safety' ],
                ],
                'title_field' => '{{{ title }}}',
            ] );
        $this->end_controls_section();

        /* ── STYLE ── */
        $this->start_controls_section( 'style_s', [ 'label' => __( 'Colours', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'section_bg',    [ 'label' => __( 'Section BG', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#ffffff',  'selectors' => [ '{{WRAPPER}} .pil-section'   => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'eyebrow_col',   [ 'label' => __( 'Eyebrow', 'plugin-name' ),       'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF',  'selectors' => [ '{{WRAPPER}} .pil-eyebrow'   => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'heading_col',   [ 'label' => __( 'Heading', 'plugin-name' ),       'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A',  'selectors' => [ '{{WRAPPER}} .pil-heading'   => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'card_bg',       [ 'label' => __( 'Card BG', 'plugin-name' ),       'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#F8FAFC',  'selectors' => [ '{{WRAPPER}} .pil-card'      => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'icon_col',      [ 'label' => __( 'Icon Colour', 'plugin-name' ),   'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF',  'selectors' => [ '{{WRAPPER}} .pil-icon'      => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'title_col',     [ 'label' => __( 'Card Title', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A',  'selectors' => [ '{{WRAPPER}} .pil-title'     => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'subtitle_col',  [ 'label' => __( 'Card Sub-title', 'plugin-name' ),'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'rgba(11,31,58,0.4)', 'selectors' => [ '{{WRAPPER}} .pil-subtitle' => 'color:{{VALUE}};' ] ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="pil-section py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16 fade-in">
                    <h2 class="pil-eyebrow text-sm font-bold uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <h3 class="pil-heading text-4xl font-bold mb-4"><?php echo esc_html( $s['heading'] ); ?></h3>
                </div>
                <div class="grid grid-cols-2 lg:grid-cols-<?php echo count( $s['pillars'] ); ?> gap-6">
                    <?php foreach ( $s['pillars'] as $p ) : ?>
                    <div class="pil-card p-8 rounded-3xl text-center fade-in hover:shadow-lg transition-all border border-transparent hover:border-electric/10">
                        <div class="pil-icon mb-4 flex justify-center"><i data-lucide="<?php echo esc_attr( $p['icon'] ); ?>" class="w-8 h-8"></i></div>
                        <h4 class="pil-title font-bold text-sm mb-2"><?php echo esc_html( $p['title'] ); ?></h4>
                        <p class="pil-subtitle text-[10px] uppercase font-bold tracking-widest"><?php echo esc_html( $p['subtitle'] ); ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php
    }
}