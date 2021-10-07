<?php 
error_reporting(0);
// define error variables 
$status=$erremploystatus=$errjobtitle=$errheadline=$errpros=$errcons=$erradmng="";

// define variables
$ratings=$_POST['rat'];
$empstatus=$_POST['employstatus'];
$jobtitle=$_POST['jobtitle'];
$headline=$_POST['headline'];
$pros=$_POST['pros'];
$cons=$_POST['cons'];
$admng=$_POST['admng'];

if(isset($_POST['next'])){

    // check for empty
    if(!empty($ratings) && !empty($empstatus) && !empty($jobtitle) && !empty($headline) && !empty($pros) && !empty($cons) && !empty($admng)){

        // check for cons validation
        if(preg_match("/^.{15,200}$/",$cons)){

            // check for  pros validation
            if(preg_match("/^.{15,200}$/",$pros)){

                // check for advice management
                if(preg_match("/^.{15,200}$/",$admng)){
                    $erremploystatus=$errjobtitle=$errheadline=$errpros=$errcons=$erradmng="is-valid";
                    // session start to send values
                    session_start();
                    $_SESSION['ratings']=$ratings;
                    $_SESSION['employstatus']=$empstatus;
                    $_SESSION['jobtitle']=$jobtitle;
                    $_SESSION['headline']=$headline;
                    $_SESSION['pros']=$pros;
                    $_SESSION['cons']=$cons;
                    $_SESSION['admng']=$admng;
                    header("location:?con=step3");
                }
                else{
                    $erradmng="is-invalid";
                }
            }
            else{
                $errpros="is-invalid";
            }
            
        }
        else{
            $errcons="is-invalid";
        }
    }
    else{
        $status=$erremploystatus=$errjobtitle=$errheadline=$errpros=$errcons=$erradmng="is-invalid";
    }
}

if(isset($_POST['prev'])){
    header("location:?con=step1");
}

?>
<form method="POST">
    <section class="row g-3">
        <div class="col-md-4">
            <label for="validationServer02" class="form-label" >Overall Rating</label>
            <span>
                <ul>
                    <li><i class="fas fa-star fa-fw"></i></li>
                    <li><i class="fas fa-star fa-fw"></i></li>
                    <li><i class="fas fa-star fa-fw"></i></li>
                    <li><i class="fas fa-star fa-fw"></i></li>
                    <li><i class="fas fa-star fa-fw"></i></li>
                </ul>
            </span>
            <input type="hidden"  name="rat" id="ratings">
            <section class="text-danger"><?php echo $status?></section>
        </div>

        <div class="col-md-4">
            <!-- emp status -->
            <label for="validationServer04" class="form-label">Employment Status</label>
            <select class="form-select <?php echo $erremploystatus; ?>" id="validationServer04" aria-describedby="validationServer04Feedback" name="employstatus" >
                <option selected disabled value="Null">Choose...</option>
                <option value="Full Time">Full Time</option>
                <option value=" Part Time"> Part Time</option>
                <option value="Contract">Contract</option>
                <option value="Intern">Intern</option>
                
            </select>

            <!-- error msg -->
            <div id="validationServer04Feedback" class="invalid-feedback">
                Please select Status.
            </div>
        </div>


        <div class="col-md-4">
        <!-- jobtitle -->
            <label for="validationServer02" class="form-label">Job Title</label>
            <input type="text" class="form-control <?php echo $errjobtitle; ?>" id="validationServer02" name="jobtitle" >
            
            <!-- error msg -->
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Enter Job Title !
            </div>
        </div>

        <div class="col-md-8">
        <!-- jobtitle -->
            <label for="validationServer02" class="form-label">Review Headline</label>
            <input type="text" class="form-control <?php echo $errheadline; ?>" id="validationServer02" name="headline" >
            
            <!-- error msg -->
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Enter Review Headline !
            </div>
        </div>

        <div class="col-md-6">
        <!-- jobtitle -->
            <label for="validationServer06" class="form-label">Pros</label>
            <textarea class="form-control <?php echo $errpros; ?>" id="validationServer06" name="pros" rows="3">
            </textarea>
            <!-- error msg -->
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Required ! min 15 characters - max 200 characters
            </div>
        </div>

        <div class="col-md-6">
        <!-- jobtitle -->
            <label for="validationServer07" class="form-label">Cons</label>
            <textarea class="form-control <?php echo $errcons; ?>" id="validationServer07" name="cons" rows="3">
            </textarea>
            <!-- error msg -->
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Required ! min 15 characters - max 200 characters
            </div>
        </div>

        <div class="col-md-6">
        <!-- jobtitle -->
            <label for="validationServer02" class="form-label">Advice Management</label>
            <textarea class="form-control <?php echo $erradmng; ?>" id="validationServer02" name="admng" rows="3">
            </textarea>
            <!-- error msg -->
            <div class="valid-feedback">
                Looks good!
            </div>
            <div class="invalid-feedback">
                Required ! min 15 characters - max 200 characters
            </div>
        </div>
    </section>

    <section class="row justify-content-between mt-3 mb-3">
        <section class="col-4">
        <button type="submit" class="btn btn-primary " name="prev" role="button" ><i class="fas fa-arrow-left"></i> Previous</button>
            </section>
            <section class="col-4 text-right">
                <button type="submit" class="btn btn-primary " name="next" role="button" >Next <i class="fas fa-arrow-right"></i></button>
            </section>
        </section>
    </section>
</form>
<script>

    // ratings logic
    $(document).ready(function(){
        // mouse over colour change logic
        $("li").mouseover(function(){
            var current = $(this);
            $("li").each(function(index){
                // add class to change colour
                $(this).addClass("hovered-stars");
                if(index == current.index()){
                    return false;
                }
            });
        });

        // mouse left logic to change colour
        $("li").mouseleave(function(){
            // remove class of change colour
            $("li").removeClass("hovered-stars");
        });

        // click function to keep colour and get count of ratings
        $("li").click(function(){
            $("li").removeClass("clicked-star"); 
            $(".hovered-stars").addClass("clicked-star");
            $("#ratings").val($(".clicked-star").length);
        });
    });
</script>