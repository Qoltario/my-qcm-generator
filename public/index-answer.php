<?php

require '../app/Manager/AnswerManager.php';

$answerManager = new AnswerManager();
$answers = $answerManager->getAll();

require '../template/index-answer.tpl.php';