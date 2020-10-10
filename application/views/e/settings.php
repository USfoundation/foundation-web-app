
<script src="/application/views/e/settings.js?v=<?= view_memory(6404,11060) ?>" type="text/javascript"></script>

<div class="container" style="padding: 0 5px;">

<?php

$e___11035 = $this->config->item('e___11035'); //MENCH NAVIGATION
$e___14010 = $this->config->item('e___14010');

//ACCOUNT SETTING
echo '<h1 class="big-frame"><a href="/@'.$user_e['e__id'].'" style="text-decoration:none;" class="'.extract_icon_color($user_e['e__icon']).'">' . $user_e['e__title'] . '</a></h1>';

echo '<div class="headline"><span class="icon-block">'.$e___11035[6225]['m__icon'].'</span>'.$e___11035[6225]['m__title'].'</div>';
echo '<div class="accordion" id="MyAccountAccordion">';

//Display account fields ordered with their SOURCE LINKS:
foreach($this->config->item('e___6225') as $acc_e__id => $acc_detail) {

    //Print header:
    echo '<div class="card">
<div class="card-header" id="heading' . $acc_e__id . '">
<button class="btn btn-block" type="button" data-toggle="collapse" data-target="#openEn' . $acc_e__id . '" aria-expanded="false" aria-controls="openEn' . $acc_e__id . '">
  <span class="icon-block">' . $acc_detail['m__icon'] . '</span><b class="montserrat doupper ' . extract_icon_color($acc_detail['m__icon']) . '">' . $acc_detail['m__title'] . '</b><span class="pull-right icon-block"><i class="fas fa-chevron-down"></i></span>
</button>
</div>

<div class="doclear">&nbsp;</div>

<div id="openEn' . $acc_e__id . '" class="collapse" aria-labelledby="heading' . $acc_e__id . '" data-parent="#MyAccountAccordion">
<div class="card-body">';


    //Show description if any:
    echo (strlen($acc_detail['m__message']) > 0 ? '<div class="i_content padded"><div class="msg">' . $acc_detail['m__message'] . '</div></div>' : '');


    //Print account fields that are either Single Selectable or Multi Selectable:
    $is_multi_selectable = in_array(6122, $acc_detail['m__profile']);
    $is_single_selectable = in_array(6204, $acc_detail['m__profile']);

    if ($acc_e__id == 12289) {

        $e__icon_parts = explode(' ',one_two_explode('class="', '"', $user_e['e__icon']));

        echo '<div class="'.superpower_active(10939).'"><div class="doclear">&nbsp;</div><div class="btn-group avatar-type-group pull-right" role="group" style="margin:0 0 10px 0;">';
        foreach($this->config->item('e___13533') as $m3) {
            echo '<a href="javascript:void(0)" onclick="account_update_avatar_type(\''.$m3['m__message'].'\')" class="btn btn-'.$m3['m__message'].' '.( $e__icon_parts[0]==$m3['m__message'] ? ' active ' : '' ).'" title="'.$m3['m__title'].'">'.$m3['m__icon'].'</a>';
        }
        echo '</div>';
        echo '<div class="doclear">&nbsp;</div>';
        echo '</div>';


        //List avatars:
        foreach($this->config->item('e___12279') as $x__type3 => $m3) {

            $avatar_icon_parts = explode(' ',one_two_explode('class="', '"', $m3['m__icon']));
            $avatar_type_match = ($e__icon_parts[0] == $avatar_icon_parts[0]);
            $superpower_actives3 = array_intersect($this->config->item('n___10957'), $m3['m__profile']);

            echo '<span class="'.( count($superpower_actives3) ? superpower_active(end($superpower_actives3)) : '' ).'">';
            echo '<a href="javascript:void(0);" onclick="e_avatar(\'' . $avatar_icon_parts[0] . '\', \'' . $avatar_icon_parts[1] . '\')" icon-css="' . $avatar_icon_parts[1] . '" class="list-group-item avatar-item avatar-type-'.$avatar_icon_parts[0].' avatar-name-'.$avatar_icon_parts[1].' ' .( $avatar_type_match ? '' : ' hidden ' ). ( $avatar_type_match && $e__icon_parts[1] == $avatar_icon_parts[1] ? ' active ' : '') . '"><div class="avatar-icon">' . $m3['m__icon'] . '</div></a>';
            echo '</span>';

        }

    } elseif ($acc_e__id == 10957 /* Superpowers */) {

        if(count($this->session->userdata('session_superpowers_assigned')) >= 2){
            //Mass Toggle Option:
            echo '<div class="btn-group pull-right" role="group" style="margin:0 0 10px 0;">
                  <a href="javascript:void(0)" onclick="account_toggle_all(1)" class="btn btn-far"><i class="fas fa-toggle-on"></i></a>
                  <a href="javascript:void(0)" onclick="account_toggle_all(0)" class="btn btn-fad"><i class="fas fa-toggle-off"></i></a>
                </div><div class="doclear">&nbsp;</div>';
        }

        //SUPERPOWERS
        echo '<div class="list-group">';
        foreach($this->config->item('e___10957') as $superpower_e__id => $m3){

            $unlocked = superpower_assigned($superpower_e__id);
            $public_link = in_array($superpower_e__id, $this->config->item('n___6404'));
            $extract_icon_color = extract_icon_color($m3['m__icon']);
            $anchor = '<span class="icon-block '.$extract_icon_color.'">'.$m3['m__icon'].'</span><b class="montserrat '.$extract_icon_color.'">'.$m3['m__title'].'</b><span class="superpower-message">'.$m3['m__message'];

            if($unlocked){

                //SUPERPOWERS UNLOCKED
                $progress_type_id=14008;
                echo '<a class="list-group-item itemsetting btn-superpower superpower-frame-'.$superpower_e__id.' '.( in_array($superpower_e__id, $this->session->userdata('session_superpowers_activated')) ? ' active ' : '' ).'" en-id="'.$superpower_e__id.'" href="javascript:void();" onclick="e_toggle_superpower('.$superpower_e__id.')"><span class="icon-block pull-right" title="'.$e___14010[$progress_type_id]['m__title'].'">'.$e___14010[$progress_type_id]['m__icon'].'</span>'.$anchor.'</a>';

            } elseif(!$unlocked && $public_link){

                //SUPERPOWERS AVAILABLE
                $progress_type_id=14011;
                echo '<a class="list-group-item" href="'.view_memory(6404,$superpower_e__id).'"><span class="icon-block pull-right" title="'.$e___14010[$progress_type_id]['m__title'].'">'.$e___14010[$progress_type_id]['m__icon'].'</span>'.$anchor.'</a>';

            } elseif(!$unlocked && !$public_link){

                //SUPERPOWERS UNAVAILABLE
                $progress_type_id=14009;
                echo '<div class="list-group-item islocked"><span class="icon-block pull-right" title="'.$e___14010[$progress_type_id]['m__title'].'">'.$e___14010[$progress_type_id]['m__icon'].'</span>'.$anchor.'</div>';

            }

        }

        echo '</div>';

    } elseif ($acc_e__id == 3288 /* Email */) {

        $u_emails = $this->X_model->fetch(array(
            'x__status IN (' . join(',', $this->config->item('n___7359')) . ')' => null, //PUBLIC
            'x__down' => $user_e['e__id'],
            'x__type IN (' . join(',', $this->config->item('n___4592')) . ')' => null, //SOURCE LINKS
            'x__up' => 3288, //Mench Email
        ));

        echo '<span><input type="email" id="e_email" class="form-control border dotransparent" value="' . (count($u_emails) > 0 ? $u_emails[0]['x__message'] : '') . '" placeholder="you@gmail.com" /></span>
                <a href="javascript:void(0)" onclick="e_email()" class="btn btn-source">Save</a>
                <span class="saving-account save_email"></span>';

    } elseif ($acc_e__id == 3286 /* Password */) {

        echo '<span><input type="password" id="input_password" class="form-control border dotransparent" data-lpignore="true" autocomplete="new-password" placeholder="New Password..." /></span>
                <a href="javascript:void(0)" onclick="e_password()" class="btn btn-source">Save</a>
                <span class="saving-account save_password"></span>';

    } elseif ($is_multi_selectable || $is_single_selectable) {

        echo view_radio_e($acc_e__id, $user_e['e__id'], ($is_multi_selectable ? 1 : 0));

    }

    //Print footer:
    echo '<div class="doclear">&nbsp;</div>';
    echo '</div></div></div>';

}

echo '</div>'; //End of accordion

?>
</div>
