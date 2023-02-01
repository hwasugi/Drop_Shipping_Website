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
            width: 500px;
            height: 800px;
            background-color: white;
            margin: 3em 3em 3em 3em;
        }
        .card img{
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
        .card h3{
            padding-right: 1em;
            padding-left: 1em;
            text-align: center;
        }
        .card h4{
            padding-right: 1em;
            padding-left: 1em;
            text-align: center;
        }
        .card a{
            padding-right: 15em;
            padding-left: 15em;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <h1>Hwa's Online Store</h1>
    </header>
    <?php 
        $cnx = new mysqli('localhost', 'hwa', 'milktea123', 'SHOP');

        if ($cnx->connect_error) 
            die('Connection failed: ' . $cnx->connect_error);
        if ($_GET['subject'] == 'walgreens') {
            $query = 'SELECT * FROM riteaid';
            $cursor = $cnx->query($query);
            while ($row = $cursor->fetch_assoc()) {
                if ($row['ID'] == intval($_GET['var'])) {
                    $price2 = round(($row['Price'] * 1.10), 2);
                }
            }

            $query = 'SELECT * FROM walgreens';
            $cursor = $cnx->query($query);
            while ($row = $cursor->fetch_assoc()) {
                if ($row['ID'] == intval($_GET['var'])) {
                    echo '<div class="card">';
                    echo '<img src="' . $row['RemoteImage'] . '" height="200"/>';
                    echo '<h3>' . $row['Name'] . '</h3>';
                    $price = round(($row['Price'] * 1.10), 2);
                    if ($price <= $price2) {
                        echo '<h4 style="color:blue;">Price: $' . $price . '</h4><br>';
                    }
                    else {
                        echo '<h4>Price: $' . $price . '</h4><br>';
                    }
                    echo '<a href="http://localhost/buy.php?subject=walgreens&var=' . $row['ID'] . '"><button>Buy</button></a>';
                    echo '<h4>Description:</h4>';
                    echo '<p>' . $row['Description'] . '</p>';
                    echo '<h4>Rating: ' . $row['Score'] . '</h4>';
                    echo '</div>';
                }
            }
            $query = 'SELECT * FROM riteaid';
            $cursor = $cnx->query($query);
            while ($row = $cursor->fetch_assoc()) {
                if ($row['ID'] == intval($_GET['var'])) {
                    echo '<div class="card">';
                    echo '<img src="' . $row['RemoteImage'] . '" height="200"/>';
                    echo '<h3>' . $row['Name'] . '</h3>';
                    if ($price2 < $price) {
                        echo '<h4 style="color:blue;">Price: $' . $price2 . '</h4><br>';
                    }
                    else {
                        echo '<h4>Price: $' . $price2 . '</h4><br>';
                    }
                    echo '<a href="http://localhost/buy.php?subject=riteaid&var=' . $row['ID'] . '"><button>Buy</button></a>';
                    echo '<h4>Description:</h4>';
                    echo '<p>' . $row['Description'] . '</p>';
                    echo '<h4>Rating: ' . $row['Score'] . '</h4>';
                    echo '</div>';
                }
                
            }
        }
        if ($_GET['subject'] == 'riteaid') {
            $query = 'SELECT * FROM walgreens';
            $cursor = $cnx->query($query);
            while ($row = $cursor->fetch_assoc()) {
                if ($row['ID'] == intval($_GET['var'])) {
                    $price2 = round(($row['Price'] * 1.10), 2);
                }
            }

            $query = 'SELECT * FROM riteaid';
            $cursor = $cnx->query($query);
            while ($row = $cursor->fetch_assoc()) {
                if ($row['ID'] == intval($_GET['var'])) {
                    echo '<div class="card">';
                    echo '<img src="' . $row['RemoteImage'] . '" height="200"/>';
                    echo '<h3>' . $row['Name'] . '</h3>';
                    $price = round(($row['Price'] * 1.10), 2);
                    if ($price <= $price2) {
                        echo '<h4 style="color:blue;">Price: $' . $price . '</h4><br>';
                    }
                    else {
                        echo '<h4>Price: $' . $price . '</h4><br>';
                    }
                    echo '<a href="http://localhost/buy.php?subject=riteaid&var=' . $row['ID'] . '"><button>Buy</button></a>';
                    echo '<h4>Description:</h4>';
                    echo '<p>' . $row['Description'] . '</p>';
                    echo '<h4>Rating: ' . $row['Score'] . '</h4>';
                    echo '</div>';
                }
            }
            $query = 'SELECT * FROM walgreens';
            $cursor = $cnx->query($query);
            while ($row = $cursor->fetch_assoc()) {
                if ($row['ID'] == intval($_GET['var'])) {
                    echo '<div class="card">';
                    echo '<img src="' . $row['RemoteImage'] . '" height="200"/>';
                    echo '<h3>' . $row['Name'] . '</h3>';
                    if ($price2 < $price) {
                        echo '<h4 style="color:blue;">Price: $' . $price2 . '</h4><br>';
                    }
                    else {
                        echo '<h4>Price: $' . $price2 . '</h4><br>';
                    }
                    echo '<a href="http://localhost/buy.php?subject=walgreens&var=' . $row['ID'] . '"><button>Buy</button></a>';
                    echo '<h4>Description:</h4>';
                    echo '<p>' . $row['Description'] . '</p>';
                    echo '<h4>Rating: ' . $row['Score'] . '</h4>';
                    echo '</div>';
                }
            }
        }
        $cnx->close();
        
    ?>
</body>
</html>