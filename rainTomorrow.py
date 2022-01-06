# -*- coding: utf-8 -*-
"""
Created on Sun Jan  2 18:16:12 2022

@author: Hi
"""

import pandas as pd
import matplotlib.pyplot as plt
import numpy as np
from sklearn.feature_selection import SelectKBest
from sklearn.feature_selection import chi2
from sklearn.model_selection import train_test_split
from sklearn import preprocessing
#Import scikit-learn metrics module for accuracy calculation
from sklearn import metrics

import pandas as pd 
import matplotlib.pyplot as plt

import seaborn as sb
import numpy as np


# Membaca dataset 
df = pd.read_csv('weatherAUS.csv')

#==== EKSPLORASI DATA =====

#Melihat atribut/kolom yang dimiliki oleh dataset
df.columns

#Melihat jumlah baris dan kolom yang dimiliki oleh dataset | format : (baris, kolom)
df.shape

#Melihat tipe data yang dimiliki setiap atribut/kolom
df.dtypes

#Melihat banyaknya elemen yang ada pada dataset
df.size

#Melihat apakah terdapat missing value pada dataset
df.isnull().values.any()

#Drop row with missing value
df = df.dropna()

#Buat label dari kolom rainTomorrow
dfRainTomorrow_labels = df[['RainTomorrow']]

# Membuat array Numpy utk kelas/label
rainTomorrow_labels_np = np.array(dfRainTomorrow_labels.values) # numpy array 

# Mengubah matriks 1 kolom ke 1 baris (spy dpt jadi parameter le.fit_transform(.))
rainTomorrow_label_np = rainTomorrow_labels_np.ravel()

# Creating labelEncoder
le = preprocessing.LabelEncoder()

# Mengubah label string ke numerik
RainTomorrow_labels_toInt = le.fit_transform(rainTomorrow_label_np)
# Membuat features untuk klasifikasi rain tomorrow
df_weather2 = df[['Rainfall','Evaporation', 'Sunshine', 'WindGustSpeed', 'WindSpeed9am', 'WindSpeed3pm', 'Humidity9am', 'Humidity3pm', 'Pressure9am', 'Pressure3pm', 'Cloud9am', 'Cloud3pm']]

# Membuat array Numpy utk features 2
array_features_weather2 = np.array(df_weather2.values)

# Membuat label kelas dari kolom pertama
weather_labels2 = df[['RainTomorrow']] # hasil: 1 kolom 

# Membuat array Numpy utk kelas/label
weather_labels_np2 = np.array(weather_labels2.values)

# Mengubah matriks 1 kolom ke 1 baris (spy dpt jadi parameter le.fit_transform(.))
label_np2 = weather_labels_np2.ravel()


# Mengubah label string ke numerik
weather_labels_en2 = le.fit_transform(label_np2)
#print(weather_labels_en2)

# Memeriksa dimensi
array_features_weather2.shape
#wine_labels_en.shape

# Data yang sudah siap saatnya dilakukan feature extraction dengan chi-square (Rain Tomorrow)
X2 = array_features_weather2
Y2 = weather_labels_np2

# Feature extraction: mengambil k atribut prediktor paling signifikan 
# Feature extraction: memilih atribut prediktor (yg paling signifikan)
selector2  = SelectKBest(score_func=chi2, k=4)
selector2.fit(X2, Y2)

# Mengambil kolom yg terpilih (dg koefisien chi-square terbaik)
cols2 = selector2.get_support(indices=True)

# Buat fitur dataframe dgn k kolom paling signifikan
df_features2 = df_weather2.iloc[:,cols2]
array_fitur2 = np.array(df_features2.values)

# Split dataset into training set and test set: 70% training and 30% test
X_train2, X_test2, y_train2, y_test2 = train_test_split(array_fitur2, weather_labels_en2, test_size=0.3, random_state=3) 

df_features2.head
# =========================
# Naive Bayes Classifier (NBC)
# Library untuk algoritma klasifikasi Naive Bayes
from sklearn.naive_bayes import GaussianNB

NBC_model_weather = GaussianNB()

# Train the model using the training sets
NBC_model_weather.fit(X_train2, y_train2)

# Predict the response for test dataset
Y_pred2 = NBC_model_weather.predict(X_test2)

weather_classes2 = weather_labels2.RainTomorrow.unique()


# Menghitung dan tampilkan metriks evaluator model klasifikasi
from sklearn.metrics import classification_report
print(classification_report(y_test2, Y_pred2, target_names = weather_classes2))

# Model Accuracy, how often is the classifier correct?
print("Akurasi model klasifikasi Weather dgn NBC:",metrics.accuracy_score(y_test2, Y_pred2))


# Naive Bayes Classifier (NBC)
# Library untuk algoritma klasifikasi Naive Bayes
from sklearn.naive_bayes import GaussianNB

NBC_model_weather2 = GaussianNB()

# Train the model using the training sets
NBC_model_weather2.fit(X_train2, y_train2)

# Predict the response for test dataset
Y_pred2 = NBC_model_weather2.predict(X_test2)

weather_classes2 = weather_labels2.RainTomorrow.unique()
#print(wine_classes)

# Menghitung dan tampilkan metriks evaluator model klasifikasi
from sklearn.metrics import classification_report
print(classification_report(y_test2, Y_pred2, target_names = weather_classes2))

# Model Accuracy, how often is the classifier correct?
print("Akurasi model klasifikasi Wine dgn NBC:",metrics.accuracy_score(y_test2, Y_pred2))

import pickle

#Simpan model naive terbaik yang dihasilkan
#Simpan model dgn nama: Model_Naive_Weather.pkl
pkl_filename = "Model_Naive_Weather.pkl"  
with open(pkl_filename, 'wb') as file:  
    pickle.dump(NBC_model_weather, file)
    
#================Penyimpanan model final Rain Tomorrow===============

import pickle

#Simpan model naive terbaik yang dihasilkan
#Simpan model dgn nama: Model_Naive_Weather.pkl
pkl_filename2 = "Model_Naive_Weather_RainTomorrow.pkl"  
with open(pkl_filename, 'wb') as file:  
    pickle.dump(NBC_model_weather2, file)

#======Pemanfaatan model final Rain Tomorrow untuk prediksi label dari data baru=======

# Menggunakan model untuk memprediksi kelas pada data baru
pkl_filename2 = "Model_Naive_Weather_RainTomorrow.pkl"  
with open(pkl_filename, 'rb') as file:
    loaded_model_Naive_Weather2 = pickle.load(file)

#Load data baru yg akan diprediksi label kelasnya
df_new_weatherAUS = pd.read_csv('new_weatherAUS.csv', delimiter = ',')

X_new2 = df_new_weatherAUS[['Humidity9am', 'Humidity3pm','Rainfall','Sunshine']].values
tomorrow = pd.DataFrame(X_new2)
tomorrow.head()

#Melakukan prediksi
Y_pred_new2 = loaded_model_Naive_Weather2.predict(X_new2)
print(Y_pred_new2)