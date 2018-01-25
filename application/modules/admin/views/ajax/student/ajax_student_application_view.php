<style type="text/css">
    .modal-body{
        margin-top: 5px;
        padding-top: 0px !important;
    }
    .modal-header{
        padding-bottom: 0px !important;
    }
    label{
        font-weight: 600;
    }
    .form-control[readonly]{
        background-color: #ccc;
        font-weight: 400;
    }
</style>
<?php 
if(!empty($exam_taken_details))
{
    foreach ($exam_taken_details as $key => $value) {
        if($value->exam_type_id==1)
        {
            $student_gmat=$value;
        }
        if($value->exam_type_id==2)
        {
            $student_gre=$value;
        }
    }
} ?>
<div class="form-group row">
    <label for="gmat_select" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2 "  style="text-align: left;">GMAT taken?</label>
    <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
        <input type="text" <?php if(isset($student_gmat)){ ?> value="yes" readonly <?php }else{ echo 'readonly'; } ?> id="gmat_taken" name="gmat_taken" class="form-control">
    </div>

    <label for="gmat_score" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1">GMAT Score</label>
    <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
        <input type="number" <?php if(isset($student_gmat)){ ?> value="<?php echo $student_gmat->score; ?>" readonly <?php }else{ echo 'readonly'; } ?> id="gmat_score" maxlength="3" step="1" max="800" min="1" name="gmat_score" placeholder="if (yes)" class="form-control gmat_tar">
    </div>

    <label for="gmat_tenative_date" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Tenative date</label>
    <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
        <input type="text" <?php if(isset($student_gmat->tentative_date)){ ?> value="<?php echo date("d M Y", strtotime($student_gmat->tentative_date)); ?>" readonly <?php }else{ echo 'readonly'; } ?> id="gmat_tenative_date" name="gmat_tentative_date" class="form-control gmat_tar" placeholder="Select Tenative Date">
    </div>
</div>

<div class="form-group row">
    <label for="gre_select" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2"  style="text-align: left;">GRE taken?</label>
    <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
        <input type="text" <?php if(isset($student_gre)){ ?> value="yes" readonly <?php }else{ echo 'readonly'; } ?> id="gre_taken" name="gmat_taken" class="form-control">
    </div>

    <label for="gre_score" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >GRE Score</label>
    <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
        <input type="number" <?php if(isset($student_gre)){ ?> value="<?php echo $student_gre->score; ?>" readonly <?php }else{ echo 'readonly'; } ?> id="gre_score" maxlength="3" step="1" max="340" min="1" name="gre_score" id="gre_score" placeholder="if (yes)" class="form-control gre_tar">
    </div>

    <label for="gre_tenative_date" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Tenative date</label>
    <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
        <input type="text" <?php if(isset($student_gre->tentative_date)){ ?> value="<?php echo date("d M Y", strtotime($student_gre->tentative_date)); ?>" readonly <?php }else{ echo 'readonly'; } ?> id="gre_tenative_date" name="gre_tentative_date" class="form-control gre_tar" placeholder="Select Tenative Date">
    </div>
</div>


<?php if(isset($student_packages)&& !empty($student_packages)) { ?>
    <hr>
    <div class="form-group row">
        <div class="col-md-6 col-lg-6 col-sm-6  col-xl-6">
            <h5 class="float-left">Packages List</h5>
        </div>
    </div>
    <?php foreach ($student_packages as $key => $stu_package) { ?>
    <div class="form-group row">
        <label for="signup_date" class="form-control-label col-md-2 col-sm-3 col-xl-2 col-lg-2" style="text-align: left;">Sign up date</label>
        <div class="col-md-2 col-lg-2 col-sm-3  col-xl-2">
            <input name="signup_date[]" readonly value="<?php if(strlen($stu_package->signup_date)){ echo date("d M Y", strtotime($stu_package->signup_date)); } ?>" type="text" class="form-control signup_date" title="<?php if(strlen($stu_package->signup_date)){ echo date("d M Y", strtotime($stu_package->signup_date)); } ?>" placeholder="Select sign up Date" aria-label="signup_date" aria-describedby="basic-addon1">
        </div>

        <label for="package_id" class="form-control-label col-md-2 col-sm-3 col-xl-2 col-lg-2" >Package name</label>
        <div class="col-md-2 col-lg-2 col-sm-3  col-xl-2">
            <input name="package_id[]" readonly value="<?php if(strlen($stu_package->package_name)){ echo $stu_package->package_name;} ?>" type="text" class="form-control" placeholder="Select package name" title="<?php if(strlen($stu_package->package_name)){ echo $stu_package->package_name;} ?>" aria-label="signup_date" aria-describedby="basic-addon1">
        </div>

        <label for="consultant_id" class="form-control-label col-md-2 col-sm-3 col-xl-2 col-lg-2">Consultant Assigned</label>
        <div class="col-md-2 col-lg-2 col-sm-9  col-xl-2">
            <input name="consultant_id[]" readonly value="<?php if(strlen($stu_package->fname)){ echo $stu_package->fname." ".$stu_package->lname;} ?>" type="text" class="form-control" placeholder="Select Consulatnat" aria-label="consultant_name" title="<?php if(strlen($stu_package->fname)){ echo $stu_package->fname." ".$stu_package->lname;} ?>" aria-describedby="basic-addon1">
        </div>
    </div>
<?php } } ?>