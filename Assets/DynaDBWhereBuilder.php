<?php
//include("DynaDBFormStatic.php");

class DynaDBWhereBuilder{

    public $wherestring;
    public $contentdisplay;
    
    public function WhereBuilder($req){
        $this->wherestring = "ID is not null";

        foreach ($req as $key => $value){
            if($value == "ALL") continue;
            $stringquery = "Input" . $key;
            $this->$stringquery($value);
        }
        echo $this->contentdisplay;
        return $this->wherestring;
    }

    public function InputProgram($program){
        $this->wherestring .= " and Program = '$program'";
        $this->contentdisplay .= "<h5 style='color:blue;'>PROGRAM: <span style='color:red';>$program</span></h5>";
    }
    function InputYear($year){
        $this->wherestring .= " and Fiscal_Year = '$year'";
        $this->contentdisplay .= "<h5 style='color:blue;'>YEAR: <span style='color:red';>$year</span></h5>";
    }
    function InputLang($lang){
        $this->wherestring .= " and Lang = '$lang'";
        $this->contentdisplay .= "<h5 style='color:blue;'>LANGUAGE: <span style='color:red';>$lang</span></h5>";
    }
    function InputFamily_Name($familyname){
        $this->wherestring .= " and Family_Name = '$familyname'";
        $this->contentdisplay .= "<h5 style='color:blue;'>Family Name: <span style='color:red';>$familyname</span></h5>";
    }
    function InputGiven_Name($givenname){
        $this->wherestring .= " and Given_Name = '$givenname'";
        $this->contentdisplay .= "<h5 style='color:blue;'>Given Name: <span style='color:red';>$givenname</span></h5>";
    }
    function InputClassroom($classroom){
        if ($classroom != "ALL" and $classroom != "") {
            if ($classroom == "VC") {
                $this->wherestring .=" and (AM_VC_Class = 'Yes' or PM_VC_Class = 'Yes')";
            } else {
                $this->wherestring .=" and (Classroom = '".$classroom."' or Classroom_PM = '".$classroom."')";
            }
            $this->contentdisplay .= "<h5 style='color:blue;'>CLASSROOM: <span style='color:red';>$classroom</span></h5>";
        }
    }
}
?>