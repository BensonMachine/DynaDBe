<?php
    include("Assets/DynaDB.php");
    $DynaDB->pageheader("CFSL Training Advisor Reference");
?>

<style>
    i{
        font-size:125px;
        padding-bottom: 20px;
    }
    table{
        margin-top:30px;
    }
    label{
        color:green;
        display: block;
    }
    .form-control{
        width:auto;
    }
</style>

<div class="advadmin">
<table align="center" width=95%>
    <!-- TOP OF THE ROW -->
    <tr>
        <td align=left valign=top><i class="fas fa-users"></i><h2>STUDENT INFORMATION</h2></td>
        <td align=center valign=top><i class="fas fa-book-reader"></i><h2>CLASSROOM LIST</h2></td>
        <td align=right valign=top><i class="fas fa-calendar-check"></i><h2>ABSENCE VERIFICATION</h2></td>
    </tr>
    <!-- STUDENT INFORMATION -->
    <tr>
        <td align=left valign=top>
            <!div style="color:green;font-size:18px;">
                <form method="get" action="students.php">
                    <!-- Student Program -->
                    <?php $DynaDB->form("Location"); ?>

                    <!-- Student Year -->
                    <?php $DynaDB->form("Year"); ?>

                    <!-- Student Language -->
                    <?php $DynaDB->form("Lang"); ?>

                    <!-- Student Classroom -->
                    <?php $DynaDB->form("Program"); ?>

                    <input class="btne btn btn-primary" type="submit" value="Display Data" style='font-size: 24px'>
                </form>
            <a href="students.php?option=current"><em><h4>VIEW ALL CURRENT STUDENTS</h4></em></a>
            <a href="students.php?option=fulltime"><em><h4>CURRENT FULL-TIME STUDENTS</h4></em></a>
            <a href="students.php?option=parttime"><em><h4>CURRENT PART-TIME STUDENTS</h4></em></a>
			<br>
            <a href="students.php?option=longterm"><em><h4>VIEW LONG-TERM STUDENTS</h4></em></a>
            <a href="students.php?option=accomodated"><em><h4>ACCOMODATED STUDENTS</h4></em></a>
        </td>

        <!-- Classroom List -->
        <td align=center valign=top>
            <form method="get" action="classrooms.php">
            </form>
            <br>

            <!-- Testing Schedule -->
            <form method="get" action="schedule.php">
                <h3>TESTING SCHEDULE</h3>
                <!-- Testing Advisor -->
            </form>
            <br>


            <!-- Absences Forecast -->
            <form method="get" action="absence_forecast.php">
                <h3>ABSENCES FORECAST</h3>
            </form>
            <br>
        </td>

        <!-- Absence Verification -->
        <td align=right valign=top>
            
        </td>
    </tr>
</table>
</div>
<br>
</body>
</html>
