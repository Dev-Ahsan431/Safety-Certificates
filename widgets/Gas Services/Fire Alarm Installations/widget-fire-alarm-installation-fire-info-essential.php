<?php
/**
 * Widget: Fire Alarm – Why Installation Is Essential + L1-L5 Systems
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Fire_Alarm_Installation_Fire_Info_Essential extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-fire-alarm-installation-info-essential'; }
    public function get_title()      { return __( 'HTE – Fire: Essential & L1-L5 Systems', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-bullet-list'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'fire', 'l1', 'l5', 'essential', 'systems', 'Fire Alarm Installation Fire Info Essential' ]; }

    protected function register_controls() {

        /* ── Left: Essential ── */
        $this->start_controls_section( 'sec_essential', [
            'label' => __( 'Left – Why Installation Is Essential', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'ess_heading_before', [
                'label'   => __( 'Heading – Before Highlight', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Why Installation', 'html-to-elementor' ),
            ] );

            $this->add_control( 'ess_heading_highlight', [
                'label'   => __( 'Heading – Highlighted', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Is Essential', 'html-to-elementor' ),
            ] );

            $this->add_control( 'ess_paragraph_1', [
                'label'   => __( 'Paragraph 1', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'A properly installed fire alarm system is crucial for protecting lives and property. It provides early detection of smoke or fire, allowing everyone to evacuate safely and quickly.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'ess_paragraph_2', [
                'label'   => __( 'Paragraph 2', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Without a working fire alarm, a fire can spread unnoticed, causing serious damage and putting people at risk. At EuroSafe, we make sure your fire alarm system is installed to the highest standards.', 'html-to-elementor' ),
            ] );

            $bullet_rep = new \Elementor\Repeater();
            $bullet_rep->add_control( 'icon', [
                'label'   => __( 'Lucide Icon', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'bell-ring',
            ] );
            $bullet_rep->add_control( 'bullet_text', [
                'label'   => __( 'Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( '24/7 Protection & Monitoring', 'html-to-elementor' ),
            ] );

            $this->add_control( 'ess_bullets', [
                'label'       => __( 'Bullet Points', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $bullet_rep->get_controls(),
                'default'     => [
                    [ 'icon' => 'bell-ring', 'bullet_text' => __( '24/7 Protection & Monitoring', 'html-to-elementor' ) ],
                    [ 'icon' => 'clock',     'bullet_text' => __( 'Early Detection Save Lives', 'html-to-elementor' ) ],
                    [ 'icon' => 'heart',     'bullet_text' => __( 'Ultimate Peace of Mind', 'html-to-elementor' ) ],
                ],
                'title_field' => '{{{ bullet_text }}}',
            ] );

        $this->end_controls_section();

        /* ── Right: L1–L5 ── */
        $this->start_controls_section( 'sec_levels', [
            'label' => __( 'Right – L1–L5 Fire Alarm Systems', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'levels_heading_before', [
                'label'   => __( 'Heading – Before Highlight', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'L1-L5 Fire', 'html-to-elementor' ),
            ] );

            $this->add_control( 'levels_heading_highlight', [
                'label'   => __( 'Heading – Highlighted', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Alarm Systems', 'html-to-elementor' ),
            ] );

            $this->add_control( 'levels_intro', [
                'label'   => __( 'Intro Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Understanding the levels of fire detection coverage as defined by UK standards.', 'html-to-elementor' ),
            ] );

            $level_rep = new \Elementor\Repeater();
            $level_rep->add_control( 'level_badge', [
                'label'   => __( 'Level Badge (e.g. L1)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'L1',
            ] );
            $level_rep->add_control( 'level_description', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Detects smoke from a fire and sounds the alarm across all building areas.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'levels', [
                'label'       => __( 'Levels', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $level_rep->get_controls(),
                'default'     => [
                    [ 'level_badge' => 'L1', 'level_description' => __( 'Detects smoke from a fire and sounds the alarm across all building areas.', 'html-to-elementor' ) ],
                    [ 'level_badge' => 'L2', 'level_description' => __( 'Heat detectors sense heat from an area and warn of a possible fire.', 'html-to-elementor' ) ],
                    [ 'level_badge' => 'L3', 'level_description' => __( 'Smoke or heat detectors that trigger in escape routes and high-risk rooms.', 'html-to-elementor' ) ],
                    [ 'level_badge' => 'L4', 'level_description' => __( 'Detect smoke specifically in escape routes only.', 'html-to-elementor' ) ],
                    [ 'level_badge' => 'L5', 'level_description' => __( 'Detects both smoke and high-level heat intensity.', 'html-to-elementor' ) ],
                ],
                'title_field' => '{{{ level_badge }}}',
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>

        <div class="max-w-7xl mx-auto px-4">

            <div class="grid lg:grid-cols-2 gap-20 items-stretch mb-32">

                <!-- Left: Essential -->
                <div class="bg-light-grey p-12 lg:p-20 rounded-[80px] border-t-8 border-navy shadow-inner flex flex-col justify-center">
                    <h3 class="text-3xl font-black text-navy mb-8 italic uppercase">
                        <?php echo esc_html( $s['ess_heading_before'] ); ?>
                        <?php if ( ! empty( $s['ess_heading_highlight'] ) ) : ?>
                            <span class="text-orange"> <?php echo esc_html( $s['ess_heading_highlight'] ); ?></span>
                        <?php endif; ?>
                    </h3>
                    <div class="prose prose-lg text-navy/70 italic space-y-6 leading-relaxed mb-6 font-medium">
                        <?php if ( ! empty( $s['ess_paragraph_1'] ) ) : ?>
                            <p><?php echo wp_kses_post( $s['ess_paragraph_1'] ); ?></p>
                        <?php endif; ?>
                        <?php if ( ! empty( $s['ess_paragraph_2'] ) ) : ?>
                            <p><?php echo wp_kses_post( $s['ess_paragraph_2'] ); ?></p>
                        <?php endif; ?>
                    </div>
                    <?php if ( ! empty( $s['ess_bullets'] ) ) : ?>
                        <ul class="space-y-4 pt-4">
                            <?php foreach ( $s['ess_bullets'] as $bullet ) : ?>
                                <li class="flex items-center gap-4 text-navy font-bold italic text-sm">
                                    <i data-lucide="<?php echo esc_attr( $bullet['icon'] ); ?>" class="text-orange w-5 h-5 shrink-0"></i>
                                    <?php echo esc_html( $bullet['bullet_text'] ); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <!-- Right: L1–L5 -->
                <div>
                    <h3 class="text-3xl font-black text-navy mb-8 italic uppercase">
                        <?php echo esc_html( $s['levels_heading_before'] ); ?>
                        <?php if ( ! empty( $s['levels_heading_highlight'] ) ) : ?>
                            <span class="text-orange"> <?php echo esc_html( $s['levels_heading_highlight'] ); ?></span>
                        <?php endif; ?>
                    </h3>
                    <?php if ( ! empty( $s['levels_intro'] ) ) : ?>
                        <p class="text-lg text-navy/60 font-medium italic mb-10 leading-relaxed">
                            <?php echo wp_kses_post( $s['levels_intro'] ); ?>
                        </p>
                    <?php endif; ?>
                    <div class="space-y-4">
                        <?php foreach ( $s['levels'] as $level ) : ?>
                            <div class="flex gap-6 p-6 rounded-3xl border border-gray-100 hover:border-orange/20 transition-all group">
                                <div class="text-2xl font-black text-navy/10 group-hover:text-orange transition-colors italic shrink-0">
                                    <?php echo esc_html( $level['level_badge'] ); ?>
                                </div>
                                <p class="text-sm text-navy/60 italic leading-relaxed pt-1">
                                    <?php echo wp_kses_post( $level['level_description'] ); ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

            </div>

        </div>
        <?php
    }
}