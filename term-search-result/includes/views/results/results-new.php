<?php

    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
    
    function gcts_search_new_result() {
            
            if($_POST['result']){
                gcts_submit_result($_POST['result']);
                $_POST['result'] = "";
                echo "salvo";
            }
        
        ?>
        <div class="wrap">
            <h2>Novo resultado</h2>
            <form action="<?= TERM_SEARCH_RESULT_VIEW_RESULTS_NEW_URL; ?>" method="POST">
                <div style="margin-top: 20px; width: 400px; display: flex; justify-content:space-between; align-items:center;">
                    <label>Resultado:</label>
                    <input name="result" />
                </div>
                <button style="margin-top: 20px;" class="button button-primary" type="submit">Salvar</button>
            </form>
        </div>
    <?php }
    
    function init_gcts_new_results(){
        add_submenu_page(TERM_SEARCH_RESULT_SLUG, "Novo resultado", "Novo resultado", "administrator", TERM_SEARCH_RESULT_VIEW_RESULTS_NEW , "gcts_search_new_result", null, 98);
    }

    add_action("admin_menu", "init_gcts_new_results");
