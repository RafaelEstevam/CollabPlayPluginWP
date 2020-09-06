<?php

    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

    function gcts_search_config() { ?>
        <div class="wrap">
            <h1>Documentação do Gauge Search</h1>
        </div>
        <div class="wrap">
            <p>Este plugin permite relacionar termos buscados com os resultados esperados. Para isso é necessário cadastrar primeiramente o "Resultado" para depois cadastrar o "Termo buscado".</p>
            <p>A relação é feita no cadastro do termo, onde será possível cadastrar o termo buscado e selecionar o resultado esperado.</p>
        </div>
    <?php }

    function maps_api_key(){ ?>
        <input type="text" name="maps_api_key" id="maps_api_key" value="<?= get_option('maps_api_key'); ?>" />
    <?php }

    function show_gcts_search_config(){
        $templateFields = array(
            array("id" => "maps_api_key",   "titulo" => "API Key Google Maps", "funcao" => "maps_api_key"),
        );
        add_settings_section("gcts-fields", "Google Maps", null, "gcts-fields-options");
        foreach($templateFields as $templateFields){
            add_settings_field($templateFields['id'], $templateFields['titulo'], $templateFields['funcao'], "gcts-fields-options", "gcts-fields");
            register_setting("gcts-fields", $templateFields['id']);
        }
    }

    function init_gcts_configuration(){
        add_menu_page("Gauge Busca", "Gauge Busca", "administrator", TERM_SEARCH_RESULT_SLUG , "gcts_search_config", null, 98);
    }

    add_action("admin_menu", "init_gcts_configuration");
