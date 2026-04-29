<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Residential_Electrical_Safety_Compliance extends \Elementor\Widget_Base {

    public function get_name()       { return 'eicr_safety_compliance'; }
    public function get_title()      { return __( 'EICR – Safety & Compliance Overview', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-shield'; }
    public function get_keywords()   { return [ 'hte', 'electrical-safety-compliance', 'packages', 'residential',  'electrical' ]; }

    protected function _register_controls() {

        /* ── LEFT COLUMN ── */
        $this->start_controls_section( 'section_left', [ 'label' => __( 'Left Column', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'heading',     [ 'label' => __( 'Heading', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Ensure Your Property is Safe & Compliant with a Professional EICR' ] );
            $this->add_control( 'description', [ 'label' => __( 'Description', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::WYSIWYG,  'default' => 'EuroSafe provides a corporate-grade certification service that combines technical precision with customer convenience. Our approach is built on trust, ensuring that every London property we inspect meets the highest safety standards without hassle for the owner.' ] );
            $rep = new \Elementor\Repeater();
            $rep->add_control( 'feature', [ 'label' => __( 'Feature', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Full Safety Inspection' ] );
            $this->add_control( 'features', [
                'label'       => __( 'Feature List', 'plugin-name' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $rep->get_controls(),
                'default'     => [
                    [ 'feature' => 'Full Safety Inspection' ],
                    [ 'feature' => 'Landlord Legal Compliance' ],
                    [ 'feature' => 'Same-Day EICR Certificates' ],
                    [ 'feature' => 'Tenant & Property Protection' ],
                    [ 'feature' => 'Fast & Convenient Booking' ],
                    [ 'feature' => 'Trusted Nationwide' ],
                ],
                'title_field' => '{{{ feature }}}',
            ] );
        $this->end_controls_section();

        /* ── RIGHT COLUMN ── */
        $this->start_controls_section( 'section_right', [ 'label' => __( 'Right Column', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'image', [ 'label' => __( 'Image', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::MEDIA, 'default' => [ 'url' => 'https://images.unsplash.com/photo-1558230491-d81961917f8a?q=80&w=2070&auto=format&fit=crop' ] ] );
            $this->add_control( 'image_alt',    [ 'label' => __( 'Image Alt', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Property Safety' ] );
            $this->add_control( 'badge_label',  [ 'label' => __( 'Right Label', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::TEXT, 'default' => '100% Digital Workflow' ] );
            $this->add_control( 'badge_sub',    [ 'label' => __( 'Right Sub-label', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Environmentally friendly & instant' ] );
            $this->add_control( 'badge_pill',   [ 'label' => __( 'Pill Text', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'CERTIFIED' ] );
        $this->end_controls_section();

        /* ── STYLE ── */
        $this->start_controls_section( 'style_s', [ 'label' => __( 'Colours', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'heading_color',  [ 'label' => __( 'Heading', 'plugin-name' ),       'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .sc-heading'  => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'body_color',     [ 'label' => __( 'Body Text', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'rgba(11,31,58,0.7)', 'selectors' => [ '{{WRAPPER}} .sc-body'     => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'icon_color',     [ 'label' => __( 'Check Icon', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#28C76F', 'selectors' => [ '{{WRAPPER}} .sc-check'    => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'feature_color',  [ 'label' => __( 'Feature Text', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .sc-feature'  => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'card_bg',        [ 'label' => __( 'Right Card BG', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .sc-card'     => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'badge_bg',       [ 'label' => __( 'Pill BG', 'plugin-name' ),       'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#28C76F', 'selectors' => [ '{{WRAPPER}} .sc-badge'    => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'badge_text',     [ 'label' => __( 'Pill Text Colour', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .sc-badge'  => 'color:{{VALUE}};' ] ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s   = $this->get_settings_for_display();
        $img = ! empty( $s['image']['url'] ) ? esc_url( $s['image']['url'] ) : '';
        ?>
        <section class="py-24 bg-white relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <!-- LEFT -->
                    <div class="fade-in">
                        <h2 class="sc-heading text-4xl font-bold mb-6"><?php echo esc_html( $s['heading'] ); ?></h2>
                        <div class="sc-body text-lg mb-8 leading-relaxed"><?php echo wp_kses_post( $s['description'] ); ?></div>
                        <div class="grid sm:grid-cols-2 gap-y-4 gap-x-8">
                            <?php foreach ( $s['features'] as $f ) : ?>
                            <div class="flex items-center gap-3 font-semibold sc-feature">
                                <i data-lucide="check" class="sc-check"></i>
                                <?php echo esc_html( $f['feature'] ); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- RIGHT -->
                    <div class="sc-card rounded-3xl p-1 shadow-2xl slide-in-right">
                        <div class="bg-white/5 backdrop-blur-sm rounded-[22px] p-8 lg:p-12">
                            <?php if ( $img ) : ?>
                            <img src="<?php echo $img; ?>" alt="<?php echo esc_attr( $s['image_alt'] ); ?>" class="w-full rounded-xl mb-8 shadow-lg grayscale hover:grayscale-0 transition-all duration-500">
                            <?php endif; ?>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-white font-bold"><?php echo esc_html( $s['badge_label'] ); ?></h4>
                                    <p class="text-white/40 text-xs"><?php echo esc_html( $s['badge_sub'] ); ?></p>
                                </div>
                                <div class="sc-badge px-4 py-2 rounded-lg font-bold text-xs"><?php echo esc_html( $s['badge_pill'] ); ?></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}