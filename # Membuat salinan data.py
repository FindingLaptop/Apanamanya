# Membuat salinan data 
data = data.copy()

# Membuat DataFrame dari salinan data
df = data.copy()
df.head()
df

# Menghapus kolom 'Pregnancies'
df = pd.DataFrame(data.drop('Pregnancies', axis=1))
df

# Mendeskripsikan DataFrame
df.describe(include='all')

# Informasi DataFrame
df.info()

# Normalisasi data
scaler = preprocessing.MinMaxScaler(feature_range=(0, 1))
dff = scaler.fit_transform(df)
dff = pd.DataFrame(dff, columns=['Glucose', 'BloodPressure', 'SkinThickness', 'Insulin', 'BMI','DiabetesPedigreeFunction', 'Age', 'Outcome'])

# Membagi Data menjadi Fitur dan Target
X = pd.DataFrame(dff.drop('Outcome', axis=1))
Y = dff['Outcome'].values.reshape(-1, 1)

# Membagi Data menjadI Data Latih dan Data Uji
X_train, X_test, Y_train, Y_test = train_test_split(X, Y, test_size= 0.2, random_state=0)

# Membuat dan Melatih Model
model = GaussianNB()
model.fit(X_train, Y_train.ravel())

# Memprediksi Data uji
y_pred = model.predict(X_test)

# Menghitung dan Menampilkan akurasi
from sklearn import metrics
print("\33[45m Accuracy Is:", metrics.accuracy_score(Y_test, y_pred))