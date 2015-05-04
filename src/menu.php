
<?php



function menu($page)
{


    ?>


    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle collapsed" aria-controls="navbar" aria-expanded="false"
                        data-target="#navbar" data-toggle="collapse" type="button">
        <span class="sr-only">
            Toggle navigation
        </span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="infos.php">CampFind</a>


            </div>


            <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 0.8px;">



                <ul class="nav navbar-nav">
                    <li <?php if ($page == 'index.php') echo 'class="active"' ?>><a href="index.php">Accueil</a></li>
                    <li <?php if ($page == 'catalogue.php') echo 'class="active"' ?>><a
                            href="catalogue.php">Catalogue</a></li>
                    <li <?php if ($page == 'reservation.php') echo 'class="active"' ?>><a href="reservation.php">Mes
                            Réservations</a>
                    </li>

                    <?php if ($_SESSION['admin'] == 1) {
                        if (($page == 'administration.php')) echo '<li class="active"> <a href="administration.php">Administration</a></li>';
                        else echo '<li> <a href="administration.php">Administration</a></li>';
                    }?>

                </ul>


                <ul class="nav navbar-nav navbar-right">
                    <li><a> Connecté en tant que: <?php echo $_SESSION['login']?> </a></li>
                    <li><a href="deco.php">Déconnexion</a></li>
                </ul>

            </div>
            <!--
    
            /.nav-collapse 
    
            -->
            
        </div>


    </nav>




<?php
}
?>