<?php

class HTE_Widget_Commercial_Electrical_Process extends \Elementor\Widget_Base {

    public function get_name()       { return 'commercial_inspection_process'; }
    public function get_title()      { return __( 'Commercial – Inspection Process', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-flow'; }
    public function get_keywords()   { return [ 'hte', 'Process', 'banner', 'Commercial',  'electrical' ]; }
 
    protected function _register_controls() {
        $this->start_controls_section( 'sec_header', [ 'label' => __( 'Header', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'eyebrow', [ 'label' => __( 'Eyebrow', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Our Workflow' ] );
            $this->add_control( 'heading', [ 'label' => __( 'Heading', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Commercial Inspection Process' ] );
        $this->end_controls_section();
 
        $this->start_controls_section( 'sec_steps', [ 'label' => __( 'Steps', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $rep = new \Elementor\Repeater();
            $rep->add_control( 'num',        [ 'label' => __( 'Number/Label', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::TEXT,    'default' => '01' ] );
            $rep->add_control( 'num_bg',     [ 'label' => __( 'Number BG Class', 'plugin-name' ),'type' => \Elementor\Controls_Manager::TEXT,   'default' => 'bg-electric', 'description' => 'e.g. bg-electric, bg-safety' ] );
            $rep->add_control( 'title',      [ 'label' => __( 'Title', 'plugin-name' ),         'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Visual Inspection' ] );
            $rep->add_control( 'desc',       [ 'label' => __( 'Description', 'plugin-name' ),   'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Checking for visible damage, wear, or non-compliance in wiring, distribution boards, and circuits.' ] );
            $this->add_control( 'steps', [
                'label'   => __( 'Steps', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $rep->get_controls(),
                'default' => [
                    [ 'num' => '01', 'num_bg' => 'bg-electric', 'title' => 'Visual Inspection',    'desc' => 'Checking for visible damage, wear, or non-compliance in wiring, distribution boards, and circuits.' ],
                    [ 'num' => '02', 'num_bg' => 'bg-electric', 'title' => 'Live Testing',          'desc' => 'Using advanced diagnostic tools to measure insulation resistance, earth fault loop impedance, and RCD performance.' ],
                    [ 'num' => '03', 'num_bg' => 'bg-electric', 'title' => 'Safety Verification',  'desc' => 'Ensuring circuits are not overloaded and protective devices function correctly under operating loads.' ],
                    [ 'num' => '04', 'num_bg' => 'bg-electric', 'title' => 'Full Reporting',        'desc' => 'Providing a clear, coded EICR certificate (Pass/Fail) with detailed remedial recommendations if needed.' ],
                    [ 'num' => '05', 'num_bg' => 'bg-safety',   'title' => 'Remedial Work',         'desc' => 'If required, our team can fix any issues identified to ensure your business reaches full compliance quickly.' ],
                ],
                'title_field' => '{{{ title }}}',
            ] );
        $this->end_controls_section();
 
        $this->start_controls_section( 'sec_cta_card', [ 'label' => __( 'CTA Tile', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'cta_text', [ 'label' => __( 'CTA Tile Text', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Professional Certification in 24h' ] );
        $this->end_controls_section();
 
        $this->start_controls_section( 'sec_style', [ 'label' => __( 'Colours', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'section_bg',  [ 'label' => __( 'Section BG', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .ciproc-section' => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'eyebrow_col', [ 'label' => __( 'Eyebrow', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .ciproc-eyebrow' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'step_title',  [ 'label' => __( 'Step Title', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#ffffff', 'selectors' => [ '{{WRAPPER}} .ciproc-title'   => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'step_desc',   [ 'label' => __( 'Step Desc', 'plugin-name' ),   'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'rgba(255,255,255,0.6)', 'selectors' => [ '{{WRAPPER}} .ciproc-desc' => 'color:{{VALUE}};' ] ] );
        $this->end_controls_section();
    }
 
    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="ciproc-section py-24 text-white clip-diagonal">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16 fade-in">
                    <h2 class="ciproc-eyebrow text-sm font-bold uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <h3 class="text-4xl font-bold text-white mb-4"><?php echo esc_html( $s['heading'] ); ?></h3>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php foreach ( $s['steps'] as $step ) : ?>
                    <div class="bg-white/5 border border-white/10 p-8 rounded-3xl fade-in">
                        <div class="w-12 h-12 <?php echo esc_attr( $step['num_bg'] ); ?> rounded-xl flex items-center justify-center text-white mb-6 font-bold">
                            <?php echo esc_html( $step['num'] ); ?>
                        </div>
                        <h4 class="ciproc-title text-xl font-bold mb-3"><?php echo esc_html( $step['title'] ); ?></h4>
                        <p class="ciproc-desc text-sm leading-relaxed"><?php echo esc_html( $step['desc'] ); ?></p>
                    </div>
                    <?php endforeach; ?>
                    <!-- CTA tile -->
                    <div class="bg-white/5 border border-white/10 p-8 rounded-3xl flex items-center justify-center text-center fade-in">
                        <div>
                            <div class="w-16 h-16 bg-white/10 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i data-lucide="plus"></i>
                            </div>
                            <p class="text-white font-bold"><?php echo esc_html( $s['cta_text'] ); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}