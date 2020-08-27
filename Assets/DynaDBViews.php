<?php
include("DynaDBModels.php");

class DynaDBViews extends DynaDBModels
{
    public function footer($mailto)
    {
        $_SESSION["mailto"] = $mailto;
        include("Views/footer.php");
    }
    
    public function pageheader($title, $subtitle = null)
    {
        $headertitle = $title;
        $headersubtitle = $subtitle;
        include("Views/header.php");
    }
    
    //  _______    _     _
    // |__   __|  | |   | |
    //    | | __ _| |__ | | ___
    //    | |/ _` | '_ \| |/ _ \
    //    | | (_| | |_) | |  __/
    //    |_|\__,_|_.__/|_|\___|
    
    
    //TH + TD automatic mapping
    public function thtd($thefield, $theobject = null)
    {
        /*
        $field = $this->LabelCreator($thefield);
        if (is_string($theobject)) {
            $value = $theobject;
        } else {
            $value = isset($theobject->$thefield) ? $theobject->$thefield : "";
        }
        echo"<tr class='thtd-tr'>
                <th class='thtd-th'>$field</th>
                <td class='thtd-td'>$value</td>
            </tr>";
            */
    }

    public function absencesColorCode(){
        echo"<br><br>";
        echo "<div style='background-color:black; width:300px'>";
        echo "<p style='color:white'>ROW COLOR LEGEND:</p>";
        echo "<p style='color:PaleGreen'>GREEN = MORNING ABSENCES</p>";
        echo "<p style='color:DodgerBlue'>BLUE = AFTERNOON ABSENCES</p>";
        echo "<p style='color:red'>RED = ALL-DAY ABSENCES</p>";
        echo "<p style='color:orchid'>PURPLE = IMMERSION ABSENCES</p>";
        echo "<p style='color:DarkGrey'>GREY = STATUTORY HOLIDAYS</p>";
        echo "</div>";
    }

    public function classroomColorCode(){
        echo"<br><br>";
        echo "<div style='background-color:black; width:300px'>";
        echo "<p style='color:white'>ROW COLOR LEGEND:</p>";
        echo "<p style='color:LightBlue'>BLUE = OCCUPIED CLASSROOM</p>";
        echo "<p style='color:PaleGreen'>GREEN = VACANT CLASSROOM</p>";
        echo "<p style='color:salmon'>RED = FUTURE RESERVED BOOKING</p>";
        echo "<p style='color:LemonChiffon'>BEIGE = TEMPORARY USE</p>";
        echo "<p style='color:Yellow'>YELLOW = AVAILABLE WITHIN 30 DAYS</p>";
        echo "</div>";
    }
}



?>