<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo TITLE_FOR_LAYOUT; ?></title>
    <base href="http://localhost:8888/3ADEV/PHP/OBJET/mvc/">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href='posts/home' class="navbar-brand" href="#">Blog</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <?php
            if (!isset($_SESSION['user_login'])) {
                ?>

                <a class="navbar-form navbar-right" href="?module=users&amp;action=inscription">
                    <button class="btn btn-primary">inscription</button>
                </a>

                <form method="post" class="navbar-form navbar-right" action="?module=users&amp;action=connect">
                    <div class="form-group">
                        <input type="text" name="login" placeholder="Email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">connexion</button>
                </form>

                <?php
            } else if (isset($_SESSION['user_login'])) { ?>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['user_login']; ?><span
                                    class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="?module=users&amp;action=disconnect">Deconnexion</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <?php
            }
            ?>

        </div><!--/.navbar-collapse -->
    </div>
</nav>
