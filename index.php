
<!-- This HTML code creates a registration form with the following key elements: -->

<!-- Styling: The form is styled using CSS to provide a visually appealing and responsive layout. -->

<!-- Form Elements: -->

<!-- Email Input: Allows users to enter their email address. -->
<!-- Password Input: Allows users to enter their password. -->
<!-- Repeat Password Input: Asks users to confirm their password. -->
<!-- "Terms & Privacy" Link: Provides a link to terms and privacy policies. -->
<!-- "Register" Button: Submits the form. -->
<!-- Action and Method: The form is set to submit data to "/submit.php" using the POST method. -->

<!-- "Sign in" Link: Provides a link for users who already have an account to sign in. -->


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity: 1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>

<form action="/submit.php" method="post">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <!-- Email input -->
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>

    <!-- Password input -->
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" id="psw" required>

    <!-- Repeat password input -->
    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
    <hr>

    <!-- Agreement message -->
    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <!-- Register button -->
    <button type="submit" class="registerbtn">Register</button>
  </div>
  
  <!-- Sign-in link -->
  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
</form>

</body>
</html>

