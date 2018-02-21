<style type="text/css">
    .btnadd{
        margin-left: 28px;
    }
    .btnright{
        margin-right: 28px;
    }
    .select2{
        width: auto !important;
    }
    .no-padding{
        padding-right: 0px !important;
        padding-left: 0px !important;
    }
    label{
        font-weight: 500;
    }
    .error{
        color: red;
        font-weight: 600;
    }
    .submitProfile{
        display: none;
    }
</style>
<script type="text/javascript" src="<?php echo base_url('assets/js/cvalidation.js'); ?>"></script>
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Add student details</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/student/summary'); ?>">Student List</a></li>
            <li class="breadcrumb-item active">Profile Summary</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="panel">
            <?php if($this->session->flashdata('error')) { ?>
                <?php echo $this->session->flashdata('error'); ?>
            <?php } ?>
            <?php if($this->session->flashdata('success')) { ?>
                <p class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></p>
            <?php } ?>
            <div class="panel-body container-fluid">
                <?php $arr=array('class'=>"form-horizontal");
                            echo form_open('admin/student/create',$arr); ?>
                    <div class="row row-lg">
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4">
                            <label for="agent_id" class="form-control-label pl-0">Select enquiry agent</label>
                            <select id="agent_id" class="form-control" name="agent_id">
                                <option hidden>Select Agent</option>
                                <?php foreach ($agent_list as $key => $value) { ?>
                                <option value="<?php echo $value->user_id; ?>"><?php echo $value->user_name; ?></option>
                                <?php } ?>
                            </select>
                            <span class="error"></span>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4">
                            <label for="enq_date" class="form-control-label pl-0">Select enquiry date</label>
                            <div class="input-group">
                                <input type="text" id="enq_date" name="enq_date" class="form-control" placeholder="Select Enquiry Date">
                                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                            </div>
                            <span class="error"></span>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4">
                            <label for="source_id" class="form-control-label pl-0">Select Source</label>
                            <select id="source_id" class="form-control" name="source_id">
                                <option hidden>Select Source</option>
                                <?php foreach ($source_list as $key => $value) { ?>
                                <option value="<?php echo $value->source_id; ?>"><?php echo $value->source_name; ?></option>
                                <?php } ?>
                            </select>
                            <span class="error"></span>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 mt-20">
                            <label for="lead_type_id" class="form-control-label pl-0">Type of lead</label>
                            <select id="lead_type_id" class="form-control" name="lead_type_id">
                                <option hidden>Select Lead Types</option>
                                <?php foreach ($lead_types as $key => $value) { ?>
                                <option value="<?php echo $value->lead_type_id; ?>"><?php echo $value->lead_type; ?></option>
                                <?php } ?>
                            </select>
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="row row-lg mt-50">
                        <div class="col-sm-12 col-md-12 mt-20">
                            <h3 class="example-title ">Personal Details</h3>
                            <div class="form-group row">
                                <label for="fname" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">First name</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                    <input type="text" id="fname" placeholder="Enter student first name" name="first_name" class="form-control ">
                                    <span class="error"></span>
                                </div>
                                <label for="lname" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Last name</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                    <input type="text" id="lname" placeholder="Enter student last name" name="last_name" class="form-control ">
                                    <span class="error"></span>
                                </div>
                            </div>

                            <div class="form-group row mt-20">
                                <label for="email_id" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Email Id</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                    <input type="email" placeholder="Enter Email Id of student" id="email_id" name="email_id" class="form-control ">
                                    <span class="error"></span>
                                </div>
                                <label for="phonenumber"  class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Phone number</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                    <input type="number" onkeypress="return isNumber(event)"  placeholder="Enter Phone Number of student" id="phonenumber" min="0" minlength="10" name="phonenumber" class="form-control ">
                                    <span class="error"></span>
                                </div>
                            </div>

                            <div class="form-group row mt-20 ">
                                <label for="resideing_state" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Residing State</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5" id="select_state">
                                    <select id="resideing_state" class="form-control" name="resident_state_id">
                                        <option hidden=""></option>
                                        <?php foreach ($state_list as $state) { ?>
                                            <option value="<?php echo $state->state_id;  ?>"><?php echo $state->state_name;  ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="error"></span>
                                </div>
                                <label for="resident_city" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2"  style="text-align: left;">Residing City</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5" id="select_city">
                                    <select id="resident_city" name="resident_city_id" class="form-control ">
                                        <option hidden="">Select City</option>
                                    </select>
                                    <span class="error"></span>
                                </div>

                            </div>

                            <h3 class="example-title mt-50">Professional Details</h3>
                            <div class="form-group row">
                                <label for="intro" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Intro</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                    <input type="text" class="form-control" id="intro" name="intro">
                                    <span class="error"></span>
                                </div>
                                <label for="total_experience" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Total Experience</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                    <select id="total_experience" name="total_experience" class="form-control ">
                                        <option hidden=""></option>
                                        <?php for ($i=0; $i < 31 ; $i++) {  ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="error"></span>
                                </div>
                            </div>

                            <div class="form-group row mt-20">
                                <label for="ugrad_degree" class="form-control-label col-sm-2 col-xl-1" style="text-align: left;">Undergraduate degree</label>
                                <div class="col-md-10 col-lg-10 col-sm-10  col-xl-11">
                                    <select id="ugrad_degree" name="" class="form-control" style="width: 44%">
                                        <option hidden></option>
                                        <?php foreach ($ug_degree_list as $key => $value) { ?>
                                        <option value="<?php echo $value->degree_id; ?>"><?php echo $value->degree_name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="error"></span>
                                </div>
                            </div>

                            <div class="form-group row mt-20">
                                <label for="intrested_program" class="form-control-label col-sm-2 col-xl-1" style="text-align: left;">Interested Program</label>
                                <div class="col-md-10 col-lg-10 col-sm-10  col-xl-11">
                                    <select id="intrested_program" name="interested_program_id" class="form-control" style="width: 44%">
                                        <option hidden></option>
                                        <?php foreach ($program_list as $key => $value) { ?>
                                        <option value="<?php echo $value->program_id; ?>"><?php echo $value->program_name; ?></option>
                                        <?php } ?>
                                    </select>
                                    <span class="error"></span>
                                </div>
                            </div>

                            <div class="form-group row mt-50" id="exam-section">
                                <label for="gmat_select" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2 "  style="text-align: left;">GMAT taken?</label>
                                <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                    <select id="gmat_select" class="form-control trigger" name="gmat" data-target="gmat_tar">
                                        <option hidden="">Yes/No</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                    <span class="error"></span>
                                </div>

                                <label for="gmat_score" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Score(%)</label>
                                <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                    <input type="number" onkeypress="return isNumber(event)" disabled="" id="gmat_score" maxlength="2" step="1" max="800" min="1" name="gmat_score" placeholder="if (yes)" class="form-control gmat_tar numbercheck">
                                    <span class="error"></span>
                                </div>

                                <label for="gmat_tenative_date" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Tenative date</label>
                                <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                    <div class="input-group">
                                        <input type="text" disabled="" id="gmat_tenative_date" name="gmat_tentative_date" class="form-control gmat_tar1" placeholder="Select Tenative Date">
                                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <span class="error"></span>
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
                                    <span class="error"></span>
                                </div>

                                <label for="gre_score" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Score(%)</label>
                                <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                    <input type="number" disabled="" id="gre_score" maxlength="2" step="1" max="340" onkeypress="return isNumber(event)" min="1" name="gre_score" id="gre_score" placeholder="if (yes)" class="form-control gre_tar numbercheck">
                                    <span class="error"></span>
                                </div>

                                <label for="gre_tenative_date" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Tenative date</label>
                                <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                    <div class="input-group">
                                        <input type="text" id="gre_tenative_date" name="gre_tentative_date" class="form-control gre_tar1" disabled="" placeholder="Select Tenative Date">
                                        <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                    </div>
                                    <span class="error"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-lg mt-50">
                        <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-12">
                            <h3 class="example-title ">Conversation Summary</h3>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-4 col-xl-2 col-6">
                            <div class="form-group">
                                <label for="followup_date" class="form-control-label">Followup Date</label>
                                    <input type="text" id="followup_date" placeholder="Enter student first name" name="followup_date" class="form-control ">
                                    <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-3 col-xl-2 col-6">
                            <div class="form-group">
                                <label for="agent_name" class="form-control-label">Agent name</label>
                                <input type="text" readonly="" id="agent_name" placeholder="Enter student last name" name="agent_name" value="<?php echo $agent_name->first_name.' '.$agent_name->last_name; ?>" class="form-control ">
                                <span class="error"></span>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-sm-5 col-xl-8 col-12">
                            <div class="form-group">
                                <label for="comment" class="form-control-label">Followup comment</label>
                                <textarea id="comment" required name="followup_comment" placeholder="Enter the conversation here" class="form-control "></textarea>
                                <span class="error"></span>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6  col-xl-6 col-6">
                            <button type="button" class="btn btn-success float-right addProfile">Save</button>
                            <input type="submit" class="hidden submitProfile" name="">
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-6  col-xl-6 col-6">
                            <button type="button" class="btn btn-danger float-left">Cancel</button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
<!-- End Page -->
<script type="text/javascript" src="<?php echo base_url('assets/js/add_student.js'); ?>"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {  

        $(document).on('click', '.addProfile', function(event) {
            $row=$(this);
            event.preventDefault();
            var section2err=0;
            /* Act on the event */
            var find_array=["agent_id","source_id","lead_type_id","resideing_state","resident_city", "total_experience","ugrad_degree","intrested_program"];
            var error_array=["Please Select Agent","Please Select Lead Type","Please Select Lead Type","Please Select the state","Please select the city","Please select the Total Experience.","Please select the Undergraduate Degree","Please select Interested Program"];

            find_array.forEach(function(element,index1) {
                if(!parseInt($('#'+element).val()))
                {
                    $('#'+element).parent().find('span.error').html(error_array[index1]);
                    section2err=1;
                }else{
                    $('#'+element).parent().find('span.error').empty();
                }
            });

            var single_array=["enq_date","fname","lname","email_id","phonenumber","intro","comment"];
            var single_error=["Please add Enquiry Date","Plase add First Name","Please add Last Name","Please Enter the valid email address","Please add valid phone number","Please add Intro","Please add follow up comment"];
            single_array.forEach(function(element,index1) {
                if(!parseInt($('#'+element).val().trim().length))
                {
                    $('#'+element).parent().find('span.error').html(single_error[index1]);
                    section2err=1;
                }else{
                    $('#'+element).parent().find('span.error').empty();
                }
            });

            //phonenumber validation -begin
            if (validatePhone('phonenumber')) {
                $(this).next('span.error').empty();
            }
            else {
                $(this).next('span.error').html('Invalid');
                section2err=1;
            }
            //phonenumber validation -end

            //email validation -begin
            if(!IsEmail($('#email_id').val())) {
                $(this).next('span.error').html("Please Enter the valid email address");
                section2err=1;
            }else{
                $(this).next('span.error').empty();
            }
            //email validation -end
            var gmat_select=$("#gmat_select").val();
            var gre_select=$("#gre_select").val();

            if(gmat_select==1)
            {
                var gmat_score=$("#gmat_score").val();
                if(!gmat_score.trim().length)
                {
                    $("#gmat_score").parent().find('span.error').html("Please enter GMAT score");
                    section2err=1;
                }else{
                    $("#gmat_score").parent().find('span.error').empty();
                }
            }

            if(gre_select==1)
            {
                var gre_score=$("#gre_score").val();
                if(!gre_score.trim().length)
                {
                    $("#gre_score").parent().find('span.error').html("Please enter GRE score");
                    section2err=1;
                }else{
                    $("#gre_score").parent().find('span.error').empty();
                }
            }
            

            if(section2err==1)
            {
                str="Please check the errors";
                toastr.options = {
                  "closeButton": true,
                  timeOut: 10000
                }
                toastr["error"](str);
            }else{
                $row.removeClass('addProfile');
                $row.attr('type', 'submit');
                $row.trigger('click');
            }
        });

    });


</script>
