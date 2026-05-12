<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Electrical_FF_Hero extends \Elementor\Widget_Base {

    public function get_name()       { return 'ff_hero'; }
    public function get_title()      { return __( 'Fault Finding – Hero', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-banner'; }
    public function get_keywords()   { return [ 'hte', 'hero', 'banner', 'FF',  'electrical' ]; }

    protected function _register_controls() {

        /* ── BADGE ── */
        $this->start_controls_section( 'sec_badge', [ 'label' => __( 'Badge', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'badge_text',  [ 'label' => __( 'Badge Text', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::TEXT,   'default' => '4.9/5 Trusted London Diagnostics' ] );
            $this->add_control( 'badge_stars', [ 'label' => __( 'Stars (1–5)', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::NUMBER, 'min' => 1, 'max' => 5, 'default' => 5 ] );
        $this->end_controls_section();

        /* ── HEADLINE ── */
        $this->start_controls_section( 'sec_headline', [ 'label' => __( 'Headline', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'heading_plain',  [ 'label' => __( 'Heading Plain', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Expert Electrical' ] );
            $this->add_control( 'heading_accent', [ 'label' => __( 'Heading Accent', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Fault Finding & Repairs' ] );
            $this->add_control( 'subheading',     [ 'label' => __( 'Subheading (HTML)', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::WYSIWYG, 'default' => 'Pinpoint electrical issues with precision. Starting from <span class="text-white font-bold">£99.99 Per Hour</span> with no hidden costs.' ] );
        $this->end_controls_section();

        /* ── BULLETS ── */
        $this->start_controls_section( 'sec_bullets', [ 'label' => __( 'Bullet Points', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $rep = new \Elementor\Repeater();
            $rep->add_control( 'bullet', [ 'label' => __( 'Text', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Qualified electricians' ] );
            $this->add_control( 'bullets', [
                'label' => __( 'Bullets', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $rep->get_controls(),
                'default' => [
                    [ 'bullet' => 'Qualified electricians' ],
                    [ 'bullet' => 'Residential & Commercial' ],
                    [ 'bullet' => 'Advanced testing equipment' ],
                    [ 'bullet' => 'All-inclusive pricing' ],
                ],
                'title_field' => '{{{ bullet }}}',
            ] );
        $this->end_controls_section();

        /* ── BUTTONS ── */
        $this->start_controls_section( 'sec_btns', [ 'label' => __( 'Buttons', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'btn1_text', [ 'label' => __( 'Primary Text', 'plugin-name' ),   'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Book Your Diagnostic' ] );
            $this->add_control( 'btn1_url',  [ 'label' => __( 'Primary URL', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::URL,  'default' => [ 'url' => '#' ] ] );
            $this->add_control( 'btn2_text', [ 'label' => __( 'Secondary Text', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Call Now' ] );
            $this->add_control( 'btn2_url',  [ 'label' => __( 'Secondary URL', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::URL,  'default' => [ 'url' => 'tel:+44800123456' ] ] );
        $this->end_controls_section();

        /* ── IMAGE CARD ── */
        $this->start_controls_section( 'sec_image', [ 'label' => __( 'Image Card', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'image',          [ 'label' => __( 'Image', 'plugin-name' ),          'type' => \Elementor\Controls_Manager::MEDIA, 'default' => [ 'url' => 'https://images.unsplash.com/photo-1581092160562-40aa08e78837?q=80&w=2070&auto=format&fit=crop' ] ] );
            $this->add_control( 'image_alt',      [ 'label' => __( 'Image Alt', 'plugin-name' ),      'type' => \Elementor\Controls_Manager::TEXT,  'default' => 'Electrician using diagnostic tools' ] );
            $this->add_control( 'card_title',     [ 'label' => __( 'Card Title', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::TEXT,  'default' => 'Live Diagnostics' ] );
            $this->add_control( 'card_subtitle',  [ 'label' => __( 'Card Sub-title', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT,  'default' => 'Real-time system analysis' ] );
            $this->add_control( 'bar_label_left', [ 'label' => __( 'Bar Label Left', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT,  'default' => 'Signal Strength' ] );
            $this->add_control( 'bar_label_right',[ 'label' => __( 'Bar Label Right','plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT,  'default' => 'Optimized' ] );
            $this->add_control( 'bar_percent',    [ 'label' => __( 'Bar % (1–100)', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::NUMBER, 'min' => 1, 'max' => 100, 'default' => 95 ] );
        $this->end_controls_section();

        /* ── STYLE ── */
        $this->start_controls_section( 'sec_style', [ 'label' => __( 'Colours', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'section_bg',   [ 'label' => __( 'Section BG', 'plugin-name' ),      'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .ffh-section'   => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'accent_color', [ 'label' => __( 'Heading Accent', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .ffh-accent'    => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'bullet_icon',  [ 'label' => __( 'Bullet Icon', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#28C76F', 'selectors' => [ '{{WRAPPER}} .ffh-check'     => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'btn1_bg',      [ 'label' => __( 'Primary Btn BG', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF7A00', 'selectors' => [ '{{WRAPPER}} .ffh-btn1'      => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'btn1_hover',   [ 'label' => __( 'Primary Btn Hover', 'plugin-name' ),'type' => \Elementor\Controls_Manager::COLOR,'default' => '#e56e00', 'selectors' => [ '{{WRAPPER}} .ffh-btn1:hover' => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'bar_color',    [ 'label' => __( 'Progress Bar', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#28C76F', 'selectors' => [ '{{WRAPPER}} .ffh-bar'       => 'background-color:{{VALUE}};' ] ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s    = $this->get_settings_for_display();
        $url1 = ! empty( $s['btn1_url']['url'] ) ? esc_url( $s['btn1_url']['url'] ) : '#';
        $url2 = ! empty( $s['btn2_url']['url'] ) ? esc_url( $s['btn2_url']['url'] ) : '#';
        $img  = ! empty( $s['image']['url'] ) ? esc_url( $s['image']['url'] ) : '';
        $stars = (int) $s['badge_stars'];
        $bullets = $s['bullets'];
        $half = (int) ceil( count( $bullets ) / 2 );
        $col1 = array_slice( $bullets, 0, $half );
        $col2 = array_slice( $bullets, $half );
        ?>
        <section class="ffh-section relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden text-white clip-diagonal">
            <div class="absolute inset-0 z-0 opacity-20">
                <div class="absolute top-0 right-1/4 w-96 h-96 bg-electric rounded-full mix-blend-screen filter blur-[100px] animate-pulse"></div>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid lg:grid-cols-2 gap-12 items-center">

                    <!-- LEFT -->
                    <div class="fade-in">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 backdrop-blur-sm mb-6">
                            <div class="flex text-orange">
                                <?php for ( $i = 0; $i < $stars; $i++ ) : ?><i data-lucide="star" class="w-3 h-3 fill-current"></i><?php endfor; ?>
                            </div>
                            <span class="text-xs font-bold text-white/90"><?php echo esc_html( $s['badge_text'] ); ?></span>
                        </div>
                        <h1 class="text-5xl lg:text-6xl font-bold leading-tight mb-6">
                            <?php echo esc_html( $s['heading_plain'] ); ?><br>
                            <span class="ffh-accent font-heading"><?php echo esc_html( $s['heading_accent'] ); ?></span>
                        </h1>
                        <div class="text-xl text-white/80 mb-8 leading-relaxed max-w-xl">
                            <?php echo wp_kses_post( $s['subheading'] ); ?>
                        </div>
                        <div class="grid sm:grid-cols-2 gap-4 mb-8">
                            <ul class="space-y-3">
                                <?php foreach ( $col1 as $b ) : ?>
                                <li class="flex items-center gap-3 text-sm text-white/70">
                                    <i data-lucide="check-circle-2" class="ffh-check w-4 h-4"></i>
                                    <?php echo esc_html( $b['bullet'] ); ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <ul class="space-y-3">
                                <?php foreach ( $col2 as $b ) : ?>
                                <li class="flex items-center gap-3 text-sm text-white/70">
                                    <i data-lucide="check-circle-2" class="ffh-check w-4 h-4"></i>
                                    <?php echo esc_html( $b['bullet'] ); ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="flex flex-wrap gap-4">
                            <a href="<?php echo $url1; ?>" class="ffh-btn1 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-lg shadow-orange/20 flex items-center gap-2">
                                <?php echo esc_html( $s['btn1_text'] ); ?>
                            </a>
                            <a href="<?php echo $url2; ?>" class="bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/20 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all flex items-center gap-2 italic">
                                <?php echo esc_html( $s['btn2_text'] ); ?>
                            </a>
                        </div>
                    </div>

                    <!-- RIGHT: Image card -->
                    <div class="relative hidden lg:block slide-in-right">
                        <div class="glass-dark p-4 rounded-[40px] shadow-2xl border border-white/10 relative z-10 overflow-hidden">
                            <?php if ( $img ) : ?>
                            <img src="<?php echo $img; ?>" alt="<?php echo esc_attr( $s['image_alt'] ); ?>" class="rounded-[32px] w-full h-[500px] object-cover" referrerpolicy="no-referrer">
                            <?php endif; ?>
                            <div class="absolute bottom-10 left-10 right-10 bg-navy/90 backdrop-blur-md border border-white/10 p-6 rounded-2xl shadow-xl">
                                <div class="flex items-center gap-4 mb-4">
                                    <div class="w-12 h-12 bg-electric rounded-xl flex items-center justify-center text-white"><i data-lucide="activity"></i></div>
                                    <div>
                                        <h4 class="font-bold text-white"><?php echo esc_html( $s['card_title'] ); ?></h4>
                                        <p class="text-xs text-white/50"><?php echo esc_html( $s['card_subtitle'] ); ?></p>
                                    </div>
                                </div>
                                <div class="space-y-2">
                                    <div class="h-1.5 w-full bg-white/10 rounded-full overflow-hidden">
                                        <div class="ffh-bar h-full rounded-full" style="width:<?php echo (int) $s['bar_percent']; ?>%"></div>
                                    </div>
                                    <div class="flex justify-between text-[10px] uppercase font-bold text-white/40">
                                        <span><?php echo esc_html( $s['bar_label_left'] ); ?></span>
                                        <span><?php echo esc_html( $s['bar_label_right'] ); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}