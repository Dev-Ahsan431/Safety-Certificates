<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Residential_Electrical_Professionals extends \Elementor\Widget_Base {

    public function get_name()       { return 'eicr_professionals'; }
    public function get_title()      { return __( 'EICR – Qualified Professionals', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-user-circle-o'; }
    public function get_keywords()   { return [ 'hte', 'Professionals', 'packages', 'residential',  'electrical' ]; }

    protected function _register_controls() {

        /* ── LEFT ── */
        $this->start_controls_section( 'section_left', [ 'label' => __( 'Left Column', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'heading',     [ 'label' => __( 'Heading', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => "Certified & Qualified\nEICR Professionals" ] );
            $this->add_control( 'description', [ 'label' => __( 'Description', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXTAREA,  'default' => "Don't compromise on safety. EuroSafe only employs certified inspectors who undergo continuous training to remain at the forefront of UK safety standards." ] );
            $rep = new \Elementor\Repeater();
            $rep->add_control( 'icon',  [ 'label' => __( 'Icon', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'award' ] );
            $rep->add_control( 'label', [ 'label' => __( 'Label', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Full National Accreditation' ] );
            $this->add_control( 'credentials', [
                'label'   => __( 'Credentials', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $rep->get_controls(),
                'default' => [
                    [ 'icon' => 'award',        'label' => 'Full National Accreditation' ],
                    [ 'icon' => 'book-open',    'label' => 'Continuous Safety Training' ],
                    [ 'icon' => 'shield',       'label' => 'Comprehensive Professional Insurance' ],
                    [ 'icon' => 'user-plus',    'label' => 'Extensive Practical Experience' ],
                    [ 'icon' => 'check-square', 'label' => 'BS 7671 Regulations Compliance' ],
                ],
                'title_field' => '{{{ label }}}',
            ] );
        $this->end_controls_section();

        /* ── RIGHT CARD ── */
        $this->start_controls_section( 'section_right', [ 'label' => __( 'Right Card', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'card_title',    [ 'label' => __( 'Card Title', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Quality Assurance' ] );
            $this->add_control( 'card_desc',     [ 'label' => __( 'Card Description', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Every EICR we issue is double-checked for accuracy and completeness by our senior engineering team.' ] );
            $this->add_control( 'card_icon',     [ 'label' => __( 'Card Icon', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'medal' ] );
        $this->end_controls_section();

        /* ── STYLE ── */
        $this->start_controls_section( 'style_s', [ 'label' => __( 'Colours', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'section_bg',   [ 'label' => __( 'Section BG', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#ffffff',  'selectors' => [ '{{WRAPPER}} .pro-section'  => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'heading_col',  [ 'label' => __( 'Heading', 'plugin-name' ),       'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A',  'selectors' => [ '{{WRAPPER}} .pro-heading'  => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'body_col',     [ 'label' => __( 'Body Text', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'rgba(11,31,58,0.7)', 'selectors' => [ '{{WRAPPER}} .pro-body' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'cred_icon',    [ 'label' => __( 'Credential Icon', 'plugin-name' ),'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF',  'selectors' => [ '{{WRAPPER}} .pro-cred-icon'=> 'color:{{VALUE}};' ] ] );
            $this->add_control( 'cred_text',    [ 'label' => __( 'Credential Text', 'plugin-name' ),'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A',  'selectors' => [ '{{WRAPPER}} .pro-cred-text'=> 'color:{{VALUE}};' ] ] );
            $this->add_control( 'card_bg',      [ 'label' => __( 'Right Card BG', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A',  'selectors' => [ '{{WRAPPER}} .pro-card'     => 'background-color:{{VALUE}};' ] ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s       = $this->get_settings_for_display();
        $heading = nl2br( esc_html( $s['heading'] ) );
        ?>
        <section class="pro-section py-24 relative">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <!-- LEFT -->
                    <div class="fade-in">
                        <h2 class="pro-heading text-4xl font-bold mb-6"><?php echo $heading; ?></h2>
                        <p class="pro-body text-lg mb-8 leading-relaxed"><?php echo esc_html( $s['description'] ); ?></p>
                        <div class="space-y-4">
                            <?php foreach ( $s['credentials'] as $i => $cred ) :
                                $is_last = ( $i === count( $s['credentials'] ) - 1 );
                            ?>
                            <div class="flex items-center gap-4 <?php echo $is_last ? '' : 'border-b border-gray-100'; ?> pb-4">
                                <i data-lucide="<?php echo esc_attr( $cred['icon'] ); ?>" class="pro-cred-icon w-6 h-6"></i>
                                <span class="pro-cred-text font-bold"><?php echo esc_html( $cred['label'] ); ?></span>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- RIGHT -->
                    <div class="relative slide-in-right">
                        <div class="pro-card rounded-[40px] p-8 lg:p-16 text-center text-white relative overflow-hidden">
                            <div class="relative z-10">
                                <div class="w-24 h-24 bg-white/10 rounded-3xl flex items-center justify-center text-white mx-auto mb-8">
                                    <i data-lucide="<?php echo esc_attr( $s['card_icon'] ); ?>" class="w-12 h-12"></i>
                                </div>
                                <h4 class="text-3xl font-bold mb-4"><?php echo esc_html( $s['card_title'] ); ?></h4>
                                <p class="text-white/60 text-sm mb-10"><?php echo esc_html( $s['card_desc'] ); ?></p>
                                <div class="flex justify-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-safety"></div>
                                    <div class="w-2 h-2 rounded-full bg-safety opacity-50"></div>
                                    <div class="w-2 h-2 rounded-full bg-safety opacity-20"></div>
                                </div>
                            </div>
                            <div class="absolute inset-0 bg-gradient-to-tr from-navy via-navy to-electric opacity-50"></div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}