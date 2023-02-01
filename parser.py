import mysql.connector
import sys
import xml.dom.minidom

def insert(cursor, store, name, description, price, image, score):
    if (store == 'walgreens'):
        query = 'INSERT INTO walgreens(Name,Description,Price,RemoteImage,Score) VALUES (%s,%s,%s,%s,%s)'
        cursor.execute(query, (name,description,price,image,score))
    if (store == 'riteaid'):
        query = 'INSERT INTO riteaid(Name,Description,Price,RemoteImage,Score) VALUES (%s,%s,%s,%s,%s)'
        cursor.execute(query, (name,description,price,image,score))

document = xml.dom.minidom.parse(sys.argv[1])
if sys.argv[2] == "riteaid":
    divs = document.getElementsByTagName('div')
    for div in divs:
        if "page-title-wrapper product" in div.getAttribute("class"):
            for h1 in div.getElementsByTagName('h1'):
                for span in h1.getElementsByTagName('span'):
                    for node in span.childNodes:
                        if node.nodeType == node.TEXT_NODE:
                            name = node.nodeValue
        if "gallery-placeholder _block-content-loading" in div.getAttribute("class"):
            for img in div.getElementsByTagName('img'):
                image = img.getAttribute("src")
        if "product attribute description" in div.getAttribute("class"):
            for div2 in div.getElementsByTagName('div'):
                for p in div2.getElementsByTagName('p'):
                    for node in p.childNodes:
                        if node.nodeType == node.TEXT_NODE:
                            description = node.nodeValue
    for span in document.getElementsByTagName('span'):
        if "price-wrapper" in span.getAttribute("class"):
            for span2 in span.getElementsByTagName("span"):
                for node in span2.childNodes:
                    if node.nodeType == node.TEXT_NODE:
                        price2 = node.nodeValue
                        price = ''
                        for char in price2:
                            if char != '$':
                                price += char
else:
    for span in document.getElementsByTagName('span'):
        if "price__contain regular-price wag-cleareance-space" in span.getAttribute("class"):
            for span2 in span.getElementsByTagName('span'):
                if "product__price" in span2.getAttribute("class"):
                    for span3 in span2.getElementsByTagName('span'):
                        for node in span3.childNodes:
                            if node.nodeType == node.TEXT_NODE:
                                price = node.nodeValue
                                price += '.'
                    for sup in span2.getElementsByTagName('sup'):
                        for node in sup.childNodes:
                            if node.nodeType == node.TEXT_NODE:
                                if (node.nodeValue != '$'): 
                                    price += node.nodeValue
        if "wag-text-black pr10 wag-ounce-price product-span-style" in span.getAttribute("class"):
            for node in span.childNodes:
                if node.nodeType == node.TEXT_NODE:
                    name = node.nodeValue    
    for div in document.getElementsByTagName("div"):
        if "view-more-content__height wag-accordion-tab-content" in div.getAttribute("class"):
            for div2 in div.getElementsByTagName("div"):
                for node in div2.childNodes:
                    if node.nodeType == node.TEXT_NODE:
                        description = node.nodeValue 
    for img in document.getElementsByTagName("img"):
        if "productimage" in img.getAttribute("class"):
            image = img.getAttribute("src")
print(name)
price = float(price)
print(price)
print(description)
print(image)
score = 0

try:
    cnx = mysql.connector.connect(host='localhost', user='hwa', password='milktea123', database='SHOP')
    cursor = cnx.cursor()
    insert(cursor, sys.argv[2], name, description, price, image, score)
    cnx.commit()
    cursor.close()
except mysql.connector.Error as err:
    print(err)
finally:
    try:
        cnx
    except NameError:
        pass
    else:
        cnx.close()