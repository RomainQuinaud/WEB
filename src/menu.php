
<?php

function menu($page)
{
?>


<div class="navbar navbar-inverse navbar-fixed-top">

    <div class="container">

        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">

                <span class="sr-only">Toggle navigation</span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

                <span class="icon-bar"></span>

            </button>

            <a class="navbar-brand" href="infos.php">Camping Paradis</a>

        </div>


        <div id="navbar" class="collapse navbar-collapse">

            <ul class="nav navbar-nav">

                <li <?php if($page=='index.php') echo 'class="active"' ?>><a href="index.php">Accueil</a></li>

                <li <?php if($page=='reservation.php') echo 'class="active"' ?>><a href="reservation.php">Réservation</a></li>

            </ul>

            <ul class="nav navbar-nav navbar-right">

                <div class="nav navbar-nav">
                    <li class="text-center-vertical">Connecté sous le login
                    </li
                        <!--TODO Ajouter le php avec la requete sql pour affiché le login correspondant a la personne connecté -->
                <li><a href="deco.php">Déconnexion</a></li>
                </div>


            </ul>

        </div><!--/.nav-collapse -->

    </div>

</div>
<?php
}
?>