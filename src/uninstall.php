<?php

    if ( ! defined( 'ABSPATH' ) && ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
        exit;
    }

    if ( ! function_exists( 'my_youtube_recommendation_uninstall' ) ) {

        function my_youtube_recommendation_uninstall() {

            delete_option('my_yt_rec'); // apagando registro de configuração do wordpress no banco de dados
            
            $upload_dir     = wp_upload_dir(); // Carregando o diretório de uploads
            $json_folder 	= $upload_dir['basedir'] . '/my-youtube-recommendation' ;
            $json_file 		= $json_folder . '/my-yt-rec.json';
            
            unlink($json_file); // apagar arquivo
            rmdir($json_folder); // apagar diretório
        }
        
    }

    register_uninstall_hook( __FILE__, 'my_youtube_recommendation_uninstall' ); //