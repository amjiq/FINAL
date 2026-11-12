<style>
    label {
        display: inline-block;
        width: 150px;

    }
</style>


<form method="POST">
    <label for="student_name">Student Name:</label>
    <input type="text" id="student_name" name="student_name" value="<?php echo $student_name; ?>" required><br><br>

    <label for="matric_number">Matric Number:</label>
    <input type="text" id="matric_number" name="matric_number" value="<?php echo $matric_number; ?>" required><br><br>

    <label for="subject">Subject:</label>
    <input type="text" id="subject" name="subject" value="<?php echo $subject; ?>" required><br><br>

    <label for="test_1">Test 1 (20%):</label>
    <input type="number" id="test_1" name="test_1" min="0" max="20" value="<?php echo $test_1; ?>" required><br><br>

    <label for="test_2">Test 2 (30%):</label>
    <input type="number" id="test_2" name="test_2" min="0" max="30" value="<?php echo $test_2; ?>" required><br><br>

    <label for="final">Final Exam (50%):</label>
    <input type="number" id="final" name="final" min="0" max="50" value="<?php echo $final; ?>" required><br><br>

    <input type="submit" value="Submit" name="submit">
</form>