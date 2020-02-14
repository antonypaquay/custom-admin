<?php session_start(); ?>
<?php include 'layout/head.php'?>
<?php include 'layout/encryption.php'; ?>

<?php 
    $username = $_SESSION['username'];
    $password_client = $_SESSION['password_from_client'];
    $password_db = $_SESSION['password_from_db'];
    if ($password_client == $password_db){
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

<?php include 'layout/end.php'?>
