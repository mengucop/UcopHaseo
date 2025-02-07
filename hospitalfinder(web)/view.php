<?php
// User Feedback Page for Hospital Finder App
require_once('db.php');

// Fetch user feedback from the database, ordered by oldest first
$query = "SELECT * FROM checkin ORDER BY date ASC";  // Changed DESC to ASC
$result = mysqli_query($link, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Finder | User Feedback</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body {
            background: #f4f4f4;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #00796b;
        }
        .feedback-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }
        .feedback-card {
            background: #fff;
            padding: 20px;
            border-left: 5px solid #00796b;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: calc(50% - 10px); /* Adjust the width to fit two cards in a row */
        }
        .feedback-card h2 {
            font-size: 18px;
            margin-bottom: 5px;
            color: #333;
        }
        .feedback-card p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }
        .feedback-card blockquote {
            background: #e0f7fa;
            padding: 15px;
            font-style: italic;
            border-left: 5px solid #00796b;
            margin: 15px 0;
            color: #333;
        }
        .feedback-card a {
            color: #00796b;
            font-weight: bold;
            text-decoration: none;
        }
        .feedback-card a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>📢 User Feedback & Check-Ins</h1>
    
    <?php if (mysqli_num_rows($result) > 0) { ?>
        <div class="feedback-row">
            <?php while ($row = mysqli_fetch_assoc($result)) { 
                // Random latitude and longitude generation for the display
                $latitude = rand(3, 6) + rand(0, 999999) / 1000000; // Random latitude between 3 and 6
                $longitude = rand(101, 105) + rand(0, 999999) / 1000000; // Random longitude between 101 and 105
            ?>
                <div class="feedback-card">
                    <h2>🆔 Check-in #<?= htmlspecialchars($row['id']) ?></h2>
                    <p><strong>📅 Date:</strong> <?= htmlspecialchars($row['date']) ?></p>
                    <p><strong>📱 User Agent:</strong> <?= htmlspecialchars($row['user_agent']) ?></p>
                    <p><strong>📞 Contact:</strong> <a href="tel:<?= htmlspecialchars($row['phone']) ?>">Call User</a></p>
                    <p><strong>✉️ From:</strong> <a href="mailto:<?= htmlspecialchars($row['email']) ?>"> <?= htmlspecialchars($row['name']) ?></a></p>
                    <blockquote>📝 <?= nl2br(htmlspecialchars($row['notes'])) ?></blockquote>
                    <p><strong>📍 Location:</strong> Latitude: <?= number_format($latitude, 6) ?>, Longitude: <?= number_format($longitude, 6) ?></p>
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <p style="text-align:center; color:#777;">No feedback available yet. Be the first to check in! 🚀</p>
    <?php } ?>
</div>

</body>
</html>
