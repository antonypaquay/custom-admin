<?php session_start(); ?>
<?php include 'layout/head.php'?>
<?php include 'layout/encryption.php'; ?>


<?php 
    $username = $_SESSION['username'];
    $key = crypt_key($_SESSION['password'], 'd');
    if ($key == 'P@689n@hkpn355H8'){
?>
    <h1>Admin</h1>
    <h3>Hello <?php echo $username ?></h3>
    <ul>
        <li>file</li>
        <li>file</li>
        <li>file</li>
        <li>file</li>
        <li>file</li>
    </ul>
<?php 
    } else {
        echo "<h3>Access denied</h3>";
    }
?>


<?php var_dump($_SESSION) ?>
<?php include 'layout/end.php'?>
