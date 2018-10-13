#!/usr/bin/python

import newspaper
from newspaper import Article
import requests
from bs4 import BeautifulSoup
import mysql.connector as mariadb
from newspaper import ArticleException
import articleDateExtractor


mariadb_connection = mariadb.connect(user='root', password='frederick', database=' avmariadb')
cursor = mariadb_connection.cursor()

#retrieving information

cursor.execute("SELECT url FROM skcript")
data=cursor.fetchall()
for text in data:
    try:
	    url=text[0]
	    article = Article(url)
	    article.download()
	    article.parse()
	    try:
	        cursor.execute("UPDATE skcript set author={!a},charCount='{:d}',title={!a} where url='{!s}'".format("".join(article.authors),len(article.text),article.title,url))
	    except mariadb.Error as error:
              print("Error: {}".format(error))
	    d = articleDateExtractor.extractArticlePublishedDate(url)
	    try:
	       cursor.execute("UPDATE skcript set date='{:%Y-%m-%d}'".format(d))
	    except (TypeError, mariadb.Error):
	       print("date error")
    except ArticleException:
	     continue



mariadb_connection.commit()


mariadb_connection.close()










