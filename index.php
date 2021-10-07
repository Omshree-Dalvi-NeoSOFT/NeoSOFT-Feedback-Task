<?php 
$errusername=$errpass='';
$pass="123456";
$un="test_user";
  if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['pass'];

    // check for empty field
    if(!empty($username) && !empty($password)){
      // check for user username
      if($username==$un){
          if($pass==$password){
            // session variables for other pages
            session_start();
            $_SESSION['sid']=$username;
            header("location:dashboard.php");
          }
          else {
            $errusername=$errpass="Enter correct username or password";
          }
        }
      else{
        $errusername=$errpass="Enter correct username or password";
      }
    }
    else {
      $errusername=$errpass="Plz fill the blank fields";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- include head tags and other scripts/links -->
<?php include('head.php')?>

</head>
<body>
    <section class="container">
        <div class="jumbotron">
        <h1 class="display-4">Login Panel</h1>
        <!-- <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p> -->

        </div>
           <!-- login form -->
            <form method="post">
              <!-- username id -->
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg">Username</span>
                <input type="username" class="form-control" name="username" id="username" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" onchange="cook()">
            </div>
            <!-- error msg -->
                <span class="text-danger"><?php echo $errusername;?></span>
                <br>

                <!-- password -->
            <div class="input-group input-group-lg">
                <span class="input-group-text" id="inputGroup-sizing-lg">Password</span>
                <input type="password" class="form-control" id="password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" name="pass">
            </div>
            <!-- error msg -->
                <span class="text-danger"><?php echo $errpass?></span>
                <br>

                <!-- remember option -->
                <center><button type="submit" class="btn btn-success p-2" name="submit">Submit Feedback</button></center>
            </form>
    </section>
    <section class="container-fluid">

    <!-- include script tags. -->
    <?php include('foot.php')?>
</body>
</html>
