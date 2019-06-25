<div class="p-header">
    <ul class="nav nav-pills nav-pills-primary full-width">
        <?php
        $en_all_7369 = $this->config->item('en_all_7369');
        $navigation = array(
            array(
                'my_url' => '/actionplan',
                'anchor' => $en_all_7369[6138]['m_icon'].' '.$en_all_7369[6138]['m_name'],
            ),
            array(
                'my_url' => '/myaccount',
                'anchor' => $en_all_7369[6137]['m_icon'].' '.$en_all_7369[6137]['m_name'],
            )
        );


        //If miner give access back to platform:
        if(en_auth(array(1308))){
            $en_all_7372 = $this->config->item('en_all_7372');
            array_push($navigation, array(
                'my_url' => '/dashboard',
                'anchor' => '<span class="micro-image">'.$en_all_7372[7368]['m_icon'].'</span> '.$en_all_7372[7368]['m_name'].' &nbsp;<i class="fas fa-long-arrow-right"></i>',
            ));
        }

        //Add logout:
        array_push($navigation, array(
            'my_url' => '/logout',
            'anchor' => $en_all_7369[7291]['m_icon'].' '.$en_all_7369[7291]['m_name'],
        ));

        //Display all:
        foreach ($navigation as $nav_item) {
            echo '<li><a href="' . $nav_item['my_url'] . '" ' . (isset($current) && $current == $nav_item['my_url'] ? ' style="color:#FFF; background-color:#2f2739 !important;"' : '') . '>' . $nav_item['anchor'] . '</a></li>';
        }

        ?>
    </ul>
</div>