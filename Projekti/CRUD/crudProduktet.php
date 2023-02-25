<?php
require_once('DB/produktetdbconnect.php');
if (!isset($_SESSION)) {
    session_start();
}
Class crudProduktet extends produktetdbconnect{

    private $id;
    private $emri;
    private $kategoria;
    private $cmimi;
    private $foto;
    private $pershkrimi;
    private $dbConn;

   public function __construct($id='',$emri='',$kategoria='',$cmimi='',$foto='',$pershkrimi=''){
        $this->id = $id;
        $this->emri = $emri;
        $this->kategoria = $kategoria;
        $this->cmimi = $cmimi;
        $this->foto = $foto;
        $this->pershkrimi = $pershkrimi;

        $this->dbConn = $this->connDB();
    }
    
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
   
    public function getEmri(){
        return $this->emri;
    }public function setEmri($emri){
        $this->emri = $emri;
    }
    public function getKategoria(){
        return $this->kategoria;
    }public function setKategoria($kategoria){
        $this->kategoria = $kategoria;
    }
    public function getCmimi(){
        return $this->cmimi;
    }public function setCmimi($cmimi){
        $this->cmimi = $cmimi;
    }
    public function getFoto(){
        return $this->foto;
    }public function setFoto($foto){
        $this->foto = $foto;
    }
    
    public function getPershkrimi(){
        return $this->pershkrimi;
    }public function setPershkrimi($pershkrimi){
        $this->pershkrimi = $pershkrimi;
    }
    
    

    public function insertoProduktin(){
        try{

            $this->setId($_SESSION['id']);
            $this->setEmri($_SESSION['emri']);
            $this->setKategoria($_SESSION['kategoria']);
            $this->setCmimi($_SESSION['cmimi']);
            $this->setFoto($_SESSION['foto']);
            $this->setPershkrimi($_SESSION['pershkrimi']);
            $sql = "INSERT INTO produktet(emri,kategoria,cmimi,foto,pershkrimi) value(?,?,?,?,?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->emri,$this->kategoria,$this->cmimi,$this->foto,$this->pershkrimi]);

            echo "<script>
            alert('Produkti u shtua me sukses');
            document.location='Dashboard.php';
            </script>";
            
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
    public function lexoProduktet(){
        try{
            $sql = "SELECT * FROM produktet";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();
            $dhenat = $stm->fetchAll();
            return $dhenat;

            
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }


    public function editoProduktin()
    {
        try {
            
                $this->setId($_SESSION['id']);
                $this->setEmri($_SESSION['emri']);
                $this->setKategoria($_SESSION['kategoria']);
                $this->setCmimi($_SESSION['cmimi']);
                $this->setFoto($_SESSION['foto']);
                $this->setPershkrimi($_SESSION['pershkrimi']);

                $sql = "UPDATE `produktet` SET `emri`=?,`kategoria`=?,`cmimi`=?,`foto`=?,`pershkrimi`=? WHERE id = ?";
                $stm = $this->dbConn->prepare($sql);
                $stm->execute([ $this->emri, $this->kategoria, $this->cmimi, $this->foto, $this->pershkrimi,$this->id]);
           
            $_SESSION['mesazhiMeSukses'] = true;
            echo '<script>document.location="dashboard.php"</script>';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
  
    


    public function fshijProduktinSipasID()
    {
        try {
            $produkti = $this->shfaqProduktinSipasID();
            

            $sql = "DELETE FROM produktet WHERE id = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->id]);

            $_SESSION['mesazhiFshirjesMeSukses'] = true;
            echo '<script>document.location="dashboard.php"</script>';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function shfaqTeGjithaProduktet()
    {
        try {
            $sql = "SELECT * FROM produktet ORDER BY id DESC  ";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function shfaqProduktinSipasID()
    {
        try {
            $sql = "SELECT * FROM produktet WHERE id = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->id]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
?>