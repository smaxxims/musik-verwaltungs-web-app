<?php
include "../db/AjaxDB.php";
include "../models/Title.php";

if (isset($_GET['id'])) :

    $id = $_GET['id'];
    $ajaxDB = new AjaxDB();
    $row = $ajaxDB->getCdbyID($id);

    //include "audio.php";
    $title = new Title();
    $music = $title->getUploadedFiles("../public/audio/".$id);

    if ($row["id"] == $id) :
        include "../layouts/_cd.php";
    else :
        echo "Keine Informationen zu dieser CD.";
    endif;
endif;
?>