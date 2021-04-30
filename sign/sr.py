import sys
import argparse
import cv2
import os
import mysql.connector
from mysql.connector import Error
from matplotlib import pyplot as plt
from Libraries.ExtractKeypoints.ExtractKeypoints import extractKeypoints

def main(id, visual = False, thres = 20):
    target1 = 'D:/Softwares/XAMPP/htdocs/bio/bio/dashboard/merchant/bio/uploads/101.jpg'
    target2 = 'D:/Softwares/XAMPP/htdocs/bio/bio/dashboard/merchant/bills/uploads/101.jpg'
    
    if(not os.path.exists(target1)):
        connection = mysql.connector.connect(host='localhost',database='bio',user='root',password='')
        cursor = connection.cursor()
        verify = "false"
        sid = 1
        error = "Invalid ID"
        cursor.execute ("""UPDATE sverify SET verify=%s,error=%s WHERE sid=%s""", (verify,error,sid))
        connection.commit()
    img1 = cv2.imread(target1, cv2.IMREAD_GRAYSCALE)
    kp1, des1 = extractKeypoints(img1)

    if(not os.path.exists(target2)):
        connection = mysql.connector.connect(host='localhost',database='bio',user='root',password='')
        cursor = connection.cursor()
        verify = "false"
        sid = 1
        error = "Signature image not uploaded properly"
        cursor.execute ("""UPDATE sverify SET verify=%s,error=%s WHERE sid=%s""", (verify,error,sid))
        connection.commit()
    img2 = cv2.imread(target2, cv2.IMREAD_GRAYSCALE)
    kp2, des2 = extractKeypoints(img2)

    bf = cv2.BFMatcher(cv2.NORM_HAMMING, crossCheck=True)
    matches = sorted(bf.match(des1, des2), key=lambda match: match.distance)

    img4 = cv2.drawKeypoints(img1, kp1, outImage=None)
    img5 = cv2.drawKeypoints(img2, kp2, outImage=None)

    if visual:
        f, axarr = plt.subplots(1, 2)
        axarr[0].imshow(img4)
        axarr[1].imshow(img5)
        plt.show()

        img3 = cv2.drawMatches(img1, kp1, img2, kp2, matches, flags=2, outImg=None)
        plt.imshow(img3)
        plt.show()

    score = 0
    for match in matches:
        score += match.distance
    if score / len(matches) < thres:
        connection = mysql.connector.connect(host='localhost',database='bio',user='root',password='')
        cursor = connection.cursor()
        verify = "true"
        sid = 1
        cursor.execute ("""UPDATE sverify SET verify=%s WHERE sid=%s""", (verify,sid))
        connection.commit()
    else:
        connection = mysql.connector.connect(host='localhost',database='bio',user='root',password='')
        cursor = connection.cursor()
        verify = "false"
        sid = 1
        cursor.execute ("""UPDATE sverify SET verify=%s WHERE sid=%s""", (verify,sid))
        connection.commit()
    # print('----|| MODULE ENDED ||----')


# def setup(argv):
#     parser = argparse.ArgumentParser()
#     parser.add_argument('--image', help='Provide signature image path needs to be verified', type=str, default='Data/signature.jpg')
#     parser.add_argument('--ref_image', help='Provide reference signature image path needs to be verified', type=str, default='Data/ref-signature.jpg')
#     parser.add_argument('--thres', help='Signature matching threshold', type=int, default=20)
#     parser.add_argument('--visual', help='Visulisation of result', type=bool, default=True)
#     return parser.parse_args(argv)

'''sid=int(sys.argv[0])
fname=sys.argv[1]

print(sid)
print(fname)'''
main(101, False)
