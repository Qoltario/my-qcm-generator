<?php

require '../app/Manager/QcmManager.php';

$QuestionQcm = new QcmManager;

$qcms = $QuestionQcm -> getAll();

var_dump($qcms)
?>