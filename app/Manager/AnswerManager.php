<?php

require '../app/Entity/Answer.php';
require_once '../app/Manager/Manager.php';

class AnswerManager extends Manager
{

    public function getAll()
    {
       
        $sql = 'SELECT * FROM answer';
        $req = $this->getPdo()->prepare($sql);
        $req->execute();
        $answers = $req->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach($answers as $answer)
        {
            $obj = new Answer();
            $obj->setId($answer['id']);
            $obj->setTitle($answer['title']);
            $obj->setIsTheGoodAnswer($answer['isTheGoodAnswer']);
            $obj->setId_question($answer['id_question']);
            $result[] = $obj;
        }

        return $result;
    }

        /**
     * Recupère les infos d'une question via son id
     * @param int $id
     * 
     * @return Answer
     */
    public function get(int $id) : Answer
    {
        $sql = "SELECT * FROM answer WHERE id = :id";
        $req = $this->getPdo()->prepare($sql);
        $req->execute(compact('id'));
        $result = $req->fetch(PDO::FETCH_ASSOC);
        
        $answer = (new Answer())->hydrate($result);

        return $answer;
    }

    public function insert(string $title, int $id_question) : int
    {
        $sql = "INSERT INTO answer (title, id_question) VALUES (:title, :id_question)";
        $req = $this->getPdo()->prepare($sql);
        $req->execute([
            'title' => $title,
            'id_question' => $id_question
        ]);

        return $this->getPdo()->lastInsertId();
    }

    public function update(int $id, string $title, int $id_question)
    {
        $sql = "UPDATE answer SET title = :title, id_question = :id_question WHERE id = :id";
        $req = $this->getPdo()->prepare($sql);
        return $req->execute(compact('id','title', 'id_question'));
    }

    public function delete(int $id) : void
    {
        $sql = "DELETE FROM answer WHERE id = :id";
        $req = $this->getPdo()->prepare($sql);
        $req->execute(['id' => $id]);
    }
}