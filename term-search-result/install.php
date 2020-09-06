<?php

    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

    if (!defined( 'WPINC')) {
        wp_die();
    }

    function term_search_result_activate(){
        global $wpdb;

        $results_table = TERM_SEARCH_RESULT_PLUGIN_RESULTS_TABLE;
        $terms_table = TERM_SEARCH_RESULT_PLUGIN_TERMS_TABLE;

        $charset_collate = $wpdb->get_charset_collate();
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

        $sql = "CREATE TABLE `{$results_table}`(
            id INT NOT NULL AUTO_INCREMENT,
            result varchar(255) NOT NULL,
            PRIMARY KEY (id)
        ) $charset_collate;";
        dbDelta($sql);

        
        $sql2 = "CREATE TABLE `{$terms_table}` (
            id INT NOT NULL AUTO_INCREMENT,
            term varchar(255) NOT NULL,
            result_id INT NOT NULL,
            PRIMARY KEY(id)
            -- FOREIGN KEY (result_id) REFERENCES {$terms_table}(id)
        ) $charset_collate;";
        dbDelta($sql2);
    }

    register_activation_hook( TERM_SEARCH_RESULT_PLUGIN_INDEX , 'term_search_result_activate');
