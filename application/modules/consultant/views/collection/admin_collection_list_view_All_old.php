<!-- Page -->
<style type="text/css">
    @media (min-width: 768px) and (max-width: 991px){
        
    }
</style>
<!-- 
    //collection  - -
    //brands  - -
    //catagory 
    //seasons
 -->
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
            <h3>Collection List</h3>
            <table id="collection_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive" data-plugin="dataTable">
                <thead>
                    <tr>
                        <th>Collection Number</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($collection_list as $collection) { ?>
                    <tr>
                        <td><?php echo $collection->collection_id; ?></td>
                        <td><?php echo $collection->collection_name; ?></td>
                        <td><input type="checkbox" data-id="<?php echo $collection->collection_id; ?>" data-pk="collection_id" data-type="ref_coll" class="switch" <?php if($collection->is_active=='true'){echo 'checked';} ?>  data-plugin="switchery" data-color="#3aa99e"/></td>
                        <td><a href="javascrit:void(0)" href1="<?php echo base_url('admin/manage_collection/'.$collection->collection_id);?>" class="btn btn-primary" role="button">Manage</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>


            <h3>Brands List</h3>
            <table id="brand_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive" data-plugin="dataTable">
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
                        <td><input type="checkbox" data-id="<?php echo $brand->brand_id; ?>" data-pk="brand_id" data-type="ref_brand" class="switch" <?php if($brand->is_active=='true'){echo 'checked';} ?>  data-plugin="switchery" data-color="#3aa99e"/></td>
                        <td><a href="javascrit:void(0)" href1="<?php echo base_url('admin/manage_brand/'.$brand->brand_id);?>" class="btn btn-primary" role="button">Manage</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>


            <h3>Catagory List</h3>
            <table id="catagory_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive" data-plugin="dataTable">
                <thead>
                    <tr>
                        <th>Catagory Number</th>
                        <th>Catagory Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($catagory_list as $catagory) { ?>
                    <tr>
                        <td><?php echo $catagory->cat_id; ?></td>
                        <td><?php echo $catagory->cat_name; ?></td>
                        <td><input type="checkbox" data-id="<?php echo $catagory->cat_id; ?>" data-pk="cat_id" data-type="ref_cat" class="switch" <?php if($catagory->is_active=='true'){echo 'checked';} ?>  data-plugin="switchery" data-color="#3aa99e"/></td>
                        <td><a href="javascrit:void(0)" href1="<?php echo base_url('admin/manage_catagory/'.$catagory->cat_id);?>" class="btn btn-primary" role="button">Manage</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>


            <h3>Season List</h3>
            <table  id="season_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive" data-plugin="dataTable">
                <thead>
                    <tr>
                        <th>Season Number</th>
                        <th>Season Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($season_list as $season) { ?>
                    <tr>
                        <td><?php echo $season->season_id; ?></td>
                        <td><?php echo $season->season; ?></td>
                        <td><input type="checkbox" data-id="<?php echo $season->season_id; ?>" data-pk="season_id" data-type="ref_season" class="switch" <?php if($season->is_active=='true'){echo 'checked';} ?>  data-plugin="switchery" data-color="#3aa99e"/></td>
                        <td><a href="javascrit:void(0)" href1="<?php echo base_url('admin/manage_season/'.$season->season_id);?>" class="btn btn-primary" role="button">Manage</a></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End Page -->
<script type="text/javascript">
        var table=$("#store_list_table").DataTable( {
            "order": [[ 0, "asc" ]],
            stateSave: true,
            responsive: true,
        });
        $(".switch").change(function(event) {
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
</script>