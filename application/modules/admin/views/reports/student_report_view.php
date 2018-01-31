<style type="text/css">
label{
    font-weight: 500;
}
</style>
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Student Report</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item active">Student Report</li>
        </ol>
    </div>
    <?php 
    if(!empty($degree_list))
    {
       foreach ($degree_list as $degree) {
            if($degree->degree_type_id==1)
            {
                $UG_degree_list[]=$degree;
            }
            if($degree->degree_type_id==2)
            {
                $PG_degree_list[]=$degree;
            }
        }
    }

    if(!empty($colleges_list)){
    foreach ($colleges_list as $key => $value) {
            if($value->college_type_id==1)
            {
                $UG_colleges_list[]=$value;
            }elseif($value->college_type_id==2)
            {
                $PG_colleges_list[]=$value;
            }   
        }
    }

    ?>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <?php $arr=array('class'=>"form-horizontal","id"=>"form_lead_report");
                            echo form_open('admin/reports/genrate_student_report',$arr); ?>
                <div class="row row-lg">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 float-right">
                        <a href="javascript:void(0)" class="btn btn-success float-right " >Export Excel</a>
                    </div>
                </div>
                <div class="row row-lg mt-20">
                    <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-6">
                        <label for="from_enquiry_date" class="form-control-label" style="padding: .429rem 0;">Select signup date range</label>
                        <div class="form-group row">
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xl-5 col-5 ">
                                <div class="input-group">
                                    <input type="text" id="from_enquiry_date" name="from_enquiry_date" class="form-control" placeholder="From Date">
                                    <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                    <span id="from_enquiry_date_error" class="error"></span>
                                </div>
                            </div>
                            <label for="to_enquiry_date" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" style="text-align: right;">to</label>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-6">
                                <div class="input-group">
                                    <input type="text" readonly id="to_enquiry_date" name="to_enquiry_date" class="form-control" placeholder="To Date">
                                    <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                    <span id="to_enquiry_date_error" class="error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 col-4">
                        <div class="form-group">
                            <label for="packages" class="form-control-label">Select Package</label>
                            <select class="form-control" name="packages[]" id="packages" multiple="">
                                <?php if(!empty($packages_list)) { foreach ($packages_list as $package) { ?>
                                    <option value="<?php echo $package->package_id;?>"><?php echo $package->package_name ;?></option>
                                <?php } } ?>
                            </select>
                            <span id="packages_error"></span>
                        </div>
                    </div>
                </div>
                <div class="row row-lg">
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 col-4">
                        <div class="form-group">
                            <label for="ug_degree" class="form-control-label">UnderGraduate degree</label>
                            <select class="form-control" id="ug_degree" name="ug_degree">
                                <option></option>
                                <?php if(!empty($UG_degree_list)) { foreach ($UG_degree_list as $degree) { ?>
                                    <option value="<?php echo $degree->degree_id;?>"><?php echo $degree->degree_name ;?></option>
                                <?php } } ?>
                            </select>
                            <span id="ug_degree_error" class="error"></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 col-4">
                        <div class="form-group">
                            <label for="ug_college" class="form-control-label">UnderGraduate College</label>
                            <select class="form-control" id="ug_college" name="ug_college[]" multiple="">
                                <?php if(!empty($UG_colleges_list)) { foreach ($UG_colleges_list as $college) { ?>
                                    <option value="<?php echo $college->college_id;?>"><?php echo $college->college_name ;?></option>
                                <?php } } ?>
                            </select>
                            <span id="ug_college_error" class="error"></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 col-4">
                        <label for="from_exp_range_date" class="form-control-label" style="padding: .429rem 0;">Work Experience Range (in years)</label>
                        <div class="form-group row">
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xl-5 col-5 ">
                                <select class="form-control" name="from_exp_range_date" id="from_exp_range_date">
                                    <option></option>
                                <?php for ($i=0; $i <= 5 ; $i++) {  ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                                </select>
                                <span id="from_exp_range_date_error" class="error"></span>
                            </div>
                            <label for="to_exp_range_date" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" style="text-align: right;">to</label>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-6">
                                <select class="form-control" name="to_exp_range_date" id="to_exp_range_date">
                                    <option></option>
                                <?php for ($i=1; $i <= 6 ; $i++) {  ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                                </select>
                                <span id="to_exp_range_date_error" class="error"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-lg">
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 col-4">
                        <div class="form-group">
                            <label for="employer" class="form-control-label">Select Employer</label>
                            <select class="form-control" name="employer[]" id="employer" multiple="">
                                <?php if(!empty($employer_list)) { foreach ($employer_list as $employer) { ?>
                                    <option value="<?php echo $employer->employer_id;?>"><?php echo $employer->employer_name ;?></option>
                                <?php } } ?>
                            </select>
                            <span id="employer_error"></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 col-4">
                        <div class="form-group">
                            <label for="pg_degree" class="form-control-label">Select PostGraduate degree</label>
                            <select class="form-control" id="pg_degree" name="pg_degree[]" multiple="">
                                <?php if(!empty($PG_degree_list)) { foreach ($PG_degree_list as $degree) { ?>
                                    <option value="<?php echo $degree->degree_id;?>"><?php echo $degree->degree_name ;?></option>
                                <?php } } ?>
                            </select>
                            <span id="pg_degree_error" class="error"></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 col-4">
                        <div class="form-group">
                            <label for="app_round" class="form-control-label">Select application round</label>
                            <select class="form-control" id="app_round" name="app_round[]" multiple="">
                                <?php if(!empty($appround_list)) { foreach ($appround_list as $round) { ?>
                                    <option value="<?php echo $round->round_id;?>"><?php echo $round->round_name ;?></option>
                                <?php } } ?>
                            </select>
                            <span id="app_round_error" class="error"></span>
                        </div>
                    </div>
                </div>
                <div class="row row-lg">
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 col-4">
                        <div class="form-group">
                            <label for="app_colleges" class="form-control-label">Select Applied College</label>
                            <select class="form-control" name="app_colleges[]" id="app_colleges">
                                <?php if(!empty($apply_college_list)) { foreach ($apply_college_list as $college) { ?>
                                    <option value="<?php echo $college->college_id;?>"><?php echo $college->college_name ;?></option>
                                <?php } } ?>
                            </select>
                            <span id="app_colleges_error"></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 col-4">
                        <div class="form-group">
                            <label for="app_status" class="form-control-label">Select Application status</label>
                            <select class="form-control" id="app_status" name="app_status[]" multiple="">
                                <?php if(!empty($app_status_list)) { foreach ($app_status_list as $status) { ?>
                                    <option value="<?php echo $status->app_status_id;?>"><?php echo $status->app_status ;?></option>
                                <?php } } ?>
                            </select>
                            <span id="app_status_error" class="error"></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 col-4">
                        <div class="form-group">
                            <label for="applied_programs" class="form-control-label">Select applied program</label>
                            <select class="form-control" id="applied_programs" name="applied_programs[]" multiple="">
                                <?php if(!empty($program_list)) { foreach ($program_list as $program) { ?>
                                    <option value="<?php echo $program->program_id;?>"><?php echo $program->program_name ;?></option>
                                <?php } } ?>
                            </select>
                            <span id="applied_programs_error" class="error"></span>
                        </div>
                    </div>
                </div>
                <div class="row row-lg">
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xl-3 col-3">
                        <div class="form-group">
                            <label for="intake_year" class="form-control-label">Select Intake year</label>
                            <select class="form-control" name="intake_year[]" id="intake_year" multiple="">
                                <?php $c_y=date("Y"); for ($i=$c_y-5; $i < $c_y+5 ; $i++) {  ?>
                                    <option <?php if($c_y==$i){ echo 'selected'; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                            <span id="intake_year_error"></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xl-3 col-3">
                        <div class="form-group">
                            <label for="res_states" class="form-control-label">Residing State</label>
                            <select class="form-control" id="res_states" name="res_states[]" multiple="">
                                <?php if(!empty($states_list)) { foreach ($states_list as $state) { ?>
                                    <option value="<?php echo $state->state_id;?>"><?php echo $state->state_name ;?></option>
                                <?php } } ?>
                            </select>
                            <span id="res_states_error" class="error"></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xl-3 col-3">
                        <div class="form-group">
                            <label for="test_token" class="form-control-label">Test Token</label>
                            <select class="form-control" name="test_token" id="test_token">
                                <option value="1">GMAT</option>
                                <option value="2">GRE</option>
                            </select>
                            <span id="test_token_error" class="error"></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xl-3 col-3">
                        <label for="from_score_range" class="form-control-label" style="padding: .429rem 0;">Select Score range</label>
                        <div class="form-group row">
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xl-5 col-5 ">
                                <div class="input-group">
                                    <input type="number" id="from_score_range" name="from_score_range" class="form-control" placeholder="Min Score Limit">
                                    <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                    <span id="from_score_range_error" class="error"></span>
                                </div>
                            </div>
                            <label for="to_score_range" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" style="text-align: right;">to</label>
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xl-5 col-5">
                                <div class="input-group">
                                    <input type="number" readonly id="to_score_range" name="to_score_range" class="form-control" placeholder="Max Score Limit">
                                    <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                    <span id="to_score_range_error" class="error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row row-lg">
                    
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 col-4 ">
                        <a href="javascript:void(0)" id="genrate" class="btn btn-success" >Genrate</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <div class="row row-lg">
                    <table id="student_report_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Packages</th>
                            <th>Work Exp</th>
                            <th>Current Employers</th>
                            
                            <th>UG Colleges</th>
                            <th>View Details</th>
                        </tr>
                    </thead>
                    <tbody id="genrateLeadReport">
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
                    
<script type="text/javascript">
jQuery(document).ready(function($) {
    //packages
    $("#packages").select2({
        placeholder: "Select Packages"
    });
    $("#ug_degree").select2({
        placeholder: "Select UnderGraduate Degree"
    });
    $("#ug_college").select2({
        placeholder: "Select UnderGraduate College"
    });
    $("#employer").select2({
        placeholder: "Select Employer"
    });
    $("#pg_college").select2({
        placeholder: "Select PostGraduate College"
    });
    $("#pg_degree").select2({
        placeholder: "Select PostGraduate Degree"
    });
    $("#app_round").select2({
        placeholder: "Select Application round"
    });
    $("#app_status").select2({
        placeholder: "Select Application status"
    });
    $("#intake_year").select2({
        placeholder: "Select Intake Year"
    });
    $("#res_states").select2({
        placeholder: "Select Residing State"
    });
    $("#applied_programs").select2({
        placeholder: "Select Applied Program"
    });


    $('#from_enquiry_date').daterangepicker({
        startDate: moment(),
        autoUpdateInput: false,
    },
    function(start, end, label) {
        $('#from_enquiry_date').val(start.format('YYYY-MM-DD'));
        $('#to_enquiry_date').val(end.format('YYYY-MM-DD'));
    });  

    var table=$("#student_report_table").DataTable( {
        "order": [[ 0, "asc" ]],
        stateSave: true,
        responsive: true,
        "fnDrawCallback": function(e) {
            /*var elems = Array.prototype.slice.call(document.querySelectorAll('.switch'));
            elems.forEach(function(elem) {
                if(!elem.hasAttribute("data-switchery")){
                    var switchery = new Switchery(elem,{color: '#3aa99e',secondaryColor: '#FF0000'});    
                }
            });*/
        }
    })
        
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

    $(document).on('click', '#genrate', function(event) {
        event.preventDefault();
        console.log("I am ");
        var formObj = $("#form_lead_report");
        var formData = new FormData(formObj[0]);
        var formURL="<?php echo base_url('admin/reports/genrate_student_report'); ?>";
        $.ajax({
                url: formURL,
                type: "POST",
                data:  formData,
                async: false,
                datatype : false,
                contentType: false,
                cache: false,
                processData:false,
                success: function(data, textStatus, jqXHR)
                {
                    console.log(data);
                    /*str="Lead report genrated successfully";
                    toastr.options = {
                      "closeButton": true,
                      timeOut: 5000
                    }
                    toastr["success"](str);*/
                }         
        });
    });
});
</script>
