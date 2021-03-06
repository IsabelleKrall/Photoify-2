<?php
declare(strict_types=1);
require __DIR__.'/views/header.php';


if(isset($_SESSION['message'])) {
    echo ($_SESSION['message'][0]);
    unset($_SESSION['message']);
}
?>
<div class="container-profile">

<article>
    <h1>Profile</h1>
    <!--- welcome text for the user <!---->
    <?php if (isset($_SESSION['user'])): ?>
        <p>Welcome, <?php echo $_SESSION['user']['name']; ?>!</p>
    <?php endif; ?>
</article>


<div>
    <?php if (file_exists(__DIR__.'/views/img')): ?>
        <img src="/views/img/<?= $_SESSION['logedin']['profile_pic'];?>" alt="profile" class="profile">
    <?php endif; ?>
</div> <br>

<form action="/views/profile.php" method="post" enctype="multipart/form-data">
        <div>
         <label for="image"><b>Please choose a profile image</b></label> <br>
    <input type="file" name="profile_pic" id="image" accept=".jpg", ".jpeg", ".png" required>

    </div>

    <button class="profile-btn" type="submit" name ="submit">Upload profilepic</button>
</form><br>

<div class="bio">
    <form action="/app/users/bio.php" method="post" enctype="multipart/form-data">
        <div class="bio">
            <p><b>User name: </b><br><?php echo $_SESSION['logedin']['username']; ?></p>
            <p><b>Name: </b> <br><?php echo $_SESSION['logedin']['name'] ; ?></p></div>
            <p><b>Say something about yourself:</b><br> <?php echo $_SESSION['logedin']['profile_bio']; ?></p>
            <label for="profile_bio"></label>
            <textarea class="form-control" type="profile_bio" name="profile_bio" id="profile_bio" rows="8" cols="40"></textarea>

    </div> <br>

    <button class="profile-btn" type="submit">Update Bio</button><br><br>
</form>
</div>

<?php require __DIR__.'/views/footer.php'; ?>
