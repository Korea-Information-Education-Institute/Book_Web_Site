from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import pandas as pd
import time
import urllib.request

file_names=['banbi','bir','goldenbough','minumin','minumsa','panmidong','pulp','semicolon']
column_num=[13,12,13,13,13,13,13,13]     #웹주소있는 컬럼 모음
index=6
                    #파일 이름                                   시트선택              가져올 행
df=pd.read_excel('./Book_DB/'+file_names[index]+'-books.xls',sheet_name='Worksheet')

url_list=[]
for i in range(len(df)):
    if i==0:
        driver = webdriver.Chrome()
    driver.get(df.values[i][column_num[index]])         #해당 주소로 이동
    #로딩화면 대기 시간
    driver.implicitly_wait(1)
    img=driver.find_element_by_css_selector('#single-book > div.header.clearfix > div.left > div.cover.inner-border > img')
    #이미지 주소 얻어오기
    img_url=img.get_attribute("src")
    #이미지 주소 리스트 형태로 저장
    url_list.append(img_url)
   
#이미지 url 컬럼 추가 후 엑셀 파일로 저장
df['이미지 주소']=img_url
df.to_excel('./Book_DB/'+file_names[index]+'-books1.xls', index=False)

driver.close()      #브라우저 종료
