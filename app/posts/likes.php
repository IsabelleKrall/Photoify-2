<?php
declare(strict_types=1);
require __DIR__.'/../autoload.php';
// In this file we delete posts in the database.

if (isset($_GET['likes'], $_GET['post_id'])) {
    $post_id = $_GET['post_id'];
    $user_id = $_SESSION['logedin']['user_id'];

    if ($_GET['likes'] === 'like') {

        $statement = $pdo->prepare('INSERT INTO likes (user_id, post_id) VALUES (:user_id,:post_id);');

        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }


        $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $statement->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $statement->execute();

        redirect('/profile.php');
        exit();

    } elseif ($_GET['likes'] === 'dislike') {
        $statement = $pdo->query("DELETE FROM likes WHERE post_id = '$post_id' AND user_id = '$user_id';");
        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }
        redirect('/profile.php');
        exit();
    } else {
        redirect('/profile.php');
    }
} else {
    redirect('/profile.php');
}
