<?php

// start session
session_start();
if (isset($_SESSION["login"])
    && $_SESSION["login"] == "ok") {

// create database if not exists
include "dbcontroller.php";
// next step

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

                <p>Subject > Theme > Subcategory</p>

                <button><< previous</button>
                <button>next >></button>

            <form>
                <label for="question">
                  <input type="text" placeholder="question" id="question" name="question">
                </label>

                  <br>

                <label for="answer">
                  <textarea type="text" placeholder="answer" id="answer" name="answer"></textarea>
                </label>
            </form>

                <button>new</button>
                <button>save</button>
                <button>update</button>
                <button>delete</button>
                <button>upload picture</button>

          </dd>

          <dt>SETTINGS</dt>
          <dd>

            <form>
                <label>
                    Subject
                    <select id="subject" name="subject">
                        <option value="math">Math</option>
                        <option value="english">English</option>
                        <option value="french">French</option>
                        <option value="geographie">Geographie</option>
                        <option value="history">History</option>
                    </select>
                </label>

                <label>
                    Theme
                    <select id="theme" name="theme">
                        <option>Pronouns</option>
                        <option>Erosion</option>
                        <option>Second World War</option>
                        <option>Pythagoras</option>
                        <option>Subjonctif</option>
                    </select>
                </label>

                <label>
                    Subcategory
                    <select id="chapter" name="chapter">
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
