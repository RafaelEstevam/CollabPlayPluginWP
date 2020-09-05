<?php

    /**
        * @link              https://www.github.com/gabrielfroes/my_youtube_recommendation
        * @since             1.0.0
        * @package           My_Youtube_Recommendation
        *
        * @wordpress-plugin
        * Plugin Name:       My Youtube Recommendation
        * Plugin URI:        https://www.github.com/gabrielfroes/my_youtube_recommendation
        * Description:       Display the last videos from a Youtube channel using Youtube feed and keep always updated even for cached posts.
        * Version:           1.0.0
        * Author:            Gabriel Froes
        * Author URI:        https://www.youtube.com/codigofontetv
        * License:           GPLv3 or later
        * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
        * Text Domain:       my-youtube-recommendation (Nome usado para o arquivo de tradução. Deve ser o mesmo nas chamadas da tradução para o WP identificar a tradução)
        * Domain Path:       /languages/
     */

    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

    // If this file is called directly, abort.
    if (!defined( 'WPINC')) {
        wp_die();
    }

    // Plugin Version
    if (!defined( 'MY_YOUTUBE_RECOMMENDATION_VERSION')){
        define( 'MY_YOUTUBE_RECOMMENDATION_VERSION', '1.0.0' );
    }

    // Plugin Name
    if (!defined( 'MY_YOUTUBE_RECOMMENDATION_NAME')){
        define( 'MY_YOUTUBE_RECOMMENDATION_NAME', __('My Youtube Recommendation', 'my-youtube-recommendation') );
    }

    // Plugin Slug
    if (!defined( 'MY_YOUTUBE_RECOMMENDATION_PLUGIN_SLUG')){
        define( 'MY_YOUTUBE_RECOMMENDATION_PLUGIN_SLUG', 'my-youtube-recommendation' );
    }

    // Plugin Basename
    if (!defined( 'MY_YOUTUBE_RECOMMENDATION_BASENAME')){
        define( 'MY_YOUTUBE_RECOMMENDATION_BASENAME', plugin_basename( __FILE__ ) );
    }

    // Plugin Folder
    if (!defined( 'MY_YOUTUBE_RECOMMENDATION_PLUGIN_DIR')){
        define( 'MY_YOUTUBE_RECOMMENDATION_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
    }

    // JSON File Name
    if (!defined( 'MY_YOUTUBE_RECOMMENDATION_JSON_FILENAME')){
        define( 'MY_YOUTUBE_RECOMMENDATION_JSON_FILENAME', 'my-yt-rec.json' );
    }

    load_plugin_textdomain( // Carrega a tradução do plugin de acordo com o slug e o diretório definido
        MY_YOUTUBE_RECOMMENDATION_PLUGIN_SLUG,
        false, // parâmetro depreciado
        MY_YOUTUBE_RECOMMENDATION_PLUGIN_SLUG . '/languages/'
    );

    // Dependencies
    require_once MY_YOUTUBE_RECOMMENDATION_PLUGIN_DIR . 'includes/class-youtube-recommendation.php';
    require_once MY_YOUTUBE_RECOMMENDATION_PLUGIN_DIR . 'includes/class-youtube-recommendation-json.php';
    require_once MY_YOUTUBE_RECOMMENDATION_PLUGIN_DIR . 'includes/class-youtube-recommendation-widget.php';
    require_once MY_YOUTUBE_RECOMMENDATION_PLUGIN_DIR . 'includes/class-youtube-recommendation-shortcode.php';

    $my_youtube_recomendation = new Youtube_Recommendation();
    $channel_id = $my_youtube_recomendation->options['channel_id'];

    if($channel_id != ""){
        //Se canal id estiver preenchido, instanciar classe que cria o arquivo JSON e habilita as requisições AJAX do plugin
        $expiration = $my_youtube_recomendation->options['cache_expiration'];
        $my_youtube_recommendation_Json = new Youtube_recommendation_json(
            $channel_id,
            $expiration,
            MY_YOUTUBE_RECOMMENDATION_PLUGIN_SLUG,
            MY_YOUTUBE_RECOMMENDATION_JSON_FILENAME
        );

        $my_youtube_recommendation_shortcode = new Youtube_Recommendation_Shortcode();
        $my_youtube_recommendation_widget = new Youtube_Recommendation_Widget();
    }
    
    if(is_admin()){
        
        require_once MY_YOUTUBE_RECOMMENDATION_PLUGIN_DIR . 'includes/class-youtube-recommendation-admin.php';

        $yt_rec_admin = new Youtube_recommendations_admin(
            MY_YOUTUBE_RECOMMENDATION_BASENAME,
            MY_YOUTUBE_RECOMMENDATION_PLUGIN_SLUG,
            MY_YOUTUBE_RECOMMENDATION_JSON_FILENAME,
            MY_YOUTUBE_RECOMMENDATION_VERSION
        );
    }
    