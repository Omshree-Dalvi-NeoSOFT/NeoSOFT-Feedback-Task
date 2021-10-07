<?php 
error_reporting(0);
$erremptype=$erremployname="";
$employeetype=@$_POST['emptype'];
$employername=$_POST['employername'];

if(isset($_POST['next'])){
    if(!empty($employeetype) && !empty($employername)){
        $erremptype=$erremployname="is-valid";
        session_start();
        $_SESSION['emptype']=$employeetype;
        $_SESSION['employername']=$employername;
        header("location:?con=step2");
    }
    else{
        $erremptype=$erremployname="is-invalid";
    }
}

?>

<form method="POST">
    <section class="row g-3">
        <!-- FeedBack Step1 -->
        <!-- employee type -->
        <div class="col-md-4">
            <label for="validationServer02" class="form-label">Are you a current or former employee?</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input <?php echo $erremptype; ?>" type="radio" name="emptype" id="inlineRadio1" value="Current">
                <label class="form-check-label" for="inlineRadio1"> Current</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input <?php echo $erremptype; ?>" type="radio" name="emptype" id="inlineRadio2" value="Former">
                <label class="form-check-label" for="inlineRadio2"> Former</label>
            </div>
        </div>

        <div class="col-md-2"></div>

        <!-- EMployeer Name -->
        <div class="col-md-5">
            <label for="validationServer02" class="form-label">Employer's Name</label>
            <input type="text" class="form-control <?php echo $erremployname; ?>" id="validationServer02" name="employername" >
        </div>
    </section>

    <!-- redirect to next page -->
    <section class="row justify-content-between mt-3 mb-3">
        <section class="col-4">
            </section>
            <section class="col-4 text-right">
                <button type="submit" class="btn btn-primary " name="next" role="button" >Next <i class="fas fa-arrow-right"></i></button>
            </section>
        </section>
    </section>

</form>