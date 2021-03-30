import pymysql

conn=pymysql.connect(host='http://khsung0.dothome.co.kr/myadmin/',user='khsung0',password='gmltjd1!',db='khsung0',charset='utf8')
cur=conn.cursor()
#cur.execute("create table if not exists test(id char(4), username char(15))")
cur.execute("insert into khsung0 values('test','test','test','test','2012-02-10','w')")
conn.commit()

# cur.execute("select * from test")
# while True:
#     row=cur.fetchone()
#     if row==None:
#         break
#     print(row)

conn.close()
