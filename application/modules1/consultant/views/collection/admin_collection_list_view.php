<!-- Page -->
<style type="text/css">
    @media (min-width: 768px) and (max-width: 991px){
        
    }
    .btnadd{
        margin-left: 28px;
    }
</style>
<div class="page">
    <div class="page-header">
        <h1 class="page-title"><?php echo $page; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item active">Manage All Assets</li>
        </ol>
    </div>
    <div class="page-content container-fluid">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h3>Collection List</h3>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-right">
                    <a href="<?php echo base_url('admin/all_products/');?>" class="btn btn-primary" role="button">View All Style List</a>
                </div>
            </div>
            <table id="collection_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Collection Number</th>
                        <th>Name</th>
                        <th>Status</th>
                       <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($collection_list as $collection) { ?>
                    <tr>
                        <td><?php echo $collection->collection_id; ?></td>
                        <td><?php echo $collection->collection_name; ?></td>
                        <td><input type="checkbox" data-id="<?php echo $collection->collection_id; ?>" data-pk="collection_id" data-type="ref_coll" class="switch-collection" <?php if($collection->is_active=='true'){echo 'checked';} ?> /></td>
                        <!-- <td><a href="<?php //echo base_url('admin/manage_collection/'.$collection->collection_id);?>" class="btn btn-primary" role="button">Manage</a> -->
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h3>Brands List</h3>
                </div>
            </div>
            <a role="button" href="<?php echo base_url('admin/manage_brand'); ?>" id="add_brand" class="btn btn-primary btnadd">Add Brand</a>
            <table id="brand_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive" >
                <thead>
                    <tr>
                        <th>Brand Number</th>
                        <th>Brand Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($brands_list as $brand) { ?>
                    <tr>
                        <td><?php echo $brand->brand_id; ?></td>
                        <td><?php echo $brand->brand_name; ?></td>
                        <td><input type="checkbox" data-id="<?php echo $brand->brand_id; ?>" data-pk="brand_id" data-type="ref_brand" class="switch-brands" <?php if($brand->is_active=='true'){echo 'checked';} ?> /></td>
                        <td><a  href="<?php echo base_url('admin/manage_brand/'.$brand->brand_id);?>" class="btn btn-primary" role="button">Manage</a></td>
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
        var table=$("#collection_table").DataTable( {
            "order": [[ 0, "asc" ]],
            "bAutoWidth": true,
            stateSave: true,
            responsive: true,
            'info': false,
            "fnDrawCallback": function(e) {
                var elems = Array.prototype.slice.call(document.querySelectorAll('.switch-collection'));
                elems.forEach(function(elem) {
                    if(!elem.hasAttribute("data-switchery")){
                        var switchery = new Switchery(elem,{color: '#3aa99e',secondaryColor: '#FF0000'});    
                    }
                });
            }
        })

        var table1=$("#brand_table").DataTable( {
            "order": [[ 0, "asc" ]],
            "bAutoWidth": true,
            stateSave: true,
            responsive: true,
            "fnDrawCallback": function(e) {
                var elems = Array.prototype.slice.call(document.querySelectorAll('.switch-brands'));
                elems.forEach(function(elem) {
                    if(!elem.hasAttribute("data-switchery")){
                        var switchery = new Switchery(elem,{color: '#3aa99e',secondaryColor: '#FF0000'});    
                    }
                });
            }
        })

/*        $("#brand_table_length").parent().prepend("<div class='col-md-6 col-sm-6 firstcol6'></div><div class='col-md-6 col-sm-6 secondcol6 pull-right'></div>");

        $("#brand_table_length").appendTo('.firstcol6');
        $("#add_brand").appendTo('.secondcol6');*/
        $("#brand_table_length").append($("#add_brand"));
    
    
    $(".switch-collection,.switch-brands").change(function(event) {
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var changeCheckbox = $(this)[0];//target
            var data={is_active:changeCheckbox.checked,pk_id:$(changeCheckbox).data('id'),type:$(changeCheckbox).data('type'),[csrfName]:csrfHash};
            $.post("<?php echo base_url('admin/changeAllStatus') ?>", data, 
                function(data, textStatus, xhr) {
                    console.log(data);
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
    });
</script>