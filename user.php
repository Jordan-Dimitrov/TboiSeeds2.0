<?php
require "db.php";
class user
{
    //fields which hold data from a post request
    private $name;
    private $password;
    //giving value to those fields
    function __construct(){
        $this->name = isset($_POST['name']) ? $_POST['name'] : null;
        $this->password = isset($_POST['pass']) ? $_POST['pass'] : null;
    }
    //function to register new user
    public function Register()
    {
        //establishes connection with the database and checks if the country from the post request exists
        $db = new db();
        //Insert a user into database
                //Checks if id is chosen and if all of the entries are correct
                $sum = $this->Exists($this->name);
                if($sum==0){
                    if (strlen($this->name) >= 6 && !empty($this->name) && strlen($this->password) >= 8 && !empty($this->password)) {
                        $params = [$this->name, $this->password];
                        $db->INSERT("users", "(username, password) VALUES (?,?)", $params);
                    }
                }
        header("Location:login.php");
    }
    //function to get a specific user
    public function ReadDetails($name){
        $dbh = new db();
        $params = [$name];
        $users = $dbh->FETCH('seeds', 'WHERE idSeeds = ?', $params);
        return $users;
    }
    public function ReadMySeeds($id){
        $dbh = new db();
        $params = [$id];
        $users = $dbh->FETCH_ALL('seeds', 'WHERE users_idUsers = ?', $params);
        return $users;
    }
    public function Exists($name){
        $dbh = new db();
        $count = 0;
        $params = [$name];
        $users = $dbh->FETCH_All('users', 'WHERE username = ?', $params);
        foreach ($users as $user){
            $count++;
        }
        return $count;
    }
    //function to delete specific user
    public function DeleteUser($personid){
        $dbh = new db();
        $dbh->DELETE("users","WHERE idUsers = ?", $personid);
    }
    //function to count all the users
    public function Count(){
        $dbh = new db();
        $count = 0;
        $users = $dbh->FETCH_ALL('users');
        foreach ($users as $user){
            $count++;
        }
        return $count;
    }
    public function CountSeeds(){
        $dbh = new db();
        $count = 0;
        $users = $dbh->FETCH_ALL('seeds');
        foreach ($users as $user){
            $count++;
        }
        return $count;
    }
    public function Sum($seed){
        $checksum = 0;
        while(true){
            $checksum = ($checksum + ($seed & 0xFF)) & 0xFF;
            $checksum = (2 * $checksum + ($checksum >> 7)) & 0xFF;
            $seed >>= 5;
            if($seed==0){
                break;
            }
        }
        return $checksum;
    }
    public function AllSeeds(){
        $dbh = new db();
        $users = $dbh->FETCH_ALL('seeds');
        return $users;
    }
    public function makeSeed(){
        $seed = rand(1, 4294967295);
        $checksum = $this->Sum($seed);
        $abc = "ABCDEFGHJKLMNPQRSTWXYZ01234V6789";
        $seedsprev = (($seed ^ 0xFEF7FFD) << 8) | $checksum;
        $finalseed = "";
        for ($i=0;$i<8;$i++){
            $finalseed = $abc[$seedsprev & 0x1F].$finalseed;
            $seedsprev >>= 5;
        }
        return $finalseed;
    }
    //function to get all the users
    public function ReadAllUsers(){
        $dbh = new db();
        $users = $dbh->FETCH_ALL('users');
        return $users;
    }
    public function ReadUser($id){
        $dbh = new db();
        $users = $dbh->FETCH('users', 'WHERE idUsers = ?', [$id]);
        return $users;
    }
    public function Login(){
        session_start();
        $_SESSION['name'] = "";
        $_SESSION['id'] = "";
        $username = isset($_POST['username']) ? $_POST['username'] : null;
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $users = $this->ReadAllUsers();
        $id = 0;
        $found = false;
        foreach ($users as $user){
            if ($user->username==$username){
                if ($user->password==$password){
                    $found = true;
                    $id = $user->idUsers;
                }
            }
        }
        if ($found){
            $_SESSION['name'] = $username;
            $_SESSION['id'] = $id;
        }
        header("Location:home.php");
    }
    public function AddSeed(){
        session_start();
        $seed = isset($_POST['seed']) ? $_POST['seed'] : null;
        $character = isset($_POST['character']) ? $_POST['character'] : null;
        $description = isset($_POST['description']) ? $_POST['description'] : null;
        $idd = $_SESSION['id'];
        $seedd = strtoupper($seed);
        $found = false;
        $users = $this->AllSeeds();
        if (isset($_POST['tainted'])){
            $character = "Tainted_". $character;
        }
        foreach ($users as $user){
            if ($user->seed==$seed){
                $found = true;
            }
        }
        if (!$found){
           $dbh = new db();
            $params = [$seedd, $character, $idd, $description];
            $dbh->INSERT("seeds", "(seed, characterr, users_idUsers, description) VALUES (?,?,?,?)", $params);
        }
        header("Location:my.php");
    }
}
//creating a user and checking if there is a post request
$register = new user();
if (!empty($_POST)){
    if (!empty($_POST['username'])&&!empty($_POST['password'])){
        $register->Login();
    }else if(!empty($_POST['name'])&&!empty($_POST['pass'])){
        $register->Register();
    }else{
        $register->AddSeed();
    }
}