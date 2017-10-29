<?php

// start session
session_start();
if (isset($_SESSION["login"])
    && $_SESSION["login"] == "ok") {

// create database if not exists
require_once("dbcontroller.php");
$db = new DBController();

?>


<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo "Hallo {$_SESSION["name"]}" ?></title>
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
  <meta name="robots" content="noindex, nofollow">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <script src="js/html5shiv.js"></script>
  <script src="js/prefixfree.js"></script>
  <link rel="stylesheet" href="css/styles.css">
  <script src="js/jquery.js"></script>
</head>
<body>

  <div class="container">

    <header>

        <h1>Learning Software</h1>

    </header>

    <main>

        <dl id="accordion">

          <dt>LEARN</dt>
          <dd>

            <form method="post" enctype="multipart/form-data">
                <button><< previous</button>
                <button src="next.php">next >></button>

                <label for="subject">
                  <input type="text" placeholder="subject" id="subject" name="subject" value="">
                </label>

                  <br>

                <label for="theme">
                  <input type="text" placeholder="theme" id="theme" name="theme">
                </label>

                  <br>

                <label for="category">
                  <input type="text" placeholder="category" id="category" name="category">
                </label>

                  <br>

                <label for="question">
                  <input type="text" placeholder="question" id="question" name="question">
                </label>

                  <br>

                <label for="answer">
                  <textarea type="text" placeholder="answer" id="answer" name="answer"></textarea>
                </label>

                <button>new</button>
                <button onclick="this.form.action='save.php';" type="submit">save</button>
                <button>update</button>
                <button>delete</button>
                <input type="file" name="image" id="image">


          </dd>

          <dt>SETTINGS</dt>
          <dd>


                <label>
                    Subject
                    <select id="set-subject" name="set-subject">
                        <?php
                            $query="SELECT DISTINCT subject FROM lernkarten;";
                            $resultset = $db->runQuery($query);
                            foreach($resultset as $key => $value) {
                                echo "<option value=".$resultset[$key]['subject'].">".$resultset[$key]['subject']."</option>";
                            }
                        ?>
                    </select>
                </label>

                <label>
                    Theme
                    <select id="set-theme" name="set-theme">
                        <!-- SELECT WHERE -selected subject- DISTINCT theme FROM lernkarten; -->
                        <?php
                            $query="SELECT DISTINCT theme FROM lernkarten;";
                            $resultset = $db->runQuery($query);
                            foreach($resultset as $key => $value) {
                                echo "<option value=".$resultset[$key]['theme'].">".$resultset[$key]['theme']."</option>";
                            }
                        ?>
                    </select>
                </label>

                <label>
                    Category
                    <select id="set-category" name="set-category">
                        <option>John F. Kennedy</option>
                        <option>Alexander von Humbolt</option>
                        <option>Irgendwas</option>
                        <option>Winkel</option>
                        <option>Blah</option>
                    </select>
                </label>

                <label>
                    Mode
                    <select id="mode" name="mode">
                        <option value="list">List</option>
                        <option value="random">Random</option>
                    </select>
                </label>
            </form>

          </dd>

          <dt>SEARCH</dt>
          <dd>

            <form>
                <label>
                  <input type="search" id="search" placeholder="search" list="Vögel">
                  <datalist id="Vögel">
                    <option value="Amsel"></option>
                    <option value="Buntspecht"></option>
                    <option value="Drossel"></option>
                    <option value="Eisvogel"></option>
                    <option value="Fink"></option>
                    <option value="Graugans"></option>
                    <option value="Meise"></option>
                    <option value="Spatz"></option>
                    <option value="Specht"></option>
                  </datalist>
                </label>
            </form>

                <button>get</button>

          </dd>

          <dt>IMPORT / EXPORT</dt>
          <dd>

            <input type="file" name="import" id="import">

            <input type="file" name="export" id="export">

          </dd>

        </dl>

    </main>

    <footer>

        <p>&copy; Learning Software by Daniel Annaheim</p>
        <p><a href="logout.php">Logout</a></p>

    </footer>

  </div>

      <script src="js/accordion.js"></script>

</body>
</html>

<?php
} else {
  $host = htmlspecialchars($_SERVER["HTTP_HOST"]);
  $uri = rtrim(dirname(htmlspecialchars($_SERVER["PHP_SELF"])), "/\\");
  $extra = "index.php";
  header("Location: http://$host$uri/$extra");
}
?>
