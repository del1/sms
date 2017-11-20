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
                    <h1 class="page-title"><?php if(isset($details->university_id)) { echo "Manage University"; }else{ "Add New University"; } ?></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/universities'); ?>">University list</a></li>
                        <li class="breadcrumb-item active"><?php if(isset($details->university_id)) { echo $details->university_name; }else{ echo "Add New University"; } ?></li>
                    </ol>
                </div>
            </div>
            <!-- start from here -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 mt-20">
                        <?php $arr=array('class'=>"form-horizontal");
                            echo form_open_multipart('admin/add_update_university',$arr); ?>
                            <div class="form-group row">
                                <label for="University Name" class ="form-control-label col-sm-3 col-xl-2">University Name</label>
                                <div class="col-sm-9 col-xl-10">
                                    <input required type="text" class="form-control" name="university_name" placeholder="Enter University Name" value="<?php if(isset($details->university_id) && strlen(trim($details->university_id))) { echo html_escape($details->university_name); } ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Collection " class ="form-control-label col-sm-3 col-xl-2">Select Country</label>
                                <div class="col-sm-9 col-xl-10"> 
                                    <select class="form-control" data-plugin="select2" for="Country" name="country_id">
                                        <?php foreach ($county_list as $county) { ?>
                                            <option <?php if(isset($details->country_id) && $details->country_id==$county->country_id){ echo "selected"; } ?> value="<?php echo $county->country_id;  ?>"><?php echo $county->country_name;  ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php if(isset($details->university_id)){ ?>
                                    <input type="hidden" name="university_id" value="<?php echo $details->university_id; ?>">
                                    <?php } ?>
                                </div>
                            </div>

                            <div class=""><!-- col-md-9 offset-md-3 -->
                                <button type="submit" class="btn-primary btn pullRight">
                                    <?php if(isset($details->university_id)){ ?>Update <?php }else { ?>Add New <?php } ?></button>
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


