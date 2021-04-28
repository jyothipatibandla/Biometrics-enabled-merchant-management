from json import dumps
import ecdsa
from ellipticcurve.ecdsa import Ecdsa
from ellipticcurve.privateKey import PrivateKey
import mysql.connector
from mysql.connector import Error
from Crypto.PublicKey import RSA
import sys
from Crypto.PublicKey import RSA
from Crypto.Hash import MD5

x=sys.argv[1]
hashed=int(sys.argv[2])

sql="select * from ds where bno="
final = sql+x

try:
    connection = mysql.connector.connect(host='localhost',database='bio',user='root',password='')
    
    if connection.is_connected():
        sql_select_Query = final
        cursor = connection.cursor()
        cursor.execute(sql_select_Query)
        # get all records
        records = cursor.fetchall()
        for row in records:
            n = int(row[1])
            e = int(row[2])
            sign = int(row[3])

except Error as e:
    print("Error while connecting to MySQL", e)
finally:
    if connection.is_connected():
        cursor.close()

hashFromSignature = pow(sign, e, n)

connection = mysql.connector.connect(host='localhost',database='bio',user='root',password='')
cursor = connection.cursor()

if(hashed == hashFromSignature):
    cursor.execute ("""UPDATE ds SET verify=%s WHERE bno=%s""", ('true',x))
    connection.commit()
else:
    cursor.execute ("""UPDATE ds SET verify=%s WHERE bno=%s""", ('false',x))
    connection.commit()