<?php
include("connection.php");
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Student Registration</title>
</head>

<body>



    <div class="container">
        <form id="reg_form">
            <br>
            <a href="fetch_table_data.php" class="btn btn-info" style="float:right;">All Registrations</a>
            <h3 class="text-disabled">Student Register</h3>
            <br>
            <div class="row">
                <div style="display: none;" class="alert alert-success alert-dismissible fade show" id="success-messsage" role="alert">
                    <strong>Congratulations! </strong> You are Registered Successfully
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="col-md-6">
                    <input type="text" placeholder="Enter Name" name="name" minlength="3" class="form-control input_field" id="name" required><br>


                    <input type="text" placeholder="Enter Father Name" name="f_name" minlength="3" class="form-control input_field" id="f_name" required><br>



                    <input type="text" placeholder="Enter Roll No." name="roll_no" maxlength="5" class="form-control input_number" id="roll_no" required><br>


                    <input type="text" placeholder="Enter Class" name="class" maxlength="2" class="form-control input_number" id="std_class" required><br>


                    <input type="text" name="section" placeholder="Enter Section" minlength="1" maxlength="2" class="form-control input_field" id="section" required><br>


                </div>
                <div class="col-md-6">

                    <input type="text" name="reg_id" placeholder="Enter Reg. ID" maxlength="10" class="form-control input_alphanumeric" id="reg_id" required><br>


                    <input type="text" name="fees" placeholder="Enter Fees" class="form-control input_number" id="fees" required><br>


                    <input type="text" name="age" placeholder="Enter Age" maxlength="2" class="form-control input_number" id="age" required><br>


                    <input type="text" name="subjects" placeholder="Enter Subjects" class="form-control input_field" id="subjects" required><br>


                    <select req name="gender" class="form-control" id="gender" required>
                        <option class="form-control" selected disabled>Select Gender</option>
                        <option name="gender" value="Male">Male</option>
                        <option name="gender" value="Female">Female</option>
                    </select>
                </div>
            </div>
            <br>
            <button type="submit" name="submit" class="form-control btn btn-success" id="reg-btn">Submit<br>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>

<script>
    $('.input_field').keypress(function(e) {
        var regex = new RegExp("^[a-zA-Z \s]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        } else {
            e.preventDefault();
            alert('Only Alphabets are allowed in this field');
            return false;
        }
    });
    $('.input_number').keypress(function(e) {
        var regex = new RegExp("^[0-9]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        } else {
            e.preventDefault();
            alert('Only Numbers are allowed in this field');
            return false;
        }
    });
    $('.input_alphanumeric').keypress(function(e) {
        var regex = new RegExp("^[a-zA-Z0-9]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        } else {
            e.preventDefault();
            alert('Only Numbers are allowed in this field');
            return false;
        }
    });
    $("#reg_form").on("submit", function(e) {
        e.preventDefault();
        var name = $("#name").val();
        var f_name = $("#f_name").val();
        var roll_no = $("#roll_no").val();
        var std_class = $("#std_class").val();
        var section = $("#section").val();
        var reg_id = $("#reg_id").val();
        var fees = $("#fees").val();
        var age = $("#age").val();
        var subjects = $("#subjects").val();
        var gender = $("#gender").val();


        $.ajax({
            url: "crud_api.php",
            type: "POST",
            dataType: "json",
            data: {
                action: 'insert',
                name: name,
                f_name: f_name,
                roll_no: roll_no,
                class: std_class,
                section: section,
                reg_id: reg_id,
                fees: fees,
                age: age,
                subjects: subjects,
                gender: gender,
            },
            success: function(response) {
                // console.log(response)
                $("#success-messsage").show();
                $("#reg_form").trigger("reset");
            },
            error: function(e) {
                console.log(e);
                alert("contact developer");
                // $("#reg_form").trigger("reset");
            }
        })

    });
</script>


</html>