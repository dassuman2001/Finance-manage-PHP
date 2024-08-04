<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('includes/db.php');

$user_id = $_SESSION['user_id'];

// Fetch expenses for the logged-in user
$sql_expenses = "SELECT expense_date, item, expense_cost 
                 FROM expenses 
                 WHERE user_id = '$user_id' 
                 ORDER BY expense_date DESC"; // Fetch expenses ordered by date
$result_expenses = $conn->query($sql_expenses);

// Fetch monthly spending for the logged-in user
$sql_monthly = "SELECT YEAR(expense_date) AS year, MONTH(expense_date) AS month, SUM(expense_cost) AS total_expense 
                FROM expenses 
                WHERE user_id = '$user_id' 
                GROUP BY YEAR(expense_date), MONTH(expense_date)";
$result_monthly = $conn->query($sql_monthly);

// Initialize an array to store monthly spending data
$monthly_spending = [];
while ($row = $result_monthly->fetch_assoc()) {
    // Format the month as YYYY-MM (e.g., 2022-01)
    $month_year = $row['year'] . '-' . str_pad($row['month'], 2, '0', STR_PAD_LEFT);
    $monthly_spending[$month_year] = $row['total_expense'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Personal Finance Manager</title>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
</head>
<body>
    <section class="vh-100">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-10 col-xl-10">
                                    <h2 class="text-center fw-bold mb-5 mx-1 mx-md-4 mt-4">Welcome, <?php echo $_SESSION['fullname']; ?>!</h2>
                                    <hr>
                                    <h3 class="mb-4">Add New Expense</h3>
                                    <form action="add_expense.php" method="GET">
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary btn-lg">Add New Expense</button>
                                        </div>
                                    </form>
                                    <hr>
                                    <h3 class="mb-4">Expense List</h3>
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Item</th>
                                                    <th>Expense Cost</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    while ($row = $result_expenses->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row['expense_date'] . "</td>";
                                                        echo "<td>" . $row['item'] . "</td>";
                                                        echo "<td>$" . $row['expense_cost'] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <hr>
                                    <h3 class="mb-4">Monthly Spending Analysis</h3>
                                    <canvas id="monthlySpendingChart" width="400" height="200"></canvas>
                                    <hr>
                                    <div class="d-flex justify-content-center">
                                        <a href="logout.php" class="btn btn-danger btn-lg">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/chart.js"></script>
    <!-- Call the function after the chart script -->
    <script>
        generateMonthlySpendingChart(<?php echo json_encode($monthly_spending); ?>);
    </script>
</body>
</html>
