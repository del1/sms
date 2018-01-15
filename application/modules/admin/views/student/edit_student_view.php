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
                <div id="integration-list" class="mt-50">
                    <ul>
                        <form class="form-horizontal" id="fist_section">
                            <li>
                                <a class="expand">
                                    <div class="right-arrow">+</div>
                                    <div>
                                        <h2 class="m-tb-0">Personal Details</h2>
                                    </div>
                                </a>
                                <div class="detail row row-lg">
                                    <div class="col-sm-12 col-md-12 mt-20">
                                        <div class="form-group row ">
                                            <label for="first_name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">First name</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <input id="first_name" readonly="" type="text" value="<?php if(isset($personal_details->first_name)) { echo $personal_details->first_name; } ?>" name="first_name" class="form-control ">


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
                                                    <option hidden="">Select Gender</option>
                                                     <?php foreach ($gender_list as $key => $value) { ?>
                                                        <option <?php if(isset($personal_details->gender_id) && strlen(trim($personal_details->gender_id)) && $personal_details->gender_id==$value->gender_id) { echo "selected"; } ?> value="<?php echo $value->gender_id ?>"><?php echo $value->gender ?></option>
                                                    <?php } ?>
                                                </select>
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
                            </li>
                            <li>
                                <a class="expand">
                                    <div class="right-arrow">+</div>
                                    <h2 class="m-tb-0">Professional Details</h2>
                                </a>

                                <div class="detail row row-lg">
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
                                                        <option value="<?php echo $value->degree_id;?>"><?php echo $value->degree_name ;?></option>
                                                    <?php } } ?>
                                                </select>
                                            </div>
                                            <label for="UG_college_id" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Undergraduate college</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <select data-plugin="select2" id="UG_college_id" name="UG_college_id" class="form-control ">
                                                    <option  hidden="">Select UG college</option>
                                                    <?php if(!empty($UG_colleges_list)) { foreach ($UG_colleges_list as $key => $value) { ?>
                                                        <option value="<?php echo $value->college_id;?>"><?php echo $value->college_name ;?></option>
                                                    <?php } } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="UG_passing_year" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Passing Year</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <select data-plugin="select2" id="UG_passing_year" name="UG_passing_year" class="form-control ">
                                                    <option  hidden="">Select Passing Year</option>
                                                    <?php for ($i=date("Y"); $i > date("Y")-25 ; $i--) {  ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <label for="UG_gpa_marks" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Undergraduate marks(GPA)</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <input id="UG_gpa_marks" type="number" max="10" min="0" step="0.01" name="UG_gpa_marks" class="form-control ">
                                            </div>
                                        </div><hr>
                                        <div class="form-group row">
                                            <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Postgraduate degree</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <select data-plugin="select2" id="PG_degree" name="PG_degree_name" class="form-control ">
                                                    <option  hidden="">Select PG college</option>
                                                    <?php if(!empty($PG_degree_list)) { foreach ($PG_degree_list as $key => $value) { ?>
                                                        <option value="<?php echo $value->degree_id;?>"><?php echo $value->degree_name ;?></option>
                                                    <?php } } ?>
                                                </select>
                                            </div>
                                           
                                            <label for="PG_college" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2 " style="text-align: left;">Postgraduate college</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <select id="PG_college" data-plugin="select2" class="form-control" name="PG_college">
                                                    <option  hidden="">Select PG college</option>
                                                    <?php if(!empty($PG_colleges_list)) { foreach ($PG_colleges_list as $key => $value) { ?>
                                                        <option value="<?php echo $value->college_id;?>"><?php echo $value->college_name ;?></option>
                                                    <?php } } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="PG_passing_year" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Passing Year</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <select data-plugin="select2" id="PG_passing_year" name="PG_passing_year" class="form-control ">
                                                    <option  hidden="">Select Passing Year</option>
                                                    <?php for ($i=date("Y"); $i > date("Y")-25 ; $i--) {  ?>
                                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <label for="PG_gpa_marks" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Postgraduate marks(GPA)</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <input id="PG_gpa_marks" type="number" max="10" min="0" step="0.01" name="PG_gpa_marks" class="form-control ">
                                            </div>
                                        </div><hr>
                                        <div class="form-group row">
                                            <label for="professional_qualification" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Professional Qualification</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <input id="professional_qualification" type="text"  value="<?php if(isset($professional_details->phonenumber)) { echo $professional_details->phonenumber; } ?>" name="professional_qualification" class="form-control ">
                                            </div>
                                            <label for="total_experience" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Work experience</label>
                                            <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                                <input id="total_experience" type="number" min="0" step="1" name="total_experience" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="c_employer_id" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Current Employer</label>
                                            <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                                <input id="c_employer_id" type="text" name="c_employer_id" placeholder="Current Employer" class="form-control ">
                                            </div>

                                            <label for="p1_employer_id" class="form-control-label col-md-2 col-sm-2 col-xl-2 col-lg-1" >Previous Employer 1</label>
                                            <div class="col-md-2 col-lg-2 col-sm-4  col-xl-2">
                                                <input id="p1_employer_id" type="text" name="p1_employer_id" placeholder="Previous Employer 1" class="form-control ">
                                            </div>

                                            <label for="Degree Name" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Previous Employer 2</label>
                                            <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                                <input id="p2_employer_id" type="text" name="p2_employer_id" placeholder="Previous Employer 2" class="form-control ">
                                            </div>
                                        </div><!-- <hr>
                                        <div class="form-group row">
                                            <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-12">
                                                <h6>Remarks if any</h6>
                                                <textarea class="form-control" required style="resize: none;"><?php if(isset($professional_details->remarks)) { echo $professional_details->remarks; } ?></textarea>
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
                            </li>
                            <li>
                                <a class="expand">
                                    <div class="right-arrow">+</div>
                                    <h2 class="m-tb-0">Application Details</h2>
                                </a>
                                <div class="detail row row-lg">
                                    <div class="col-sm-12 col-md-12 mt-20">

                                        <div class="form-group row mt-50" id="exam-section">
                                            <label for="gmat_select" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2 "  style="text-align: left;">GMAT taken?</label>
                                            <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                                <select id="gmat_select" class="form-control trigger" name="gmat" data-target="gmat_tar">
                                                    <option hidden="">Yes/No</option>
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                </select>
                                            </div>

                                            <label for="gmat_score" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Score(%)</label>
                                            <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                                <input type="number" disabled="" id="gmat_score" maxlength="2" step="0.01" max="99.99" min="1" name="gmat_score" placeholder="if (yes)" class="form-control gmat_tar">
                                            </div>

                                            <label for="gmat_tenative_date" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Tenative date</label>
                                            <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                                <div class="input-group">
                                                    <input type="text" disabled="" id="gmat_tenative_date" name="gmat_tentative_date" class="form-control gmat_tar" placeholder="Select Tenative Date">
                                                    <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-50" id="exam-section">
                                            <label for="gre_select" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2"  style="text-align: left;">GRE taken?</label>
                                            <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                                <select id="gre_select" name="gre" class="form-control trigger" data-target="gre_tar">
                                                    <option hidden="">Yes/No</option>
                                                    <option value="1">Yes</option>
                                                    <option value="2">No</option>
                                                </select>
                                            </div>

                                            <label for="gre_score" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Score(%)</label>
                                            <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                                <input type="number" disabled="" id="gre_score" maxlength="2" step="0.01" max="99.99" min="1" name="gre_score" id="gre_score" placeholder="if (yes)" class="form-control gre_tar">
                                            </div>

                                            <label for="gre_tenative_date" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Tenative date</label>
                                            <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                                <div class="input-group">
                                                    <input type="text" id="gre_tenative_date" name="gre_tentative_date" class="form-control gre_tar" disabled="" placeholder="Select Tenative Date">
                                                    <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                                </div>
                                            </div>
                                        </div>


                                        <hr>
                                        
                                        <div class="form-group row">
                                            <div class="col-md-6 col-lg-6 col-sm-6  col-xl-6">
                                                <h5 class="float-left">Packages</h5>
                                            </div>
                                            <div class="col-md-6 col-lg-6 col-sm-6  col-xl-6">
                                                <button type="button" class="btn btn-success float-right mr-30" id="btn_add_package">Add more packages</button>
                                            </div>
                                        </div>
                                        <div class="form-group row last_package1"> 
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
                                                    <option hidden="">Select Package</option>
                                                    <?php foreach ($package_list as $key => $value) { ?>
                                                        <option value="<?php echo $value->package_id; ?>"><?php echo $value->package_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>

                                            <label for="consultant_id" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Consultant Assigned</label>
                                            <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                                <select name="consultant_id[]" class="form-control">
                                                    <option hidden="">Select Consultant</option>
                                                    <?php foreach ($consultant_list as $key => $value) { ?>
                                                        <option value="<?php echo $value->user_id; ?>"><?php echo $value->user_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row mt-20" style="text-align: right">
                                            <div class="col-md-12 col-lg-12 col-sm-12  col-xl-12 col-12">
                                                <button type="button" class="btn btn-success btnSubmit">Submit</button>
                                                <button type="button" class="btn btn-warning btnCancel">Cancel</button>
                                                <button type="button" class="btn btn-danger btnDelete">Delete</button>
                                            </div>
                                        </div><hr>
                                         
                                    </div><!-- end of col-12 -->
                                </div><!-- end of details -->
                                <!-- end of form -->
                            </li>
                        </form>
                    </ul>
                    <form class="form-horizontal" id="second_section">
                        <div class="form-group row mt-50" >
                            <div class="col-md-6 col-lg-6 col-sm-6  col-xl-6">
                                <h5 class="title">College Applications</h5>
                            </div>
                            <div class="col-md-6 col-lg-6 col-sm-6  col-xl-6">
                                <button type="button" class="btn btn-success float-right mr-30" id="btn_add_college">Add more college</button>
                            </div>
                        </div>
                        <section id="basic_college_application1">
                            <div class="form-group row" >
                                <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Applied college</label>
                                <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                    <select data-plugin="select2" id="college_id" name="college_id[]" class="form-control ">
                                        <option  hidden="">Select Applied college</option>
                                        <?php if(!empty($apply_college_list)) { foreach ($apply_college_list as $key => $value) { ?>
                                            <option value="<?php echo $value->college_id;?>"><?php echo $value->college_name ;?></option>
                                        <?php } } ?>
                                    </select>
                                </div>

                                <label for="Degree Name" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Intake year</label>
                                <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                    <select data-plugin="select2" name="intake_year[]" class="form-control ">
                                        <option  hidden="">Select Intake year</option>
                                        <?php for ($i=date("Y"); $i <= date("Y")+5 ; $i++) {  ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <label class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Application round</label>
                                <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                    <select data-plugin="select2" id="college_id" name="round_id[]" class="form-control ">
                                        <option  hidden="">Select Application round</option>
                                        <?php if(!empty($appround_list)) { foreach ($appround_list as $key => $value) { ?>
                                            <option value="<?php echo $value->round_id;?>"><?php echo $value->round_name ;?></option>
                                        <?php } } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" >
                                <label class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Application status</label>
                                <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                    <select data-plugin="select2" name="app_status_id[]" class="form-control ">
                                        <option  hidden="">Select Application Status</option>
                                        <?php if(!empty($app_status_list)) { foreach ($app_status_list as $key => $value) { ?>
                                            <option value="<?php echo $value->app_status_id;?>"><?php echo $value->app_status;?></option>
                                        <?php } } ?>
                                    </select>
                                </div>

                                <label class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Interview status</label>
                                <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                    <select data-plugin="select2" name="intv_status_id[]" class="form-control ">
                                        <option  hidden="">Select Interview Status</option>
                                        <?php if(!empty($interview_status_list)) { foreach ($interview_status_list as $key => $value) { ?>
                                            <option value="<?php echo $value->intv_status_id;?>"><?php echo $value->intv_status;?></option>
                                        <?php } } ?>
                                    </select>
                                </div>

                                <label class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Applied program</label>
                                <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                    <select data-plugin="select2" name="applied_program_id[]" class="form-control ">
                                        <option  hidden="">Select Applied program</option>
                                        <?php if(!empty($program_list)) { foreach ($program_list as $key => $value) { ?>
                                            <option value="<?php echo $value->program_id;?>"><?php echo $value->program_name;?></option>
                                        <?php } } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row" >
                                <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Admit status</label>
                                <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                    <select name="admit_status_id[]" class="form-control admit_status_id">
                                        <option  hidden="">Select Applied program</option>
                                        <?php if(!empty($admit_status_list)) { foreach ($admit_status_list as $key => $value) { ?>
                                            <option value="<?php echo $value->admit_status_id;?>"><?php echo $value->admit_status;?></option>
                                        <?php } } ?>
                                    </select>
                                </div>


                                <label for="Degree Name" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Scholarship awarded</label>
                                <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                    <select name="is_scholarship_awarded[]" disabled="" class="form-control is_scholarship_awarded">
                                        <option hidden="" value="0">Yes/No</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>

                                <label for="Degree Name" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Scholarship amount</label>
                                <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                    <input type="number" disabled="" required="" min="0" step="0.1" name="scholarship_amount[]" class="form-control scholarship_amount">
                                </div>
                            </div>
                        </section>
                        <div class="form-group row mt-20" style="text-align: right">
                            <div class="col-md-12 col-lg-12 col-sm-12  col-xl-12 col-12">
                                <button type="button" class="btn btn-success">Submit</button>
                                <button type="button" class="btn btn-warning ">Cancel</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </div>
                        </div><hr>
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
                                    <option  hidden="">Select Passing Year</option>
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
                    </form>
                        <!-- <li>
                            <a class="expand">
                                <div class="right-arrow">+</div>
                                <h2>Line Hardware</h2>
                                <span>Pole, cable, pipe, coil pipe, flatbed, low-boy and equipment trailers.</span>
                            </a>

                            <div class="detail">
                                <div id="left" style="width:15%;float:left;height:100%;">
                                    <div id="sup">
                                        <img src="http://www.linehardware.com/graphics/logo2.gif" width="100%" />
                                    </div>
                                </div>
                                <div id="right" style="width:85%;float:right;height:100%;padding-left:20px;">
                                    <div id="sup">
                                        <div><span>Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</span>
                                            <br />
                                            <br /><a href="#">Visit Website</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>-->
                    
                </div>
                <div class="row row-lg mt-50">
                    <div class="col-sm-12 col-md-12 mt-20">
                        <h3 class="example-title ">Conversation Summary</h3>
                        <table id="store_list_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive " ><!-- data-plugin="dataTable" -->
                            <thead>
                                <tr>
                                    <th>Followup Date</th>
                                    <th>Agent name</th>
                                    <th>Followup comment</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2</td>
                                    <td>3</td>
                                    <td>
                                        <button type="button" class="btn btn-outline btn-icon btn-warning btn-outline"><i class="icon wb-pencil" aria-hidden="true"></i></button>
                                        <button type="button" class="btn  btn-outline btn-danger btn-sm"><i class="icon wb-trash" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn  btn-outline btn-success btn-sm"><i class="icon wb-plus" aria-hidden="true"></i></button>
                                    </td>
                                </tr>
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
            <option  hidden="">Select Package</option>
            <?php foreach ($package_list as $key => $value) { ?>
                <option value="<?php echo $value->package_id; ?>"><?php echo $value->package_name; ?></option>
            <?php } ?>
        </select>
    </div>

    <label for="consultant_id" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Consultant Assigned</label>
    <div class="col-md-2 col-lg-2 col-sm-5  col-xl-2">
        <select name="consultant_id[]" class="form-control">
            <option hidden="">Select Consultant</option>
            <?php foreach ($consultant_list as $key => $value) { ?>
                <option value="<?php echo $value->user_id; ?>"><?php echo $value->user_name; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="col-sm-4 col-12 col-md-1 col-lg-1 col-xl-2 icondemo iconWrap" >
        <a class="btn btn-danger btn-icon del" title="Click to Delete the Phonenumber"><span data-image="" data-product="" class="icon wb-close-mini remove_image"></span></a>
    </div>
</div>
<section style="display: none;" class="removeCollegeParent"  id="basic_college_application">
    <div class="form-group row" >
        <div class="col-sm-12 col-12 col-md-12 col-lg-12 col-xl-12 icondemo iconWrap" >
            <a class="btn btn-danger btn-icon delCollege float-right"><span data-image="" data-product="" class="icon wb-close-mini remove_image"></span></a>
        </div>
    </div>
    <div class="form-group row" >
        <label class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Applied college</label>
        <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
            <select name="college_id[]" class="form-control college_id">
                <option  hidden="">Select Applied college</option>
                <?php if(!empty($apply_college_list)) { foreach ($apply_college_list as $key => $value) { ?>
                    <option value="<?php echo $value->college_id;?>"><?php echo $value->college_name ;?></option>
                <?php } } ?>
            </select>
        </div>

        <label class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Intake year</label>
        <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
            <select name="intake_year[]" class="form-control intake_year">
                <option  hidden="">Select Intake year</option>
                <?php for ($i=date("Y"); $i <= date("Y")+5 ; $i++) {  ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
            </select>
        </div>

        <label class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Application round</label>
        <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
            <select name="round_id[]" class="form-control round_id">
                <option  hidden="">Select Application round</option>
                <?php if(!empty($appround_list)) { foreach ($appround_list as $key => $value) { ?>
                    <option value="<?php echo $value->round_id;?>"><?php echo $value->round_name ;?></option>
                <?php } } ?>
            </select>
        </div>
    </div>
    <div class="form-group row" >
        <label class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Application status</label>
        <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
            <select name="app_status_id[]" class="form-control app_status_id">
                <option  hidden="">Select Application Status</option>
                <?php if(!empty($app_status_list)) { foreach ($app_status_list as $key => $value) { ?>
                    <option value="<?php echo $value->app_status_id;?>"><?php echo $value->app_status;?></option>
                <?php } } ?>
            </select>
        </div>

        <label class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Interview status</label>
        <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
            <select name="intv_status_id[]" class="form-control intv_status_id">
                <option  hidden="">Select Interview Status</option>
                <?php if(!empty($interview_status_list)) { foreach ($interview_status_list as $key => $value) { ?>
                    <option value="<?php echo $value->intv_status_id;?>"><?php echo $value->intv_status;?></option>
                <?php } } ?>
            </select>
        </div>

        <label class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Applied program</label>
        <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
            <select name="applied_program_id[]" class="form-control applied_program_id">
                <option  hidden="">Select Applied program</option>
                <?php if(!empty($program_list)) { foreach ($program_list as $key => $value) { ?>
                    <option value="<?php echo $value->program_id;?>"><?php echo $value->program_name;?></option>
                <?php } } ?>
            </select>
        </div>
    </div>
    <div class="form-group row" >
        <label class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Admit status</label>
        <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
            <select name="admit_status_id[]" class="form-control admit_status_id">
                <option  hidden="">Select Applied program</option>
                <?php if(!empty($admit_status_list)) { foreach ($admit_status_list as $key => $value) { ?>
                    <option value="<?php echo $value->admit_status_id;?>"><?php echo $value->admit_status;?></option>
                <?php } } ?>
            </select>
        </div>


        <label class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Scholarship awarded</label>
        <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
            <select name="is_scholarship_awarded[]" disabled="" class="form-control is_scholarship_awarded">
                <option hidden="" value="0">Yes/No</option>
                <option value="1">Yes</option>
                <option value="2">No</option>
            </select>
        </div>

        <label for="Degree Name" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Scholarship amount</label>
        <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
            <input type="number" disabled="" required="" min="0" step="0.1" name="scholarship_amount[]" class="form-control scholarship_amount">
        </div>
    </div>
</section>
<!-- End Page -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
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
        $("#store_list_table_length").append($("#manage_product"));
        $("#store_list_table_filter").prepend($("#stylelist"));
        
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
    });
    $(function() {
  $(".expand").on( "click", function() {
    $(this).next().slideToggle(200);
    $expand = $(this).find(">:first-child");
    
    if($expand.text() == "+") {
      $expand.text("-");
    } else {
      $expand.text("+");
    }
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



});
</script>
