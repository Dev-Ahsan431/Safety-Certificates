<?php
/**
 * Widget: Electrical Fault Finding – Why Professional Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Electrical_Fault_Why_Professional extends \Elementor\Widget_Base {

    /* ── Identity ─────────────────────────────────────────────────────── */

    public function get_name()       { return 'hte-electrical-fault-why-professional'; }
    public function get_title()      { return __( 'HTE – Electrical Fault: Why Professional', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-person'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'electrical', 'professional', 'why', 'expertise', 'fault', 'electrician' ]; }

    /* ── Controls ─────────────────────────────────────────────────────── */

    protected function register_controls() {

        /* ── Tiles (Left Grid) ── */
        $this->start_controls_section( 'sec_tiles', [
            'label' => __( 'Tiles (Left Grid)', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'tile_label', [
                'label'   => __( 'Label (small uppercase)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Expertise',
            ] );

            $repeater->add_control( 'tile_text', [
                'label'   => __( 'Main Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Deep technical training and experience.', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'tile_bg_class', [
                'label'       => __( 'Background Class', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'description' => __( 'e.g. bg-navy, bg-electric, bg-safety, bg-orange', 'html-to-elementor' ),
                'default'     => 'bg-navy',
            ] );

            $repeater->add_control( 'tile_offset', [
                'label'        => __( 'Offset Down? (translate-y-8)', 'html-to-elementor' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Yes', 'html-to-elementor' ),
                'label_off'    => __( 'No', 'html-to-elementor' ),
                'return_value' => 'yes',
                'default'      => '',
            ] );

            $this->add_control( 'tiles', [
                'label'       => __( 'Tiles', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'tile_label' => 'Expertise',   'tile_text' => 'Deep technical training and experience.',        'tile_bg_class' => 'bg-navy',     'tile_offset' => '' ],
                    [ 'tile_label' => 'Technology',  'tile_text' => 'Advanced specialized diagnostic tools.',         'tile_bg_class' => 'bg-electric', 'tile_offset' => 'yes' ],
                    [ 'tile_label' => 'Safety',      'tile_text' => 'Risk-managed approach to high voltage.',         'tile_bg_class' => 'bg-safety',   'tile_offset' => '' ],
                    [ 'tile_label' => 'Value',       'tile_text' => 'Preventing major future repair costs.',          'tile_bg_class' => 'bg-orange',   'tile_offset' => 'yes' ],
                ],
                'title_field' => '{{{ tile_label }}}',
            ] );

        $this->end_controls_section();

        /* ── Right Column ── */
        $this->start_controls_section( 'sec_right', [
            'label' => __( 'Right Column', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Why Professional Electrical Fault Finding Is Important?', 'html-to-elementor' ),
            ] );

            $this->add_control( 'description', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Electrical diagnostics require more than just a visual check. Professional electricians use specialized equipment like insulation resistance testers and loop impedance meters to find faults hidden deep within your wiring.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Bullet Points ── */
        $this->start_controls_section( 'sec_bullets', [
            'label' => __( 'Bullet Points', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $bullet_rep = new \Elementor\Repeater();
            $bullet_rep->add_control( 'bullet_text', [
                'label'   => __( 'Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Accurate diagnosis the first time',
            ] );

            $this->add_control( 'bullets', [
                'label'       => __( 'Bullets', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $bullet_rep->get_controls(),
                'default'     => [
                    [ 'bullet_text' => 'Accurate diagnosis the first time' ],
                    [ 'bullet_text' => 'Prevents over-repair (saving you money)' ],
                    [ 'bullet_text' => 'Ensures safety thresholds are maintained' ],
                ],
                'title_field' => '{{{ bullet_text }}}',
            ] );

        $this->end_controls_section();

        /* ── CTA Link ── */
        $this->start_controls_section( 'sec_cta', [
            'label' => __( 'CTA Link', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'cta_text', [
                'label'   => __( 'CTA Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Learn more about our standards', 'html-to-elementor' ),
            ] );

            $this->add_control( 'cta_link', [
                'label'   => __( 'CTA Link', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#' ],
            ] );

        $this->end_controls_section();
    }

    /* ── Render ───────────────────────────────────────────────────────── */

    protected function render() {
        $s          = $this->get_settings_for_display();
        $cta_target = ! empty( $s['cta_link']['is_external'] ) ? ' target="_blank"' : '';
        $cta_norel  = ! empty( $s['cta_link']['nofollow'] )    ? ' rel="nofollow"'  : '';
        ?>
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <!-- Left: Tile Grid -->
                    <div class="order-2 lg:order-1">
                        <div class="grid grid-cols-2 gap-4">
                            <?php foreach ( $s['tiles'] as $tile ) :
                                $offset_class = ( 'yes' === $tile['tile_offset'] ) ? ' translate-y-8' : '';
                            ?>
                                <div class="<?php echo esc_attr( $tile['tile_bg_class'] ); ?> p-8 rounded-3xl text-white transform<?php echo $offset_class; ?> hover:-translate-y-2 transition-all">
                                    <div class="text-white/40 font-bold mb-4 text-xs tracking-widest uppercase"><?php echo esc_html( $tile['tile_label'] ); ?></div>
                                    <p class="text-lg font-bold"><?php echo esc_html( $tile['tile_text'] ); ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Right: Text -->
                    <div class="order-1 lg:order-2">
                        <h2 class="text-4xl font-bold text-navy mb-6"><?php echo esc_html( $s['heading'] ); ?></h2>
                        <p class="text-lg text-navy/70 mb-8 leading-relaxed"><?php echo esc_html( $s['description'] ); ?></p>

                        <div class="space-y-4 mb-8">
                            <?php foreach ( $s['bullets'] as $bullet ) : ?>
                                <div class="flex items-center gap-3 font-semibold text-navy">
                                    <i data-lucide="check-circle-2" class="text-safety shrink-0"></i>
                                    <?php echo esc_html( $bullet['bullet_text'] ); ?>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <a href="<?php echo esc_url( $s['cta_link']['url'] ); ?>"<?php echo $cta_target . $cta_norel; ?>
                           class="inline-flex items-center gap-2 text-electric font-bold hover:gap-4 transition-all">
                            <?php echo esc_html( $s['cta_text'] ); ?>
                            <i data-lucide="arrow-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}