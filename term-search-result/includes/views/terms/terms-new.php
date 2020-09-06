<?php

    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

    function gcts_search_new_term() {
            if($_POST['term'] && $_POST['result_id']){
                gcts_submit_term($_POST['term'], $_POST['result_id']);
                $_POST['term'] = "";
                $_POST['result_id'] = "";
                echo "salvo";
            }
        ?>
        <div class="wrap">
            <h2>Novo termo</h2>
            <form action="<?= TERM_SEARCH_RESULT_VIEW_TERMS_NEW_URL; ?>" method="POST">
                <div style="width: 400px; display: flex; justify-content:space-between; align-items:center;">
                    <label>Termo:</label>
                    <input name="term"/>
                </div>
                <div style="margin-top: 20px; width: 400px; display: flex; justify-content:space-between; align-items:center;">
                    <label>Selecione um resultado:</label>
                    <select name="result_id">
                        <option value=""></option>
                        <?php
                            $options = get_all_results();
                            foreach($options as $option){ ?>
                                <option value="<?= $option->id ?>"><?= $option->id ?> - <?= $option->result ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>

                <button style="margin-top: 20px;" class="button button-primary" type="submit">Salvar</button>
            </form>
        </div>
    <?php }
    
    function init_gcts_new_terms(){
        add_submenu_page(TERM_SEARCH_RESULT_SLUG, "Novo termo", "Novo termo", "administrator", TERM_SEARCH_RESULT_VIEW_TERMS_NEW , "gcts_search_new_term", null, 98);
    }

    add_action("admin_menu", "init_gcts_new_terms");
