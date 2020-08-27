<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("DynaDBForm.php");
class DynaDB extends DynaDBForm{
  
    private $conex;

	function __construct($ip, $username,$password,$db){
        $this->conex = new mysqli($ip, $username,$password,$db);
    }

    public $datam = array();

    //SELECT
    public $action, $table, $where, $orderby;
    //UPDATE
    public $update, $set, $to, $for;
    //INSERT
    public $insert, $into, $values;
    //DEBUG + LOG
    public $finalsqlquery, $ID, $RecordHistory;



    


    //VIEWS




  	public function Select($leselect = null){
        $this->ResetField();
        if(!isset($leselect)){
            $this->action = "SELECT * FROM ";
        }
        else{
            $this->action = "SELECT $leselect FROM ";
        }
        return $this;
    }

    public function Distinct($field){
        $this->ResetField();
        $this->action = "SELECT DISTINCT " . $field . " FROM ";
        return $this;
    }

    public function Table($thetable){
        $this->table = $thetable;
        return $this;
    }
  
    public function OrderBy($theorder){
        $this->orderby = $theorder;
        return $this;
    }

    public function QueryStr(){
        $catch = $this->GetQuery($this->action,$this->table,$this->where,$this->orderby);
        return $this->finalsqlquery;
    }

    public function Query(){
        return $this->GetQuery($this->action,$this->table,$this->where,$this->orderby);
    }

    public function QueryOne(){
        $query =  $this->Query();
        return $query[0];
    }

    function GetQuery($action = null, $table = null, $where = null, $orderby = null){
        $this->datam = array();
        $lesql = $action;
        $lesql .= $table;
        if($where != null){
            $lesql .= " WHERE " . $where;
        }
        if($orderby != null){
            $lesql .= (" ORDER BY ". $orderby);
        }
        $this->finalsqlquery = $lesql;
        $lefield = $this->conex->query($lesql);
        while($row = $lefield->fetch_assoc()){
            array_push($this->datam,(object)$row);
        }
        return $this->datam;
    }

    public function Count(){
        $thequery = $this->GetQuery($this->action,$this->table,$this->where,$this->orderby);
        return count($thequery);
    }

    //INSERT
    public function Insert(){
        $this->ResetField();
        $this->insert = "INSERT INTO ";
        return $this;
    }

    public function Into($table){
        $this->into = $table;
        return $this;
    }

    public function Values($theRequest){
        $this->values = $theRequest;
        return $this;
    }

    public function Remove(){
        $lesql = "DELETE FROM ";
        $lesql .= $this->table;
        $lesql .= " WHERE " . $this->where;

        $lefield = $this->conex->query($lesql);
    }

    public function Create(){
        $lesql = $this->insert;
        $lesql .= $this->into;

        $thefields = "";
        $thevalues = "";

        foreach ($this->values as $key => $value){
            if($key != "ID" && $key != "id"){
                $thefields .= $key .", ";
                $thevalues .= "'$value', ";
            }
        }
        
        //Cleaning the ',' at the end
        $thefields = substr($thefields, 0, -2);
        $thevalues = substr($thevalues, 0, -2);

        $lesql .= "($thefields) VALUES ($thevalues)";

        if($this->where != null){
            $lesql .= " WHERE " . $this->where;
        }

        $lefield = $this->conex->query($lesql);

    }


    //UPDATE
    public function Update($table){
        $this->ResetField();
        $this->table = $table; //forlog
        $this->update = "UPDATE " . $table;
        return $this;
    }

    public function Set($field){
        $this->set = " SET " . $field;
        return $this;
    }

    public function To($value){
        $this->to = " = '". $value . "'";
        return $this;
    }

    public function For($values){
        $this->for = $values;
        return $this;
    }


    public function Edit($Req){
        $Changed = new stdClass();

        $Original = unserialize($Req["Original"]);
        unset($Req["Original"]);

        $Modified = $Req;
 
        $this->ID = $Original->ID;
    
        //Check if the new propriety are changed by taking the Modified and comparing with the Original
            //+if the values are not the same this mean they are modified, so we save in changed
        foreach($Modified as $key => $value){
            if($value != $Original->$key){
                $Changed->$key = $value;
                $this->RecordHistory .= "<br> $key UPDATED ( FROM : ".$Original->$key." TO : $value ) ";
            };
        }
        $this->for = $Changed;

        return $this;
    }


    public function Go(){
        $lesql = $this->update;

        //Multiple
        if($this->for != null){

            $lesql .= " SET ";
            $thevalues = "";
    
            foreach ($this->for as $key => $value){
                if($key != "ID" && $key != "id"){
                    $thevalues .= "$key='$value', ";
                }
            }
            $thevalues = substr($thevalues, 0, -2);

            $lesql .= "$thevalues";
        }
        //Single
        else{
            $lesql .= $this->set;
            $lesql .= $this->to;
        }

        if($this->where != null){
            $lesql .= " WHERE " . $this->where;
        }
        $lefield = $this->conex->query($lesql);
        $this->log_history();

    }

    //GLOBAL
    public function Where($thewhere){
        $this->where = $thewhere;
        return $this;
    }

    public function ResetField(){
        $this->action = null;
        $this->table = null;
        $this->where = null;
        $this->orderby = null;
        $this->update = null;
        $this->set = null;
        $this->to = null;
        $this->insert = null;
        $this->into = null;
        $this->values = null;
        $this->for = null;
        $this->ID = null;
        $this->RecordHistory = null;
    }

    function insertquery($query){
        $lefield = $this->conex->query($query);
        return $this->datam;
    }


    function log_history(){
        //$updated_history = "Modified ". date("Y-m-d H:i:s") ." by ".$_SESSION['Username']."  ";
        $updated_history = "Modified ". date("Y-m-d H:i:s") ." by FOOFON  ";

        $updated_history .= $this->RecordHistory;
        $updated_history = str_replace("'", "\"", $updated_history);

        $log = new stdClass();
        $log->Record_ID = $this->ID;
        $log->Record_Table = $this->table;
        $log->Record_History = $updated_history;

        $query = $this->Insert()->Into("lcars_history")->Values($log)->Create();
    }

}

global $DynaDB;
$DynaDB = new DynaDB("127.0.0.1", "root", "","dynaexemple");


//Update
//  SIMPLE
//  $DynaDB->Update()->Set()->To()->Where()->Go();
//  EDIT Form
//  $DynaDB->Update()->Edit(1,2)->Where()->Go();


//Select 
//  $query = $DynaDB->Select()->Table()->Where()->Query()

//Insert 
//  $query = $DynaDB->Insert()->Into()->Values()->Create()

//Inheritence priority 
//DynaDB -> DynaFunc -> DynaForm -> DynaFormStatic -> DynaView
