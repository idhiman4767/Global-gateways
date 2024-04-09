<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Global Gateways</title>
    <style>
        body {
    font-family: 'Roboto', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

header {
    text-align: center;
    margin-bottom: 30px;
}

nav ul {
    list-style-type: none;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    text-decoration: none;
    color: #333;
    font-weight: 600;
    transition: color 0.3s ease;
}

nav ul li a:hover {
    color: #4CAF50;
}

section {
    margin-bottom: 40px;
}

section h2 {
    margin-bottom: 10px;
}

form label {
    font-weight: bold;
}

form input[type="text"],
form input[type="email"],
form input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    transition: border-color 0.3s ease;
}

form input[type="text"]:focus,
form input[type="email"]:focus {
    border-color: #4CAF50;
}

form input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    cursor: pointer;
    border: none;
}

form input[type="submit"]:hover {
    background-color: #45a049;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    margin-bottom: 5px;
}

        </style>

</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome to Global Gateways</h1>
            <nav>
                <ul>
                    <li><a href="#about">About</a></li>
                    <li><a href="#signup">Signup</a></li>
                    <li><a href="#tourists">Tourists</a></li>
                    <li><a href="#trip">Trip Info</a></li>
                </ul>
            </nav>
        </header>
        <section id="about">
            <h2>About Us</h2>
            <?php
            // Database connection parameters
            $servername = "localhost";
            $username = "root"; // Your MySQL username
            $password = ""; // Your MySQL password
            $dbname = "project1"; // Your MySQL database name

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch about us information from the database
            $sql = "SELECT title, description FROM about_us";
            $result = $conn->query($sql);

            // Display about us information
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<h3>" . $row["title"]. "</h3>";
                    echo "<p>" . $row["description"]. "</p>";
                }
            } else {
                echo "No about us information available";
            }

            // Close database connection
            $conn->close();
            ?>
        </section>
        <section id="signup">
            <h2>Signup for the Trip</h2>
            <form action="process_signup.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required><br><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>
                <input type="submit" value="Submit">
            </form>
        </section>
        <section id="tourists">
            <h2>List of Tourists</h2>
            <ul>
                <?php
                // Database connection parameters
                $servername = "localhost";
                $username = "root"; // Your MySQL username
                $password = ""; // Your MySQL password
                $dbname = "project1"; // Your MySQL database name

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch tourists information from the database
                $sql = "SELECT name, email FROM tourists";
                $result = $conn->query($sql);

                // Display tourists information
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<li>" . $row["name"]. " - " . $row["email"]. "</li>";
                    }
                } else {
                    echo "0 results";
                }

                // Close database connection
                $conn->close();
                ?>
            </ul>
        </section>
        <section id="trip">
            <h2>Trip Information</h2>
            <?php
            // Database connection parameters
            $servername = "localhost";
            $username = "root"; // Your MySQL username
            $password = ""; // Your MySQL password
            $dbname = "project1"; // Your MySQL database name

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch trip information from the database
            $sql = "SELECT title, description FROM trip_information";
            $result = $conn->query($sql);

            // Display trip information
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<h3>" . $row["title"]. "</h3>";
                    echo "<p>" . $row["description"]. "</p>";
                }
            } else {
                echo "No trip information available";
            }

            // Close database connection
            $conn->close();
            ?>
        </section>
    </div>
</body>
</html>