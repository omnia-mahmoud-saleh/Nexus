<?php
include('server/databaseconn.php');

$expert_id = isset($_GET['Expert_ID']) ? intval($_GET['Expert_ID']) : 0;

// Fetch expert data
$expert_stmt = $conn->prepare("SELECT Name, Bio, Gender, Expert_ID FROM expert WHERE Expert_ID = ?");
$expert_stmt->bind_param("i", $expert_id);
$expert_stmt->execute();
$expert_result = $expert_stmt->get_result();
$expert = $expert_result->fetch_assoc(); 

if (!$expert) {
    echo "<h2>Expert not found</h2>";
    exit;
}

// Fetch associated tools
$tool_stmt = $conn->prepare("
    SELECT t.Name 
    FROM tool t
    INNER JOIN expert_tool et ON t.Tool_ID = et.Tool_ID
    WHERE et.Expert_ID = ?
");
$tool_stmt->bind_param("i", $expert_id);
$tool_stmt->execute();
$tool_result = $tool_stmt->get_result();

$tools = [];
while ($row = $tool_result->fetch_assoc()) {
    $tools[] = $row['Name'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Expert Profile</title>
  <link rel="stylesheet" href="./css/profile.css">
</head>
<body> 

<div class="profile-container">
  <div class="profile-card">

    <div class="profile-left">
     <h1 class="expert-name"><?= htmlspecialchars($expert['Name']) ?></h1>

      <div class="divider"></div>

      <p class="expert-description">
        <?= nl2br(htmlspecialchars($expert['Bio'])) ?>      
      </p>

      <div class="skills">
          <?php if (!empty($tools)): ?>
            <?php foreach ($tools as $tool): ?>
              <span class="skill-tag"><?= htmlspecialchars($tool) ?></span>
            <?php endforeach; ?>
          <?php else: ?>
            <p>No tools registered.</p>
          <?php endif; ?>
      </div>

      <div class="schedule">
        <h2>Available Schedule</h2>
        <table class="schedule-table">
          <tr>
            <th>Day</th>
            <th>Time</th>
          </tr>
          <tr>
            <td>Monday</td>
            <td>2 PM – 6 PM</td>
          </tr>
          <tr>
            <td>Wednesday</td>
            <td>10 AM – 1 PM</td>
          </tr>
          <tr>
            <td>Friday</td>
            <td>3 PM – 7 PM</td>
          </tr>
        </table>
      </div>

      <div class="social-links">
        <a href="#">LinkedIn</a> |
        <a href="#">GitHub</a> |
        <a href="#">Portfolio</a>
      </div>
      <button class="subscribe-button" onclick="location.href='./server/redirect_to_subscribe.php';">Subscribe Now</button>
      <!-- <button class="subscribe-button" id="go-to-payment">Subscribe Now</button> -->
    </div>

    <div class="profile-right">
   <?php
      $gender_raw = strtolower(trim($expert['Gender'] ?? ''));

      if ($gender_raw === 'female') {
         $photo_url = "https://images.unsplash.com/photo-1544005313-94ddf0286df2?crop=entropy&cs=tinysrgb&fit=crop&h=400&w=400";
      }
      else {
         $photo_url = "https://media.istockphoto.com/id/1919265357/photo/close-up-portrait-of-confident-businessman-standing-in-office.jpg?s=1024x1024&w=is&k=20&c=EpLEZWEw-pZhhhknmmxUubZK_UL7EuXzMe202LEu3SA=";
      }
   ?> 

    <img src="<?= $photo_url ?>" alt="Expert Photo" class="profile-photo" style="width:300px; height:300px;">
    </div>


  </div>
</div> 

<script src="./js/main.js"></script>
</body>
</html>
