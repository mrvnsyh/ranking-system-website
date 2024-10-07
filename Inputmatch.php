<?php

class Inputmatch    {
    private $database;
    private $connection;
    
        public function __construct()
        {
            $this->database = new Databasematch();
            $this->connection = $this->database->getConnection(); // Initialize the connection
        }
        public function inputmatchteam($teamHome, $teamAway, $scoreHome, $scoreAway) {            
            $teamHome = isset($_POST['team_home']) ? $_POST['team_home'] : '';
            $teamAway = isset($_POST['team_away']) ? $_POST['team_away'] : '';
            $scoreHome = isset($_POST['score_home']) ? $_POST['score_home'] : '';
            $scoreAway = isset($_POST['score_away']) ? $_POST['score_away'] : '';

            // Check if any of the required fields are empty
            if (empty($teamHome) || empty($teamAway)) {
                // Handle the error or provide a message to the user 
                echo "Team names cannot be empty.";
            } else {
                // Memasukkan data ke dalam tabel 'match'
                $insertMatchQuery = "INSERT INTO `match` (team_home, team_away, score_home, score_away) VALUES (?, ?, ?, ?)";
                // Prepare and execute the SQL query
                $stmt = $this->database->getConnection()->prepare($insertMatchQuery);
                // Bind parameters and execute the query
                $stmt->bind_param("ssii", $teamHome, $teamAway, $scoreHome, $scoreAway);

                if ($stmt->execute()) {
                    echo "Data berhasil dimasukkan ke dalam database.";
                } else {
                    echo "Terjadi kesalahan saat memasukkan data ke dalam database.";
                }
            }   
        }
        public function getConnection()
        {
            return $this->connection;
        }
    }
?>