<?php

    /**
        * @link              https://www.github.com/gabrielfroes/my_youtube_recommendation
        * @since             1.0.0
        * @package           Term_search_result
        *
        * @wordpress-plugin
        * Plugin Name:       Term Search Result
        * Plugin URI:        
        * Description:       Make a relation between terms searched by users, in site, for real results.
        * Version:           1.0.0
        * Author:            Rafael Estevam
        * Author URI:        https://www.youtube.com/codigofontetv
        * License:           GPLv3 or later
        * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
        * Text Domain:       term-search-result (Nome usado para o arquivo de tradução. Deve ser o mesmo nas chamadas da tradução para o WP identificar a tradução)
        * Domain Path:       /languages/
     */

    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

    // If this file is called directly, abort.
    if (!defined( 'WPINC')) {
        wp_die();
    }

    //Plugin Version
    if(!define('TERM_SEARCH_RESULT_VERSION')){
        define('TERM_SEARCH_RESULT_VERSION', '1.0.0');
    }

    if(!define('TERM_SEARCH_RESULT_SLUG')){
        define('TERM_SEARCH_RESULT_SLUG', 'term-search-result');
    }

    if(!define('TERM_SEARCH_RESULT_NAME')){
        define('TERM_SEARCH_RESULT_NAME', __('Term search result', 'term-search-result'));
    }

    if(!define('TERM_SEARCH_RESULT_BASENAME')){
        define('TERM_SEARCH_RESULT_BASENAME', plugin_basename(__FILE__));
    }

    if(!define('TERM_SEARCH_RESULT_PLUGIN_DIR')){
        define('TERM_SEARCH_RESULT_PLUGIN_DIR', plugin_dir_path(__FILE__));
    }

    if(!define('TERM_SEARCH_RESULT_PLUGIN_INDEX')){
        define('TERM_SEARCH_RESULT_PLUGIN_INDEX', __FILE__);
    }

    //View Constants

    if(!define('TERM_SEARCH_RESULT_VIEW_RESULTS_LIST')){
        define('TERM_SEARCH_RESULT_VIEW_RESULTS_LIST', TERM_SEARCH_RESULT_SLUG . "-results-list");
    }

    if(!define('TERM_SEARCH_RESULT_VIEW_RESULTS_NEW')){
        define('TERM_SEARCH_RESULT_VIEW_RESULTS_NEW', TERM_SEARCH_RESULT_SLUG . "-results-new");
    }

    if(!define('TERM_SEARCH_RESULT_VIEW_RESULTS_EDIT')){
        define('TERM_SEARCH_RESULT_VIEW_RESULTS_EDIT', TERM_SEARCH_RESULT_SLUG . "-results-edit");
    }

    if(!define('TERM_SEARCH_RESULT_VIEW_RESULTS_LIST_URL')){
        define('TERM_SEARCH_RESULT_VIEW_RESULTS_LIST_URL', admin_url() . 'admin.php?page=' . TERM_SEARCH_RESULT_VIEW_RESULTS_LIST);
    }

    if(!define('TERM_SEARCH_RESULT_VIEW_RESULTS_NEW_URL')){
        define('TERM_SEARCH_RESULT_VIEW_RESULTS_NEW_URL', admin_url() . 'admin.php?page=' . TERM_SEARCH_RESULT_VIEW_RESULTS_NEW);
    }

    if(!define('TERM_SEARCH_RESULT_VIEW_RESULTS_EDIT_URL')){
        define('TERM_SEARCH_RESULT_VIEW_RESULTS_EDIT_URL', admin_url() . 'admin.php?page=' . TERM_SEARCH_RESULT_VIEW_RESULTS_EDIT);
    }

    if(!define('TERM_SEARCH_RESULT_VIEW_TERMS_LIST')){
        define('TERM_SEARCH_RESULT_VIEW_TERMS_LIST', TERM_SEARCH_RESULT_SLUG . "-terms-list");
    }

    if(!define('TERM_SEARCH_RESULT_VIEW_TERMS_NEW')){
        define('TERM_SEARCH_RESULT_VIEW_TERMS_NEW', TERM_SEARCH_RESULT_SLUG . "-terms-new");
    }

    if(!define('TERM_SEARCH_RESULT_VIEW_TERMS_EDIT')){
        define('TERM_SEARCH_RESULT_VIEW_TERMS_EDIT', TERM_SEARCH_RESULT_SLUG . "-terms-edit");
    }

    if(!define('TERM_SEARCH_RESULT_VIEW_TERMS_LIST_URL')){
        define('TERM_SEARCH_RESULT_VIEW_TERMS_LIST_URL', admin_url() . 'admin.php?page=' . TERM_SEARCH_RESULT_VIEW_TERMS_LIST);
    }

    if(!define('TERM_SEARCH_RESULT_VIEW_TERMS_NEW_URL')){
        define('TERM_SEARCH_RESULT_VIEW_TERMS_NEW_URL', admin_url() . 'admin.php?page=' . TERM_SEARCH_RESULT_VIEW_TERMS_NEW);
    }

    if(!define('TERM_SEARCH_RESULT_VIEW_TERMS_EDIT_URL')){
        define('TERM_SEARCH_RESULT_VIEW_TERMS_EDIT_URL', admin_url() . 'admin.php?page=' . TERM_SEARCH_RESULT_VIEW_TERMS_EDIT);
    }

    //Table Constatns

    if(!define('TERM_SEARCH_RESULT_PLUGIN_TERMS_TABLE')){
        global $wpdb;
        $terms_table = $wpdb->base_prefix . 'term_search_result_terms';
        define('TERM_SEARCH_RESULT_PLUGIN_TERMS_TABLE', $terms_table);
    }

    if(!define('TERM_SEARCH_RESULT_PLUGIN_RESULTS_TABLE')){
        global $wpdb;
        $results_table = $wpdb->base_prefix . 'term_search_result_results';
        define('TERM_SEARCH_RESULT_PLUGIN_RESULTS_TABLE', $results_table);
    }

    if(is_admin()){
        require_once TERM_SEARCH_RESULT_PLUGIN_DIR . '/install.php';
        require_once TERM_SEARCH_RESULT_PLUGIN_DIR . '/uninstall.php';

        //controllers
        require_once TERM_SEARCH_RESULT_PLUGIN_DIR . '/includes/controllers/results/results.php';
        require_once TERM_SEARCH_RESULT_PLUGIN_DIR . '/includes/controllers/terms/terms.php';

        //views
        require_once TERM_SEARCH_RESULT_PLUGIN_DIR . '/includes/views/config/config.php';

        require_once TERM_SEARCH_RESULT_PLUGIN_DIR . '/includes/views/results/results.php';
        require_once TERM_SEARCH_RESULT_PLUGIN_DIR . '/includes/views/results/results-new.php';
        require_once TERM_SEARCH_RESULT_PLUGIN_DIR . '/includes/views/results/results-edit.php';
        
        require_once TERM_SEARCH_RESULT_PLUGIN_DIR . '/includes/views/terms/terms.php';
        require_once TERM_SEARCH_RESULT_PLUGIN_DIR . '/includes/views/terms/terms-new.php';
        require_once TERM_SEARCH_RESULT_PLUGIN_DIR . '/includes/views/terms/terms-edit.php';
        
    }
