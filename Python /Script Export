#On importe les librairies
import time
import selenium
import os
import datetime

#On importe les différents éléments
from selenium import webdriver
from selenium.webdriver.common.by import By
from selenium.webdriver.edge.service import Service
from selenium.webdriver.edge.options import Options as EdgeOptions
from selenium.common.exceptions import ElementClickInterceptedException, StaleElementReferenceException, NoSuchElementException
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.wait import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.chrome.options import Options

#Variable de la date au format JJ/MM/YYYY
today = datetime.date.today().strftime("%d/%m/%Y")

#On définit les urls à utilisé

#urls = [
#      Pour certaines raisons, les urls ne sont pas renseigné dans les scripts car il s'agit d'urls privées
#     
# 
#       ]


# url2 = Idem


# Selection du navigateur
options = webdriver.EdgeOptions()
prefs = {"download.default_directory": r"U:\Prod\RMP\CubeDynamic"}
options.add_experimental_option("prefs", prefs)

browser = webdriver.Edge(options=options)

#On définit les actions

def click_export_button(urls):
    browser.get(urls)
    time.sleep(10)

    while True:
        try:
            click_button = browser.find_element(By.ID, 'ExportButton').click()
            print("Clique ok!")
            break
        except (NoSuchElementException, StaleElementReferenceException):
            print("Impossible de cliquer pour télécharger, refresh en cours...")
            browser.refresh()
            time.sleep(20)

    print("Téléchargé!")
    time.sleep(20)

# appelle de la fonction pour chaque URL

for url in urls:
    click_export_button(url)

#On recommence 

options = webdriver.EdgeOptions()
prefs = {"download.default_directory": r"U:\Prod\RMP\SymptomTracker"}
options.add_experimental_option("prefs", prefs)
browser = webdriver.Edge(options=options)

try :
    browser.get(url2)
except:
    print("erreur")
    browser.refresh()
    browser.implicitly_wait(10)
    browser.get(url2)
    browser.set_page_load_timeout(30)
else:
    print("erreur")
    browser.refresh()
    browser.get(url2)

# On attend que les éléments soient visibles, localisés et cliquable

wait = WebDriverWait(browser, 25)
browser.set_page_load_timeout(30)
button = wait.until(EC.element_to_be_clickable((By.CLASS_NAME, "k-grid-filter")))
time.sleep(25)
wait.until(EC.invisibility_of_element_located((By.CLASS_NAME, "k-loading-image")))

# On supprime les filtres

browser.find_element(By.XPATH,'/html/body/div[1]/section/section/section[3]/div/table/thead/tr/th[2]/a[1]/span').click()
time.sleep(20)
print('clique filtre')
browser.find_element(By.CSS_SELECTOR,"body > div.k-animation-container > form > div.k-filter-menu-container > div.k-action-buttons > button:nth-child(2)").click()
time.sleep(60)
print('clique clear, filtres enlevés')


# On ajoute la date du jour

wait = WebDriverWait(browser, 10)
button = wait.until(EC.element_to_be_clickable((By.CLASS_NAME, "k-grid-filter")))
time.sleep(25)

wait.until(EC.invisibility_of_element_located((By.CLASS_NAME, "k-loading-image")))
time.sleep(25)
browser.find_element(By.XPATH,'/html/body/div[1]/section/section/section[3]/div/table/thead/tr/th[4]/a[1]/span').click()
print ('filtre date création')
wait = WebDriverWait(browser, 10)

button = wait.until(EC.element_to_be_clickable((By.CLASS_NAME, "k-grid-filter")))
time.sleep(25)
wait.until(EC.invisibility_of_element_located((By.CLASS_NAME, "k-loading-image")))


browser.implicitly_wait(20)
date_input = browser.find_element(By.CSS_SELECTOR,'body > div:nth-child(20) > form > div.k-filter-menu-container > span:nth-child(3) > span > span')
browser.find_element(By.CSS_SELECTOR,'body > div:nth-child(20) > form > div.k-filter-menu-container > span:nth-child(3) > span > input').send_keys(today)
print('date à jour')
time.sleep(30)
wait = WebDriverWait(browser, 20)
button = wait.until(EC.element_to_be_clickable((By.CLASS_NAME, "k-grid-filter")))
time.sleep(20)
wait.until(EC.invisibility_of_element_located((By.CLASS_NAME, "k-loading-image")))

browser.implicitly_wait(25)
browser.find_element(By.CSS_SELECTOR,'body > div:nth-child(20) > form > div.k-filter-menu-container > span:nth-child(3) > span > input').send_keys(Keys.RETURN)
time.sleep(20)
print ('filtre prit en compte')


wait = WebDriverWait(browser, 10)
button = wait.until(EC.element_to_be_clickable((By.CLASS_NAME, "k-grid-filter")))
time.sleep(20)


export_button2 = browser.find_element(By.ID, 'ExportButton').click()
time.sleep(20)
print('fichier téléchargé')






