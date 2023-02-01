# Drop_Shipping_Website
Runs index.php locally.
parser.py goes through the list of links to Walgreens and Riteaid website product pages and webscrapes the page for product name, image, price, and description.
The webscraped information is stored in an SQL database every 6 hours which is automated by the products.sh script. 
The product are then shown on the website and the customer will be shown a similar item from the competing store when selecting a product to buy.
