<?php
include("Assets/DynaDB.php");
$DynaDB->pageheader("Students");

$students = $DynaDB->Select()->Table("users")->Query();

?>
    <table id="datatable" class="display" > 
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last_Name</th>
                <th>Level</th>
                <th>Email</th>
                <th>Fiscal Year</th>
                <th>Official Lang</th>
                <th>Training Location</th>
                <th>Registered</th>
            </tr>
        </thead>
        <tbody>
    <?php
        foreach($students as $student){
            tri();
                td("$student->id<br><a class='btn btn-primary' style='color:white' href='students_edit.php?ID=$student->id'> View </a>");
                td($student->First_Name);
                td($student->Last_Name);
                td($student->Level);
                td($student->Email);
                td($student->Fiscal_Year);
                td($student->Official_Lang);
                td($student->Training_Location);
                td($student->Currently_Registered);
            tro();
        }
    ?>
        </tbody>
    </table>
