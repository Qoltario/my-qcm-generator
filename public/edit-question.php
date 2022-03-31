<?php

if(isset($_GET['id']))
{
    $message = "";

    // Récupère les données de la question dont l'id est == à $_GET['id']
    require '../app/Manager/QuestionManager.php';
    $questionManager = new QuestionManager();
    $question = $questionManager->get($_GET['id']);

    // On récupère la modification de la question 
    if(isset($_POST['submit']))
    {
        // On vérifie si le champ est rempli
        if(!empty($_POST['title']))
        {
            $title = $_POST['title'];
        }
        else
        {
            $message = "<p>Le titre est obligatoire !</p>";
        }

        // On vérifie si un QCM est sélectionné
        if(!empty($_POST['id_qcm']))
        {
            $id_qcm = $_POST['id_qcm'];
        }
        else
        {
            $message .= "<p>Le choix d'un QCM est obligatoire</p>";
        }

        if(isset($title) && isset($id_qcm))
        {
            $questionUp = $questionManager->update(intval($_GET['id']) ,$_POST['title'], intval($_POST['id_qcm']));
            header('Location: index-question.php'); die;
        }
    }
    

    // On recupère tous les qcms depuis la db
    require '../app/Manager/QcmManager.php';
    $qcmManager = new QcmManager();
    $qcms = $qcmManager->getAll();

    require '../template/edit-question.tpl.php';
}