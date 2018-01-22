<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style type="text/css">
    .btnadd{
        margin-left: 28px;
    }
    .btnright{
        margin-right: 28px;
    }
.m-lr-0{
    margin-left: 0px !important;
    margin-right: 0px !important;
}
.m-tb-0{
    margin-bottom: 0px !important;
    margin-top: 0px !important;
}
.select2{
        width: auto !important;
}

#integration-list {
    font-family: 'Open Sans', sans-serif;
    width: 100%;
    margin: 0 auto;
    display: table;
}
#integration-list ul {
    padding: 0;
}
#integration-list ul > li {
    list-style: none;
    border-top: 1px solid #ddd;
    display: block;
    padding: 10px;
    overflow: hidden;
}
#integration-list ul:last-child {
    border-bottom: 1px solid #ddd;
}
#integration-list ul > li:hover {
    background: #efefef;
}
.expand {
    text-decoration: none;
    color: #555;
    cursor: pointer;
}
h2 {
    
    font-size: 17px;
    font-weight: 400;
}
span {
    font-size: 12.5px;
}
#left,#right{
    display: table;
}
#sup{
    display: table-cell;
    vertical-align: middle;
    width: 80%;
}
.detail a {
    text-decoration: none;
    color: #C0392B;
    border: 1px solid #C0392B;
    padding: 6px 10px 5px;
    font-size: 14px;
}
.detail {
    display: none;
}
.detail span{
    margin: 0;
}
.right-arrow {
    margin-left: 20px;
    width: 10px;
    height: 100%;
    float: right;
    font-weight: bold;
    font-size: 20px;
}
.icon1 {
    height: 75px;
    width: 75px;
    float: left;
    margin: 0 15px 0 0;
}
hr{
    border-top: 2px solid #000;
}

.removeCollegeParent{
    margin-top: 20px;
    border-top: 2px solid #000;
}
.removeCollegeParent:nth-of-type(1)
{
    border-top: 1px solid red !important;
} 
.ui-accordion-content{
    height: auto !important;
}
.error{
    color: red;
    font-weight: 600;
}
.bdr_err{
    border: 1px solid red;
}
.bdr_sucs{
     border: 1px solid #e4eaec;
}
.modal-label{
    font-weight: 500;
}
.modal-header-success {
    color:#fff;
    padding:2px 6px;
    border-bottom:1px solid #eee;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
     border-top-left-radius: 5px;
     border-top-right-radius: 5px;
}
.btnClose{
    font-size: 25px;
}

</style>
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Student details</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/student/summary'); ?>">Student List</a></li>
            <li class="breadcrumb-item active">Student details</li>
        </ol>
    </div>
    <?php
    $enquiry_flag=0;
    //assigning enquiry_data
    if(isset($enquiery_data) && !empty($enquiery_data))
    {
        $enquiery_data=$enquiery_data[0];
    }

    if(isset($personal_details) && !empty($personal_details))
    {
        $personal_details=$personal_details[0];
    }

    if(isset($professional_details) && !empty($professional_details))
    {
        $professional_details=$professional_details[0];
    }
    
     ?>

     <?php foreach ($colleges_list as $key => $value) {
         if($value->college_type_id==1)
         {
            $UG_colleges_list[]=$value;
         }elseif($value->college_type_id==2)
         {
            $PG_colleges_list[]=$value;
         }
            
     }?>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                
                <div class="row row-lg">
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4">
                        <h4 class="example-title">Enquiry agent</h4>
                        <input type="text" name="enquiery_date" value="<?php if(isset($enquiery_data->agent_fname)) { echo $enquiery_data->agent_fname." ".$enquiery_data->agent_lname; } ?>" readonly="" class="form-control">
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4">
                        <h4 class="example-title">Enquiry date</h4>
                        <input type="text" name="enquiery_date" value="<?php if(isset($enquiery_data->agent_fname)) { echo date("jS F Y, g:i a", strtotime($enquiery_data->enq_date)); } ?>" readonly="" class="form-control">
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4">
                        <h4 class="example-title">Source</h4>
                        <input  type="text" name="enquiery_date" value="<?php if(isset($enquiery_data->source_name)) { echo $enquiery_data->source_name; } ?>" readonly="" class="form-control">
                    </div>
                </div>
                <?php $arr=array('class'=>"form-horizontal mt-30","id"=>"fist_section");
                            echo form_open('admin/student/update',$arr); ?>
                    <div id="accordion">
                        
                        <h3>Personal Details</h3>
                        <div>
                            <div class="col-sm-12 col-md-12 mt-20">
                                <div class="form-group row ">
                                    <label for="first_name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">First name</label>
                                    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                        <input id="first_name" readonly="" type="text" value="<?php if(isset($personal_details->first_name)) { echo $personal_details->first_name; } ?>" name="first_name" class="form-control ">
                                        <input type="hidden" name="student_id" value="<?php echo $enquiery_data->student_id; ?>">
                                        <input type="hidden" name="user_id" value="<?php echo $personal_details->user_id; ?>">
                                    </div>
                                    <label for="last_name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Last name</label>
                                    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                        <input id="last_name" type="text" readonly="" value="<?php if(isset($personal_details->last_name)) { echo $personal_details->last_name; } ?>" name="last_name" class="form-control ">
                                    </div>
                                </div>


                                <div class="form-group row mt-20">
                                    <label for="email_id" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Email Id</label>
                                    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                        <input id="email_id" type="text" readonly="" value="<?php if(isset($personal_details->email_id)) { echo $personal_details->email_id; } ?>"  name="email_id" class="form-control ">
                                    </div>
                                    <label for="gender_id" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Gender</label>
                                    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                        <select id="gender_id" name="gender_id" required class="form-control">
                                            <option hidden="" value="0">Select Gender</option>
                                             <?php foreach ($gender_list as $key => $value) { ?>
                                                <option <?php if(isset($personal_details->gender_id) && strlen(trim($personal_details->gender_id)) && $personal_details->gender_id==$value->gender_id) { echo "selected"; } ?> value="<?php echo $value->gender_id ?>"><?php echo $value->gender ?></option>
                                            <?php } ?>
                                        </select>
                                        <span id="gendererr" class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group row mt-20">
                                    <label for="phonenumber" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Phone number</label>
                                    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                        <input id="phonenumber" type="text" readonly="" value="<?php if(isset($personal_details->phonenumber)) { echo $personal_details->phonenumber; } ?>" name="phonenumber" class="form-control ">
                                    </div>
                                </div>

                                <div class="form-group row mt-20">
                                    <label for="state_name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Residing State</label>
                                    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                        <input id="state_name" type="text" readonly="" value="<?php if(isset($personal_details->state_name)) { echo $personal_details->state_name; } ?>"  name="state_name" class="form-control ">
                                    </div>
                                    <label for="city_name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Residing City</label>
                                    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                        <input id="city_name" type="text" readonly="" value="<?php if(isset($personal_details->city_name)) { echo $personal_details->city_name; } ?>"  name="city_name" class="form-control ">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3>Professional Details</h3>
                        <div>
                        <?php
                        if(!empty($education_details)){
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
                        } ?>
                            <div class="col-sm-12 col-md-12 mt-20">
                                <div class="form-group row">
                                    <label for="intro" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Intro</label>
                                    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                        <textarea id="intro" class="form-control" name="intro" required="" readonly><?php if(isset($professional_details->intro)) { echo $professional_details->intro; } ?></textarea> 
                                    </div>
                                    <label for="program_name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Interested Program</label>
                                    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                        <input id="program_name" type="text" name="program_name" value="<?php if(isset($enquiery_data->program_name)) { echo $enquiery_data->program_name; } ?>" readonly="" class="form-control">
                                    </div>
                                </div>
                                <hr>
                                
                                <div class="form-group row">
                                    <label for="UG_degree_name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Undergraduate degree</label>
                                    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                        <select data-plugin="select2" id="UG_degree" name="UG_degree_name" class="form-control ">
                                            <option  hidden="">Select UG college</option>
                                            <?php if(!empty($UG_degree_list)) { foreach ($UG_degree_list as $key => $value) { ?>
                                                <option <?php if(isset($ugData->degree_id) && $ugData->degree_id==$value->degree_id){ echo "selected"; } ?>  value="<?php echo $value->degree_id;?>"><?php echo $value->degree_name ;?></option>
                                            <?php } } ?>
                                        </select>
                                        <span id="UG_degree_err" class="error"></span>
                                    </div>
                                    <label for="UG_college_id" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Undergraduate college</label>
                                    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                        <select data-plugin="select2" id="UG_college_id" name="UG_college_id" class="form-control ">
                                            <option  hidden="">Select UG college</option>
                                            <?php if(!empty($UG_colleges_list)) { foreach ($UG_colleges_list as $key => $value) { ?>
                                                <option <?php if(isset($ugData->college_id) && $ugData->college_id==$value->college_id){ echo "selected"; } ?> value="<?php echo $value->college_id;?>"><?php echo $value->college_name ;?></option>
                                            <?php } } ?>
                                        </select>
                                        <span id="UG_college_error" class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="UG_passing_year" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Passing Year</label>
                                    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                        <select data-plugin="select2" id="UG_passing_year" name="UG_passing_year" class="form-control ">
                                            <option  hidden="">Select Passing Year</option>
                                            <?php for ($i=date("Y"); $i > date("Y")-25 ; $i--) {  ?>
                                            <option <?php if(isset($ugData->passing_year) && $ugData->passing_year==$i){ echo "selected"; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php } ?>
                                        </select>
                                        <span id="UG_passing_year_error" class="error"></span>
                                    </div>
                                    <label for="UG_gpa_marks" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Undergraduate marks(GPA)</label>
                                    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                        <input id="UG_gpa_marks" value="<?php if(isset($ugData->gpa_marks)){ echo $ugData->gpa_marks; } ?>" type="number" max="10" min="0" step="0.01" name="UG_gpa_marks" class="form-control ">
                                        <span id="UG_gpa_marks_error" class="error"></span>
                                    </div>
                                </div><hr>
                                <div class="form-group row">
                                    <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Postgraduate degree</label>
                                    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                        <select data-plugin="select2" id="PG_degree" name="PG_degree_name" class="form-control ">
                                            <option  hidden="" value="0">Select PG Degree</option>
                                            <?php if(!empty($PG_degree_list)) { foreach ($PG_degree_list as $key => $value) { ?>
                                                <option <?php if(isset($pgData->degree_id) && $pgData->degree_id==$value->degree_id){ echo "selected"; } ?> value="<?php echo $value->degree_id;?>"><?php echo $value->degree_name ;?></option>
                                            <?php } } ?>
                                        </select>
                                        <span id="PG_degree_error" class="error"></span>
                                    </div>
                                   
                                    <label for="PG_college" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2 " style="text-align: left;">Postgraduate college</label>
                                    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                        <select id="PG_college" data-plugin="select2" class="form-control" name="PG_college">
                                            <option  hidden="" value="0">Select PG college</option>
                                            <?php if(!empty($PG_colleges_list)) { foreach ($PG_colleges_list as $key => $value) { ?>
                                                <option <?php if(isset($pgData->college_id) && $pgData->college_id==$value->college_id){ echo "selected"; } ?> value="<?php echo $value->college_id;?>"><?php echo $value->college_name ;?></option>
                                            <?php } } ?>
                                        </select>
                                        <span id="PG_college_error" class="error"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="PG_passing_year" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Passing Year</label>
                                    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                        <select data-plugin="select2" id="PG_passing_year" name="PG_passing_year" class="form-control ">
                                            <option  hidden="" value="0">Select Passing Year</option>
                                            <?php for ($i=date("Y"); $i > date("Y")-25 ; $i--) {  ?>
                                            <option <?php if(isset($pgData->passing_year) && $pgData->passing_year==$i){ echo "selected"; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php } ?>
                                        </select>
                                        <span id="PG_passing_year_error" class="error"></span>
                                    </div>
                                    <label for="PG_gpa_marks" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Postgraduate marks(GPA)</label>
                                    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                        <input id="PG_gpa_marks" type="number" max="10" min="0" step="0.01" value="<?php if(isset($pgData->gpa_marks)){ echo $pgData->gpa_marks; } ?>" name="PG_gpa_marks" class="form-control ">
                                        <span id="PG_gpa_marks_error" class="error"></span>
                                    </div>
                                </div><hr>

                                <div class="form-group row">
                                    <label for="professional_qualification" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Professional Qualification</label>
                                    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                        <input id="professional_qualification" type="text"  value="<?php if(isset($professional_details->professional_qualification)) { echo $professional_details->professional_qualification; } ?>" name="professional_qualification" class="form-control ">
                                    </div>
                                    <label for="total_experience" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Work experience</label>
                                    <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                        <input id="total_experience" value="<?php if(isset($professional_details->total_experience)) { echo $professional_details->total_experience; } ?>" type="number" min="0" step="1" name="total_experience" class="form-control ">
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
                                        <select data-plugin="select2" id="c_employer_id" name="c_employer_id" class="form-control ">
                                            <option  hidden="" value="0">Select Current Employer</option>
                                            <?php if(!empty($employer_list)) { foreach ($employer_list as $key => $value) { ?>
                                                <option <?php if(isset($Current_company->employer_id) && $Current_company->employer_id==$value->employer_id) { echo "selected"; } ?> value="<?php echo $value->employer_id;?>"><?php echo $value->employer_name ;?></option>
                                            <?php } } ?>
                                        </select>
                                        <span id="c_employer_id_error" class="error"></span>
                                    </div>

                                    <label for="p1_employer_id" class="form-control-label col-md-2 col-sm-2 col-xl-2 col-lg-1" >Previous Employer 1</label>
                                    <div class="col-md-2 col-lg-2 col-sm-4  col-xl-2">
                                        <select data-plugin="select2" id="p1_employer_id" name="p1_employer_id" class="form-control ">
                                            <option  hidden="" value="0">Select Previous Employer 1</option>
                                            <?php if(!empty($employer_list)) { foreach ($employer_list as $key => $value) { ?>
                                                <option <?php if(isset($emp1->employer_id) && $emp1->employer_id==$value->employer_id) { echo "selected"; } ?> value="<?php echo $value->employer_id;?>"><?php echo $value->employer_name ;?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>

                                    <label for="Degree Name" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Previous Employer 2</label>
                                    <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                        <select data-plugin="select2" id="p2_employer_id" name="p2_employer_id" class="form-control ">
                                            <option  hidden="" value="0">Select Previous Employer 1</option>
                                            <?php if(!empty($employer_list)) { foreach ($employer_list as $key => $value) { ?>
                                                <option <?php if(isset($emp2->employer_id) && $emp2->employer_id==$value->employer_id) { echo "selected"; } ?> value="<?php echo $value->employer_id;?>"><?php echo $value->employer_name ;?></option>
                                            <?php } } ?>
                                        </select>
                                    </div>
                                </div><!-- <hr>
                                <div class="form-group row">
                                    <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-12">
                                        <h6>Remarks if any</h6>
                                        <textarea class="form-control" required style="resize: none;"><?php // if(isset($professional_details->remarks)) { echo $professional_details->remarks; } ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mt-20" >
                                    <div class="col-md-6 col-lg-6 col-sm-6  col-xl-6 col-6">
                                        <button type="button" class="btn btn-success float-right">Save</button>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6  col-xl-6 col-6">
                                        <button type="button" class="btn btn-danger float-left">Cancel</button>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <h3>Application Details</h3>
                        <div>
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
                            <div class="col-sm-12 col-md-12 mt-20">
                                <div class="form-group row mt-50" id="exam-section">
                                    <label for="gmat_select" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2 "  style="text-align: left;">GMAT taken?</label>
                                    <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                        <select id="gmat_select" class="form-control trigger" name="gmat" data-target="gmat_tar">
                                            <option hidden="" value="0">Yes/No</option>
                                            <option <?php if(isset($student_gmat)){ echo 'selected';} ?> value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                    </div>

                                    <label for="gmat_score" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Score(%)</label>
                                    <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                        <input type="number" <?php if(isset($student_gmat)){ ?> value="<?php echo $student_gmat->score; ?>" <?php }else{ echo 'disabled'; } ?> id="gmat_score" maxlength="3" step="1" max="800" min="1" name="gmat_score" placeholder="if (yes)" class="form-control gmat_tar">
                                        <span id="gmat_score_error" class="error"></span>
                                    </div>

                                    <label for="gmat_tenative_date" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Tenative date</label>
                                    <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                        <div class="input-group">
                                            <input type="text" <?php if(isset($student_gmat)){ ?> value="<?php echo $student_gmat->tentative_date; ?>" <?php }else{ echo 'disabled'; } ?> id="gmat_tenative_date" name="gmat_tentative_date" class="form-control gmat_tar" placeholder="Select Tenative Date">
                                            <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                            <span id="gmat_tenative_date_error" class="error"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row mt-50" id="exam-section">
                                    <label for="gre_select" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2"  style="text-align: left;">GRE taken?</label>
                                    <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                        <select id="gre_select" name="gre" class="form-control trigger" data-target="gre_tar">
                                            <option hidden="" value="0">Yes/No</option>
                                            <option <?php if(isset($student_gre)){ echo 'selected';} ?> value="1">Yes</option>
                                            <option value="2">No</option>
                                        </select>
                                        <span id="gre_select_error" class="error"></span>
                                    </div>

                                    <label for="gre_score" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Score(%)</label>
                                    <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                        <input type="number" <?php if(isset($student_gre)){ ?> value="<?php echo $student_gre->score; ?>" <?php }else{ echo 'disabled'; } ?> id="gre_score" maxlength="3" step="1" max="340" min="1" name="gre_score" id="gre_score" placeholder="if (yes)" class="form-control gre_tar">
                                        <span id="gre_score_error" class="error"></span>
                                    </div>

                                    <label for="gre_tenative_date" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Tenative date</label>
                                    <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                        <div class="input-group">
                                            <input type="text" id="gre_tenative_date" name="gre_tentative_date" class="form-control gre_tar" <?php if(isset($student_gre)){ ?> value="<?php echo $student_gre->tentative_date; ?>" <?php }else{ echo 'disabled'; } ?> placeholder="Select Tenative Date">
                                            <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                            <span id="gre_tenative_date_error" class="error"></span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group row last_package1">
                                    <div class="col-md-6 col-lg-6 col-sm-6  col-xl-6">
                                        <h5 class="float-left">Packages</h5>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6  col-xl-6">
                                        <button type="button" class="btn btn-success float-right mr-30" id="btn_add_package">Add more packages</button>
                                    </div>
                                </div>
                                <?php if(isset($student_packages)&& !empty($student_packages))
                                { 
                                    foreach ($student_packages as $key => $stu_package) { ?>
                                    <div class="form-group row removePackageParent last_package">
                                        <label for="signup_date" class="form-control-label col-md-1 col-sm-2 col-xl-1 col-lg-1" style="text-align: left;">Sign up date</label>
                                        <div class="col-md-3 col-lg-2 col-sm-3  col-xl-2">
                                            <div class="input-group">
                                                <input name="signup_date[]" value="<?php if(strlen($stu_package->signup_date)){ echo $stu_package->signup_date;} ?>" type="text" class="form-control signup_date" placeholder="Select Enquiry Date" aria-label="signup_date" aria-describedby="basic-addon1">
                                                <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                            </div>
                                        </div>

                                        <label for="package_id" class="form-control-label col-md-1 col-sm-4 col-xl-1 col-lg-1" >Package name</label>
                                        <div class="col-md-2 col-lg-2 col-sm-3  col-xl-2">
                                            <select name="package_id[]" class="form-control package_id">
                                                <option  hidden="" value="0">Select Package</option>
                                                <?php foreach ($package_list as $key => $value) { ?>
                                                    <option <?php if($stu_package->package_id==$value->package_id){ echo "selected";} ?> value="<?php echo $value->package_id; ?>"><?php echo $value->package_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <label for="consultant_id" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Consultant Assigned</label>
                                        <div class="col-md-2 col-lg-2 col-sm-5  col-xl-2">
                                            <select name="consultant_id[]" class="form-control">
                                                <option hidden="" value="0">Select Consultant</option>
                                                <?php foreach ($consultant_list as $key => $value) { ?>
                                                    <option <?php if($stu_package->consultant_id==$value->user_id){ echo "selected";} ?> value="<?php echo $value->user_id; ?>"><?php echo $value->user_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-sm-4 col-12 col-md-1 col-lg-1 col-xl-2 icondemo iconWrap" >
                                            <a class="btn btn-danger btn-icon del" title="Click to Delete the Phonenumber"><span data-image="" data-product="" class="icon wb-close-mini remove_image"></span></a>
                                        </div>
                                    </div>
                                <?php } }else{ ?>
                                    <div class="form-group row removePackageParent last_package">
                                        <label for="signup_date" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-1" style="text-align: left;">Sign up date</label>
                                        <div class="col-md-2 col-lg-2 col-sm-3  col-xl-2">
                                            <div class="input-group">
                                                <input name="signup_date[]" type="text" class="form-control signup_date" placeholder="Select Enquiry Date" aria-label="signup_date" aria-describedby="basic-addon1">
                                                <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                            </div>
                                        </div>

                                        <label for="package_id" class="form-control-label col-md-1 col-sm-4 col-xl-1 col-lg-1" >Package name</label>
                                        <div class="col-md-2 col-lg-2 col-sm-3  col-xl-2">
                                            <select name="package_id[]" class="form-control package_id">
                                                <option  hidden="" value="0">Select Package</option>
                                                <?php foreach ($package_list as $key => $value) { ?>
                                                    <option value="<?php echo $value->package_id; ?>"><?php echo $value->package_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <label for="consultant_id" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Consultant Assigned</label>
                                        <div class="col-md-2 col-lg-2 col-sm-5  col-xl-2">
                                            <select name="consultant_id[]" class="form-control">
                                                <option hidden="" value="0">Select Consultant</option>
                                                <?php foreach ($consultant_list as $key => $value) { ?>
                                                    <option value="<?php echo $value->user_id; ?>"><?php echo $value->user_name; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="col-sm-4 col-12 col-md-1 col-lg-1 col-xl-2 icondemo iconWrap" >
                                            <a class="btn btn-danger btn-icon del" title="Click to Delete the Phonenumber"><span data-image="" data-product="" class="icon wb-close-mini remove_image"></span></a>
                                        </div>
                                    </div>
                                <?php } ?>
                                <!-- <div class="form-group row" add_class="last_package1"> 
                                    <label for="signup_date" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Sign up date</label>
                                    <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                        <div class="input-group">
                                            <input name="signup_date[]" type="text" class="form-control signup_date" placeholder="Select Enquiry Date" aria-label="signup_date" aria-describedby="basic-addon1">
                                            <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                        </div>
                                    </div>

                                    <label for="package_id" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Package name</label>
                                    <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                        <select data-plugin="select2" name="package_id[]" class="form-control">
                                            <option hidden="" value="0">Select Package</option>
                                            <?php // foreach ($package_list as $key => $value) { ?>
                                                <option value="<?php // echo $value->package_id; ?>"><?php // echo $value->package_name; ?></option>
                                            <?php // } ?>
                                        </select>
                                    </div>

                                    <label for="consultant_id" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Consultant Assigned</label>
                                    <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                        <select name="consultant_id[]" class="form-control">
                                            <option hidden="" value="0">Select Consultant</option>
                                            <?php //foreach ($consultant_list as $key => $value) { ?>
                                                <option value="<?php // echo $value->user_id; ?>"><?php // echo $value->user_name; ?></option>
                                            <?php // } ?>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="form-group row mt-20" style="text-align: right">
                                    <div class="col-md-12 col-lg-12 col-sm-12  col-xl-12 col-12">
                                        <button type="submit" class="btn btn-success btnSubmit">Submit</button>
                                        <button type="button" class="btn btn-warning btnCancel">Cancel</button>
                                        <button type="reset" class="btn btn-danger btnDelete">Delete</button>
                                    </div>
                                </div>
                            </div><!-- end of col-12 -->
                        </div>
                    </div>
                <?php echo form_close(); ?>
                <?php $arr=array('class'=>"form-horizontal mt-30","id"=>"second_section");
                            echo form_open('admin/student/updateCollege',$arr); ?>
                    <div class="form-group row mt-50" >
                        <div class="col-md-6 col-lg-6 col-sm-6  col-xl-6">
                            <h5 class="title">College Applications</h5>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6  col-xl-6">
                            <button type="button" class="btn btn-success float-right mr-30" id="btn_add_college">Add more college</button>
                        </div>
                    </div>
                    <section id="basic_college_application1"></section>
                    <!--<section id="basic_college_application1">
                        <div class="form-group row" >
                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Applied college</label>
                            <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                <select data-plugin="select2" name="college_id[]" class="form-control college_id">
                                    <option  hidden="" value="0">Select Applied college</option>
                                    <?php if(!empty($apply_college_list)) { foreach ($apply_college_list as $key => $value) { ?>
                                        <option value="<?php echo $value->college_id;?>"><?php echo $value->college_name ;?></option>
                                    <?php } } ?>
                                </select>
                                <input type="hidden" name="student_id" value="<?php echo $enquiery_data->student_id; ?>">
                                <span class="error"></span>
                            </div>

                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Intake year</label>
                            <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                <select data-plugin="select2" name="intake_year[]" class="form-control intake_year">
                                    <option  hidden="" value="0">Select Intake year</option>
                                    <?php for ($i=date("Y"); $i <= date("Y")+5 ; $i++) {  ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="error"></span>
                            </div>

                            <label class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Application round</label>
                            <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                <select data-plugin="select2" name="round_id[]" class="form-control round_id">
                                    <option  hidden="" value="0">Select Application round</option>
                                    <?php if(!empty($appround_list)) { foreach ($appround_list as $key => $value) { ?>
                                        <option value="<?php echo $value->round_id;?>"><?php echo $value->round_name ;?></option>
                                    <?php } } ?>
                                </select>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="form-group row" >
                            <label class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Application status</label>
                            <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                <select name="app_status_id[]" class="form-control app_status_id">
                                    <option  hidden="" value="0">Select Application Status</option>
                                    <?php if(!empty($app_status_list)) { foreach ($app_status_list as $key => $value) { ?>
                                        <option value="<?php echo $value->app_status_id;?>"><?php echo $value->app_status;?></option>
                                    <?php } } ?>
                                </select>
                                <span class="error"></span>
                            </div>

                            <label class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Interview status</label>
                            <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                <select name="intv_status_id[]" class="form-control intv_status_id">
                                    <option  hidden="" value="0">Select Interview Status</option>
                                    <?php if(!empty($interview_status_list)) { foreach ($interview_status_list as $key => $value) { ?>
                                        <option value="<?php echo $value->intv_status_id;?>"><?php echo $value->intv_status;?></option>
                                    <?php } } ?>
                                </select>
                                <span class="error"></span>
                            </div>

                            <label class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Applied program</label>
                            <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                <select data-plugin="select2" name="applied_program_id[]" class="form-control applied_program_id">
                                    <option  hidden="" value="0">Select Applied program</option>
                                    <?php if(!empty($program_list)) { foreach ($program_list as $key => $value) { ?>
                                        <option value="<?php echo $value->program_id;?>"><?php echo $value->program_name;?></option>
                                    <?php } } ?>
                                </select>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="form-group row" >
                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Admit status</label>
                            <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                <select name="admit_status_id[]" class="form-control admit_status_id">
                                    <option  hidden="" value="0">Select Applied program</option>
                                    <?php if(!empty($admit_status_list)) { foreach ($admit_status_list as $key => $value) { ?>
                                        <option value="<?php echo $value->admit_status_id;?>"><?php echo $value->admit_status;?></option>
                                    <?php } } ?>
                                </select>
                                <span class="error"></span>
                            </div>


                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Scholarship awarded</label>
                            <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                <select name="is_scholarship_awarded[]" disabled="" class="form-control is_scholarship_awarded">
                                    <option hidden="" value="0">Yes/No</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                                <span class="error"></span>
                            </div>

                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Scholarship amount</label>
                            <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                <input type="number" disabled="" required="" min="0" step="0.1" name="scholarship_amount[]" class="form-control scholarship_amount">
                                <span class="error"></span>
                            </div>
                        </div>
                    </section> -->
                    <?php if(isset($applied_student_colleges) && !empty($applied_student_colleges)){ 
                        foreach ($applied_student_colleges as $app_key => $app_college) { ?>
                        <section class="removeCollegeParent <?php if(end($applied_student_colleges)==$app_college) { echo 'last_college_application'; } ?>">
                            <div class="form-group row" >
                                <div class="col-sm-12 col-12 col-md-12 col-lg-12 col-xl-12 icondemo iconWrap" >
                                    <a class="btn btn-danger btn-icon delCollege float-right"><span data-image="" data-product="" class="icon wb-close-mini remove_image"></span></a>
                                </div>
                            </div>
                            <div class="form-group row" >
                                <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Applied college</label>
                                <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                    <select name="college_id[]" class="form-control college_id">
                                        <option  hidden="" value="0">Select Applied college</option>
                                        <?php if(!empty($apply_college_list)) { foreach ($apply_college_list as $key => $value) { ?>
                                            <option <?php if($app_college->college_id==$value->college_id){ echo "Selected"; } ?> value="<?php echo $value->college_id;?>"><?php echo $value->college_name ;?></option>
                                        <?php } } ?>
                                    </select>
                                    <span class="error"></span>
                                </div>

                                <label for="Degree Name" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Intake year</label>
                                <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                    <select name="intake_year[]" class="form-control intake_year">
                                        <option  hidden="" value="0">Select Intake year</option>
                                        <?php for ($i=date("Y"); $i <= date("Y")+5 ; $i++) {  ?>
                                        <option <?php if($app_college->intake_year==$i){ echo "Selected"; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="error"></span>
                                </div>

                                <label class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Application round</label>
                                <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                    <select name="round_id[]" class="form-control round_id">
                                        <option  hidden="" value="0">Select Application round</option>
                                        <?php if(!empty($appround_list)) { foreach ($appround_list as $key => $value) { ?>
                                            <option <?php if($app_college->round_id==$value->round_id){ echo "Selected"; } ?> value="<?php echo $value->round_id;?>"><?php echo $value->round_name ;?></option>
                                        <?php } } ?>
                                    </select>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div class="form-group row" >
                                <label class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Application status</label>
                                <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                    <select name="app_status_id[]" class="form-control app_status_id">
                                        <option  hidden="" value="0">Select Application Status</option>
                                        <?php if(!empty($app_status_list)) { foreach ($app_status_list as $key => $value) { ?>
                                            <option <?php if($app_college->app_status_id==$value->app_status_id){ echo "Selected"; } ?> value="<?php echo $value->app_status_id;?>"><?php echo $value->app_status;?></option>
                                        <?php } } ?>
                                    </select>
                                    <span class="error"></span>
                                </div>

                                <label class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Interview status</label>
                                <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                    <select name="intv_status_id[]" class="form-control intv_status_id">
                                        <option  hidden="" value="0">Select Interview Status</option>
                                        <?php if(!empty($interview_status_list)) { foreach ($interview_status_list as $key => $value) { ?>
                                            <option <?php if($app_college->intv_status_id==$value->intv_status_id){ echo "Selected"; } ?> value="<?php echo $value->intv_status_id;?>"><?php echo $value->intv_status;?></option>
                                        <?php } } ?>
                                    </select>
                                    <span class="error"></span>
                                </div>

                                <label class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Applied program</label>
                                <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                    <select name="applied_program_id[]" class="form-control applied_program_id">
                                        <option  hidden="" value="0">Select Applied program</option>
                                        <?php if(!empty($program_list)) { foreach ($program_list as $key => $value) { ?>
                                            <option <?php if($app_college->applied_program_id==$value->program_id){ echo "Selected"; } ?> value="<?php echo $value->program_id;?>"><?php echo $value->program_name;?></option>
                                        <?php } } ?>
                                    </select>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div class="form-group row" >
                                <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Admit status</label>
                                <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                    <select name="admit_status_id[]" class="form-control admit_status_id">
                                        <option  hidden="" value="0">Select Applied program</option>
                                        <?php if(!empty($admit_status_list)) { foreach ($admit_status_list as $key => $value) { ?>
                                            <option <?php if($app_college->admit_status_id==$value->admit_status_id){ echo "Selected"; } ?> value="<?php echo $value->admit_status_id;?>"><?php echo $value->admit_status;?></option>
                                        <?php } } ?>
                                    </select>
                                    <span class="error"></span>
                                </div>


                                <label for="Degree Name" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Scholarship awarded</label>
                                <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                    <select name="is_scholarship_awarded[]" disabled="" class="form-control is_scholarship_awarded">
                                        <option hidden="" value="0">Yes/No</option>
                                        <option <?php if($app_college->is_scholarship_awarded=="true"){ echo "Selected"; } ?> value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                    <span class="error"></span>
                                </div>

                                <label for="Degree Name" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Scholarship amount</label>
                                <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                    <input type="number" <?php if($app_college->is_scholarship_awarded=="true"){ ?> value="<?php echo $app_college->scholarship_amount; ?>" <?php }else{ echo "disabled;";  } ?>  required="" min="0" step="0.1" name="scholarship_amount[]" class="form-control scholarship_amount">
                                    <span class="error"></span>
                                </div>
                            </div>
                        </section>
                    <?php } }else{ ?>
                        <section class="removeCollegeParent last_college_application">
                            <div class="form-group row" >
                                <div class="col-sm-12 col-12 col-md-12 col-lg-12 col-xl-12 icondemo iconWrap" >
                                    <a class="btn btn-danger btn-icon delCollege float-right"><span data-image="" data-product="" class="icon wb-close-mini remove_image"></span></a>
                                </div>
                            </div>
                            <div class="form-group row" >
                                <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Applied college</label>
                                <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                    <select name="college_id[]" class="form-control college_id">
                                        <option  hidden="" value="0">Select Applied college</option>
                                        <?php if(!empty($apply_college_list)) { foreach ($apply_college_list as $key => $value) { ?>
                                            <option value="<?php echo $value->college_id;?>"><?php echo $value->college_name ;?></option>
                                        <?php } } ?>
                                    </select>
                                    <span class="error"></span>
                                </div>

                                <label for="Degree Name" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Intake year</label>
                                <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                    <select name="intake_year[]" class="form-control intake_year">
                                        <option  hidden="" value="0">Select Intake year</option>
                                        <?php for ($i=date("Y"); $i <= date("Y")+5 ; $i++) {  ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="error"></span>
                                </div>

                                <label class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Application round</label>
                                <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                    <select name="round_id[]" class="form-control round_id">
                                        <option  hidden="" value="0">Select Application round</option>
                                        <?php if(!empty($appround_list)) { foreach ($appround_list as $key => $value) { ?>
                                            <option value="<?php echo $value->round_id;?>"><?php echo $value->round_name ;?></option>
                                        <?php } } ?>
                                    </select>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div class="form-group row" >
                                <label class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Application status</label>
                                <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                    <select name="app_status_id[]" class="form-control app_status_id">
                                        <option  hidden="" value="0">Select Application Status</option>
                                        <?php if(!empty($app_status_list)) { foreach ($app_status_list as $key => $value) { ?>
                                            <option value="<?php echo $value->app_status_id;?>"><?php echo $value->app_status;?></option>
                                        <?php } } ?>
                                    </select>
                                    <span class="error"></span>
                                </div>

                                <label class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Interview status</label>
                                <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                    <select name="intv_status_id[]" class="form-control intv_status_id">
                                        <option  hidden="" value="0">Select Interview Status</option>
                                        <?php if(!empty($interview_status_list)) { foreach ($interview_status_list as $key => $value) { ?>
                                            <option value="<?php echo $value->intv_status_id;?>"><?php echo $value->intv_status;?></option>
                                        <?php } } ?>
                                    </select>
                                    <span class="error"></span>
                                </div>

                                <label class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Applied program</label>
                                <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                    <select name="applied_program_id[]" class="form-control applied_program_id">
                                        <option  hidden="" value="0">Select Applied program</option>
                                        <?php if(!empty($program_list)) { foreach ($program_list as $key => $value) { ?>
                                            <option value="<?php echo $value->program_id;?>"><?php echo $value->program_name;?></option>
                                        <?php } } ?>
                                    </select>
                                    <span class="error"></span>
                                </div>
                            </div>
                            <div class="form-group row" >
                                <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Admit status</label>
                                <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                    <select name="admit_status_id[]" class="form-control admit_status_id">
                                        <option  hidden="" value="0">Select Applied program</option>
                                        <?php if(!empty($admit_status_list)) { foreach ($admit_status_list as $key => $value) { ?>
                                            <option value="<?php echo $value->admit_status_id;?>"><?php echo $value->admit_status;?></option>
                                        <?php } } ?>
                                    </select>
                                    <span class="error"></span>
                                </div>


                                <label for="Degree Name" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Scholarship awarded</label>
                                <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                    <select name="is_scholarship_awarded[]" disabled="" class="form-control is_scholarship_awarded">
                                        <option hidden="" value="0">Yes/No</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                    <span class="error"></span>
                                </div>

                                <label for="Degree Name" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Scholarship amount</label>
                                <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                    <input type="number" disabled="" required="" min="0" step="0.1" name="scholarship_amount[]" class="form-control scholarship_amount">
                                    <span class="error"></span>
                                </div>
                            </div>
                        </section>
                    <?php } ?>
                    
                    <div class="form-group row mt-20" style="text-align: right">
                        <div class="col-md-12 col-lg-12 col-sm-12  col-xl-12 col-12">
                            <button type="button" class="btn btn-success btnSec2Submit">Submit</button>
                            <button type="button" class="btn btn-warning btnSec2Cancel">Cancel</button>
                            <button type="button" class="btn btn-danger btnSec2Delete">Delete</button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
                    <hr>
                <?php $arr=array('class'=>"form-horizontal mt-30","id"=>"third_section");
                            echo form_open('admin/student/updateJoiningProgram',$arr); ?>
                    <div class="form-group row" >
                        <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Joining program</label>
                        <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                            <select class="form-control ">
                            </select>
                        </div>

                        <label for="Degree Name" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Joining college</label>
                        <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                            <select class="form-control ">
                            </select>
                        </div>

                        <label for="joining_year" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Joining year</label>
                        <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                            <select data-plugin="select2" id="joining_year" name="joining_year" class="form-control ">
                                <option  hidden="" value="0">Select Passing Year</option>
                                <?php for ($i=date("Y"); $i <= date("Y")+5 ; $i++) {  ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row mt-20" >
                        <div class="col-md-6 col-lg-6 col-sm-6  col-xl-6 col-6">
                            <button type="button" class="btn btn-success float-right">Save</button>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6  col-xl-6 col-6">
                            <button type="button" class="btn btn-danger float-left">Cancel</button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
                <div class="row row-lg mt-50">
                    <div class="col-sm-12 col-md-12 mt-20">
                        <h3 class="example-title ">Conversation Summary</h3>
                        <a href="javascript:void(0)" data-action="add_new" data-toggle="modal" data-target="#myModal" data-id="<?php echo $enquiery_data->enq_id; ?>" id="add_follow_up" class="btn btn-success btnadd requestFollowUp">Add New Follow-Up</a>
                        <table id="store_list_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive " ><!-- data-plugin="dataTable" -->
                            <thead>
                                <tr>
                                    <th>Followup Date</th>
                                    <th>Agent name</th>
                                    <th>Followup comment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="conversation_tbody">
                                <?php if(!empty($followup_data)) {
                                foreach ($followup_data as $key => $value) { ?>
                                <tr>
                                    <td><?php echo date("jS F Y", strtotime($value->followup_date)); ?></td>
                                    <td><?php echo $value->first_name." ".$value->last_name; ?></td>
                                    <td><?php echo $value->followup_comment; ?></td>
                                    <td>
                                        <button type="button" data-toggle="modal" data-target="#myModal" data-id="<?php echo $value->followup_id; ?>" class="btn btn-outline btn-icon btn-warning btn-outline requestFollowUp" data-action="edit"><i class="icon wb-pencil" aria-hidden="true"></i></button>
                                        <button data-id="<?php echo $value->followup_id; ?>" type="button" class="btn  btn-outline btn-danger btn-sm requestFollowUp" data-action="delete"><i class="icon wb-trash" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                    <?php } } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div style="display: none" class="form-group row removePackageParent"  id="basic_package">
    <label for="signup_date" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-1" style="text-align: left;">Sign up date</label>
    <div class="col-md-2 col-lg-2 col-sm-3  col-xl-2">
        <div class="input-group">
            <input name="signup_date[]" type="text" class="form-control signup_date" placeholder="Select Enquiry Date" aria-label="signup_date" aria-describedby="basic-addon1">
            <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
        </div>
    </div>

    <label for="package_id" class="form-control-label col-md-1 col-sm-4 col-xl-1 col-lg-1" >Package name</label>
    <div class="col-md-2 col-lg-2 col-sm-3  col-xl-2">
        <select name="package_id[]" class="form-control package_id">
            <option  hidden="" value="0">Select Package</option>
            <?php foreach ($package_list as $key => $value) { ?>
                <option value="<?php echo $value->package_id; ?>"><?php echo $value->package_name; ?></option>
            <?php } ?>
        </select>
    </div>

    <label for="consultant_id" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Consultant Assigned</label>
    <div class="col-md-2 col-lg-2 col-sm-5  col-xl-2">
        <select name="consultant_id[]" class="form-control">
            <option hidden="" value="0">Select Consultant</option>
            <?php foreach ($consultant_list as $key => $value) { ?>
                <option value="<?php echo $value->user_id; ?>"><?php echo $value->user_name; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="col-sm-4 col-12 col-md-1 col-lg-1 col-xl-2 icondemo iconWrap" >
        <a class="btn btn-danger btn-icon del" title="Click to Delete the Phonenumber"><span data-image="" data-product="" class="icon wb-close-mini remove_image"></span></a>
    </div>
</div>
<section style="display: none;" class="removeCollegeParent" id="basic_college_application">
    <div class="form-group row" >
        <div class="col-sm-12 col-12 col-md-12 col-lg-12 col-xl-12 icondemo iconWrap" >
            <a class="btn btn-danger btn-icon delCollege float-right"><span data-image="" data-product="" class="icon wb-close-mini remove_image"></span></a>
        </div>
    </div>
    <div class="form-group row" >
        <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Applied college</label>
        <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
            <select name="college_id[]" class="form-control college_id">
                <option  hidden="" value="0">Select Applied college</option>
                <?php if(!empty($apply_college_list)) { foreach ($apply_college_list as $key => $value) { ?>
                    <option value="<?php echo $value->college_id;?>"><?php echo $value->college_name ;?></option>
                <?php } } ?>
            </select>
            <span class="error"></span>
        </div>

        <label for="Degree Name" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Intake year</label>
        <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
            <select name="intake_year[]" class="form-control intake_year">
                <option  hidden="" value="0">Select Intake year</option>
                <?php for ($i=date("Y"); $i <= date("Y")+5 ; $i++) {  ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
            </select>
            <span class="error"></span>
        </div>

        <label class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Application round</label>
        <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
            <select name="round_id[]" class="form-control round_id">
                <option  hidden="" value="0">Select Application round</option>
                <?php if(!empty($appround_list)) { foreach ($appround_list as $key => $value) { ?>
                    <option value="<?php echo $value->round_id;?>"><?php echo $value->round_name ;?></option>
                <?php } } ?>
            </select>
            <span class="error"></span>
        </div>
    </div>
    <div class="form-group row" >
        <label class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Application status</label>
        <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
            <select name="app_status_id[]" class="form-control app_status_id">
                <option  hidden="" value="0">Select Application Status</option>
                <?php if(!empty($app_status_list)) { foreach ($app_status_list as $key => $value) { ?>
                    <option value="<?php echo $value->app_status_id;?>"><?php echo $value->app_status;?></option>
                <?php } } ?>
            </select>
            <span class="error"></span>
        </div>

        <label class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Interview status</label>
        <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
            <select name="intv_status_id[]" class="form-control intv_status_id">
                <option  hidden="" value="0">Select Interview Status</option>
                <?php if(!empty($interview_status_list)) { foreach ($interview_status_list as $key => $value) { ?>
                    <option value="<?php echo $value->intv_status_id;?>"><?php echo $value->intv_status;?></option>
                <?php } } ?>
            </select>
            <span class="error"></span>
        </div>

        <label class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Applied program</label>
        <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
            <select name="applied_program_id[]" class="form-control applied_program_id">
                <option  hidden="" value="0">Select Applied program</option>
                <?php if(!empty($program_list)) { foreach ($program_list as $key => $value) { ?>
                    <option value="<?php echo $value->program_id;?>"><?php echo $value->program_name;?></option>
                <?php } } ?>
            </select>
            <span class="error"></span>
        </div>
    </div>
    <div class="form-group row" >
        <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Admit status</label>
        <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
            <select name="admit_status_id[]" class="form-control admit_status_id">
                <option  hidden="" value="0">Select Applied program</option>
                <?php if(!empty($admit_status_list)) { foreach ($admit_status_list as $key => $value) { ?>
                    <option value="<?php echo $value->admit_status_id;?>"><?php echo $value->admit_status;?></option>
                <?php } } ?>
            </select>
            <span class="error"></span>
        </div>


        <label for="Degree Name" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Scholarship awarded</label>
        <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
            <select name="is_scholarship_awarded[]" disabled="" class="form-control is_scholarship_awarded">
                <option hidden="" value="0">Yes/No</option>
                <option value="1">Yes</option>
                <option value="2">No</option>
            </select>
            <span class="error"></span>
        </div>

        <label for="Degree Name" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Scholarship amount</label>
        <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
            <input type="number" disabled="" required="" min="0" step="0.1" name="scholarship_amount[]" class="form-control scholarship_amount">
            <span class="error"></span>
        </div>
    </div>
</section>

<div class="modal modal-transparent modal-fullscreen fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="container">
                <?php $arr=array('class'=>"form-horizontal", 'id'=>"followUpForm");
                            echo form_open('admin/add_follow_up',$arr); ?>
                <div class="modal-header modal-header-success">
                    <h4>Add follow up for - <?php echo  $personal_details->first_name." ".$personal_details->last_name; ?></h4>
                    <button type="button btn-lg" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="btnClose">&times;</span>
                    </button>                
                </div>
                <div class="modal-body" id="targetBody">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success BtnSaveFollowup">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                 <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<!-- End Page -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $( "#accordion" ).accordion({ 
            active: false,
            navigation: true,
            collapsible: true   });
        var table=$("#store_list_table").DataTable( {
            "order": [[ 0, "asc" ]],
            stateSave: true,
            responsive: true,
            "fnDrawCallback": function(e) {
                var elems = Array.prototype.slice.call(document.querySelectorAll('.switch'));
                elems.forEach(function(elem) {
                    if(!elem.hasAttribute("data-switchery")){
                        var switchery = new Switchery(elem,{color: '#3aa99e',secondaryColor: '#FF0000'});    
                    }
                });
            }
        })
        $("#store_list_table_length").append($("#add_follow_up"));
        
        $(".switch").change(function(event) {
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var changeCheckbox = $(this)[0];//target
            var data={is_active:changeCheckbox.checked,pk_id:$(changeCheckbox).data('id'),type:$(changeCheckbox).data('type'),[csrfName]:csrfHash};
            $.post("<?php echo base_url('admin/changeAllStatus') ?>", data, 
                function(data, textStatus, xhr) {
                    if(changeCheckbox.checked)
                    {
                        toastr_type="success";
                        str="Product Activated successfully";
                    }else{
                        toastr_type="warning";
                        str="Product Deactivated successfully";
                    }
                    toastr.options = {
                      "closeButton": true
                    }
                    toastr[toastr_type](str);
            });
        });
   


        $("#gmat_tenative_date").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            //minDate: moment(),
            locale: {
                format: 'YYYY-MM-DD'
            } ,
        });
        $("#gre_tenative_date").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            //minDate: moment(),
            locale: {
                format: 'YYYY-MM-DD'
            }
        });

        $(".signup_date").each(function(index, el) {
            $(this).daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });
        });
        
        
    


        $(document).on('change', '.trigger', function(event) {
                event.preventDefault();
                if(this.value=="1"){

                    var targetClass=this.dataset.target;
                    var ab=document.getElementsByClassName(targetClass);
                    for (var i = 0; i < ab.length; i++) {
                        ab[i].removeAttribute('disabled');
                    }

                }else{
                     var targetClass=this.dataset.target;
                    var ab=document.getElementsByClassName(targetClass);//.removeAttribute('readonly')
                    $(ab).each(function(index, el) {
                        $(this).attr('disabled',"true");
                    });
                }
        });

        $(document).on('change', '.admit_status_id', function(event) {
                event.preventDefault();
                var targetClass=$(this).parents('section').find('.is_scholarship_awarded');
                if(this.value=="1"){
                    targetClass.removeAttr('disabled');
                }else{
                    var targetClass1=$(this).parents('section').find('.scholarship_amount');
                    targetClass.val("0").change();
                    targetClass1.attr('disabled','true');
                    targetClass.attr('disabled','true');
                }
        });

        $(document).on('change', '.is_scholarship_awarded', function(event) {
                event.preventDefault();
                var targetClass=$(this).parents('section').find('.scholarship_amount');
                if(this.value=="1"){
                    targetClass.removeAttr('disabled');
                }else{
                    targetClass.attr('disabled','true');
                }
        });

    

    
        $(document).on('click', '.del', function(event) {
            event.preventDefault();
            $(this).parents('.removePackageParent').remove();
        });
        $(document).on('click', '.delCollege', function(event) {
            event.preventDefault();
            $(this).parents('.removeCollegeParent').remove();
        });
    

        $(document).on('click', '#btn_add_package', function(event) {
            event.preventDefault();
            var basicPackage=$("#basic_package").clone();
            basicPackage.addClass('last_package').removeAttr('id').css('display', 'flex').find('.signup_date').daterangepicker({
                    singleDatePicker: true,
                    showDropdowns: true,
                    locale: {
                        format: 'YYYY-MM-DD'
                    }
            });
            basicPackage.find('.package_id').select2();
            if($('.last_package').length)
            {
                var last_package=$('.last_package').removeClass('last_package');
                basicPackage.insertAfter(last_package);
            }else{
                var last_package=$('.last_package1');
                basicPackage.insertAfter(last_package);
            }
            
        });

        $(document).on('click', '#btn_add_college', function(event) {
            event.preventDefault();
            var basicCollege=$("#basic_college_application").clone();
            basicCollege.addClass('last_college_application').removeAttr('id').css('display', 'block');
            basicCollege.find('.college_id,.intake_year,.round_id,.applied_program_id').select2();
            if($('.last_college_application').length)
            {
                var last_College=$('.last_college_application').removeClass('last_college_application');
                basicCollege.insertAfter(last_College);
            }else{
                var last_College=$('#basic_college_application1');
                basicCollege.insertAfter(last_College);
            }
        });


        $(document).on('click', '.btnSubmit', function(event) {
            event.preventDefault();
            var gendererr,UG_degree_err,UG_college_error,UG_passing_year,UG_gpa_marks=0;
            var PG_degree_error,PG_college_error,PG_passing_year_error,PG_gpa_marks_error,PG_degree_error=0;
            var PG_college_error,PG_passing_year_error,PG_gpa_marks_error,gmat_score_error,gmat_tenative_date_error=0;
            var gre_score_error,gre_tenative_date_error=0;      
            event.preventDefault();
            var formObj = $("#fist_section");
            var formData = new FormData(formObj[0]);
            var gender=parseInt($("#gender_id").val());
            if(!gender)
            {
                $("#gendererr").html("Please Select Gender");
                gendererr=1;
            }else{
                $("#gendererr").empty();
                gendererr=0;
            }

            var UG_degree=parseInt($("#UG_degree").val());
            if(isNaN(UG_degree) || !(parseInt(UG_degree)))
            {
                $("#UG_degree_err").html("Please Select Undergraduate Degree");
                UG_degree_err=1;
            }else{
                $("#UG_degree_err").empty();
                UG_degree_err=0;
            }

            var UG_college_id=parseInt($("#UG_college_id").val());
            if(isNaN(UG_college_id) || !(parseInt(UG_college_id)))
            {
                $("#UG_college_error").html("Please Select Undergraduate College");
                UG_college_error=1;
            }else{
                $("#UG_college_error").empty();
                UG_college_error=0;
            }


            var UG_passing_year=parseInt($("#UG_passing_year").val());
            if(isNaN(UG_passing_year) || !(parseInt(UG_passing_year)))
            {
                $("#UG_passing_year_error").html("Please Select Passing year");
                UG_passing_year_error=1;
            }else{
                $("#UG_passing_year_error").empty();
                UG_passing_year_error=0;
            }

            var UG_gpa_marks=parseInt($("#UG_gpa_marks").val());
            if(isNaN(UG_gpa_marks) || !(parseInt(UG_gpa_marks)))
            {
                $("#UG_gpa_marks_error").html("Please add GPA marks");
                UG_gpa_marks_error=1;
            }else{
                $("#UG_gpa_marks_error").empty();
                UG_gpa_marks_error=0;
            }


            var PG_degree=parseInt($("#PG_degree").val());
            var PG_college=parseInt($("#PG_college").val());
            var PG_passing_year=parseInt($("#PG_passing_year").val());
            var PG_gpa_marks=$("#PG_gpa_marks").val();
            
            if(PG_degree || PG_college || PG_passing_year || PG_gpa_marks)
            {///usecase when any of the above is entered
                if(isNaN(PG_degree) || !(parseInt(PG_degree)))
                {
                    $("#PG_degree_error").html("Please add GPA marks");
                    PG_degree_error=1;
                }else{
                    $("#PG_degree_error").empty();
                    PG_degree_error=0;
                }

                if(isNaN(PG_college) || !(parseInt(PG_college)))
                {
                    $("#PG_college_error").html("Please add GPA marks");
                    PG_college_error=1;
                }else{
                    $("#PG_college_error").empty();
                    PG_college_error=0;
                }

                if(isNaN(PG_passing_year) || !(parseInt(PG_passing_year)))
                {
                    $("#PG_passing_year_error").html("Please add GPA marks");
                    PG_passing_year_error=1;
                }else{
                    $("#PG_passing_year_error").empty();
                    PG_passing_year_error=0;
                }

                if(isNaN(PG_gpa_marks) || !(parseInt(PG_gpa_marks)))
                {
                    $("#PG_gpa_marks_error").html("Please add GPA marks");
                    PG_gpa_marks_error=1;
                }else{
                    $("#PG_gpa_marks_error").empty();
                    PG_gpa_marks_error=0;
                }
            }else{
                $("#PG_degree_error").empty();
                PG_degree_error=0;
                $("#PG_college_error").empty();
                PG_college_error=0;
                $("#PG_passing_year_error").empty();
                PG_passing_year_error=0;
                $("#PG_gpa_marks_error").empty();
                PG_gpa_marks_error=0;
            }

            var gmat_select=parseInt($("#gmat_select").val());
            if(gmat_select==1)
            {
                if(parseInt($("#gmat_score").val()) && $("#gmat_tenative_date").val())
                {
                    $("#gmat_score_error").empty();
                    gmat_score_error=0;
                    $("#gmat_tenative_date_error").empty();
                    gmat_tenative_date_error=0;
                }else
                {
                    if(!parseInt($("#gmat_score").val()))
                    {
                        $("#gmat_score_error").html("Please add GMAT Score");
                        gmat_score_error=1;
                    }
                    if(!$("#gmat_tenative_date").val())
                    {
                        $("#gmat_tenative_date_error").html("Please add Tenative date");
                        gmat_tenative_date_error=1;
                    }
                }
            }else{
                $("#gmat_score_error").empty();
                gmat_score_error=0;
                $("#gmat_tenative_date_error").empty();
                gmat_tenative_date_error=0;
            }

            var gre_select=parseInt($("#gre_select").val());
            if(gre_select==1)
            {
                if(parseInt($("#gre_score").val()) && $("#gre_tenative_date").val())
                {
                    
                    $("#gre_score_error").empty();
                    gre_score_error=0;
                    $("#gre_tenative_date_error").empty();
                    gre_tenative_date_error=0;
                }else
                {
                    
                    if(!parseInt($("#gre_score").val()))
                    {
                        $("#gre_score_error").html("Please add GRE Score");
                        gre_score_error=1;
                    }
                    if(!$("#gre_tenative_date").val())
                    {
                        $("#gre_tenative_date_error").html("Please add Tenative date");
                        gre_tenative_date_error=1;
                    }
                }
            }else{
                $("#gre_score_error").empty();
                gre_score_error=0;
                $("#gre_tenative_date_error").empty();
                gre_tenative_date_error=0;
            }

            var errorarray=[gendererr,UG_degree_err,UG_college_error,UG_passing_year_error,UG_gpa_marks_error,PG_degree_error,PG_college_error,PG_passing_year_error,PG_gpa_marks_error,gmat_score_error,gmat_tenative_date_error,gre_score_error,gre_tenative_date_error];

            var flagerror=0;
            errorarray.forEach(function(element,index) {
                if(element)
                {
                    flagerror=1;
                    return true;
                }
            });

            if(flagerror)
            { 
                str="Please check the errors in form";
                toastr.options = {
                  "closeButton": true,
                  timeOut: 10000
                }
                toastr["error"](str);
                $(".ui-accordion-content").show();
            }else{
                var formObj = $("#fist_section");
                var formData = new FormData(formObj[0]);
                var formURL="<?php echo base_url('admin/student/update'); ?>";
                $.ajax({
                    url: formURL,
                    type: "POST",
                    data:  formData,
                    async: true,
                    datatype : false,
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data, textStatus, jqXHR)
                    {
                        str="Information Stored successfully";
                        toastr.options = {
                          "closeButton": true,
                          timeOut: 5000
                        }
                        toastr["success"](str);
                    }         
                });
            }
        });

        $(document).on('click', '.btnSec2Submit', function(event) {
            event.preventDefault();
            var section2err=0;
            var find_array=["college_id","intake_year","round_id","app_status_id","intv_status_id","applied_program_id","admit_status_id"];
            var error_array=["Please select College","Please add intake year","Please Select Application round","Please Select Application Status","Please Select Interview Status","Please Select Applied Program","Please select Admit Status"];

            find_array.forEach(function(element,index1) {
                $("#second_section").find('.'+element).each(function(index, el) {
                    if(!parseInt($(this).val()))
                    {
                        $(this).parent().find('span.error').html(error_array[index1]);
                        section2err=1;
                    }else{
                        $(this).parent().find('span.error').empty();
                    }
                });
            });

            $("#second_section").find('.admit_status_id').each(function(index, el) {
                if(parseInt($(this).val())==1)
                {
                    var t1=$(this).parents("section").find('.is_scholarship_awarded');
                    if(t1.val()=="1")
                    {//schollership awarded 
                        t1.parent().find('span.error').empty();
                        var t2=t1.parents("section").find('.scholarship_amount');
                        if(t2.val()=="")
                        {
                            t2.parent().find('span.error').html("Please add schollership amount");
                            section2err=1;
                        }else{
                            t2.parent().find('span.error').empty();
                        }
                    }else{//no- for schollership awarded
                        if(t1.val()=="0")
                        {
                            t1.parent().find('span.error').html("Please select schollership status");
                            section2err=1;
                        }
                        if(t1.val()=="2")
                        {
                            t1.parent().find('span.error').empty();
                        }
                    }
                }else{
                    if(parseInt($(this).val())!=0)
                    {
                        $(this).parent().find('span.error').empty();
                    }
                }
            });

            if(section2err==1)
            {
                str="Please check the errors in College Application section";
                toastr.options = {
                  "closeButton": true,
                  timeOut: 10000
                }
                toastr["error"](str);
            }else{
                var formObj = $("#second_section");
                var formData = new FormData(formObj[0]);
                var formURL="<?php echo base_url('admin/student/updateCollege'); ?>";
                $.ajax({
                    url: formURL,
                    type: "POST",
                    data:  formData,
                    async: true,
                    datatype : false,
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data, textStatus, jqXHR)
                    {
                        console.log(data);
                        str="Information Stored successfully";
                        toastr.options = {
                          "closeButton": true,
                          timeOut: 5000
                        }
                        toastr["success"](str);
                    }         
                });
            }
        });

        $(document).on('click', '.BtnSaveFollowup', function(event) {
            event.preventDefault();
            var section3err=0;
            var find_array=["enquiery_date_nfup","agent_id","followup_comment"];
            var error_array=["Please select Followup data","Please Select Agent","Please add Follow-up comment's"];
            if(!parseInt($("#agent_id").val()))
            {
                $("#agent_id").parent().find('span.error').html("Please Select Agent");
                section3err=1;
            }else{
                $("#agent_id").parent().find('span.error').empty();
            }

            if(!$("#followup_comment").val().length)
            {
                $("#followup_comment").parent().find('span.error').html("Please add Follow-up comment's");
                section3err=1;
            }else{
                $("#followup_comment").parent().find('span.error').empty();
            }  

            if(section3err){
                str="Please check the errors in Follow Up section";
                toastr.options = {
                  "closeButton": true,
                  timeOut: 10000
                }
                toastr["error"](str);
            }else{
                var student_id= $("input[name='student_id']").val();
                var formObj = $("#followUpForm");
                var formData = new FormData(formObj[0]);
                var formURL="<?php echo base_url('admin/add_follow_up'); ?>";
                $.ajax({
                    url: formURL,
                    type: "POST",
                    data:  formData,
                    async: true,
                    datatype : false,
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(data, textStatus, jqXHR)
                    {
                        $("#myModal").modal("hide");
                        str="Follow up updated successfully";
                        toastr.options = {
                          "closeButton": true,
                          timeOut: 5000
                        }
                        toastr["success"](str);
                        var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
                        csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
                        data={[csrfName]:csrfHash,student_id:student_id};
                        $.post("<?php echo base_url('admin/request_conversation_table_update') ?>", data, 
                            function(data, textStatus, xhr) {
                                $("#conversation_tbody").html(data);
                        });
                    }         
                });
            }   
        });

        $(document).on('click', '.requestFollowUp', function(event) {
            event.preventDefault();
            var action=$(this).data('action');
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var row = table.row($(this).parents('tr'));
            data={[csrfName]:csrfHash,action:action,followupid:$(this).data('id')};

            if(action=="edit"|| action=="add_new")
            {
                $.post("<?php echo base_url('admin/request_follow_up') ?>", data, 
                    function(data, textStatus, xhr) {
                        $("#targetBody").html(data);
                        var agent=$('#agent_id').select2();
                        $("#enquiery_date_nfup").daterangepicker({
                            singleDatePicker: true,
                            showDropdowns: true,
                            minDate: moment(),
                            locale: {
                                format: 'YYYY-MM-DD'
                            }
                        });
                });
            }
            if(action=="delete"){
                bootbox.confirm({
                message: "Are you Sure, You want to delete this Follow-up?",
                callback: function (result) {
                    if(result==true)
                    {
                    $.post("<?php echo base_url('admin/request_follow_up') ?>", data, 
                        function(data, textStatus, xhr) {
                            console.log(data)
                            if(textStatus=="success")
                            {
                                row.remove().draw();
                                toastr.success("Record delete successfully");
                            }else{
                                toastr.warning("There was problem deleting the record");
                            }
                        });
                    }
                }
            });
            }

        });
    });
</script>
