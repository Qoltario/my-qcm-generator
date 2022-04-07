<?php

if(isset($_GET['id']))
{

    $message = "";

    // Récupère les données de la réponse dont l'id est == à $_GET['id']
    require '../app/Manager/AnswerManager.php';
    $answerManager = new AnswerManager();
    $answer = $answerManager->get($_GET['id']);

    // On recupère toutes les questions depuis la db
    require '../app/Manager/QuestionManager.php';
    $questionManager = new QuestionManager();
    $questions = $questionManager->getAll();


    if(isset($_POST['submit']))
    {
        try
        {
            $formErrors = [];
            if(empty($_POST['title']))
                $formErrors[] = "La réponse est obligatoire";

            if(empty($_POST['id_question']))
                $formErrors[] = "Le choix d'une question est obligatoire !";

            if(count($formErrors) > 0)
                throw new Exception(implode("<br />", $formErrors));

            $questionManager->update($_GET['id'], $_POST['title'], $_POST['id_question']);
            header('Location: /index-answer.php'); die;
        }
        catch(Exception $e)
        {
            $message = $e->getMessage();
        }
        
    }

    require '../template/edit-answer.tpl.php';
}