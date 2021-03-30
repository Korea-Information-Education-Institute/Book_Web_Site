import pandas as pd
import pymysql

file_names=['banbi','minumin','minumsa','panmidong','pulp','semicolon']
index=4

df=pd.read_excel('./Book_DB/'+file_names[index]+'-books.xls',sheet_name='Sheet1')
print(len(df))
print(df.values[0][0])
print(df.values[0][1])
print(df.values[0][2])
print(df.values[0][3])
print(str(df.values[0][4]))
print(df.values[0][5])
if str(df.values[0][3])=='nan':
    df.values[0][3]='11'
print(df.values[0][3])

# cur.execute("select * from test")
# while True:
#     row=cur.fetchone()
#     if row==None:
#         break
#     print(row)