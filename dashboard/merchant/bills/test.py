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
hashed=int(sys.argv[2])
#x='1'
#print (x)

keyPair = RSA.generate(bits=1024)
#print("test")
#print(f"Public key:  (n={(keyPair.n)}, e={(keyPair.e)})")
#print(f"Private key: (n={(keyPair.n)}, d={(keyPair.d)})")

# RSA sign the message
#msg = b'A message for signing'
#print("test")
#hash = int.from_bytes(sha512(msg).digest(), byteorder='big')
#print("test")
#hash = 2
#print(hash)

signature = pow(hashed, keyPair.d, keyPair.n)
#print("test")
pn=str(keyPair.n)
pe=str(keyPair.e)
sign=str(signature)

connection = mysql.connector.connect(host='localhost',database='bio',user='root',password='')
cursor = connection.cursor()
cursor.execute ("""UPDATE ds SET pn=%s, pe=%s, sign=%s WHERE bno=%s""", (pn,pe,sign,x))
connection.commit()

#print("Signature:", (signature))
