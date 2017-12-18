<!-- Page -->
<style type="text/css">
    @media (min-width: 768px) and (max-width: 991px){
        
    }
</style>
<div class="page">
    <div class="page-header">
        <h1 class="page-title"><?php echo $page; ?></h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item active"><?php echo $page; ?></li>
        </ol>
    </div>
    <div class="page-content container-fluid">
        <div class="panel-body">
            <table class="table table-hover dataTable table-striped w-full table-bordered table-responsive" data-plugin="dataTable">
            <thead>
              <tr>
                <th>Store Number</th>
                <th>Store Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($store_list as $store) { ?>
                    <tr>
                        <td><?php echo $store->store_id; ?></td>
                        <td><?php echo $store->store_name; ?></td>
                        <td><a href="<?php echo base_url('admin/'.$next_action.'/'.$store->store_id);?>" class="btn btn-primary" role="button">Manage</a></td>
                    </tr>
                <?php } ?>
            </tbody>
          </table>
        </div>
    </div>
</div>
<!-- End Page -->