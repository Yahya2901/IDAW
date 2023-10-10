<?php

function renderMenuToHTML($currentPageId){
    $mymenu = array(
        // idPage titre
        'index' => array( 'Accueil' ),
        'cv' => array( 'Cv' ),
        'hobbies' => array('Hobbies'),
        'infos-techniques' => array('Infos techniques')
        );
        echo '<nav class="menu">';
        echo '<ul>';
        foreach($mymenu as $pageId => $pageParameters) {
            if($pageId == $currentPageId) {
                echo '<li><a id="currentpage" href="' . $pageId . '.php">' . $pageParameters[0] . '</a></li>';
            } else {
                echo '<li><a href="' . $pageId . '.php">' . $pageParameters[0] . '</a></li>';
            }
        }
        echo '</ul>';
        echo '</nav>';
    }
        
?>