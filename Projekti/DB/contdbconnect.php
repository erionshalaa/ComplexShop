<?php



class contdbConnect{
    private $conn =null;
    private $host = 'localhost';
    private $dbname = 'kontaktetdb';
    private $username = 'root';
    private $password = '';
    public function connDB(){
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname",
            $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION) . "<br/>";
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC) . "<br/>";
            } catch (PDOException $pdoe) {
            die("Nuk mund të lidhej me bazën e të dhënave {$this->dbname} :" . $pdoe->getMessage());
            }
     return $this->conn;
    }
}

?>