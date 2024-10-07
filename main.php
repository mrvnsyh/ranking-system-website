<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        h2 {
            text-align: center;
        }

        nav {
            background-color: #444;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        nav ul {
            list-style: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>

<body>
    <header>
        <h1>WELCOME TO CLASEMENT RANKING</h1>
    </header>
    <nav>
        <ul>
            <li><a href="#">Beranda</a></li>
            <li><a href="#">Tentang Kami</a></li>
            <li><a href="#">Layanan</a></li>
            <li><a href="#">Kontak</a></li>
        </ul>
    </nav>
    <div class="container">
        <h2>MATCH SPORT</h2>
            <body>
                <form method="POST">
                    <label>Team Home:</label>
                    <input type="text" name="team_home" required><br><br>

                    <label>Team Away:</label>
                    <input type="text" name="team_away" required><br><br>

                    <label>Score Home:</label>
                    <input type="number" name="score_home" required><br><br>

                    <label>Score Away:</label>
                    <input type="number" name="score_away" required><br><br>

                    <button type="submit" name="binput" value="<?= @$_POST['binput'] ?>">Submit</button>
                </form>
            </body>
            <?php
            require 'Databasebnsp.php'; // Sertakan file Databasebnsp.php di sini
            require 'TeamController.php'; // Sertakan file TeamController.php di sini
            require 'Inputmatch.php';   // Sertakan file Inputmatch.php di sini
            require 'UpdateController.php'; // Sertakan file UpdateController.php di sini

            $database = new Databasematch();
            $teamController = new TeamController();
            $inputmatch = new Inputmatch();
            $updatecontroller = new UpdateController();

            // Panggil metode inputmatchteam tergantung pada tombol yang ditekan
            if (isset($_POST['binput'])) {
                 $inputmatch->inputmatchteam($teamHome, $teamAway, $scoreHome, $scoreAway);
            }  else {
                echo "Data pertandingan tidak ditemukan.";
            }
            ?>
    </div>
    <div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">TEAM HOME</th>
                    <th scope="col">TEAM AWAY</th>
                    <th scope="col">SCORE HOME</th>
                    <th scope="col">SCORE AWAY</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Ambil data pertandingan dari database
                $showMatchesQuery = "SELECT team_home, team_away, score_home, score_away FROM `match`";
                $result = $database->getConnection()->query($showMatchesQuery);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["team_home"] . "</td>";
                        echo "<td>" . $row["team_away"] . "</td>";
                        echo "<td>" . $row["score_home"] . "</td>";
                        echo "<td>" . $row["score_away"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "Data pertandingan tidak ditemukan.";
                }
                ?>
            </tbody>
        </table>
    </div>
    <div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">TEAM</th>
                    <th scope="col">POINT</th>
                    <th scope="col">GD</th>
                    <th scope="col">GF</th>
                    <th scope="col">GA</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  // Panggil metode showDatahigh atau showDatalow tergantung pada tombol yang ditekan
                if (isset($_POST['bhighest'])) {
                    $teamController->showDatahigh();
                } elseif (isset($_POST['blowest'])) {
                    $teamController->showDatalow();
                }
                ?>
            </tbody>
        </table>
    </div>
    <hr>
    <div class="col-md-6 mx-auto">
        <form method="POST">
            <div class="text-center">
                <button class="btn btn-primary" name="bhighest" value="<?= @$_POST['bhighest'] ?>" type="submit">Highest</button>
                <button class="btn btn-danger" name="blowest" value="<?= @$_POST['blowest'] ?>" type="submit">Lowest</button>
            </div>
        </form>
    </div>
    <hr>
    <footer>
        <p>Terima Kasih</p>
    </footer>
</body>

</html>