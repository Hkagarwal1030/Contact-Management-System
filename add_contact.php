 <?php
require 'db.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $stmt = $conn->prepare("INSERT INTO contacts (name,email,phone,address) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $phone, $address);

    if ($stmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        $message = "Error: Could not add contact.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2>Add New Contact</h2>
    <?php if ($message): ?>
        <div class="alert alert-danger"><?= $message ?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Address</label>
            <textarea name="address" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Add Contact</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>
