<html>
<head>
    <meta charset="UTF-8" />
    <title>Hwa's Online Store</title>
    <style>
        header {
            border-bottom: 3px solid pink;
            padding: 1.6em 30px 1em 30px;
            float: center;
            background-color: #FFE1DA;
            height: 5.8em;
        }
        header h1 {
            font-size: 180%;
            padding-top: 8px;
            padding-bottom: 0px;
            height: .7em;
            text-align: center;
        }
        body {
            font-family:'Gill Sans', 'Gill Sans MT', 'Calibri', 'Trebuchet MS', sans-serif; 
            font-size: 100%;background-color: whitesmoke;
            margin: 0;
            padding: 0;
        }
        h1   {font-size: 150%;}
        .items {
            padding: 1em 1em 1em 1em;
        }
        .card {
            border: 3px solid pink;
            padding: 2em 1em 1em 1em;
            float: left;
            width: 425px;
            height: 300px;
            background-color: white;
            margin: 3em 3em 3em 3em;
        }
        .card img{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        .card h5{
            padding-right: 1em;
            padding-left: 1em;
            text-align: center;
        }
        .card a{
            padding-right: 12em;
            padding-left: 12em;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Hwa's Online Store</h1>
    </header>
    <main>
        <div class="items">
            <?php
                $cnx = new mysqli('localhost', 'hwa', 'milktea123', 'SHOP');

                if ($cnx->connect_error)
                    die('Connection failed: ' . $cnx->connect_error);

                $query = 'SELECT * FROM riteaid';
                $cursor = $cnx->query($query);
                while ($row = $cursor->fetch_assoc()) {
                    echo '<div class="card">';
                    echo '<img src="' . $row['RemoteImage'] . '" height="200"/>';
                    echo '<h5>' . $row['Name'] . '</h5>';
                    echo '<a href="http://localhost/compare.php?subject=riteaid&var=' . $row['ID'] . '"><button>Buy</button></a>';
                    echo '</div>';
                }

                $cnx->close();

                $cnx = new mysqli('localhost', 'hwa', 'milktea123', 'SHOP');

                if ($cnx->connect_error)
                    die('Connection failed: ' . $cnx->connect_error);

                $query = 'SELECT * FROM walgreens';
                $cursor = $cnx->query($query);
                while ($row = $cursor->fetch_assoc()) {
                    echo '<div class="card">';
                    echo '<img src="' . $row['RemoteImage'] . '" height="200"/>';
                    echo '<h5>' . $row['Name'] . '</h5>';
                    echo '<a href="http://localhost/compare.php?subject=walgreens&var=' . $row['ID'] . '"><button>Buy</button></a>';
                    echo '</div>';
                }

                $cnx->close();

            ?>
        </div>
    </main>
</body>

</html>
