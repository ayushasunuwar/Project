<?php
    include 'db_connection.php';

    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $department = $_POST['department'];
        $salary = $_POST['salary'];

        $sql = "INSERT INTO employee (empName, department, salary)
                    VALUES(?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        if($stmt == false){
            die("Error preparing statement: ". $conn->error);
        }

        $stmt->bind_param("ssd", $fname, $department, $salary);
        if($stmt->execute()){
            echo "<script>
                    alert('New employee added successfully.');
                </script>";
            header('location: manageEmployee.php');
        } else{
            echo "<script>
                    alert('There was an error adding new employee.');
                    window.location.href = 'manageEmployee.php';
                </script>";
        }
        $stmt->close();
        $conn->close();
    }
?>