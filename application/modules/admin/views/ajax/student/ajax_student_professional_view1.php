<?php 
if(!empty($professional_details))
{
    $professional_details=$professional_details[0];
} 

foreach ($education_details as $key => $value) {
    if($value->degree_type_id==1)
    {
        $ugData=$value;
    }
    if($value->degree_type_id==2)
    {
        $pgData=$value;
    }
}
?>
<div class="form-group row">
    <label for="intro" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Intro</label>
    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
        <textarea id="intro" class="form-control" name="intro" required="" readonly><?php if(isset($professional_details->intro)) { echo $professional_details->intro; } ?></textarea> 
    </div>
    <label for="program_name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Interested Program</label>
    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
        <input id="program_name" type="text" name="program_name" value="<?php if(isset($ugData->program_name)) { echo $ugData->program_name; } ?>" readonly="" class="form-control">
    </div>
</div>
<div class="form-group row">
    <label for="UG_degree_name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">UG degree</label>
    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
        <input id="UG_degree_name" type="text" name="UG_degree_name" value="<?php if(isset($ugData->degree_name)) { echo $ugData->degree_name; } ?>" readonly="" class="form-control">
    </div>
    <label for="UG_college_id" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">UG college</label>
    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
        <input id="UG_college_id" type="text" name="UG_college_id" value="<?php if(isset($ugData->college_name)) { echo $ugData->college_name; } ?>" readonly="" class="form-control">
    </div>
</div>
<div class="form-group row">
    <label for="UG_passing_year" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Passing Year</label>
    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
        <input id="UG_passing_year" type="text" name="UG_passing_year" value="<?php if(isset($ugData->passing_year)) { echo $ugData->passing_year; } ?>" readonly="" class="form-control">
    </div>
    <label for="UG_gpa_marks" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">UG marks(GPA)</label>
    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
        <input id="UG_gpa_marks" type="text" name="UG_gpa_marks" value="<?php if(isset($ugData->gpa_marks)) { echo $ugData->gpa_marks; } ?>" readonly="" class="form-control">
    </div>
</div>
<?php if(isset($pgData)){ ?>
<div class="form-group row">
    <label for="PG_degree_name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">PG degree</label>
    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
        <input id="PG_degree_name" type="text" name="PG_degree_name" value="<?php if(isset($pgData->degree_name)) { echo $pgData->degree_name; } ?>" readonly="" class="form-control">
    </div>
    <label for="PG_college_id" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">PG college</label>
    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
        <input id="PG_college_id" type="text" name="PG_college_id" value="<?php if(isset($pgData->college_name)) { echo $pgData->college_name; } ?>" readonly="" class="form-control">
    </div>
</div>
<div class="form-group row">
    <label for="PG_passing_year" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Passing Year</label>
    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
        <input id="PG_passing_year" type="text" name="PG_passing_year" value="<?php if(isset($pgData->passing_year)) { echo $pgData->passing_year; } ?>" readonly="" class="form-control">
    </div>
    <label for="PG_gpa_marks" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">PG marks(GPA)</label>
    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
        <input id="PG_gpa_marks" type="text" name="PG_gpa_marks" value="<?php if(isset($pgData->gpa_marks)) { echo $pgData->gpa_marks; } ?>" readonly="" class="form-control">
    </div>
</div>
<?php } ?>
<div class="form-group row">
    <label for="professional_qualification" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Professional Qualification</label>
    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
        <input id="professional_qualification" type="text" name="professional_qualification" value="<?php if(isset($professional_details->professional_qualification)) { echo $professional_details->professional_qualification; } ?>" readonly="" class="form-control">
    </div>
    <label for="total_experience" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Work experience</label>
    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
        <input id="total_experience" type="text" name="total_experience" value="<?php if(isset($professional_details->total_experience)) { echo $professional_details->total_experience; } ?>" readonly="" class="form-control">
    </div>
</div>
<?php 
$emp1=array();
$emp2=array();
 if(!empty($companies_history)){
    foreach ($companies_history as $key => $value) {
        if($value->is_current=="true")
        {
            $Current_company=$value;
            unset($companies_history[$key]);
            continue;
        }
        if(empty($emp1))
        {
            $emp1=$value;
            unset($companies_history[$key]);
            continue;
        }

        if(empty($emp2))
        {
            $emp2=$value;
            unset($companies_history[$key]);
        }
    }
} ?>

<div class="form-group row">
    <label for="c_employer_id" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Current Employer</label>
    <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
        <input id="c_employer_id" type="text" name="c_employer_id" value="<?php if(isset($Current_company->company_name)) { echo $Current_company->company_name; } ?>" readonly="" class="form-control">
    </div>

    <label for="p1_employer_id" class="form-control-label col-md-2 col-sm-2 col-xl-2 col-lg-1" >Previous Employer 1</label>
    <div class="col-md-2 col-lg-2 col-sm-4  col-xl-2">
        <input id="p1_employer_id" type="text" name="p1_employer_id" value="<?php if(isset($emp1->company_name)) { echo $emp1->company_name; } ?>" readonly="" class="form-control">
    </div>

    <label for="p2_employer_id" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Previous Employer 2</label>
    <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
        <input id="p2_employer_id" type="text" name="p2_employer_id" value="<?php if(isset($emp2->company_name)) { echo $emp2->company_name; } ?>" readonly="" class="form-control">
    </div>
</div>