<?php
session_start();
include "../../models/cd.php";
include "../../db/AjaxDB.php";
// cd image

if (!isset($_SESSION['user']) || $_SESSION['user'] !== 'admin') {
    header("Location: ../home.php");
}

if (isset($_FILES['image']['name']) && isset($_POST["id"])) {

    $cd = new Cd("test","test",0, $_FILES['image']['name'] , 0);
    $cd->uploadImage($_FILES['image']['tmp_name'], $cd->getImage());

    $ajaxDb = new AjaxDb();
    $ajaxDb->updateImage($_POST["id"], $_FILES['image']['name']);

}

?>