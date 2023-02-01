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
            $query = 'SELECT * FROM walgreens';
            $cursor = $cnx->query($query);
            while ($row = $cursor->fetch_assoc()) {
                if ($row['ID'] == intval($_GET['var'])) {
                    echo '<div class="card">';
                    echo '<img src="' . $row['RemoteImage'] . '" height="200"/>';
                    echo '<h3>' . $row['Name'] . '</h3>';
                    $price = round(($row['Price'] * 1.10), 2);
                    echo '<h4>' . $price . '</h4>';
                    echo '</div>'; 
                }
            }
        }
        if ($_GET['subject'] == 'riteaid') {
            $query = 'SELECT * FROM riteaid';
            $cursor = $cnx->query($query);
            while ($row = $cursor->fetch_assoc()) {
                if ($row['ID'] == intval($_GET['var'])) {
                    echo '<div class="card">';
                    echo '<img src="' . $row['RemoteImage'] . '" height="200"/>';
                    echo '<h3>' . $row['Name'] . '</h3>';
                    $price = round(($row['Price'] * 1.10), 2);
                    echo '<h4>' . $price . '</h4>';
                    echo '</div>'; 
                }
            }
        }
        $cnx->close();
    ?>
    <div class='card'>
        <form method="post" action="/billing.php">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name"><br><br>
            <label for="billing">Billing Address:</label>
            <input type="text" id="billing" name="billing"><br><br>
            <label for="card">Card Number:</label>
            <input type="text" id="card" name="card"><br><br>
            <label for="ccv">CCV:</label>
            <input type="text" id="ccv" name="ccv"><br><br>
            <label for="expire">Expiration Date:</label>
            <input type="text" id="expire" name="expire"><br><br>
            <label for="shipping">Shipping Address:</label>
            <input type="text" id="shipping" name="shipping"><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>