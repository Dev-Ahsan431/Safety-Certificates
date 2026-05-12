<?php
/**
 * Widget: Our Services + Booking Form (Section 05)
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Pat_Services_Form extends \Elementor\Widget_Base {

    public function get_name()       { return 'hte-pat-services-form'; }
    public function get_title()      { return __( 'HTE – Services & Booking Form', 'html-to-elementor' ); }
    public function get_icon()       { return 'eicon-form-horizontal'; }
    public function get_categories() { return [ 'hte-widgets' ]; }
    public function get_keywords()   { return [ 'hte', 'pat', 'services', 'booking', 'form' ]; }

    protected function register_controls() {

        /* ── Section Header ── */
        $this->start_controls_section( 'sec_header', [
            'label' => __( 'Header', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'eyebrow', [
                'label'   => __( 'Eyebrow Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Our Reach', 'html-to-elementor' ),
            ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Tailored PAT Testing for Every Sector', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();

        /* ── Service Cards Repeater ── */
        $this->start_controls_section( 'sec_services', [
            'label' => __( 'Service Cards', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control( 'icon', [
                'label'   => __( 'Lucide Icon Name', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'home',
            ] );

            $repeater->add_control( 'service_heading', [
                'label'   => __( 'Service Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Landlords & Letting Agents', 'html-to-elementor' ),
            ] );

            $repeater->add_control( 'service_text', [
                'label'   => __( 'Service Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Rapid turnaround for tenant changeovers and annual renewals.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'services', [
                'label'       => __( 'Services', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => [
                    [
                        'icon'            => 'home',
                        'service_heading' => __( 'Landlords & Letting Agents', 'html-to-elementor' ),
                        'service_text'    => __( 'Rapid turnaround for tenant changeovers and annual renewals.', 'html-to-elementor' ),
                    ],
                    [
                        'icon'            => 'building-2',
                        'service_heading' => __( 'Commercial Offices', 'html-to-elementor' ),
                        'service_text'    => __( 'Discreet testing scheduled to minimize workday disruption.', 'html-to-elementor' ),
                    ],
                    [
                        'icon'            => 'graduation-cap',
                        'service_heading' => __( 'Schools & Colleges', 'html-to-elementor' ),
                        'service_text'    => __( 'Large-scale testing for diverse IT and lab equipment.', 'html-to-elementor' ),
                    ],
                    [
                        'icon'            => 'coffee',
                        'service_heading' => __( 'Hospitality', 'html-to-elementor' ),
                        'service_text'    => __( 'Testing for commercial kitchens, hotels, and retail outlets.', 'html-to-elementor' ),
                    ],
                ],
                'title_field' => '{{{ service_heading }}}',
            ] );

        $this->end_controls_section();

        /* ── Booking Form ── */
        $this->start_controls_section( 'sec_form', [
            'label' => __( 'Booking Form', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'form_heading', [
                'label'   => __( 'Form Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Ready to Ensure Compliance?', 'html-to-elementor' ),
            ] );

            $this->add_control( 'form_name_placeholder', [
                'label'   => __( 'Name Placeholder', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Full Name', 'html-to-elementor' ),
            ] );

            $this->add_control( 'form_phone_placeholder', [
                'label'   => __( 'Phone Placeholder', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Phone Number', 'html-to-elementor' ),
            ] );

            $this->add_control( 'form_email_placeholder', [
                'label'   => __( 'Email Placeholder', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Email Address', 'html-to-elementor' ),
            ] );

            /* Service type options repeater */
            $opt_repeater = new \Elementor\Repeater();
            $opt_repeater->add_control( 'option_label', [
                'label'   => __( 'Option Label', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Domestic PAT (up to 15 items)', 'html-to-elementor' ),
            ] );

            $this->add_control( 'form_select_placeholder', [
                'label'   => __( 'Select Placeholder', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Select Service Type', 'html-to-elementor' ),
            ] );

            $this->add_control( 'service_options', [
                'label'       => __( 'Service Options', 'html-to-elementor' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $opt_repeater->get_controls(),
                'default'     => [
                    [ 'option_label' => __( 'Domestic PAT (up to 15 items)', 'html-to-elementor' ) ],
                    [ 'option_label' => __( 'HMO PAT (London Package)', 'html-to-elementor' ) ],
                    [ 'option_label' => __( 'Commercial / Office PAT', 'html-to-elementor' ) ],
                    [ 'option_label' => __( 'Custom / Large Scale', 'html-to-elementor' ) ],
                ],
                'title_field' => '{{{ option_label }}}',
            ] );

            $this->add_control( 'form_button_text', [
                'label'   => __( 'Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Check Available Slots', 'html-to-elementor' ),
            ] );

            $this->add_control( 'form_note', [
                'label'   => __( 'Form Note', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Guaranteed same-day response during business hours.', 'html-to-elementor' ),
            ] );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="py-24 bg-navy text-white relative overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid lg:grid-cols-2 gap-16 items-center">

                    <!-- Left: Services Grid -->
                    <div>
                        <?php if ( ! empty( $s['eyebrow'] ) ) : ?>
                            <h2 class="text-sm font-bold text-electric uppercase tracking-wider mb-2">
                                <?php echo esc_html( $s['eyebrow'] ); ?>
                            </h2>
                        <?php endif; ?>
                        <?php if ( ! empty( $s['heading'] ) ) : ?>
                            <h3 class="text-4xl font-extrabold mb-8">
                                <?php echo esc_html( $s['heading'] ); ?>
                            </h3>
                        <?php endif; ?>

                        <div class="grid sm:grid-cols-2 gap-6">
                            <?php foreach ( $s['services'] as $service ) : ?>
                                <div class="bg-white/5 p-6 rounded-2xl border border-white/10 hover:bg-white/10 transition-all">
                                    <i data-lucide="<?php echo esc_attr( $service['icon'] ); ?>" class="text-electric mb-4"></i>
                                    <h4 class="font-bold mb-2"><?php echo esc_html( $service['service_heading'] ); ?></h4>
                                    <p class="text-xs text-white/50"><?php echo wp_kses_post( $service['service_text'] ); ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Right: Booking Form -->
                    <div class="bg-white rounded-[40px] p-10 lg:p-16 text-navy shadow-3xl">
                        <?php if ( ! empty( $s['form_heading'] ) ) : ?>
                            <h4 class="text-2xl font-bold mb-6 italic">
                                <?php echo esc_html( $s['form_heading'] ); ?>
                            </h4>
                        <?php endif; ?>

                        <form id="booking" class="space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                <input type="text"
                                       placeholder="<?php echo esc_attr( $s['form_name_placeholder'] ); ?>"
                                       class="w-full bg-light-grey px-6 py-4 rounded-xl border border-gray-100 focus:outline-none focus:border-electric">
                                <input type="tel"
                                       placeholder="<?php echo esc_attr( $s['form_phone_placeholder'] ); ?>"
                                       class="w-full bg-light-grey px-6 py-4 rounded-xl border border-gray-100 focus:outline-none focus:border-electric">
                            </div>
                            <input type="email"
                                   placeholder="<?php echo esc_attr( $s['form_email_placeholder'] ); ?>"
                                   class="w-full bg-light-grey px-6 py-4 rounded-xl border border-gray-100 focus:outline-none focus:border-electric">
                            <select class="w-full bg-light-grey px-6 py-4 rounded-xl border border-gray-100 focus:outline-none focus:border-electric appearance-none">
                                <option><?php echo esc_html( $s['form_select_placeholder'] ); ?></option>
                                <?php foreach ( $s['service_options'] as $opt ) : ?>
                                    <option><?php echo esc_html( $opt['option_label'] ); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button type="submit" class="w-full bg-electric text-white py-5 rounded-xl font-bold text-lg hover:bg-navy transition-all shadow-xl shadow-electric/20">
                                <?php echo esc_html( $s['form_button_text'] ); ?>
                            </button>
                            <?php if ( ! empty( $s['form_note'] ) ) : ?>
                                <p class="text-center text-xs text-navy/40">
                                    <?php echo esc_html( $s['form_note'] ); ?>
                                </p>
                            <?php endif; ?>
                        </form>
                    </div>

                </div>
            </div>
            <!-- Decorative circle -->
            <div class="absolute -top-24 -right-24 w-96 h-96 bg-electric/10 rounded-full blur-[120px]"></div>
        </section>
        <?php
    }
}