<!-- Include Required Prerequisites-->
<!--<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>-->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<!--<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />-->
 
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<style type="text/css">

    .btnadd{
        margin-left: 28px;
    }
    .btnright{
        margin-right: 28px;
    }
</style>
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Student Report</h1>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                <div class="col-12 col-sm-6 mb-10 ">
                     <a href="javascript:void(0)" id="export_universities" class="btn btn-success float-right " >Export Excel</a>
                </div></div>
                <!--<form class="form-horizontal" method="post" action="<?php //echo base_url('admin/student/create'); ?>">-->
                    <div class="row row-lg">
                        <div class="col-md-6 col-lg-5 col-sm-6 col-xl-4 col-12 mt-10 ">
                            <h4 class="example-title mt-20">Select signup date range</h4>
                            <!--<input class="sd ml-5" type="date" name="selected_date"/>-->
                           <input type="text" name="start_date" value="" />   
                            <span class="open-button">
                                <button type="button" class="mr-5 mb-20" >📅</button>
                            </span>
                             to  
                            <input class="sd ml-5" type="text" name="end_date" value="" />
                            <span class="open-button">
                                <button type="button" class="mr-50">📅</button>
                            </span>
                        </div>
                        
                        <div class="col-md-6 col-lg-5 col-sm-6 col-xl-4 col-12 mt-10">
                            <h4 class="example-title"></h4>
                            <label for="sel1"><b>Select Package</b></label>
                            <select class="form-control " id="sel1">
                                <option value="1">Package 1</option>
                                <option value="2">Package 2</option>
                                <option value="3">Package 3</option>
                            </select>
                        </div>
                    </div>


                    <div class="row row-lg mt-50">
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xl-4 col-12 mt-10 ">
                            <h4 class="example-title"></h4>
                            <label for="sel2"><b>Undergraduate Degree</b></label>
                            <select class="form-control " id="sel2">
                                <option value="1">B.Sc</option>
                                <option value="2">B.E/B.Tech</option>
                                
                            </select>
                        </div>
                    

                    
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xl-4 col-12 mt-10 " >
                            <h4 class="example-title"></h4>
                            <label for="sel3"><b>Undergraduate College</b></label>
                            <select class="form-control " id="sel3">
                                <option value="1">College 1</option>
                                <option value="2">College 2</option>
                                <option value="3">College 3</option>
                            </select>
                        </div>
                    

                        <div class="col-md-4 col-lg-4 col-sm-6 col-xl-4 col-12 mt-20 ">
                            <h4 class="example-title">Work experience range</h4>
                            <input type="text" name="start_date1" value="" />
                            <span class="open-button">
                                <button type="button" class="mr-5 mb-20">📅</button>
                            </span>
                             to
                            <input class="sd ml-5" type="text" name="end_date1" value="" />
                            <span class="open-button">
                                <button type="button">📅</button>
                            </span>
                        </div>
                        
                    </div>

                    <div class="row row-lg mt-30">

                        <div class="col-md-4 col-lg-4 col-sm-6 col-xl-4 col-12 mt-10 " >
                            <h4 class="example-title"></h4>
                            <label for="sel3"><b>Select Employer</b></label>
                            <select class="form-control " id="sel4">
                                <option value="1">Employer 1</option>
                                <option value="2">Employer 2</option>
                                <option value="3">Employer 3</option>
                            </select>
                        </div>

                        <div class="col-md-4 col-lg-4 col-sm-6 col-xl-4 col-12 mt-10 " >
                            <h4 class="example-title"></h4>
                            <label for="sel3"><b>Select Post Graduate Degree</b></label>
                            <select class="form-control " id="sel5">
                                <option value="1">GRE</option>
                                <option value="2">GMAT</option>
                                <option value="3">Phd</option>
                            </select>
                        </div>

                        <div class="col-md-4 col-lg-4 col-sm-6 col-xl-4 col-12 mt-10 " >
                            <h4 class="example-title"></h4>
                            <label for="sel3"><b>Select Application Round</b></label>
                            <select class="form-control " id="sel6">
                                <option value="1">Round 1</option>
                                <option value="2">Round 2</option>
                                <option value="3">Round 3</option>
                            </select>
                        </div>


                    </div>

                    <div class="row row-lg mt-40">

                        <div class="col-md-4 col-lg-4 col-sm-6 col-xl-4 col-12 mt-10 " >
                            <h4 class="example-title"></h4>
                            <label for="sel3"><b>Select applied college</b></label>
                            <select class="form-control " id="sel7">
                                <option value="1">College 1</option>
                                <option value="2">College 2</option>
                                <option value="3">College 3</option>
                            </select>
                        </div>

                        <div class="col-md-4 col-lg-4 col-sm-6 col-xl-4 col-12 mt-10 " >
                            <h4 class="example-title"></h4>
                            <label for="sel3"><b>Select Application Status</b></label>
                            <select class="form-control " id="sel8">
                                <option value="1">Applied</option>
                                <option value="2">Not applied</option>
                                <option value="3">Pending</option>
                            </select>
                        </div>

                        <div class="col-md-4 col-lg-4 col-sm-6 col-xl-4 col-12 mt-10 " >
                            <h4 class="example-title"></h4>
                            <label for="sel3"><b>Select applied program</b></label>
                            <select class="form-control " id="sel9">
                                <option value="1">Program 1</option>
                                <option value="2">Program 2</option>
                                <option value="3">Program 3</option>
                            </select>
                        </div>


                    </div>


                    <div class="row row-lg mt-40">

                        <div class="col-md-4 col-lg-4 col-sm-6 col-xl-3 col-12 mt-10 " >
                            <h4 class="example-title"></h4>
                            <label for="sel3"><b>Select Intake year</b></label>
                            <select class="form-control " id="sel10">
                                <option value="1">Year 1</option>
                                <option value="2">Year 2</option>
                                <option value="3">Year 3</option>
                            </select>
                        </div>

                        <div class="col-md-4 col-lg-4 col-sm-6 col-xl-3 col-12 mt-10 " >
                            <h4 class="example-title"></h4>
                            <label for="sel3"><b>Residing State</b></label>
                            <select class="form-control " id="sel11">
                                <option value="1">State 1</option>
                                <option value="2">State 2</option>
                                <option value="3">State 3</option>
                            </select>
                        </div>

                        <div class="col-md-4 col-lg-4 col-sm-6 col-xl-3 col-12 mt-10 " >
                            <h4 class="example-title"></h4>
                            <label for="sel3"><b>Test taken</b></label>
                            <select class="form-control " id="sel12">
                                <option value="1">GRE</option>
                                <option value="2">GMAT</option>
                                <option value="3">none</option>
                                
                            </select>
                        </div>

                        <div class="col-md-4 col-lg-4 col-sm-6 col-xl-3 col-12 mt-40 "  >
                            
                                Score Range
                                <select name="state" class="select" id="state">
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>
                                    to
                                <select name="state" class="select" id="state1">
                                    <option value=""></option>
                                    <option value=""></option>
                                </select>

                                

                                
                        </div>
                        <script type="text/javascript">
                         var $state = $('#state'), $sel12 = $('#sel12');
                                $sel12.change(function () {
                                    if ($sel12.val() == '3') {
                                        $state.attr('disabled', 'disabled').val('');
                                    } else {
                                        $state.removeAttr('disabled');
                                    }
                                }).trigger('change');

                                 $("#state").attr("disabled", true/false);

                                 var $state1 = $('#state1'), $sel12 = $('#sel12');
                                $sel12.change(function () {
                                    if ($sel12.val() == '3') {
                                        $state1.attr('disabled', 'disabled').val('');
                                    } else {
                                        $state1.removeAttr('disabled');
                                    }
                                }).trigger('change');

                                 $("#state1").attr("disabled", true/false);
                                


                            </script> 

                    </div>

                    <div class="row row-lg mt-20">
                        <div class="col-12 col-sm-12 mt-10 ">
                          <label for="inputdefault" class="mb-20 float-right"><b>Total Count</b>
                          <input class="example-title" id="inputdefault" type="text">
                        </div></label>
                    </div>


                    <div class="row row-lg mt-30">
                         <table id="lead_report_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive col-lg-4 col-xl-4 col-md-8 col-12 mt-10 mt-100">
                            <thead class="mt-100">
                                <tr>
                                    <th>Name</th>                                    
                                    <th>Phone Number</th>
                                    <th>Package</th>
                                    <th>Work ex</th>
                                    <th>Current Employee</th>
                                    <th>UG College</th>
                                    <th colspan="3">View Details</th>                                    
                                  </tr>
                            </thead>

                                <tr>
                                    <td><a href="#" data-toggle="tooltip" data-placement="bottom" title="First_Last">First Last</a></td>
                                    
                                    <td>253694835</td>
                                    <td>Package 1,Package 2</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>Personal</td>
                                    <td>Professional</td>
                                    <td>Application</td>
                                    

                                  </tr>


                        </table>
                    </div>


                    </div>
                    
                            <script type="text/javascript">
                                $('input[name="start_date"]').daterangepicker({
                                    startDate: ($('input[name="start_date"]').val().length) ? moment($('input[name="start_date"]').val(),"YYYY-MM-DD") : moment(),
                                    endDate: ($('input[name="end_date"]').val().length) ? moment($('input[name="end_date"]').val(),"YYYY-MM-DD") : moment(),
                                    autoUpdateInput: false,
                                },
                                function(start, end, label) {
                                    $('input[name="start_date"]').val(start.format('YYYY-MM-DD'));
                                    $('input[name="end_date"]').val(end.format('YYYY-MM-DD'));
                                });  

                                $('input[name="start_date1"]').daterangepicker({
                                    startDate: ($('input[name="start_date1"]').val().length) ? moment($('input[name="start_date1"]').val(),"YYYY-MM-DD") : moment(),
                                    endDate: ($('input[name="end_date1"]').val().length) ? moment($('input[name="end_date1"]').val(),"YYYY-MM-DD") : moment(),
                                    autoUpdateInput: false,
                                },
                                function(start, end, label) {
                                    $('input[name="start_date1"]').val(start.format('YYYY-MM-DD'));
                                    $('input[name="end_date1"]').val(end.format('YYYY-MM-DD'));
                                });

                                 $(".selector").change(function() {
                                    var $value = $(this).val();
                                    var $title = $(this).children('option[value='+$value+']').html();
                                    alert($title); 
                                    $('input#bacon').val($title).css('border','3px solid blue');
                                });
                                 </script>
                                               
                                              
                    


                   
                
            </div>
        </div>
    </div>
</div>
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
</script>
