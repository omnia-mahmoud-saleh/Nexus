<?php
// Connection File to DB
include('../../../server/databaseconn.php');
// For session handling and secure access to pages
session_start();

// Check if admin is logged in, else redirect to login page
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: ../admin_login.php');
    exit();
}

// Add Category
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $stmt = $conn->prepare("INSERT INTO category (Name, Description) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $desc);
    $stmt->execute();
}

// Delete Category
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $stmt = $conn->prepare("DELETE FROM category WHERE Category_ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

// Get all category
$result = $conn->query("SELECT * FROM category");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage categories</title>
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap.min.css">
</head>
<body class="container mt-5">
    <h1>Manage categories</h1>

    <form method="POST" class="mb-4">
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" name="add" class="btn btn-primary">Add Category</button>
    </form>

    <h2>Existing category</h2>
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['Name']) ?></td>
            <td><?= htmlspecialchars($row['Description']) ?></td>
            <td>
                <a href="?delete=<?php echo $row['Category_ID']; ?>" class="btn btn-danger btn-sm"
                   onclick="return confirm('Are you sure you want to delete this category?');">
                   Delete
                </a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
        <br>
    <button><a href="../dashboard.php">Go Home</a></button>
</body>
</html>

<?php $conn->close(); ?>
