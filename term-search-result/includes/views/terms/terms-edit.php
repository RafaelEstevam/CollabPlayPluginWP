<?php

    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

    function gcts_search_edit_term() {
        
        $term_id = $_GET['id'];

        if($_POST["term"]){
            $new_values = array(
                "new_term" => $_POST["term"],
                "new_result_id" => $_POST["result_id"]
            );
            gcts_edit_term_by_id($term_id, $new_values);
            $_POST['term'] = "";
            $term = get_term_by_id($term_id);
            echo "editado";
        }else{
            $term = get_term_by_id($term_id);
        }

        if(isset($_POST["delete"])){
            gcts_delete_term_by_id($term_id);
            $redirectUrl = TERM_SEARCH_RESULT_VIEW_TERMS_LIST_URL;
            echo "<script> alert('Registro apagado'); window.location ='" . $redirectUrl . "';</script>";
        }
        
        ?>
        <div class="wrap">
            <div style="display: flex; justify-content: start; align-items: center;">
                <h2 class="wp-heading-inline" style="margin-right: 10px;">Editar termo</h2>
                <form action="<?= TERM_SEARCH_RESULT_VIEW_TERMS_EDIT_URL; ?>&id=<?= $term_id; ?>" method="POST">
                    <input type="hidden" name="delete" value="delete" />
                    <button class="button button-warning" type="submit">Apagar</button>
                </form>
            </div>

            <hr class="wp-header-end">
            <form action="<?= TERM_SEARCH_RESULT_VIEW_TERMS_EDIT_URL; ?>&id=<?= $term_id; ?>" method="POST">
                <div style="width: 400px; display: flex; justify-content:space-between; align-items:center;">
                    <label>Termo:</label>
                    <input name="term" value="<?= $term->term ?>"/>
                </div>
                <div style="margin-top: 20px; width: 400px; display: flex; justify-content:space-between; align-items:center;">
                    <label>Selecione um resultado:</label>
                    <select name="result_id">
                        <option value=""></option>
                        <?php
                            $options = get_all_results();
                            foreach($options as $option){ ?>
                                <option value="<?= $option->id ?>" <?php if($term->result_id == $option->id){echo 'selected';} ?>>
                                    <?= $option->id ?> - <?= $option->result ?>
                                </option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <button style="margin-top: 20px;" class="button button-primary" type="submit">Salvar</button>
            </form>
        </div>
    <?php }
    
    function init_gcts_edit_terms(){
        add_submenu_page(TERM_SEARCH_RESULT_SLUG . "-terms", "Edit term", "Edit term", "administrator", TERM_SEARCH_RESULT_VIEW_TERMS_EDIT , "gcts_search_edit_term", null, 98);
    }

    add_action("admin_menu", "init_gcts_edit_terms");
