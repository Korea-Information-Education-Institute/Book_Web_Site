from selenium import webdriver
from selenium.webdriver.common.keys import Keys
import pandas as pd
import time
import urllib.request

column_num=13
                    #파일 이름                                     가져올 행
df=pd.read_excel('./Book_DB/pulp-books.xls',sheet_name='Worksheet',usecols=[column_num])
#df=pd.read_excel('./Book_DB/test.xls',sheet_name='Sheet1')
print(len(df))
#print(df.values)
for i in range(len(df)):

    print(df.values[i][0])
for i in range(len(df)):
    if i==0:
        driver = webdriver.Chrome()
    driver.get(df.values[i][0])
    time.sleep(1)


driver.close()
    #print(df.values[i][0])


#driver = webdriver.Chrome()

# driver.get("https://www.google.co.kr/imghp?hl=ko&ogbl")
# elem = driver.find_element_by_name("q")
# elem.send_keys("강아지")
# elem.send_keys(Keys.RETURN)
# images=driver.find_elements_by_css_selector(".rg_i.Q4LuWd")
# cnt=1
# for image in images:
#     image.click()
#     image_url=image.get_attribute("src")
#     urllib.request.urlretrieve(image_url, str(cnt)+".jpg")
#     if cnt==5:
#         break
#     cnt+=1

#driver.close()      브라우저 종료