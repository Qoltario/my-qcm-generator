<?php

require '../app/Manager/QuestionManager.php';
$questionManager = new QuestionManager();
$questions = $questionManager->getAll();

$message = "";

if(isset($_POST['submit']))
{
    if(!empty($_POST['title']))
    {
        require '../app/Manager/AnswerManager.php';
        $manager = new AnswerManager();
        $questionId = $manager->insert($_POST['title'], $_POST['id_question']);

        if($questionId)
        {
            header('Location: /index-answer.php'); die;
        }
        else
        {
            $message = "Une erreur s'est produite lors de l'enregistrement";
        }
    }
    else
    {
        $message = "Le titre est obligatoire";
    }
}


require '../template/new-answer.tpl.php';