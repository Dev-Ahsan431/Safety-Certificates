<?php
/**
 * Widget: PAT Testing – PAT vs EICR & 2025 Guidance Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_PAT_Vs_EICR extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-pat-vs-eicr'; }
    public function get_title()      { return __( 'HTE – PAT: PAT vs EICR & Guidance', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-exchange'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'pat', 'eicr', 'comparison', 'difference', 'guidance', 'compliance', '2025', 'electrical' ]; }

    protected function register_controls() {

        /* ── Left Dark Card: Comparison ── */
        $this->start_controls_section( 'sec_comparison', [
            'label' => __( 'Left Card – Comparison', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'comparison_heading', [
                'label'   => __( 'Card Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( "PAT Testing vs. EICR: What's the Difference?", 'html-to-elementor' ),
            ] );

            /* PAT row */
            $this->add_control( 'pat_badge', [
                'label'   => __( 'PAT Badge Letter', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'P',
            ] );

            $this->add_control( 'pat_title', [
                'label'   => __( 'PAT Row Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'PAT Testing', 'html-to-elementor' ),
            ] );

            $this->add_control( 'pat_desc', [
                'label'   => __( 'PAT Row Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Tests the APPLIANCES that plug into the wall. Kettle, Fridge, Toaster, Computer.', 'html-to-elementor' ),
            ] );

            /* EICR row */
            $this->add_control( 'eicr_badge', [
                'label'   => __( 'EICR Badge Letter', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'E',
            ] );

            $this->add_control( 'eicr_title', [
                'label'   => __( 'EICR Row Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'EICR Testing', 'html-to-elementor' ),
            ] );

            $this->add_control( 'eicr_desc', [
                'label'   => __( 'EICR Row Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Tests the FIXED WIRING behind the walls. Power points, consumer unit, cabling.', 'html-to-elementor' ),
            ] );

            /* Callout */
            $this->add_control( 'callout_heading', [
                'label'   => __( 'Callout Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Do you need both?', 'html-to-elementor' ),
            ] );

            $this->add_control( 'callout_text', [
                'label'   => __( 'Callout Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Yes. To be fully compliant as a landlord or business in London, you need both EICR (Fixed) and PAT (Portable) certifications.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Right Column: Guidance ── */
        $this->start_controls_section( 'sec_guidance', [
            'label' => __( 'Right Column – Guidance', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'guidance_eyebrow', [
                'label'   => __( 'Eyebrow Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( '2025 Compliance', 'html-to-elementor' ),
            ] );

            $this->add_control( 'guidance_heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Latest PAT Testing Guidance for Landlords 2025-2026', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Guidance Items ── */
        $this->start_controls_section( 'sec_guidance_items', [
            'label' => __( 'Guidance Items', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $rep = new \Elementor\Repeater();

            $rep->add_control( 'gi_icon', [
                'label'   => __( 'Lucide Icon', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'alert-circle',
            ] );

            $rep->add_control( 'gi_icon_color', [
                'label'   => __( 'Icon Color Class', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'text-orange',
            ] );

            $rep->add_control( 'gi_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Increased Penalties', 'html-to-elementor' ),
            ] );

            $rep->add_control( 'gi_desc', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'From Nov 1, 2025, fails in duty of care regarding supplied electrical equipment carry higher fixed penalty notices in many London boroughs.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'guidance_items', [
                'label'       => __( 'Items', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $rep->get_controls(),
                'default'     => [
                    [
                        'gi_icon'       => 'alert-circle',
                        'gi_icon_color' => 'text-orange',
                        'gi_title'      => 'Increased Penalties',
                        'gi_desc'       => 'From Nov 1, 2025, fails in duty of care regarding supplied electrical equipment carry higher fixed penalty notices in many London boroughs.',
                    ],
                    [
                        'gi_icon'       => 'shield-check',
                        'gi_icon_color' => 'text-safety',
                        'gi_title'      => '"Reasonable Steps" Defence',
                        'gi_desc'       => 'Regular PAT records provide a vital "Reasonable Steps" legal defence if an appliance causes injury or fire in your property.',
                    ],
                ],
                'title_field' => '{{{ gi_title }}}',
            ] );

        $this->end_controls_section();

        /* ── Checklist Box ── */
        $this->start_controls_section( 'sec_checklist', [
            'label' => __( 'Compliance Checklist Box', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'checklist_heading', [
                'label'   => __( 'Checklist Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( '2025-2026 Compliance Checklist', 'html-to-elementor' ),
            ] );

            $cl_rep = new \Elementor\Repeater();
            $cl_rep->add_control( 'cl_item', [
                'label'   => __( 'Checklist Item', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Full inventory of supplied items', 'html-to-elementor' ),
            ] );

            $this->add_control( 'checklist_items', [
                'label'       => __( 'Checklist Items', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $cl_rep->get_controls(),
                'default'     => [
                    [ 'cl_item' => 'Full inventory of supplied items' ],
                    [ 'cl_item' => 'Visual check by landlord between tenancies' ],
                    [ 'cl_item' => 'Professional PAT testing every 12-24 months' ],
                    [ 'cl_item' => 'Formal records & current certificates' ],
                ],
                'title_field' => '{{{ cl_item }}}',
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <!-- Left: Dark Comparison Card -->
                    <div class="relative order-2 lg:order-1">
                        <div class="bg-navy p-10 lg:p-16 rounded-[40px] text-white">
                            <h4 class="text-3xl font-bold mb-8 italic"><?php echo esc_html( $s['comparison_heading'] ); ?></h4>

                            <div class="space-y-6">
                                <!-- PAT Row -->
                                <div class="flex gap-4">
                                    <div class="w-10 h-10 bg-electric rounded-xl flex items-center justify-center shrink-0 font-bold">
                                        <?php echo esc_html( $s['pat_badge'] ); ?>
                                    </div>
                                    <div>
                                        <h5 class="font-bold mb-1"><?php echo esc_html( $s['pat_title'] ); ?></h5>
                                        <p class="text-sm text-white/60 leading-relaxed italic"><?php echo esc_html( $s['pat_desc'] ); ?></p>
                                    </div>
                                </div>

                                <div class="w-full h-px bg-white/10"></div>

                                <!-- EICR Row -->
                                <div class="flex gap-4">
                                    <div class="w-10 h-10 bg-orange rounded-xl flex items-center justify-center shrink-0 font-bold">
                                        <?php echo esc_html( $s['eicr_badge'] ); ?>
                                    </div>
                                    <div>
                                        <h5 class="font-bold mb-1"><?php echo esc_html( $s['eicr_title'] ); ?></h5>
                                        <p class="text-sm text-white/60 leading-relaxed italic"><?php echo esc_html( $s['eicr_desc'] ); ?></p>
                                    </div>
                                </div>
                            </div>

                            <!-- Callout -->
                            <div class="mt-10 p-6 bg-white/5 rounded-2xl border border-white/10">
                                <h5 class="font-bold mb-2 flex items-center gap-2 text-electric italic">
                                    <i data-lucide="info" class="w-4 h-4"></i>
                                    <?php echo esc_html( $s['callout_heading'] ); ?>
                                </h5>
                                <p class="text-xs leading-relaxed opacity-60"><?php echo esc_html( $s['callout_text'] ); ?></p>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Guidance -->
                    <div class="order-1 lg:order-2">
                        <h2 class="text-sm font-bold text-electric uppercase tracking-wider mb-2"><?php echo esc_html( $s['guidance_eyebrow'] ); ?></h2>
                        <h3 class="text-4xl font-extrabold text-navy mb-8 leading-tight"><?php echo esc_html( $s['guidance_heading'] ); ?></h3>

                        <div class="space-y-6 text-navy/70 leading-relaxed">
                            <?php foreach ( $s['guidance_items'] as $item ) : ?>
                                <div class="flex gap-4 items-start">
                                    <i data-lucide="<?php echo esc_attr( $item['gi_icon'] ); ?>"
                                       class="<?php echo esc_attr( $item['gi_icon_color'] ); ?> w-6 h-6 shrink-0 mt-1"></i>
                                    <div>
                                        <h5 class="font-bold text-navy mb-1"><?php echo esc_html( $item['gi_title'] ); ?></h5>
                                        <p><?php echo esc_html( $item['gi_desc'] ); ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                            <!-- Compliance Checklist -->
                            <div class="p-8 bg-electric text-white rounded-3xl mt-8">
                                <h5 class="font-bold text-xl mb-4 italic leading-tight"><?php echo esc_html( $s['checklist_heading'] ); ?></h5>
                                <ul class="space-y-3 font-medium">
                                    <?php foreach ( $s['checklist_items'] as $cl ) : ?>
                                        <li class="flex items-center gap-3">
                                            <i data-lucide="check" class="text-white/40 shrink-0"></i>
                                            <?php echo esc_html( $cl['cl_item'] ); ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}