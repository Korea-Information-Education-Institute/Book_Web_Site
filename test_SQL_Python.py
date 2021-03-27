import pymysql

conn=pymysql.connect(host='127.0.0.1',user='root',password='rnjsdudwn1',db='aaaa',charset='utf8')
cur=conn.cursor()
cur.execute("create table if not exists test(id char(4), username char(15))")
cur.execute("insert into test values('test','test')")
cur.execute("insert into test values('user','user')")
conn.commit()

cur.execute("select * from test")
while True:
    row=cur.fetchone()
    if row==None:
        break
    print(row)

conn.close()
