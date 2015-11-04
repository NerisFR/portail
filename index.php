<?php
session_start();
if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['pass'])){
    extract($_POST);
    $pass = md5($pass);
    mysql_connect("localhost","root","");
    mysql_select_db("portail");
    $sql = "SELECT users.id FROM users WHERE (((users.login)='".$login."') AND ((users.password)='".$pass."'))";

//    $sql = " SELECT id, admin, nom_usage FROM collaborateurs WHERE login='$login' AND password= '$pass'";
    $req = mysql_query($sql) or die(mysql_error());
    $tableau = mysql_fetch_array($req,MYSQL_ASSOC);
    if(mysql_num_rows($req)>0){
        $_SESSION['auth']=array(
            'login' => $login,
            'pass' => $pass,
            'myid' => $tableau['id']
          );
        $myid = $_SESSION['auth']['myid'];
        // $loggon = date("Y-m-d H:i:s");
        // $req_send = "INSERT INTO loggin(id, date_connect, id_collab) VALUES ('','$loggon','$myid')";
        // $req = mysql_query($req_send) or die(mysql_error());
          header('Location:app.php');
        }
        else {
          echo "Mauvais identifiant";
        }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIREN by NERIS</title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/icheck/flat/green.css" rel="stylesheet">


    <script src="js/jquery.min.js"></script>

    <!--CDN link for the latest TweenMax-->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    <script type="text/javascript">
        var element = $('.login_content');
        var tl = new TimelineLite();
        tl.to(element, 1, {ScaleX: 400})
        .from(element.find('h1'),0.3, {autoAlpha:0,ScaleX:0})

    </script>
    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>

<body style="background:#F7F7F7;">
    
    <div class="">
        <a class="hiddenanchor" id="toregister"></a>
        <a class="hiddenanchor" id="tologin"></a>

        <div id="wrapper">
            <div id="login" class="animate form">
                <section class="login_content">
                    <form id="form1" name="form1" method="post" action="">
                        <h1>Connection</h1>
                        <div>
                            <input type="text" class="form-control" name="login" placeholder="Nom d'utilisateur" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="pass" placeholder="Mot de passe" required="" />
                        </div>
                        <div>
                            <button class="btn btn-default submit" style="color:#5a738e">Connecter</button>
                            <a class="reset_pass" style="color:#5a738e" href="#">Mot de passe oublié?</a>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
            <div id="register" class="animate form">
                <section class="login_content">
                    <form>
                        <h1>Create Account</h1>
                        <div>
                            <input type="text" class="form-control" placeholder="Username" required="" />
                        </div>
                        <div>
                            <input type="email" class="form-control" placeholder="Email" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Password" required="" />
                        </div>
                        <div>
                            <a class="btn btn-default submit" href="index.html">Submit</a>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">

                            <p class="change_link">Already a member ?
                                <a href="#tologin" class="to_register"> Log in </a>
                            </p>
                            <div class="clearfix"></div>
                            <br />
                            <div>
                                <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Gentelella Alela!</h1>

                                <p>©2015 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                    <!-- form -->
                </section>
                <!-- content -->
            </div>
        </div>
    </div>

</body>

</html>