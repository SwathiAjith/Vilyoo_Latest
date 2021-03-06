<?php

/**
 * Tempalte shortcode class file
 *
 * @load all shortcode for template  rendering
 */
class Dokan_Template_Shortcodes {

    public static $errors;
    public static $product_cat;
    public static $post_content;
    public static $validated;
    public static $validate;

    /**
     *  Dokan template shortcodes __constract
     *  Initial loaded when class create an instanace
     */
    function __construct() {

        add_action( 'template_redirect', array( $this, 'handle_all_submit' ), 11 );
        add_action( 'template_redirect', array( $this, 'handle_delete_product' ) );
        add_action( 'template_redirect', array( $this, 'handle_withdraws' ) );
        add_action( 'template_redirect', array( $this, 'handle_coupons' ) );
        add_action( 'template_redirect', array( $this, 'handle_order_export' ) );
        add_action( 'template_redirect', array( $this, 'handle_shipping' ) );

        add_shortcode( 'dokan-dashboard', array( $this, 'load_template_files' ) );
        add_shortcode( 'dokan-best-selling-product', array( $this, 'best_selling_product_shortcode' ) );
        add_shortcode( 'dokan-top-rated-product', array( $this, 'top_rated_product_shortcode' ) );
        add_shortcode( 'dokan-stores', array( $this, 'store_listing' ) );
        add_shortcode( 'dokan-my-orders', array( $this, 'my_orders_page' ) );
    }

    /**
     * Singleton method
     *
     * @return self
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new Dokan_Template_Shortcodes();
        }

        return $instance;
    }

    /**
     * Load template files
     *
     * Based on the query vars, load the appropriate template files
     * in the frontend user dashboard.
     *
     * @return void
     */
    public function load_template_files() {
        global $wp;

        $dokan_shipping_option = get_option( 'woocommerce_dokan_product_shipping_settings' );

        $enable_shipping = ( isset( $dokan_shipping_option['enabled'] ) ) ? $dokan_shipping_option['enabled'] : 'yes';

        if ( ! function_exists( 'WC' ) ) {
            return sprintf( __( 'Please install <a href="%s"><strong>WooCommerce</strong></a> plugin first', 'dokan' ), 'http://wordpress.org/plugins/woocommerce/' );
        }

        if ( isset( $wp->query_vars['reports'] ) ) {
            dokan_get_template_part( 'reports' );
            return;
        }

        if ( isset( $wp->query_vars['products'] ) ) {
            dokan_get_template_part( 'products' );
            return;
        }

        if ( isset( $wp->query_vars['new-product'] ) ) {
            dokan_get_template_part( 'new-product' );
            return;
        }
         if ( isset( $wp->query_vars['new-workshop'] ) ) {
            dokan_get_template_part( 'new-product' );
            return;
        }

        if ( isset( $wp->query_vars['orders'] ) ) {
            dokan_get_template_part( 'orders' );
            return;
        }

        if ( isset( $wp->query_vars['coupons'] ) ) {
            dokan_get_template_part( 'coupons' );
            return;
        }

        if ( isset( $wp->query_vars['reviews'] ) ) {
            dokan_get_template_part( 'reviews' );
            return;
        }

        if ( isset( $wp->query_vars['withdraw'] ) ) {
            dokan_get_template_part( 'withdraw' );
            return;
        }

        if ( isset( $wp->query_vars['announcement'] ) ) {
            dokan_get_template_part( 'announcement' );
            return;
        }

        if ( isset( $wp->query_vars['single-announcement'] ) ) {
            dokan_get_template_part( 'single-announcement' );
            return;
        }

        if ( isset( $wp->query_vars['shipping'] ) && $enable_shipping == 'yes' ) {
            dokan_get_template_part( 'shipping' );
            return;
        }

        if ( isset( $wp->query_vars['settings'] ) ) {
            dokan_get_template_part( 'settings' );
            return;
        }

        if ( isset( $wp->query_vars['page'] ) ) {
            dokan_get_template_part( 'dashboard' );
            return;
        }

        do_action( 'dokan_load_custom_template', $wp->query_vars );
    }

    /**
     * Handle all the form POST submit
     *
     * @return void
     */
    function handle_all_submit() {

        if ( ! is_user_logged_in() ) {
            return;
        }

        if ( ! dokan_is_user_seller( get_current_user_id() ) ) {
            return;
        }

        $errors = array();
        self::$product_cat  = -1;
        self::$post_content = __( 'Details about your product...', 'dokan' );

        if ( ! $_POST ) {
            return;
        }

        if ( isset( $_POST['add_product'] ) && wp_verify_nonce( $_POST['dokan_add_new_product_nonce'], 'dokan_add_new_product' ) ) {
            $post_title     = trim( $_POST['post_title'] );
            $post_content   = trim( $_POST['post_content'] );
            $post_excerpt   = trim( $_POST['post_excerpt'] );
            $workshop_type  = $_POST['workshop_type'];
            $price          = floatval( $_POST['price'] );
            $featured_image = absint( $_POST['feat_image_id'] );

            if ( empty( $post_title ) ) {

                $errors[] = __( 'Please enter product title', 'dokan' );
            }

            if( dokan_get_option( 'product_category_style', 'dokan_selling', 'single' ) == 'single' ) {
                $product_cat    = intval( $_POST['product_cat'] );
                if ( $product_cat < 0 ) {
                    $errors[] = __( 'Please select a category', 'dokan' );
                }
            } else {
                if( !isset( $_POST['product_cat'] ) && empty( $_POST['product_cat'] ) ) {
                    $errors[] = __( 'Please select atleast one category', 'dokan' );
                }
            }

            self::$errors = apply_filters( 'dokan_can_add_product', $errors );

            if ( !self::$errors ) {

                $product_status = dokan_get_new_post_status();
                $post_data = apply_filters( 'dokan_insert_product_post_data', array(
                        'post_type'    => 'product',
                        'post_status'  => $product_status,
                        'post_title'   => $post_title,
                        'post_content' => $post_content,
                        'post_excerpt' => $post_excerpt,
                    ) );

                $product_id = wp_insert_post( $post_data );

                if ( $product_id ) {

                    /** set images **/
                    if ( $featured_image ) {
                        set_post_thumbnail( $product_id, $featured_image );
                    }

                    if( isset( $_POST['product_tag'] ) && !empty( $_POST['product_tag'] ) ) {
                        $tags_ids = array_map( 'intval', (array)$_POST['product_tag'] );
                        wp_set_object_terms( $product_id, $tags_ids, 'product_tag' );
                    }

                    /** set product category * */
                    if( dokan_get_option( 'product_category_style', 'dokan_selling', 'single' ) == 'single' ) {
                        wp_set_object_terms( $product_id, (int) $_POST['product_cat'], 'product_cat' );
                    } else {
                        if( isset( $_POST['product_cat'] ) && !empty( $_POST['product_cat'] ) ) {
                            $cat_ids = array_map( 'intval', (array)$_POST['product_cat'] );
                            wp_set_object_terms( $product_id, $cat_ids, 'product_cat' );
                        }
                    }

                    /** Set Product type by default simple */
                    wp_set_object_terms( $product_id, 'simple', 'product_type' );

                    update_post_meta( $product_id, '_regular_price', $price );
                    update_post_meta( $product_id, '_sale_price', '' );
                    update_post_meta( $product_id, '_price', $price );
                    update_post_meta( $product_id, '_visibility', 'visible' );
                    update_post_meta($product_id, 'workshop_type', $workshop_type);
                    do_action( 'dokan_new_product_added', $product_id, $post_data );

                    if ( dokan_get_option( 'product_add_mail', 'dokan_general', 'on' ) == 'on' ) {
                        Dokan_Email::init()->new_product_added( $product_id, $product_status );
                    }

                    wp_redirect( dokan_edit_product_url( $product_id ) );
                    exit;
                }
            }
        }

        if ( isset( $_GET['product_id'] ) ) {
            $post_id = intval( $_GET['product_id'] );
        } else {
            global $post, $product;

            if ( !empty( $post ) ) {
                $post_id = $post->ID;
            }
        }


        if ( isset( $_POST['update_product'] ) && wp_verify_nonce( $_POST['dokan_edit_product_nonce'], 'dokan_edit_product' ) ) {
            
            $_workshop_type         = $_POST['_workshop_type'];
            $_workshop_start_time   = $_POST['_workshop_start_time'];
            $_workshop_end_time     = $_POST['_workshop_end_time'];
            $_date                  = $_POST['_date'];
            $_duration              = $_POST['_duration'];

            $workshop_city                  =  $_POST['workshop_city'];
            $workshop_state                  =  $_POST['workshop_state'];
            $_venue                  =  $_POST['_venue'];

            update_post_meta($post_id, '_workshop_type', $_workshop_type);
            update_post_meta($post_id, '_workshop_start_time', $_workshop_start_time);
            update_post_meta($post_id, '_workshop_end_time', $_workshop_end_time);
            update_post_meta($post_id, '_date', $_date);
            update_post_meta($post_id, '_duration', $_duration);
            update_post_meta($post_id, 'workshop_city', $workshop_city);
            update_post_meta($post_id, 'workshop_state', $workshop_state);
            update_post_meta($post_id, '_venue', $_venue);


            $product_info = array(
                'ID'             => $post_id,
                'post_title'     => sanitize_text_field( $_POST['post_title'] ),
                'post_content'   => $_POST['post_content'],
                'post_excerpt'   => $_POST['post_excerpt'],
                'post_status'    => isset( $_POST['post_status'] ) ? $_POST['post_status'] : 'pending',
                'comment_status' => isset( $_POST['_enable_reviews'] ) ? 'open' : 'closed'
            );

            wp_update_post( $product_info );

            /** Set Product tags */
            if( isset( $_POST['product_tag'] ) ) {
                $tags_ids = array_map( 'intval', (array)$_POST['product_tag'] );
            } else {
                $tags_ids = array();
            }
            wp_set_object_terms( $post_id, $tags_ids, 'product_tag' );


            /** set product category * */

            if( dokan_get_option( 'product_category_style', 'dokan_selling', 'single' ) == 'single' ) {
                wp_set_object_terms( $post_id, (int) $_POST['product_cat'], 'product_cat' );
            } else {
                if( isset( $_POST['product_cat'] ) && !empty( $_POST['product_cat'] ) ) {
                    $cat_ids = array_map( 'intval', (array)$_POST['product_cat'] );
                    wp_set_object_terms( $post_id, $cat_ids, 'product_cat' );
                }
            }

            wp_set_object_terms( $post_id, 'simple', 'product_type' );

            /**  Process all variation products meta */
            dokan_process_product_meta( $post_id );

            /** set images **/
            $featured_image = absint( $_POST['feat_image_id'] );
            if ( $featured_image ) {
                set_post_thumbnail( $post_id, $featured_image );
            }

            $edit_url = dokan_edit_product_url( $post_id );
            wp_redirect( add_query_arg( array( 'message' => 'success' ), $edit_url ) );
            exit;
        }


    }

    /**
     * Handle the coupons submission
     *
     * @return void
     */
    function handle_coupons() {

        if ( ! is_user_logged_in() ) {
            return;
        }

        if ( ! dokan_is_user_seller( get_current_user_id() ) ) {
            return;
        }

        // Coupon functionality
        $dokan_template_coupons = Dokan_Template_Coupons::init();

        self::$validated = $dokan_template_coupons->validate();

        if ( !is_wp_error( self::$validated ) ) {
            $dokan_template_coupons->coupons_create();
        }

        $dokan_template_coupons->coupun_delete();
    }

    /**
     * Handle delete product link
     *
     * @return void
     */
    function handle_delete_product() {

        if ( ! is_user_logged_in() ) {
            return;
        }

        if ( ! dokan_is_user_seller( get_current_user_id() ) ) {
            return;
        }

        dokan_delete_product_handler();
    }

    /**
     * Handle Withdraw form submission
     *
     * @return void
     */
    function handle_withdraws() {
        // Withdraw functionality
        $dokan_withdraw = Dokan_Template_Withdraw::init();
        self::$validate = $dokan_withdraw->validate();

        if ( self::$validate !== false && !is_wp_error( self::$validate ) ) {
            $dokan_withdraw->insert_withdraw_info();
        }

        $dokan_withdraw->cancel_pending();
    }

    /**
     * Export user orders to CSV format
     *
     * @since 1.4
     * @return void
     */
    function handle_order_export() {
        if ( ! is_user_logged_in() ) {
            return;
        }

        if ( ! dokan_is_user_seller( get_current_user_id() ) ) {
            return;
        }

        if ( isset( $_POST['dokan_order_export_all'] ) ) {

            $filename = "Orders-".time();
            header( "Content-Type: application/csv; charset=" . get_option( 'blog_charset' ) );
            header( "Content-Disposition: attachment; filename=$filename.csv" );

            $headers = array(
                'order_id'             => __( 'Order No', 'dokan' ),
                'order_items'          => __( 'Order Items', 'dokan' ),
                'order_shipping'       => __( 'Shipping method', 'dokan' ),
                'order_shipping_cost'  => __( 'Shipping Cost', 'dokan' ),
                'order_payment_method' => __( 'Payment method', 'dokan' ),
                'order_total'          => __( 'Order Total', 'dokan' ),
                'order_status'         => __( 'Order Status', 'dokan' ),
                'order_date'           => __( 'Order Date', 'dokan' ),
                'customer_name'        => __( 'Customer Name', 'dokan' ),
                'customer_email'       => __( 'Customer Email', 'dokan' ),
                'customer_phone'       => __( 'Customer Phone', 'dokan' ),
                'customer_ip'          => __( 'Customer IP', 'dokan' ),
            );

            foreach ( (array)$headers as $label ) {
                echo $label .', ';
            }

            echo "\r\n";
            $user_orders = dokan_get_seller_orders( get_current_user_id(), 'all', NULL, 10000000, 0 );
            $statuses    = wc_get_order_statuses();
            $results     = array();
            foreach ( $user_orders as $order ) {
                $the_order = new WC_Order( $order->order_id );

                $customer = get_post_meta( $order->order_id , '_customer_user', true );
                if ( $customer ) {
                    $customer_details = get_user_by( 'id', $customer );
                    $customer_name    = $customer_details->user_login;
                    $customer_email   = esc_html( get_post_meta( $order->order_id, '_billing_email', true ) );
                    $customer_phone   = esc_html( get_post_meta( $order->order_id, '_billing_phone', true ) );
                    $customer_ip      = esc_html( get_post_meta( $order->order_id, '_customer_ip_address', true ) );
                } else {
                    $customer_name  = get_post_meta( $order->id, '_billing_first_name', true ). ' '. get_post_meta( $order->id, '_billing_last_name', true ).'(Guest)';
                    $customer_email = esc_html( get_post_meta( $order->order_id, '_billing_email', true ) );
                    $customer_phone = esc_html( get_post_meta( $order->order_id, '_billing_phone', true ) );
                    $customer_ip    = esc_html( get_post_meta( $order->order_id, '_customer_ip_address', true ) );
                }

                $results = array(
                    'order_id'             => $order->order_id,
                    'order_items'          => dokan_get_product_list_by_order( $the_order, ';' ),
                    'order_shipping'       => $the_order->get_shipping_method(),
                    'order_shipping_cost'  => $the_order->get_total_shipping(),
                    'order_payment_method' => get_post_meta( $order->order_id, '_payment_method_title', true ),
                    'order_total'          => $the_order->get_total(),
                    'order_status'         => $statuses[$the_order->post_status],
                    'order_date'           => $the_order->order_date,
                    'customer_name'        => $customer_name,
                    'customer_email'       => $customer_email,
                    'customer_phone'       => $customer_phone,
                    'customer_ip'          => $customer_ip,
                );

                foreach ( $results as $csv_key => $csv_val ) {
                    echo $csv_val . ', ';
                }
                echo "\r\n";
            }
            exit();
        }

        if ( isset( $_POST['dokan_order_export_filtered'] ) ) {

            $filename = "Orders-".time();
            header( "Content-Type: application/csv; charset=" . get_option( 'blog_charset' ) );
            header( "Content-Disposition: attachment; filename=$filename.csv" );

            $headers = array(
                'order_id'             => __( 'Order No', 'dokan' ),
                'order_items'          => __( 'Order Items', 'dokan' ),
                'order_shipping'       => __( 'Shipping method', 'dokan' ),
                'order_shipping_cost'  => __( 'Shipping Cost', 'dokan' ),
                'order_payment_method' => __( 'Payment method', 'dokan' ),
                'order_total'          => __( 'Order Total', 'dokan' ),
                'order_status'         => __( 'Order Status', 'dokan' ),
                'order_date'           => __( 'Order Date', 'dokan' ),
                'customer_name'        => __( 'Customer Name', 'dokan' ),
                'customer_email'       => __( 'Customer Email', 'dokan' ),
                'customer_phone'       => __( 'Customer Phone', 'dokan' ),
                'customer_ip'          => __( 'Customer IP', 'dokan' ),
            );

            foreach ( (array)$headers as $label ) {
                echo $label .', ';
            }
            echo "\r\n";

            $order_date   = ( isset( $_POST['order_date'] ) ) ? $_POST['order_date'] : NULL;
            $order_status = ( isset( $_POST['order_status'] ) ) ? $_POST['order_status'] : 'all';
            $user_orders  = dokan_get_seller_orders( get_current_user_id(), $order_status, $order_date, 10000000, 0 );
            $statuses     = wc_get_order_statuses();
            $results      = array();

            foreach ( $user_orders as $order ) {
                $the_order = new WC_Order( $order->order_id );

                $customer = get_post_meta( $order->order_id , '_customer_user', true );
                if ( $customer ) {
                    $customer_details = get_user_by( 'id', $customer );
                    $customer_name    = $customer_details->user_login;
                    $customer_email   = esc_html( get_post_meta( $order->order_id, '_billing_email', true ) );
                    $customer_phone   = esc_html( get_post_meta( $order->order_id, '_billing_phone', true ) );
                    $customer_ip      = esc_html( get_post_meta( $order->order_id, '_customer_ip_address', true ) );
                } else {
                    $customer_name  = get_post_meta( $order->id, '_billing_first_name', true ). ' '. get_post_meta( $order->id, '_billing_last_name', true ).'(Guest)';
                    $customer_email = esc_html( get_post_meta( $order->order_id, '_billing_email', true ) );
                    $customer_phone = esc_html( get_post_meta( $order->order_id, '_billing_phone', true ) );
                    $customer_ip    = esc_html( get_post_meta( $order->order_id, '_customer_ip_address', true ) );
                }

                $results = array(
                    'order_id'             => $order->order_id,
                    'order_items'          => dokan_get_product_list_by_order( $the_order ),
                    'order_shipping'       => $the_order->get_shipping_method(),
                    'order_shipping_cost'  => $the_order->get_total_shipping(),
                    'order_payment_method' => get_post_meta( $order->order_id, '_payment_method_title', true ),
                    'order_total'          => $the_order->get_total(),
                    'order_status'         => $statuses[$the_order->post_status],
                    'order_date'           => $the_order->order_date,
                    'customer_name'        => $customer_name,
                    'customer_email'       => $customer_email,
                    'customer_phone'       => $customer_phone,
                    'customer_ip'          => $customer_ip,
                );

                foreach ( $results as $csv_key => $csv_val ) {
                    echo $csv_val . ', ';
                }
                echo "\r\n";
            }
            exit();
        }
    }

    /**
     *  Handle Shipping post submit
     *
     *  @since  2.0
     *  @return void
     */
    function handle_shipping() {
        if ( ! is_user_logged_in() ) {
            return;
        }

        if ( ! dokan_is_user_seller( get_current_user_id() ) ) {
            return;
        }


        if( isset( $_POST['dokan_update_shipping_options'] ) && wp_verify_nonce( $_POST['dokan_shipping_form_field_nonce'], 'dokan_shipping_form_field' ) ) {

            $user_id = get_current_user_id();
            $s_rates = array();
            $rates = array();

            if( isset( $_POST['dps_enable_shipping'] ) ) {
                update_user_meta( $user_id, '_dps_shipping_enable', $_POST['dps_enable_shipping'] );
            }

            if( isset( $_POST['dokan_shipping_type'] ) ) {
                update_user_meta( $user_id, '_dokan_shipping_type', $_POST['dokan_shipping_type'] );
            }

            if( isset( $_POST['dps_shipping_type_price'] ) ) {
                update_user_meta( $user_id, '_dps_shipping_type_price', $_POST['dps_shipping_type_price'] );
            }

            if( isset( $_POST['dps_additional_product'] ) ) {
                update_user_meta( $user_id, '_dps_additional_product', $_POST['dps_additional_product'] );
            }

            if( isset( $_POST['dps_additional_qty'] ) ) {
                update_user_meta( $user_id, '_dps_additional_qty', $_POST['dps_additional_qty'] );
            }

            if( isset( $_POST['dps_pt'] ) ) {
                update_user_meta( $user_id, '_dps_pt', $_POST['dps_pt'] );
            }

            if( isset( $_POST['dps_ship_policy'] ) ) {
                update_user_meta( $user_id, '_dps_ship_policy', $_POST['dps_ship_policy'] );
            }

            if( isset( $_POST['dps_refund_policy'] ) ) {
                update_user_meta( $user_id, '_dps_refund_policy', $_POST['dps_refund_policy'] );
            }

            if( isset( $_POST['dps_form_location'] ) ) {
                update_user_meta( $user_id, '_dps_form_location', $_POST['dps_form_location'] );
            }

            if ( isset( $_POST['dps_country_to'] ) ) {

                foreach ($_POST['dps_country_to'] as $key => $value) {
                    $country = $value;
                    $c_price = floatval( $_POST['dps_country_to_price'][$key] );

                    if( !$c_price && empty( $c_price ) ) {
                        $c_price = 0;
                    }

                    if ( !empty( $value ) ) {
                        $rates[$country] = $c_price;
                    }
                }
            }

            update_user_meta( $user_id, '_dps_country_rates', $rates );

            if ( isset( $_POST['dps_state_to'] ) ) {
                foreach ( $_POST['dps_state_to'] as $country_code => $states ) {

                    foreach ( $states as $key_val => $name ) {
                        $country_c = $country_code;
                        $state_code = $name;
                        $s_price = floatval( $_POST['dps_state_to_price'][$country_c][$key_val] );

                        if( !$s_price || empty( $s_price ) ) {
                            $s_price = 0;
                        }

                        if ( !empty( $name ) ) {
                            $s_rates[$country_c][$state_code] = $s_price;
                        }
                    }
                }
            }

            update_user_meta( $user_id, '_dps_state_rates', $s_rates );

            $shipping_url = dokan_get_navigation_url( 'shipping' );
            wp_redirect( add_query_arg( array( 'message' => 'shipping_saved' ), $shipping_url ) );
            exit;
        }
    }

    /**
     * Render best selling products
     *
     * @param  array  $atts
     *
     * @return string
     */
    function best_selling_product_shortcode( $atts ) {
        $per_page = shortcode_atts( array(
            'no_of_product' => 8
        ), $atts );

        ob_start();
        ?>
        <ul>
            <?php
            $best_selling_query = dokan_get_best_selling_products();
            ?>
            <?php while ( $best_selling_query->have_posts() ) : $best_selling_query->the_post(); ?>

                <?php wc_get_template_part( 'content', 'product' ); ?>

            <?php endwhile; ?>
        </ul>
        <?php

        return ob_get_clean();
    }

    /**
     * Render top rated products via shortcode
     *
     * @param  array  $atts
     *
     * @return string
     */
    function top_rated_product_shortcode( $atts ) {
        $per_page = shortcode_atts( array(
            'no_of_product' => 8
        ), $atts );

        ob_start();
        ?>
        <ul>
            <?php
            $best_selling_query = dokan_get_top_rated_products();
            ?>
            <?php while ( $best_selling_query->have_posts() ) : $best_selling_query->the_post(); ?>

                <?php wc_get_template_part( 'content', 'product' ); ?>

            <?php endwhile; ?>
        </ul>
        <?php

        return ob_get_clean();
    }

    /**
     * Displays the store lists
     *
     * @param  array $atts
     * @return string
     * @Swathi - Changed per_page to 80
     */
    function store_listing( $atts ) {
        global $post;

        $attr = shortcode_atts( array(
                'per_page' => 150,
            ), $atts );

        $paged  = max( 1, get_query_var( 'paged' ) );
        $limit  = $attr['per_page'];
        $offset = ( $paged - 1 ) * $limit;

        $sellers = dokan_get_sellers( $limit, $offset );

        ob_start();

        if ( $sellers['users'] ) {
            ?>
            <div class="dokan-seller-wrap col-md-12">
                <?php
                global $wpdb;
                foreach ( $sellers['users'] as $seller ) {
                	 
 					$store_info = dokan_get_store_info( $seller->ID );
 					$seller_id =  $seller->ID;
                    $banner_id  = isset( $store_info['banner'] ) ? $store_info['banner'] : 0;
                    $store_name = isset( $store_info['store_name'] ) ? esc_html( $store_info['store_name'] ) : __( 'N/A', 'dokan' );
                    $store_url  = dokan_get_store_url( $seller->ID );
                    //Added by swathi to list seller who are having products
				    $author_post_count = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_author = '" . $seller_id . "'AND post_status = 'publish' AND post_type = 'product'");
                    ?>
				<?php if($author_post_count > 0) {?>
                    <div class="dokan-single-seller col-md-3">
                        <div class="dokan-store-thumbnail">
                            <a href="<?php echo $store_url; ?>">
                                <?php if ( $banner_id ) {
                                    $banner_url = wp_get_attachment_image_src( $banner_id, 'medium' );
                                    ?>
                                    <img class="dokan-store-img" src="<?php echo esc_url( $banner_url[0] ); ?>" alt="<?php echo esc_attr( $store_name ); ?>">
                                <?php } else { ?>
                                    <img class="dokan-store-img" src="http://vilyoo.com/wp-content/uploads/2015/11/placeholder-logo-300x100.png" alt="<?php _e( 'No Image', 'dokan' ); ?>">
                                <?php } ?>
                            </a>

                            <div class="dokan-store-caption text-center">
                                <h3><a href="<?php echo $store_url; ?>"><?php echo $store_name;?></a></h3>
                                <?php $rating_info = dokan_get_seller_rating( $seller->ID ); ?>
                                <a href="<?php echo $store_url; ?>" class="visit_store">Visit Artist</a>
                    

                            </div> <!-- .caption -->
                        </div> <!-- .thumbnail -->
                    </div> <!-- .single-seller -->

				<?php } ?>
                <?php } ?>

            </div> <!-- .dokan-seller-wrap -->

            <?php
            $user_count = $sellers['count'];
            $num_of_pages = ceil( $user_count / $limit );

            if ( $num_of_pages > 1 ) {
                echo '<div class="pagination-container clearfix">';
                $page_links = paginate_links( array(
                        'current'   => $paged,
                        'total'     => $num_of_pages,
                        'base'      => str_replace( $post->ID, '%#%', esc_url( get_pagenum_link( $post->ID ) ) ),
                        'type'      => 'array',
                        'prev_text' => __( '&larr; Previous', 'dokan' ),
                        'next_text' => __( 'Next &rarr;', 'dokan' ),
                    ) );

                if ( $page_links ) {
                    $pagination_links  = '<div class="pagination-wrap">';
                    $pagination_links .= '<ul class="pagination"><li>';
                    $pagination_links .= join( "</li>\n\t<li>", $page_links );
                    $pagination_links .= "</li>\n</ul>\n";
                    $pagination_links .= '</div>';

                    echo $pagination_links;
                }

                echo '</div>';
            }
            ?>

            <?php
        } else {
            ?>

            <p class="dokan-error"><?php _e( 'No seller found!', 'dokan' ); ?></p>

            <?php
        }

        $content = ob_get_clean();

        return apply_filters( 'dokan_seller_listing', $content, $attr );
    }

    /**
     * Render my orders page
     *
     * @return string
     */
    function my_orders_page() {
        return dokan_get_template_part( 'my-orders' );
    }

}
