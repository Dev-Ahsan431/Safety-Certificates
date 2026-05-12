<?php
if ( ! defined( 'ABSPATH' ) ) exit;
 
class HTE_Widget_Electrical_FF_Common_Faults extends \Elementor\Widget_Base {

    public function get_name()       { return 'ff_common_faults'; }
    public function get_title()      { return __( 'Fault Finding – Common Faults', 'plugin-name' ); }
    public function get_icon()       { return 'eicon-warning'; }
    public function get_keywords()   { return [ 'hte', 'Common_Faults', 'banner', 'FF',  'electrical' ]; }
 
    protected function _register_controls() {
 
        $this->start_controls_section( 'sec_image', [ 'label' => __( 'Left Image', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'image',         [ 'label' => __( 'Image', 'plugin-name' ),          'type' => \Elementor\Controls_Manager::MEDIA, 'default' => [ 'url' => 'https://images.unsplash.com/photo-1544724569-5f546fd6f2b5?q=80&w=2070&auto=format&fit=crop' ] ] );
            $this->add_control( 'image_alt',     [ 'label' => __( 'Image Alt', 'plugin-name' ),      'type' => \Elementor\Controls_Manager::TEXT,  'default' => 'Identifying electrical faults' ] );
            $this->add_control( 'overlay_title', [ 'label' => __( 'Overlay Title', 'plugin-name' ),  'type' => \Elementor\Controls_Manager::TEXT,  'default' => 'Critical Warning' ] );
            $this->add_control( 'overlay_desc',  [ 'label' => __( 'Overlay Desc', 'plugin-name' ),   'type' => \Elementor\Controls_Manager::TEXT,  'default' => 'Flickering lights are often a sign of loose connections.' ] );
        $this->end_controls_section();
 
        $this->start_controls_section( 'sec_faults', [ 'label' => __( 'Fault Items', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_CONTENT ] );
            $this->add_control( 'heading', [ 'label' => __( 'Heading', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT, 'default' => 'Common Electrical Faults' ] );
            $rep = new \Elementor\Repeater();
            $rep->add_control( 'icon',      [ 'label' => __( 'Icon', 'plugin-name' ),       'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'toggle-left' ] );
            $rep->add_control( 'icon_bg',   [ 'label' => __( 'Icon BG', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'bg-electric/10', 'description' => 'Tailwind class e.g. bg-electric/10' ] );
            $rep->add_control( 'icon_col',  [ 'label' => __( 'Icon Color', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'text-electric' ] );
            $rep->add_control( 'title',     [ 'label' => __( 'Title', 'plugin-name' ),      'type' => \Elementor\Controls_Manager::TEXT,    'default' => 'Tripping Circuit Breakers' ] );
            $rep->add_control( 'desc',      [ 'label' => __( 'Description', 'plugin-name' ),'type' => \Elementor\Controls_Manager::TEXTAREA, 'default' => 'An overloaded circuit or a ground fault causing the breaker to trip frequently.' ] );
            $this->add_control( 'faults', [
                'label' => __( 'Faults', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::REPEATER, 'fields' => $rep->get_controls(),
                'default' => [
                    [ 'icon' => 'toggle-left',  'icon_bg' => 'bg-electric/10',  'icon_col' => 'text-electric', 'title' => 'Tripping Circuit Breakers',      'desc' => 'An overloaded circuit or a ground fault causing the breaker to trip frequently.' ],
                    [ 'icon' => 'flame',        'icon_bg' => 'bg-orange/10',    'icon_col' => 'text-orange',   'title' => 'Flickering Lights',               'desc' => 'Often caused by loose wiring or poor connections within the fixture or panel.' ],
                    [ 'icon' => 'thermometer',  'icon_bg' => 'bg-red-100',      'icon_col' => 'text-red-500',  'title' => 'Overheating Electrical Outlets',  'desc' => 'Sockets that are warm to the touch or show scorch marks indicate serious danger.' ],
                    [ 'icon' => 'zap',          'icon_bg' => 'bg-safety/10',    'icon_col' => 'text-safety',   'title' => 'Buzzing Noises',                  'desc' => 'A humming or buzzing sound from switches or panels suggests loose terminations.' ],
                ],
                'title_field' => '{{{ title }}}',
            ] );
        $this->end_controls_section();
 
        $this->start_controls_section( 'sec_style', [ 'label' => __( 'Colours', 'plugin-name' ), 'tab' => \Elementor\Controls_Manager::TAB_STYLE ] );
            $this->add_control( 'heading_col', [ 'label' => __( 'Heading', 'plugin-name' ),    'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .ffc-heading' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'ftitle_col',  [ 'label' => __( 'Fault Title', 'plugin-name' ),'type' => \Elementor\Controls_Manager::COLOR, 'default' => '#0B1F3A', 'selectors' => [ '{{WRAPPER}} .ffc-ftitle' => 'color:{{VALUE}};' ] ] );
            $this->add_control( 'fdesc_col',   [ 'label' => __( 'Fault Desc', 'plugin-name' ), 'type' => \Elementor\Controls_Manager::COLOR, 'default' => 'rgba(11,31,58,0.6)', 'selectors' => [ '{{WRAPPER}} .ffc-fdesc'  => 'color:{{VALUE}};' ] ] );
        $this->end_controls_section();
    }
 
    protected function render() {
        $s   = $this->get_settings_for_display();
        $img = ! empty( $s['image']['url'] ) ? esc_url( $s['image']['url'] ) : '';
        ?>
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    <!-- LEFT: Image -->
                    <div class="slide-in-left">
                        <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                            <?php if ( $img ) : ?>
                            <img src="<?php echo $img; ?>" alt="<?php echo esc_attr( $s['image_alt'] ); ?>" class="w-full h-auto" referrerpolicy="no-referrer">
                            <?php endif; ?>
                            <div class="absolute inset-0 bg-gradient-to-t from-navy/80 to-transparent flex items-end p-8">
                                <div class="bg-white/10 backdrop-blur-md border border-white/20 p-6 rounded-2xl w-full">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-electric rounded-xl flex items-center justify-center text-white"><i data-lucide="alert-circle"></i></div>
                                        <div>
                                            <h4 class="font-bold text-white"><?php echo esc_html( $s['overlay_title'] ); ?></h4>
                                            <p class="text-xs text-white/60"><?php echo esc_html( $s['overlay_desc'] ); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- RIGHT: Faults list -->
                    <div class="fade-in">
                        <h2 class="ffc-heading text-4xl font-bold mb-8 leading-tight"><?php echo esc_html( $s['heading'] ); ?></h2>
                        <div class="space-y-6">
                            <?php foreach ( $s['faults'] as $fault ) : ?>
                            <div class="flex gap-4 p-6 bg-light-grey rounded-2xl border border-gray-100 transition-all hover:bg-white hover:shadow-lg">
                                <div class="w-12 h-12 <?php echo esc_attr( $fault['icon_bg'] ); ?> <?php echo esc_attr( $fault['icon_col'] ); ?> rounded-xl flex items-center justify-center shrink-0">
                                    <i data-lucide="<?php echo esc_attr( $fault['icon'] ); ?>"></i>
                                </div>
                                <div>
                                    <h4 class="ffc-ftitle font-bold text-lg mb-1"><?php echo esc_html( $fault['title'] ); ?></h4>
                                    <p class="ffc-fdesc text-sm"><?php echo esc_html( $fault['desc'] ); ?></p>
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