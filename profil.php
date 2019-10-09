<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=espace_membre', 'root', '');

if(isset($_GET['id']) AND $_GET['id'] > 0) {
   $getid = intval($_GET['id']);
   $requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
   $requser->execute(array($getid));
   $userinfo = $requser->fetch();
?>
<html>
   <head>
      <title>Page de profil</title>
      <meta charset="utf-8">
       <link rel="stylesheet" type="text/css" href="profilstyle.css"/>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   </head>
   <body>

<!--  JQuery  -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
       
<div class="profile">
    <div class="photo">
<?php
    if(!empty($userinfo['avatar']))
    {
        ?>
        <img src="Everybody/membres/avatars/<?php echo $userinfo['avatar']; ?>"/>
        <?php
    }
    ?>
    
    
    </div>
  <div class="content">
    <div class="text">
              <h3><?php echo $userinfo['pseudo']; ?></h3>
      <h6>Créateur de contenu</h6>
        <h6>mail : <?php echo $userinfo['mail']; ?></h6>
    </div>
    <div class="btn"><span></span></div>
  </div>
  <div class="box"><i class="fa fa-codepen"></i><i class="fa fa-facebook"></i><i class="fa fa-github"></i><i class="fa fa-tumblr"></i><i class="fa fa-twitter"></i></div>
</div>
                <a href="editionprofil.php">Editer mon profil</a>
         <a href="deconnexion.php">Se déconnecter</a>
              <script src="profiljs.js"type="text/javascript" ></script>
   </body>
</html>
<?php   
}
?>