import mysql.connector
try:
    cnx = mysql.connector.connect(host='localhost', user='hwa', password='milktea123', database='SHOP')
    cursor = cnx.cursor()
    query = 'DELETE FROM riteaid'
    cursor.execute(query)
    query = 'DELETE FROM walgreens'
    cursor.execute(query)
    query = 'ALTER TABLE riteaid AUTO_INCREMENT = 1'
    cursor.execute(query)
    query = 'ALTER TABLE walgreens AUTO_INCREMENT = 1'
    cursor.execute(query)
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
        