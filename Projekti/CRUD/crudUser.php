<?php
require_once('DB/usersdbConnect.php');

if (!isset($_SESSION)) {
    session_start();
}

Class crudUser extends usersdbConnect{

    private $userid;
    private $userEmri;
    private $userMbiemri;
    private $userEmail;
    private $userPassword;
    private $userAccess;
    private $dbConn;

    public function __construct($userid='',$userEmri='',$userMbiemri='',$userEmail='',$userPassword='',$userAccess='')
    {
        $this->userid = $userid;
        $this->userEmri = $userEmri;
        $this->userMbiemri = $userMbiemri;
        $this->userEmail = $userEmail;
        $this->userPassword= $userPassword;
        $this->userAccess = $userAccess;

        $this->dbConn = $this->connDB();
    }
    
    public function setUserid($userid){
        $this->userid = $userid;
    }
    public function getUserid(){
        return $this->userid;
    }
   
    public function getUserEmri(){
        return $this->userEmri;
    }public function setUserEmri($userEmri){
        $this->userEmri = $userEmri;
    }
    public function getUserEmail(){
        return $this->userEmail;
    }public function setUserEmail($userEmail){
        $this->userEmail = $userEmail;
    }
    public function getUserMbiemri(){
        return $this->userMbiemri;
    }public function setUserMbiemri($userMbiemri){
        $this->userMbiemri = $userMbiemri;
    }
    public function getUserPassword(){
        return $this->userPassword;
    }public function setUserPassword($userPassword){
        $this->userPassword = $userPassword;
    }
    public function getUserAccess(){
        return $this->userAccess;
    }public function setUserAccess($userAccess){
        $this->userAccess = $userAccess;
    }
    
    

    public function insertoUserin(){
        try{
            $sql = "INSERT INTO users(userEmri,userMbiemri,userEmail,userPassword) value(?,?,?,?)";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->userEmri,$this->userMbiemri,$this->userEmail,$this->userPassword]);

            $_SESSION['regMeSukses'] = true;
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
    public function lexoUsers(){
        try{
            $sql = "SELECT * FROM users";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();
            $dhenat = $stm->fetchAll();
            return $dhenat;

            
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }
    public function lexoUsersSipasID(){
        try{
            $sql = "SELECT * FROM users WHERE userid=?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->userid]);
            $dhenat = $stm->fetchAll();
            return $dhenat;

            
        }
        catch(Exception $e){
            return $e->getMessage();
        }
    }

    
    public function kontrolloUser()
    {
        try {
            $sql = 'SELECT * from users WHERE userEmail = ?';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->userEmail]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function kontrolloLlogarin()
    {
        try {
            $sql = 'SELECT * from users WHERE userEmail = ? and userPassword = ?';
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->userEmail, $this->userPassword]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function changeRoleToAdmin()
    {
        try {
                $useri = $this->lexoUsersSipasID();
                
                $sql = "UPDATE users SET userAccess = 'admin' WHERE userid = ?";
                $stm = $this->dbConn->prepare($sql);
                $stm->execute([$this->userid]);
            echo '<script>document.location="dashboard.php"</script>';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function changeRoleToUser()
    {
        try {
            $useri = $this->lexoUsersSipasID();
            
            $sql = "UPDATE users SET userAccess = 'user' WHERE userid = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->userid]);
        echo '<script>document.location="dashboard.php"</script>';
    } catch (Exception $e) {
        return $e->getMessage();
    }
    }
    public function editoUserin()
    {
        try {
            
                $sql = "UPDATE `users` SET `userEmri`=?,`userMbiemri`=?,`userEmail`=?,`userAccess`=? WHERE userid = ?";
                $stm = $this->dbConn->prepare($sql);
                $stm->execute([ $this->userEmri, $this->userMbiemri, $this->userEmail, $this->userAccess, $this->userid]);
           
            $_SESSION['mesazhiMeSukses'] = true;
            echo '<script>document.location="UserProfile.php"</script>';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function perditesoFjalekalimin()
    {
        try {
            $sql = "UPDATE users set `userPassword` = ? where userid = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->userPassword, $this->userid]);
            echo '<script>document.location="UserProfile.php"</script>';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}


?>