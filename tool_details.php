<?php
include('server/databaseconn.php');

$tool_id = isset($_GET['tool_id']) ? intval($_GET['tool_id']) : 0;

// Fetch tool data
$tool_stmt = $conn->prepare("SELECT Name, Description, Long_Description, Tool_Image FROM tool WHERE Tool_ID = ?");
$tool_stmt->bind_param("i", $tool_id);
$tool_stmt->execute();
$tool_result = $tool_stmt->get_result();
$tool = $tool_result->fetch_assoc(); 

if (!$tool) {
    echo "<h2>Tool not found</h2>";
    exit;
}

// Fetch associated experts (many-to-many)
$expert_stmt = $conn->prepare("
    SELECT e.Expert_ID, e.Name, e.Gender
    FROM expert e
    INNER JOIN expert_tool et ON e.Expert_ID = et.Expert_ID
    WHERE et.Tool_ID = ? and e.status = 'ACCEPTED'
");
$expert_stmt->bind_param("i", $tool_id);
$expert_stmt->execute();
$experts = $expert_stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($tool['Name']) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/imgs/pexels-fwstudio-33348-129733.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/icons/all.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+IT+Moderna:wght@100..400&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .content-page {
            max-width: 1000px;  
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        .content-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .content-header img {
            max-width: 800px;
            height: 80%;
            width: 40%;
            object-fit: contain;
            border-radius: 10px;
        }
        .content-description {
            width: 50%;
            text-align: left;
            direction: ltr;
        }
        .experts-section {
            margin-top: 40px;
            text-align: center;
        }
        .experts-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        .expert-card {
            width: 30%;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .expert-card img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }
        .subscribe-btn {
            background-color: #ad7037;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .subscribe-btn:hover {
            background-color: #bb8450;
        }
        .subscribe-btn a {
            text-decoration: none;
            color: white;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #007bff;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="content-page">
    <div class="content-header">
        <img src="./assets/img/<?= htmlspecialchars($tool['Tool_Image']) ?>" alt="<?= htmlspecialchars($tool['Name']) ?> Image">
        <div class="content-description">
            <h2><?= htmlspecialchars($tool['Name']) ?></h2>
            <p><?= nl2br(htmlspecialchars($tool['Description'])) ?></p>
            <p><?= nl2br(htmlspecialchars($tool['Long_Description'])) ?></p>

        </div>
    </div>

    <div class="experts-section">
        <h3>Meet Our Experts</h3>
        <div class="experts-container">
            <?php if ($experts->num_rows > 0): ?>
                <?php while($expert = $experts->fetch_assoc()): ?>
                    <?php
                        $gender_raw = strtolower(trim($expert['Gender'] ?? ''));

                        if ($gender_raw === 'female') {
                            $photo_url = "https://images.unsplash.com/photo-1544005313-94ddf0286df2?crop=entropy&cs=tinysrgb&fit=crop&h=400&w=400";
                        } 
                        else {
                            $photo_url ="https://media.istockphoto.com/id/1919265357/photo/close-up-portrait-of-confident-businessman-standing-in-office.jpg?s=1024x1024&w=is&k=20&c=EpLEZWEw-pZhhhknmmxUubZK_UL7EuXzMe202LEu3SA=";
                        } 
                    ?>
                    <div class="expert-card">
                        <img src="<?= htmlspecialchars($photo_url) ?>" alt="Expert photo" class="profile-photo" style="width:100px; height:100px; border-radius:50%; object-fit:cover;">
                        <h4><?= htmlspecialchars($expert['Name']) ?></h4>
                        <!-- <p><//?= htmlspecialchars($expert['Bio']) ?></p> -->
                        <button class="subscribe-btn">
                            <a href="expertprofile.php?Expert_ID=<?= $expert['Expert_ID'] ?>">View Profile</a>
                        </button>
                    </div>
                <?php endwhile; ?> 
            <?php else: ?>
                <p>No experts found for this tool.</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- <a href="category_details.php?category_id=..." class="back-link">&#8592; Back to Tools</a> -->
</div>
</body>
</html>
