<?php 
error_reporting(0);
// define error variable
$errfile=$errcheck="";

$termsncon=$_POST['termsncon'];


if(isset($_POST['sub'])){
    $temp=$_FILES['att']['tmp_name'];//read tmp name
    $size=$_FILES['att']['size'];//read size
    $fn=$_FILES['att']['name'];//orginal name

    // check for terns and condition check box
    if(!empty($termsncon)){

        // check for file 
        if(!empty($temp)){
            $ext=pathinfo($fn,PATHINFO_EXTENSION);
            $fname="proof.$ext";    // name file

            // check for file extension
            if($ext=="pdf" || $ext=="doc"){

                //  check for file size (10mb)
                if($size>10000000){
                    $status3="uploading error ! File is greater then 10Mb";
                }
                else{
                    if(move_uploaded_file($temp,"upload/$fname")){
                        // upload file 
                        $emptype=$_SESSION['emptype'];
                        $employername=$_SESSION['employername'];
                        $ratings=$_SESSION['ratings'];
                        $employstatus=$_SESSION['employstatus'];
                        $jobtitle=$_SESSION['jobtitle'];
                        $headline=$_SESSION['headline'];
                        $pros=$_SESSION['pros'];
                        $cons=$_SESSION['cons'];
                        $admng=$_SESSION['admng'];

                        // details feedback file
                        file_put_contents("upload/details.txt","$emptype \n $employername \n $ratings \n $employstatus \n $jobtitle \n $headline \n $pros \n $cons \n $admng");
                        header("location:welcome.php?mid=$email");
                        
                        $errfile=$errcheck="is-valid";
                    }
                    else{
                        $status3="uploading error !";
                    }
                }
            }
            else{
                $errfile = "is-invalid";
                $status3 = "only pdf/doc file formate allowed !";
            }
        }
        else{
            $errfile="is-invalid";
            $errcheck="is-invalid";
        }
    }
    else{
        $errcheck="is-invalid";
    }
}

// previous button
if(isset($_POST['prev'])){
    header("location:?con=step2");
}

?>

<form method="POST" enctype="multipart/form-data">
    <section class="row g-3">

        <!-- file upload -->
        <div class="col-md-6">
            <label for="validationServer02" class="form-label">Submit Proof</label>
            <input type="file"  name="att"  class="form-control <?php echo $errfile; ?>" id="validationServer01"  >
            
            <!-- error msg -->
            <div class="valid-feedback">
                Looks good !
            </div>
            <div class="invalid-feedback">
                Invalid !
            </div>
            <section class="text-danger"><?php echo $status3?></section>
        </div>

        <div class="col-md-6"></div>
        <div class="col-md-4"></div>

        <!-- terms n condition -->
        <div class="col-md-4">
                <input type="checkbox" class="form-check-input <?php echo $errcheck; ?>" name="termsncon" id="exampleCheck1">
                <label class="form-check-label"  for="exampleCheck1">Agree Terms and Condition</label>
            </div>
            <div class="invalid-feedback">
                check the box !
            </div>
        </div>
        
    </section>

        <!-- redirecting -->
    <section class="row justify-content-between mt-3 mb-3">
        <section class="col-4">
        <button type="submit" class="btn btn-primary " name="prev" role="button" ><i class="fas fa-arrow-left"></i>  Previous</button>
            </section>
            <section class="col-4 text-right">
                <button type="submit" class="btn btn-success " name="sub" role="button" >Submit <i class="far fa-check-circle"></i></button>
            </section>
        </section>
    </section>

</form>