<?php
header("Content-Type: application/json");
include("connection.php");



// insert ajax
if (isset($_POST['action']) && $_POST['action'] == 'insert') {
    $name = $_POST["name"];
    $f_name = $_POST["f_name"];
    $roll_no = $_POST["roll_no"];
    $class = $_POST["class"];
    $section = $_POST["section"];
    $reg_id = $_POST["reg_id"];
    $fees = $_POST["fees"];
    $age = $_POST["age"];
    $subjects = $_POST["subjects"];
    $gender = $_POST["gender"];

    $insertquery = "insert into register_tbl(name, f_name, roll_no, class, section, reg_id, fees, age, subjects, gender) values('{$name}','{$f_name}','{$roll_no}','{$class}','{$section}','{$reg_id}','{$fees}','{$age}','{$subjects}','{$gender}')";

    $insertqueryconnect = mysqli_query($con, $insertquery);

    if ($insertqueryconnect) {
        $return_data = array(
            "status" => "0",
            "message" => "data has beeen inserted"
        );
    } else {
        $return_data = 1;
    }
}
// Fetch api
elseif (isset($_POST['action']) && $_POST['action'] == 'view') {
    $fetchquery = "select * from register_tbl";
    $fetchqueryconnect = mysqli_query($con, $fetchquery);
    $return_data = [];
    while ($show = mysqli_fetch_assoc($fetchqueryconnect)) {
        $return_data[] = $show;
    }
}
// Delete api
elseif (isset($_POST['action']) && $_POST['action'] == 'delete') {
    $student_id_del = $_POST['student_id_del'];

    $deletequery = "delete from register_tbl where id= '" . $student_id_del . "'";
    $deletequeryconnect = mysqli_query($con, $deletequery);

    if ($deletequeryconnect) {
        $return_data = array(
            "status" => "0",
            "message" => "working"
        );
    } else {
        $return_data = 1;
    }
}
// Edit api
elseif (isset($_POST['action']) && $_POST['action'] == 'edit') {
    $student_id = $_POST['student_id'];

    $updatequery = "select * from register_tbl where id= '" . $student_id . "'";
    $updatequeryconnect = mysqli_query($con, $updatequery);
    $show = mysqli_fetch_assoc($updatequeryconnect);
    $return_data = $show;
}
// Update api
elseif (isset($_POST['action']) && $_POST['action'] == 'update') {

    $name = $_POST["name"];
    $f_name = $_POST["f_name"];
    $roll_no = $_POST["roll_no"];
    $std_class = $_POST["std_class"];
    $section = $_POST["section"];
    $reg_id = $_POST["reg_id"];
    $fees = $_POST["fees"];
    $age = $_POST["age"];
    $subjects = $_POST["subjects"];
    $gender = $_POST["gender"];

    $student_id = $_POST['student_id'];

    $updatequery = "update register_tbl set name ='{$name}', f_name='{$f_name}', roll_no='{$roll_no}', class='{$std_class}', section='{$section}', reg_id='{$reg_id}', fees='{$fees}', age='{$age}', subjects='{$subjects}', gender='{$gender}' where id= '$student_id' ";

    $updatequeryconnect = mysqli_query($con, $updatequery);

    if ($updatequeryconnect) {
        $return_data = array(
            "status" => "0",
            "message" => "data has beeen updateed"
        );
    } else {
        $return_data = 1;
    }
}


print(json_encode($return_data, JSON_PRETTY_PRINT));
