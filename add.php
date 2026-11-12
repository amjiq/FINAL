<?php
include "header.php";
include "db.php";

if (isset($_POST['submit'])) {

    $student_name = $_POST['student_name'];
    $matric_number = $_POST['matric_number'];
    $subject = $_POST['subject'];
    $test1 = $_POST['test_1'];
    $test2 = $_POST['test_2'];
    $final = $_POST['final'];

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

    $sql = $conn->prepare("INSERT INTO results
(student_name, matric_number, subject, test_1, test_2, final, total, grade) VALUES
('$student_name', '$matric_number', '$subject', '$test1', '$test2', '$final', '$total', '$grade')");

    if ($sql->execute()) {
        header("Location: index.php");
    }
}

$student_name = "";
$matric_number = "";
$subject = "";
$test1 = "";
$test2 = "";
$final = "";
$total = "";
$grade = "";
?>
<h2>Add Results</h2>
<?php
include "form.php";
include "footer.php";

?>