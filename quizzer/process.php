<?php 
include 'database.php';

session_start();

//chec to see if the score is set
if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
}

if($_POST){
    $number=$_POST['number'];

    $selected_choice=$_POST['choice'];

    $next=$number+1;

    //get the total question
    $query="SELECT * FROM question";
    $result=$co->query($query) or die($co->error.__LINE__);
    $total=$result->num_rows;

    //Get correct choice
    $query="SELECT * FROM choices WHERE question_number=$number AND is_correct=1";

    //et result 
    $result=$co->query($query) or die($co->error.__LINE__);

    //get row
    $row=$result->fetch_assoc();

    //set coorect choice
    $correct_choice=$row['id'];

    //compare
    if($correct_choice==$selected_choice){
        //Answer is correct
        $_SESSION['score']++;
    }

    //check if the last question
    if($number == $total){
        header('Location:final.php');
        exit();
    }else{
        header('Location:question.php?n='.$next);
    }
}