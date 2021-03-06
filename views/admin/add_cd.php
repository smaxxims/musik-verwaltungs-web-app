<?php
include "../layouts/admin/_admin_header.html";
include "../../controller/db_controller/MusicDB.php";
include "../../models/Cd.php";
include "../../utils/Util.php";

if (!isset($_SESSION['user'])) {
    header("Location: ../home");
}
$util = new Util();
$db = new MusicDB();
$row = $db->getUserByUsername($util->valStr($_SESSION["user"]));

if (password_verify($row["code"], $_SESSION['code'])) {
    include "../layouts/admin/_add_cd.html";
    include "../layouts/admin/_admin_footer.html";
} else {
    echo "Sie sind nicht als Admin eingeloggt!";
}

?>

<script>
    $(document).ready(function () {

        function readUrl(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader()
                reader.onload = function (e) {
                    $("#imgPreview").attr('src', e.target.result).width(300)
                }
                reader.readAsDataURL(input.files[0])
            }
        }

        $("#img").change(function () {
            readUrl(this)
        })
    });
</script>


