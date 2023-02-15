<?php

function space($num){
    for($x=1;$x<=$num;$x++){
        echo "&nbsp;";
    }
}

function getSY($mode,$sy){
    if($mode=="add"){
        if(date("m")<5){
             echo (date("Y")-1)."-".date("Y");
        }
        else{
            echo date("Y")."-".(date("Y")+1);
        }
    }
    else{
        echo $sy;
    }
}


function getFirstId($con){
    $sql = "select * from stud_info";
    $result = mysql_query($sql,$con);
    $row = mysql_fetch_array($result);
    $firstid = $row['id'];
    return $firstid;
}

function getLastId($con){
    $sql = "select * from stud_info order by id DESC";
    $result = mysql_query($sql,$con);
    $row = mysql_fetch_array($result);
    $firstid = $row['id'];
    return $firstid;
}


function getBatch($con){
    $sql = "SELECT * from default_data";
    $result = mysql_query($sql,$con);
    $row = mysql_fetch_array($result);
    $batch = $row['batch'];
    return $batch;
}

function get_between($input, $start, $end) 
{ 
  $substr = substr($input, strlen($start)+strpos($input, $start), (strlen($input) - strpos($input, $end))*(-1)); 
  return $substr; 
} 

function getStudNo($con,$course){
    if($course=='BRIDGE')
    {
        $sql = "SELECT * from school_info where course = '$course' and batch = 'B10' order by id DESC limit 2";
    }
    else{
        $sql = "SELECT * from school_info where course = '$course' and batch = 'B32' order by id DESC limit 2";
    }
    
    $result = mysql_query($sql,$con);
    $row = mysql_fetch_array($result);
    $row = mysql_fetch_array($result);
    $id = $row['id'];
    $row_id = $row['row_id'];
    $sql = "SELECT * from stud_info where id = '$id' limit 1";
    $result = mysql_query($sql,$con);
    $row = mysql_fetch_array($result);
    $studid = $row['studid'];
    $id = $row['id'];

    if ($studid == ''){
        $sql = "SELECT * from school_info where course = '$course' and batch = 'B32' and row_id < $row_id order by id desc limit 1";
         $result = mysql_query($sql,$con);
        $row = mysql_fetch_array($result);
        $id = $row['id'];
        $row_id = $row['row_id'];
        $sql = "SELECT * from stud_info where id = '$id' limit 1";
        $result = mysql_query($sql,$con);
        $row = mysql_fetch_array($result);
        $studid = $row['studid'];
        $id = $row['id'];
        if ($studid == ''){
            $sql = "SELECT * from school_info where course = '$course' and batch = 'B32' and row_id < $row_id order by id desc limit 1";
            $result = mysql_query($sql,$con);
            $row = mysql_fetch_array($result);
            $id = $row['id'];
            $row_id = $row['row_id'];
            $sql = "SELECT * from stud_info where id = '$id' limit 1";
            $result = mysql_query($sql,$con);
            $row = mysql_fetch_array($result);
            $studid = $row['studid'];
            $id = $row['id'];
            if ($studid == ''){
                $sql = "SELECT * from school_info where course = '$course' and batch = 'B32' and row_id < $row_id order by id desc limit 1";
                $result = mysql_query($sql,$con);
                $row = mysql_fetch_array($result);
                $id = $row['id'];
                $row_id = $row['row_id'];
                $sql = "SELECT * from stud_info where id = '$id' limit 1";
                $result = mysql_query($sql,$con);
                $row = mysql_fetch_array($result);
                $studid = $row['studid'];
                $id = $row['id'];
            }
        }
    }
 /* looping
    $x=0;
    while($x==1){}
    if ($studid == ''){
        $sql = "SELECT * from school_info where course = '$course' and batch = 'B32' and row_id < $row_id order by id desc limit 1";
         $result = mysql_query($sql,$con);
        $row = mysql_fetch_array($result);
        $id = $row['id'];
        $row_id = $row['row_id'];
        $sql = "SELECT * from stud_info where id = '$id' limit 1";
        $result = mysql_query($sql,$con);
        $row = mysql_fetch_array($result);
        $studid = $row['studid'];
        $id = $row['id'];
        if ($studid == ''){
            break;
        }
    }*/

    $string = $row['studid'];
    $token=explode("-",$string."-");
    $stud_no = $token[1];
    $stud_no = $stud_no + 1;
    $len=strlen($stud_no);
    for($x=$len;$x<6;$x++){
        $stud_no="0".$stud_no;
    }
    return $stud_no;
}

function showButtonSave($mode){
    
    if($mode=="add"){
        echo "
        <div class=\"right\">
            <button  type='button' class='btn btn-primary' title='Save' src='../img/save_add.png' type = 'image' id='save' name=\"save\">Save</button>        
        </div>";
        
    }
    else if($mode=="edit"){
        echo "
        <div class=\"right\">
            <button  type='button' class='btn btn-primary' title='Save' src='../img/save_add.png' type = 'image' id='save' name=\"save\">Save</button>
        </div>";
    }
    
}

function showButtonMove($mode){
    if($mode=="view"){
        echo "<center>
        <input title='First Record' name='move' type='image' src='../img/first.png' onclick='submitForm('move')' value='First'>
        <input title='Previous Record' name='move' type='image' src='../img/prev.png' onclick='submitForm('move')' value='Prev'>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <input title='Next Record' name='move' type='image' src='../img/next.png' onclick='submitForm('move')' value='Next'>
        <input title='Last Record' name='move' type='image' src='../img/last.png' onclick='submitForm('move')' value='Last'>
        
       
        </center>
        ";
        
        
        
    }
}

function alert($message){
     echo "<script type='text/javascript'>
                      alert('$message');
                      </script>";
}
?>