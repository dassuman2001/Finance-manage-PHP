<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Expense - Personal Finance Manager</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #eee;
        }
        .container {
            margin-top: 20px;
        }
        .card {
            border-radius: 25px;
        }
    </style>
</head>
<body>
    <section class="vh-100">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-8">
                    <div class="card text-black">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-8 col-xl-6">
                                    <h2 class="text-center fw-bold mb-5 mx-1 mx-md-4 mt-4">Add New Expense</h2>
                                    <form action="add_expense_process.php" method="POST">
                                        <div class="form-outline mb-4">
                                            <input type="date" name="expense_date" class="form-control" required>
                                            <label class="form-label" for="expense_date">Date</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="text" name="item" class="form-control" placeholder="Item" required>
                                            <label class="form-label" for="item">Item</label>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="number" name="expense_cost" class="form-control" placeholder="Expense Cost" required>
                                            <label class="form-label" for="expense_cost">Expense Cost</label>
                                        </div>
                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-primary btn-lg">Add Expense</button>
                                        </div>
                                    </form>
                                    <hr>
                                    <div class="d-flex justify-content-center">
                                        <a href="dashboard.php" class="btn btn-secondary btn-lg">Back to Dashboard</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
