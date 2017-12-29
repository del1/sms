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
                            <h4 class="example-title">Select enquiry agent</h4>
                            <select class="form-control" name="agent_id">
                                <option hidden>Select Agent</option>
                                <?php foreach ($agent_list as $key => $value) { ?>
                                <option value="<?php echo $value->user_id; ?>"><?php echo $value->user_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4">
                            <h4 class="example-title">Select enquiry date</h4>
                            <div class="input-group">
                                <input type="text" id="enq_date" name="enq_date" class="form-control" placeholder="Select Enquiry Date">
                                <span class="input-group-addon" id="basic-addon1"><i class="icon ml-calendar" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4">
                            <h4 class="example-title">Select Source</h4>
                            <select class="form-control" name="source_id">
                                <option hidden>Select Source</option>
                                <?php foreach ($source_list as $key => $value) { ?>
                                <option value="<?php echo $value->source_id; ?>"><?php echo $value->source_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-4 col-xl-4 mt-20">
                            <h4 class="example-title">Type of lead</h4>
                            <select class="form-control" name="lead_type_id">
                                <option hidden>Select Lead Types</option>
                                <?php foreach ($lead_types as $key => $value) { ?>
                                <option value="<?php echo $value->lead_type_id; ?>"><?php echo $value->lead_type; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row row-lg mt-50">
                        <div class="col-sm-12 col-md-12 mt-20">
                            <h3 class="example-title ">Personal Details</h3>
                            <div class="form-group row">
                                <label for="fname" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">First name</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                    <input type="text" id="fname" placeholder="Enter student first name" name="first_name" class="form-control ">
                                </div>
                                <label for="lname" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Last name</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                    <input type="text" id="lname" placeholder="Enter student last name" name="last_name" class="form-control ">
                                </div>
                            </div>

                            <div class="form-group row mt-20">
                                <label for="email_id" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Email Id</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                    <input type="email" placeholder="Enter Email Id of student" id="email_id" name="email_id" class="form-control ">
                                </div>
                                <label for="phonenumber" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Phone number</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                    <input type="number" placeholder="Enter Phone Number of student" id="phonenumber" min="0" minlength="10" name="phonenumber" class="form-control ">
                                </div>
                            </div>

                            <div class="form-group row mt-20">
                                <label for="resideing_state" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Residing State</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                    <select id="resideing_state" data-plugin="select2" class="form-control" name="resident_state_id">
                                        <option hidden="">Select State</option>
                                        <?php foreach ($county_list as $county) { ?>
                                            <option value="<?php echo $county->country_id;  ?>"><?php echo $county->country_name;  ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <label for="resident_city" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2"  style="text-align: left;">Residing City</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                    <select id="resident_city" name="resident_city_id" class="form-control ">
                                        <option hidden="">Select City</option>
                                    </select>
                                </div>
                            </div>

                            <h3 class="example-title mt-50">Professional Details</h3>
                            <div class="form-group row">
                                <label for="intro" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Intro</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                    <textarea name="intro" id="intro" class="form-control" name="intro"></textarea>
                                </div>
                                <label for="total_experience" class="form-control-label col-md-2 col-sm-2 col-xl-1 col-lg-2" style="text-align: left;">Total Experience</label>
                                <div class="col-md-4 col-lg-4 col-sm-4  col-xl-5">
                                    <select data-plugin="select2" id="total_experience" name="total_experience" class="form-control ">
                                        <option hidden="">Select Experience</option>
                                        <?php for ($i=0; $i < 31 ; $i++) {  ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-20">
                                <label for="ugrad_degree" class="form-control-label col-sm-2 col-xl-1" style="text-align: left;">Undergraduate degree</label>
                                <div class="col-md-10 col-lg-10 col-sm-10  col-xl-11">
                                    <select data-plugin="select2" id="ugrad_degree" name="" class="form-control" style="width: 44%">
                                        <option hidden>Select Lead Types</option>
                                        <?php foreach ($ug_degree_list as $key => $value) { ?>
                                        <option value="<?php echo $value->degree_id; ?>"><?php echo $value->degree_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mt-20">
                                <label for="intrested_program" class="form-control-label col-sm-2 col-xl-1" style="text-align: left;">Interested Program</label>
                                <div class="col-md-10 col-lg-10 col-sm-10  col-xl-11">
                                    <select data-plugin="select2" id="intrested_program" name="interested_program_id" class="form-control" style="width: 44%">
                                        <option hidden>Select Interested Program</option>
                                        <?php foreach ($program_list as $key => $value) { ?>
                                        <option value="<?php echo $value->program_id; ?>"><?php echo $value->program_name; ?></option>
                                        <?php } ?>
                                    </select>
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

                            <div class="form-group row mt-20" >
                                <div class="col-md-6 col-lg-6 col-sm-6  col-xl-6 col-6">
                                    <button type="submit" class="btn btn-success float-right">Save</button>
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
                <?php echo form_close(); ?>
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

    

        $("#enq_date").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minDate: moment(),
            locale: {
                format: 'YYYY-MM-DD'
          } ,
        }, function (startDate, endDate, period) {
            //$(this).val(startDate.format('L') + ' – ' + endDate.format('L'))
        });

        $("#gmat_tenative_date").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minDate: moment(),
            locale: {
                format: 'YYYY-MM-DD'
            } ,
        });
        $("#gre_tenative_date").daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            minDate: moment(),
            locale: {
                format: 'YYYY-MM-DD'
            }
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

    });
</script>
