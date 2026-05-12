<?php
/**
 * Widget: What is PAT? (Section 03)
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Pat_What_Is extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-pat-what-is'; }
    public function get_title()      { return __( 'HTE – What is PAT?', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-info-box'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'pat', 'what is', 'basics' ]; }

    protected function register_controls() {

        /* ── Content: Eyebrow & Headings ── */
        $this->start_controls_section( 'sec_header', [
            'label' => __( 'Header', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'The Basics', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Main Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'What is PAT Electrical Testing and Why Do You Need It?', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Content: Info Blocks (repeater) ── */
        $this->start_controls_section( 'sec_blocks', [
            'label' => __( 'Info Blocks', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'icon', [
                'label'   => __( 'Lucide Icon Name', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'book-open',
                'description' => __( 'Any valid Lucide icon slug, e.g. book-open, shield-check', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'block_heading', [
                'label'   => __( 'Block Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Understanding Requirements', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'block_text', [
                'label'   => __( 'Block Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Portable Appliance Testing (PAT) is the process of examining electrical appliances to ensure they are safe to use.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'blocks', [
                'label'       => __( 'Info Blocks', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'icon'          => 'book-open',
                        'block_heading' => __( 'Understanding Requirements', 'html-to-elementor' ),
                        'block_text'    => __( 'Portable Appliance Testing (PAT) is the process of examining electrical appliances to ensure they are safe to use. While not a standalone law, UK Health and Safety regulations require that all electrical equipment that has the potential to cause injury is maintained in a safe condition.', 'html-to-elementor' ),
                    ],
                    [
                        'icon'          => 'shield-check',
                        'block_heading' => __( 'Protecting Business & Employees', 'html-to-elementor' ),
                        'block_text'    => __( 'For business owners, regular PAT testing is vital for demonstrating "due diligence" in your health and safety obligations. It protects your employees from shocks and fires, and protects your business from liability claims.', 'html-to-elementor' ),
                    ],
                ],
                'title_field' => '{{{ block_heading }}}',
            ] );

        $this->end_controls_section();

        /* ── Content: Callout Box ── */
        $this->start_controls_section( 'sec_callout', [
            'label' => __( 'Callout Box', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'callout_heading', [
                'label'   => __( 'Callout Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Visual Inspection vs. Full Testing', 'html-to-elementor' ),
            ] );

            $this->add_control( 'callout_text', [
                'label'   => __( 'Callout Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( '90% of faults are found during a visual inspection, but full electrical testing is required to identify internal insulation breakdown or faulty earth connections that can\'t be seen with the naked eye.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Content: Image & Stat Overlay ── */
        $this->start_controls_section( 'sec_image', [
            'label' => __( 'Image & Stat Overlay', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'image', [
                'label'   => __( 'Section Image', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => 'https://images.unsplash.com/photo-1621905251189-08b45d6a269e?q=80&w=2069&auto=format&fit=crop' ],
            ] );

            $this->add_control( 'image_alt', [
                'label'   => __( 'Image Alt Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'PAT Tester checking a plug', 'html-to-elementor' ),
            ] );

            $this->add_control( 'stat_number', [
                'label'   => __( 'Stat Number', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '95%',
            ] );

            $this->add_control( 'stat_text', [
                'label'   => __( 'Stat Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Of fires in rental properties originate from faulty electrical appliances.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-white relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <!-- Left: Text Content -->
                    <div class="slide-in-left">
                        <?php if ( ! empty( $s['eyebrow'] ) ) : ?>
                            <h2 class="text-sm font-bold text-electric uppercase tracking-wider mb-2">
                                <?php echo esc_html( $s['eyebrow'] ); ?>
                            </h2>
                        <?php endif; ?>

                        <?php if ( ! empty( $s['heading'] ) ) : ?>
                            <h3 class="text-4xl lg:text-5xl font-extrabold text-navy mb-8 leading-tight">
                                <?php echo esc_html( $s['heading'] ); ?>
                            </h3>
                        <?php endif; ?>

                        <div class="space-y-8">
                            <?php foreach ( $s['blocks'] as $block ) : ?>
                                <div>
                                    <h4 class="text-xl font-bold text-navy mb-3 flex items-center gap-3">
                                        <?php if ( ! empty( $block['icon'] ) ) : ?>
                                            <i data-lucide="<?php echo esc_attr( $block['icon'] ); ?>" class="text-electric"></i>
                                        <?php endif; ?>
                                        <?php echo esc_html( $block['block_heading'] ); ?>
                                    </h4>
                                    <p class="text-navy/60 leading-relaxed"><?php echo wp_kses_post( $block['block_text'] ); ?></p>
                                </div>
                            <?php endforeach; ?>

                            <?php if ( ! empty( $s['callout_heading'] ) ) : ?>
                                <div class="p-6 bg-light-grey rounded-2xl border-l-4 border-electric">
                                    <h4 class="font-bold text-navy mb-2"><?php echo esc_html( $s['callout_heading'] ); ?></h4>
                                    <p class="text-navy/60 text-sm"><?php echo wp_kses_post( $s['callout_text'] ); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Right: Image + Stat Overlay -->
                    <div class="relative fade-in delay-200">
                        <div class="relative z-10 rounded-3xl overflow-hidden shadow-2xl">
                            <?php if ( ! empty( $s['image']['url'] ) ) : ?>
                                <img src="<?php echo esc_url( $s['image']['url'] ); ?>"
                                     alt="<?php echo esc_attr( $s['image_alt'] ); ?>"
                                     class="w-full h-auto">
                            <?php endif; ?>
                            <div class="absolute inset-0 bg-navy/20 flex items-center justify-center">
                                <div class="bg-white/90 backdrop-blur p-8 rounded-2xl shadow-xl max-w-sm text-center">
                                    <?php if ( ! empty( $s['stat_number'] ) ) : ?>
                                        <div class="text-electric font-black text-4xl mb-2 italic">
                                            <?php echo esc_html( $s['stat_number'] ); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ( ! empty( $s['stat_text'] ) ) : ?>
                                        <p class="text-navy font-bold"><?php echo wp_kses_post( $s['stat_text'] ); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-electric/10 blur-3xl rounded-full -z-0"></div>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}