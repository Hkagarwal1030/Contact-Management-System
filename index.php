<?php
require 'db.php';

$result = $conn->query("SELECT * FROM contacts ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2>Contact List</h2>
    <a href="add_contact.php" class="btn btn-success mb-3">Add New Contact</a>

    <?php if ($result->num_rows > 0): ?>
    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>Name</th><th>Email</th><th>Phone</th><th>Address</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($contact = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($contact['name']) ?></td>
                    <td><?= htmlspecialchars($contact['email']) ?></td>
                    <td><?= htmlspecialchars($contact['phone']) ?></td>
                    <td><?= htmlspecialchars($contact['address']) ?></td>
                    <td>
                        <a href="edit_contact.php?id=<?= $contact['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                        <a href="delete_contact.php?id=<?= $contact['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this contact?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php else: ?>
        <p>No contacts found. Add some!</p>
    <?php endif; ?>
</div>

</body>
</html>
