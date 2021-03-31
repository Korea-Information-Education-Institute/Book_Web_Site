import pandas as pd
import pymysql

pw = mysql 비밀번호입력
conn=pymysql.connect(host='localhost',user='root',password=pw,db='khsung0',charset='utf8')
#DB 연결 시작
cur=conn.cursor()
#cur.execute("create table if not exists test(id char(4), username char(15))")

file_names=['banbi','minumin','minumsa','panmidong','pulp','semicolon']
index=0
for k in range(len(file_names)):
    df=pd.read_excel('./Book_DB/'+file_names[index]+'-books.xls',sheet_name='Sheet1')
    for i in range(len(df)):
        check=True
        #DB 쿼리문
        sql="insert into book values(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)"
        for j in range(len(df.values[i])):
            if j==0:
                if str(df.values[i][j])=='nan':
                    check=False
                    title=None
                    break
                else:
                    title=df.values[i][j]
            elif j==1:
                if str(df.values[i][j])=='nan':
                    check=False
                    writer=None
                    break
                else:
                    writer=df.values[i][j]
            elif j==2:
                if str(df.values[i][j])=='nan':
                    genre=None
                else:
                    genre=df.values[i][j]
            elif j==5:
                if str(df.values[i][j])=='nan':
                    publication_date=None
                else:
                    publication_date=df.values[i][j]
            elif j==7:
                if str(df.values[i][j])=='nan':
                    check=False
                    price=None
                    break
                else:
                    price=df.values[i][j]
            elif j==11:
                if str(df.values[i][j])=='nan':
                    origin_title=None
                else:
                    origin_title=df.values[i][j]
            elif j==13:
                if str(df.values[i][j])=='nan':
                    web_addr=None
                else:
                    web_addr=df.values[i][j]
            elif j==14:
                if str(df.values[i][j])=='nan':
                    img_addr=None
                else:
                    img_addr=df.values[i][j]
            elif j==15:
                if str(df.values[i][j])=='nan':
                    check=False
                    intro=None
                    break
                else:
                    intro=df.values[i][j]

        if check==True:
        #DB 쿼리문 실행
            cur.execute(sql,(None,title,writer,genre,publication_date,price,origin_title,web_addr,img_addr,intro))
    index+=1

#DB 커밋
conn.commit()

conn.close()
