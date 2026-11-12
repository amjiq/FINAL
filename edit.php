<?php
include 'db.php';
include 'header.php';

//fallback, ?? equal to if else
$id = $_GET['id'] ?? 0;

$sql = $conn->prepare("SELECT * FROM results WHERE id = $id");

$sql->execute();

$row = $sql->get_result()->fetch_assoc();

if (isset($_POST['submit'])) {
    $student_name = $_POST['student_name'];
    $matric_number = $_POST['matric_number'];
    $subject_name = $_POST['subject'];
    $test1 = $_POST['test_1'];
    $test2 = $_POST['test_2'];
    $final = $_POST['final'];
    $total = $_POST['total'];
    $grade = $_POST['grade'];

    $total = $test1 + $test2 + $final;

    if ($total >= 80) {
        $grade = 'A';
    } elseif ($total >= 65) {
        $grade = 'B';
    } elseif ($total >= 50) {
        $grade = 'C';
    } elseif ($total >= 45) {
        $grade = 'D';
    } else {
        $grade = 'F';
    }


    $sql = $conn->prepare("UPDATE results SET student_name = ?, matric_number = ?, subject = ?, test_1 = ?, test_2 = ?, final = ?, total = ?, grade = ? WHERE id = ?");
    $sql->bind_param("sssddddsi", $student_name, $matric_number, $subject_name, $test1, $test2, $final, $total, $grade, $id);
    if ($sql->execute()) {
        header("Location: index.php");
        exit();
    }


}

/*$row = [id,student_name,matric_number,subject_code,subject_name,test1,test2,final,total,grade]

*/

$student_name = $row['student_name'];
$matric_number = $row['matric_number'];
$subject = $row['subject'];
$test1 = $row['test_1'];
$test2 = $row['test_2'];
$final = $row['final'];
$total = $row['total'];
$grade = $row['grade'];
?>



<h2>Edit Results</h2>
<?php
include 'form.php';
?>


<?php
include "footer.php";
?>