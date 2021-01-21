<?php
include "ConnectMySQL.php";

class AjaxDB extends ConnectMySQL {

    public function getCodeByUsername($username)
    {
        $conn = $this->connectToDB();
        $sql = $conn->prepare("SELECT * FROM `music`.`user` WHERE `name`='$username' LIMIT 1000");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        }
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function saveCodeForLoginUser(string $code, string $username)
    {
        $conn = $this->connectToDB();

        $sql = $conn->prepare("UPDATE `music`.`user` SET `code`='$code' WHERE `name`='$username' LIMIT 1000");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        }
    }

    public function getUserPasswordByUsername($username)
    {
        $conn = $this->connectToDB();
        $sql = $conn->prepare("SELECT * FROM `music`.`user` WHERE `name`='$username' LIMIT 1000");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        }
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function saveCdinDB($interpret, $genre, $year, $image, $desc)
    {
        $conn = $this->connectToDB();
        $sql = $conn->prepare("INSERT INTO `music`.`cds` (`interpret`, `genre`, `year`, `image`, `desc`) VALUES ('$interpret', '$genre', $year, '$image', '$desc') LIMIT 1000");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        }
    }

    public function getCDs() 
    {
        $conn = $this->connectToDB();
        $sql = $conn->prepare("SELECT * FROM `music`.`cds` LIMIT 1000");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        }
        $rows = $result->fetchAll();
        return $rows;
    }

    public function updateImage($id, $image)
    {
        $conn = $this->connectToDB();
        $sql = $conn->prepare("UPDATE `music`.`cds` SET `image`='$image' WHERE  `id`=$id LIMIT 1000");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        } else {
            echo "<div class='alert alert-success' role='alert'>Cover wurde aktuallisiert..</div>";
        }
    }

    public function getCdbyID($id)
    {
        $conn = $this->connectToDB();
        $sql = $conn->prepare("SELECT * FROM `music`.`cds` WHERE `id`=$id LIMIT 1000");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        }
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function updateCD($id, $interpret, $genre, $year, $desc)
    {
        $conn = $this->connectToDB();
        $sql = $conn->prepare("UPDATE `music`.`cds` SET `interpret`='$interpret', `genre`='$genre', `year`=$year, `desc`='$desc' WHERE  `id`=$id LIMIT 1000");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        } else {
            echo "<div class='alert alert-success' role='alert'>CD Daten aktualliesiert.</div>";
        }
    }

    public function deleteCD($id)
    {
        $conn = $this->connectToDB();
        $sql = $conn->prepare("DELETE FROM `music`.`cds` WHERE `id`=$id LIMIT 1000");
        $sql->execute();
        $result = $sql;

        if (!$result) {
            echo "Error: " . $sql . "======";
            print_r($conn->errorInfo());
        } else {
            echo "<div class='alert alert-success' role='alert'>CD gelöscht.</div>";
        }
    }

}



?>