    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">Mon Blog</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#"><?php 
                    if (isset($_SESSION['login']))
                    {
                        echo 'Bonjour ' . $_SESSION['login'];
                    } ?> <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    Vous êtes connecté
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="index.php?action=adminView" title="Page Administration">Page Administration</a></li>
                    <li><a href="index.php?action=out" title="Deconnexion">Deconnexion</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- /.container -->
