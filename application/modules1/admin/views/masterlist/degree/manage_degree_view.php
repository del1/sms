<style type="text/css">
.pullRight{
    float: right;
}
</style>
<div class="page">
    <div class="page-content container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-header">
                    <h1 class="page-title"><?php if(isset($details->degree_id)) { echo "Manage Degree"; }else{ "Add New Degree"; } ?></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/degree/'.$type); ?>"><?php echo $type ?> Degree list</a></li>
                        <li class="breadcrumb-item active"><?php if(isset($details->degree_id)) { echo $details->degree_name; }else{ echo "Add New Degree"; } ?></li>
                    </ol>
                </div>
            </div>
            <!-- start from here -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 mt-20">
                        <?php $arr=array('class'=>"form-horizontal");
                            echo form_open_multipart('admin/add_update_degree',$arr); ?>
                             <?php if(isset($degree_type_id->degree_type_id)){ ?>
                             
                            <div class="form-group row">
                                <label for="Degree Name" class ="form-control-label col-sm-3 col-xl-2"><?php echo $type ?> Degree Name</label>
                                <div class="col-sm-9 col-xl-10">
                                   
                                    <input required type="text" class="form-control" name="degree_name" placeholder="Enter Degree Name" value="<?php if(isset($details->degree_id) && strlen(trim($details->degree_id))) { echo html_escape($details->degree_name); } ?>">
                                    <?php if(isset($details->degree_id)){ ?>
                                        <input type="hidden" name="degree_id" value="<?php echo $details->degree_id; ?>">
                                    <?php } ?>
                                    <input type="hidden" name="degree_type_id" value="<?php echo $degree_type_id->degree_type_id; ?>">
                                    <input type="hidden" name="type" value="<?php echo $type; ?>">
                                   
                                </div>
                            </div>

                            <div class=""><!-- col-md-9 offset-md-3 -->
                                <button type="submit" class="btn-primary btn pullRight">
                                    <?php if(isset($details->degree_id)){ ?>Update <?php }else { ?>Add New <?php } ?></button>
                            </div>
                            <?php }else { ?>
                             <div class="form-group row">
                                <h1>Invalid Request</h1>
                            </div>
                            <?php } ?>
                        <?php echo form_close(); ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>