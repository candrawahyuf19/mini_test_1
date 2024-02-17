<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="https://sman4kediri.sch.id/eperpus/assets/home/image/slide-2.png">
    <title>Authenticate User</title>

    <style>
        body {
            background-image: url('assets/icon/wave-haikei.svg');
            height: 100vh;
            overflow: hidden;

            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .form-box {
            max-width: 400px;
            background: #f1f7fe;
            overflow: hidden;
            border-radius: 16px;
            color: #010101;
            position: relative;
            margin: auto;
            top: 20%;
        }

        .form {
            position: relative;
            display: flex;
            flex-direction: column;
            padding: 32px 24px 24px;
            gap: 16px;
            text-align: center;
        }

        /*Form text*/
        .title {
            font-weight: bold;
            font-size: 1.6rem;
        }

        .subtitle {
            font-size: 1rem;
            color: #666;
        }

        /*Inputs box*/
        .form-container {
            overflow: hidden;
            border-radius: 8px;
            background-color: #fff;
            margin: 1rem 0 .5rem;
            width: 100%;
        }

        .input {
            background: none;
            border: 0;
            outline: 0;
            height: 40px;
            width: 100%;
            border-bottom: 1px solid #eee;
            font-size: .9rem;
            padding: 8px 15px;
        }

        .form-section {
            padding: 16px;
            font-size: .85rem;
            background-color: #e0ecfb;
            box-shadow: rgb(0 0 0 / 8%) 0 -1px;
        }

        .form-section a {
            font-weight: bold;
            color: #0066ff;
            transition: color .3s ease;
        }

        .form-section a:hover {
            color: #005ce6;
            text-decoration: underline;
        }

        /*Button*/
        .form button {
            background-color: #0066ff;
            color: #fff;
            border: 0;
            border-radius: 24px;
            padding: 10px 16px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color .3s ease;
        }

        .form button:hover {
            background-color: #005ce6;
        }

        #register {
            display: none;
        }

        #go_register,
        #go_login {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="form-box" id="login">
        <form class="form">
            <span class="title">Login</span>
            <span class="subtitle">Find your window to the world!</span>
            <div class="form-container">
                <input type="email" class="input" placeholder="Email">
                <input type="password" class="input" placeholder="Password">
            </div>
            <button>Login</button>
        </form>
        <div class="form-section">
            <p>Don't have account? <a id="go_register">Register</a> </p>
        </div>
    </div>
    <div class="form-box" id="register">
        <form class="form">
            <span class="title">Registration</span>
            <span class="subtitle">Create a free account with your email.</span>
            <div class="form-container">
                <input type="text" class="input" placeholder="Full Name">
                <input type="email" class="input" placeholder="Email">
                <input type="password" class="input" placeholder="Password">
            </div>
            <button>Register</button>
        </form>
        <div class="form-section">
            <p>Have an account? <a id="go_login">Login</a> </p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script>
        $('#go_register').on('click', function() {
            $('#register').fadeIn();
            $('#login').hide();
        });

        $('#go_login').on('click', function() {
            $('#register').hide();
            $('#login').fadeIn();
        });
    </script>
</body>

</html>
