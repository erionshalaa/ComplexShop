<?php
require_once('DB/contdbConnect.php');

if (!isset($_SESSION)) {
    session_start();
}

class crudContacts extends contdbConnect{

    private $idCF;
    private $emriCF;
    private $emailCF;
    private $subjektiCF;
    private $mesazhiCF;
    private $dbConn;

    public function __construct($idCF='',$emriCF='',$emailCF='',$subjektiCF='',$mesazhiCF='')
    {
        $this->idCF = $idCF;
        $this->emriCF = $emriCF;
        $this->emailCF = $emailCF;
        $this->subjektiCF = $subjektiCF;
        $this->mesazhiCF= $mesazhiCF;

        $this->dbConn = $this->connDB();
    }
    
    public function setId($idCF){
        $this->idCF = $idCF;
    }
    public function getId(){
        return $this->idCF;
    }
   
    public function getEmri(){
        return $this->emriCF;
    }public function setEmri($emriCF){
        $this->emriCF = $emriCF;
    }
    public function getEmail(){
        return $this->emailCF;
    }public function setEmail($emailCF){
        $this->emailCF = $emailCF;
    }
    public function getSubjekti(){
        return $this->subjektiCF;
    }public function setSubjekti($subjektiCF){
        $this->subjektiCF = $subjektiCF;
    }
    public function getMesazhi(){
        return $this->mesazhiCF;
    }public function setMesazhi($mesazhiCF){
        $this->mesazhiCF = $mesazhiCF;
    }
    
    

    public function insertoMesazhet(){
        try{
            $sql = "INSERT INTO mesazhet(emriCF,emailCF,subjektiCF,mesazhiCF) value(?,?,?,?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->emriCF,$this->emailCF,$this->subjektiCF,$this->mesazhiCF]);
            $_SESSION['regMeSukses'] = true;
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
    public function shfaqMesazhinSipasID(){
        try{
            $sql = "SELECT * FROM mesazhet WHERE idCF=?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();
            $dhenat = $stm->fetchAll();
            return $dhenat;

            
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
    public function fshijMesazhinSipasID()
    {
        try {
            $produkti = $this->shfaqMesazhinSipasID();
            

            $sql = "DELETE FROM mesazhet WHERE idCF = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->idCF]);

            $_SESSION['mesazhiFshirjesMeSukses'] = true;
            echo '<script>document.location="dashboard.php"</script>';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function lexoMesazhet(){
        try{
            $sql = "SELECT * FROM mesazhet";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();
            $dhenat = $stm->fetchAll();
            return $dhenat;

            
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
}
?>