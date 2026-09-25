<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class CC_FooterNavi_Widget extends WP_Widget{
    function __construct() {
        parent::__construct(
            'cc_footernavi_widget',
            'Saitama_' . __( 'Footer Navi', 'cc-addon-pack' ),
            array()
        );
    }


    public function widget( $args, $instance ) {
        $nav_menu = ! empty( $instance['menu'] ) ? wp_get_nav_menu_object( $instance['menu'] ) : false;

        if ( !$nav_menu ) return;

        echo wp_kses_post( $args['before_widget'] );

        $menu_args = array(
            'menu'              => $nav_menu,
            'container'         => '',
            'after'             => '<i class="fa fa-angle-right"></i>',
            'items_wrap'        => '<ul class="list-unstyled link-list">%3$s</ul>',
            'echo'              => false,
            'fallback_cb'       => '',
        );

        echo PHP_EOL.'<div class="headline"><h2>';
        if ( isset( $instance['label'] ) && $instance['label'] ) {
            echo esc_html( $instance['label'] );
        } else {
            esc_html_e( 'Link', 'cc-addon-pack' );
        }
        echo '</h2></div>'.PHP_EOL;

        echo wp_nav_menu( $menu_args );

        echo wp_kses_post( $args['after_widget'] );
    }


    public function form( $instance ){
        $defaults = array(
            'label'     => __( 'Link', 'cc-addon-pack' ),
            'menu'      => ''
        );
        $instance = wp_parse_args( (array) $instance, $defaults );

        $menus = wp_get_nav_menus();
        $url = admin_url( 'nav-menus.php' );
        ?>
        <p class="nav-menu-widget-no-menus-message" <?php if ( ! empty( $menus ) ) { echo ' style="display:none" '; } ?>>
            <?php
            printf(
                /* translators: %s: URL to the Menus admin screen. */
                wp_kses( __( 'No menus have been created yet. <a href="%s">Create some</a>.', 'cc-addon-pack' ), array( 'a' => array( 'href' => array() ) ) ),
                esc_url( $url )
            );
            ?>
        </p>
        <div class="nav-menu-widget-form-controls" style="padding:1em 0; <?php if ( empty( $menus ) ) { echo 'display:none'; } ?>">
        <label for="<?php echo esc_attr( $this->get_field_id( 'label' ) ); ?>"><?php esc_html_e( 'Title:', 'cc-addon-pack' ); ?></label><br/>
        <input type="text" id="<?php echo esc_attr( $this->get_field_id( 'label' ) ); ?>-title" name="<?php echo esc_attr( $this->get_field_name( 'label' ) ); ?>" value="<?php echo esc_attr( $instance['label'] ); ?>" />
        <br/><br/>

        <label for="<?php echo esc_attr( $this->get_field_id( 'menu' ) ); ?>"><?php esc_html_e( 'Select Menu:', 'cc-addon-pack' ); ?></label>
        <select id="<?php echo esc_attr( $this->get_field_id( 'menu' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'menu' ) ); ?>">
            <option value="0"><?php esc_html_e( '&mdash; Select &mdash;', 'cc-addon-pack' ); ?></option>
            <?php foreach ( $menus as $menu ) : ?>
                <option value="<?php echo esc_attr( $menu->term_id ); ?>" <?php selected( $instance['menu'], $menu->term_id ); ?>>
                    <?php echo esc_html( $menu->name ); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br/><br/>
        </div>
        <?php
        return $instance;
    }


    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['label'] = sanitize_text_field( $new_instance['label'] );
        $instance['menu'] = absint( $new_instance['menu'] );
        return $instance;
    }

}

add_action( 'widgets_init', function(){ register_widget("CC_FooterNavi_Widget");} );
