<?php
session_start();
if (isset($_SESSION["mt_id"]) && isset($_SESSION["mt_user"]) && isset($_SESSION["mt_lv_id"])) {
} else {
    echo "<script>
            window.setTimeout(function() {
                window.location = '../page-404.html';
             }, 0);
        </script>";
}
