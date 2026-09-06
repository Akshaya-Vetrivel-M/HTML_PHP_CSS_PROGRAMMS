<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $register_no = isset($_POST["register_no"]) ? $_POST["register_no"] : "";
    $student_name = isset($_POST["student_name"]) ? $_POST["student_name"] : "";
    $department = isset($_POST["department"]) ? $_POST["department"] : "";
    $year = isset($_POST["year"]) ? $_POST["year"] : "";

    if ($register_no != "" && $student_name != "" &&
        $department != "" && $year != "") {

        if (!is_dir("students")) {
            mkdir("students");
        }

        $file = "students/students.txt";
        $records = [];

        if (file_exists($file)) {
            $records = file($file, FILE_IGNORE_NEW_LINES);
        }

        $new_record = "Register No: " . $register_no .
                      " | Name: " . $student_name .
                      " | Department: " . $department .
                      " | Year: " . $year;

        $updated = false;

        foreach ($records as $key => $record) {

            if (strpos($record, "Register No: " . $register_no . " |") === 0) {
                $records[$key] = $new_record;
                $updated = true;
            }
        }

        if (!$updated) {
            $records[] = $new_record;
        }

        file_put_contents($file, implode(PHP_EOL, $records) . PHP_EOL);

        header("Location: records.php");
        exit();

    } else {
        echo "Please fill in all fields.";
    }

} else {
    echo "Invalid request.";
}

?>