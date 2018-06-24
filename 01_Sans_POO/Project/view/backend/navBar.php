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
                    if (isset($_SESSION['id']) AND isset($_SESSION['login']))
                    {
                        echo 'Bonjour ' . $_SESSION['login'];
                    } ?> <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="index.php?action=out" method="post">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Deconnexion</button>
            </form>
            <form class="form-inline my-2 my-lg-0" action="index.php?action=adminView" method="post">
                <button class="btn btn-outline-success my-2 my-sm-0 active" type="submit">Vous êtes connecté</button>
            </form>
        </div>
    </nav>
    <!-- /.container -->
