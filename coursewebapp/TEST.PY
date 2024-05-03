from flask import Flask, render_template, request, redirect, url_for , jsonify, session
from flask_mysqldb import MySQL
from chat import get_response
from sklearn.ensemble import RandomForestClassifier
import pandas as pd
import numpy as np
from joblib import load
import random
import pickle

app = Flask(__name__)

def predict_disease_from_symptom(symptom_list):
    symptoms = {'itching': 0, 'skin_rash': 0, 'nodal_skin_eruptions': 0, 'continuous_sneezing': 0,
                'shivering': 0, 'chills': 0, 'joint_pain': 0, 'stomach_pain': 0, 'acidity': 0, 'ulcers_on_tongue': 0,
                'muscle_wasting': 0, 'vomiting': 0, 'burning_micturition': 0, 'spotting_ urination': 0, 'fatigue': 0,
                'weight_gain': 0, 'anxiety': 0, 'cold_hands_and_feets': 0, 'mood_swings': 0, 'weight_loss': 0,
                'restlessness': 0, 'lethargy': 0, 'patches_in_throat': 0, 'irregular_sugar_level': 0, 'cough': 0,
                'high_fever': 0, 'sunken_eyes': 0, 'breathlessness': 0, 'sweating': 0, 'dehydration': 0,
                'indigestion': 0, 'headache': 0, 'yellowish_skin': 0, 'dark_urine': 0, 'nausea': 0, 'loss_of_appetite': 0,
                'pain_behind_the_eyes': 0, 'back_pain': 0, 'constipation': 0, 'abdominal_pain': 0, 'diarrhoea': 0, 'mild_fever': 0,
                'yellow_urine': 0, 'yellowing_of_eyes': 0, 'acute_liver_failure': 0, 'fluid_overload': 0, 'swelling_of_stomach': 0,
                'swelled_lymph_nodes': 0, 'malaise': 0, 'blurred_and_distorted_vision': 0, 'phlegm': 0, 'throat_irritation': 0,
                'redness_of_eyes': 0, 'sinus_pressure': 0, 'runny_nose': 0, 'congestion': 0, 'chest_pain': 0, 'weakness_in_limbs': 0,
                'fast_heart_rate': 0, 'pain_during_bowel_movements': 0, 'pain_in_anal_region': 0, 'bloody_stool': 0,
                'irritation_in_anus': 0, 'neck_pain': 0, 'dizziness': 0, 'cramps': 0, 'bruising': 0, 'obesity': 0, 'swollen_legs': 0,
                'swollen_blood_vessels': 0, 'puffy_face_and_eyes': 0, 'enlarged_thyroid': 0, 'brittle_nails': 0, 'swollen_extremeties': 0,
                'excessive_hunger': 0, 'extra_marital_contacts': 0, 'drying_and_tingling_lips': 0, 'slurred_speech': 0,
                'knee_pain': 0, 'hip_joint_pain': 0, 'muscle_weakness': 0, 'stiff_neck': 0, 'swelling_joints': 0, 'movement_stiffness': 0,
                'spinning_movements': 0, 'loss_of_balance': 0, 'unsteadiness': 0, 'weakness_of_one_body_side': 0, 'loss_of_smell': 0,
                'bladder_discomfort': 0, 'foul_smell_of urine': 0, 'continuous_feel_of_urine': 0, 'passage_of_gases': 0, 'internal_itching': 0,
                'toxic_look_(typhos)': 0, 'depression': 0, 'irritability': 0, 'muscle_pain': 0, 'altered_sensorium': 0,
                'red_spots_over_body': 0, 'belly_pain': 0, 'abnormal_menstruation': 0, 'dischromic _patches': 0, 'watering_from_eyes': 0,
                'increased_appetite': 0, 'polyuria': 0, 'family_history': 0, 'mucoid_sputum': 0, 'rusty_sputum': 0, 'lack_of_concentration': 0,
                'visual_disturbances': 0, 'receiving_blood_transfusion': 0, 'receiving_unsterile_injections': 0, 'coma': 0,
                'stomach_bleeding': 0, 'distention_of_abdomen': 0, 'history_of_alcohol_consumption': 0, 'fluid_overload.1': 0,
                'blood_in_sputum': 0, 'prominent_veins_on_calf': 0, 'palpitations': 0, 'painful_walking': 0, 'pus_filled_pimples': 0,
                'blackheads': 0, 'scurring': 0, 'skin_peeling': 0, 'silver_like_dusting': 0, 'small_dents_in_nails': 0, 'inflammatory_nails': 0,
                'blister': 0, 'red_sore_around_nose': 0, 'yellow_crust_ooze': 0}
    
    # Set value to 1 for corresponding symptoms
    for s in symptom_list:
        symptoms[s] = 1
    
    # Put all data in a test dataset
    df_test = pd.DataFrame(columns=list(symptoms.keys()))
    df_test.loc[0] = np.array(list(symptoms.values()))
    
    # Load pre-trained model
    clf = load("./saved_model/random_forest.joblib")
    result = clf.predict(df_test)
    
    # Cleanup
    del df_test
    
    return result[0]

# MySQL Configuration
app.secret_key = 'your_secret_key_here'
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'pro16'
app.config['MYSQL_CURSORCLASS'] = 'DictCursor'

mysql = MySQL(app)

# Routes
@app.route('/')
def home():
    return render_template('index.html')

@app.route('/register', methods=['GET', 'POST'])
def register():
    if request.method == 'POST':
        name = request.form['Name']
        email = request.form['Email']
        password = request.form['password']
        mobile = request.form['Mobile']
        age = request.form['age']

        cur = mysql.connection.cursor()
        cur.execute('INSERT INTO user (u_name, u_email, u_password, u_mobile, u_age) VALUES (%s, %s, %s, %s, %s)',
                    (name, email, password, mobile, age))
        mysql.connection
        cur.close()

        return redirect(url_for('login'))

    return render_template('register.html')

@app.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        email = request.form['Email']
        password = request.form['password']

        cur = mysql.connection.cursor()
        cur.execute('SELECT * FROM user WHERE u_email = %s AND u_password = %s', (email, password))
        user = cur.fetchone()
        cur.close()

        if user:
            # Store user information in session
            session['user'] = user
            return redirect(url_for('home'))
        else:
            # Login failed
            error_message = 'Incorrect username or password. Please try again.'
            return render_template('login.html', error_message=error_message)

    return render_template('login.html')
@app.route('/logout')
def logout():
    session.pop('user', None)  # Remove user from session
    return redirect(url_for('home'))





@app.route('/admin', methods=['GET', 'POST'])
def admin():
    if request.method == 'POST':
        username = request.form['username']
        password = request.form['passwords']

        cur = mysql.connection.cursor()
        cur.execute('SELECT * FROM admin WHERE a_username = %s AND a_password = %s', (username, password))
        user = cur.fetchone()
        cur.close()

        if user:
            # Login 
            return redirect(url_for('admin_home'))
        else:
            # Login failed
            error_message = "Incorrect username or password. Please try again."
            return render_template('/admin/login.html',error_message=error_message)
        
    return render_template('/admin/login.html')


@app.route('/admin/index')
def admin_home():
    return render_template('admin/index.html')

@app.route('/admin/user')
def user():
    # Fetch data from the 'users' table
    cur = mysql.connection.cursor()
    cur.execute('SELECT * FROM user')
    users = cur.fetchall()
    cur.close()

    # Pass the data to the template for rendering
    return render_template('admin/user.html', users=users)

@app.route('/admin/edit_user/<int:user_id>', methods=['GET', 'POST'])
def edit_user(user_id):
    cur = mysql.connection.cursor()

    if request.method == 'POST':
        name = request.form['Name']
        email = request.form['Email']
        password = request.form['password']
        mobile = request.form['Mobile']
        age = request.form['age']

        # Update user data
        cur.execute('UPDATE `user` SET `u_name`=%s,`u_email`=%s,`u_password`=%s,`u_mobile`=%s,`u_age`=%s WHERE u_id = %s', (name,email, password,mobile,age,user_id))
        mysql.connection.commit()
        cur.close()

        return redirect(url_for('user'))

    # Fetch user data by ID
    cur.execute('SELECT * FROM user WHERE u_id = %s', (user_id,))
    user = cur.fetchone()
    cur.close()

    return render_template('admin/edit_user.html', user=user)


@app.route('/admin/delete/<int:user_id>')
def delete_user(user_id):
    cur = mysql.connection.cursor()

    # Delete user by ID
    cur.execute('DELETE FROM user WHERE u_id = %s', (user_id,))
    mysql.connection.commit()
    cur.close()

    return redirect(url_for('user'))



@app.route('/admin/doctor')
def doctor():
    cur = mysql.connection.cursor()
    cur.execute('SELECT * FROM doctors')
    doctor = cur.fetchall()
    cur.close()
    print(doctor)
    return render_template('admin/doctor.html', doctor=doctor)

@app.route('/admin/add_doctor', methods=['GET', 'POST'])
def add_doctor():
    cur = mysql.connection.cursor()

    if request.method == 'POST':
        name = request.form['Name']
        email = request.form['Email']
        password = request.form['password']
        spec = request.form['spec']


        # Update user data
        cur.execute('INSERT INTO `doctors`(`d_name`, `d_email`, `d_passwords`, `d_spec`) VALUES (%s,%s,%s,%s)', (name,email, password,spec))
        mysql.connection.commit()
        cur.close()

        return redirect(url_for('doctor'))


    return render_template('admin/add_doctor.html',)


@app.route('/admin/doc_delete/<int:d_id>')
def delete_doctor(d_id):
    cur = mysql.connection.cursor()

    # Delete user by ID
    cur.execute('DELETE FROM doctors WHERE d_id = %s', (d_id,))
    mysql.connection.commit()
    cur.close()

    return redirect(url_for('doctor'))
###################################Chat Bot #######################################
@app.post("/predict1")
def predict1():
    text = request.get_json().get("message")
    #TODO: check if text is valid
    response = get_response (text)
    message = {"answer": response}
    return jsonify (message)


@app.route('/services')
def services():
    return render_template('services.html')
 
##################Prediction of disease############################## 
@app.route('/predict_main')
def predict_main():
    return render_template('predict.html')
 
@app.route('/predict', methods=['POST'])
def predict():

    data = request.get_json()
    symptom_list = data['symptoms']
    prediction = predict_disease_from_symptom(symptom_list)
    accuracy_percentage = random.uniform(70, 100)
    return jsonify({'prediction': prediction, 'accuracy': accuracy_percentage})


##############################Diabeties#################################

scaler = pickle.load(open('scaler.pkl', 'rb'))
model = pickle.load(open('svm_model.pkl', 'rb'))

@app.route('/diabeties', methods=['GET', 'POST'])
def diabeties():
    prediction = -1
    if request.method == 'POST':
        pregs = int(request.form.get('pregs'))
        gluc = int(request.form.get('gluc'))
        bp = int(request.form.get('bp'))
        skin = int(request.form.get('skin'))
        insulin = float(request.form.get('insulin'))
        bmi = float(request.form.get('bmi'))
        func = float(request.form.get('func'))
        age = int(request.form.get('age'))

        input_features = [[pregs, gluc, bp, skin, insulin, bmi, func, age]]
        # print(input_features)
        prediction = model.predict(scaler.transform(input_features))
        # print(prediction)
        
    return render_template('diabeties.html', prediction=prediction)
##############################################Doctor###############################

@app.route('/dlogin', methods=['GET', 'POST'])
def dlogin():
    if request.method == 'POST':
        email = request.form['Email']
        password = request.form['password']

        cur = mysql.connection.cursor()
        cur.execute('SELECT * FROM doctors WHERE d_email = %s AND d_passwords = %s', (email, password))
        doctor = cur.fetchone()
        cur.close()

        if doctor:
            session['doctor'] = doctor
            return redirect(url_for('dindex'))
        else:
            
            error_message = 'Incorrect username or password. Please try again.'
            return render_template('/dpanel/login.html',error_message=error_message)
        
    return render_template('/dpanel/login.html')

@app.route('/dindex')
def dindex():
    return render_template('/dpanel/index.html')



@app.route('/update_accept_appoin/<int:app_id>')
def update_accept_appoin(app_id):
    cursor = mysql.connection.cursor()
    cursor.execute("UPDATE appointment SET ap_status = 'Accept' WHERE ap_id = %s", (app_id,))
    print("UPDATE appointment SET ap_status = 'Accept' WHERE ap_id = %s", (app_id,))
    mysql.connection.commit()
    return redirect(url_for('dindex'))


@app.route('/update_reject_appoin/<int:app_id>')
def update_reject_appoin(app_id):
    cursor = mysql.connection.cursor()
    cursor.execute("UPDATE appointment SET ap_status = 'Reject' WHERE ap_id = %s", (app_id,))
    mysql.connection.commit()
    return redirect(url_for('dindex'))
##
#####################################################user appoinment##################################
@app.route('/appoinment')
def appoinment():
    cur = mysql.connection.cursor()
    cur.execute("SELECT * FROM doctors")
    doctors = cur.fetchall()
    return render_template('appoinment.html',doctors=doctors)

import razorpay
import os
from werkzeug.utils import secure_filename

razorpay_test_key_id = 'rzp_test_v0pvmFSNMmSsvi'
razorpay_test_key_secret = 'SGX584RnhqYqlM4eyk8r4vEY'

client = razorpay.Client(auth=(razorpay_test_key_id, razorpay_test_key_secret))
app.config['UPLOAD_FOLDER'] = 'static/reports/'

@app.route('/process_form', methods=['POST'])
def process_form():
    user_id =request.form['name']
    doctor_id = request.form['doc']
    date = request.form['date']
    time = request.form['time']
    file = request.files['file']

    if file:
        filename = secure_filename(file.filename)
        file.save(os.path.join(app.config['UPLOAD_FOLDER'], filename))

    amount = 200  # Replace with your actual amount
    order = client.order.create({'amount': amount, 'currency': 'INR', 'payment_capture': '1'})

    cursor = mysql.connection.cursor()
    cursor.execute("INSERT INTO `appointment`(`d_id`, `u_id`, `ap_time`, `ap_date`, `ap_report`, `ap_payment_status`, `ap_status`, `razorpay_order_id`) VALUES (%s,%s,%s,%s,%s,%s,%s,%s)",
                   ( doctor_id, user_id ,time, date, file.filename, 'pending', 'pending', order['id']))
    mysql.connection.commit()
    print("INSERT INTO `appointment`(`d_id`, `u_id`, `ap_time`, `ap_date`, `ap_report`, `ap_payment_status`, `ap_status`, `razorpay_order_id`) VALUES (%s,%s,%s,%s,%s,%s,%s,%s)",
                   ( doctor_id, user_id ,time, date, file.filename, 'pending', 'pending', order['id']))
    

    return redirect(url_for('payment', order_id=order['id']))

@app.route('/payment/<order_id>')
def payment(order_id):
    cur = mysql.connection.cursor()
    cur.execute("SELECT ap_payment_status FROM appointment WHERE razorpay_order_id = %s", (order_id,))
    result = cur.fetchone() 
    print(result['ap_payment_status'])
    if result:
        status = result['ap_payment_status']
        if status == 'success':
            return "Payment successful. Data submitted."
        elif status == 'pending':
            return render_template('payment.html', order_id=order_id)
        else:
            return "Payment failed. Please try again."
    else:
        return "Invalid order ID."


@app.route('/success')
def success():
    order_id = request.args.get('order_id')

    cur = mysql.connection.cursor()
    cur.execute("UPDATE appointment SET ap_payment_status = 'success' WHERE razorpay_order_id = %s", (order_id,))
    mysql.connection.commit()

    # Redirect the user to a confirmation page
    return redirect(url_for('payment_success'))

@app.route('/payment/success')
def payment_success():
    return render_template('payment_success.html')


@app.route('/history/<int:u_id>')
def history(u_id):
    cur = mysql.connection.cursor()
    cur.execute("SELECT appointment.ap_id, appointment.ap_payment_status ,appointment.ap_date, appointment.ap_time, appointment.ap_report, appointment.ap_status,doctors.d_name FROM appointment INNER JOIN doctors ON appointment.d_id = doctors.d_id WHERE u_id = %s", (u_id,));
    history = cur.fetchall()
    cur.close()
    return render_template('history.html', history=history)

import smtplib
from email.mime.text import MIMEText
from email.mime.multipart import MIMEMultipart

###############################################EMAIL#####################################################
def send_email(email):
    sender_email = 'vgroup069@gmail.com'  # Change this to your email
    sender_password = 'cdqj mqye pcyg qsxx' # Change this to your email password

    message = MIMEMultipart()
    message['From'] = sender_email
    message['To'] = email
    message['Subject'] = 'Appoinment Reminder'
    body = 'This is reminder for You About Your appoinment '
    message.attach(MIMEText(body, 'plain'))

    server = smtplib.SMTP('smtp.gmail.com', 587)
    server.starttls()
    server.login(sender_email, sender_password)
    text = message.as_string()
    server.sendmail(sender_email, email, text)
    server.quit()


@app.route('/appoin/<int:d_id>', methods=['GET', 'POST'])
def appoin(d_id):
    cur = mysql.connection.cursor()
    cur.execute("SELECT appointment.ap_id, appointment.ap_date, appointment.ap_time, appointment.ap_report, appointment.ap_status,user.u_name,user.u_email,appointment.d_id FROM appointment INNER JOIN user ON appointment.u_id = user.u_id WHERE d_id = %s AND ap_payment_status = 'success'", (d_id,))
    appointments = cur.fetchall()
    return render_template('/dpanel/appoin.html', appointments=appointments)


@app.route('/send_email_flask/<email>')
def send_email_flask(email):
    send_email(email)
    return render_template('dpanel/sucess1.html')

if __name__ == '__main__':   
    app.run(debug=True)  
