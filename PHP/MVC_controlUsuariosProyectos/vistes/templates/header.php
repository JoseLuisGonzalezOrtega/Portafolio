<html>
    <head>
        <title>MVC</title>
    </head>
    <body>
        <nav>
            <ul>
                <li>
                    <a href="index.php">Home       
                    </a>
                </li>
                <li>
                    <a href="index.php?control=controlusuaris">Usuaris      
                    </a>
                </li>
                <li>
                    <a href="index.php?control=controlprojectes"">Projectes       
                    </a>
                </li>
                <?php if (isset($_SESSION['username'])) { ?>
                    <li>
                        <a href="index.php?control=controllogin&operacio=logout">Logout       
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>

