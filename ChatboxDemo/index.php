<?php
session_start();
if(!isset($_SESSION['username'])){      /*if the username session is empty*/ 
?>
    <form name="form2" action="login.php" method="POST">
        <table border="1" align="center">
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password"></td>
            </tr>
            <!--colspan merge cells value= how many cells to merge-->
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Login"></td>
            </tr>
            <tr>
                <td colspan="2"><a href="register.php">Register here to get an account</a></td>
            </tr>
        </table>
    </form>
    <?php
exit;
}
?>
    <html>

    <head>
        <title>Chat Box</title>
        <link rel="stylesheet" type="text/css" href="chat.css" />
        <script src="http://code.jquery.com/jquery-1.9.0.js"></script>
        <script>
            function submitChat() {
                /* if (form1.uname.value == '' || form1.msg.value == '') {
                     alert('ALL FIELDS ARE MANDATORY!!!!');
                     return;
                 }
                 // if you need to enter your username
                 form1.uname.readOnly = true;
                 form1.uname.style.border = 'none';*/
                if (form1.msg.value == '') {
                    alert('Enter your message!');
                    return;
                }
                //                var uname = form1.uname.value;
                var msg = form1.msg.value;
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
                    }
                }
                xmlhttp.open('GET', 'insert.php?&msg=' + msg, true);
                xmlhttp.send();
            }
            /*so here we just simply load.. logs.php every 2 secs*/
            $(document).ready(function(e) {
                $.ajaxSetup({
                    /*this line is to disable the cache of a broswer so it does not load old data*/
                    cache: false
                });
                setInterval(function() {
                    $('#chatlogs').load('logs.php');
                }, 2000);
            });

        </script>
    </head>

    <body>
        <form name="form1">
            <table border="1" align="center">
                <tr>
                    <td>Your Chat Name:</td>
                    <td> <b><?php echo $_SESSION['username']; ?></b></td>
                </tr>
                <tr>
                    <td>Your Message:</td>
                    <td>
                        <textarea name="msg" styles="width:200px; height: 70px; align=center;"></textarea><br />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="#" onclick="submitChat()" class="button">Send</a><br /><br />

                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="logout.php">Log out</a><br /><br />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="clear.php">Clear chat</a>
                    </td>
                </tr>
            </table>
            <div id="chatlogs" style="width:100%; text-align:center">
                LOADING CHATLOGS PLEASE WAIT...
            </div>
        </form>
    </body>

    </html>
