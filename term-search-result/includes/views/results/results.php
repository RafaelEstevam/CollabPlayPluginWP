<?php

    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

    function gcts_search_load_results() {
            $items = get_all_results();
        ?>

        <div class="wrap">
            <div style="display: flex; justify-content: start; align-items: center;">
                <h2 class="wp-heading-inline" style="margin-right: 10px;">Lista de resultados </h2>
                <a class="page-title-action" href="<?= TERM_SEARCH_RESULT_VIEW_RESULTS_NEW_URL; ?>">
                    Novo resultado
                </a>
            </div>

            <hr class="wp-header-end">

            <div class="tablenav top">
				<div class="alignleft actions bulkactions">
                </div>
                <div class="tablenav-pages one-page">
                    <span class="displaying-num"><?= count($items); ?> registro(s)</span>
                </div>
                <br class="clear">
            </div>

            <table class="wp-list-table widefat fixed striped">
                <thead>
                    <tr>
                        <th scope="col" id="name" class="manage-column column-name column-primary">Id</th>
                        <th scope="col" id="count" class="manage-column column-count">Resultado</th>
                    </tr>
                </thead>

                <tbody id="the-list">
                    <?php 
                        foreach( $items as $item){ ?>
                            <tr>
                                <td>
                                    <b>
                                        <a href="<?= TERM_SEARCH_RESULT_VIEW_RESULTS_EDIT_URL; ?>&id=<?= $item->id; ?>">
                                            <?php print_r($item->id); ?>
                                        </a>
                                    </b>
                                </td>
                                <td>
                                    <b>
                                        <a href="<?= TERM_SEARCH_RESULT_VIEW_RESULTS_EDIT_URL; ?>&id=<?= $item->id; ?>">
                                            <?php print_r($item->result); ?>
                                        </a>
                                    </b>
                                </td>
                            </tr>
                        <?php }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col" class="manage-column column-name column-primary">Id</th>
                        <th scope="col" class="manage-column column-count">Resultado</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    <?php }

    function init_gcts_load_results(){
        add_submenu_page(TERM_SEARCH_RESULT_SLUG , "Resultados", "Resultados", "administrator", TERM_SEARCH_RESULT_VIEW_RESULTS_LIST , "gcts_search_load_results", null, 98);
    }

    add_action("admin_menu", "init_gcts_load_results");
    // add_action("admin_init", "show_gcts_search_load_results");
