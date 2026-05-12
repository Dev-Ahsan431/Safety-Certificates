<?php
/**
 * Widget: Gas Safety – Why Us Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Gas_Safety_Why_Us extends \Elementor\Widget_Base {

    /* ── Identity ─────────────────────────────────────────────────────── */

    public function get_name()       { return 'hte-gas-safety-why-us'; }
    public function get_title()      { return __( 'HTE – Gas Safety Why Us', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-star'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'why us', 'features', 'benefits', 'gas', 'safety', 'trust' ]; }

    /* ── Controls ─────────────────────────────────────────────────────── */

    protected function register_controls() {

        /* ── Feature Tiles (left grid) ── */
        $this->start_controls_section( 'sec_tiles', [
            'label' => __( 'Feature Tiles (Left Grid)', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'tile_icon', [
                'label'   => __( 'Lucide Icon Name', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'zap',
            ] );

            $repeater->add_control( 'tile_icon_color', [
                'label'   => __( 'Icon Color Class', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'text-orange',
            ] );

            $repeater->add_control( 'tile_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( '24h Response', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'tile_desc', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Emergency & next-day slots across London.', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'tile_bg_class', [
                'label'       => __( 'Background Class', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'description' => __( 'e.g. bg-light-grey, bg-navy, bg-electric', 'html-to-elementor' ),
                'default'     => 'bg-light-grey',
            ] );

            $repeater->add_control( 'tile_text_class', [
                'label'   => __( 'Text Color Class', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'text-navy',
            ] );

            $repeater->add_control( 'tile_desc_class', [
                'label'   => __( 'Description Color Class', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'text-navy/50',
            ] );

            $this->add_control( 'tiles', [
                'label'       => __( 'Tiles', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'tile_icon' => 'zap',          'tile_icon_color' => 'text-orange',  'tile_title' => '24h Response', 'tile_desc' => 'Emergency & next-day slots across London.',       'tile_bg_class' => 'bg-light-grey', 'tile_text_class' => 'text-navy',  'tile_desc_class' => 'text-navy/50' ],
                    [ 'tile_icon' => 'check-circle', 'tile_icon_color' => 'text-safety',  'tile_title' => 'Certified',    'tile_desc' => '100% Gas Safe registered expert engineers.',        'tile_bg_class' => 'bg-navy',       'tile_text_class' => 'text-white', 'tile_desc_class' => 'text-white/40' ],
                    [ 'tile_icon' => 'smartphone',   'tile_icon_color' => 'text-white',   'tile_title' => 'Digital',      'tile_desc' => 'Certificates emailed instantly from on-site.',      'tile_bg_class' => 'bg-electric',   'tile_text_class' => 'text-white', 'tile_desc_class' => 'text-white/70' ],
                    [ 'tile_icon' => 'pound-sterling','tile_icon_color' => 'text-navy',   'tile_title' => 'Fixed Price',  'tile_desc' => 'From £57.99 with no hidden London fees.',            'tile_bg_class' => 'bg-light-grey', 'tile_text_class' => 'text-navy',  'tile_desc_class' => 'text-navy/50' ],
                ],
                'title_field' => '{{{ tile_title }}}',
            ] );

        $this->end_controls_section();

        /* ── Right Column Text ── */
        $this->start_controls_section( 'sec_text', [
            'label' => __( 'Right Column', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Quality Guaranteed', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( "London's Reliable Gas Engineers", 'html-to-elementor' ),
            ] );

            $this->add_control( 'description', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'We pride ourselves on punctuality and precision. Our engineers are London locals who understand the specific requirements of townhouses, high-rise apartments, and commercial conversions.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Bullet Points ── */
        $this->start_controls_section( 'sec_bullets', [
            'label' => __( 'Bullet Points', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $bullet_rep = new \Elementor\Repeater();
            $bullet_rep->add_control( 'bullet_text', [
                'label'   => __( 'Bullet Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Fully Vetted & Insured Engineers', 'html-to-elementor' ),
            ] );

            $this->add_control( 'bullets', [
                'label'       => __( 'Bullet Points', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $bullet_rep->get_controls(),
                'default'     => [
                    [ 'bullet_text' => 'Fully Vetted & Insured Engineers' ],
                    [ 'bullet_text' => 'Compliant with all UK HSE Regulations' ],
                    [ 'bullet_text' => 'Detailed Reports for Peace of Mind' ],
                ],
                'title_field' => '{{{ bullet_text }}}',
            ] );

        $this->end_controls_section();

        /* ── CTA Button ── */
        $this->start_controls_section( 'sec_cta', [
            'label' => __( 'CTA Button', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'btn_text', [
                'label'   => __( 'Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Talk to an Engineer', 'html-to-elementor' ),
            ] );

            $this->add_control( 'btn_link', [
                'label'   => __( 'Button Link', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => 'tel:02081455369' ],
            ] );

        $this->end_controls_section();
    }

    /* ── Render ───────────────────────────────────────────────────────── */

    protected function render() {
        $s          = $this->get_settings_for_display();
        $btn_target = ! empty( $s['btn_link']['is_external'] ) ? ' target="_blank"' : '';
        $btn_norel  = ! empty( $s['btn_link']['nofollow'] )    ? ' rel="nofollow"'  : '';
        ?>
        <section id="why-us" class="section-why-us py-24 bg-white overflow-hidden">
            <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col lg:flex-row items-center gap-20">

                    <!-- Left: Tile Grid -->
                    <div class="lg:w-1/2">
                        <div class="grid grid-cols-2 gap-4">
                            <?php
                            $tile_count = 0;
                            foreach ( $s['tiles'] as $tile ) :
                                $tile_count++;
                                $offset = ( $tile_count === 1 ) ? ' mt-10' : ( ( $tile_count === 4 ) ? ' mt-[-2.5rem]' : '' );
                            ?>
                                <div class="<?php echo esc_attr( $tile['tile_bg_class'] ); ?> p-10 rounded-[2.5rem]<?php echo $offset; ?>">
                                    <i data-lucide="<?php echo esc_attr( $tile['tile_icon'] ); ?>" class="w-10 h-10 <?php echo esc_attr( $tile['tile_icon_color'] ); ?> mb-6"></i>
                                    <h4 class="font-bold text-xl <?php echo esc_attr( $tile['tile_text_class'] ); ?> mb-2"><?php echo esc_html( $tile['tile_title'] ); ?></h4>
                                    <p class="text-sm <?php echo esc_attr( $tile['tile_desc_class'] ); ?>"><?php echo esc_html( $tile['tile_desc'] ); ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Right: Text -->
                    <div class="lg:w-1/2">
                        <h2 class="text-sm font-bold text-electric uppercase tracking-widest mb-4"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                        <h3 class="text-4xl md:text-5xl font-bold text-navy mb-8 font-heading"><?php echo esc_html( $s['heading'] ); ?></h3>
                        <p class="text-lg text-navy/60 mb-8 leading-relaxed"><?php echo esc_html( $s['description'] ); ?></p>

                        <ul class="space-y-4 mb-10">
                            <?php foreach ( $s['bullets'] as $bullet ) : ?>
                                <li class="flex items-center gap-3 font-bold text-navy">
                                    <i data-lucide="clipboard-check" class="text-safety"></i>
                                    <?php echo esc_html( $bullet['bullet_text'] ); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>

                        <a href="<?php echo esc_url( $s['btn_link']['url'] ); ?>"<?php echo $btn_target . $btn_norel; ?>
                           class="inline-flex items-center gap-3 bg-navy text-white px-8 py-4 rounded-2xl font-bold hover:bg-electric transition-all">
                            <?php echo esc_html( $s['btn_text'] ); ?>
                            <i data-lucide="phone" class="w-5 h-5"></i>
                        </a>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}