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

    </style>
</head>
<body>
    <header>
        <h1>Hwa's Online Store</h1>
    </header>
    <h1>Your Order Has Been Processed</h1>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"]; 
            $billing = $_POST["billing"]; 
            $card = $_POST["card"];
            $ccv = $_POST["ccv"];
            $expire = $_POST["expire"];
            $shipping = $_POST["shipping"];
            
            $cnx = new mysqli('localhost', 'hwa', 'milktea123', 'SHOP');
            if ($cnx->connect_error) 
                die('Connection failed: ' . $cnx->connect_error);
            $query = "INSERT INTO buy (Name, Billing, Card, CCV, Expire, Shipping) VALUES ('" . $name . "', '" . $billing . "', '" . $card . "', '" . $ccv . "', '" . $expire . "', '" . $shipping . "')";
            $cursor = $cnx->query($query);
            $cnx->close();
        }
    ?>
    <a href="http://localhost/index.php">Home Page</a>
</body>
</html>
