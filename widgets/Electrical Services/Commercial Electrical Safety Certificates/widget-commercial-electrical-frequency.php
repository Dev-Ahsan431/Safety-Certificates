<?php

class HTE_Widget_Commercial_Electrical_Frequency  extends \Elementor\Widget_Base {

    public function get_name()       { return 'commercial_frequency'; }
    public function get_title()      { return __( 'Commercial – Frequency & Legal', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-clock-o'; }
    public function get_keywords()   { return [ 'hte', 'Frequency', 'banner', 'Commercial',  'electrical' ]; }
 
    protected function _register_controls() {
        $this->start_controls_section( 'sec_left', [ 'label' => __( 'Left Column', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'badge_text',   [ 'label' => __( 'Badge Text', 'plugin-name' ),   'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Mandatory Requirement' ] );
            $this->add_control( 'heading',      [ 'label' => __( 'Heading', 'plugin-name' ),      'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => "Commercial EICR\nFrequency Regulations" ] );
            $this->add_control( 'para1',        [ 'label' => __( 'Paragraph 1 (HTML)', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::WYSIWYG, 'default' => 'In London, Commercial EICR compliance isn\'t optional but mandatory. Guidelines dictate that most commercial properties must undergo an electrical inspection every <strong>five years</strong>.' ] );
            $this->add_control( 'para2',        [ 'label' => __( 'Paragraph 2', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Regular updates may alter the required frequency depending on usage, age, or modifications. Staying informed helps protect investments against legal issues and optimizes insurance costs.' ] );
            $this->add_control( 'box_heading',  [ 'label' => __( 'Insurance Box Heading', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'The Insurance Impact' ] );
            $this->add_control( 'box_body',     [ 'label' => __( 'Insurance Box Body', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Insurers often require up-to-date EICRs before offering coverage. Failure to maintain certificates may lead to increased premiums or denied claims after an incident.' ] );
            $this->add_control( 'box_warning',  [ 'label' => __( 'Warning Label', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'NO CERTIFICATE = VOID INSURANCE' ] );
        $this->end_controls_section();
 
        $this->start_controls_section( 'sec_stats', [ 'label' => __( 'Stat Cards (right)', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $rep = new \Elementor\Repeater();
            $rep->add_control( 'num',      [ 'label' => __( 'Number', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::TEXT, 'default' => '01' ] );
            $rep->add_control( 'title',    [ 'label' => __( 'Title', 'plugin-name' ),      'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Safety Assurance' ] );
            $rep->add_control( 'desc',     [ 'label' => __( 'Description', 'plugin-name' ),'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Guaranteed protection for your property and personnel.' ] );
            $rep->add_control( 'bg_class', [ 'label' => __( 'BG Class', 'plugin-name' ),   'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'bg-navy',    'description' => 'e.g. bg-navy, bg-electric, bg-safety, bg-orange' ] );
            $rep->add_control( 'num_color',[ 'label' => __( 'Number Colour Class', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'text-electric' ] );
            $this->add_control( 'stats', [
                'label'   => __( 'Stat Cards', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $rep->get_controls(),
                'default' => [
                    [ 'num' => '01', 'title' => 'Safety Assurance', 'desc' => 'Guaranteed protection for your property and personnel.',             'bg_class' => 'bg-navy',    'num_color' => 'text-electric' ],
                    [ 'num' => '02', 'title' => 'Legal Compliance',  'desc' => 'Adherence to Electricity at Work Regulations 1989.',               'bg_class' => 'bg-electric','num_color' => 'text-white' ],
                    [ 'num' => '03', 'title' => 'Peace of Mind',     'desc' => 'Operational security in a competitive London market.',              'bg_class' => 'bg-safety',  'num_color' => 'text-white' ],
                    [ 'num' => '04', 'title' => 'Maintenance',       'desc' => 'Proactive repairs to prevent major system failures.',               'bg_class' => 'bg-orange',  'num_color' => 'text-white' ],
                ],
                'title_field' => '{{{ title }}}',
            ] );
        $this->end_controls_section();
 
        $this->start_controls_section( 'sec_style', [ 'label' => __( 'Colours', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'section_bg',  [ 'label' => __( 'Section BG', 'plugin-name' ),   'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#F8FAFC', 'selectors' => [ '{{WRAPPER}} .cfreq-section' => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'badge_bg',    [ 'label' => __( 'Badge BG', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'rgba(239,68,68,0.1)', 'selectors' => [ '{{WRAPPER}} .cfreq-badge' => 'background-color:{{VALUE}};border-color:rgba(239,68,68,0.2);' ] ] );
            $this->add_control( 'badge_col',   [ 'label' => __( 'Badge Text', 'plugin-name' ),   'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#dc2626', 'selectors' => [ '{{WRAPPER}} .cfreq-badge' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'warn_col',    [ 'label' => __( 'Warning Text', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#ef4444', 'selectors' => [ '{{WRAPPER}} .cfreq-warn'  => 'color:{{VALUE}};' ] ] );
        $this->end_controls_section();
    }
 
    protected function render() {
        $s = $this->get_settings_for_display();
        $heading = nl2br( esc_html( $s['heading'] ) );
        ?>
        <section class="cfreq-section py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <!-- LEFT -->
                    <div class="fade-in">
                        <div class="cfreq-badge inline-flex items-center gap-2 px-3 py-1 rounded-full border font-medium text-sm mb-6">
                            <i data-lucide="gavel"></i> <?php echo esc_html( $s['badge_text'] ); ?>
                        </div>
                        <h2 class="text-4xl font-bold text-navy mb-6"><?php echo $heading; ?></h2>
                        <div class="text-lg text-navy/70 mb-6 leading-relaxed"><?php echo wp_kses_post( $s['para1'] ); ?></div>
                        <p class="text-navy/70 mb-8 leading-relaxed"><?php echo esc_html( $s['para2'] ); ?></p>
                        <div class="bg-white p-8 rounded-3xl shadow-lg space-y-4">
                            <h4 class="font-bold text-navy text-xl"><?php echo esc_html( $s['box_heading'] ); ?></h4>
                            <p class="text-sm text-navy/60"><?php echo esc_html( $s['box_body'] ); ?></p>
                            <div class="cfreq-warn flex items-center gap-2 font-bold text-xs">
                                <i data-lucide="alert-triangle"></i> <?php echo esc_html( $s['box_warning'] ); ?>
                            </div>
                        </div>
                    </div>
                    <!-- RIGHT: Stat cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 slide-in-right">
                        <?php foreach ( $s['stats'] as $stat ) : ?>
                        <div class="<?php echo esc_attr( $stat['bg_class'] ); ?> p-8 rounded-3xl text-white">
                            <div class="text-4xl font-heading font-bold mb-4 <?php echo esc_attr( $stat['num_color'] ); ?>"><?php echo esc_html( $stat['num'] ); ?></div>
                            <h4 class="font-bold mb-2"><?php echo esc_html( $stat['title'] ); ?></h4>
                            <p class="text-xs text-white/70 leading-relaxed"><?php echo esc_html( $stat['desc'] ); ?></p>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
}