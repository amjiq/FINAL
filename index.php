<?php
include 'db.php';
include 'auth.php';
$search = $_GET['search'] ?? '';

$Like = "%$search%";


//$sql = $conn->prepare("SELECT * FROM results");
$sql = $conn->prepare("SELECT * FROM results WHERE student_name LIKE ? OR matric_number LIKE ?");

$sql->bind_param("ss", $Like, $Like);

$sql->execute();
$result = $sql->get_result();

include 'header.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT GRADING SYSTEM</title>
</head>

<body>
    <h2> Student Records</h2>
    <a href="add.php">+ Add Result</a>

    <form method="get">


        <br><br> <input type="text" name="search" placeholder="Search by name or id"
            value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
        <button type="submit">Search</button>
        <a href="">Show all</a>
        <br>
        <br>
        <div>
            <table border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <th>No </th>
                    <th>Student Name </th>
                    <th>Matric No. </th>
                    <th>Subject </th>
                    <th>Test 1 (20%) </th>
                    <th>Test 2 (30%) </th>
                    <th>Final Exam (50%) </th>
                    <th>Total (100%) </th>
                    <th>Grade </th>
                    <th>Actions </th>
                </tr>

                <?php
                //if else, while loop, for loop, switch case
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $row['student_name'] . "</td>";
                    echo "<td>" . $row['matric_number'] . "</td>";
                    echo "<td>" . $row['subject'] . "</td>";
                    echo "<td>" . $row['test_1'] . "</td>";
                    echo "<td>" . $row['test_2'] . "</td>";
                    echo "<td>" . $row['final'] . "</td>";
                    echo "<td>" . $row['total'] . "</td>";
                    echo "<td>" . $row['grade'] . "</td>";
                    echo "<td>";
                    echo "<button><a href='edit.php?id=" . $row['id'] . "'>Edit</a></button>";
                    echo "<form method='POST' action='delete.php' style='display:inline;'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<button type='submit' name='delete' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
</body>

</html>
<?php
include 'footer.php';
?>