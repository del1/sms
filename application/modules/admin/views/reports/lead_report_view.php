<!-- Include Required Prerequisites-->
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<style type="text/css">
    .tile_div a {
    display: block;
    float: left;
    height: 50px;
    width: 100px;
    margin-right: 5px;
    background-image: url(./images/button_left.png);
    text-align: center;
    line-height: 50px;
    text-decoration: none;
}

.title_div a.last {
    margin-right: 0;
}

    .btnadd{
        margin-left: 28px;
    }
    .btnright{
        margin-right: 28px;
    }
</style>
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Lead Report</h1>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <div class="row row-lg">
                <div class="col-12 col-sm-6 ">
                     <a href="javascript:void(0)" id="export_universities" class="btn btn-success float-right " >Export Excel</a>
                </div></div>
                <!--<form class="form-horizontal" method="post" action="<?php //echo base_url('admin/student/create'); ?>">-->
                    <div class="row row-lg">
                        <div class="col-md-4 col-lg-4 col-sm-6 col-xl-4 col-12">
                            <h4 class="example-title mt-30">Select enquiry date</h4>
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
                        
                        <div class="col-md-2 col-lg-4 col-sm-6 col-xl-3 col-12 ">
                            <h4 class="example-title"></h4>
                            <label for="sel1"><b>Select Intake year</b></label>
                            <select class="form-control " id="sel1">
                                <option value="1">Year 1</option>
                                <option value="2">Year 2</option>
                                <option value="3">Year 3</option>
                            </select>
                        </div>


                        <div class="col-md-2 col-lg-4 col-sm-6 col-xl-3 col-12 ">
                            <h4 class="example-title"></h4>
                            <label for="sel2"><b>Select Lead type</b></label>
                            <select class="form-control " id="sel2">
                                <option value="1">Hot</option>
                                <option value="2">Cold</option>
                                
                            </select>
                        </div>
                    </div>

                    <div class="row row-lg">
                        <div class="col-md-2 col-lg-4 col-sm-6 col-xl-2 col-12 mt-20" >
                            <h4 class="example-title"></h4>
                            <label for="sel3"><b>Test Token</b></label>
                            <select class="form-control " id="sel3">
                                <option value="1">GRE</option>
                                <option value="2">GMAT</option>
                                <option value="3">BOTH</option>
                            </select>
                        </div>
                    

                        <div class="col-md-2 col-lg-4 col-sm-6 col-xl-2 col-12 mt-20">
                            <h4 class="example-title"></h4>
                            <label for="sel5"><b>Source</b></label>
                            <select class="form-control " id="sel5">
                                <option value="1">Source 1</option>
                                <option value="2">Source 2</option>
                                <option value="3">Source 3</option>
                                <option value="4">Source 4</option>
                            </select>
                        </div>

                        <div class="col-md-2 col-lg-4 col-sm-6 col-xl-2 col-12 mt-20 tile_div">
                            <h4 class="example-title"></h4>
                            <label for="sel6"><b>Interested Program</b></label>
                            <select class="form-control " id="sel6">
                                <option value="1">Program 1</option>
                                <option value="2">program 2</option>
                                <option value="3">Program 3</option>
                                <option value="4">Program 4</option>
                            </select>
                        </div>

                        <div class="col-md-2 col-lg-4 col-sm-6 col-xl-2 col-12 mt-20 tile_div">
                            <h4 class="example-title"></h4>
                            <label for="sel7"><b>Select Status</b></label>
                            <select class="form-control " id="sel7">
                                <option value="1">Open</option>
                                <option value="2">Close</option>
                                <option value="3">Unsubscribe</option>
                                
                            </select>
                        </div>

                        <div class="col-md-2 col-lg-4 col-sm-6 col-xl-2 col-12 mt-20 tile_div">
                            <h4 class="example-title"></h4>
                            <label for="sel6"><b>Undergraduate Study</b></label>
                            <select class="form-control " id="sel6">
                                <option value="1">College 1</option>
                                <option value="2">College 2</option>
                                <option value="3">College 3</option>
                                <option value="4">College 4</option>
                            </select>
                        </div>
                    </div>


                    <div class="row row-lg">
                        <div class="col-md-2 col-lg-4 col-sm-6 col-xl-2 col-12 mt-40">
                            <h4 class="example-title"></h4>
                            <label for="sel6"><b>Residing City</b></label>
                            <select class="form-control " id="sel6">
                                <option value="1">City name</option>
                                <option value="2">City name</option>
                                <option value="3">City name</option>
                                <option value="4">City name</option>
                            </select>
                        </div>

                        <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 mt-50">
                            <h4 class="example-title">Tentative GRE date</h4>
                            <input type="text" name="start_date1" value="" />
                            <span class="open-button">
                                <button type="button" class="mr-5 mb-20">📅</button>
                            </span>
                             to
                            <input class="sd ml-5" type="text" name="end_date1" value="" />
                            <span class="open-button">
                                <button type="button" class="mr-50">📅</button>
                            </span>
                        </div>

                        <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 mt-50">
                            <h4 class="example-title">Tentative GMAT date</h4>
                            <input type="text" name="start_date2" value="" />
                            <span class="open-button">
                                <button type="button" class="mr-5 mb-20">📅</button>
                            </span>
                             to
                            <input class="sd ml-5" type="text" name="end_date2" value="" />
                            <span class="open-button">
                                <button type="button">📅</button>
                            </span>
                        </div>
                    </div>

                    <div class="row row-lg">
                        <div class="col-md-8 col-lg-8 col-sm-8 col-xl-8 mt-40">
                            <h4 class="example-title">Work experience range</h4>
                            <input type="text" name="start_date3" value="" />
                            <span class="open-button">
                                <button type="button" class="mr-5 mb-20">📅</button>
                            </span>
                             to
                            <input class="sd ml-5" type="text" name="end_date3" value="" />
                            <span class="open-button">
                                <button type="button" class="mr-50">📅</button>
                            </span>
                        </div>
                    

                    
                        <div class="col-sm-12 col-12">
                          <label for="inputdefault" class="mb-20 float-right"><b>Total Count</b>
                          <input class="example-title" id="inputdefault" type="text">
                        </div></label>
                    </div>
                    

                        <div class="row row-lg">
                         <table id="lead_report_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive col-lg-4 col-xl-4 col-md-8 col-12 mt-100">
                            <thead class="mt-100">
                                <tr>
                                    <th>Name</th>
                                    <th>Enquiry Date</th>
                                    <th>Phone Number</th>
                                    <th>Intro</th>
                                    <th colspan="3">View Details</th>
                                    <th>Last Followed Up</th>
                                    <th>Follow Up</th>
                                  </tr>
                            </thead>

                                <tr>
                                    <td><a href="#" data-toggle="tooltip" data-placement="bottom" title="First_Last">First Last</a></td>
                                    <td>dd/mm/yyyy</td>
                                    <td>253694835</td>
                                    <td><a href="#" data-toggle="tooltip" data-placement="bottom" title="Hooray!">5+BDS</a></td>
                                    <td>Personal</td>
                                    <td>Professional</td>
                                    <td>Application</td>
                                    <td>dd/mm/yyyy</td>
                                    <td><label class="radio-inline"><input type="radio" name="optradio"></label></td>


                                  </tr>


                        </table>
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

                                $('input[name="start_date2"]').daterangepicker({
                                    startDate: ($('input[name="start_date2"]').val().length) ? moment($('input[name="start_date2"]').val(),"YYYY-MM-DD") : moment(),
                                    endDate: ($('input[name="end_date2"]').val().length) ? moment($('input[name="end_date2"]').val(),"YYYY-MM-DD") : moment(),
                                    autoUpdateInput: false,
                                },
                                function(start, end, label) {
                                    $('input[name="start_date2"]').val(start.format('YYYY-MM-DD'));
                                    $('input[name="end_date2"]').val(end.format('YYYY-MM-DD'));
                                }); 

                               $('input[name="start_date3"]').daterangepicker({
                                    startDate: ($('input[name="start_date3"]').val().length) ? moment($('input[name="start_date3"]').val(),"YYYY-MM-DD") : moment(),
                                    endDate: ($('input[name="end_date3"]').val().length) ? moment($('input[name="end_date3"]').val(),"YYYY-MM-DD") : moment(),
                                    autoUpdateInput: false,
                                },
                                function(start, end, label) {
                                    $('input[name="start_date3"]').val(start.format('YYYY-MM-DD'));
                                    $('input[name="end_date3"]').val(end.format('YYYY-MM-DD'));
                                }); 

                            </script>                
                                              
                    


                   
                </form>
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
