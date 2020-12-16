
<?php
$user_e = superpower_unlocked();
if($user_e && !isset($min_header_footer)){

    $e___11035 = $this->config->item('e___11035'); //MENCH NAVIGATION
    $e___14010 = $this->config->item('e___14010');
    $e___14393 = $this->config->item('e___14393'); //SUGGEST

    ?>

    <!-- ACCOUNT Modal -->
    <div class="modal fade indifferent" id="modal6225" tabindex="-1" role="dialog" aria-labelledby="modal6225Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title montserrat <?= extract_icon_color($e___11035[6225]['m__icon']) ?>" id="modal14393Label"><?= $e___11035[6225]['m__icon'].' '.$e___11035[6225]['m__title'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php echo view_e_settings(6225, true); ?>
                </div>
            </div>
        </div>
    </div>


    <!-- SUGGEST Modal -->
    <div class="modal fade indifferent" id="modal14393" tabindex="-1" role="dialog" aria-labelledby="modal14393Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title montserrat <?= extract_icon_color($e___11035[14393]['m__icon']) ?>" id="modal14393Label"><?= $e___11035[14393]['m__icon'].' '.$e___11035[14393]['m__title'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <select class="form-control border white-border" id="sugg_type">
                        <?php
                        echo '<option value="0">SELECT '.$e___14393[14394]['m__title'].'...</option>';
                        foreach($this->config->item('e___14394') /* SUGGESTION TYPE */ as $x__type => $m){
                            echo '<option value="' . $x__type . '" title="' . $m['m__message'] . '">' . $m['m__title'] . '</option>';
                        }
                        ?>
                    </select>

                    <textarea class="form-control text-edit border white-border" id="sugg_note" data-lpignore="true" placeholder="<?= $e___14393[14395]['m__title'] ?>: More details here..."></textarea>

                </div>
                <div class="modal-footer">
                    <button type="button" onclick="x_suggestion()" class="btn btn-source">SUBMIT</button>
                </div>
            </div>
        </div>
    </div>




    <!-- APP Modal -->
    <div class="modal fade indifferent" id="modal6287" tabindex="-1" role="dialog" aria-labelledby="modal6287Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title montserrat <?= extract_icon_color($e___11035[6287]['m__icon']) ?>" id="modal14393Label"><?= $e___11035[6287]['m__icon'].' '.$e___11035[6287]['m__title'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    if(superpower_active(12699, true)){
                        echo '<div class="list-group">';
                        foreach($this->config->item('e___6287') as $e__id => $m) {
                            echo '<a href="/app/'.$e__id.'" class="list-group-item no-side-padding">';
                            echo '<span class="icon-block">' . view_e__icon($m['m__icon']) . '</span>';
                            echo '<b class="montserrat '.extract_icon_color($m['m__icon']).'">'.$m['m__title'].'</b>';
                            echo ( strlen($m['m__message']) ? '&nbsp;'.$m['m__message'] : '' );
                            echo '</a>';
                        }
                        echo '</div>';
                    } else {
                        echo '<p><a href="">Refresh your browser</a> to load all apps.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php

}

?>

</body>