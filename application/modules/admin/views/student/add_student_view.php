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
        <h1 class="page-title">Add student details</h1>
    </div>
    <div class="page-content">
        <div class="panel">
            <div class="panel-body container-fluid">
                <form class="form-horizontal" method="post" action="<?php echo base_url('admin/student/create'); ?>">
                    <div class="row row-lg">
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4">
                            <h4 class="example-title">Select enquiry agent</h4>
                            <select class="form-control ">
                                <option>1</option>
                                <option>1</option>
                                <option>1</option>
                            </select>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4">
                            <h4 class="example-title">Select enquiry date</h4>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Select Enquiry Date" aria-label="Username" aria-describedby="basic-addon1">
                                <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4">
                            <h4 class="example-title">Select Source</h4>
                            <input type="text" name="enquiery_date" class="form-control">
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 mt-20">
                            <h4 class="example-title">Type of lead</h4>
                            <select class="form-control ">
                                <option value="1">Hot</option>
                                <option value="2">Cold</option>
                            </select>
                        </div>
                    </div>
                    <div class="row row-lg mt-50">
                        <div class="col-sm-12 col-md-12 mt-20">
                            <h3 class="example-title ">Personal Details</h3>
                            <div class="form-group row">
                                <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">First name</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                    <input type="text" name="enquiery_date" class="form-control ">
                                </div>
                                <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Last name</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                    <input type="text" name="enquiery_date" class="form-control ">
                                </div>
                            </div>

                            <div class="form-group row mt-20">
                                <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Email Id</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                    <input type="text" name="enquiery_date" class="form-control ">
                                </div>
                                <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Phone number</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                    <input type="text" name="enquiery_date" class="form-control ">
                                </div>
                            </div>

                            <div class="form-group row mt-20">
                                <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Residing State</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                    <select class="form-control ">
                                        <option hidden="">Select State</option>
                                        <option value="1">Hot</option>
                                        <option value="2">Cold</option>
                                    </select>
                                </div>
                                <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Residing City</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                    <select class="form-control ">
                                        <option hidden="">Select City</option>
                                        <option value="1">Hot</option>
                                        <option value="2">Cold</option>
                                    </select>
                                </div>
                            </div>

                            <h3 class="example-title mt-50">Professional Details</h3>
                            <div class="form-group row">
                                <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Intro</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                    <input type="text" name="enquiery_date" class="form-control ">
                                </div>
                                <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Total Experience</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                    <select class="form-control ">
                                        <option hidden="">Select Experience</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-20">
                                <label for="Degree Name" class="form-control-label col-sm-2 col-xl-1" style="text-align: left;">Undergraduate degree</label>
                                <div class="col-md-10 col-lg-10 col-sm-10  col-xl-11">
                                    <select class="form-control" style="width: 44%">
                                        <option hidden="">Select Degree</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-20">
                                <label for="Degree Name" class="form-control-label col-sm-2 col-xl-1" style="text-align: left;">Interested Program</label>
                                <div class="col-md-10 col-lg-10 col-sm-10  col-xl-11">
                                    <select class="form-control" style="width: 44%">
                                        <option hidden="">Select program</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-50" id="exam-section">
                                <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">GMAT taken?</label>
                                <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                    <select class="form-control ">
                                        <option hidden="">Yes/No</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>

                                <label for="Degree Name" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Score</label>
                                <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                    <input type="text" name="enquiery_date" placeholder="if (yes)" class="form-control ">
                                </div>

                                <label for="Degree Name" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Tenative date</label>
                                <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Select Enquiry Date" aria-label="Username" aria-describedby="basic-addon1">
                                        <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mt-50" id="exam-section">
                                <label for="Degree Name" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">GRE taken?</label>
                                <div class="col-md-2 col-lg-3 col-sm-4  col-xl-3">
                                    <select class="form-control ">
                                        <option hidden="">Yes/No</option>
                                        <option value="1">Yes</option>
                                        <option value="2">No</option>
                                    </select>
                                </div>

                                <label for="Degree Name" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1" >Score</label>
                                <div class="col-md-3 col-lg-2 col-sm-5  col-xl-3">
                                    <input type="text" name="enquiery_date" placeholder="if (yes)" class="form-control ">
                                </div>

                                <label for="Degree Name" class="form-control-label col-md-1 col-sm-3 col-xl-2 col-lg-2">Tenative date</label>
                                <div class="col-md-3 col-lg-2 col-sm-9  col-xl-2">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Select Enquiry Date" aria-label="Username" aria-describedby="basic-addon1">
                                        <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                                    </div>
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
                        </div>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(isset($product_list)) { foreach ($product_list as $product) { ?>
                                        <tr>
                                            <td><?php echo $product->season; ?> </td>
                                            <td><input type="checkbox" data-id="<?php echo $product->product_id; ?>" data-pk="product_id" data-type="tbl_product" class="switch" <?php if($product->is_active=='true'){echo 'checked';} ?>  /></td>
                                            <td><a href="<?php echo base_url('admin/manage_product/'.$product->product_id);?>" class="btn btn-primary" role="button">Manage</a></td>
                                        </tr>
                                    <?php } } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
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
