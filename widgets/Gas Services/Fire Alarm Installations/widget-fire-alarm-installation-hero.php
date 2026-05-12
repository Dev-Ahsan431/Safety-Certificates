<?php
/**
 * Widget: Fire Alarms Hero Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Fire_Alarm_Installation_Hero extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-fire-hero'; }
    public function get_title()      { return __( 'HTE – Fire Alarms Hero', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-single-page'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'fire', 'hero', 'alarm', 'banner', 'Fire Alarm Installation Hero' ]; }

    protected function register_controls() {

        /* ── Badge ── */
        $this->start_controls_section( 'sec_badge', [
            'label' => __( 'Top Badge', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'badge_text', [
                'label'   => __( 'Badge Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Accredited Installation', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Heading ── */
        $this->start_controls_section( 'sec_heading', [
            'label' => __( 'Heading', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading_before', [
                'label'   => __( 'Heading – Before Highlight', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Fire Alarms', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading_highlight', [
                'label'   => __( 'Heading – Highlighted Word(s)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'London', 'html-to-elementor' ),
            ] );

            $this->add_control( 'subheading', [
                'label'   => __( 'Subheading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Starting from £220 ONLY. All-inclusive fire safety compliance for domestic, landlord and commercial properties.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'subheading_highlight', [
                'label'   => __( 'Subheading Highlighted Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( '£220 ONLY', 'html-to-elementor' ),
                'description' => __( 'This exact text inside the subheading will be rendered bold/white.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Buttons ── */
        $this->start_controls_section( 'sec_buttons', [
            'label' => __( 'Buttons', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'primary_btn_text', [
                'label'   => __( 'Primary Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Book Installation', 'html-to-elementor' ),
            ] );

            $this->add_control( 'primary_btn_link', [
                'label'         => __( 'Primary Button Link', 'html-to-elementor' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'default'       => [ 'url' => '#booking' ],
                'show_external' => true,
            ] );

            $this->add_control( 'secondary_btn_text', [
                'label'   => __( 'Phone Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( '020 8145 5369', 'html-to-elementor' ),
            ] );

            $this->add_control( 'secondary_btn_link', [
                'label'   => __( 'Phone Button Link', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => 'tel:02081455369' ],
            ] );

        $this->end_controls_section();

        /* ── Trust Bullets ── */
        $this->start_controls_section( 'sec_bullets', [
            'label' => __( 'Trust Bullet Points', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();
            $repeater->add_control( 'bullet_text', [
                'label'   => __( 'Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'No hidden costs', 'html-to-elementor' ),
            ] );

            $this->add_control( 'bullets', [
                'label'       => __( 'Bullet Points', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'bullet_text' => __( 'No hidden costs', 'html-to-elementor' ) ],
                    [ 'bullet_text' => __( 'Fast Booking', 'html-to-elementor' ) ],
                    [ 'bullet_text' => __( 'Professional Engineers', 'html-to-elementor' ) ],
                    [ 'bullet_text' => __( 'BS5839 Compliant', 'html-to-elementor' ) ],
                ],
                'title_field' => '{{{ bullet_text }}}',
            ] );

        $this->end_controls_section();

        /* ── Image ── */
        $this->start_controls_section( 'sec_image', [
            'label' => __( 'Hero Image', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'image', [
                'label'   => __( 'Image', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => 'https://images.unsplash.com/photo-1582139329536-e7284fece509?auto=format&fit=crop&q=80&w=800' ],
            ] );

            $this->add_control( 'image_alt', [
                'label'   => __( 'Image Alt Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Professional fire alarm smoke detector installation', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Image Card Overlay ── */
        $this->start_controls_section( 'sec_card', [
            'label' => __( 'Image Card Overlay', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'card_label', [
                'label'   => __( 'Card Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Service Includes', 'html-to-elementor' ),
            ] );

            $card_rep = new \Elementor\Repeater();
            $card_rep->add_control( 'item_text', [
                'label'   => __( 'Item Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'System Design', 'html-to-elementor' ),
            ] );

            $this->add_control( 'card_items', [
                'label'       => __( 'Card Items', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $card_rep->get_controls(),
                'default'     => [
                    [ 'item_text' => __( 'System Design', 'html-to-elementor' ) ],
                    [ 'item_text' => __( 'Expert Survey', 'html-to-elementor' ) ],
                    [ 'item_text' => __( 'Full Testing', 'html-to-elementor' ) ],
                ],
                'title_field' => '{{{ item_text }}}',
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();

        $pri_target = ! empty( $s['primary_btn_link']['is_external'] )  ? ' target="_blank"' : '';
        $pri_norel  = ! empty( $s['primary_btn_link']['nofollow'] )      ? ' rel="nofollow"'  : '';
        ?>
        <section class="relative bg-navy text-white py-24 overflow-hidden border-b border-white/5">
            <!-- Decorative blobs -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 right-0 w-96 h-96 bg-orange rounded-full blur-[100px] animate-pulse"></div>
                <div class="absolute bottom-0 left-0 w-96 h-96 bg-electric rounded-full blur-[100px] animate-pulse"></div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <!-- Left: Copy -->
                    <div>
                        <?php if ( ! empty( $s['badge_text'] ) ) : ?>
                            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 backdrop-blur-sm mb-6">
                                <span class="flex h-2 w-2 rounded-full bg-orange animate-pulse"></span>
                                <span class="text-xs font-bold text-white/90 uppercase tracking-[0.2em]">
                                    <?php echo esc_html( $s['badge_text'] ); ?>
                                </span>
                            </div>
                        <?php endif; ?>

                        <h1 class="text-4xl lg:text-7xl font-black leading-tight mb-6">
                            <?php echo esc_html( $s['heading_before'] ); ?>
                            <?php if ( ! empty( $s['heading_highlight'] ) ) : ?>
                                <span class="text-orange italic"> <?php echo esc_html( $s['heading_highlight'] ); ?></span>
                            <?php endif; ?>
                        </h1>

                        <?php if ( ! empty( $s['subheading'] ) ) : ?>
                            <p class="text-xl text-white/70 mb-8 leading-relaxed max-w-xl italic">
                                <?php
                                $sub  = esc_html( $s['subheading'] );
                                $bold = esc_html( $s['subheading_highlight'] );
                                if ( $bold ) {
                                    $sub = str_replace( $bold, '<span class="text-white font-bold">' . $bold . '</span>', $sub );
                                }
                                echo $sub;
                                ?>
                            </p>
                        <?php endif; ?>

                        <!-- Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 mb-10">
                            <?php if ( ! empty( $s['primary_btn_text'] ) ) : ?>
                                <a href="<?php echo esc_url( $s['primary_btn_link']['url'] ); ?>"
                                   class="bg-orange hover:bg-orange/90 text-white px-10 py-5 rounded-2xl font-black text-lg transition-all shadow-xl shadow-orange/30 flex items-center justify-center gap-2 group"
                                   <?php echo $pri_target . $pri_norel; ?>>
                                    <?php echo esc_html( $s['primary_btn_text'] ); ?>
                                    <i data-lucide="arrow-right" class="w-5 h-5 group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            <?php endif; ?>
                            <?php if ( ! empty( $s['secondary_btn_text'] ) ) : ?>
                                <a href="<?php echo esc_url( $s['secondary_btn_link']['url'] ); ?>"
                                   class="bg-white/10 hover:bg-white/20 border border-white/10 text-white px-10 py-5 rounded-2xl font-bold text-lg transition-all backdrop-blur-md flex items-center justify-center gap-2">
                                    <i data-lucide="phone" class="w-5 h-5"></i>
                                    <?php echo esc_html( $s['secondary_btn_text'] ); ?>
                                </a>
                            <?php endif; ?>
                        </div>

                        <!-- Trust Bullets -->
                        <?php if ( ! empty( $s['bullets'] ) ) : ?>
                            <ul class="grid grid-cols-1 sm:grid-cols-2 gap-y-3 gap-x-6">
                                <?php foreach ( $s['bullets'] as $bullet ) : ?>
                                    <li class="flex items-center gap-2 text-sm text-white/60 italic font-bold">
                                        <i data-lucide="check" class="text-orange w-4 h-4"></i>
                                        <?php echo esc_html( $bullet['bullet_text'] ); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <!-- Right: Image -->
                    <div class="relative hidden lg:block">
                        <div class="absolute inset-0 bg-gradient-to-tr from-orange/20 to-electric/20 rounded-[60px] blur-3xl"></div>
                        <?php if ( ! empty( $s['image']['url'] ) ) : ?>
                            <img src="<?php echo esc_url( $s['image']['url'] ); ?>"
                                 alt="<?php echo esc_attr( $s['image_alt'] ); ?>"
                                 class="relative z-10 w-full h-[550px] object-cover rounded-[60px] shadow-2xl border border-white/10">
                        <?php endif; ?>

                        <!-- Card Overlay -->
                        <?php if ( ! empty( $s['card_items'] ) ) : ?>
                            <div class="absolute -bottom-6 -right-6 bg-white p-8 rounded-[40px] shadow-2xl z-20 max-w-xs hover:scale-105 transition-all">
                                <div class="text-navy">
                                    <?php if ( ! empty( $s['card_label'] ) ) : ?>
                                        <p class="text-navy/40 font-black text-[10px] uppercase tracking-widest mb-2">
                                            <?php echo esc_html( $s['card_label'] ); ?>
                                        </p>
                                    <?php endif; ?>
                                    <ul class="space-y-2">
                                        <?php foreach ( $s['card_items'] as $item ) : ?>
                                            <li class="flex items-center gap-2 text-xs font-bold italic">
                                                <i data-lucide="check" class="text-orange w-4 h-4"></i>
                                                <?php echo esc_html( $item['item_text'] ); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}