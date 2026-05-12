<?php
/**
 * Widget: Carbon Monoxide Alarms Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Fire_Alarm_Installation_Fire_Co_Alarms extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-fire-co-alarms'; }
    public function get_title()      { return __( 'HTE – Fire: Carbon Monoxide Alarms', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-alert'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'fire', 'carbon monoxide', 'co', 'alarm', 'Fire Alarm Installation Fire Co Alarms' ]; }

    protected function register_controls() {

        /* ── Left Content ── */
        $this->start_controls_section( 'sec_left', [
            'label' => __( 'Left – Content', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading_before', [
                'label'   => __( 'Heading – Before Highlight', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Carbon', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading_highlight', [
                'label'   => __( 'Heading – Highlighted', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Monoxide Alarms', 'html-to-elementor' ),
            ] );

            $this->add_control( 'intro', [
                'label'   => __( 'Intro Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'The invisible danger of CO poisoning is a serious risk that requires dedicated detection technology.', 'html-to-elementor' ),
            ] );

            /* Feature Cards repeater */
            $card_rep = new \Elementor\Repeater();
            $card_rep->add_control( 'card_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Safety Standards', 'html-to-elementor' ),
            ] );
            $card_rep->add_control( 'card_text', [
                'label'   => __( 'Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Mandated regulations for invisible gas protection.', 'html-to-elementor' ),
            ] );
            $card_rep->add_control( 'card_hover_class', [
                'label'       => __( 'Hover BG Class', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => 'hover:bg-orange',
                'description' => __( 'Tailwind hover class e.g. hover:bg-orange, hover:bg-navy', 'html-to-elementor' ),
            ] );

            $this->add_control( 'feature_cards', [
                'label'       => __( 'Feature Cards', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $card_rep->get_controls(),
                'default'     => [
                    [
                        'card_title'       => __( 'Safety Standards', 'html-to-elementor' ),
                        'card_text'        => __( 'Mandated regulations for invisible gas protection.', 'html-to-elementor' ),
                        'card_hover_class' => 'hover:bg-orange',
                    ],
                    [
                        'card_title'       => __( 'Early Warning', 'html-to-elementor' ),
                        'card_text'        => __( 'Provides alerts significantly preventing fatal poisoning.', 'html-to-elementor' ),
                        'card_hover_class' => 'hover:bg-navy',
                    ],
                ],
                'title_field' => '{{{ card_title }}}',
            ] );

            $this->add_control( 'placement_tip', [
                'label'   => __( 'Placement Tip Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Placement Tip: Detectors should be at least 15 feet away from primary heat sources to minimise false alarms, yet close enough to register any emergent carbon monoxide.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Right: Proper Placement ── */
        $this->start_controls_section( 'sec_right', [
            'label' => __( 'Right – Proper Placement', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'placement_heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Proper Placement', 'html-to-elementor' ),
            ] );

            $place_rep = new \Elementor\Repeater();
            $place_rep->add_control( 'place_text', [
                'label'   => __( 'Placement Point', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Near fuel-burning appliances (not directly above)', 'html-to-elementor' ),
            ] );

            $this->add_control( 'placements', [
                'label'       => __( 'Placement Points', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $place_rep->get_controls(),
                'default'     => [
                    [ 'place_text' => __( 'Near fuel-burning appliances (not directly above)', 'html-to-elementor' ) ],
                    [ 'place_text' => __( 'Every level of your home, including basements', 'html-to-elementor' ) ],
                    [ 'place_text' => __( 'Near all sleeping areas for nighttime detection', 'html-to-elementor' ) ],
                ],
                'title_field' => '{{{ place_text }}}',
            ] );

            $this->add_control( 'footer_note', [
                'label'   => __( 'Footer Note', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Detectors are essential even in all-electric homes due to external sources.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>

        <div class="max-w-7xl mx-auto px-4">

            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <!-- Left -->
                <div>
                    <h2 class="text-4xl font-black text-navy mb-8 italic uppercase tracking-tight">
                        <?php echo esc_html( $s['heading_before'] ); ?>
                        <?php if ( ! empty( $s['heading_highlight'] ) ) : ?>
                            <span class="text-orange"> <?php echo esc_html( $s['heading_highlight'] ); ?></span>
                        <?php endif; ?>
                    </h2>

                    <?php if ( ! empty( $s['intro'] ) ) : ?>
                        <p class="text-lg text-navy/60 font-medium italic mb-10 leading-relaxed">
                            <?php echo wp_kses_post( $s['intro'] ); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ( ! empty( $s['feature_cards'] ) ) : ?>
                        <div class="grid sm:grid-cols-2 gap-4">
                            <?php foreach ( $s['feature_cards'] as $card ) : ?>
                                <div class="p-8 rounded-[40px] bg-light-grey shadow-sm group <?php echo esc_attr( $card['card_hover_class'] ); ?> transition-all duration-500">
                                    <h4 class="font-bold text-navy group-hover:text-white italic text-base mb-2">
                                        <?php echo esc_html( $card['card_title'] ); ?>
                                    </h4>
                                    <p class="text-xs text-navy/40 group-hover:text-white/60 italic font-medium">
                                        <?php echo wp_kses_post( $card['card_text'] ); ?>
                                    </p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ( ! empty( $s['placement_tip'] ) ) : ?>
                        <div class="mt-8 p-6 bg-orange/5 border border-orange/10 rounded-3xl italic text-sm text-navy/70 leading-relaxed">
                            <?php echo wp_kses_post( $s['placement_tip'] ); ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Right -->
                <div class="bg-navy p-12 lg:p-20 rounded-[80px] text-white relative shadow-2xl overflow-hidden">
                    <div class="absolute -top-10 -right-10 w-40 h-40 bg-orange rounded-full blur-[80px] opacity-20"></div>
                    <?php if ( ! empty( $s['placement_heading'] ) ) : ?>
                        <h3 class="text-3xl font-black mb-10 italic uppercase">
                            <?php echo esc_html( $s['placement_heading'] ); ?>
                        </h3>
                    <?php endif; ?>

                    <?php if ( ! empty( $s['placements'] ) ) : ?>
                        <ul class="space-y-6">
                            <?php foreach ( $s['placements'] as $placement ) : ?>
                                <li class="flex items-center gap-4 text-white/70 italic font-bold">
                                    <div class="w-2 h-2 rounded-full bg-orange shrink-0"></div>
                                    <?php echo wp_kses_post( $placement['place_text'] ); ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <?php if ( ! empty( $s['footer_note'] ) ) : ?>
                        <div class="mt-12 pt-8 border-t border-white/10 italic text-[10px] font-black uppercase tracking-widest text-white/30">
                            <?php echo wp_kses_post( $s['footer_note'] ); ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>

        </div>
        <?php
    }
}