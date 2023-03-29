<?php
    /*
     * Note: For best security and best practices this should go to the root directory
     * For Project turn in, use project directory.
     * For host deployment, use root directory of project
     * This goes for other includes.
     */

    function connect_db()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "CSC680_Project";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }

