<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include("logowanie-rejestracja.php");
if(isset($_POST['register'])){
                    
    $reglogin=$_POST["reglogin"];
	$regpasswd=$_POST["regpasswd"];
    $confirmpasswd=$_POST["confirmpasswd"];

	if ($conn){
        try{
	    $res1=mysqli_query($conn, "SELECT * FROM `users` WHERE `login`='$reglogin' ");
        }catch(mysqli_sql_exception){
            $res1=false;
        }
        if($res1){
		$res2=mysqli_query($conn, "SELECT * FROM `users`");	
	
	    if (mysqli_num_rows($res1) > 0){
	    	$_SESSION['zarejestrowany'] = 0;
	    }else{
            if($regpasswd == $confirmpasswd){
            if(mysqli_num_rows($res2) <= 0){
                $hashed_password = password_hash($regpasswd, PASSWORD_DEFAULT);
                mysqli_query($conn, "INSERT INTO `users` (`rola`, `login`, `passwd`) VALUES ('3','$reglogin','$hashed_password')");
                $_SESSION['zarejestrowany'] = 1;
            }else{
                $hashed_password = password_hash($regpasswd, PASSWORD_DEFAULT);
                mysqli_query($conn, "INSERT INTO `users` (`rola`, `login`, `passwd`) VALUES ('1','$reglogin','$hashed_password')");
		     	$_SESSION['zarejestrowany'] = 2;
            }
         }else{
            $_SESSION['zarejestrowany'] = -3;
         }
	    }
        }else{
            $_SESSION['zarejestrowany'] = -2;
        }
	}
    $_SESSION['wyslano'] = true;
    header("Location: /pkp-info/logreg/logowanie-rejestracja.php");
    exit();
}
if (isset($_POST["loginbutt"])){
    $login=$_POST["login"];
    $passwd=$_POST["passwd"];
    
    if ($conn){
        try{
        $res=mysqli_query($conn, "SELECT * FROM `users` WHERE `login`='$login'");
        }catch(mysqli_sql_exception){
            $res = false;
        }          
        if($res){
        //jezeli baza zwroci wynik tzn, ze uzytkownik istnieje
        if (mysqli_num_rows($res) > 0){
            $row = mysqli_fetch_assoc($res);
            //weryfikacja hasła
            if (password_verify($passwd, $row['passwd'])) {
                $roleresult=mysqli_query($conn, "SELECT `rola` FROM `users` WHERE `login`='$login'");
                $row=mysqli_fetch_assoc($roleresult);
                $_SESSION["role"]=$row["rola"];
                $_SESSION["zalogowany"]=1;
                $_SESSION["twojLogin"]=$login;
            } else {
                $_SESSION["zalogowany"] = 0;
            }
        }else{
            $_SESSION["zalogowany"] = 0;
        }   
        }else{
            $_SESSION['zalogowany'] = -2;
        }
    }
    $_SESSION['sprawdzono'] = true;
    header("Location: /pkp-info/logreg/logowanie-rejestracja.php");
    exit();
}
header("Location: /pkp-info/logreg/logowanie-rejestracja.php");
?>