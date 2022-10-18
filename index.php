<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hello, world</title>
        <link rel="stylesheet" type="text/css" href="./css/mainstyle.css" />
    </head>
    <body>

        <nav>
                <a href="">
                    <h1>My Recycling Week</h1>
                </a>
        </nav>

        <div id="hero">
            <h2>Welcome to My Recycling Week</h2>
            <p>The purpose of this website is to remind myself of what colour recycling week it is in my street.</p>
            <p>This is a personal website for myself, so it may be different for your street. </p>
        </div>

        <?php
        
            require_once("./php/generateYear.php");

            $year = date("Y");

            //  Generates the HTML tables.
            GenerateTables($year);

        ?>

        <footer>
                <p>&copy; 2022 </p>
        </footer>

    </body>
</html>
