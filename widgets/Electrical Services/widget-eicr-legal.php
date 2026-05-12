<?php
/**
 * Widget: EICR Legal & Compliance
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Eicr_Legal extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-eicr-legal'; }
    public function get_title()      { return __( 'HTE – Legal & Compliance', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-alert'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'legal', 'compliance', 'regulations', 'eicr' ]; }

    protected function register_controls() {

        /* ── Section Header ─────────────────────────────────────────── */
        $this->start_controls_section( 'sec_header', [
            'label' => __( 'Section Header', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Legal Requirements', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'The Cost of Non-Compliance', 'html-to-elementor' ),
            ] );

            $this->add_control( 'description', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Faulty electrical installations can cause fire hazards, electric shocks, and severe property damage. Neglecting standards has serious legal consequences.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Regulations Card ───────────────────────────────────────── */
        $this->start_controls_section( 'sec_regulations', [
            'label' => __( 'Regulations Card', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'reg_heading', [
                'label'   => __( 'Card Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Regulations 2020 Requirements', 'html-to-elementor' ),
            ] );

            $this->add_control( 'reg_intro', [
                'label'   => __( 'Intro Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'UK electrical safety regulations for private tenancies require landlords to ensure that their property\'s electrical installations are inspected and tested by a qualified person.', 'html-to-elementor' ),
            ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'reg_item', [
                'label'   => __( 'Requirement', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( 'Requirement text.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'reg_items', [
                'label'       => __( 'Requirements List', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'reg_item' => 'Arrange an EICR by a qualified electrician.' ],
                    [ 'reg_item' => 'Conduct inspections at least <strong>every 5 years</strong>.' ],
                    [ 'reg_item' => 'Complete remedial works within <strong>28 days</strong> (or sooner if urgent).' ],
                    [ 'reg_item' => 'Supply inspection reports to tenants, new occupants, and councils upon request.' ],
                ],
                'title_field' => '{{{ reg_item }}}',
            ] );

        $this->end_controls_section();

        /* ── Consequences Card ──────────────────────────────────────── */
        $this->start_controls_section( 'sec_consequences', [
            'label' => __( 'Consequences Card', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'con_heading', [
                'label'   => __( 'Card Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Consequences of Neglect', 'html-to-elementor' ),
            ] );

            $this->add_control( 'con_intro', [
                'label'   => __( 'Intro Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Not following electrical safety rules can lead to severe penalties:', 'html-to-elementor' ),
            ] );

            $repeater2 = new \Elementor\Repeater();

            $repeater2->add_control( 'con_icon', [
                'label'   => __( 'Icon (Lucide)', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'alert-circle',
            ] );

            $repeater2->add_control( 'con_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Consequence Title', 'html-to-elementor' ),
            ] );

            $repeater2->add_control( 'con_desc', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Consequence description.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'consequences', [
                'label'       => __( 'Consequences', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater2->get_controls(),
                'default'     => [
                    [ 'con_icon' => 'alert-circle', 'con_title' => 'Fines up to £30,000',    'con_desc' => 'Issued by local authorities.' ],
                    [ 'con_icon' => 'hammer',        'con_title' => 'Forced Remedial Works',  'con_desc' => 'Councils can enforce immediate repairs.' ],
                    [ 'con_icon' => 'gavel',         'con_title' => 'Criminal Prosecution',   'con_desc' => 'In cases of severe negligence or injury.' ],
                ],
                'title_field' => '{{{ con_title }}}',
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-light-grey relative overflow-hidden">
            <div class="absolute top-0 left-0 w-1/2 h-full bg-red-500/5 clip-diagonal opacity-50 z-0"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

                <div class="text-center max-w-3xl mx-auto mb-16 fade-in">
                    <?php if ( ! empty( $s['eyebrow'] ) ) : ?>
                        <h2 class="text-sm font-bold text-red-500 uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                    <?php endif; ?>
                    <?php if ( ! empty( $s['heading'] ) ) : ?>
                        <h3 class="text-4xl font-bold text-navy mb-4"><?php echo esc_html( $s['heading'] ); ?></h3>
                    <?php endif; ?>
                    <?php if ( ! empty( $s['description'] ) ) : ?>
                        <p class="text-lg text-navy/70"><?php echo esc_html( $s['description'] ); ?></p>
                    <?php endif; ?>
                </div>

                <div class="grid lg:grid-cols-2 gap-12">

                    <!-- Regulations Card -->
                    <div class="bg-white p-8 rounded-3xl shadow-lg border border-gray-100 fade-in">
                        <?php if ( ! empty( $s['reg_heading'] ) ) : ?>
                            <h4 class="text-2xl font-bold text-navy mb-6"><?php echo esc_html( $s['reg_heading'] ); ?></h4>
                        <?php endif; ?>
                        <?php if ( ! empty( $s['reg_intro'] ) ) : ?>
                            <p class="text-navy/70 mb-6"><?php echo esc_html( $s['reg_intro'] ); ?></p>
                        <?php endif; ?>

                        <?php if ( ! empty( $s['reg_items'] ) ) : ?>
                        <ul class="space-y-4">
                            <?php foreach ( $s['reg_items'] as $item ) : ?>
                                <li class="flex items-start gap-3">
                                    <div class="mt-1 w-6 h-6 rounded-full bg-electric/10 flex items-center justify-center text-electric shrink-0">
                                        <i data-lucide="check" class="w-4 h-4"></i>
                                    </div>
                                    <span class="text-navy/80"><?php echo wp_kses_post( $item['reg_item'] ); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>

                    <!-- Consequences Card -->
                    <div class="bg-red-500 text-white p-8 rounded-3xl shadow-lg relative overflow-hidden fade-in delay-100">
                        <div class="absolute -bottom-10 -right-10 w-48 h-48 bg-black/10 rounded-full"></div>
                        <?php if ( ! empty( $s['con_heading'] ) ) : ?>
                            <h4 class="text-2xl font-bold mb-6 relative z-10"><?php echo esc_html( $s['con_heading'] ); ?></h4>
                        <?php endif; ?>
                        <?php if ( ! empty( $s['con_intro'] ) ) : ?>
                            <p class="text-white/80 mb-6 relative z-10"><?php echo esc_html( $s['con_intro'] ); ?></p>
                        <?php endif; ?>

                        <?php if ( ! empty( $s['consequences'] ) ) : ?>
                        <ul class="space-y-4 relative z-10">
                            <?php foreach ( $s['consequences'] as $item ) : ?>
                                <li class="flex items-center gap-4 bg-black/10 p-4 rounded-xl">
                                    <i data-lucide="<?php echo esc_attr( $item['con_icon'] ); ?>" class="w-8 h-8 shrink-0"></i>
                                    <div>
                                        <strong class="block text-lg"><?php echo esc_html( $item['con_title'] ); ?></strong>
                                        <span class="text-white/70 text-sm"><?php echo esc_html( $item['con_desc'] ); ?></span>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}
