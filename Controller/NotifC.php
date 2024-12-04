<?php
require_once '../config.php';
require_once '../Model/notification.php';
class NotifC {
    public function listNotif() {
        $sql = "SELECT * FROM notif";
        $db = Config::getConnexion();
        try {
            $query = $db->query($sql);
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function deleteNotif($idn) {
        $sql = "DELETE FROM notif WHERE idn = :idn";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['idn' => $idn]);
            header('Location: listeNotif.php'); // Redirige vers la liste des notifications
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function addNotif($notif) {
        $sql = "INSERT INTO notif (titre, contenu, id) VALUES (:titre, :contenu, :id)";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'titre' => $notif->getTitre(),
                'contenu' => $notif->getContenu(),
                'id' => $notif->getId()
            ]);
            header('Location: listeNotif.php'); // Redirige vers la liste des notifications après ajout
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getNotifById($idn) {
        $sql = "SELECT * FROM notif WHERE idn = :idn";
        $db = Config::getConnexion();
        $query = $db->prepare($sql);
        $query->execute(['idn' => $idn]);
        return $query->fetch();
    }

    public function updateNotif($idn, $notif) {
        $sql = "UPDATE notif SET titre = :titre, contenu = :contenu WHERE id = :id";
        $db = Config::getConnexion();
        $query = $db->prepare($sql);
        $query->execute([
            'title' => $notif->getTitre(),
            'content' => $notif->getContenu(),
            'id' => $id
        ]);
        header('Location: listeNotif.php'); // Redirige vers la liste des notifications après mise à jour
    }
    public function getNotificationsByUserId($id) {
    $sql = "SELECT * FROM notif WHERE id = :id ORDER BY idn DESC";
    $db = Config::getConnexion();
    $query = $db->prepare($sql);
    $query->execute(['id' => $id]);
    return $query->fetchAll(PDO::FETCH_ASSOC); // Retourne toutes les notifications pour l'utilisateur
}
}

?>