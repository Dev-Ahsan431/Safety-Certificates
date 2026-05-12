<?php
/**
 * Widget: Electrical Fault Finding – Accreditations Marquee Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Electrical_Fault_Accreditations extends \Elementor\Widget_Base {

    /* ── Identity ─────────────────────────────────────────────────────── */

    public function get_name()       { return 'hte-electrical-fault-accreditations'; }
    public function get_title()      { return __( 'HTE – Electrical Fault: Accreditations', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-scroll'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'electrical', 'accreditations', 'logos', 'marquee', 'badges', 'trust', 'certifications' ]; }

    /* ── Controls ─────────────────────────────────────────────────────── */

    protected function register_controls() {

        /* ── Accreditation Items ── */
        $this->start_controls_section( 'sec_items', [
            'label' => __( 'Accreditation Items', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'items_note', [
                'label'       => __( 'ℹ️ Note', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::RAW_HTML,
                'raw'         => __( 'Items are automatically duplicated to create a seamless scrolling marquee effect. The CSS animation class <code>animate-marquee</code> must be defined in your theme/plugin stylesheet.', 'html-to-elementor' ),
                'content_classes' => 'elementor-descriptor',
            ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'accred_name', [
                'label'   => __( 'Accreditation Name', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'NICEIC',
            ] );

            $repeater->add_control( 'accred_subtitle', [
                'label'   => __( 'Sub-label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Approved Contractor', 'html-to-elementor' ),
            ] );

            $this->add_control( 'accreditation_items', [
                'label'       => __( 'Items', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'accred_name' => 'NICEIC',          'accred_subtitle' => 'Approved Contractor' ],
                    [ 'accred_name' => 'NAPIT',           'accred_subtitle' => 'Registered Member' ],
                    [ 'accred_name' => 'TRUST-MARK',      'accred_subtitle' => 'Government Standards' ],
                    [ 'accred_name' => 'BS 7671',         'accred_subtitle' => 'Fully Compliant' ],
                    [ 'accred_name' => 'CITY & GUILDS',   'accred_subtitle' => 'Qualified Team' ],
                    [ 'accred_name' => 'SAFE-CONTRACTOR', 'accred_subtitle' => 'Verified Member' ],
                ],
                'title_field' => '{{{ accred_name }}}',
            ] );

        $this->end_controls_section();
    }

    /* ── Render ───────────────────────────────────────────────────────── */

    protected function render() {
        $s     = $this->get_settings_for_display();
        $items = $s['accreditation_items'];
        ?>
        <section class="py-16 bg-light-grey border-y border-gray-100 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative">
                    <!-- Marquee Wrapper: two identical sets for seamless loop -->
                    <div class="flex items-center animate-marquee whitespace-nowrap">

                        <!-- First Set -->
                        <div class="flex items-center gap-12 lg:gap-24 opacity-60 mx-6 lg:mx-12">
                            <?php foreach ( $items as $item ) : ?>
                                <div class="text-center group transition-opacity hover:opacity-100">
                                    <span class="block font-heading font-black text-2xl tracking-tighter italic text-navy">
                                        <?php echo esc_html( $item['accred_name'] ); ?>
                                    </span>
                                    <span class="text-[10px] font-bold uppercase tracking-widest text-navy">
                                        <?php echo esc_html( $item['accred_subtitle'] ); ?>
                                    </span>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- Duplicate Set (seamless loop) -->
                        <div class="flex items-center gap-12 lg:gap-24 opacity-60 mx-6 lg:mx-12">
                            <?php foreach ( $items as $item ) : ?>
                                <div class="text-center group transition-opacity hover:opacity-100">
                                    <span class="block font-heading font-black text-2xl tracking-tighter italic text-navy">
                                        <?php echo esc_html( $item['accred_name'] ); ?>
                                    </span>
                                    <span class="text-[10px] font-bold uppercase tracking-widest text-navy">
                                        <?php echo esc_html( $item['accred_subtitle'] ); ?>
                                    </span>
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