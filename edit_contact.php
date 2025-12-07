<?php
require 'db.php';
$message = '';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM contacts WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows != 1) {
    header("Location: index.php");
    exit;
}

$contact = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $update_stmt = $conn->prepare("UPDATE contacts SET name=?, email=?, phone=?, address=? WHERE id=?");
    $update_stmt->bind_param("ssssi", $name, $email, $phone, $address, $id);

    if ($update_stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        $message = "Error: Could not update contact.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2>Edit Contact</h2>
    <?php if ($message): ?>
        <div class="alert alert-danger"><?= $message ?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="<?= htmlspecialchars($contact['name']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="<?= htmlspecialchars($contact['email']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" value="<?= htmlspecialchars($contact['phone']) ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control"><?= htmlspecialchars($contact['address']) ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Contact</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>
