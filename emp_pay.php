<?php
session_start();
include 'db_connection.php';
include 'admin_nav.php';

// Get employee ID from URL
if (!isset($_GET['empID'])) {
    echo "No employee ID provided.";
    exit;
}

$employee_id = intval($_GET['empID']);

// Fetch employee info
$stmt = $conn->prepare("SELECT FullName, Email FROM employees WHERE EmpID = ?");
$stmt->bind_param("i", $employee_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Employee not found.";
    exit;
}

$employee = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Make Payment - <?php echo htmlspecialchars($employee['FullName']); ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script defer src="js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 100px;
            margin-left: 260px;
            max-width: 600px;
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.1);
        }
        h3 {
            margin-bottom: 30px;
            font-weight: 600;
            color: #343a40;
        }
        label {
            font-weight: 600;
            margin-top: 15px;
        }
        .btn-success {
            margin-top: 25px;
            padding: 10px 20px;
            font-weight: 600;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="container">
    <h3>Make Payment to <?php echo htmlspecialchars($employee['FullName']); ?></h3>

    <form action="process_payment.php" method="POST">
        <input type="hidden" name="employee_id" value="<?php echo $employee_id; ?>">

        <div class="form-group">
            <label>Amount (USD)</label>
            <input type="number" name="amount" class="form-control" step="0.01" required>
        </div>

        <div class="form-group">
            <label>Payment Date</label>
            <input type="date" name="payment_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
        </div>

        <div class="form-group">
            <label>Payment Method</label>
            <select name="method" class="form-control" required>
                <option value="Bank Transfer">Bank Transfer</option>
                <option value="Cash">Cash</option>
                <option value="Cheque">Cheque</option>
                <option value="Mobile Payment">Mobile Payment</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Submit Payment</button>
    </form>
</div>

</body>
</html>
