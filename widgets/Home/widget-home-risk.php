<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Home_Risk extends \Elementor\Widget_Base {

    public function get_name() { return 'home_risk'; }
    public function get_title() { return __( 'Home – Risk / Legal', 'plugin-name' ); }
    public function get_icon() { return 'eicon-alert'; }
    public function get_categories() { return [ 'general' ]; }

    protected function _register_controls() {

        /* ── LEFT COLUMN ── */
        $this->start_controls_section( 'section_left', [ 'label' => __( 'Left Column', 'plugin-name' ) ] );
            $this->add_control( 'badge_text', [
                'label'   => __( 'Badge Text', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Legal Requirement',
            ] );
            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "Don't Risk Fines.\nGet Certified Today!",
            ] );
            $this->add_control( 'description', [
                'label'   => __( 'Description', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Property compliance is not optional. Local authorities and the HSE are actively enforcing regulations. Failing to hold valid safety certificates can result in severe consequences for landlords and property managers.',
            ] );
            $this->add_control( 'button_text', [
                'label'   => __( 'Button Text', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Book Your Inspection Now',
            ] );
            $this->add_control( 'button_url', [
                'label'   => __( 'Button URL', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#' ],
            ] );
        $this->end_controls_section();

        /* ── RISK LIST ITEMS ── */
        $this->start_controls_section( 'section_risks', [ 'label' => __( 'Risk List Items', 'plugin-name' ) ] );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control( 'risk_title', [
                'label'   => __( 'Title', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Up to £30,000 in Fines',
            ] );
            $repeater->add_control( 'risk_description', [
                'label'   => __( 'Description', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Local councils can issue civil penalties up to £30k for missing EICRs or Gas Safety records.',
            ] );
            $this->add_control( 'risk_items', [
                'label'       => __( 'Risk Items', 'plugin-name' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [ 'risk_title' => 'Up to £30,000 in Fines',           'risk_description' => 'Local councils can issue civil penalties up to £30k for missing EICRs or Gas Safety records.' ],
                    [ 'risk_title' => 'Invalidated Insurance',             'risk_description' => 'In the event of a fire or accident, your property insurance is void without valid certificates.' ],
                    [ 'risk_title' => 'Inability to Evict (Section 21)',   'risk_description' => 'You cannot legally serve a Section 21 eviction notice if your property is non-compliant.' ],
                ],
                'title_field' => '{{{ risk_title }}}',
            ] );
        $this->end_controls_section();

        /* ── LEGAL CHECKLIST (right card) ── */
        $this->start_controls_section( 'section_checklist', [ 'label' => __( 'Legal Checklist Card', 'plugin-name' ) ] );
            $this->add_control( 'checklist_title', [
                'label'   => __( 'Card Title', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Legal Checklist',
            ] );
            $this->add_control( 'checklist_subtitle', [
                'label'   => __( 'Card Subtitle', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Mandatory for UK/EU Landlords',
            ] );
            $repeater2 = new \Elementor\Repeater();
            $repeater2->add_control( 'item_icon', [
                'label'   => __( 'Lucide Icon', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'zap',
            ] );
            $repeater2->add_control( 'item_icon_color', [
                'label'   => __( 'Icon Color Class', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'text-electric',
            ] );
            $repeater2->add_control( 'item_label', [
                'label'   => __( 'Label', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'EICR',
            ] );
            $repeater2->add_control( 'item_frequency', [
                'label'   => __( 'Frequency', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Every 5 Years',
            ] );
            $repeater2->add_control( 'item_badge_class', [
                'label'   => __( 'Badge Color Class', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'bg-orange/10 text-orange',
                'description' => 'e.g. bg-orange/10 text-orange  |  bg-red-500/10 text-red-500  |  bg-navy/10 text-navy',
            ] );
            $this->add_control( 'checklist_items', [
                'label'       => __( 'Checklist Items', 'plugin-name' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater2->get_controls(),
                'default'     => [
                    [ 'item_icon' => 'zap',          'item_icon_color' => 'text-electric', 'item_label' => 'EICR',       'item_frequency' => 'Every 5 Years',  'item_badge_class' => 'bg-orange/10 text-orange' ],
                    [ 'item_icon' => 'flame',         'item_icon_color' => 'text-orange',   'item_label' => 'Gas Safety', 'item_frequency' => 'Annually',        'item_badge_class' => 'bg-red-500/10 text-red-500' ],
                    [ 'item_icon' => 'leaf',          'item_icon_color' => 'text-safety',   'item_label' => 'EPC',        'item_frequency' => 'Every 10 Years',  'item_badge_class' => 'bg-orange/10 text-orange' ],
                    [ 'item_icon' => 'shield-alert',  'item_icon_color' => 'text-red-500',  'item_label' => 'Fire Risk',  'item_frequency' => 'Regularly',       'item_badge_class' => 'bg-navy/10 text-navy' ],
                ],
                'title_field' => '{{{ item_label }}}',
            ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $btn_url = isset( $s['button_url']['url'] ) ? esc_url( $s['button_url']['url'] ) : '#';
        $heading_formatted = nl2br( esc_html( $s['heading'] ) );
        ?>
        <section class="py-24 bg-light-grey relative overflow-hidden">
            <div class="absolute top-0 left-0 w-1/2 h-full bg-orange/5 clip-diagonal opacity-50 z-0"></div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <!-- LEFT: Copy -->
                    <div class="fade-in">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-red-500/10 border border-red-500/20 text-red-600 mb-6 font-medium text-sm">
                            <i data-lucide="alert-triangle" class="w-4 h-4"></i>
                            <?php echo esc_html( $s['badge_text'] ); ?>
                        </div>
                        <h2 class="text-4xl font-bold text-navy mb-6"><?php echo $heading_formatted; ?></h2>
                        <p class="text-lg text-navy/70 mb-6"><?php echo esc_html( $s['description'] ); ?></p>

                        <ul class="space-y-4 mb-8">
                            <?php foreach ( $s['risk_items'] as $item ) : ?>
                            <li class="flex items-start gap-3">
                                <div class="mt-1 w-6 h-6 rounded-full bg-red-500/10 flex items-center justify-center text-red-500 shrink-0">
                                    <i data-lucide="x" class="w-4 h-4"></i>
                                </div>
                                <div>
                                    <strong class="text-navy block"><?php echo esc_html( $item['risk_title'] ); ?></strong>
                                    <span class="text-navy/60 text-sm"><?php echo esc_html( $item['risk_description'] ); ?></span>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>

                        <a href="<?php echo $btn_url; ?>" class="inline-block bg-orange hover:bg-orange/90 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-[0_0_20px_rgba(255,122,0,0.3)]">
                            <?php echo esc_html( $s['button_text'] ); ?>
                        </a>
                    </div>

                    <!-- RIGHT: Checklist card -->
                    <div class="relative slide-in-right">
                        <div class="glass p-8 rounded-3xl shadow-2xl border border-white/50 relative z-10 bg-white/60">
                            <div class="flex items-center gap-4 mb-6 pb-6 border-b border-gray-200">
                                <div class="w-16 h-16 bg-navy rounded-2xl flex items-center justify-center text-white">
                                    <i data-lucide="scale" class="w-8 h-8"></i>
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-navy"><?php echo esc_html( $s['checklist_title'] ); ?></h4>
                                    <p class="text-sm text-navy/60"><?php echo esc_html( $s['checklist_subtitle'] ); ?></p>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <?php foreach ( $s['checklist_items'] as $ci ) : ?>
                                <div class="flex items-center justify-between p-4 bg-white rounded-xl shadow-sm border border-gray-100">
                                    <div class="flex items-center gap-3">
                                        <i data-lucide="<?php echo esc_attr( $ci['item_icon'] ); ?>" class="<?php echo esc_attr( $ci['item_icon_color'] ); ?> w-5 h-5"></i>
                                        <span class="font-bold text-navy"><?php echo esc_html( $ci['item_label'] ); ?></span>
                                    </div>
                                    <span class="text-xs font-bold <?php echo esc_attr( $ci['item_badge_class'] ); ?> px-2 py-1 rounded-md">
                                        <?php echo esc_html( $ci['item_frequency'] ); ?>
                                    </span>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!-- Decorative blobs -->
                        <div class="absolute -bottom-6 -left-6 w-24 h-24 bg-safety rounded-full mix-blend-multiply filter blur-xl opacity-50 animate-pulse"></div>
                        <div class="absolute -top-6 -right-6 w-32 h-32 bg-orange rounded-full mix-blend-multiply filter blur-xl opacity-50 animate-pulse" style="animation-delay:1s"></div>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}
