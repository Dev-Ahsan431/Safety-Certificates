<?php
/**
 * Widget: Example (Starter Template)
 *
 * HOW TO USE:
 *  1. Copy this file → widgets/widget-<your-slug>.php
 *  2. Rename the class → HTE_Widget_<Your_Slug>
 *  3. Replace controls + render() with your HTML section
 *
 * @package HTML_To_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class HTE_Widget_Example extends \Elementor\Widget_Base {

    /* ── Identity ─────────────────────────────────────────────────────── */

    public function get_name()        { return 'hte-example'; }
    public function get_title()       { return __( 'HTE – Example', 'html-to-elementor' ); }
    public function get_icon()        { return 'eicon-code'; }
    public function get_categories()  { return [ 'hte-widgets' ]; }
    public function get_keywords()    { return [ 'hte', 'example' ]; }

    /* ── Controls ─────────────────────────────────────────────────────── */

    protected function register_controls() {

        /* Content tab */
        $this->start_controls_section( 'sec_content', [
            'label' => __( 'Content', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
        ] );

            $this->add_control( 'heading', [
                'label'   => __( 'Heading', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Your Heading', 'html-to-elementor' ),
            ] );

            $this->add_control( 'description', [
                'label'   => __( 'Description', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Your description text goes here.', 'html-to-elementor' ),
            ] );

            $this->add_control( 'button_text', [
                'label'   => __( 'Button Text', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Learn More', 'html-to-elementor' ),
            ] );

            $this->add_control( 'button_link', [
                'label'         => __( 'Button Link', 'html-to-elementor' ),
                'type'          => \Elementor\Controls_Manager::URL,
                'default'       => [ 'url' => '#' ],
                'show_external' => true,
            ] );

            $this->add_control( 'image', [
                'label'   => __( 'Image', 'html-to-elementor' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => [ 'url' => \Elementor\Utils::get_placeholder_image_src() ],
            ] );

        $this->end_controls_section();

        /* Style tab */
        $this->start_controls_section( 'sec_style', [
            'label' => __( 'Heading Style', 'html-to-elementor' ),
            'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
        ] );

            $this->add_control( 'heading_color', [
                'label'     => __( 'Color', 'html-to-elementor' ),
                'type'      => \Elementor\Controls_Manager::COLOR,
                'selectors' => [ '{{WRAPPER}} .hte-example__heading' => 'color: {{VALUE}};' ],
            ] );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(), [
                    'name'     => 'heading_typography',
                    'selector' => '{{WRAPPER}} .hte-example__heading',
                ]
            );

        $this->end_controls_section();
    }

    /* ── Render ───────────────────────────────────────────────────────── */

    protected function render() {
        $s      = $this->get_settings_for_display();
        $target = $s['button_link']['is_external'] ? ' target="_blank"' : '';
        $norel  = $s['button_link']['nofollow']    ? ' rel="nofollow"'  : '';
        ?>
        <div class="hte-example">
            <h2 class="hte-example__heading"><?php echo esc_html( $s['heading'] ); ?></h2>
            <p  class="hte-example__description"><?php echo wp_kses_post( $s['description'] ); ?></p>

            <?php if ( ! empty( $s['image']['url'] ) ) : ?>
                <img class="hte-example__image"
                     src="<?php echo esc_url( $s['image']['url'] ); ?>"
                     alt="<?php echo esc_attr( $s['heading'] ); ?>">
            <?php endif; ?>

            <?php if ( ! empty( $s['button_text'] ) ) : ?>
                <a class="hte-example__btn"
                   href="<?php echo esc_url( $s['button_link']['url'] ); ?>"
                   <?php echo $target . $norel; ?>>
                    <?php echo esc_html( $s['button_text'] ); ?>
                </a>
            <?php endif; ?>
        </div>
        <?php
    }
}
