<!DOCTYPE HTML>
<html>
    <head>
        <script src="js/script.js"></script>
    </head>
    
    <body>

        <h1>Jimmy Chu</h1>

        <?php
            $nameErr = $name2Err = $emailErr = $genderErr = $email2Err = $passwordErr = $colorErr = $commentErr  =  "";
            $name= $name2 = $email = $gender = $comment = $email2 = $password = $color = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
                if (empty($_POST["name"])) {
                  $nameErr = "First Name is required";
                } else {
                  $name = check_input($_POST["name"]);
                  if (!preg_match("/^[a-zA-Z\s]*$/", $name)) {
                    $nameErr = "Only letters and white space allowed";
                  }
                }

                if (empty($_POST["name2"])) {
                    $name2Err = "Last Name is required";
                } else {
                    $name2 = check_input($_POST["name2"]);
                    if (!preg_match("/^[a-zA-Z\s]*$/", $name2)) {
                      $name2Err = "Only letters and white space allowed";
                    }
                }
            
                if (empty($_POST["email"])) {
                  $emailErr = "Email is required";
                } else {
                  $email = check_input($_POST["email"]);
                  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                  }
                }

                if (empty($_POST["email2"])) {
                    $email2Err = "Type Email again";
                } else {
                    $email2 = check_input($_POST["email2"]);
                    if (!filter_var($email2, FILTER_VALIDATE_EMAIL)) {
                      $email2Err = "Invalid email format";
                    }
                }

                if (empty($_POST["password"])) {
                    $passwordErr = "Password is required";
                } else {
                    $password = check_input($_POST["password"]);
                    if (strlen($password) < 7) {
                        $passwordErr = "Password must be at least 7 characters long";
                    } elseif (!preg_match("/[A-Z]/", $password)) {
                        $passwordErr = "Password must contain at least one uppercase letter";
                    } elseif (!preg_match("/[a-z]/", $password)) {
                        $passwordErr = "Password must contain at least one lowercase letter";
                    } elseif (!preg_match("/\d/", $password)) {
                        $passwordErr = "Password must contain at least one number";
                    } elseif (!preg_match("/[^a-zA-Z\d]/", $password)) {
                        $passwordErr = "Password must contain at least one special character";
                    }
                }
                
                if (empty($_POST["gender"])) {
                  $genderErr = "Gender is required";
                } else {
                  $gender = check_input($_POST["gender"]);
                }
            
                // $comment = check_input($_POST["comment"]);

                if (empty($_POST["comment"])) {
                  $commentErr = "Comment is required";
                } else {
                  $comment = check_input($_POST["comment"]);
                }
            
                if (empty($_POST["color"])) {
                    $colorErr = "Color is required";
                } else {
                    $color = check_input($_POST["color"]);
                }

            }
            
              function check_input($data)
              {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }
              ?>
            
              <p><span class="error" style="color: red;">* required field</span></p>
            
              <form method="post" id = "test" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">


                First Name: <input type="text" name="name" value="<?php echo $name; ?>">
                <span class="error" style="color: red;">* (ex. John)
                  <?php echo $nameErr; ?>
                </span>
                <br><br>

                Last Name: <input type="text" name="name2" value="<?php echo $name2; ?>">
                <span class="error" style="color: red;">* (ex. Smith)
                  <?php echo $name2Err; ?>
                </span>
                <br><br>

                E-mail: <input type="text" name="email" id="email" value="<?php echo $email; ?>">
                <span class="error" style="color: red;">* (ex. bobby@example.com)
                  <?php echo $emailErr; ?>
                </span>
                <br><br>

                Enter E-mail again: <input type="text" name="email2" id="email2" value="<?php echo $email2; ?>">
                <span class="error" style="color: red;">* 
                  <?php echo $email2Err; ?>
                </span>
                <br><br>
                <input type="button" value="Check" onclick="checkSimilarity()">
                <br><br>
                
                Password: <input type="password" name="password" value="<?php echo $password; ?>">
                <span class="error" style="color: red;">*
                  <?php echo $passwordErr; ?>
                </span>
                <br><br>
                
                Comment: <textarea name="comment" rows="3" cols="40"><?php echo $comment; ?></textarea>
                <span class="error" style="color: red;">*
                  <?php echo $commentErr; ?>
                </span>
                <br><br>

                Gender:
                <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female")
                  echo "checked"; ?>
                  value="female">Female
                <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male")
                  echo "checked"; ?> value="male">Male
                <input type="radio" name="gender" <?php if (isset($gender) && $gender == "other")
                  echo "checked"; ?>
                  value="other">Other
                <span class="error" style="color: red;">* (Choose one)
                  <?php echo $genderErr; ?>
                </span>
                <br><br>

                <label for="color">Select your favorite color:</label>
                <select name="color" id="color">
                <option value="red">Red</option>
                <option value="green">Green</option>
                <option value="blue" selected>Blue</option>
                <option value="yellow">Yellow</option>
                <option value="orange">Orange</option>
                </select>

                <br><br>
                <button onclick="validate()">Validate</button>
              
                <br><br>
                <input type="submit" name="submit" value="Submit">
                <br><br>



              </form>
            
              <?php
              echo "<h2>Your Input:</h2>";
              echo "First Name: ", $name, "<br>";
              echo "Last Name: ", $name2, "<br>";
              echo "E-mail: ", $email, "<br>";
              echo "E-mail again: ", $email2, "<br>";
              echo "Password: ", $password, "<br>";
              echo "Comment: ", $comment, "<br>";
              echo "Gender: ", $gender, "<br>";
              echo "Color: ", $color, "<br>";
              ?>
    </body>

</html>