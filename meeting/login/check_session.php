<?php
  error_reporting(~E_NOTICE);
session_start();
if (isset($_SESSION["mt_id"]) && isset($_SESSION["mt_user"]) && isset($_SESSION["mt_duty_id"]) && isset($_SESSION["mt_faction_id"]) ) {
} else {
    echo "<script>
            window.setTimeout(function() {
                window.location = '../page-404.html';
             }, 0);
        </script>";
}
