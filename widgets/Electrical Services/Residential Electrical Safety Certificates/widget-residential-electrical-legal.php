<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Residential_Electrical_Legal extends \Elementor\Widget_Base {

    public function get_name()       { return 'eicr_legal'; }
    public function get_title()      { return __( 'EICR – Legal Requirements', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-document'; }
    public function get_keywords()   { return [ 'hte', 'legal', 'packages', 'residential',  'electrical' ]; }

    protected function _register_controls() {

        /* ── LEFT ── */
        $this->start_controls_section( 'section_left', [ 'label' => __( 'Left Column', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'heading',     [ 'label' => __( 'Heading', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => "Legal Requirements for\nResidential EICR in London" ] );
            $this->add_control( 'description', [ 'label' => __( 'Description', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::WYSIWYG,  'default' => 'Under the <strong>Electrical Safety Standards in the Private Rented Sector (England) Regulations 2020</strong>, landlords must ensure that the electrical safety standards are met by having installations inspected and tested by a qualified person every five years.' ] );
            $rep = new \Elementor\Repeater();
            $rep->add_control( 'badge', [ 'label' => __( 'Badge', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'A' ] );
            $rep->add_control( 'rule',  [ 'label' => __( 'Rule', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Mandatory 5-year inspection rule for all rentals' ] );
            $this->add_control( 'rules', [
                'label'   => __( 'Rules', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $rep->get_controls(),
                'default' => [
                    [ 'badge' => 'A', 'rule' => 'Mandatory 5-year inspection rule for all rentals' ],
                    [ 'badge' => 'B', 'rule' => 'Must be provided before new tenants move in' ],
                    [ 'badge' => 'C', 'rule' => 'Remedial work must be completed within 28 days' ],
                    [ 'badge' => 'D', 'rule' => 'Reports must be supplied to local authority on request' ],
                ],
                'title_field' => '{{{ rule }}}',
            ] );
        $this->end_controls_section();

        /* ── RIGHT: Risk Card ── */
        $this->start_controls_section( 'section_right', [ 'label' => __( 'Risk Card', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'card_heading', [ 'label' => __( 'Card Heading', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Non-Compliance Risks' ] );
            $rep2 = new \Elementor\Repeater();
            $rep2->add_control( 'risk_icon',  [ 'label' => __( 'Icon', 'plugin-name' ),        'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'alert-octagon' ] );
            $rep2->add_control( 'risk_title', [ 'label' => __( 'Title', 'plugin-name' ),        'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Fines up to £30k' ] );
            $rep2->add_control( 'risk_desc',  [ 'label' => __( 'Description', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Civil penalties issued by councils per breach' ] );
            $this->add_control( 'risks', [
                'label'   => __( 'Risk Items', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $rep2->get_controls(),
                'default' => [
                    [ 'risk_icon' => 'alert-octagon', 'risk_title' => 'Fines up to £30k',  'risk_desc' => 'Civil penalties issued by councils per breach' ],
                    [ 'risk_icon' => 'gavel',         'risk_title' => 'Legal Issues',       'risk_desc' => 'Difficulty evicting non-compliant tenancies' ],
                    [ 'risk_icon' => 'shield-off',    'risk_title' => 'Insurance Void',     'risk_desc' => 'Property insurance often void without EICR' ],
                ],
                'title_field' => '{{{ risk_title }}}',
            ] );
        $this->end_controls_section();

        /* ── STYLE ── */
        $this->start_controls_section( 'style_s', [ 'label' => __( 'Colours', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'section_bg',  [ 'label' => __( 'Section BG', 'plugin-name' ),   'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .leg-section'  => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'heading_col', [ 'label' => __( 'Heading', 'plugin-name' ),       'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#ffffff', 'selectors' => [ '{{WRAPPER}} .leg-heading'  => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'body_col',    [ 'label' => __( 'Body Text', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'rgba(255,255,255,0.7)', 'selectors' => [ '{{WRAPPER}} .leg-body' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'badge_bg',    [ 'label' => __( 'Rule Badge BG', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'rgba(30,144,255,0.2)', 'selectors' => [ '{{WRAPPER}} .leg-badge' => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'badge_col',   [ 'label' => __( 'Rule Badge Text', 'plugin-name' ),'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .leg-badge' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'card_bg',     [ 'label' => __( 'Risk Card BG', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#ef4444', 'selectors' => [ '{{WRAPPER}} .leg-card'   => 'background-color:{{VALUE}};' ] ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $heading = nl2br( esc_html( $s['heading'] ) );
        ?>
        <section class="leg-section py-24 text-white relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <!-- LEFT -->
                    <div class="fade-in">
                        <h2 class="leg-heading text-4xl font-bold mb-6"><?php echo $heading; ?></h2>
                        <div class="leg-body text-lg mb-8 leading-relaxed"><?php echo wp_kses_post( $s['description'] ); ?></div>
                        <div class="space-y-4 mb-8">
                            <?php foreach ( $s['rules'] as $rule ) : ?>
                            <div class="flex items-center gap-4 bg-white/5 p-4 rounded-xl border border-white/10 hover:bg-white/10 transition-colors">
                                <div class="leg-badge w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm">
                                    <?php echo esc_html( $rule['badge'] ); ?>
                                </div>
                                <span class="text-sm font-medium"><?php echo esc_html( $rule['rule'] ); ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- RIGHT: Risk card -->
                    <div class="relative slide-in-right">
                        <div class="leg-card p-8 lg:p-12 rounded-[40px] shadow-2xl relative z-10">
                            <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-red-500 mb-6">
                                <i data-lucide="scale-3d" class="w-8 h-8"></i>
                            </div>
                            <h4 class="text-2xl font-bold mb-4"><?php echo esc_html( $s['card_heading'] ); ?></h4>
                            <div class="grid gap-4">
                                <?php foreach ( $s['risks'] as $risk ) : ?>
                                <div class="bg-black/10 p-4 rounded-xl border border-white/10 transition-transform hover:scale-105">
                                    <h5 class="font-bold flex items-center gap-2">
                                        <i data-lucide="<?php echo esc_attr( $risk['risk_icon'] ); ?>"></i>
                                        <?php echo esc_html( $risk['risk_title'] ); ?>
                                    </h5>
                                    <p class="text-xs text-white/60"><?php echo esc_html( $risk['risk_desc'] ); ?></p>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}