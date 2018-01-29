<style type="text/css">
label{
    font-weight: 500;
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
                <div class="row row-lg">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 float-right">
                        <a href="javascript:void(0)" class="btn btn-success float-right " >Export Excel</a>
                    </div>
                </div>
                <div class="row row-lg mt-20">
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 col-4">
                        <label for="from_enquiry_date" class="form-control-label" style="padding: .429rem 0;">Select enquiry date</label>
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
                            <label for="intake_year" class="form-control-label">Select Intake year</label>
                            <select data-plugin="select2" class="form-control" name="intake_year" id="intake_year">
                                <option  hidden="">Select Intake year</option>
                                <?php for ($i=date("Y")-5; $i < date("Y")+5 ; $i++) {  ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                            <span id="intake_year_error"></span>
                        </div>
                    </div>

                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 col-4">
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
                </div>
                <div class="row row-lg">
                    <div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-2">
                        <div class="form-group">
                            <label for="test_token" class="form-control-label">Test Token</label>
                            <select class="form-control" name="test_token" id="test_token">
                                <option value="1">GMAT</option>
                                <option value="2">GRE</option>
                                <option value="3">Both</option>
                            </select>
                            <span id="test_token_error" class="error"></span>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-2">
                        <div class="form-group">
                            <label for="source" class="form-control-label">Source</label>
                            <select class="form-control" id="source" name="source" multiple="" data-plugin="select2">
                                <?php if(!empty($source_list)) { foreach ($source_list as $source) { ?>
                                    <option value="<?php echo $source->source_id;?>"><?php echo $source->source_name ;?></option>
                                <?php } } ?>
                            </select>
                            <span id="source_error" class="error"></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xl-3 col-3">
                        <div class="form-group">
                            <label for="interested_program" class="form-control-label">Interested Program</label>
                            <select class="form-control" name="interested_program" id="interested_program" multiple="" data-plugin="select2">
                                <?php if(!empty($program_list)) { foreach ($program_list as $program) { ?>
                                    <option value="<?php echo $program->program_id;?>"><?php echo $program->program_name ;?></option>
                                <?php } } ?>
                            </select>
                            <span id="interested_program_error" class="error"></span>
                        </div>
                    </div>
                    <div class="col-md-2 col-lg-2 col-sm-2 col-xl-2 col-2">
                        <div class="form-group">
                            <label for="status" class="form-control-label">Select Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="1">Open</option>
                                <option value="2">Closed</option>
                                <option value="3">Unsubscribe</option>
                            </select>
                            <span id="status_error" class="error"></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-3 col-sm-3 col-xl-3 col-3">
                        <div class="form-group">
                            <label for="ug_college" class="form-control-label">UnderGraduate College</label>
                            <select class="form-control" id="ug_college" name="ug_college" multiple="" data-plugin="select2">
                                <?php if(!empty($college_list)) { foreach ($college_list as $college) { ?>
                                    <option value="<?php echo $college->college_id;?>"><?php echo $college->college_name ;?></option>
                                <?php } } ?>
                            </select>
                            <span id="ug_college_error" class="error"></span>
                        </div>
                    </div>
                </div>
                <div class="row row-lg">
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 col-4">
                        <div class="form-group">
                            <label for="res_city" class="form-control-label">Residing City</label>
                            <select class="form-control" id="res_city" name="res_city" multiple="" data-plugin="select2">
                                <?php if(!empty($city_list)) { foreach ($city_list as $city) { ?>
                                    <option value="<?php echo $city->city_id;?>"><?php echo $city->city_name ;?></option>
                                <?php } } ?>
                            </select>
                            <span id="res_city_error" class="error"></span>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 col-4">
                        <label for="gre_tentative_from_date" class="form-control-label" style="padding: .429rem 0;">Tentative GRE date</label>
                        <div class="form-group row">
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xl-5 col-5 ">
                                <div class="input-group">
                                    <input type="text" id="gre_tentative_from_date" name="gre_tentative_from_date" class="form-control" placeholder="From Date">
                                    <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                    <span id="gre_tentative_from_date_error" class="error"></span>
                                </div>
                            </div>
                            <label for="gre_tentative_to_date" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" style="text-align: right;">to</label>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-6">
                                <div class="input-group">
                                    <input type="text" readonly id="gre_tentative_to_date" name="gre_tentative_to_date" class="form-control" placeholder="To Date">
                                    <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                    <span id="gre_tentative_to_date_error" class="error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 col-4">
                        <label for="gmat_tentative_from_date" class="form-control-label" style="padding: .429rem 0;">Tentative GMAT date</label>
                        <div class="form-group row">
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xl-5 col-5 ">
                                <div class="input-group">
                                    <input type="text" id="gmat_tentative_from_date" name="gmat_tentative_from_date" class="form-control" placeholder="From Date">
                                    <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                    <span id="gmat_tentative_from_date_error" class="error"></span>
                                </div>
                            </div>
                            <label for="gmat_tentative_to_date" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" style="text-align: right;">to</label>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-6">
                                <div class="input-group">
                                    <input type="text" readonly id="gmat_tentative_to_date" name="gmat_tentative_to_date" class="form-control" placeholder="To Date">
                                    <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                    <span id="gmat_tentative_to_date_error" class="error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-lg">
                    <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 col-4">
                        <label for="from_exp_range_date" class="form-control-label" style="padding: .429rem 0;">Work Experience Range</label>
                        <div class="form-group row">
                            <div class="col-md-5 col-lg-5 col-sm-5 col-xl-5 col-5 ">
                                <div class="input-group">
                                    <input type="text" id="from_exp_range_date" name="from_exp_range_date" class="form-control" placeholder="From Date">
                                    <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                    <span id="from_exp_range_date_error" class="error"></span>
                                </div>
                            </div>
                            <label for="to_exp_range_date" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" style="text-align: right;">to</label>
                            <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-6">
                                <div class="input-group">
                                    <input type="text" id="to_exp_range_date" name="to_exp_range_date" class="form-control" placeholder="To Date">
                                    <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                    <span id="to_exp_range_date_error" class="error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row-lg">
                    <table id="lead_report_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Enquiry Date</th>
                            <th>Phone Number</th>
                            <th>Intro</th>
                            <th>View Details</th>
                            <th>Last Followed Up</th>
                            <th>Follow Up</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
                    
<script type="text/javascript">
jQuery(document).ready(function($) {

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
});
</script>
