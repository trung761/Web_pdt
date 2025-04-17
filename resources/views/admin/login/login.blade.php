<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Đăng nhập - UAH</title>
  <style>
        @import  url(https://fonts.googleapis.com/css?family=Po ppins: 100, 100italic, 200, 200italic, 300, 300italic, regula r, italic, 500, 500italic, 600, 600italic, 700, 700italic, 80 0,800italic, 900, 900italic);

        * {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
        }

        section {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: 100%;
            background: url("img/background_loginadmin.jpeg");
            background-position: center;
            background-size: cover;
        }

        .form-box {
            position: relative;
            width: 400px;
            height: 450px;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #0000008f;
            border: 2px solid #fff;
            border-radius: 10px;
        }

        h2 {
            font-size: 2rem;
            color: #fff;
            text-align: center;
        }

        .input-box {
            position: relative;
            margin-top: 30px;
            width: 320px;
            border-bottom: 2px solid #fff;
        }

        .input-box label {
            position: absolute;
            top: 50%;
            left: 5px;
            color: #fff;
            transform: translateY(-50%);
            pointer-events: none;
            font-size: 1rem;
            transition: 0.5s;
        }

        .input-box input {
            width: 100%;
            height: 25px;
            background: transparent;
            outline: none;
            border: none;
            font-size: 1em;
            padding: 0 35px 0 5px;
            color: #fff;
        }

        input:focus~label,
        input:valid~label {
            top: -10px;
        }

        .input-box ion-icon {
            position: absolute;
            right: 8px;
            color: #fff;
            font-size: 1.2em;
        }

        .f-password {
            margin: 15px 0 15px;
            font-size: 0.9em;
            color: #fff;
            display: flex;
            justify-content: space-between;
        }

        .f-password label input {
            margin-right: 3px;
        }

        .f-password a:hover {
            color: #fff;
        }

        button {
            width: 100%;
            height: 50px;
            border-radius: 0px 10px 0px 10px;
            font-size: 1.2rem;
            font-weight: 700;
            margin-top: 20px;
            background: #fff;
            color: #000;
        }

        button:hover {
            background: transparent;
            color: #fff;
        }

        .signup {
            font-size: 0.8rem;
            color: #fff;
            margin-top: 20px;
        }

        .signup a:hover {
            color: #fff;
        }

        .validate_loginadmin {
            font-size: 13px;
            color: red;
            text-align: right;
            padding-top: 5px;

        }
    </style>
</head>
<body>
    <section>
    <form method="POST" action="{{ url('/login') }}">
    @csrf
    <div class="input-box" style="border:none; display:flex; justify-content:center; align-items: center;" >
        <img src="img/CTUT_logo_nen.png" class="" style="width:40%;">
    </div>
    <div class="input-box">
        <ion-icon name="mail-outline"></ion-icon>
        <input type="text" name="username" required>
        <label for="#">Username</label>
    </div>
    <div class="input-box">
        <ion-icon name="lock-closed-outline"></ion-icon>
        <input type="password" name="password" required>
        <label for="#">Password</label>
    </div>
    <div class="f-password">
        <label for="#">
            <input type="checkbox" name="remember">
            Remember Me
        </label>
    </div>
    <button type="submit">Đăng nhập</button>

    @if ($errors->has('login'))
        <div class="validate_loginadmin">{{ $errors->first('login') }}</div>
    @endif
</form>

    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</body>
</html>
