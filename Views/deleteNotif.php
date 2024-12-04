<?php
require_once '../Controller/NotifC.php';

if (isset($_GET['idn'])) {
    $idn = $_GET['idn'];
    $notifC = new NotifC();
    $notifC->deleteNotif($idn);
    header("Location: listUser.php");
    exit();
} else {
    //echo "Erreur : ID de la notification non spécifié.";
}
?>