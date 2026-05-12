<?php
/**
 * Widget: Fire Alarm System Info – What is / Who Needs (Informational Section, Part 1)
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Fire_Alarm_Installation_Fire_Info_System extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-fire-info-system'; }
    public function get_title()      { return __( 'HTE – Fire: What is a Fire Alarm System?', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-info-box'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'fire', 'alarm', 'info', 'system', 'who needs', 'Fire Alarm Installation Fire Info System' ]; }

    protected function register_controls() {

        /* ── Left: What is section ── */
        $this->start_controls_section( 'sec_what', [
            'label' => __( 'Left – What is a Fire Alarm?', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'what_heading_before', [
                'label'   => __( 'Heading – Before Highlight', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'What is a', 'html-to-elementor' ),
            ] );

            $this->add_control( 'what_heading_highlight', [
                'label'   => __( 'Heading – Highlighted', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Fire Alarm System?', 'html-to-elementor' ),
            ] );

            $this->add_control( 'what_paragraph_1', [
                'label'   => __( 'Paragraph 1', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'For rental properties, landlords often require extra coverage, such as a Grade LD2 system. This involves hard-wired, mains-interlinked smoke detectors in every habitable room except kitchens and toilets.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'what_paragraph_2', [
                'label'   => __( 'Paragraph 2', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'In kitchens, a heat alarm is required to prevent false triggers from cooking smoke. Smoke detectors should be installed at least 1m from walls on ceilings or according to specific manufacturing height instructions.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'callout_label', [
                'label'   => __( 'Callout Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Technical Note:', 'html-to-elementor' ),
            ] );

            $this->add_control( 'callout_text', [
                'label'   => __( 'Callout Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'BS5839 BS stands for British Standards and 5389 is the number of the specific standard that applies to fire safety devices.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Right: Who Needs section ── */
        $this->start_controls_section( 'sec_who', [
            'label' => __( 'Right – Who Needs a Fire Alarm?', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'who_heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Who Needs a Fire Alarm?', 'html-to-elementor' ),
            ] );

            $this->add_control( 'who_intro', [
                'label'   => __( 'Intro Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'According to BS5839 regulations, all rented properties need fire alarms. There are different types of coverage:', 'html-to-elementor' ),
            ] );

            /* Coverage grades repeater */
            $grade_rep = new \Elementor\Repeater();
            $grade_rep->add_control( 'grade_badge', [
                'label'   => __( 'Grade Badge (e.g. LD3)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'LD3',
            ] );
            $grade_rep->add_control( 'grade_label', [
                'label'   => __( 'Grade Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Grade D, LD3 (Minimum)', 'html-to-elementor' ),
            ] );
            $grade_rep->add_control( 'grade_description', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Hard-wired interlinked alarms in hallway, lounge, and kitchen.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'grades', [
                'label'       => __( 'Coverage Grades', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $grade_rep->get_controls(),
                'default'     => [
                    [
                        'grade_badge'       => 'LD3',
                        'grade_label'       => __( 'Grade D, LD3 (Minimum)', 'html-to-elementor' ),
                        'grade_description' => __( 'Hard-wired interlinked alarms in hallway, lounge, and kitchen.', 'html-to-elementor' ),
                    ],
                    [
                        'grade_badge'       => 'LD2',
                        'grade_label'       => __( 'Grade LD2 (Enhanced)', 'html-to-elementor' ),
                        'grade_description' => __( 'Interlinked detectors in all escape routes and high-risk rooms.', 'html-to-elementor' ),
                    ],
                ],
                'title_field' => '{{{ grade_badge }}} – {{{ grade_label }}}',
            ] );

            /* Footer checklist */
            $check_rep = new \Elementor\Repeater();
            $check_rep->add_control( 'check_text', [
                'label'   => __( 'Item Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Warden Training', 'html-to-elementor' ),
            ] );

            $this->add_control( 'checks', [
                'label'       => __( 'Bottom Checklist', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $check_rep->get_controls(),
                'default'     => [
                    [ 'check_text' => __( 'Warden Training', 'html-to-elementor' ) ],
                    [ 'check_text' => __( 'Legal Compliance', 'html-to-elementor' ) ],
                    [ 'check_text' => __( 'Emergency Lighting', 'html-to-elementor' ) ],
                    [ 'check_text' => __( 'Certified Assessors', 'html-to-elementor' ) ],
                ],
                'title_field' => '{{{ check_text }}}',
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>

        <!-- <section class="py-24 bg-white"> -->

            <div class="max-w-7xl mx-auto px-4">
                <div class="grid lg:grid-cols-2 gap-20 items-center mb-32">

                    <!-- Left: What is -->
                    <div>
                        <h2 class="text-3xl lg:text-4xl font-black text-navy mb-8 italic uppercase tracking-tight">
                            <?php echo esc_html( $s['what_heading_before'] ); ?>
                            <?php if ( ! empty( $s['what_heading_highlight'] ) ) : ?>
                                <span class="text-orange"> <?php echo esc_html( $s['what_heading_highlight'] ); ?></span>
                            <?php endif; ?>
                        </h2>
                        <div class="prose prose-lg text-navy/70 italic space-y-6 leading-relaxed mb-6">
                            <?php if ( ! empty( $s['what_paragraph_1'] ) ) : ?>
                                <p><?php echo wp_kses_post( $s['what_paragraph_1'] ); ?></p>
                            <?php endif; ?>
                            <?php if ( ! empty( $s['what_paragraph_2'] ) ) : ?>
                                <p><?php echo wp_kses_post( $s['what_paragraph_2'] ); ?></p>
                            <?php endif; ?>
                        </div>
                        <?php if ( ! empty( $s['callout_text'] ) ) : ?>
                            <div class="bg-light-grey p-8 rounded-3xl border-l-8 border-orange italic">
                                <?php if ( ! empty( $s['callout_label'] ) ) : ?>
                                    <p class="font-bold text-navy mb-2"><?php echo esc_html( $s['callout_label'] ); ?></p>
                                <?php endif; ?>
                                <p class="text-sm text-navy/60 font-medium"><?php echo wp_kses_post( $s['callout_text'] ); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Right: Who Needs -->
                    <div class="bg-navy p-12 lg:p-20 rounded-[80px] shadow-2xl relative overflow-hidden text-white">
                        <div class="absolute top-0 right-0 p-8 opacity-5 text-orange">
                            <i data-lucide="shield-check" class="w-64 h-64"></i>
                        </div>
                        <h3 class="text-3xl font-black mb-8 italic"><?php echo esc_html( $s['who_heading'] ); ?></h3>
                        <?php if ( ! empty( $s['who_intro'] ) ) : ?>
                            <p class="text-lg text-white/70 italic mb-10 leading-relaxed font-medium">
                                <?php echo wp_kses_post( $s['who_intro'] ); ?>
                            </p>
                        <?php endif; ?>
                        <div class="space-y-6">
                            <?php foreach ( $s['grades'] as $grade ) : ?>
                                <div class="flex gap-4 items-start">
                                    <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center text-orange shrink-0 font-black italic">
                                        <?php echo esc_html( $grade['grade_badge'] ); ?>
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-white italic uppercase tracking-widest text-xs mb-1">
                                            <?php echo esc_html( $grade['grade_label'] ); ?>
                                        </h4>
                                        <p class="text-sm text-white/40 font-medium italic">
                                            <?php echo wp_kses_post( $grade['grade_description'] ); ?>
                                        </p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <?php if ( ! empty( $s['checks'] ) ) : ?>
                            <div class="mt-12 grid grid-cols-2 gap-4">
                                <?php foreach ( $s['checks'] as $check ) : ?>
                                    <div class="flex items-center gap-2 text-[10px] font-black uppercase tracking-widest text-white/20 italic">
                                        <i data-lucide="check" class="w-3 h-3"></i>
                                        <?php echo esc_html( $check['check_text'] ); ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                </div>

            </div>

        <!-- </section> -->

        <?php
    }
}