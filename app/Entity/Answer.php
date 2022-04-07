<?php

require_once '../app/Entity/Entity.php';
class Answer extends Entity
{

    private int $id;

    private int $id_question;
    
    private string $title;

    private bool $isTheGoodAnswer;

    // public function __construct(int $id, int $id_question, string $title, bool $isTheGoodAnswer = false)
    // {
    //     $this->setTitle($title)->setIsTheGoodAnswer($isTheGoodAnswer);
    //     $this->setId($id);
    //     $this->setId_question($id_question);
    // }

    // TODO : ajouter les propriétés

    // TODO : ajouter les méthodes


    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of isTheGoodAnswer
     */ 
    public function getIsTheGoodAnswer()
    {
        return $this->isTheGoodAnswer;
    }

    /**
     * Set the value of isTheGoodAnswer
     *
     * @return  self
     */ 
    public function setIsTheGoodAnswer($isTheGoodAnswer)
    {
        $this->isTheGoodAnswer = $isTheGoodAnswer;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of idQuestion
     */ 
    public function getIdQuestion()
    {
        return $this->id_question;
    }

    /**
     * Set the value of idQuestion
     *
     * @return  self
     */ 
    public function setId_question($id_question)
    {
        $this->id_question = $id_question;

        return $this;
    }
}