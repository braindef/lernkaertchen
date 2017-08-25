<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>LOGIN | danielannaheim.me</title>
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <meta name="robots" content="noindex, nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <style>
      * {
          margin: 0px;
          padding: 0px;
          box-sizing: border-box;
          font-family: 'Arial';
      }
      form {
          position: relative;
          width: 180px;
          height: auto;
          text-align: left;
          border: 2px solid black;
          padding: 15px;
          left: 50%;
          margin-left: -90px;
          margin-top: 30px;
      }
      input#name, input#passwort {
          border: 2px solid black;
          background: transparent;
          width: 100%;
          padding: 4px 6px;
      }
      #button {
          padding: 3px 5px;
          margin-top: 10px;
          border: 2px solid black;
          background: transparent;
      }
      .fehler {
          color: red;
      }
  </style>

</head>
<body>

    <form method="post" action="login.php">

        <?php
            if (isset($_GET["f"]) && $_GET["f"] == 1) {
                echo "<p class='fehler'>Login-Daten nicht korrekt!</p>";
            }
        ?>

        Name: <br />
        <input type="text" name="name" id="name" />
        <br />
        Passwort: <br />
        <input type="password" name="passwort" id="passwort" />
        <br />
        <input type="submit" id="button" value="Login" />
    </form>

</body>
</html>
