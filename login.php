<?php session_start(); ?>
<?php include 'layout/head.php'?>
<?php include 'layout/encryption.php'; ?>

    <?php

        $user = htmlspecialchars($_POST['user']);
        $_SESSION['username'] =  $user;
        $password = htmlspecialchars($_POST['password']);

        function login($check_user, $check_pwd)
        {
            if ($check_user == 'antony') {

                if ($check_pwd == 'P@689n@hkpn355H8') {
                    header("Location: ./dashboard.php?key=" . crypt_key("$check_pwd", 'e'), true, 301);
                    exit();
                } else {
                    $back_address = 'index.php';
                    echo '<h3>Wrong password</h3>';
                    echo "<a class='".button__submit."' href='".$back_address."'>Try again</a>";
                }

            } else {
                echo "<h3>Access denied</h3>";
            }

        }

        // launch
        login($user, $password);

    ?>



<?php include 'layout/end.php'?>

