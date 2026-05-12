<?php
/**
 * Widget: Gas Safety – Audience Section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Gas_Safety_Audience extends \Elementor\Widget_Base {

    /* ── Identity ─────────────────────────────────────────────────────── */

    public function get_name()       { return 'hte-gas-safety-audience'; }
    public function get_title()      { return __( 'HTE – Gas Safety Audience', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-person'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'audience', 'who', 'landlord', 'gas', 'safety' ]; }

    /* ── Controls ─────────────────────────────────────────────────────── */

    protected function register_controls() {

        /* ── Text Content ── */
        $this->start_controls_section( 'sec_content', [
            'label' => __( 'Content', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Who This Is For', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( "The Compliance Standard For London's Property Industry", 'html-to-elementor' ),
            ] );

            $this->add_control( 'description', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Whether you manage a single home or a portfolio of hundreds, our certificates ensure you stay legal, insured, and safe.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Audience Cards ── */
        $this->start_controls_section( 'sec_cards', [
            'label' => __( 'Audience Cards', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'card_icon', [
                'label'   => __( 'Lucide Icon Name', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'user',
            ] );

            $repeater->add_control( 'card_title', [
                'label'   => __( 'Title', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Landlords', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'card_desc', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Annual CP12 is a legal mandate. Protect your tenants and assets.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'audience_cards', [
                'label'       => __( 'Cards', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'card_icon' => 'user',      'card_title' => 'Landlords',        'card_desc' => 'Annual CP12 is a legal mandate. Protect your tenants and assets.' ],
                    [ 'card_icon' => 'building',  'card_title' => 'Letting Agents',   'card_desc' => 'Automated reminders and bulk reports for your whole portfolio.' ],
                    [ 'card_icon' => 'home',      'card_title' => 'Homeowners',       'card_desc' => 'Peace of mind for your family. Recommended for all gas homes.' ],
                    [ 'card_icon' => 'briefcase', 'card_title' => 'Property Managers','card_desc' => 'Priority scheduling and dedicated account support.' ],
                ],
                'title_field' => '{{{ card_title }}}',
            ] );

        $this->end_controls_section();

        /* ── Image Panel ── */
        $this->start_controls_section( 'sec_image', [
            'label' => __( 'Image', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'image', [
                'label'   => __( 'Image', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => 'https://picsum.photos/seed/london_property/1000/800' ],
            ] );

            $this->add_control( 'image_location_label', [
                'label'   => __( 'Image Location Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Location Coverage', 'html-to-elementor' ),
            ] );

            $this->add_control( 'image_location_value', [
                'label'   => __( 'Image Location Value', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Greater London & M25', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();
    }

    /* ── Render ───────────────────────────────────────────────────────── */

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="section-audience py-24 bg-white">
            <div class="container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-20 items-center">

                    <!-- Left: Text + Cards -->
                    <div>
                        <h2 class="text-sm font-bold text-electric uppercase tracking-widest mb-4"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                        <h3 class="text-4xl font-bold text-navy mb-8 font-heading"><?php echo esc_html( $s['heading'] ); ?></h3>
                        <p class="text-lg text-navy/60 mb-10 leading-relaxed"><?php echo esc_html( $s['description'] ); ?></p>

                        <div class="grid grid-cols-2 gap-8">
                            <?php foreach ( $s['audience_cards'] as $card ) : ?>
                                <div class="group">
                                    <div class="w-14 h-14 bg-light-grey rounded-2xl flex items-center justify-center text-navy group-hover:bg-electric group-hover:text-white transition-all duration-300 mb-4 shadow-sm">
                                        <i data-lucide="<?php echo esc_attr( $card['card_icon'] ); ?>"></i>
                                    </div>
                                    <h4 class="font-bold text-navy mb-2"><?php echo esc_html( $card['card_title'] ); ?></h4>
                                    <p class="text-sm text-navy/60"><?php echo esc_html( $card['card_desc'] ); ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Right: Image -->
                    <div class="relative">
                        <div class="aspect-[4/3] bg-light-grey rounded-[3rem] overflow-hidden shadow-2xl relative border-8 border-white">
                            <?php if ( ! empty( $s['image']['url'] ) ) : ?>
                                <img src="<?php echo esc_url( $s['image']['url'] ); ?>"
                                     alt="<?php echo esc_attr( $s['image_location_value'] ); ?>"
                                     class="w-full h-full object-cover grayscale-[20%] hover:grayscale-0 transition-all duration-1000" />
                            <?php endif; ?>
                            <div class="absolute inset-0 bg-gradient-to-t from-navy/60 to-transparent"></div>
                            <div class="absolute bottom-8 left-8 right-8 flex items-center justify-between">
                                <div class="text-white">
                                    <p class="text-[10px] font-bold uppercase tracking-widest opacity-60"><?php echo esc_html( $s['image_location_label'] ); ?></p>
                                    <p class="font-bold text-xl"><?php echo esc_html( $s['image_location_value'] ); ?></p>
                                </div>
                                <div class="bg-white/20 backdrop-blur-md p-3 rounded-xl border border-white/20">
                                    <i data-lucide="map-pin" class="text-white"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}