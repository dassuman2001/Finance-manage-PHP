<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include('includes/db.php');

    $user_id = $_SESSION['user_id'];
    $expense_date = $_POST['expense_date'];
    $item = $_POST['item'];
    $expense_cost = $_POST['expense_cost'];

    $sql = "INSERT INTO expenses (user_id, expense_date, item, expense_cost) VALUES ('$user_id', '$expense_date', '$item', '$expense_cost')";

    if ($conn->query($sql) === TRUE) {
        // Show alert and refresh the page using JavaScript
        echo "<script>alert('Expense added successfully!'); window.location.href = 'add_expense.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    header("Location: dashboard.php");
    exit();
}
?>
