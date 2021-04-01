from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import pandas as pd
import time
import urllib.request

file_names=['banbi','minumin','minumsa','panmidong','pulp','semicolon']
column_num=[13,13,13,13,13,13]     #웹주소있는 컬럼 모음
index=2
#크롬 열기
driver = webdriver.Chrome()
                    #파일 이름                                   시트선택
df=pd.read_excel('./Book_DB/'+file_names[index]+'-books_img_url.xls',sheet_name='Sheet1')

introduce=[]
for i in range(len(df)):
    driver.get(df.values[i][column_num[index]])         #해당 주소로 이동
    #로딩화면 대기
    driver.implicitly_wait(1)

    content=driver.find_element_by_xpath('//*[@id="book-content-inner"]')
    introduce.append(content.text)

#책 소개 컬럼 추가 후 엑셀 파일로 저장
df['책소개']=introduce
df.to_excel('./Book_DB/'+file_names[index]+'-books.xls', index=False)

driver.close()      #브라우저 종료