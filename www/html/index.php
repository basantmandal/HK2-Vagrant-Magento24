<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Vagrant LAMP Configuration</title>
    </head>

    <body>
        <div class="container d-flex align-items-center justify-content-center mt-4">
            <div class="row">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Vagrant - LAMP Environment</h5>
                        <p class="card-text">
                        <ul class="list-group">
                            <li class="list-group-item"><?php echo apache_get_version(); ?></li>
                            <li class="list-group-item">PHP <?php echo phpversion(); ?></li>
                            <li class="list-group-item">
                                <?php
                                 $link = mysqli_connect("127.0.0.1", "mage_mysqluser1", 'wF9SZUV8A9qPDcUc', null);

                                 /* check connection */
                                 if (mysqli_connect_errno()) {
                                  printf("MySQL connecttion failed: %s", mysqli_connect_error());
                                 } else {
                                  /* print server version */
                                  printf("MySQL Server %s", mysqli_get_server_info($link));
                                 }
                                 /* close connection */
                                 mysqli_close($link);
                                ?>
                            </li>

                        </ul>
                        </p>
                        <br>

                        <h5 class="card-title text-center">Virtual Host</h5>
                        <p class="card-text">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="http://www.magento24.vagrant" class="card-link text-decoration-none"
                                    target="_blank">http://www.magento24.vagrant</a>
                            </li>
                        </ul>
                        </p>

                        <p>Please add <b>192.168.56.10	www.magento24.vagrant</b> in your Host File else Virtual Host wont work</p>

                        <br>

                        <h5 class="card-title text-center">Other Links</h5>
                        <p class="card-text">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="/phpinfo.php" class="card-link text-decoration-none"
                                    target="_blank">phpinfo()</a>
                            </li>
                            <li class="list-group-item">
                                <a href="/adminer"
                                    class="card-link text-decoration-none" target="_blank">PHPMyAdmin</a>
                            </li>

                        </ul>
                        </p>
                        <br>
                        <h5 class="card-title text-center">Database Connection Result</h5>
                        <p class="card-text">
                        <ul class="list-group">
                            <li class="list-group-item">

                                <?php
                                 $link = mysqli_connect("127.0.0.1", "mage_mysqluser1", 'wF9SZUV8A9qPDcUc', null);
                                 if (!$link) {
                                  echo "MySqli Error: Unable to connect to MySQL." . PHP_EOL;
                                  echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
                                  echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
                                  exit;
                                 }
                                 echo "<b>MySqli Connection</b>: A proper connection to MySQL was made!";
                                 mysqli_close($link);
                                ?>

                            </li>

                            <li class="list-group-item">

                                <?php

                                 $DBuser = 'mage_mysqluser1';
                                 $DBpass = 'wF9SZUV8A9qPDcUc';
                                 $pdo    = null;

                                 try {
                                  $database = 'mysql:host=127.0.0.1:3306';
                                  $pdo      = new PDO($database, $DBuser, $DBpass);
                                  echo "<b>PDO Connection</b>: A proper connection to MySQL was made!";
                                 } catch (PDOException $e) {
                                  echo "PDO Error: Unable to connect to MySQL. Error:\n $e";
                                 }

                                 $pdo = null;
                                ?>

                            </li>
                        </ul>
                        </p>

                    </div>
                </div>

            </div>
        </div>

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    </body>

</html>