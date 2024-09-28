<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{env('APP_NAME')}}</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .adminBody {
            background: radial-gradient(rgb(210, 241, 223), rgb(211, 215, 250), rgb(186, 216, 244)) 0% 0% / 400% 400%;
        }

        .admin-login-form {
            padding: 15%;
            padding-top: 0;
            padding-bottom: 0;
        }

        .adminlogin-input {
            padding: 2%;
            border-radius: 10px;
        }

        .social-icons-admin-login {
            width: 100%;
            padding: 15%;
            padding-top: 3%;
            padding-bottom: 3%;
        }

        .social-icons-admin-login i {
            font-size: 2rem;
        }

        .social-icons-admin-login li {
            padding-left: 25px;
            padding-right: 25px;
            padding-top: 5px;
            padding-bottom: 5px;
            transition: all 200ms ease-in;
            cursor: pointer;

            &:hover {
                background: #c7d8f7;
            }
        }

        @media (max-width:940px) {
            .logo-admin img {
                width: 140px;
            }

            .admin-login-form .label-class {
                font-size: 1rem !important;
            }

            .social-media-container {
                .with {
                    font-size: 1rem;
                }

                .social-icons-admin-login li i {
                    font-size: 1rem;
                }
            }
        }

        @media (max-width:780px) {
            .adminlogin-input{
                padding: 3px;
                border-radius: 5px;
            }

            .login-main {
                padding: 0 !important;
                /* margin: 0 !important; */
            }

            .social-icons-admin-login li {
                padding-left: 15px;
                padding-right: 15px;
                padding-top: 5px;
                padding-bottom: 5px;
                
            }
        }

        @media (max-width:540px) {
            .adminlogin-input{
                padding: 3px;
                border-radius: 5px;
            }

            .social-icons-admin-login li {
                padding-left: 10px;
                padding-right: 10px;
                padding-top: 5px;
                padding-bottom: 5px;
            }
            .submit-admin{
                padding-left: 10px !important;
                padding-right: 10px !important;
                padding-top: 5px !important;
                padding-bottom: 5px !important;
            }
            .social-media-container {
                .with {
                    font-size: 0.7rem;
                    padding-bottom: 0;
                }

                .social-icons-admin-login li{
                    padding: 0;
                }
                .social-icons-admin-login li i {
                    font-size: 0.8rem;
                    
                }
            }
        }

    </style>

</head>

<body class="adminBody">



    @yield('content')






    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>