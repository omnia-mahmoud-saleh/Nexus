<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscribtion</title>
    <link rel="stylesheet" href="./assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/icons/all.min.css">
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
<<<<<<< HEAD
    <!--To Display a user-friendly notification -->
  <?php
    if (isset($_SESSION['message'])) {
        $type = $_SESSION['message_type']; // success, error, etc.
        echo "<div class='my-alert $type'>{$_SESSION['message']}</div>";
        unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    }
  ?>

=======
>>>>>>> 19fc9b1f51e7babe1c1fd18d699470d9dedf6256
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="img-sub">
                    <img src="./assets/img/robot.jpg" alt="" class="img-fluid">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="back-home">
                    <a href="index.php"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                  </div>

                <div class="container-header">
                </div>
                <section class="sub-input">
                    <form action="server/subscribe.php" method="post">
                        <h2 class="pay-h2 mt-4">Payment Info</h2>
                        <input type="text" placeholder="User Name" name="subscribe_name" class="col-lg-6" value="<?php echo isset($_SESSION['user_name']) ? htmlspecialchars($_SESSION['user_name']) : '';?>">
                        <!-- <input type="text" placeholder="Email" name="subscribe_name" class="col-lg-6"> -->
                        <div class="input-group">
                            <input type="text" id="name" name="cardholder_name" placeholder="Cardholder Name" required>
                        </div>
            
                        <div class="input-group">
                            <input type="text" id="card-number" name="card_number" placeholder="Card Number" maxlength="19" required>
                        </div>
            
                        <div class="input-row">
                            <div class="input-group">
                                <input type="text" id="expiry" name="expiry_date" placeholder="Expiry Date :MM/YY" maxlength="5" required>
                            </div>
                            <div class="input-group">
                                <input type="text" id="cvv" name="cvv" placeholder="CVV" maxlength="3" required>
                            </div>
                            <button type="submit" name="subscribe_button" class="pay-btn sub-button">Subscribe</button>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>
</html>