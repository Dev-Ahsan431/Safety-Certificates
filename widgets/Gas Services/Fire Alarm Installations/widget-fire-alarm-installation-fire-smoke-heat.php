<?php
/**
 * Widget: Smoke & Heat Alarms Comparison
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Fire_Alarm_Installation_Fire_Smoke_Heat extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-fire-smoke-heat'; }
    public function get_title()      { return __( 'HTE – Fire: Smoke & Heat Alarms', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-table'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'fire', 'smoke', 'heat', 'alarm', 'comparison', 'Fire Alarm Installation Fire Smoke Heat' ]; }

    protected function register_controls() {

        /* ── Header ── */
        $this->start_controls_section( 'sec_header', [
            'label' => __( 'Header', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading_before', [
                'label'   => __( 'Heading – Before Highlight', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Smoke &', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading_highlight', [
                'label'   => __( 'Heading – Highlighted', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Heat Alarms', 'html-to-elementor' ),
            ] );

            $this->add_control( 'intro', [
                'label'   => __( 'Intro Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Understanding the key differences between smoke and heat alarms is essential for ideal placement within your property.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Key Differences ── */
        $this->start_controls_section( 'sec_differences', [
            'label' => __( 'Key Differences', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'diff_heading', [
                'label'   => __( 'Column Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Key Differences', 'html-to-elementor' ),
            ] );

            $diff_rep = new \Elementor\Repeater();
            $diff_rep->add_control( 'icon', [
                'label'   => __( 'Lucide Icon', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'timer',
            ] );
            $diff_rep->add_control( 'diff_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Response Times', 'html-to-elementor' ),
            ] );
            $diff_rep->add_control( 'diff_text', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Smoke alarms react faster to particles than heat alarms do to temperature shifts.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'differences', [
                'label'       => __( 'Differences', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $diff_rep->get_controls(),
                'default'     => [
                    [
                        'icon'       => 'timer',
                        'diff_title' => __( 'Response Times', 'html-to-elementor' ),
                        'diff_text'  => __( 'Smoke alarms react faster to particles than heat alarms do to temperature shifts.', 'html-to-elementor' ),
                    ],
                    [
                        'icon'       => 'gauge',
                        'diff_title' => __( 'Sensitivity Levels', 'html-to-elementor' ),
                        'diff_text'  => __( 'Smoke detectors find minute particles; heat alarms respond to increments.', 'html-to-elementor' ),
                    ],
                    [
                        'icon'       => 'map-pin',
                        'diff_title' => __( 'Installation Strategy', 'html-to-elementor' ),
                        'diff_text'  => __( 'Heat alarms are vital in high-temp areas like kitchens to avoid false alarms.', 'html-to-elementor' ),
                    ],
                ],
                'title_field' => '{{{ diff_title }}}',
            ] );

        $this->end_controls_section();

        /* ── Where to Install ── */
        $this->start_controls_section( 'sec_install', [
            'label' => __( 'Where to Install', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'install_heading', [
                'label'   => __( 'Column Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Where to Install', 'html-to-elementor' ),
            ] );

            $inst_rep = new \Elementor\Repeater();
            $inst_rep->add_control( 'install_text', [
                'label'   => __( 'Installation Point', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Smoke Alarms: Every level, including basements.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'install_points', [
                'label'       => __( 'Installation Points', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $inst_rep->get_controls(),
                'default'     => [
                    [ 'install_text' => __( 'Smoke Alarms: Every level, including basements.', 'html-to-elementor' ) ],
                    [ 'install_text' => __( 'Near every sleeping area and in habitable rooms.', 'html-to-elementor' ) ],
                    [ 'install_text' => __( 'Heat Alarms: Prone to heat or dust (Kitchens/Garages).', 'html-to-elementor' ) ],
                    [ 'install_text' => __( 'At least 10 inches away from corners.', 'html-to-elementor' ) ],
                    [ 'install_text' => __( 'CO Alarms: Outside every sleeping area.', 'html-to-elementor' ) ],
                ],
                'title_field' => '{{{ install_text }}}',
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>

        <div class="max-w-7xl mx-auto px-4">

            <div class="bg-white p-12 lg:p-24 rounded-[80px] shadow-2xl border border-gray-50 mb-32">
                <div class="max-w-4xl mx-auto">
                    <h3 class="text-4xl font-black text-navy mb-8 text-center italic uppercase">
                        <?php echo esc_html( $s['heading_before'] ); ?>
                        <?php if ( ! empty( $s['heading_highlight'] ) ) : ?>
                            <span class="text-orange"> <?php echo esc_html( $s['heading_highlight'] ); ?></span>
                        <?php endif; ?>
                    </h3>
                    <?php if ( ! empty( $s['intro'] ) ) : ?>
                        <p class="text-xl text-navy/60 italic font-medium text-center mb-16 leading-relaxed">
                            <?php echo wp_kses_post( $s['intro'] ); ?>
                        </p>
                    <?php endif; ?>

                    <div class="grid md:grid-cols-2 gap-12">

                        <!-- Key Differences -->
                        <div class="space-y-6">
                            <?php if ( ! empty( $s['diff_heading'] ) ) : ?>
                                <h4 class="text-xl font-bold text-navy italic border-b-2 border-orange w-fit pb-2">
                                    <?php echo esc_html( $s['diff_heading'] ); ?>
                                </h4>
                            <?php endif; ?>
                            <div class="space-y-4">
                                <?php foreach ( $s['differences'] as $diff ) : ?>
                                    <div class="flex gap-4">
                                        <div class="w-8 h-8 rounded-full bg-light-grey flex items-center justify-center shrink-0">
                                            <i data-lucide="<?php echo esc_attr( $diff['icon'] ); ?>" class="text-orange w-4 h-4"></i>
                                        </div>
                                        <div>
                                            <p class="font-bold text-navy text-sm italic"><?php echo esc_html( $diff['diff_title'] ); ?></p>
                                            <p class="text-xs text-navy/50 italic"><?php echo wp_kses_post( $diff['diff_text'] ); ?></p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <!-- Where to Install -->
                        <div class="space-y-6">
                            <?php if ( ! empty( $s['install_heading'] ) ) : ?>
                                <h4 class="text-xl font-bold text-navy italic border-b-2 border-navy w-fit pb-2">
                                    <?php echo esc_html( $s['install_heading'] ); ?>
                                </h4>
                            <?php endif; ?>
                            <ul class="space-y-4 text-sm text-navy/70 font-medium italic">
                                <?php foreach ( $s['install_points'] as $point ) : ?>
                                    <li class="flex items-center gap-2">
                                        <div class="w-1.5 h-1.5 rounded-full bg-orange shrink-0"></div>
                                        <?php echo wp_kses_post( $point['install_text'] ); ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        
        <?php
    }
}