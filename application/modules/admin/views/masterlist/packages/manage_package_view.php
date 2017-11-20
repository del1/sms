<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.1/css/jquery.fileupload.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.1/css/jquery.fileupload-ui.css" />
<style type="text/css">

.img-responsive{
    display: block;
    max-width: 100%;
    height: auto;
}
.iconWrap{
    position: absolute;
    top: 2px;
    right: 17px;
    color: red;
    height: 25px;
    width: 25px;
    background: rgba(0,0,0, 0.5);
    border-radius: 100%;
    font-size: 17px;
    padding: 0px 8px;   
}
.lefticonWrap{
    position: absolute;
    top: 2px;
    left: 17px;
    color: red;
    height: 25px;
    width: 25px;
    background: rgba(0,0,0, 0.5);
    border-radius: 100%;
    font-size: 17px;
    padding: 0px 8px;   
}

.pullRight{
    float: right;
}
</style>
<div class="page">
    <div class="page-content container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-header">
                    <h1 class="page-title"><?php if(isset($details->package_id)) { echo "Manage Package"; }else{ "Add New Package"; } ?></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/programs'); ?>">Package list</a></li>
                        <li class="breadcrumb-item active"><?php if(isset($details->package_id)) { echo $details->package_name; }else{ echo "Add New Package"; } ?></li>
                    </ol>
                </div>
            </div>
            <!-- start from here -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 mt-20">
                        <?php $arr=array('class'=>"form-horizontal");
                            echo form_open_multipart('admin/add_update_package',$arr); ?>
                            <div class="form-group row">
                                <label for="Package Name" class ="form-control-label col-sm-3 col-xl-2">Package Name</label>
                                <div class="col-sm-9 col-xl-10">
                                    <input required type="text" class="form-control" name="package_name" placeholder="Enter Package Name" value="<?php if(isset($details->package_id) && strlen(trim($details->package_id))) { echo html_escape($details->package_name); } ?>">
                                    <?php if(isset($details->package_id)){ ?>
                                    <input type="hidden" name="package_id" value="<?php echo $details->package_id; ?>">
                                    <?php } ?>
                                </div>
                            </div>

                            <div class=""><!-- col-md-9 offset-md-3 -->
                                <button type="submit" class="btn-primary btn pullRight">
                                    <?php if(isset($details->package_id)){ ?>Update <?php }else { ?>Add New <?php } ?></button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

</script>


