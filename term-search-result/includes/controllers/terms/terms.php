<?php   

    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

    function get_all_terms(){
        global $wpdb;
        $terms_table = TERM_SEARCH_RESULT_PLUGIN_TERMS_TABLE;
        $term = $wpdb->get_results( "SELECT * FROM `{$terms_table}`");
        return $term;
    }

    function get_term_by_id($term_id){
        global $wpdb;
        $terms_table = TERM_SEARCH_RESULT_PLUGIN_TERMS_TABLE;
        $term = $wpdb->get_results( "SELECT * FROM `{$terms_table}` WHERE id = " . $term_id . ";");
        return $term[0];
    }

    function get_result_by_term($term){
        global $wpdb;

        $results_table = TERM_SEARCH_RESULT_PLUGIN_RESULTS_TABLE;
        $terms_table = TERM_SEARCH_RESULT_PLUGIN_TERMS_TABLE;
        
        $term = $wpdb->get_results("SELECT * FROM `{$terms_table}`, `{$results_table}` WHERE `{$terms_table}`.term = '" . $term . "' AND `{$terms_table}`.result_id = `{$results_table}`.id");
        return $term;
    }

    function gcts_submit_term($new_term, $result_id){
        global $wpdb;
        $terms_table = TERM_SEARCH_RESULT_PLUGIN_TERMS_TABLE;
        $sql = "INSERT INTO `{$terms_table}`(term, result_id) VALUES('" . $new_term . "' , ". $result_id .")";
        $wpdb->query($sql);
    }

    function gcts_edit_term_by_id($term_id, $values){
        global $wpdb;

        $new_term = $values["new_term"];
        $new_result_id = $values["new_result_id"];
        $terms_table = TERM_SEARCH_RESULT_PLUGIN_TERMS_TABLE;

        $sql = "UPDATE `{$terms_table}` SET term = '" . $new_term . "', result_id = '" . $new_result_id . "' WHERE id = " . $term_id . "";
        $wpdb->query($sql);
    }

    function gcts_delete_term_by_id($term_id){
        global $wpdb;
        $terms_table = TERM_SEARCH_RESULT_PLUGIN_TERMS_TABLE;
        $wpdb->delete( $terms_table , array('id' => $term_id ));
    }