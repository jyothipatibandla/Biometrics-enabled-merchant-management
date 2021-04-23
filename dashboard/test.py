import sys
from json import dumps
import ecdsa
from ellipticcurve.ecdsa import Ecdsa
from ellipticcurve.privateKey import PrivateKey
import mysql.connector
from mysql.connector import Error
from Crypto.PublicKey import RSA
from hashlib import sha512

x=sys.argv[1]
hash=sys.argv[2]
#x='1'
print (x)

sql="select * from bill where bno="
final = sql+x
print(final)

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

keyPair = RSA.generate(bits=1024)
print("test")

#print(f"Public key:  (n={(keyPair.n)}, e={(keyPair.e)})")
#print(f"Private key: (n={(keyPair.n)}, d={(keyPair.d)})")

# RSA sign the message
#msg = b'A message for signing'
msg = msg.encode()
print("test")
#hash = int.from_bytes(sha512(msg).digest(), byteorder='big')
print("test")
hash = 2
#print(hash)
signature = pow(hash, keyPair.d, keyPair.n)
print("test")
pn=str(keyPair.n)
pe=str(keyPair.e)
sign=str(signature)

cursor = connection.cursor()
cursor.execute ("""UPDATE ds SET pn=%s, pe=%s, sign=%s WHERE bno=%s""", (pn,pe,sign,x))
connection.commit()

#print("Signature:", (signature))
