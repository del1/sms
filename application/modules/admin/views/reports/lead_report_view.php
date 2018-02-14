<style type="text/css">
label{
    font-weight: 500;
}
.no-pad{
    padding-left: 0px !important;
    padding-right: 0px !important;
}
.select2{
        width: auto !important;
}
.center {
    margin: auto;
    width: 50%;
    padding: 10px;
}
</style>
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Lead Report</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item active">Lead Report</li>
        </ol>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <?php $arr=array('class'=>"form-horizontal","id"=>"form_lead_report");
                            echo form_open('admin/reports/genrate_lead_report',$arr); ?>
                <div class="row row-lg">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 float-right">
                        <a href="javascript:void(0)" class="btn btn-success float-right " >Export Excel</a>
                    </div>
                </div>
                <div class="row row-lg mt-20">
                    <div class="col-md-8 col-lg-8 col-sm-8 col-xl-6 col-12">
                        <label for="from_enquiry_date" class="form-control-label" style="padding: .429rem 0;">Select enquiry date</label>
                        <div class="form-group row">
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xl-5 col-12">
                                <div class="input-group">
                                    <input type="text" id="from_enquiry_date" name="from_enquiry_date" class="form-control" placeholder="From Date">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                    <span id="from_enquiry_date_error" class="error"></span>
                                </div>
                            </div>
                            <label for="to_enquiry_date" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1  hidden-xs-down" style="text-align: right;">to</label>
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xl-5 col-12">
                                <div class="input-group">
                                    <input type="text" readonly id="to_enquiry_date" name="to_enquiry_date" class="form-control" placeholder="To Date">
                                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                    <span id="to_enquiry_date_error" class="error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 col-12">
                        <div class="form-group">
                            <label for="lead_type" class="form-control-label">Select Lead type</label>
                            <select class="form-control" name="lead_type" id="lead_type">
                                <?php if(!empty($lead_types)) { foreach ($lead_types as $lead_id => $lead_type) { ?>
                                    <option value="<?php echo $lead_type->lead_type_id;?>"><?php echo $lead_type->lead_type ;?></option>
                                <?php } } ?>
                            </select>
                            <span id="lead_type_error"></span>
                        </div>
                    </div>
                    <!-- <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 col-4">
                        <div class="form-group">
                            <label for="intake_year" class="form-control-label">Select Intake year</label>
                            <select class="form-control" name="intake_year[]" id="intake_year" multiple="">
                                <?php $c_y=date("Y"); for ($i=$c_y-5; $i < $c_y+5 ; $i++) {  ?>
                                    <option <?php if($c_y==$i){ echo 'selected'; } ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                            <span id="intake_year_error"></span>
                        </div> 
                    </div>-->

                    
                </div>
                <div class="row row-lg">
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xl-3 col-12">
                        <div class="form-group">
                            <label for="source" class="form-control-label">Source</label>
                            <select class="form-control" id="source" name="source[]" multiple="">
                                <?php if(!empty($source_list)) { foreach ($source_list as $source) { ?>
                                    <option value="<?php echo $source->source_id;?>"><?php echo $source->source_name ;?></option>
                                <?php } } ?>
                            </select>
                            <span id="source_error" class="error"></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xl-3 col-12">
                        <div class="form-group">
                            <label for="interested_program" class="form-control-label">Interested Program</label>
                            <select class="form-control" name="interested_program[]" id="interested_program" multiple="">
                                
                                <?php if(!empty($program_list)) { foreach ($program_list as $program) { ?>
                                    <option value="<?php echo $program->program_id;?>"><?php echo $program->program_name ;?></option>
                                <?php } } ?>
                            </select>
                            <span id="interested_program_error" class="error"></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xl-3 col-12">
                        <div class="form-group">
                            <label for="status" class="form-control-label">Select Status</label>
                            <select class="form-control" id="status" name="status[]" multiple="">
                                <?php if(!empty($enq_status)) { foreach ($enq_status as $status) { ?>
                                    <option value="<?php echo $status->enq_status_id;?>"><?php echo $status->enq_status ;?></option>
                                <?php } } ?>
                            </select>
                            <span id="status_error" class="error"></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xl-3 col-12">
                        <div class="form-group">
                            <label for="ug_college" class="form-control-label">UnderGraduate College</label>
                            <select class="form-control" id="ug_college" name="ug_college[]" multiple="">
                                <?php if(!empty($college_list)) { foreach ($college_list as $college) { ?>
                                    <option value="<?php echo $college->college_id;?>"><?php echo $college->college_name ;?></option>
                                <?php } } ?>
                            </select>
                            <span id="ug_college_error" class="error"></span>
                        </div>
                    </div>
                </div>
                <div class="row row-lg">
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-3 col-12">
                        <div class="form-group">
                            <label for="test_taken" class="form-control-label">Test Taken</label>
                            <select class="form-control" name="test_taken" id="test_taken">
                                <option value="1">GMAT</option>
                                <option value="2">GRE</option>
                                <option value="3">Multiple</option>
                                <option value="4">None</option>
                            </select>
                            <span id="test_taken_error" class="error"></span>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-8 col-sm-8 col-xl-9 col-8  row col-12" id="test_target">
                        
                    </div>
                </div>
                <div class="row row-lg">
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-3 col-12">
                        <div class="form-group">
                            <label for="res_city" class="form-control-label">Residing City</label>
                            <select class="form-control" id="res_city" name="res_city[]" multiple="">
                                <?php if(!empty($city_list)) { foreach ($city_list as $city) { ?>
                                    <option value="<?php echo $city->city_id;?>"><?php echo $city->city_name ;?></option>
                                <?php } } ?>
                            </select>
                            <span id="res_city_error" class="error"></span>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-sm-8 col-xl-6 col-12">
                        <label for="from_exp_range_date" class="form-control-label" style="padding: .429rem 0;">Work Experience Range (in years)</label>
                        <div class="form-group row">
                            <label for="to_exp_range_date" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-1 col-2" style="text-align: right;">From</label>
                            <div class="col-md-10 col-lg-5 col-sm-10 col-xl-5 col-9 ">
                                <select class="form-control" name="from_exp_range_date" id="from_exp_range_date">
                                    <option></option>
                                <?php for ($i=0; $i <= 5 ; $i++) {  ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                                </select>
                                <span id="from_exp_range_date_error" class="error"></span>
                            </div>
                            <label for="to_exp_range_date" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-1 col-2" style="text-align: right;">To</label>
                            <div class="col-md-10 col-lg-5 col-sm-10 col-xl-5 col-9">
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
                    <div class="col-md-2 col-lg-2 col-sm-12 col-xl-2 col-12">
                        <a href="javascript:void(0)" id="genrate" class="btn btn-success " >Genrate</a>
                    </div>
                </div>
                <?php echo form_close(); ?>
                <div class="row row-lg">
                    <table id="lead_report_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Enquiry Date</th>
                            <th>Phone Number</th>
                            <th>Intro</th>
                            <th>View Details</th>
                            <th>Last Followed Up</th>
                            <th>Follow Up</th>
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

<div id="test_4" style="display: none">
    <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-12">
        <label for="gre_tentative_from_date" class="form-control-label" style="padding: .429rem 0;">Tentative GRE date</label>
        <div class="form-group row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xl-5 col-12 ">
                <div class="input-group">
                    <input type="text" id="gre_tentative_from_date" name="gre_tentative_from_date" class="form-control" placeholder="From Date">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                    <span id="gre_tentative_from_date_error" class="error"></span>
                </div>
            </div>
            <label for="gre_tentative_to_date" class="form-control-label col-md-1 col-sm-1 col-xl-1 hidden-lg-down hidden-md-down hidden-sm-down hidden-xs-down" style="text-align: right;">to</label>
            <div class="col-md-12 col-lg-12 col-sm-12 col-xl-5 col-12">
                <div class="input-group">
                    <input type="text" readonly id="gre_tentative_to_date" name="gre_tentative_to_date" class="form-control" placeholder="To Date">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                    <span id="gre_tentative_to_date_error" class="error"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-12">
        <label for="gmat_tentative_from_date" class="form-control-label" style="padding: .429rem 0;">Tentative GMAT date</label>
        <div class="form-group row">
            <div class="col-md-12 col-lg-12 col-sm-12 col-xl-5 col-12 ">
                <div class="input-group">
                    <input type="text" id="gmat_tentative_from_date" name="gmat_tentative_from_date" class="form-control" placeholder="From Date">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                    <span id="gmat_tentative_from_date_error" class="error"></span>
                </div>
            </div>
            <label for="gmat_tentative_to_date" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1 hidden-lg-down hidden-md-down hidden-sm-down hidden-xs-down" style="text-align: right;">to</label>
            <div class="col-md-12 col-lg-12 col-sm-12 col-xl-5 col-12">
                <div class="input-group">
                    <input type="text" readonly id="gmat_tentative_to_date" name="gmat_tentative_to_date" class="form-control" placeholder="To Date">
                    <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                    <span id="gmat_tentative_to_date_error" class="error"></span>
                </div>
            </div>
        </div>
    </div>
</div>
                    
<script type="text/javascript">
jQuery(document).ready(function($) {

    $("#intake_year").select2({
        placeholder: "Select Intake Year"
    });

    $("#source").select2({
        placeholder: "Select source"
    });
    $("#status").select2({
        placeholder: "Select enquiry status"
    });
    
    $("#interested_program").select2({
        placeholder: "Select Interested Program"
    });
    $("#ug_college").select2({
        placeholder: "Select UnderGraduate College"
    });
    $("#res_city").select2({
        placeholder: "Select City"
    });

    $('#from_enquiry_date').daterangepicker({
        startDate: moment(),
        autoUpdateInput: false,
    },
    function(start, end, label) {
        $('#from_enquiry_date').val(start.format('YYYY-MM-DD'));
        $('#to_enquiry_date').val(end.format('YYYY-MM-DD'));
    });  

    $('#gre_tentative_from_date').daterangepicker({
        startDate: moment(),
        autoUpdateInput: false,
    },
    function(start, end, label) {
        $('#gre_tentative_from_date').val(start.format('YYYY-MM-DD'));
        $('#gre_tentative_to_date').val(end.format('YYYY-MM-DD'));
    });  

    $('#gmat_tentative_from_date').daterangepicker({
        startDate: moment(),
        autoUpdateInput: false,
    },
    function(start, end, label) {
        $('#gmat_tentative_from_date').val(start.format('YYYY-MM-DD'));
        $('#gmat_tentative_to_date').val(end.format('YYYY-MM-DD'));
    });  

    var table=$("#lead_report_table").DataTable( {
        "order": [[ 0, "asc" ]],
        stateSave: true,
        responsive: true,
        "columns": [
            null,
            null,
            null,
            null,
            null,
            { "width": "20%" },
            { "width": "13%" },
            null,
          ],
        "fnDrawCallback": function(e) {
            /*var elems = Array.prototype.slice.call(document.querySelectorAll('.switch'));
            elems.forEach(function(elem) {
                if(!elem.hasAttribute("data-switchery")){
                    var switchery = new Switchery(elem,{color: '#3aa99e',secondaryColor: '#FF0000'});    
                }
            });*/
        }
    })

    $(document).on('click', '#test_taken', function(event) {
        alert($(this).val());
    })

    $(document).on('click', '#genrate', function(event) {
        event.preventDefault();
        var formObj = $("#form_lead_report");
        var formData = new FormData(formObj[0]);
        var formURL="<?php echo base_url('admin/reports/genrate_lead_report'); ?>";
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
                    $("#genrateLeadReport").html(data);
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
