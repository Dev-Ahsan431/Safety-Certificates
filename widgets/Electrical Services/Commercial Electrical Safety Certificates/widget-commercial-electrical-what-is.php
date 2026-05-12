<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Commercial_Electrical_What_Is extends \Elementor\Widget_Base {

    public function get_name()       { return 'commercial_what_is'; }
    public function get_title()      { return __( 'Commercial – What is a CEICR', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-info-box'; }
    public function get_keywords()   { return [ 'hte', '_What_Is', 'banner', 'Commercial',  'electrical' ]; }

    protected function _register_controls() {

        /* ── LEFT COLUMN ── */
        $this->start_controls_section( 'sec_left', [ 'label' => __( 'Left Column', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'eyebrow',     [ 'label' => __( 'Eyebrow', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Definition' ] );
            $this->add_control( 'heading',     [ 'label' => __( 'Heading', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'What is a Commercial EICR (CEICR)?' ] );
            $this->add_control( 'paragraph1',  [ 'label' => __( 'Paragraph 1', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'A Commercial EICR (CEICR) is an Electrical Installation Condition Report for business premises. It assesses the condition of the fixed electrical installation and highlights any defects or risks that could lead to electric shock, fire, or equipment failure.' ] );
            $this->add_control( 'paragraph2',  [ 'label' => __( 'Paragraph 2 (HTML ok)', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::WYSIWYG, 'default' => 'The report confirms whether the installation is <strong>Satisfactory</strong> or <strong>Unsatisfactory</strong>, using clear observation codes (C1 / C2 / C3 / FI) and recommended actions. Commercial EICRs are commonly required for offices, shops, restaurants, warehouses, and industrial units.' ] );
            /* Venue grid */
            $rep = new \Elementor\Repeater();
            $rep->add_control( 'venue_icon',  [ 'label' => __( 'Icon', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'home' ] );
            $rep->add_control( 'venue_label', [ 'label' => __( 'Label', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Mixed-use Buildings' ] );
            $this->add_control( 'venues', [
                'label'   => __( 'Venue Types', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $rep->get_controls(),
                'default' => [
                    [ 'venue_icon' => 'home',         'venue_label' => 'Mixed-use Buildings' ],
                    [ 'venue_icon' => 'shopping-bag', 'venue_label' => 'Retail & Shops' ],
                    [ 'venue_icon' => 'utensils',     'venue_label' => 'Restaurants & Cafes' ],
                    [ 'venue_icon' => 'layout',       'venue_label' => 'Industrial Units' ],
                ],
                'title_field' => '{{{ venue_label }}}',
            ] );
        $this->end_controls_section();

        /* ── RIGHT CARD ── */
        $this->start_controls_section( 'sec_right', [ 'label' => __( 'Right Card', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'card_heading', [ 'label' => __( 'Card Heading', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Professional Testing' ] );
            $rep2 = new \Elementor\Repeater();
            $rep2->add_control( 'item_icon',  [ 'label' => __( 'Icon', 'plugin-name' ),        'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'shield-alert' ] );
            $rep2->add_control( 'item_title', [ 'label' => __( 'Title', 'plugin-name' ),        'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Fire & Safety' ] );
            $rep2->add_control( 'item_desc',  [ 'label' => __( 'Description', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'Prevent electrical fires and accidents in the workplace.' ] );
            $this->add_control( 'card_items', [
                'label'   => __( 'Card Items', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $rep2->get_controls(),
                'default' => [
                    [ 'item_icon' => 'shield-alert', 'item_title' => 'Fire & Safety',      'item_desc' => 'Prevent electrical fires and accidents in the workplace.' ],
                    [ 'item_icon' => 'scale',        'item_title' => 'Legal Standards',     'item_desc' => 'Ensure compliance with the Electricity at Work Regulations 1989.' ],
                    [ 'item_icon' => 'users-2',      'item_title' => 'Staff & Customers',   'item_desc' => 'Maintain safe environments for employees and clients alike.' ],
                    [ 'item_icon' => 'chef-hat',     'item_title' => 'High-Traffic Areas',  'item_desc' => 'Critical standards for commercial kitchens and public spaces.' ],
                ],
                'title_field' => '{{{ item_title }}}',
            ] );
        $this->end_controls_section();

        /* ── STYLE ── */
        $this->start_controls_section( 'sec_style', [ 'label' => __( 'Colours', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'section_bg',   [ 'label' => __( 'Section BG', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#F8FAFC', 'selectors' => [ '{{WRAPPER}} .cwi-section'   => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'eyebrow_col',  [ 'label' => __( 'Eyebrow', 'plugin-name' ),       'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .cwi-eyebrow'   => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'heading_col',  [ 'label' => __( 'Heading', 'plugin-name' ),       'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .cwi-heading'   => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'body_col',     [ 'label' => __( 'Body Text', 'plugin-name' ),     'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'rgba(11,31,58,0.7)', 'selectors' => [ '{{WRAPPER}} .cwi-body' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'venue_icon',   [ 'label' => __( 'Venue Icon', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .cwi-venue-icon' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'card_bg',      [ 'label' => __( 'Right Card BG', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .cwi-card'      => 'background-color:{{VALUE}};' ] ] );
            $this->add_control( 'card_icon',    [ 'label' => __( 'Card Icon Colour', 'plugin-name' ),'type'=> \Elementor\Controls_Manager::COLOR, 'default' => '#1E90FF', 'selectors' => [ '{{WRAPPER}} .cwi-card-icon' => 'color:{{VALUE}};' ] ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="cwi-section py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <!-- LEFT -->
                    <div class="fade-in">
                        <h2 class="cwi-eyebrow text-sm font-bold uppercase tracking-wider mb-2"><?php echo esc_html( $s['eyebrow'] ); ?></h2>
                        <h3 class="cwi-heading text-4xl font-bold mb-6"><?php echo esc_html( $s['heading'] ); ?></h3>
                        <p class="cwi-body text-lg mb-6 leading-relaxed"><?php echo esc_html( $s['paragraph1'] ); ?></p>
                        <div class="cwi-body mb-8 leading-relaxed"><?php echo wp_kses_post( $s['paragraph2'] ); ?></div>
                        <div class="grid grid-cols-2 gap-4">
                            <?php foreach ( $s['venues'] as $v ) : ?>
                            <div class="p-4 bg-white rounded-2xl shadow-sm border border-gray-100 flex items-center gap-3 font-bold text-navy text-sm">
                                <i data-lucide="<?php echo esc_attr( $v['venue_icon'] ); ?>" class="cwi-venue-icon"></i>
                                <?php echo esc_html( $v['venue_label'] ); ?>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- RIGHT CARD -->
                    <div class="cwi-card rounded-3xl p-10 text-white relative overflow-hidden slide-in-right">
                        <div class="absolute top-0 right-0 w-64 h-64 bg-electric rounded-full mix-blend-screen filter blur-[80px] opacity-10"></div>
                        <h4 class="text-2xl font-bold mb-8"><?php echo esc_html( $s['card_heading'] ); ?></h4>
                        <div class="space-y-6">
                            <?php foreach ( $s['card_items'] as $item ) : ?>
                            <div class="flex gap-4">
                                <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center shrink-0">
                                    <i data-lucide="<?php echo esc_attr( $item['item_icon'] ); ?>" class="cwi-card-icon"></i>
                                </div>
                                <div>
                                    <h5 class="font-bold"><?php echo esc_html( $item['item_title'] ); ?></h5>
                                    <p class="text-xs text-white/50"><?php echo esc_html( $item['item_desc'] ); ?></p>
                                </div>
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