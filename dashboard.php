<?php 
 session_start();
 $username=$_SESSION['sid'];
 if(empty($username)){
   header("location:index.php");
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
            <!-- Including head tags and other scripting files. -->
<?php include('head.php')?>     
</head>
<body>
    <div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Fluid jumbotron</h1>
        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
    </div>
    </div>
    <section class="container">
        <section class="row">
            <section class="col-md-12 border">
                <!-- open pages on get -->
            <?php 
                switch(@$_GET['con']){
                    case 'step2':
                        include('step2.php');
                        break;
                    case 'step3':
                        include('step3.php');
                        break;
                    default:
                        include('step1.php');      
                }
            
            
            ?> 
            </section>
        </section>
        

    </section>
    
    <?php include('foot.php')?>
</body>
</html>