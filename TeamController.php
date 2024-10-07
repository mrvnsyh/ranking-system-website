<?php

class TeamController{
    private $database;
    private $result;
    private $connection;

    public function __construct()
    {
        $this->database = new Databasematch();
        $this->connection = $this->database->getConnection(); // Initialize the connection
    }
    public function showDatahigh()
    {
        if (isset($_POST['bhighest'])) {
            $showDatahighQuery = "SELECT name, point, gd, gf, ga FROM `team` ORDER BY point DESC, gd DESC, gf DESC, ga DESC";
            $this->result = $this->database->getConnection()->query($showDatahighQuery);

            // Mencetak data (contoh)
            if ($this->result->num_rows > 0) {
                while ($row = $this->result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["point"] . "</td>";
                    echo "<td>" . $row["gd"] . "</td>";
                    echo "<td>" . $row["gf"] . "</td>";
                    echo "<td>" . $row["ga"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "Data tim tidak ditemukan.";
            }
        }
    }
    public function showDatalow()
    {
        if (isset($_POST['blowest'])) {
            $showDatalowQuery = "SELECT name, point, gd, gf, ga FROM `team` ORDER BY point ASC, gd ASC, gf ASC, ga ASC";
            $this->result = $this->database->getConnection()->query($showDatalowQuery);
            // Mencetak data (contoh)
            if ($this->result->num_rows > 0) {
                while ($row = $this->result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["point"] . "</td>";
                    echo "<td>" . $row["gd"] . "</td>";
                    echo "<td>" . $row["gf"] . "</td>";
                    echo "<td>" . $row["ga"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "Data tim tidak ditemukan.";
            }
        }
    }
    public function getResult()
    {
        return $this->result;
    }

    public function getConnection()
    {
        return $this->connection;
    }

}
