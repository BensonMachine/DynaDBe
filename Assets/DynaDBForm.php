<?php
include("DynaDBFormStatic.php");
class DynaDBForm extends DynaDBFormStatic{

    public $field, $value, $label, $class, $content, $disabled, $additionaltext;
    public $passed = array();

    //ENTER POINT
    public function form($thefield= null, $theobject = null){
        (!is_null($thefield)) ? $this->col($thefield,$theobject) : false;

        echo "<div class='form-row'>";
            echo $this->content;
        echo "</div>";
        $this->ResetForm();
    }

    //STANDARD FORM
    public function col($thefield= null, $theobject = null){
        //$this->class = $this->AutomaticClassAdder($thefield);

        if($this->isSelect($thefield)){
            $this->SelectMapper($thefield, $theobject);
            $this->content .= 
            ("<div class='form-group col'>
                <label>$this->label</label>
                <select class='form-control $this->class' name='$this->field' $this->disabled>".
                    ($this->value) .
                "</select>
            </div>");
        }
        elseif($this->isTextArea($thefield)){
            $this->TextAreaMapper($thefield, $theobject);
            $this->content .= 
            ("<div class='form-group col'>
                <label>$this->label</label>
                <textarea rows='4' style='width:100%' class='form-control $this->class' name='$this->field' >$this->value </textarea>
            </div>");

        }
        elseif($this->isDatePicker($thefield)){
            $this->DatePickerMapper($thefield, $theobject);
            $this->content .= 
            ("<div class='form-group col'>
                <label>$this->label</label>
                <input onclick='javascript:show_calendar(\"calform.$this->field\");' type='text' value ='$this->value' name='$this->field'> <a href='javascript:show_calendar(\"calform.$this->field\");'  onMouseOver='window.status=\"Date Picker\";return true;' onMouseOut='window.status=\"\";return true;'><i class='far fa-calendar-plus'></i></a>
            </div>");
        }
        else{
            $this->inputMapper($thefield, $theobject);
            $this->content .=  
            ("<div class='form-group col'>
                <label>$this->label</label>
                <input class='form-control $this->class' name='$this->field' value='$this->value' $this->disabled>
            </div>");
        }

        return $this;
    }

    //TABLE FORM
    public function formthtd($thefield= null, $theobject = null){

        if($this->isSelect($thefield)){
            $this->SelectMapper($thefield, $theobject);
            echo"<tr>
                    <th class='thtd-th $this->class'>$this->label</th>
                    <td class='thtd-td $this->class'> 
                        <select class='form-control' name='$this->field' $this->disabled>".($this->value) ."</select>  
                        $this->additionaltext
                    </td>
                </tr>";
        }
        elseif($this->isTextArea($thefield)){
            $this->TextAreaMapper($thefield, $theobject);
            echo"<tr>
                    <th class='thtd-th $this->class'>$this->label</th>
                    <td class='thtd-td $this->class'><textarea rows='4' style='min-width:300px' class='form-control $this->class' name='$this->field' >$this->value</textarea></td>
                </tr>";
        }
        elseif($this->isDatePicker($thefield)){
            $this->DatePickerMapper($thefield, $theobject);
            echo"<tr>
                    <th class='thtd-th $this->class'>$this->label</th>
                    <td class='thtd-td $this->class'>
                        <input onclick='javascript:show_calendar(\"calform.$this->field\");' type='text' value ='$this->value' name='$this->field'> <a href='javascript:show_calendar(\"calform.$this->field\");'  onMouseOver='window.status=\"Date Picker\";return true;' onMouseOut='window.status=\"\";return true;'><i class='far fa-calendar-plus'></i></a>
                        $this->additionaltext
                    </td>
                </tr>";
        }
        else{
            $this->inputMapper($thefield, $theobject);
            echo"<tr>
                    <th class='thtd-th $this->class'>$this->label</th>
                    <td class='thtd-td $this->class'>
                        <input class='form-control' name='$this->field' value='$this->value' $this->disabled>
                        $this->additionaltext
                    </td>
                </tr>";
        }
        $this->ResetForm();
    }

    function formsend($table){
        $output = array();
        foreach($this->passed as $field){
            array_push($output,array("$field" => $_REQUEST[$field]));
        }
        $output = (object)$output;
        $this->Insert()->Into($table)->Values($output)->Create();
        return $output;
    }

    //MAPPING + PRINTING
    //TEXT
    public function inputMapper($thefield, $theobject){
        $this->field = $thefield;
        $this->value = isset($theobject->$thefield) ? $theobject->$thefield : "";
        $this->label = $this->LabelCreator($thefield);
        $this->class = $thefield;
        $this->additionaltext = $this->AdditionalTextCreator();
    }
    //SELECT
    public function selectMapper($thefield,$theobject){
        $this->field = $thefield;
        $this->value = $this->SelectorCreator($thefield, $theobject);
        $this->label = $this->LabelCreator($thefield);
        $this->class = $thefield;
        $this->additionaltext = $this->AdditionalTextCreator();
    }

    //TEXTAREA
    public function textareaMapper($thefield, $theobject){
        $this->field = $thefield;
        $this->value = isset($theobject->$thefield) ? $theobject->$thefield : "";
        $this->label = $this->LabelCreator($thefield);
        $this->class = $thefield;
        $this->additionaltext = $this->AdditionalTextCreator();
    }

    public function DatePickerMapper($thefield, $theobject){
        $this->field = $thefield;
        $this->value = isset($theobject->$thefield) ? $theobject->$thefield : "";
        $this->label = $this->LabelCreator($thefield);
        $this->class = $thefield;
        $this->additionaltext = $this->AdditionalTextCreator();

    }

    public function disable(){
        $this->disabled = "disabled";
        return $this;
    }


    //AT THE END OF TEXTBOX
    public function AddInfo($info){
        $this->additionaltext .= "<span> $info </span>";
        return $this;
    }
    //IN A NEW LINE
    public function MoreInfo($info){
        if($info != ""){
            $this->additionaltext .= "<p> $info </p>";
        }
        return $this;
    }



    function formSubmit($text){
        echo "<button type='submit' class='btn btn-success btn-lg btn-block'>$text</button>";
    }

    public function ResetForm(){
        $this->content = null;
        $this->disabled = null;
        $this->additionaltext = "";
        $this->formoutput = "";
        $this->class = null;
    }

    //String Manipulation
    public function LabelCreator($string){
        $output = str_replace("_", " ", $string);
        return ucwords($output);
    }
    public function FieldCreator($string){
        $output = strtolower($string);
        return str_replace(" ", "_", $output);
    }
    public function TextAreaCreator($string){
        $query = ("textarea_" .$string."();");
        $this->class = $string;
        return ("\$this->" . $query);
    }
    public function AdditionalTextCreator(){
        $string = $this->additionaltext;
        if($string == null){
            return "";
        }
        else{
            return $string;
        }
    }
    public function SelectorCreator($string, $selected){
        if(isset($selected->$string) && $selected->$string != null){
            $selected = $selected->$string;
        }
        else{
            $selected = "" ;
        }
        //$selected = (isset($selected->$string)) ? $selected->$string : "$selected";
        $query = ("select_input_" .$string."('$selected');");
        $result = eval("return \$this->" . $query);
        $this->class = $string;
        return $result;
    }
/*
    public function AutomaticClassAdder($thefield){
        $SpecialContextClass = array("Comments","Test_Date_Desired","Date");
        foreach($SpecialContextClass as $Class){
            if($thefield == $Class){
                return $thefield;
            }
        }
    }
*/
    //Form Function
    public function Record_Action($Record_Action){
        if($Record_Action == "Add" or $Record_Action == "Edit") {
            $this->record_action = $Record_Action;
        }
        else{
            $this->record_action = "Index";
        }
    }

    //Check if it's a select form
    public function isSelect($value){
        foreach (get_class_methods($this) as $method_name) {
            if(strpos($method_name, "select_input") == 0){
                $methode = $method_name;
                if($value == str_replace("select_input_","",$methode)){
                    return true;
                }
            }
        }
    }
    //Check if it's a TextArea by checking the array
    public function isTextArea($value){
        foreach($this->textarea as $ta){
            if($ta == $value){
                return true;
            }
        }
    }
    //Check if it's a DatePicker by checking the array
    public function isDatePicker($value){
        foreach($this->datepicker as $dp){
            if($dp == $value){
                return true;
            }
        }
    }
    //Check if it's a DatePicker by checking the array
    public function EmptyCheck($value){
        if($value == "MT" || $value == ""){
            $this->formoutput =  "<option selected value=''></option>";
        }
        else{
            $this->formoutput =  "<option value=''></option>";
        }
    }
}
?>