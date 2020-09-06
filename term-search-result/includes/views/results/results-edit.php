<?php

    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

    function gcts_search_edit_result() {
        $result_id = $_GET['id'];

        if($_POST["result"]){
            gcts_edit_result_by_id($result_id, array("new_result" => $_POST["result"]));
            $_POST['result'] = "";
            $result = get_result_by_id($result_id);
            echo "editado";
        }else{
            $result = get_result_by_id($result_id);
        }

        if(isset($_POST["delete"])){
            gcts_delete_result_by_id($result_id);
            $redirectUrl = TERM_SEARCH_RESULT_VIEW_RESULTS_LIST_URL;
            echo "<script> alert('Registro apagado'); window.location ='" . $redirectUrl . "';</script>";
        }

    ?>
        <div class="wrap">
            <div style="display: flex; justify-content: start; align-items: center;">
                <h2 class="wp-heading-inline" style="margin-right: 10px;">Editar resultado</h2>
                <form action="<?= TERM_SEARCH_RESULT_VIEW_RESULTS_EDIT_URL; ?>&id=<?= $result_id; ?>" method="POST">
                    <input type="hidden" name="delete" value="delete" />
                    <button type="submit" class="button button-warning delete-term-result">Apagar</button>
                </form>
            </div>
            <hr class="wp-header-end">

            <form action="<?= TERM_SEARCH_RESULT_VIEW_RESULTS_EDIT_URL ;?>&id=<?= $result_id; ?>" method="POST">
                <div style="width: 400px; display: flex; justify-content:space-between; align-items:center;">
                    <label>Resultado:</label>
                    <input name="result" value="<?= $result->result ?>"/>
                </div>
                <button style="margin-top: 20px;" class="button button-primary" type="submit">Salvar</button>
            </form>
        </div>
    <?php }
    
    function init_gcts_edit_results(){
        add_submenu_page(TERM_SEARCH_RESULT_SLUG . "-results", "Edit Result", "Edit Result", "administrator", TERM_SEARCH_RESULT_VIEW_RESULTS_EDIT, "gcts_search_edit_result", null, 98);
    }

    add_action("admin_menu", "init_gcts_edit_results");
