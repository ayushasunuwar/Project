<?php
    session_start();
    include 'admin_nav.php';
    include 'db_connection.php';
?>

<form action="process_payment.php" method="POST">
    <input type="hidden" name="employee_id" value="<?php echo $employee_id; ?>">
    
    <label>Amount:</label>
    <input type="number" name="amount" required>
    
    <label>Payment Date:</label>
    <input type="date" name="payment_date" required>
    
    <label>Method:</label>
    <select name="method">
        <option value="Bank Transfer">Bank Transfer</option>
        <option value="Cash">Cash</option>
    </select>
    
    <button type="submit" class="btn btn-success">Submit Payment</button>
</form>
