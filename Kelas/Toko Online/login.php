<?php
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM akun WHERE email='$email' and password='$password'";
    
    
    $result = mysqli_query($koneksi, $sql);
    
    if ($row = mysqli_fetch_assoc($result)) {
        header("Location:main.php");

            $_SESSION['user_id'] = $row['id']; // Simpan ID pengguna
            $_SESSION['emailAddres'] = $row['email']; // Simpan email pengguna
        
    } else {
        // Ambil data pengguna
        echo "<h1>Email atau Password Salah</h1>";
        
        ;
    }
}
?>



<head>
<style>
        /* Your existing CSS styles */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

/* .wrapper {
    position: relative;
    width: 400px;
    height: 440px;
    background: transparent;
    border: 2px solid rgba(225, 225, 255, .5);
    border-radius: 20px;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 30px rgba(0, 0, 0, .5);
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

.wrapper .form-box {
    width: 100%;
    padding: 40px;
    color: #fff;
}

.wrapper .icon-close {
    position: absolute;
    top: 0;
    right: 0;
    width: 45px;
    height: 45px;
    background: #fff;
    font-size: 2em;
    color: black;
    display: flex;
    justify-content: center;
    align-items: center;
    border-bottom-left-radius: 20px;
    cursor: pointer;
    z-index: 1;
}

.form-box h2 {
    font-size: 2em;
    color: #fff;
    text-align: center;
}

.input-box {
    position: relative;
    width: 100%;
    height: 50px;
    border-bottom: 2px solid #fff;
    margin: 30px 0;
}

.input-box label {
    position: absolute;
    top: 50%;
    left: 5px;
    transform: translateY(-50%);
    font-size: 1em;
    color: #fff;
    font-weight: 500;
    pointer-events: none;
    transition: .5s;
}

.input-box input:focus~label,
.input-box input:valid~label {
    top: -5px;
}

.input-box input {
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    color: #fff;
    font-weight: 600;
    padding: 0 35px 0 5px;
}

.input-box .icon {
    position: absolute;
    right: 8px;
    font-size: 1.2em;
    color: #fff;
    line-height: 57px;
}

.remember-forgot {
    font-size: .9em;
    color: #fff;
    font-weight: 500;
    margin: -15px 0 15px;
    display: flex;
    justify-content: space-between;
}

.remember-forgot label input {
    accent-color: #fff;
    margin-right: 3px;
}

.remember-forgot a {
    color: #fff;
    text-decoration: none;
}

.remember-forgot a:hover {
    text-decoration: underline;
}

.btn {
    width: 100%;
    height: 45px;
    background: #fff;
    border: none;
    outline: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 1em;
    color: #000;
    font-weight: 500;
}

.login-register {
    font-size: .9em;
    color: #fff;
    text-align: center;
    font-weight: 500;
    margin: 25px 0 10px;
}

.login-register p a {
    color: #fff;
    text-decoration: none;
    font-weight: 600;
    display: flex;
    justify-content: space-evenly;
}

.login-register p a:hover {
    text-decoration: underline;
}

button {
    color: #fff;
} */

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap');

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
}

body {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: url('./jdmcarnight.jpg') no-repeat center center fixed;
    background-size: cover;
}

.wrapper {
    position: relative;
    width: 400px;
    background: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
    border-radius: 20px; /* Rounded corners */
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.5); /* Shadow effect */
}

.icon-close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 1.5em;
    color: #333; /* Close icon color */
}

.form-box {
    padding: 40px; /* Padding inside the form box */
}

.form-box h2 {
    font-size: 2em; /* Title size */
    color: #333; /* Title color */
    text-align: center; /* Centered title */
}

.input-box {
    position: relative;
    width: 100%;
    margin-bottom: 30px; /* Space between inputs */
}

.input-box label {
    position: absolute;
    left: 10px; /* Label positioning */
    top: 50%;
    transform: translateY(-50%);
    font-size: 2.5vh; /* Label size */
    color: #666; /* Label color */
    pointer-events: none;
    transition: .5s;
}

.input-box input:focus~label,
.input-box input:valid~label {
    top: -10px;
}

.input-box input {
    width: 100%;
    height: 50px; /* Input height */
    border-radius: 5px; /* Rounded input corners */
    border: 1px solid #ccc; /* Input border color */
    padding-left: 40px; /* Space for icon */
}

.input-box input::placeholder {
    color: transparent; /* Hide default placeholder */
}

.input-box input:focus,
.input-box input:not(:placeholder-shown) {
    border-color: #007bff; /* Change border color on focus or when filled */
}

.input-box .icon {
    position: absolute;
    left: 10px; /* Icon positioning */
    top: 50%;
    transform: translateY(-50%);
}

.btn {
   width: 100%;
   height: 45px; 
   background-color:#007bff; /* Button background color */
   border-radius :6px; /* Button rounded corners */
   color:#fff; /* Button text color */
   border:none; /* Remove border */
   cursor:pointer; /* Pointer cursor on hover */
   font-size:1em; /* Button text size */
   transition:.3s ease; /* Transition effect for hover */
}

.btn:hover {
   background-color:#0056b3; /* Darker blue on hover */
}

    </style>
</head>


<div class="wrapper">
        <a href="?menu=index.php" class="icon-close">
           <ion-icon name="close"></ion-icon>
        </a>

        <div class="form-box register">
           <h2>Login</h2>
           <form action="" method="post">
               <div class="input-box">
                   <span class="icon"><ion-icon name="mail"></ion-icon></span>
                   <input type="email" name="email" required placeholder="Email">
                   <label>Email</label>
               </div>

               <div class="input-box">
                   <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                   <input type="password" name="password" required placeholder="Password">
                   <label>Password</label>
               </div>

               <button type="submit" name="login" class="btn">Login</button>
           </form>
       </div>
   </div>