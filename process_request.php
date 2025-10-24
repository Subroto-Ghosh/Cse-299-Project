<?php
include("database.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Debugging: Check if the POST data is coming correctly
    var_dump($_POST);  // Remove after debugging

    $user_id = $_POST['user_id'];
    $action = $_POST['action'];

    // Prepare query based on action (approve or reject)
    if ($action === 'approve') {
        $query = "UPDATE User SET is_approved = 1 WHERE user_id = ?";
    } elseif ($action === 'reject') {
        $query = "UPDATE User SET is_approved = 0 WHERE user_id = ?";
    }

    // Prepare and execute query
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param('i', $user_id);
        if ($stmt->execute()) {
            // Redirect after successful execution
            header("Location: approve_request.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
