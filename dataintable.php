<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Data In TAble</title>
</head>
<body bgcolor="lightgrey">
   <div align='center'> <a href="adddata.php"><button>Add Data In table</button></a></div>
    <hr style="border-top: 8px solid grey;">
    <table cellspacing='2px' cellpadding='2px' align="center" border= '1px solid black' >
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Student Age</th>
            <th>Student Gender</th>
            <th>Student Date of Birth</th>
            <th>Guardian Name</th>
            <th>Relationship</th>
            <th>Contactinfo</th>
            <th>Options</th>
        </tr>
    <?php

use FTP\Connection;
use LDAP\Result;
    include "connection.php";
    $sql= "SELECT id,name,age,gender,dob,guardianname,relationship,contactinfo FROM students";
    $result= $conn->query($sql);

    if($result->num_rows >0){
        while ($row=$result->fetch_assoc()){
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>".$row['age']."</td>";
            echo "<td>".$row['gender']."</td>";
            echo "<td>".$row['dob']."</td>";
            echo "<td>".$row['guardianname']."</td>";
            echo "<td>".$row['relationship']."</td>";
            echo "<td>".$row['contactinfo']."</td>";
            echo "<td>"."<a href='edit.php?student_id=".$row['id']."'target='_blank'><button>Edit</button></a>"." | "."<a href='copy.php?student_id=".$row['id']."' target='_blank'><button>Copy</button></a>"." | "."<a href='delete.php?student_id=".$row['id']."' target='_blank'><button>Delete</button></a>"."</td>";
           
            echo "</tr>";
        };

     echo "</table>";
    }
    else{
        echo "0 result";
    }
    
    ?>
    <a href="" target="_blank"></a>
    

    
</body>
</html>