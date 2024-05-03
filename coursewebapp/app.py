from flask import Flask, render_template, request, redirect, url_for , jsonify, session
from flask_mysqldb import MySQL
from flask_jwt_extended import JWTManager, jwt_required, create_access_token
from werkzeug.security import generate_password_hash, check_password_hash
from flask import redirect, url_for, session
import secrets

app = Flask(__name__)

app.secret_key = 'your_secret_key_here'
app.config['MYSQL_HOST'] = 'localhost'
app.config['MYSQL_USER'] = 'root'
app.config['MYSQL_PASSWORD'] = ''
app.config['MYSQL_DB'] = 'attack'
app.config['JWT_SECRET_KEY'] = 'm9_IKwvKReAMOKxFuH7Yys9YjK9Go9jeDWjsZm3iU3I'
app.config['MYSQL_CURSORCLASS'] = 'DictCursor'

app.secret_key = secrets.token_urlsafe(32)

mysql = MySQL(app)
jwt = JWTManager(app)


# Routes
@app.route('/')
def home():
    return redirect(url_for('login'))

@app.route('/admin', methods=['GET', 'POST'])
def admin_login():
    if request.method == 'POST':
        username = request.form['login']
        password = request.form['password']

        cur = mysql.connection.cursor()
        cur.execute('SELECT * FROM admin WHERE admin_username = %s AND admin_password = %s', (username, password))
        user = cur.fetchone()
        mysql.connection.commit()

        cur.close()
        print('SELECT * FROM admin WHERE admin_username = %s AND admin_password = %s', (username, password));
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


@app.route('/register', methods=['GET', 'POST'])
def register():
    if request.method == 'POST':
            username = request.form['username']
            email = request.form['email']
            password = request.form['password']
            
            # Hashing the password
            hashed_password = generate_password_hash(password)
            
            # Connecting to MySQL
            cursor = mysql.connection.cursor()
            
            # Inserting user data into the database
            cursor.execute("INSERT INTO user (u_name, u_email, u_password) VALUES (%s, %s, %s)", (username, email, hashed_password))
            
            mysql.connection.commit()
            cursor.close()
   
            return  redirect(url_for('login'))
    return render_template('register.html') 

@app.route('/logins', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
            
            username = request.form['logins']
            password = request.form['password']
            print(username)
            cursor = mysql.connection.cursor()
            cursor.execute("SELECT * FROM user WHERE u_name = %s", (username,))
            user1 = cursor.fetchone()
            print(user1)
            if user1 and check_password_hash(user1['u_password'], password):
                access_token = create_access_token(identity=username)
                return redirect(url_for('index'))
            else:
                error_message = "Incorrect username or password. Please try again."
            mysql.connection.commit()
            cursor.close()
    return render_template('login.html')



#########################################################################ADMIN###########################################


@app.route('/admin/user')
def user():
    # Fetch data from the 'users' table
    cur = mysql.connection.cursor()
    cur.execute('SELECT * FROM user')
    users = cur.fetchall()
    cur.close()

    # Pass the data to the template for rendering
    return render_template('admin/user.html', users=users)


@app.route('/admin/delete/<int:user_id>')
def delete_user(user_id):
    cur = mysql.connection.cursor()

    # Delete user by ID
    cur.execute('DELETE FROM user WHERE u_id = %s', (user_id,))
    mysql.connection.commit()
    cur.close()

    return redirect(url_for('user'))

@app.route('/admin/product')
def product():
    # Fetch data from the 'users' table
    cur = mysql.connection.cursor()
    cur.execute('SELECT * FROM product')
    products = cur.fetchall()
    cur.close()

    # Pass the data to the template for rendering
    return render_template('admin/product.html', products=products)
import os
from werkzeug.utils import secure_filename

app.config['UPLOAD_FOLDER'] = 'static/logo/'

@app.route('/admin/add_product', methods=['GET','POST'])
def add_product():
    if request.method == 'POST':
        name =request.form['Name']
        file = request.files['Logo']

        if file:
            filename = secure_filename(file.filename)
            file.save(os.path.join(app.config['UPLOAD_FOLDER'], filename))

    
        cursor = mysql.connection.cursor()
        cursor.execute("INSERT INTO `product`(`p_name`, `p_logo`, `p_status`) VALUES (%s,%s,%s)",(name,file.filename,'Active'))
        mysql.connection.commit()
        return redirect(url_for('product'))


    return render_template("admin/add_product.html")

@app.route('/admin/product_delete/<int:p_id>')
def product_delete(p_id):
    cur = mysql.connection.cursor()

    # Delete user by ID
    cur.execute('DELETE FROM product WHERE p_id = %s', (p_id,))
    mysql.connection.commit()
    cur.close()

    return redirect(url_for('product'))

@app.route('/admin/subproduct')
def subproduct():
    # Fetch data from the 'users' table
    cur = mysql.connection.cursor()
    cur.execute('SELECT sub_product.sp_id, sub_product.sp_name, sub_product.sp_duration, sub_product.sp_credit, sub_product.sp_level, sub_product.sp_logo, sub_product.sp_status, product.p_name FROM sub_product INNER JOIN product ON sub_product.p_id = product.p_id')
    subproducts = cur.fetchall()
    return render_template('admin/sub_product.html', subproducts=subproducts)


app.config['UPLOAD_FOLDERS'] = 'static/sublogo/'

@app.route('/admin/add_sub_product', methods=['GET','POST'])
def add_sub_product():

    cursor = mysql.connection.cursor()
    cursor.execute("Select * from product")
    product = cursor.fetchall()
    mysql.connection.commit()

    if request.method == 'POST':
        name =request.form['Name']
        c_id = request.form['product_id']
        dur = request.form['Dur']
        credit = request.form['credit']
        level = request.form['level']
        file = request.files['Logo']
        
        adur= dur + ' Minutes'
        if file:
            filename = secure_filename(file.filename)
            file.save(os.path.join(app.config['UPLOAD_FOLDERS'], filename))

    
        cursor = mysql.connection.cursor()
        cursor.execute("INSERT INTO `sub_product`(`p_id`, `sp_name`, `sp_duration`, `sp_credit`, `sp_level`, `sp_logo`, `sp_status`) VALUES (%s,%s,%s,%s,%s,%s,%s)",(c_id,name,adur,credit,level,file.filename,'Active',))
        mysql.connection.commit()
        return redirect(url_for('subproduct'))


    return render_template("admin/add_sub_product.html", product=product)

@app.route('/admin/sub_product_delete/<int:sp_id>')
def sub_product_delete(sp_id):
    cur = mysql.connection.cursor() 

    # Delete user by ID
    cur.execute('DELETE FROM sub_product WHERE sp_id = %s', (sp_id,))
    mysql.connection.commit()
    cur.close()

    return redirect(url_for('subproduct'))

@app.route('/admin/spvideos')
def spvideos():
    # Fetch data from the 'users' table
    cur = mysql.connection.cursor()
    cur.execute('SELECT * FROM product')
    spvideos = cur.fetchall()
    cur.close()

    # Pass the data to the template for rendering
    return render_template('admin/product_videos.html', spvideos=spvideos)

@app.route('/admin/sub_videos/<int:p_id>')
def sub_videos(p_id):
    # Fetch data from the 'users' table
    cur = mysql.connection.cursor()
    cur.execute('SELECT * FROM sub_product WHERE p_id = %s',(p_id,))
    subvideos = cur.fetchall()
    cur.close()

    # Pass the data to the template for rendering
    return render_template('admin/sub_videos.html', subvideos=subvideos)

@app.route('/admin/videos/<int:sp_id>')
def videos(sp_id):
    # Fetch data from the 'users' table
    cur = mysql.connection.cursor()
    cur.execute('SELECT * FROM sp_video WHERE sp_id = %s',(sp_id,))
    videos = cur.fetchall()
    cur.close()
    print(sp_id)
    # Pass the data to the template for rendering
    return render_template('admin/videos.html', videos=videos, id=sp_id)


app.config['UPLOAD_FOLDERS1'] = 'static/videos/'

@app.route('/admin/add_videos/<int:id>', methods=['GET','POST'])
def add_videos(id):

    if request.method == 'POST':
        name =request.form['Name']
        dur = request.form['Dur']
        file = request.files['Logo']
        
        adur= dur + ' Minutes'
        if file:
            filename = secure_filename(file.filename)
            file.save(os.path.join(app.config['UPLOAD_FOLDERS1'], filename))

    
        cursor = mysql.connection.cursor()
        cursor.execute("INSERT INTO `sp_video`(`sp_id`, `v_name`, `v_video_name`, `v_duration`) VALUES (%s,%s,%s,%s)",(id,name,file.filename,adur,))
        mysql.connection.commit()
        return redirect(url_for('videos',sp_id = id))

    return render_template('admin/add_videos.html')

####################################################################

@app.route('/index')
def index():
    cur = mysql.connection.cursor()
    cur.execute('SELECT * FROM product')
    products = cur.fetchall()
    cur.close()
    return render_template('index.html',products=products)


@app.route('/subpr/<int:p_id>')
def subpr(p_id):
    # Fetch data from the 'users' table
    cur = mysql.connection.cursor()
    cur.execute('SELECT * FROM sub_product WHERE p_id = %s',(p_id,))
    subpr = cur.fetchall()
    cur.close()

    # Pass the data to the template for rendering
    return render_template('subpr.html', subpr=subpr)

@app.route('/videos1/<int:sp_id>')
def videos1(sp_id):
    # Fetch data from the 'users' table
    cur = mysql.connection.cursor()
    cur.execute('SELECT * FROM sp_video WHERE sp_id = %s',(sp_id,))
    videos = cur.fetchall()
    cur.close()
    print(sp_id)
    # Pass the data to the template for rendering
    return render_template('videos1.html', videos=videos)

if __name__ == '__main__':   
    app.run(debug=True)  
