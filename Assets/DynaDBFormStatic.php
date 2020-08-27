<?php
include("DynaDBViews.php");
class DynaDBFormStatic extends DynaDBViews {

    public $textarea = array("Comments","Absences");
    public $datepicker = array("Date_Of_Birth","As_Of_Date","Start_Date","Reassign_Date","Next_Test_Estimated","Actual_End","Immersion_Start","Immersion_End",
                                "Tested_Date", "Booking_Start_Date", "Booking_End_Date", "Booking_Start_Date_PM", "Booking_End_Date_PM", "Alternate_AM_Start",
                                "Alternate_AM_End", "Alternate_PM_Start", "Alternate_PM_End", "Reminder_Date", "Date_From", "Date_To", "Next_Test_Confirmed",
                                "Next_Test_Desired", "Scheduled_End_Date", "RS_Change_Date", "Post_Start_Date", "Post_End_Date", "Assignment_Start_Date",
                                "Assignment_End_Date", "Waiver_Start_Date", "Waiver_End_Date", "Date_of_Request","Projected_End"
    );
    public $formoutput;
    public $record_action;


    public function select_input_Location($selectdefault = null){
        if ($this->record_action == "Add") {            $this->EmptyCheck($selectdefault);}
        elseif ($this->record_action == "Edit") {       $this->EmptyCheck($selectdefault);}
        else {                                          $this->formoutput ="<option value='ALL'>ALL</option>";}
    
        $Locations = $this->Select()->Table("adm_training_location")->OrderBy("Location")->Query();
        foreach ($Locations as $Location) {
            $selected = (strval($selectdefault) == $Location->Location) ? "selected" : "";
            $this->formoutput .= "<option $selected value='".$Location->Location."'>".$Location->Location."</option>";
        }
        return $this->formoutput;
    }


    public function select_input_Year($selectdefault = null){
        $this->formoutput .= "<option value='ALL'>ALL</option>";
        $selectdefault = ($selectdefault == null) ? $this->GetFiscalYear() : $selectdefault;
        $query = $this->Select()->Table("adm_years")->OrderBy("Year_Code desc")->Query();
        foreach($query as $lang){
            $selected = (strval($selectdefault) == $lang->Year_Code) ? "selected" : "";
            $this->formoutput .= "<option $selected value='$lang->Year_Code'> $lang->Year_Name </option>" ;
        };
        return $this->formoutput;
    }


    public function select_input_Fiscal_Year($selectdefault = null){
        return $this->select_input_Year($selectdefault);
    }

    public function select_input_Lang($selectdefault = null){
        $this->formoutput = "<option value='ALL'>ALL</option>";
    
        $query = $this->Select()->Table("adm_lang")->OrderBy("Lang_Code")->Query();
        foreach($query as $lang){
            $selected = ($lang->Lang_Code == $selectdefault) ? "selected": "" ;
            $this->formoutput.= "<option $selected value='".$lang->Lang_Code."' $selected>".$lang->Lang_Code." - ".$lang->Lang_Name."</option>" ;
        }
        return $this->formoutput;
    }

    public function select_input_Program($selectdefault = null){
        if($this->record_action == "Add")       { $this->EmptyCheck($selectdefault); }
        elseif($this->record_action == "Edit")  { $this->EmptyCheck($selectdefault);}
        else                                    { $this->formoutput = "<option value='ALL'>ALL</option>";}

        $programs = $this->Select()->Table("adm_program")->Query();
        foreach($programs as $program){
            $selected = (strval($selectdefault) == $program->Program_Code) ? "selected" : "";
            $this->formoutput.= "<option $selected value='$program->Program_Code'>$program->Program_Name</option>";
        }
        return $this->formoutput;
    }

}
?>