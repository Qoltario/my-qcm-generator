<?php

if(isset($_POST['submit']) && isset($_GET['id']))
{

    require '../app/Manager/AnswerManager.php';
    $answerManager = new AnswerManager();
    $answerManager->delete($_GET['id']);
    header('Location: /index-answer.php'); die;

}

?>