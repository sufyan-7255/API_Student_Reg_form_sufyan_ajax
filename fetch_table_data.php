<?php
include("connection.php");
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.css">

    <title>Fetch All Registrations Data tables</title>
</head>

<body>
    <br>
    <a href="register.php" class="btn btn-info" style="float:right; margin-right: 20px !important;"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; Register Form</a>
    <a></a>
    <h3 class="text-info"><i><u>All Registrations Are Shown Here:</u></i></h3>
    <br><br>
    <div class="container-fluid">
        <!-- Modal Body -->
        <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
        <div class="modal fade" id="delete_ok" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Delete Message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <strong class="text-danger">Record has been Deleted Successfully ! </strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- delete ok modal -->
        <div class="modal fade" id="EditFormModel_ok" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Update Message</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <strong class="text-success">Record has been Updated Successfully ! </strong>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Ok</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- data table for data view -->
        <div class="">
            <table id="myTable" class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Sno</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>F. Name</th>
                        <th>Roll. No.</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>REG. ID.</th>
                        <th>Fees</th>
                        <th>Age</th>
                        <th>Subjects</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <!-- Modal -->
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="EditFormModel" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Edit Student Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="update_form">
                        <div class="row">
                            <div style="display: none;" class="alert alert-success alert-dismissible fade show" id="success-messsage" role="alert">
                                <strong>Congratulations! </strong> You are Registered Successfully
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <div class="col-md-6">
                                Name: <input type="text" placeholder="Enter Name" id="name" minlength="3" class="form-control input_field" name="name" required><br>
                                Father Name: <input type="text" placeholder="Enter Father Name" id="f_name" minlength="3" class="form-control input_field" name="f_name" required><br>
                                Roll No# <input type="text" placeholder="Enter Roll No." id="roll_no" maxlength="5" class="form-control input_number" name="roll_no" required><br>
                                Class: <input type="text" placeholder="Enter Class" id="std_class" maxlength="2" class="form-control input_number" name="std_class" required><br>
                                Section: <input type="text" id="section" placeholder="Enter Section" minlength="1" maxlength="2" class="form-control input_field" name="section" required><br>
                            </div>
                            <div class="col-md-6">
                                Red ID# <input type="text" id="reg_id" placeholder="Enter Reg. ID" maxlength="10" class="form-control input_alphanumeric" name="reg_id" required><br>
                                Fees: <input type="text" id="fees" placeholder="Enter Fees" class="form-control input_number" name="fees" required><br>
                                Age: <input type="text" id="age" placeholder="Enter Age" maxlength="2" class="form-control input_number" name="age" required><br>
                                Subjects: <input type="text" id="subjects" placeholder="Enter Subjects" class="form-control input_field" name="subjects" required><br>
                                Gender: <select req id="gender" class="form-control" name="gender" required>
                                    <option class="form-control" selected disabled>Select Gender</option>
                                    <option id="gender" name="gender" value="Male">Male</option>
                                    <option id="gender" name="gender" value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-success update_record_btn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <!-- Modal -->

    <!-- delete modal -->

    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="delete_modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Delete Registration Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-danger">
                    <b> Are you Sure to Delete this Record !</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger btn_del_modal">Confirm</button>
                </div>
            </div>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script href="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.js"></script>



    <script>
        // function new(){
        $(document).ready(function() {
            // aaaa();
        });
        // table
        $("#myTable").ready(function() {
            let table = $('#myTable').DataTable({
                
                responsive: {
                    breakpoints: [{
                            name: 'bigdesktop',
                            width: Infinity
                        },
                        {
                            name: 'meddesktop',
                            width: 1480
                        },
                        {
                            name: 'smalldesktop',
                            width: 1280
                        },
                        {
                            name: 'medium',
                            width: 1188
                        },
                        {
                            name: 'tabletl',
                            width: 1024
                        },
                        {
                            name: 'btwtabllandp',
                            width: 848
                        },
                        {
                            name: 'tabletp',
                            width: 768
                        },
                        {
                            name: 'mobilel',
                            width: 480
                        },
                        {
                            name: 'mobilep',
                            width: 320
                        }
                    ]
                },
                
                dom: 'Bfrtip',
                orderCellsTop: true,
                fixedHeader: true,


                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print',
                ]
            });
            // console.log(table);
            // Setup - add a text input to each footer cell
            $('#myTable thead tr').clone(true).appendTo('#myTable thead');
            $('#myTable thead tr:eq(1) th').each(function(i) {
                var title = $(this).text();
                $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table
                            .column(i)
                            .search(this.value)
                            .draw();
                    }
                });
            });
            // fetch
            $.ajax({
                url: 'crud_api.php',
                type: 'POST',
                data: {
                    action: 'view'
                },
                success: function(data) {
                    // console.log(data);
                    table.clear().draw();
                    var sno = '0';
                    for (var i = 0; i < data.length; i++) {
                        sno++;

                        btn_edit = '<button class="btn btn-sm btn-select 702a1b_2 btn btn-success" data-id="' + data[i].id + '" ><i class="fa fa-edit"></i></button>';
                        btn_dlt = '<button class="btn btn-sm btn btn-del btn-danger" data-id="' + data[i].id + '"><i class="fa fa-trash"></i></button>';

                        btn = btn_edit + btn_dlt;
                        table.row.add([sno, data[i].id, data[i].name, data[i].f_name, data[i].roll_no, data[i].class, data[i].section, data[i].reg_id, data[i].fees, data[i].age, data[i].subjects, data[i].gender, btn]);
                    }
                    table.draw();
                },
                error: function(e) {
                    console.log(e);
                    alert("Contact IT Department");
                }

            });

            //   delete by me   
            $("#myTable").on('click', '.btn-del', function() {
                var student_id_del = $(this).attr("data-id");
                console.log(student_id_del);
                $('#delete_modal').modal('show');


                $(".btn_del_modal").click(function() {
                    $.ajax({
                        url: 'crud_api.php',
                        type: "POST",
                        data: {
                            action: 'delete',
                            student_id_del: student_id_del
                        },
                        success: function(response) {
                            console.log(response);
                            $('#delete_modal').modal('hide');
                            $('#delete_ok').modal('show');

                            // Setup - add a text input to each footer cell

                            $.ajax({
                                url: 'crud_api.php',
                                type: 'POST',
                                data: {
                                    action: 'view'
                                },
                                success: function(data) {
                                    // console.log(data);
                                    table.clear().draw();
                                    var sno = '0';
                                    for (var i = 0; i < data.length; i++) {
                                        sno++;

                                        btn_edit = '<button class="btn btn-sm btn-select 702a1b_2 btn btn-success" data-id="' + data[i].id + '" ><i class="fa fa-edit"></i></button>';
                                        btn_dlt = '<button class="btn btn-sm btn btn-del btn-danger" data-id="' + data[i].id + '"><i class="fa fa-trash"></i></button>';

                                        btn = btn_edit + btn_dlt;
                                        table.row.add([sno, data[i].id, data[i].name, data[i].f_name, data[i].roll_no, data[i].class, data[i].section, data[i].reg_id, data[i].fees, data[i].age, data[i].subjects, data[i].gender, btn]);
                                    }
                                    table.draw();
                                },
                                error: function(e) {
                                    console.log(e);
                                    alert("Contact IT Department");
                                }

                            });
                        },
                        error: function(e) {
                            console.log(e);
                            alert("Contact IT Department");
                        }
                    });
                });




            });

            //edit
            $("#myTable").on('click', '.btn-select', function() {
                var student_id = $(this).attr("data-id");
                // console.log(student_id);
                $.ajax({
                    url: 'crud_api.php',
                    type: "POST",
                    data: {
                        action: 'edit',
                        student_id: student_id
                    },
                    success: function(response) {
                        // console.log(response);
                        $('#id').val(response.id);
                        $('#name').val(response.name);
                        $('#f_name').val(response.f_name);
                        $('#roll_no').val(response.roll_no);
                        $('#std_class').val(response.class);
                        $('#section').val(response.section);
                        $('#reg_id').val(response.reg_id);
                        $('#fees').val(response.fees);
                        $('#age').val(response.age);
                        $('#subjects').val(response.subjects);
                        $('#gender').val(response.gender);

                        $('#EditFormModel').modal('show');

                    },
                    error: function(e) {
                        console.log(e);
                        alert("Contact IT Department");
                    }
                });


                // update by me
                $("#EditFormModel").on('click', '.update_record_btn', function(e) {
                    // var student_id = $(this).attr("data-id");
                    console.log(student_id);
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
                            action: 'update',
                            name: name,
                            f_name: f_name,
                            roll_no: roll_no,
                            std_class: std_class,
                            section: section,
                            reg_id: reg_id,
                            fees: fees,
                            age: age,
                            subjects: subjects,
                            gender: gender,
                            student_id: student_id
                        },
                        success: function(response) {
                            console.log(response)
                            $('#EditFormModel').modal('hide');
                            $('#EditFormModel_ok').modal('show');
                            $.ajax({
                                url: 'crud_api.php',
                                type: 'POST',
                                data: {
                                    action: 'view'
                                },
                                success: function(data) {
                                    // console.log(data);
                                    table.clear().draw();
                                    var sno = '0';
                                    for (var i = 0; i < data.length; i++) {
                                        sno++;

                                        btn_edit = '<button class="btn btn-sm btn-select 702a1b_2 btn btn-success" data-id="' + data[i].id + '" ><i class="fa fa-edit"></i></button>';
                                        btn_dlt = '<button class="btn btn-sm btn btn-del btn-danger" data-id="' + data[i].id + '"><i class="fa fa-trash"></i></button>';

                                        btn = btn_edit + btn_dlt;
                                        table.row.add([sno, data[i].id, data[i].name, data[i].f_name, data[i].roll_no, data[i].class, data[i].section, data[i].reg_id, data[i].fees, data[i].age, data[i].subjects, data[i].gender, btn]);
                                    }
                                    table.draw();
                                },
                                error: function(e) {
                                    console.log(e);
                                    alert("Contact IT Department");
                                }
                            });
                        },
                        error: function(e) {
                            console.log(e);
                            alert("contact developer");
                        }
                    })
                });
            });
        })
    </script>

</body>

</html>