<?php
/**
 * Widget: Electrical Fault Finding – Services Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Electrical_Fault_Services extends \Elementor\Widget_Base {

    /* ── Identity ─────────────────────────────────────────────────────── */

    public function get_name()       { return 'hte-electrical-fault-services'; }
    public function get_title()      { return __( 'HTE – Electrical Fault: Services', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-services'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'electrical', 'services', 'repairs', 'installation', 'fault' ]; }

    /* ── Controls ─────────────────────────────────────────────────────── */

    protected function register_controls() {

        /* ── Section Header ── */
        $this->start_controls_section( 'sec_header', [
            'label' => __( 'Section Header', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Our Solutions', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Expert Repairs & Installations', 'html-to-elementor' ),
            ] );

            $this->add_control( 'subheading', [
                'label'   => __( 'Sub-heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Comprehensive electrical services to rectify diagnosed faults immediately.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Service Cards ── */
        $this->start_controls_section( 'sec_services', [
            'label' => __( 'Service Cards', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'service_icon', [
                'label'   => __( 'Lucide Icon Name', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'layout',
            ] );

            $repeater->add_control( 'service_icon_color', [
                'label'   => __( 'Icon Color Class', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'text-electric',
            ] );

            $repeater->add_control( 'service_icon_bg', [
                'label'   => __( 'Icon BG Class', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'bg-electric/20',
            ] );

            $repeater->add_control( 'service_title', [
                'label'   => __( 'Service Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Consumer Unit Installation', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'service_desc', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Replace outdated fuse boards with modern 18th edition consumer units featuring surge protection.', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'service_bullets', [
                'label'       => __( 'Bullet Points (one per line)', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::TEXTAREA,
                'default'     => "RCD Protection\nSurge Protection (SPD)\nFull Certification",
                'description' => __( 'One bullet point per line.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'service_cards', [
                'label'       => __( 'Services', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'service_icon'       => 'layout',
                        'service_icon_color' => 'text-electric',
                        'service_icon_bg'    => 'bg-electric/20',
                        'service_title'      => 'Consumer Unit Installation',
                        'service_desc'       => 'Replace outdated fuse boards with modern 18th edition consumer units featuring surge protection.',
                        'service_bullets'    => "RCD Protection\nSurge Protection (SPD)\nFull Certification",
                    ],
                    [
                        'service_icon'       => 'link',
                        'service_icon_color' => 'text-safety',
                        'service_icon_bg'    => 'bg-safety/20',
                        'service_title'      => 'Earth Bonding',
                        'service_desc'       => 'Crucial safety connection between the electrical installation and domestic pipes (gas/water).',
                        'service_bullets'    => "Shock Prevention\n10mm Bonding Cable\nMandatory for EICR",
                    ],
                    [
                        'service_icon'       => 'refresh-cw',
                        'service_icon_color' => 'text-orange',
                        'service_icon_bg'    => 'bg-orange/20',
                        'service_title'      => 'Electrical Rewires',
                        'service_desc'       => 'Complete property rewiring to update old systems to current safety standards.',
                        'service_bullets'    => "Full/Partial Rewire\nModern Standards\n10-Year Guarantee",
                    ],
                    [
                        'service_icon'       => 'plus-square',
                        'service_icon_color' => 'text-electric',
                        'service_icon_bg'    => 'bg-electric/20',
                        'service_title'      => 'Socket Installation',
                        'service_desc'       => 'Adding or replacing power sockets with USB or modern aesthetic options.',
                        'service_bullets'    => "Extra Points\nUSB Integrated\nSurface/Flush Mount",
                    ],
                    [
                        'service_icon'       => 'shower-head',
                        'service_icon_color' => 'text-safety',
                        'service_icon_bg'    => 'bg-safety/20',
                        'service_title'      => 'Shower Circuit',
                        'service_desc'       => 'Dedicated high-load wiring for electric showers with proper isolation switches.',
                        'service_bullets'    => "10mm Wiring\n45A/50A Isolation\nIP Rated Safety",
                    ],
                    [
                        'service_icon'       => 'lightbulb',
                        'service_icon_color' => 'text-orange',
                        'service_icon_bg'    => 'bg-orange/20',
                        'service_title'      => 'Spotlight Installation',
                        'service_desc'       => 'Modern LED recessed lighting design and installation for improved visibility.',
                        'service_bullets'    => "Energy Efficient LED\nFire-Rated Fitting\nDimmer Compatible",
                    ],
                ],
                'title_field' => '{{{ service_title }}}',
            ] );

        $this->end_controls_section();
    }

    /* ── Render ───────────────────────────────────────────────────────── */

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-navy text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

                <!-- Header -->
                <div class="max-w-3xl mx-auto mb-16">
                    <h2 class="text-sm font-bold text-electric uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <h3 class="text-4xl font-bold mb-6"><?php echo esc_html( $s['heading'] ); ?></h3>
                    <p class="text-lg text-white/60"><?php echo esc_html( $s['subheading'] ); ?></p>
                </div>

                <!-- Cards Grid -->
                <div class="grid md:grid-cols-3 gap-8">
                    <?php foreach ( $s['service_cards'] as $card ) :
                        $bullets = array_filter( array_map( 'trim', explode( "\n", $card['service_bullets'] ) ) );
                    ?>
                        <div class="bg-white/5 border border-white/10 p-8 rounded-3xl text-left hover:bg-white/10 transition-all">
                            <div class="w-14 h-14 <?php echo esc_attr( $card['service_icon_bg'] ); ?> <?php echo esc_attr( $card['service_icon_color'] ); ?> rounded-2xl flex items-center justify-center mb-6">
                                <i data-lucide="<?php echo esc_attr( $card['service_icon'] ); ?>" class="w-8 h-8"></i>
                            </div>
                            <h4 class="text-xl font-bold mb-4"><?php echo esc_html( $card['service_title'] ); ?></h4>
                            <p class="text-sm text-white/50 leading-relaxed mb-6"><?php echo esc_html( $card['service_desc'] ); ?></p>
                            <ul class="space-y-2 text-xs text-white/40">
                                <?php foreach ( $bullets as $bullet ) : ?>
                                    <li class="flex items-center gap-2">
                                        <i data-lucide="check" class="text-safety w-3 h-3 shrink-0"></i>
                                        <?php echo esc_html( $bullet ); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        </section>
        <?php
    }
}