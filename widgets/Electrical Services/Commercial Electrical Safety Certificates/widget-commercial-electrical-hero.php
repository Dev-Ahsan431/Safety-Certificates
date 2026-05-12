<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Commercial_Electrical_Hero extends \Elementor\Widget_Base {

    public function get_name()       { return 'commercial_hero'; }
    public function get_title()      { return __( 'Commercial – Hero', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-banner'; }
    public function get_keywords()   { return [ 'hte', 'hero', 'banner', 'Commercial',  'electrical' ]; }

    protected function _register_controls() {

        /* ── BADGE ── */
        $this->start_controls_section( 'sec_badge', [ 'label' => __( 'Badge', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'badge_text',  [ 'label' => __( 'Badge Text', 'plugin-name' ),   'type' => \Elementor\Controls_Manager::TEXT, 'default' => '4.9/5 Trusted by London Businesses' ] );
            $this->add_control( 'badge_stars', [ 'label' => __( 'Stars (1–5)', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::NUMBER, 'min' => 1, 'max' => 5, 'default' => 5 ] );
        $this->end_controls_section();

        /* ── HEADLINE ── */
        $this->start_controls_section( 'sec_headline', [ 'label' => __( 'Headline', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'heading_plain',    [ 'label' => __( 'Heading (Plain)', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Commercial EICR' ] );
            $this->add_control( 'heading_accent',   [ 'label' => __( 'Heading (Accent)', 'plugin-name' ),   'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Up to 12 Circuits Only £149.99' ] );
            $this->add_control( 'subheading',       [ 'label' => __( 'Subheading', 'plugin-name' ),         'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Ensure your business is compliant with UK electrical safety regulations. We provide professional, all-inclusive Commercial EICRs with no hidden costs.' ] );
        $this->end_controls_section();

        /* ── BULLET COLUMNS ── */
        $this->start_controls_section( 'sec_bullets', [ 'label' => __( 'Bullet Points', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'bullets_info', [ 'type' => \Elementor\Controls_Manager::RAW_HTML, 'raw' => '<p style="font-size:12px">Bullets are split into two columns automatically by order.</p>', 'separator' => 'after' ] );
            $rep = new \Elementor\Repeater();
            $rep->add_control( 'bullet', [ 'label' => __( 'Bullet Text', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'All inclusive (No hidden costs)' ] );
            $this->add_control( 'bullets', [
                'label'   => __( 'Bullets', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $rep->get_controls(),
                'default' => [
                    [ 'bullet' => 'All inclusive (No hidden costs)' ],
                    [ 'bullet' => 'Add. Consumer Unit: £129.99' ],
                    [ 'bullet' => 'Up to 12 circuits included' ],
                    [ 'bullet' => 'Digital report provided fast' ],
                    [ 'bullet' => 'Additional circuit: £15 each' ],
                    [ 'bullet' => 'Certified Professionals' ],
                ],
                'title_field' => '{{{ bullet }}}',
            ] );
        $this->end_controls_section();

        /* ── BUTTONS ── */
        $this->start_controls_section( 'sec_btns', [ 'label' => __( 'Buttons', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'btn1_text', [ 'label' => __( 'Primary Text', 'plugin-name' ),   'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Book Now' ] );
            $this->add_control( 'btn1_url',  [ 'label' => __( 'Primary URL', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::URL,  'default' => [ 'url' => '#' ] ] );
            $this->add_control( 'btn2_text', [ 'label' => __( 'Secondary Text', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Call 0800 123 456' ] );
            $this->add_control( 'btn2_url',  [ 'label' => __( 'Secondary URL', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::URL,  'default' => [ 'url' => 'tel:+44800123456' ] ] );
        $this->end_controls_section();

        /* ── IMAGE CARD ── */
        $this->start_controls_section( 'sec_image', [ 'label' => __( 'Image Card', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'image',       [ 'label' => __( 'Image', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::MEDIA, 'default' => [ 'url' => 'https://images.unsplash.com/photo-1544724569-5f546fd6f2b5?q=80&w=2070&auto=format&fit=crop' ] ] );
            $this->add_control( 'image_alt',   [ 'label' => __( 'Image Alt', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT,  'default' => 'Commercial Electrical Inspection' ] );
            $this->add_control( 'card_title',  [ 'label' => __( 'Card Title', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT,  'default' => 'Commercial Compliance' ] );
            $this->add_control( 'card_sub',    [ 'label' => __( 'Card Sub-title', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Industry standard safety audits' ] );
            /* Two stat badges */
            $this->add_control( 'stat1_value', [ 'label' => __( 'Stat 1 Value', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '100%' ] );
            $this->add_control( 'stat1_label', [ 'label' => __( 'Stat 1 Label', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Legal Compliance' ] );
            $this->add_control( 'stat1_color', [ 'label' => __( 'Stat 1 Value Colour', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF' ] );
            $this->add_control( 'stat2_value', [ 'label' => __( 'Stat 2 Value', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => '< 24h' ] );
            $this->add_control( 'stat2_label', [ 'label' => __( 'Stat 2 Label', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Fast Turnaround' ] );
            $this->add_control( 'stat2_color', [ 'label' => __( 'Stat 2 Value Colour', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#28C76F' ] );
        $this->end_controls_section();

        /* ── STYLE ── */
        $this->start_controls_section( 'sec_style', [ 'label' => __( 'Colours', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'section_bg',    [ 'label' => __( 'Section BG', 'plugin-name' ),      'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .ch-section'    => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'accent_color',  [ 'label' => __( 'Heading Accent', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .ch-accent'     => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'bullet_icon',   [ 'label' => __( 'Bullet Icon', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#28C76F', 'selectors' => [ '{{WRAPPER}} .ch-check'      => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'btn1_bg',       [ 'label' => __( 'Primary Btn BG', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#FF7A00', 'selectors' => [ '{{WRAPPER}} .ch-btn1'       => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'btn1_hover',    [ 'label' => __( 'Primary Btn Hover', 'plugin-name' ),'type'=> \Elementor\Controls_Manager::COLOR, 'default' => '#e56e00', 'selectors' => [ '{{WRAPPER}} .ch-btn1:hover'  => 'background-color:{{VALUE}};' ] ] );
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
        <section class="ch-section relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden text-white clip-diagonal">
            <div class="absolute inset-0 z-0 opacity-20">
                <div class="absolute top-0 right-1/4 w-96 h-96 bg-electric rounded-full mix-blend-screen filter blur-[100px] animate-pulse"></div>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid lg:grid-cols-2 gap-12 items-center">

                    <!-- LEFT -->
                    <div class="fade-in">
                        <!-- Badge -->
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 backdrop-blur-sm mb-6">
                            <div class="flex text-orange">
                                <?php for ( $i = 0; $i < $stars; $i++ ) : ?><i data-lucide="star" class="w-3 h-3 fill-current"></i><?php endfor; ?>
                            </div>
                            <span class="text-xs font-bold text-white/90"><?php echo esc_html( $s['badge_text'] ); ?></span>
                        </div>
                        <!-- Heading -->
                        <h1 class="text-5xl lg:text-6xl font-bold leading-tight mb-6">
                            <?php echo esc_html( $s['heading_plain'] ); ?><br>
                            <span class="ch-accent"><?php echo esc_html( $s['heading_accent'] ); ?></span>
                        </h1>
                        <p class="text-lg text-white/80 mb-8 leading-relaxed"><?php echo esc_html( $s['subheading'] ); ?></p>
                        <!-- Bullets -->
                        <div class="grid sm:grid-cols-2 gap-4 mb-8">
                            <ul class="space-y-3">
                                <?php foreach ( $col1 as $b ) : ?>
                                <li class="flex items-center gap-2 text-sm text-white/70 font-semibold">
                                    <i data-lucide="check" class="ch-check w-4 h-4"></i>
                                    <?php echo esc_html( $b['bullet'] ); ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                            <ul class="space-y-3">
                                <?php foreach ( $col2 as $b ) : ?>
                                <li class="flex items-center gap-2 text-sm text-white/70 font-semibold">
                                    <i data-lucide="check" class="ch-check w-4 h-4"></i>
                                    <?php echo esc_html( $b['bullet'] ); ?>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <!-- Buttons -->
                        <div class="flex flex-wrap gap-4">
                            <a href="<?php echo $url1; ?>" class="ch-btn1 text-white px-10 py-5 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-[0_0_20px_rgba(255,122,0,0.4)]">
                                <?php echo esc_html( $s['btn1_text'] ); ?>
                            </a>
                            <a href="<?php echo $url2; ?>" class="bg-white/10 hover:bg-white/20 backdrop-blur-md border border-white/20 text-white px-10 py-5 rounded-xl font-bold text-lg transition-all flex items-center gap-2 italic">
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
                                    <div class="w-12 h-12 bg-electric rounded-xl flex items-center justify-center text-white"><i data-lucide="bar-chart-3"></i></div>
                                    <div>
                                        <h4 class="font-bold text-white"><?php echo esc_html( $s['card_title'] ); ?></h4>
                                        <p class="text-xs text-white/50"><?php echo esc_html( $s['card_sub'] ); ?></p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="bg-white/5 p-3 rounded-xl border border-white/10">
                                        <span class="block font-bold text-lg leading-none" style="color:<?php echo esc_attr( $s['stat1_color'] ); ?>"><?php echo esc_html( $s['stat1_value'] ); ?></span>
                                        <span class="text-[10px] text-white/40 uppercase font-bold tracking-wider"><?php echo esc_html( $s['stat1_label'] ); ?></span>
                                    </div>
                                    <div class="bg-white/5 p-3 rounded-xl border border-white/10">
                                        <span class="block font-bold text-lg leading-none" style="color:<?php echo esc_attr( $s['stat2_color'] ); ?>"><?php echo esc_html( $s['stat2_value'] ); ?></span>
                                        <span class="text-[10px] text-white/40 uppercase font-bold tracking-wider"><?php echo esc_html( $s['stat2_label'] ); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute -top-10 -right-10 w-40 h-40 bg-electric rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}