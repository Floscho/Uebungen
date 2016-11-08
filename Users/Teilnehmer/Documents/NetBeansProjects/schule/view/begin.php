<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SchülerVerwaltung</title>
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
        <!-- html5 + CSS 3 Template created by miss monorom  http://intensivstation.ch 2013 -->
        <link rel="stylesheet" href="./css/style.css" type="text/css" />
        <!-- by monorom -->

        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <script src="jquery.min.js" type="text/javascript"></script>
        <script src="mein_menu.js" type="text/javascript"></script>
        <script src="prefixfree.min.js" type="text/javascript"></script>
    </head>

    <body>
        <div id="container">
            <div id="top">
                <header>
                    <p>Schülerdatenbank</p>
                    <div class="menubutton"><a href="#"><img src="menu.png" alt=""></a></div>
                </header>


                <nav id="mainnav">

                    <ul>
                        <li><a href="index.php?navi=0" <?php
                            if($navigation == 0) { echo 'class="selected"'; }
                        ?> >Schüler neu</a></li>
                        <li><a href="index.php?navi=1" <?php
                            if($navigation == 1) { echo 'class="selected"'; }
                        ?> >Schüler anzeigen</a></li>
                        <li><a href="index.php?navi=2" <?php
                            if($navigation == 2) { echo 'class="selected"'; }
                        ?> >Suchen</a></li>
                        <li><a href="index.php?navi=3" <?php
                            if($navigation == 3) { echo 'class="selected"'; }
                        ?> >Klasse neu</a></li>
                        <li><a href="index.php?navi=4" <?php
                            if($navigation == 4) { echo 'class="selected"'; }
                        ?> >Klassen anzeigen</a></li>
                    </ul>
                </nav>
            </div>

           
            
                

            