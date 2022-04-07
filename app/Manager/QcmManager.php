<?php

require '../app/Entity/QCM.php';
require_once '../app/Manager/Manager.php';

class QcmManager extends Manager
{

    public function getAll()
    {
        $sql = 'SELECT * FROM qcm';
        $req = $this->getPdo()->prepare($sql);
        $req->execute();
        $qcms = $req->fetchAll(PDO::FETCH_ASSOC);
        $result = [];
        foreach($qcms as $qcm)
        {
            $result[] = (new QCM())->hydrate($qcm);
        }

        return $result;
    }

        /**
     * Recupère les infos d'un QCM via son id
     * @param int $id
     * 
     * @return QCM
     */
    public function get(int $id) : QCM
    {
        $sql = "SELECT * FROM qcm WHERE id = :id";
        $req = $this->getPdo()->prepare($sql);
        $req->execute(compact('id'));
        $result = $req->fetch(PDO::FETCH_ASSOC);
        
        $qcm = (new QCM())->hydrate($result);

        return $qcm;
    }

    public function insert(string $title) : int
    {
        $sql = "INSERT INTO qcm (title) VALUES (:title)";
        $req = $this->getPdo()->prepare($sql);
        $req->execute([
            'title' => $title,
        ]);

        return $this->getPdo()->lastInsertId();
    }

    public function update(int $id, string $title)
    {
        $sql = "UPDATE qcm SET title = :title WHERE id = :id";
        $req = $this->getPdo()->prepare($sql);
        return $req->execute(compact('id','title'));
    }

    public function delete(int $id) : void
    {
        $sql = "DELETE FROM qcm WHERE id = :id";
        $req = $this->getPdo()->prepare($sql);
        $req->execute(['id' => $id]);
    }
}