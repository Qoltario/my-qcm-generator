<?php

if(isset($_GET['id']))
{

    $message = "";

    // Récupère les données du qcm dont l'id est == à $_GET['id']
    require '../app/Manager/QuestionManager.php';
    $questionManager = new QuestionManager();
    $question = $questionManager->get($_GET['id']);

    if(isset($_GET['id']))
    {
        try
        {
            $formErrors = [];
            if(empty($_GET['id']))
                $formErrors[] = "L'id est obligatoire dans l'url'";

            if(count($formErrors) > 0)
                throw new Exception(implode("<br />", $formErrors));

            $questionManager->delete($_GET['id']);
            header('Location: /index-question.php'); die;
        }
        catch(Exception $e)
        {
            $message = $e->getMessage();
        }

    }
}