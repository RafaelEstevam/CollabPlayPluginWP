<?php

    if ( ! defined( 'ABSPATH' ) && ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
        exit;
    }

    if(!function_exists('remove_term_result_search_deactivate')){
        function remove_term_result_search_deactivate(){
            global $wpdb;
            $results_table = TERM_SEARCH_RESULT_PLUGIN_RESULTS_TABLE;
            $terms_table = TERM_SEARCH_RESULT_PLUGIN_TERMS_TABLE;

            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
            $sql = "DROP TABLE IF EXISTS `{$terms_table}`;";
            $sql2 = "DROP TABLE IF EXISTS `{$results_table}`;";
            $wpdb->query($sql);
            $wpdb->query($sql2);
        }
    }

    register_uninstall_hook(TERM_SEARCH_RESULT_PLUGIN_INDEX, 'remove_term_result_search_deactivate');
    // register_deactivation_hook(TERM_SEARCH_RESULT_PLUGIN_INDEX, 'remove_term_result_search_deactivate');