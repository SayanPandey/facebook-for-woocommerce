<?php
/**
 * Copyright (c) Facebook, Inc. and its affiliates. All Rights Reserved
 *
 * This source code is licensed under the license found in the
 * LICENSE file in the root directory of this source tree.
 *
 * @package FacebookCommerce
 */
namespace WooCommerce\Facebook\Handlers;

defined( 'ABSPATH' ) || exit;

class PluginUpdate {

    public function __construct() {
        $this->init();
    }

    private static function init() {
        add_action( 'upgrader_process_complete', [ __CLASS__, 'on_plugin_update' ], 10, 2 );
    }

    public static function on_plugin_update( $upgrader_object, $options ) {
        if (
            $options['action'] === 'update' &&
            $options['type'] === 'plugin' &&
            ! empty( $options['plugins'] )
        ) {
            foreach ( $options['plugins'] as $plugin ) {
                if ( strpos( $plugin, 'facebook-for-woocommerce/facebook-for-woocommerce.php' ) !== false ) {
                    error_log( 'Facebook for WooCommerce was updated.' );

                    // 👉 Add your upgrade logic here
                }
            }
        }
    }
}
