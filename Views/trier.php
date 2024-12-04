<?php
require_once '../Controller/UserC.php'; // Inclure le contrôleur
$userC = new UserC(); // Instanciation du contrôleur

// Déterminer les critères de tri en fonction des boutons cliqués
$column = 'id'; // Par défaut, trier par ID
$order = 'ASC'; // Par défaut, ordre croissant

if (isset($_GET['column']) && isset($_GET['order'])) {
    $allowedColumns = ['id', 'nom', 'email']; // Colonnes autorisées
    $allowedOrders = ['ASC', 'DESC']; // Ordres autorisés

    // Valider les paramètres de tri
    if (in_array($_GET['column'], $allowedColumns) && in_array($_GET['order'], $allowedOrders)) {
        $column = $_GET['column'];
        $order = $_GET['order'];
    }
}

// Obtenir la liste des utilisateurs triés
$users = $userC->listUserBy($column, $order);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trier les Utilisateurs</title>
</head>
<body>
    <h1>Liste des Utilisateurs</h1>
    <!-- Boutons pour trier -->
    <form method="get" action="trier.php">
        <button type="submit" name="column" value="id">Trier par ID</button>
        <button type="submit" name="column" value="nom">Trier par Nom</button>
        <button type="submit" name="column" value="email">Trier par Email</button>
        <select name="order">
            <option value="ASC" <?php echo $order == 'ASC' ? 'selected' : ''; ?>>Ordre Croissant</option>
            <option value="DESC" <?php echo $order == 'DESC' ? 'selected' : ''; ?>>Ordre Décroissant</option>
        </select>
        <button type="submit">Appliquer</button>
    </form>

    <!-- Affichage de la liste -->
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo htmlspecialchars($user['nom']); ?></td>
            <td><?php echo htmlspecialchars($user['email']); ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>