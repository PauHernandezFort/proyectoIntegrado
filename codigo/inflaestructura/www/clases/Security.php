<?php
class Security extends Connection
{
    private $loginPage = "login.php";
    private $homePage = "home.php";
    private $registerPage="singUp.php";
    public function __construct()
    {
        parent::__construct();
        session_start();
    }

    public function checkLoggedIn()
    {
        if (!isset($_SESSION["loggedIn"]) || !$_SESSION["loggedIn"]) {
            header("Location: " . $this->loginPage);
        }
    }

public function singUp(){
     if (count($_POST) > 0) {
         $name = $_POST["userName"]; 
         $password = $_POST["userPassword"];
         $email = $_POST["email"];
         $securePassword= password_hash($password, PASSWORD_DEFAULT);
         $sql = "INSERT INTO `Cuenta`(`correo`, `contraseña`, `nombre`) VALUES ('$email','$securePassword','$name')";
         $result = $this->conn->query($sql);
 
     }
     }

     public function doLogin()
     {
         if (count($_POST) > 0) {
             $user = $this->getUser($_POST["email"]);
             $_SESSION["loggedIn"] = $this->checkUser($user, $_POST["userPassword"]) ? $user["correo"] : false;
             if ($_SESSION["loggedIn"]) {
                 header("Location: " . $this->homePage);
             } else {
                 echo"Incorrect email or Password";
             }
         } else {
             return null;
         }
     }
     private function checkUser($user, $userPassword)
     {
         if ($user) {    
             return $this->checkPassword($user["contraseña"], $userPassword);
         } else {
             return false;
         }
     }
     private function getUser($email)
     {
         $sql = "SELECT * FROM Cuenta WHERE correo = '$email'";
         $result = $this->conn->query($sql);
         if ($result->num_rows > 0) {
             return $result->fetch_assoc();
         } else {
             return false;
         }
     }

     private function checkPassword($securePassword, $userPassword)
     {
         return password_verify($userPassword, $securePassword);

     }
    
    }

     ?>