<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Residential_Electrical_Final_CTA extends \Elementor\Widget_Base {

    public function get_name()       { return 'eicr_final_cta'; }
    public function get_title()      { return __( 'EICR – Final CTA', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-call-to-action'; }
    public function get_keywords()   { return [ 'hte', 'Final CTA', 'packages', 'residential',  'electrical' ]; }

    protected function _register_controls() {

        /* ── CONTENT ── */
        $this->start_controls_section( 'section_content', [ 'label' => __( 'Content', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'heading',     [ 'label' => __( 'Heading', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => "Book Your Residential EICR\nCertificate Today" ] );
            $this->add_control( 'description', [ 'label' => __( 'Description', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXTAREA,  'default' => "Fast, compliant, and hassle-free certification for London's leading landlords and homeowners." ] );
        $this->end_controls_section();

        /* ── BUTTONS ── */
        $this->start_controls_section( 'section_buttons', [ 'label' => __( 'Buttons', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'btn1_text', [ 'label' => __( 'Primary Button Text', 'plugin-name' ),   'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Book Now' ] );
            $this->add_control( 'btn1_url',  [ 'label' => __( 'Primary Button URL', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::URL,  'default' => [ 'url' => '#' ] ] );
            $this->add_control( 'btn2_text', [ 'label' => __( 'Secondary Button Text', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Get Instant Quote' ] );
            $this->add_control( 'btn2_url',  [ 'label' => __( 'Secondary Button URL', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::URL,  'default' => [ 'url' => '#' ] ] );
        $this->end_controls_section();

        /* ── TRUST BADGES ── */
        $this->start_controls_section( 'section_badges', [ 'label' => __( 'Trust Badges', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $rep = new \Elementor\Repeater();
            $rep->add_control( 'badge', [ 'label' => __( 'Badge Text', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'NICEIC APPROVED' ] );
            $this->add_control( 'badges', [
                'label'   => __( 'Badges', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $rep->get_controls(),
                'default' => [
                    [ 'badge' => 'NICEIC APPROVED' ],
                    [ 'badge' => 'TRUSTMARK QUALITY' ],
                    [ 'badge' => 'NAPIT REGISTERED' ],
                ],
                'title_field' => '{{{ badge }}}',
            ] );
        $this->end_controls_section();

        /* ── STYLE ── */
        $this->start_controls_section( 'style_s', [ 'label' => __( 'Colours', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'section_bg',   [ 'label' => __( 'Outer BG', 'plugin-name' ),       'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#ffffff',  'selectors' => [ '{{WRAPPER}} .fcta-outer'    => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'card_bg',      [ 'label' => __( 'Card BG', 'plugin-name' ),        'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A',  'selectors' => [ '{{WRAPPER}} .fcta-card'     => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'heading_col',  [ 'label' => __( 'Heading', 'plugin-name' ),        'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#ffffff',  'selectors' => [ '{{WRAPPER}} .fcta-heading'  => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'body_col',     [ 'label' => __( 'Body Text', 'plugin-name' ),      'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'rgba(255,255,255,0.6)', 'selectors' => [ '{{WRAPPER}} .fcta-body' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'btn1_bg',      [ 'label' => __( 'Primary Btn BG', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF7A00',  'selectors' => [ '{{WRAPPER}} .fcta-btn1'     => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'btn1_hover',   [ 'label' => __( 'Primary Btn Hover', 'plugin-name' ),'type' => \Elementor\Controls_Manager::COLOR,'default' => '#e56e00',  'selectors' => [ '{{WRAPPER}} .fcta-btn1:hover'=> 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'btn2_bg',      [ 'label' => __( 'Secondary Btn BG', 'plugin-name' ),'type' => \Elementor\Controls_Manager::COLOR,'default' => 'rgba(255,255,255,0.1)', 'selectors' => [ '{{WRAPPER}} .fcta-btn2' => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'glow1_color',  [ 'label' => __( 'Glow 1 Colour', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF',  'selectors' => [ '{{WRAPPER}} .fcta-glow1'    => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'glow2_color',  [ 'label' => __( 'Glow 2 Colour', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#28C76F',  'selectors' => [ '{{WRAPPER}} .fcta-glow2'    => 'background-color:{{VALUE}};' ] ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s    = $this->get_settings_for_display();
        $url1 = ! empty( $s['btn1_url']['url'] ) ? esc_url( $s['btn1_url']['url'] ) : '#';
        $url2 = ! empty( $s['btn2_url']['url'] ) ? esc_url( $s['btn2_url']['url'] ) : '#';
        $heading = nl2br( esc_html( $s['heading'] ) );
        ?>
        <section class="fcta-outer py-24 relative overflow-hidden">
            <div class="absolute inset-0 bg-navy opacity-[0.03] z-0"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="fcta-card rounded-[60px] p-12 lg:p-24 text-center text-white shadow-2xl relative overflow-hidden fade-in">
                    <div class="relative z-10">
                        <h2 class="fcta-heading text-4xl lg:text-6xl font-bold mb-6"><?php echo $heading; ?></h2>
                        <p class="fcta-body text-xl mb-12 max-w-2xl mx-auto"><?php echo esc_html( $s['description'] ); ?></p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center">
                            <a href="<?php echo $url1; ?>" class="fcta-btn1 text-white px-10 py-5 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-xl shadow-orange/20">
                                <?php echo esc_html( $s['btn1_text'] ); ?>
                            </a>
                            <a href="<?php echo $url2; ?>" class="fcta-btn2 hover:bg-white/20 border border-white/20 text-white px-10 py-5 rounded-xl font-bold text-lg transition-all">
                                <?php echo esc_html( $s['btn2_text'] ); ?>
                            </a>
                        </div>
                        <?php if ( ! empty( $s['badges'] ) ) : ?>
                        <div class="mt-16 flex flex-wrap justify-center gap-12 opacity-60 grayscale hover:grayscale-0 transition-all">
                            <?php foreach ( $s['badges'] as $b ) : ?>
                            <div class="flex items-center gap-2 font-bold text-sm uppercase tracking-tighter italic">
                                <?php echo esc_html( $b['badge'] ); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <!-- Glow blobs -->
                    <div class="fcta-glow1 absolute -top-1/2 -left-1/4 w-[600px] h-[600px] opacity-20 filter blur-[100px] rounded-full"></div>
                    <div class="fcta-glow2 absolute -bottom-1/2 -right-1/4 w-[600px] h-[600px] opacity-10 filter blur-[100px] rounded-full"></div>
                </div>
            </div>
        </section>
        <?php
    }
}