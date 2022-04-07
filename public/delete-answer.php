<?php

if(isset($_GET['id']))
{

    $message = "";

    // Récupère les données du qcm dont l'id est == à $_GET['id']
    require '../app/Manager/AnswerManager.php';
    $answerManager = new AnswerManager();
    $answer = $answerManager->get($_GET['id']);

    if(isset($_GET['id']))
    {
        try
        {
            $formErrors = [];
            if(empty($_GET['id']))
                $formErrors[] = "L'id est obligatoire dans l'url'";

            if(count($formErrors) > 0)
                throw new Exception(implode("<br />", $formErrors));

            $answerManager->delete($_GET['id']);
            header('Location: /index-answer.php'); die;
        }
        catch(Exception $e)
        {
            $message = $e->getMessage();
        }

    }
}