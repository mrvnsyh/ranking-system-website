<?php
    class UpdateController {
        private $database;
        public function __construct()
        {
            $this->database = new Databasematch();
        }
        public function updatematch() {
                // Update data tim (home) gol dan kemasukan
                $updateTeamHomeQuery = "UPDATE `team` SET gf = gf + ?, ga = ga + ? WHERE name = ?";
                $stmt = $this->database->getConnection()->prepare($updateTeamHomeQuery);
                $stmt->bind_param("iss", $scoreHome, $scoreAway, $teamHome);
                $stmt->execute();
                $stmt->close();

                // Update data tim (away) gol dan kemasukan
                $updateTeamAwayQuery = "UPDATE `team` SET gf = gf + ?, ga = ga + ? WHERE name = ?";
                $stmt = $this->database->getConnection()->prepare($updateTeamAwayQuery);
                $stmt->bind_param("iss", $scoreAway, $scoreHome, $teamAway);
                $stmt->execute();
                $stmt->close();

                // Update selisih gol dan kemasukan
                $updateGoalDifferenceQuery = "UPDATE `team` SET gd = gf - ga WHERE name = ?";
                $stmt = $this->database->getConnection()->prepare($updateGoalDifferenceQuery);
                $stmt->bind_param("s", $teamAway);
                $stmt->execute();
                $stmt->close();
        }
}


