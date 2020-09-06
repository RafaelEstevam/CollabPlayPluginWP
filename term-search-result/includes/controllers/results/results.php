<?php   

    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

    function get_all_results(){
        global $wpdb;
        $results_table = TERM_SEARCH_RESULT_PLUGIN_RESULTS_TABLE;
        $result = $wpdb->get_results( "SELECT * FROM `{$results_table}`");
        return $result;
    }

    function get_result_by_id($result_id){
        global $wpdb;
        $results_table = TERM_SEARCH_RESULT_PLUGIN_RESULTS_TABLE;
        $result = $wpdb->get_results( "SELECT * FROM `{$results_table}` WHERE id = " . $result_id . ";");
        return $result[0];
    }

    function gcts_submit_result($new_result){
        global $wpdb;
        $results_table = TERM_SEARCH_RESULT_PLUGIN_RESULTS_TABLE;
        $sql = "INSERT INTO `{$results_table}`(result) VALUES('" . $new_result . "')";
        $wpdb->query($sql);
    }

    function gcts_edit_result_by_id($result_id, $values){
        $new_result = $values["new_result"];
        global $wpdb;
        $results_table = TERM_SEARCH_RESULT_PLUGIN_RESULTS_TABLE;
        $sql = "UPDATE `{$results_table}` SET result = '" . $new_result . "' WHERE id = " . $result_id . "";
        $wpdb->query($sql);
    }

    function gcts_delete_result_by_id($result_id){
        global $wpdb;

        $results_table = TERM_SEARCH_RESULT_PLUGIN_RESULTS_TABLE;
        // $terms_table = TERM_SEARCH_RESULT_PLUGIN_TERMS_TABLE;

        // $gcts_table_terms = $wpdb->base_prefix . 'gcts_search_terms';
        // $gcts_table_result = $wpdb->base_prefix . 'gcts_search_results';
        // $wpdb->delete( $gcts_table_terms, array('result_id' => $result_id ));
        $wpdb->delete( $results_table , array('id' => $result_id ));
        $wpdb->show_errors();
    }