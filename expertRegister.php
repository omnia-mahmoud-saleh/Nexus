<?php session_start();?>
<?php include('server/databaseconn.php');
  $tools_result = $conn->query("SELECT Tool_ID, Name FROM tool");
?>
<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expert Registeration</title>
    <link rel="stylesheet" href="./assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/icons/all.min.css">
    <link rel="stylesheet" href="./css/login.css">
<!-- For the multi-select tools section-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</script>


</head>
<body>
  <!--To Display a user-friendly notification -->
  <?php
    if (isset($_SESSION['message'])) {
        $type = $_SESSION['message_type']; // success, error, etc.
        echo "<div class='alert $type'>{$_SESSION['message']}</div>";
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }
  ?>
  <div class="back-home">
    <a href="index.php"><i class="fa-solid fa-arrow-up-right-from-square fa-rotate-270"></i></a>
  </div>
  <!-- <h1>AI Nexus</h1> -->
  <div class="hero2">
    <h1 class="ms-5">
      Expert Registration
   </h1>
    <!-- <button> <a href="index.php">Back to home page</a></button> -->
  </div>
    <div class="container mt-4">
        <div class="col-lg-10">
            <form action= "server/server_1.php" method="post" enctype="multipart/form-data">
                <div class="d-lg-flex d-sm-inline" id="consult-input">
                    <input type="text" placeholder=" Name " class="col-lg-4 col-sm-12  mb-3" id="expert_name" name="expert_name" required>
                    <input type="number" placeholder=" National ID " class="col-lg-4 col-sm-12  mb-3 ms-3" id="regist-expertid" name="national_id" required>
                  </div>
                  <div class="d-lg-flex d-sm-inline" id="consult-input">
                    <input type="text" placeholder=" Phone " class="col-lg-4 col-sm-12  mb-3" id="regist-expertphone" name="expert_phone" required>
                    <input type="text" placeholder="Address " class="col-lg-4 col-sm-12  mb-3 ms-3" id="regist-expertaddress" name="expert_address" required>
                  </div>
                  <div class="d-lg-flex d-sm-inline" id="consult-input">
                    <input type="password" placeholder=" Password " class="col-lg-4 col-sm-12  mb-3" id="expert_password" name="expert_password" required>
                    <input type="email" placeholder="Email" class=" col-lg-4 col-sm-12  mb-3 ms-3" id="regist-expertemail" name="expert_email" required>
                  </div>
                  <div class="d-lg-flex d-sm-inline" id="consult-input">
                    <div class="col-lg-4 col-sm-12 mb-3 me-3">
                    <select name="expert_gender" class="form-control" required>
                       <option value="" disabled selected>Select Gender</option>
                       <option value="male">Male</option>
                       <option value="female">Female</option>
                     </select>
                    </div>
                  </div>

                  <!--To allow multi-selection from available tools -->

                  <label for="tools">You are an expert in:</label>
                  <select name="tools[]" id="tools" multiple class="form-control">
                      <?php while ($tool = $tools_result->fetch_assoc()) { ?>
                          <option value="<?= $tool['Tool_ID']; ?>"><?= htmlspecialchars($tool['Name']); ?></option>
                      <?php } ?> 
                  </select>
                  <br>
                  <br>

                  <div class="d-lg-flex d-sm-inline" id="consult-input">
                    <textarea placeholder="Add a brief bio" class="col-lg-8 col-sm-12  mb-3" id="expert_discription" name="expert_discription" required></textarea>
                  </div>
                    

                  <!-- <div class="d-lg-flex d-sm-inline" id="consult-input">
                    <textarea class="col-lg-8 col-sm-12  mb-3" id="availability" name="availability" placeholder="Available Schedule"></textarea>
                  </div> -->

                  <div class="d-lg-block d-sm-inline" id="cv">
                    <label class=" justify-content-center ms-3 cv-input">Upload Your CV</label>
                              <input type="file" class=" col-lg-3 col-sm-12 mb-3" name="expert_cv" required>
                    </div>

                    <div class="regist2 col-lg-10">
                         <!-- <BUtton>Register</BUtton> -->
                        <button class="btn col-lg-8 justify-content-center" name="button_submit_expert" type="submit">Register</button> <br>
                        <label class=" justify-content-center log-expertlink">you have an account ?<a href="expertLOGIN.php">Log in</a></label>
                    </div>
            </form>
        </div>
    </div>
</body>
</body>
</html>
<!--A Script to support the multi-select section for tools selection -->
<script>
  $(document).ready(function() {
    $('#tools').select2({
      placeholder: "Select tools..",
      width: '50%',
      maximumSelectionLength: 3
    });
  });
</script>