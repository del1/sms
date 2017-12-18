<!-- Page -->
<style type="text/css">
    .btnleft{
        margin-left: 28px;
    }
    .btnright{
        margin-right: 28px;
    }
</style>
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Store List</h1>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
        <li class="breadcrumb-item active">Store List</li>
      </ol>
    </div>
    <div class="page-content container">
        <div class="panel-body">
            <a href="<?php echo base_url('admin/manage_store'); ?>" id="add_store" class="btn btn-success btnleft">Add Store</a>
            <table id="store_list_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive" ><!-- data-plugin="dataTable" -->
            <thead>
              <tr>
                <th>Store Id</th>
                <th>Name</th>
                <th>City</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($store_list as $store) { ?>
                    <tr>
                        <td><?php echo $store->store_id; ?></td>
                        <td><?php echo $store->store_name; ?></td>
                        <td><?php echo $store->city; ?> </td>
                        <td><input type="checkbox" data-id="<?php echo $store->store_id; ?>" class="switch" <?php if($store->is_active=='true'){echo 'checked';} ?> /></td>
                        <td><a href="<?php echo base_url('admin/manage_store/'.$store->store_id);?>" class="btn btn-primary" role="button">Manage</a>
                            <button data-id="<?php echo $store->store_id; ?>" class="btn btn-danger delete_store">Delete</button></td>
                    </tr>
                <?php } ?>
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
        });
        $("#store_list_table_length").append($("#add_store"));

        $(".switch").change(function(event) {
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var changeCheckbox = $(this)[0];//target
            var data={is_active:changeCheckbox.checked,store_id:$(changeCheckbox).data('id'),[csrfName]:csrfHash};
            $.post("<?php echo base_url('admin/changeStoreStatus') ?>", data, 
                function(data, textStatus, xhr) {
                    if(changeCheckbox.checked)
                    {
                        toastr_type="success";
                        str="Store Activated successfully";
                    }else{
                        toastr_type="warning";
                        str="Store Deactivated successfully";
                    }
                    toastr.options = {
                      "closeButton": true
                    }
                    toastr[toastr_type](str);
            });
        });
        $(".delete_store").click(function(event){
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var row = table.row($(this).parents('tr'));
            data={[csrfName]:csrfHash,store_id:$(this).data('id'),is_secure_request:'uKrt)6'};
             bootbox.confirm({
                message: "Are you Sure, You want to delete this store?",
                callback: function (result) {
                    if(result==true)
                    {
                        $.post("<?php echo base_url('admin/delete_stores') ?>", data, 
                            function(data, textStatus, xhr) {
                                row.remove().draw();
                                toastr.success("Store was successfully deleted");
                        });
                    }
                }
            })
        });
    });
</script>