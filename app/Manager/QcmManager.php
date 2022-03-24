<?php 

require '../app/Entity/QCM.php';

class QcmManager {
    private $pdo;

    public function __construct(){
        try{
            $this->pdo = new PDO('mysql:host=localhost;dbname=my_qcm_generator', 'root');
        }
        catch(PDOException $e){
            echo 'Error : ' . $e->getMessage();
            die;
        }
    }

    public function getALL(){
        $req=$this->pdo->prepare('SELECT * FROM qcm');
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);

        $qcms = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach($qcms as $qcm){
            $obj = new QCM();
        }
    }
}

?>