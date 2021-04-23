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

x='1'
print(x)
sql="select * from bill where bno="
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
            print("BillNo = ", row[0], )
            print("Date = ", row[1])
            print("Time  = ", row[2])
            print("ID  = ", row[3])
            
        msg = dumps(str(row[0])+row[1]+row[2]+row[3]+str(row[4])+str(row[5])+str(row[6])+str(row[7])+str(row[8])+str(row[9])+str(row[10])+str(row[11]))
        print(msg)
        
except Error as e:
    print("Error while connecting to MySQL", e)
finally:
    if connection.is_connected():
        cursor.close()
        connection.close()

msg=msg.encode()
h = MD5.new(msg).digest()
key = RSA.generate(1024)
sig = key.sign(h, "")
print (key.verify(h, sig))