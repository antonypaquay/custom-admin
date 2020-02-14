<?php session_start();?>
<?php include 'layout/head.php'?>
<?php include 'layout/encryption.php';?>

<?php

// connect to database
try {
    $bdd = new PDO('mysql:host=localhost;dbname=antony;charset=utf8', 'root', 'root');
} 
// return message in case of error
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

?>

<?php


//get data entered by the user
$user = htmlspecialchars($_POST['user']);
$password = htmlspecialchars($_POST['password']);


// check if the user input contain something
if (isset($user)) {
    $reponse = $bdd->query("SELECT * FROM users WHERE user_name = '$user' ");
    while ($donnees = $reponse->fetch()) {
        $user_find = $donnees['user_name'];
        $password_associate = crypt_key($donnees['user_password'], 'd');
    }
    $reponse->closeCursor();
} else {
    echo "Cannot found this user";
}

function login($user_entered_by_the_user, $password_entered_by_the_user, $password_from_the_db)
{

    if ($password_entered_by_the_user == $password_from_the_db) {
        header("Location: ./dashboard.php", true, 301);
        // add to the session
        $_SESSION['username'] =  $user_entered_by_the_user;
        $_SESSION['password_from_client'] = $password_entered_by_the_user;
        $_SESSION['password_from_db'] = $password_from_the_db;
        exit();
    } else {
        $back_address = 'index.php';
        echo '<h3>Wrong password</h3>';
        echo "<a class='" . button__submit . "' href='" . $back_address . "'>Try again</a>";
    }

}

//launch
login($user_find, $password, $password_associate);

?>


<?php include 'layout/end.php'?>

