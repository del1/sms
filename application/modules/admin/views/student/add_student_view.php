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
                <div class="row row-lg">
                    <div class="col-md-4 col-lg-4 col-sm-4">
                        <h4 class="example-title">Select enquiry agent</h4>
                        <select class="form-control round">
                            <option>1</option>
                            <option>1</option>
                            <option>1</option>
                        </select>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4">
                        <h4 class="example-title">Select enquiry date</h4>
                        <select class="form-control round">
                            <option>1</option>
                            <option>1</option>
                            <option>1</option>
                        </select>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-4">
                        <h4 class="example-title">Select Source</h4>
                        <select class="form-control round">
                            <option>1</option>
                            <option>1</option>
                            <option>1</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>






            <a href="<?php echo base_url('admin/student/add'); ?>" id="manage_product" class="btn btn-success btnadd">Add Student</a>
            <table id="store_list_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive" ><!-- data-plugin="dataTable" -->
            <thead>
              <tr>
                <th>Expiary date</th>
                <th>Student name</th>
                <th>Email Id</th>
                <th>Phone number</th>
                <th>Profile Details</th>
                <th>Convert to Customer</th>
              </tr>
            </thead>
            <tbody>
                <?php if(isset($product_list)) { foreach ($product_list as $product) { ?>
                    <tr>
                        <td><?php echo $product->product_name; ?></td>
                        <td><?php echo $product->collection_name; ?></td>
                        <td><?php echo $product->brand_name; ?> </td>
                        <td><?php echo $product->season; ?> </td>
                        <td><input type="checkbox" data-id="<?php echo $product->product_id; ?>" data-pk="product_id" data-type="tbl_product" class="switch" <?php if($product->is_active=='true'){echo 'checked';} ?>  /></td>
                        <td><a href="<?php echo base_url('admin/manage_product/'.$product->product_id);?>" class="btn btn-primary" role="button">Manage</a>
                    </tr>
                <?php } } ?>
            </tbody>
          </table>
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
