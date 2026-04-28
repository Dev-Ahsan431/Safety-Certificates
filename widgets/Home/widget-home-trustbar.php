<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Home_Trustbar extends \Elementor\Widget_Base {

    public function get_name() { return 'home_trustbar'; }
    public function get_title() { return __( 'Home – Trust Bar', 'HTE', 'plugin-name' ); }
    public function get_icon() { return 'eicon-social-icons'; }
    public function get_categories() { return [ 'general' ]; }

    protected function _register_controls() {

        /* ── RATING ── */
        $this->start_controls_section( 'section_rating', [ 'label' => __( 'Rating', 'plugin-name' ) ] );
            $this->add_control( 'rating_score', [
                'label'   => __( 'Rating Score Text', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '4.8/5 Average Rating',
            ] );
            $this->add_control( 'rating_subtext', [
                'label'   => __( 'Rating Sub-text', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Based on 2,500+ reviews',
            ] );
            $this->add_control( 'rating_stars', [
                'label'   => __( 'Number of Stars (out of 5)', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'min'     => 1,
                'max'     => 5,
                'default' => 5,
            ] );
        $this->end_controls_section();

        /* ── PARTNERS ── */
        $this->start_controls_section( 'section_partners', [ 'label' => __( 'Partner / Client Logos', 'plugin-name' ) ] );
            $this->add_control( 'partners_heading', [
                'label'   => __( 'Heading', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Trusted by 10,000+ Landlords & Agencies',
            ] );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control( 'partner_name', [
                'label'   => __( 'Partner Name', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Savills',
            ] );
            $this->add_control( 'partners', [
                'label'       => __( 'Partners', 'plugin-name' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'partner_name' => 'Savills' ],
                    [ 'partner_name' => 'Foxtons' ],
                    [ 'partner_name' => 'KnightFrank' ],
                    [ 'partner_name' => 'Dexters' ],
                ],
                'title_field' => '{{{ partner_name }}}',
            ] );
        $this->end_controls_section();

        /* ── ACCREDITATIONS ── */
        $this->start_controls_section( 'section_accreditations', [ 'label' => __( 'Accreditation Badges', 'plugin-name' ) ] );
            $repeater2 = new \Elementor\Repeater();
            $repeater2->add_control( 'badge_line1', [
                'label'   => __( 'Line 1', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'NICEIC',
            ] );
            $repeater2->add_control( 'badge_line2', [
                'label'   => __( 'Line 2 (optional)', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '',
            ] );
            $this->add_control( 'accreditations', [
                'label'       => __( 'Accreditations', 'plugin-name' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater2->get_controls(),
                'default'     => [
                    [ 'badge_line1' => 'NICEIC', 'badge_line2' => '' ],
                    [ 'badge_line1' => 'GasSafe', 'badge_line2' => '' ],
                    [ 'badge_line1' => 'ISO', 'badge_line2' => '9001' ],
                ],
                'title_field' => '{{{ badge_line1 }}}',
            ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $stars = (int) $s['rating_stars'];
        ?>
        <section class="bg-white py-8 border-b border-gray-100 relative z-10 -mt-10 lg:-mt-16 mx-4 sm:mx-6 lg:mx-8 rounded-2xl shadow-xl max-w-7xl xl:mx-auto fade-in">
            <div class="px-6 flex flex-col md:flex-row items-center justify-between gap-8">

                <!-- Stars & Rating -->
                <div class="flex items-center gap-4">
                    <div class="flex flex-col items-center md:items-start">
                        <div class="flex text-orange mb-1">
                            <?php for ( $i = 0; $i < $stars; $i++ ) : ?>
                                <i data-lucide="star" class="w-5 h-5 fill-current"></i>
                            <?php endfor; ?>
                        </div>
                        <p class="text-sm font-bold text-navy"><?php echo esc_html( $s['rating_score'] ); ?></p>
                        <p class="text-xs text-navy/60"><?php echo esc_html( $s['rating_subtext'] ); ?></p>
                    </div>
                </div>

                <div class="hidden md:block w-px h-12 bg-gray-200"></div>

                <!-- Partners -->
                <div class="text-center md:text-left">
                    <p class="text-sm font-bold text-navy mb-2"><?php echo esc_html( $s['partners_heading'] ); ?></p>
                    <div class="flex items-center justify-center md:justify-start gap-6 opacity-60 grayscale">
                        <?php foreach ( $s['partners'] as $partner ) : ?>
                            <div class="font-heading font-bold text-xl"><?php echo esc_html( $partner['partner_name'] ); ?></div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="hidden lg:block w-px h-12 bg-gray-200"></div>

                <!-- Accreditations -->
                <div class="flex items-center gap-4 opacity-80">
                    <?php foreach ( $s['accreditations'] as $badge ) : ?>
                        <div class="flex flex-col items-center justify-center w-16 h-16 rounded-full border-2 border-navy/10 bg-gray-50">
                            <span class="text-[10px] font-bold text-navy"><?php echo esc_html( $badge['badge_line1'] ); ?></span>
                            <?php if ( ! empty( $badge['badge_line2'] ) ) : ?>
                                <span class="text-[8px] text-navy"><?php echo esc_html( $badge['badge_line2'] ); ?></span>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php
    }
}