<?php

class HTE_Widget_Commercial_Electrical_Final_Cta  extends \Elementor\Widget_Base {

    public function get_name()       { return 'commercial_final_cta'; }
    public function get_title()      { return __( 'Commercial – Final CTA', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-call-to-action'; }
    public function get_keywords()   { return [ 'hte', 'Final_CTA', 'banner', 'Commercial',  'electrical' ]; }
 
    protected function _register_controls() {
        $this->start_controls_section( 'sec_content', [ 'label' => __( 'Content', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'heading',     [ 'label' => __( 'Heading', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => "Book Your Commercial\nEICR Certification Today" ] );
            $this->add_control( 'description', [ 'label' => __( 'Description', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXTAREA,  'default' => "London's most trusted compliance partner for small and large businesses." ] );
            $this->add_control( 'btn1_text',   [ 'label' => __( 'Primary Btn Text', 'plugin-name' ),   'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Book Now' ] );
            $this->add_control( 'btn1_url',    [ 'label' => __( 'Primary Btn URL', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::URL,  'default' => [ 'url' => '#' ] ] );
            $this->add_control( 'btn2_text',   [ 'label' => __( 'Secondary Btn Text', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Contact Us' ] );
            $this->add_control( 'btn2_url',    [ 'label' => __( 'Secondary Btn URL', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::URL,  'default' => [ 'url' => 'tel:+44800123456' ] ] );
        $this->end_controls_section();
 
        $this->start_controls_section( 'sec_style', [ 'label' => __( 'Colours', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'outer_bg',    [ 'label' => __( 'Outer BG', 'plugin-name' ),        'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#F8FAFC', 'selectors' => [ '{{WRAPPER}} .ccta-outer'    => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'card_bg',     [ 'label' => __( 'Card BG', 'plugin-name' ),         'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .ccta-card'     => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'heading_col', [ 'label' => __( 'Heading Colour', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#ffffff', 'selectors' => [ '{{WRAPPER}} .ccta-heading'  => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'body_col',    [ 'label' => __( 'Body Colour', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'rgba(255,255,255,0.6)', 'selectors' => [ '{{WRAPPER}} .ccta-body' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'btn1_bg',     [ 'label' => __( 'Primary Btn BG', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF7A00', 'selectors' => [ '{{WRAPPER}} .ccta-btn1'     => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'btn1_hover',  [ 'label' => __( 'Primary Btn Hover', 'plugin-name' ),'type'=> \Elementor\Controls_Manager::COLOR, 'default' => '#e56e00', 'selectors' => [ '{{WRAPPER}} .ccta-btn1:hover'=> 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'glow1_col',   [ 'label' => __( 'Glow 1', 'plugin-name' ),          'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .ccta-glow1'    => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'glow2_col',   [ 'label' => __( 'Glow 2', 'plugin-name' ),          'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#28C76F', 'selectors' => [ '{{WRAPPER}} .ccta-glow2'    => 'background-color:{{VALUE}};' ] ] );
        $this->end_controls_section();
    }
 
    protected function render() {
        $s    = $this->get_settings_for_display();
        $url1 = ! empty( $s['btn1_url']['url'] ) ? esc_url( $s['btn1_url']['url'] ) : '#';
        $url2 = ! empty( $s['btn2_url']['url'] ) ? esc_url( $s['btn2_url']['url'] ) : '#';
        $heading = nl2br( esc_html( $s['heading'] ) );
        ?>
        <section class="ccta-outer py-24 relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
                <div class="ccta-card rounded-[60px] p-12 lg:p-24 text-white shadow-2xl relative overflow-hidden fade-in">
                    <h2 class="ccta-heading text-4xl lg:text-6xl font-bold mb-6"><?php echo $heading; ?></h2>
                    <p class="ccta-body text-xl mb-12 max-w-2xl mx-auto"><?php echo esc_html( $s['description'] ); ?></p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="<?php echo $url1; ?>" class="ccta-btn1 text-white px-10 py-5 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-xl shadow-orange/20">
                            <?php echo esc_html( $s['btn1_text'] ); ?>
                        </a>
                        <a href="<?php echo $url2; ?>" class="bg-white/10 hover:bg-white/20 border border-white/20 text-white px-10 py-5 rounded-xl font-bold text-lg transition-all">
                            <?php echo esc_html( $s['btn2_text'] ); ?>
                        </a>
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-tr from-navy via-navy to-electric opacity-10"></div>
                    <div class="ccta-glow1 absolute -top-1/2 -left-1/4 w-[600px] h-[600px] opacity-20 filter blur-[100px] rounded-full"></div>
                    <div class="ccta-glow2 absolute -bottom-1/2 -right-1/4 w-[600px] h-[600px] opacity-10 filter blur-[100px] rounded-full"></div>
                </div>
            </div>
        </section>
        <?php
    }
}