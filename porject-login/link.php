<?php

    $name = $_REQUEST['names'];
    $email= $_REQUEST['e-mail'];
    $password = $_REQUEST['passwords'];
    $mobile = $_REQUEST['numbers'];

    $con = mysqli_connect("localhost","root","","login");
    $select = 'select max(userId) as mas from datas;';
    $res = $con -> query($select);
    $rec = $res->fetch_assoc();
    if($rec["mas"]==''){
        $entry = 'insert into datas values("'.$name.'","'.$email.'","'.$password.'","'.$mobile.'","A001")';
        $store = $con->query($entry);
    }
    else{ 
        $entry = 'insert into datas values("'.$name.'","'.$email.'","'.$password.'","'.$mobile.'","'.substr($rec["mas"],-4,1).str_pad(number_format(substr($rec["mas"],-1,3))+1, 3, '0', STR_PAD_LEFT).'")';
        $store = $con->query($entry);   
    } 
    $con->close();  
    echo "<script> alert('Register Successfully....') </script>";

    header("Refresh:0; url=login.html");
?>