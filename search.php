<!DOCTYPE html>
<html>
    <style>
        body{background-color: #003060;}
        table, th, td{border: solid;
            width: 80%;
            color: white;
            text-align: center;
        }
    </style>
<body>
<table>
    <tr>
        <!-- Definining table column names to display on webpage -->
        <th>Patient Name             </th>
        <th> Patient Number          </th>
        <th> Patient Condition       </th>
    <tr>
    <?php
    $search = $_POST['search'];
    $column = $_POST['column'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "hospitalpatientdatabase";

    $conn = new mysqli ($servername, $username, $password, $db);

    if ($conn->connect_error){
        die("connection failed: ". $conn->connect_error);
    }
    //Selects data from the guestbook table and searches the column for said input and displays the row corresponding to that input
    $sql = "SELECT * from guestbook where $column like '%$search%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo"<tr><td>". $row["patientname"]. "</td><td>". $row ["patientnumber"] . "</td><td>". $row["patientcondition"]. "</td></tr>";
        }
    } else {
        echo "0 records";
    }

    $conn->close();

    ?>
</table>
</body>
</html>