<?php
/**
 * Widget: Electrical Fault Finding – Common Faults Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Electrical_Fault_Common_Faults extends \Elementor\Widget_Base {

    /* ── Identity ─────────────────────────────────────────────────────── */

    public function get_name()       { return 'hte-electrical-fault-common-faults'; }
    public function get_title()      { return __( 'HTE – Electrical Fault: Common Faults', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-warning'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'electrical', 'fault', 'faults', 'common', 'tripping', 'flickering' ]; }

    /* ── Controls ─────────────────────────────────────────────────────── */

    protected function register_controls() {

        /* ── Image Panel ── */
        $this->start_controls_section( 'sec_image', [
            'label' => __( 'Image Panel', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'image', [
                'label'   => __( 'Image', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => 'https://images.unsplash.com/photo-1544724569-5f546fd6f2b5?q=80&w=2070&auto=format&fit=crop' ],
            ] );

            $this->add_control( 'image_alt', [
                'label'   => __( 'Image Alt Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Identifying electrical faults', 'html-to-elementor' ),
            ] );

            $this->add_control( 'overlay_badge_title', [
                'label'   => __( 'Overlay Badge Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Critical Warning', 'html-to-elementor' ),
            ] );

            $this->add_control( 'overlay_badge_text', [
                'label'   => __( 'Overlay Badge Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Flickering lights are often a sign of loose connections.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'overlay_badge_icon', [
                'label'   => __( 'Overlay Badge Icon (Lucide)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'alert-circle',
            ] );

        $this->end_controls_section();

        /* ── Heading ── */
        $this->start_controls_section( 'sec_heading', [
            'label' => __( 'Heading', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Section Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Common Electrical Faults', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Fault Items ── */
        $this->start_controls_section( 'sec_faults', [
            'label' => __( 'Fault Items', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'fault_icon', [
                'label'   => __( 'Lucide Icon Name', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'toggle-left',
            ] );

            $repeater->add_control( 'fault_icon_color', [
                'label'       => __( 'Icon Color Class', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'description' => __( 'e.g. text-electric, text-orange, text-red-500, text-safety', 'html-to-elementor' ),
                'default'     => 'text-electric',
            ] );

            $repeater->add_control( 'fault_icon_bg', [
                'label'   => __( 'Icon BG Class', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'bg-electric/10',
            ] );

            $repeater->add_control( 'fault_title', [
                'label'   => __( 'Fault Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Tripping Circuit Breakers', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'fault_desc', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'An overloaded circuit or a ground fault causing the breaker to trip frequently.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'fault_items', [
                'label'       => __( 'Fault Items', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'fault_icon'       => 'toggle-left',
                        'fault_icon_color' => 'text-electric',
                        'fault_icon_bg'    => 'bg-electric/10',
                        'fault_title'      => 'Tripping Circuit Breakers',
                        'fault_desc'       => 'An overloaded circuit or a ground fault causing the breaker to trip frequently.',
                    ],
                    [
                        'fault_icon'       => 'flame',
                        'fault_icon_color' => 'text-orange',
                        'fault_icon_bg'    => 'bg-orange/10',
                        'fault_title'      => 'Flickering Lights',
                        'fault_desc'       => 'Often caused by loose wiring or poor connections within the fixture or panel.',
                    ],
                    [
                        'fault_icon'       => 'thermometer',
                        'fault_icon_color' => 'text-red-500',
                        'fault_icon_bg'    => 'bg-red-100',
                        'fault_title'      => 'Overheating Electrical Outlets',
                        'fault_desc'       => 'Sockets that are warm to the touch or show scorch marks indicate serious danger.',
                    ],
                    [
                        'fault_icon'       => 'zap',
                        'fault_icon_color' => 'text-safety',
                        'fault_icon_bg'    => 'bg-safety/10',
                        'fault_title'      => 'Buzzing Noises',
                        'fault_desc'       => 'A humming or buzzing sound from switches or panels suggests loose terminations.',
                    ],
                ],
                'title_field' => '{{{ fault_title }}}',
            ] );

        $this->end_controls_section();
    }

    /* ── Render ───────────────────────────────────────────────────────── */

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <!-- Left: Image -->
                    <div>
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                            <?php if ( ! empty( $s['image']['url'] ) ) : ?>
                                <img src="<?php echo esc_url( $s['image']['url'] ); ?>"
                                     alt="<?php echo esc_attr( $s['image_alt'] ); ?>"
                                     class="w-full h-auto">
                            <?php endif; ?>
                            <div class="absolute inset-0 bg-gradient-to-t from-navy/80 to-transparent flex items-end p-8">
                                <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl w-full">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-electric rounded-xl flex items-center justify-center text-white shrink-0">
                                            <i data-lucide="<?php echo esc_attr( $s['overlay_badge_icon'] ); ?>"></i>
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-white"><?php echo esc_html( $s['overlay_badge_title'] ); ?></h4>
                                            <p class="text-xs text-white/60"><?php echo esc_html( $s['overlay_badge_text'] ); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Faults List -->
                    <div>
                        <h2 class="text-4xl font-bold text-navy mb-8 leading-tight"><?php echo esc_html( $s['heading'] ); ?></h2>
                        <div class="space-y-6">
                            <?php foreach ( $s['fault_items'] as $item ) : ?>
                                <div class="flex gap-4 p-6 bg-light-grey rounded-2xl border border-gray-100 transition-all hover:bg-white hover:shadow-lg">
                                    <div class="w-12 h-12 <?php echo esc_attr( $item['fault_icon_bg'] ); ?> <?php echo esc_attr( $item['fault_icon_color'] ); ?> rounded-xl flex items-center justify-center shrink-0">
                                        <i data-lucide="<?php echo esc_attr( $item['fault_icon'] ); ?>"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-navy text-lg mb-1"><?php echo esc_html( $item['fault_title'] ); ?></h4>
                                        <p class="text-sm text-navy/60"><?php echo esc_html( $item['fault_desc'] ); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}