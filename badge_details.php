<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Badge Details</title>
    <!-- Link to mijnbadge.css -->
    <link rel="stylesheet" href="CSS/mijnbadge.css">
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="logo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/59/Woordlogo_payoff_Aventus_kleur.jpg" width="175px" height="60px">
        </div>
        <button class="menu-button" id="menu-toggle">☰</button>
    </div>

    <!-- Sidebar -->
    <div id="sidebar" class="sidebar">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="badgepage.html">Badges</a></li>
            <li><a href="voortgang.html">Voortgang</a></li>
            <li><a href="login.html">Login</a></li>
        </ul>
    </div>

    <!-- Main Content -->
    <main>
        <div class="container">
            <?php
            require('./dbconnect.php');

            $badgeId = $_GET['id'] ?? 0; // Get badge ID from URL
            $query = $conn->prepare("SELECT * FROM badge WHERE id = ?");
            $query->bind_param("i", $badgeId);
            $query->execute();
            $result = $query->get_result();

            if ($badge = $result->fetch_assoc()) {
                echo "
                <div class='badge-container'>
                    <img src='{$badge['path']}' alt='{$badge['student_name']}' class='badge-img' style='height: 250px; width: 250px;'>
                    <div class='badge-info'>
                        <h1>{$badge['description']}</h1>
                        <p>{$badge['explanation']}</p>
                        <p><strong>Datum behaald:</strong> {$badge['date_achieved']}</p>
                    </div>
                </div>";
            } else {
                echo "<p>Badge niet gevonden.</p>";
            }
            ?>
        </div>
    </main>

    <script>
        // Sidebar toggle functionality
        document.getElementById('menu-toggle').addEventListener('click', function () {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        });
    </script>
</body>
</html>
