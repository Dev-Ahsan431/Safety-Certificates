<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Home_Hero extends \Elementor\Widget_Base {

    public function get_name() { return 'home_hero'; }
    public function get_title() { return __( 'Home – Hero', 'HTE', 'plugin-name' ); }
    public function get_icon() { return 'eicon-banner'; }
    public function get_categories() { return [ 'general' ]; }

    protected function _register_controls() {

        /* ── BADGE ── */
        $this->start_controls_section( 'section_badge', [ 'label' => __( 'Badge', 'plugin-name' ) ] );
            $this->add_control( 'badge_text', [
                'label'   => __( 'Badge Text', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => "Europe's #1 Compliance Partner",
            ] );
        $this->end_controls_section();

        /* ── HEADLINE ── */
        $this->start_controls_section( 'section_headline', [ 'label' => __( 'Headline', 'plugin-name' ) ] );
            $this->add_control( 'heading_plain', [
                'label'   => __( 'Heading (Plain Part)', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Fast & Certified Property',
            ] );
            $this->add_control( 'heading_gradient', [
                'label'   => __( 'Heading (Gradient Part)', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Safety Certificates',
            ] );
            $this->add_control( 'subheading', [
                'label'   => __( 'Subheading', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => 'Fully accredited inspections for EICR, Gas, Fire, EPC, and Asbestos. Get your property compliant in as little as 24 hours.',
            ] );
        $this->end_controls_section();

        /* ── BUTTONS ── */
        $this->start_controls_section( 'section_buttons', [ 'label' => __( 'Buttons', 'plugin-name' ) ] );
            $this->add_control( 'btn_primary_text', [
                'label'   => __( 'Primary Button Text', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Get Instant Quote',
            ] );
            $this->add_control( 'btn_primary_url', [
                'label'   => __( 'Primary Button URL', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#' ],
            ] );
            $this->add_control( 'btn_secondary_text', [
                'label'   => __( 'Secondary Button Text', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Book Inspection',
            ] );
            $this->add_control( 'btn_secondary_url', [
                'label'   => __( 'Secondary Button URL', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => [ 'url' => '#' ],
            ] );
        $this->end_controls_section();

        /* ── TRUST BULLETS ── */
        $this->start_controls_section( 'section_trust_bullets', [ 'label' => __( 'Trust Bullets', 'plugin-name' ) ] );
            $repeater = new \Elementor\Repeater();
            $repeater->add_control( 'bullet_text', [
                'label'   => __( 'Text', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Fully Insured',
            ] );
            $this->add_control( 'trust_bullets', [
                'label'   => __( 'Bullets', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::REPEATER,
                'fields'  => $repeater->get_controls(),
                'default' => [
                    [ 'bullet_text' => 'Fully Insured' ],
                    [ 'bullet_text' => 'Certified Engineers' ],
                    [ 'bullet_text' => 'Same-Day Reports' ],
                ],
                'title_field' => '{{{ bullet_text }}}',
            ] );
        $this->end_controls_section();

        /* ── FORM ── */
        $this->start_controls_section( 'section_form', [ 'label' => __( 'Form', 'plugin-name' ) ] );
            $this->add_control( 'form_title', [
                'label'   => __( 'Form Title', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Check Your Property',
            ] );
            $this->add_control( 'form_subtitle', [
                'label'   => __( 'Form Subtitle', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Enter details for an instant compliance check.',
            ] );
            $this->add_control( 'form_submit_text', [
                'label'   => __( 'Submit Button Text', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'See Pricing & Availability',
            ] );
        $this->end_controls_section();

        /* ── FLOATING BADGE ── */
        $this->start_controls_section( 'section_floating', [ 'label' => __( 'Floating Badge', 'plugin-name' ) ] );
            $this->add_control( 'floating_label', [
                'label'   => __( 'Label', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Status',
            ] );
            $this->add_control( 'floating_value', [
                'label'   => __( 'Value', 'plugin-name' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '100% Compliant',
            ] );
        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();

        $btn_primary_url   = isset( $s['btn_primary_url']['url'] )   ? esc_url( $s['btn_primary_url']['url'] )   : '#';
        $btn_secondary_url = isset( $s['btn_secondary_url']['url'] ) ? esc_url( $s['btn_secondary_url']['url'] ) : '#';
        ?>
        <section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden bg-navy text-white clip-diagonal">
            <!-- Glow blobs -->
            <div class="absolute inset-0 z-0 opacity-20">
                <div class="absolute top-0 left-1/4 w-96 h-96 bg-electric rounded-full mix-blend-screen filter blur-[100px] animate-pulse"></div>
                <div class="absolute bottom-0 right-1/4 w-96 h-96 bg-safety rounded-full mix-blend-screen filter blur-[100px] animate-pulse" style="animation-delay:2s"></div>
            </div>

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid lg:grid-cols-2 gap-12 items-center">

                    <!-- LEFT: Copy -->
                    <div class="max-w-2xl slide-in-left">
                        <!-- Badge -->
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/20 backdrop-blur-sm mb-6">
                            <span class="flex h-2 w-2 rounded-full bg-safety"></span>
                            <span class="text-sm font-medium text-white/90"><?php echo esc_html( $s['badge_text'] ); ?></span>
                        </div>

                        <!-- Heading -->
                        <h1 class="text-5xl lg:text-7xl font-bold leading-tight mb-6">
                            <?php echo esc_html( $s['heading_plain'] ); ?>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-electric to-safety"><?php echo esc_html( $s['heading_gradient'] ); ?></span>
                        </h1>

                        <!-- Subheading -->
                        <p class="text-lg text-white/80 mb-8 max-w-xl leading-relaxed"><?php echo esc_html( $s['subheading'] ); ?></p>

                        <!-- Buttons -->
                        <div class="flex flex-col sm:flex-row gap-4 mb-10">
                            <a href="<?php echo $btn_primary_url; ?>" class="bg-orange hover:bg-orange/90 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-[0_0_20px_rgba(255,122,0,0.4)] flex items-center justify-center gap-2">
                                <?php echo esc_html( $s['btn_primary_text'] ); ?>
                                <i data-lucide="arrow-right" class="w-5 h-5"></i>
                            </a>
                            <a href="<?php echo $btn_secondary_url; ?>" class="bg-white/10 hover:bg-white/20 border border-white/20 text-white px-8 py-4 rounded-xl font-bold text-lg transition-all flex items-center justify-center gap-2 backdrop-blur-sm">
                                <?php echo esc_html( $s['btn_secondary_text'] ); ?>
                            </a>
                        </div>

                        <!-- Trust bullets -->
                        <div class="flex flex-wrap items-center gap-6 text-sm font-medium text-white/70">
                            <?php foreach ( $s['trust_bullets'] as $bullet ) : ?>
                                <div class="flex items-center gap-2">
                                    <i data-lucide="check-circle-2" class="text-safety w-4 h-4"></i>
                                    <span><?php echo esc_html( $bullet['bullet_text'] ); ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- RIGHT: Form card -->
                    <div class="relative lg:ml-auto w-full max-w-md slide-in-right">
                        <div class="glass-dark p-8 rounded-3xl shadow-2xl relative z-10">

                            <!-- Success message -->
                            <div id="success-message" class="hidden text-center py-8">
                                <div class="w-16 h-16 bg-safety/20 text-safety rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i data-lucide="check-circle-2" class="w-8 h-8"></i>
                                </div>
                                <h3 class="text-2xl font-bold mb-2">Request Received!</h3>
                                <p class="text-white/80 mb-6">Thank you. One of our compliance experts will contact you shortly with your quote.</p>
                                <button id="submit-another" class="bg-white/10 hover:bg-white/20 border border-white/20 text-white px-6 py-2 rounded-xl font-bold transition-all">Submit Another</button>
                            </div>

                            <!-- Form -->
                            <div id="quote-form-container">
                                <h3 class="text-2xl font-bold mb-2"><?php echo esc_html( $s['form_title'] ); ?></h3>
                                <p class="text-white/60 mb-6 text-sm"><?php echo esc_html( $s['form_subtitle'] ); ?></p>
                                <div id="form-error" class="hidden bg-red-500/20 border border-red-500/50 text-red-200 px-4 py-2 rounded-lg mb-4 text-sm"></div>
                                <form id="quote-form" class="space-y-4">
                                    <div>
                                        <label class="block text-xs font-medium text-white/60 mb-1 uppercase tracking-wider">Property Type</label>
                                        <select id="prop-type" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-electric transition-colors appearance-none">
                                            <option value="residential" class="text-navy">Residential (Landlord)</option>
                                            <option value="commercial" class="text-navy">Commercial</option>
                                            <option value="homeowner" class="text-navy">Homeowner</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-white/60 mb-1 uppercase tracking-wider">Services Needed</label>
                                        <div class="grid grid-cols-2 gap-2">
                                            <label class="flex items-center gap-2 p-3 rounded-xl border border-white/10 bg-white/5 cursor-pointer hover:bg-white/10 transition-colors">
                                                <input type="checkbox" class="accent-electric service-checkbox" value="EICR" checked /> <span class="text-sm">EICR</span>
                                            </label>
                                            <label class="flex items-center gap-2 p-3 rounded-xl border border-white/10 bg-white/5 cursor-pointer hover:bg-white/10 transition-colors">
                                                <input type="checkbox" class="accent-electric service-checkbox" value="Gas Safety" checked /> <span class="text-sm">Gas Safety</span>
                                            </label>
                                            <label class="flex items-center gap-2 p-3 rounded-xl border border-white/10 bg-white/5 cursor-pointer hover:bg-white/10 transition-colors">
                                                <input type="checkbox" class="accent-electric service-checkbox" value="EPC" /> <span class="text-sm">EPC</span>
                                            </label>
                                            <label class="flex items-center gap-2 p-3 rounded-xl border border-white/10 bg-white/5 cursor-pointer hover:bg-white/10 transition-colors">
                                                <input type="checkbox" class="accent-electric service-checkbox" value="Fire Risk" /> <span class="text-sm">Fire Risk</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-3">
                                        <div>
                                            <label class="block text-xs font-medium text-white/60 mb-1 uppercase tracking-wider">Postcode</label>
                                            <input type="text" id="postcode" required placeholder="e.g. SW1A 1AA" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-electric transition-colors" />
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-white/60 mb-1 uppercase tracking-wider">Phone</label>
                                            <input type="tel" id="phone" required placeholder="07000 000000" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-electric transition-colors" />
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-medium text-white/60 mb-1 uppercase tracking-wider">Email</label>
                                        <input type="email" id="email" required placeholder="you@example.com" class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-electric transition-colors" />
                                    </div>
                                    <button type="submit" id="submit-btn" class="w-full bg-electric hover:bg-electric/90 disabled:bg-electric/50 text-white font-bold py-4 rounded-xl mt-2 transition-colors flex items-center justify-center gap-2">
                                        <?php echo esc_html( $s['form_submit_text'] ); ?>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Floating badge -->
                        <div class="absolute -top-6 -right-6 bg-white text-navy p-4 rounded-2xl shadow-xl flex items-center gap-3 z-20" style="animation: bounce 4s infinite ease-in-out;">
                            <div class="bg-safety/20 p-2 rounded-full text-safety"><i data-lucide="shield" class="w-6 h-6"></i></div>
                            <div>
                                <p class="text-xs font-bold text-navy/50 uppercase"><?php echo esc_html( $s['floating_label'] ); ?></p>
                                <p class="font-bold"><?php echo esc_html( $s['floating_value'] ); ?></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php
    }
}