<?php
require_once '../Controller/NotifC.php';

$notifController = new NotifC();
$notifs = $notifController->listNotif();
?>
 <style>
          /* Style général du tableau */
table {
    width: 80%; /* Prend toute la largeur */
    border-collapse: collapse; /* Supprime les espaces entre les bordures */
    margin: 0px 50px; /* Espacement vertical */
    font-size: 16px; /* Taille de la police */
    font-family: Arial, sans-serif; /* Police du tableau */
    text-align: left; /* Aligne le texte à gauche */
}

/* Bordures du tableau */
table th, table td {
    border: 1px solid #ddd; /* Bordures grises légères */
    padding: 10px; /* Espacement intérieur */
}

/* En-tête du tableau */
thead tr {
    background-color: #0d6efd; /* Bleu pour l'en-tête */
    color: white; /* Texte en blanc */
    text-transform: uppercase; /* Texte en majuscules */
    letter-spacing: 1px; /* Espacement entre les lettres */
}

/* Alternance de couleur des lignes */
tbody tr:nth-child(even) {
    background-color: #f2f2f2; /* Gris clair pour les lignes paires */
}

tbody tr:nth-child(odd) {
    background-color: white; /* Blanc pour les lignes impaires */
}

/* Survol des lignes */
tbody tr:hover {
    background-color: #cce5ff; /* Bleu clair au survol */
}

/* Liens dans la colonne Actions */
tbody a {
    color: #0d6efd; /* Bleu pour les liens */
    text-decoration: none; /* Supprime le soulignement */
    font-weight: bold; /* Texte gras */
}

tbody a:hover {
    text-decoration: underline; /* Soulignement au survol */
}

/* Bouton Modifier */
tbody button {
    background-color: #0d6efd; /* Fond bleu */
    color: white; /* Texte blanc */
    border: none; /* Pas de bordure */
    padding: 5px 10px; /* Espacement interne */
    border-radius: 5px; /* Coins arrondis */
    cursor: pointer; /* Curseur en forme de main */
}

tbody button:hover {
    background-color: #0a58ca; /* Bleu plus foncé au survol */
}
.button {
  position: relative;
  top: 10px; /* Décalage vers le bas */
  left: 200px; /* Décalage vers la droite */
  display: inline-block; /* Permet de contrôler la largeur et hauteur */
  padding: 10px 20px;    /* Espace intérieur pour agrandir le bouton */
  background-color: #007BFF; /* Couleur de fond du bouton */
  color: white;          /* Couleur du texte */
  text-decoration: none; /* Supprime le soulignement */
  border-radius: 5px;    /* Arrondi des coins */
  font-size: 16px;       /* Taille du texte */
  font-weight: bold;     /* Texte en gras */
  border: 2px solid transparent; /* Bordure invisible */
  transition: background-color 0.3s, border-color 0.3s; /* Animation fluide */
}

.button:hover {
  background-color: #0056b3; /* Couleur au survol */
  border-color: #004080;    /* Bordure plus visible au survol */
  cursor: pointer;          /* Curseur en forme de main */
}

 </style>
<table>
    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Contenu</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($notifs as $notif): ?>
        <tr>
            <td><?php echo $notif['id']; ?></td>
            <td><?php echo $notif['titre']; ?></td>
            <td><?php echo $notif['contenu']; ?></td>
            <td>
                
                <a href="deleteNotif.php?idn=<?php echo $notif['idn']; ?>" onclick="return confirm('Voulez-vous vraiment supprimer cette notif ?');">Supprimer</a>

                        <!-- Bouton pour modifier l'utilisateur -->
                <a href="updateNotif.php?idn=<?php echo $notif['idn']; ?>"><button>Modifier</button></a>
               
            </td>
        </tr>
    <?php endforeach; ?>
</table>