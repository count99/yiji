<?php
include('DBhelper.php');
if(isset($_POST['radio']))
{
  //var_dump($_POST);
  $test= new DBhelper();
  $wow = $test->update("que",['choice'=>$_POST['hiddenField']+1],['id'=>$_POST['radio']]);
}
echo "<script> location.href='http://localhost/web02/index.php?do=que'; </script>";
?>