<?php
/**
 * Widget: Gas Safety – What's Included Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Gas_Safety_Included extends \Elementor\Widget_Base {

    /* ── Identity ─────────────────────────────────────────────────────── */

    public function get_name()       { return 'hte-gas-safety-included'; }
    public function get_title()      { return __( "HTE – Gas Safety What's Included", 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-check-circle'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'included', 'inspection', 'checklist', 'gas', 'safety', 'cp12' ]; }

    /* ── Controls ─────────────────────────────────────────────────────── */

    protected function register_controls() {

        /* ── Left Column ── */
        $this->start_controls_section( 'sec_left', [
            'label' => __( 'Left Column', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( "What's Included in Your Inspection?", 'html-to-elementor' ),
            ] );

            $this->add_control( 'description', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'A thorough 20-point safety check designed to identify any potential hazards before they become dangerous.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'callout_label', [
                'label'   => __( 'Callout Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Official CP12 Output', 'html-to-elementor' ),
            ] );

            $this->add_control( 'callout_text', [
                'label'   => __( 'Callout Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( "Every client receives a professional PDF certificate containing the engineer's Gas Safe ID, property details, and a line-by-line breakdown of every gas appliance tested.", 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Inspection Items ── */
        $this->start_controls_section( 'sec_items', [
            'label' => __( 'Inspection Items (Right Grid)', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'item_icon', [
                'label'   => __( 'Lucide Icon Name', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'flame',
            ] );

            $repeater->add_control( 'item_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Appliance Check', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'item_desc', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Full safety and combustion check on boilers, hob/cookers and fires.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'inspection_items', [
                'label'       => __( 'Items', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'item_icon' => 'flame',      'item_title' => 'Appliance Check',   'item_desc' => 'Full safety and combustion check on boilers, hob/cookers and fires.' ],
                    [ 'item_icon' => 'wind',       'item_title' => 'Flue Inspection',   'item_desc' => 'Ensuring all waste gases are extracted safely out of the property.' ],
                    [ 'item_icon' => 'maximize',   'item_title' => 'Ventilation Check', 'item_desc' => 'Verifying adequate air supply for safe combustion.' ],
                    [ 'item_icon' => 'droplet',    'item_title' => 'Tightness Test',    'item_desc' => 'Rigorous testing of the whole gas system for any leaks.' ],
                    [ 'item_icon' => 'shield',     'item_title' => 'Safety Devices',    'item_desc' => 'Checking that all flame failure devices are working correctly.' ],
                    [ 'item_icon' => 'file-check', 'item_title' => 'CP12 Issuance',     'item_desc' => 'Instant delivery of your legal certificate.' ],
                ],
                'title_field' => '{{{ item_title }}}',
            ] );

        $this->end_controls_section();
    }

    /* ── Render ───────────────────────────────────────────────────────── */

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="section-included py-24 bg-light-grey">
            <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-[4rem] p-12 lg:p-24 shadow-sm border border-gray-100 grid lg:grid-cols-2 gap-20">

                    <!-- Left -->
                    <div>
                        <h3 class="text-4xl font-bold text-navy mb-8 font-heading"><?php echo esc_html( $s['heading'] ); ?></h3>
                        <p class="text-lg text-navy/60 mb-12"><?php echo esc_html( $s['description'] ); ?></p>
                        <div class="bg-electric/5 p-8 rounded-3xl border border-electric/10">
                            <p class="text-sm font-bold text-electric uppercase tracking-widest mb-4"><?php echo esc_html( $s['callout_label'] ); ?></p>
                            <p class="text-navy/70 leading-relaxed"><?php echo esc_html( $s['callout_text'] ); ?></p>
                        </div>
                    </div>

                    <!-- Right: Items Grid -->
                    <div>
                        <div class="grid sm:grid-cols-2 gap-8">
                            <?php foreach ( $s['inspection_items'] as $item ) : ?>
                                <div class="flex flex-col gap-3">
                                    <div class="w-12 h-12 bg-light-grey rounded-xl flex items-center justify-center text-navy shadow-inner">
                                        <i data-lucide="<?php echo esc_attr( $item['item_icon'] ); ?>" class="w-6 h-6"></i>
                                    </div>
                                    <h4 class="font-bold text-navy"><?php echo esc_html( $item['item_title'] ); ?></h4>
                                    <p class="text-xs text-navy/50"><?php echo esc_html( $item['item_desc'] ); ?></p>
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