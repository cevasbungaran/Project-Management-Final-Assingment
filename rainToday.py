# -*- coding: utf-8 -*-
"""
Created on Sun Jan  2 18:12:06 2022

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
import sys

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

#Buat label dari kolom rainToday dan rainTomorrow
dfRainToday_labels = df[['RainToday']]

# Membuat array Numpy utk kelas/label
rainToday_labels_np = np.array(dfRainToday_labels.values) # numpy array  

# Mengubah matriks 1 kolom ke 1 baris (spy dpt jadi parameter le.fit_transform(.))
rainToday_label_np = rainToday_labels_np.ravel()

# Creating labelEncoder
le = preprocessing.LabelEncoder()

# Mengubah label string ke numerik
RainToday_labels_toInt = le.fit_transform(rainToday_label_np)

# Membuat features untuk klasifikasi rain today
df_weather1 = df[['Rainfall','Evaporation', 'Sunshine', 'WindGustSpeed', 'WindSpeed9am', 'WindSpeed3pm', 'Humidity9am', 'Humidity3pm', 'Pressure9am', 'Pressure3pm', 'Cloud9am', 'Cloud3pm']]

# Membuat array Numpy utk features 1
array_features_weather1 = np.array(df_weather1.values)

# Membuat label kelas dari kolom pertama
weather_labels1 = df[['RainToday']]  # hasil: 1 kolom  

# Membuat array Numpy utk kelas/label
weather_labels_np1 = np.array(weather_labels1.values)

# Mengubah matriks 1 kolom ke 1 baris (spy dpt jadi parameter le.fit_transform(.))
label_np1 = weather_labels_np1.ravel()


# Mengubah label string ke numerik
weather_labels_en1 = le.fit_transform(label_np1)
#print(weather_labels_en1)

# Memeriksa dimensi
array_features_weather1.shape
#wine_labels_en.shape

# Data yang sudah siap saatnya dilakukan feature extraction dengan chi-square (Rain Today)
X1 = array_features_weather1
Y1 = weather_labels_np1

# Feature extraction: mengambil k atribut prediktor paling signifikan 
# Feature extraction: memilih atribut prediktor (yg paling signifikan)
selector1  = SelectKBest(score_func=chi2, k=4)
selector1.fit(X1, Y1)

# Mengambil kolom yg terpilih (dg koefisien chi-square terbaik)
cols1 = selector1.get_support(indices=True)\

# Buat fitur dataframe dgn k kolom paling signifikan
df_features1 = df_weather1.iloc[:,cols1]

array_fitur1 = np.array(df_features1.values)

# Split dataset into training set and test set: 70% training and 30% test
X_train1, X_test1, y_train1, y_test1 = train_test_split(array_fitur1, weather_labels_en1, test_size=0.3, random_state=3) 

df_features1.head
# =========================
# Naive Bayes Classifier (NBC)
# Library untuk algoritma klasifikasi Naive Bayes
from sklearn.naive_bayes import GaussianNB

NBC_model_weather = GaussianNB()

# Train the model using the training sets
NBC_model_weather.fit(X_train1, y_train1)

# Predict the response for test dataset
Y_pred1 = NBC_model_weather.predict(X_test1)

weather_classes1 = weather_labels1.RainToday.unique()


# Menghitung dan tampilkan metriks evaluator model klasifikasi
from sklearn.metrics import classification_report
print(classification_report(y_test1, Y_pred1, target_names = weather_classes1))

# Model Accuracy, how often is the classifier correct?
print("Akurasi model klasifikasi Weather dgn NBC:",metrics.accuracy_score(y_test1, Y_pred1))

#================Penyimpanan model final Rain Today===============

import pickle

#Simpan model naive terbaik yang dihasilkan
#Simpan model dgn nama: Model_Naive_Weather.pkl
pkl_filename = "Model_Naive_Weather.pkl"  
with open(pkl_filename, 'wb') as file:  
    pickle.dump(NBC_model_weather, file)

#======Pemanfaatan model final Rain Today untuk prediksi label dari data baru=======

# Menggunakan model untuk memprediksi kelas pada data baru
pkl_filename = "Model_Naive_Weather.pkl"  
with open(pkl_filename, 'rb') as file:
    loaded_model_Naive_Weather = pickle.load(file)


#Load data baru yg akan diprediksi label kelasnya
df_new_weatherAUS = pd.read_csv('new_weatherAUS.csv', delimiter = ',')
predict_dataToday = {'Rainfall':[sys.argv[1]], 'Humidity9am':[sys.argv[2]], 'Humidity3pm':[sys.argv[3]]}
today = pd.DataFrame(predict_dataToday)
today.head()

#X_new = df_new_weatherAUS[['Humidity9am', 'Humidity3pm','Rainfall','Sunshine']].values
#today = pd.DataFrame(X_new)
#today.head()
#X_new = df_new_weatherAUS[['Humidity9am', 'Humidity3pm','Rainfall','Sunshine']].values

#Melakukan prediksi
#Y_pred_new = loaded_model_Naive_Weather.predict(X_new)
#print(Y_pred_new)
