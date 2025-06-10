<?php 
    session_start(); 
    include 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script defer src="js/bootstrap.bundle.min.js"></script>
    <style>
        /* Global Styles */
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .dashboard-container { 
            display: flex;
            flex-wrap: wrap;
        }

        .content { 
            margin-left: 260px; 
            padding: 30px;
            width: calc(100% - 260px);
            transition: margin-left 0.3s ease, width 0.3s ease;
        }

        /* Cards */
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
            font-weight: 600;
            width: 100%; /* Ensure cards take up full width */
        }

        .card h5 {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .dashboard-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
            margin-top: 80px;
        }

        /* Table Container */
        .table-container {
            margin-top: 40px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            overflow-x: auto;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            font-size: 1rem;
            color: #333;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #007bff;
            color: #fff;
            text-transform: uppercase;
        }

        tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tr:hover {
            background-color: #e2e6ea;
            transition: background 0.3s ease;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .content {
                margin-left: 0;
                width: 100%;
            }

            .dashboard-row {
                flex-direction: column;
                align-items: center;
            }

            .card {
                width: 90%; /* Make the cards cover more width on medium screens */
                margin-bottom: 10px;
            }
        }

        @media (max-width: 768px) {
            .table-container {
                padding: 10px;
            }

            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            .card {
                width: 100%; /* Full width on smaller screens */
            }
        }
    </style>
</head>
<body>
<div class="dashboard-container">
    <div class="content">
        <?php 
            include 'admin_nav.php'; 

            $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM employees");
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $total_emp = $row['count'];

            $stmt2 = $conn->prepare("SELECT COUNT(*) AS count2 FROM users");
            $stmt2->execute();
            $result2 = $stmt2->get_result();
            $row2 = $result2->fetch_assoc();
            $total_user = $row2['count2'];
        ?>

        <div class="dashboard-row">
            <div class="col-md-4">
                <div class="card bg-primary text-white">
                    <h5>Total Employees</h5>
                    <p><?php echo $total_emp; ?></p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card bg-success text-white">
                    <h5>Total Users</h5>
                    <p><?php echo $total_user; ?></p>
                </div>
            </div>
        </div>

        <div class="table-container">
            <h3>Employee List</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>S.N</th>
                        <th>Full Name</th>
                        <th>Department</th>
                        <th>Email</th>
                    </tr>
                </thead>
            
              <tbody>
                    <?php
                    // Query to fetch employee data along with department name
                    // Joining employees table with departments table on DeptID
                    $stmt3 = $conn->prepare("SELECT e.FullName, d.DeptName, e.Email FROM employees e JOIN Departments d ON e.DeptID = d.DeptID");
                    if ($stmt3) {
                        $stmt3->execute();
                        $data = $stmt3->get_result();
                        $i = 1;
                        // Loop through the results and display them in the table
                        foreach($data as $d){
                            ?>
                            <tr>
                                <td><?php echo htmlspecialchars($i++); ?></td>
                                <td><?php echo htmlspecialchars($d['FullName']); ?></td>
                                <td><?php echo htmlspecialchars($d['DeptName']); ?></td>
                                <td><?php echo htmlspecialchars($d['Email']); ?></td>
                            </tr>
                            <?php
                        }
                        $stmt3->close(); // Close the statement
                    } else {
                        echo "<tr><td colspan='4'>Error fetching employee data.</td></tr>";
                        error_log("Error preparing statement for employee list: " . $conn->error);
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>