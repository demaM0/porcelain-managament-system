﻿<?php session_start(); ?>
<html>
    
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="styletest.php">
    <script>
        window.onload = function() {
            document.getElementById('Trans_login').innerHTML = "login";
            document.getElementById('Trans_header').innerHTML = "Enter your login coordinates";
        }
    </script>
</head>

<body>
    <div id="container3">
        <div id="container">
            <div id="box">
                <h1 id="formHeader"> Login </h1>


                <hr>
                <form>

                    <label for="Lang">Choose a Language:</label>
                    <select id="language" onChange="update()">
                        <option value="2">English</option>
                        <option value="1">Arabic</option>

                    </select>

                    <br><br>

                </form>

                <form onsubmit="return login(event)" method="POST">
                    <label id="Trans_header"></label>
                    <input type="number" name="id" id="#id" placeholder="Enter your ID" required>
                    <input type="password" name="pass" id="#pass" placeholder="Enter your Password" required>
                    <button type="submit" name="notify" id="Trans_login"> </button>
                </form>

                <div id="error"></div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function getTranslation(trans_key, tag_id) {
            const select = document.getElementById('language');
            const option = select.options[select.selectedIndex];
            let lang_code = option.value


            $.ajax({
                type: "GET",
                url: '../Controller/Translation/Translation.php',
                dataType: 'json',
                data: {
                    lang_code: lang_code,
                    trans_key: trans_key
                },

                success: function(obj, textstatus) {

                    if (!('error' in obj)) {
                        document.getElementById(tag_id).innerHTML = obj.result;
                    }

                }
            });
        }

        function login(event) {
            event.preventDefault();
            var user_id = document.getElementById('#id').value;
            var pass = document.getElementById('#pass').value;

            $.ajax({
                type: "POST",
                url: '../Controller/logincontroller.php',
                dataType: 'json',
                data: {
                    id: user_id,
                    pass: pass
                },

                success: function(obj, textstatus) {

                    if (obj.result == "success_login") {
                        sessionStorage.setItem("user_idG", user_id)
                        window.location = '../Views/Navigation/premissions.html'
                    } else {
                        getTranslation(obj.result, "error");
                    }

                }
            });

            return false;
        }

        function update() {


            getTranslation("btn_login", "Trans_login");
            getTranslation("trans_header", "Trans_header");


        }
    </script>
</body>


</html>