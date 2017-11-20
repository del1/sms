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
                    <h1 class="page-title"><?php if(isset($details->college_id)) { echo "Manage College"; }else{ "Add New College"; } ?></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/colleges/'.$type); ?>"><?php echo $type ?> College list</a></li>
                        <li class="breadcrumb-item active"><?php if(isset($details->college_id)) { echo $details->college_name; }else{ echo "Add New College"; } ?></li>
                    </ol>
                </div>
            </div>
            <!-- start from here -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 mt-20">
                        <?php $arr=array('class'=>"form-horizontal");
                            echo form_open_multipart('admin/add_update_college',$arr); ?>
                             <?php if(isset($college_type_id->college_type_id)){ ?>
                             <div class="form-group row">
                                 <label for="Select University " class ="form-control-label col-sm-3 col-xl-2">Select University</label>
                                 <div class="col-sm-9 col-xl-10"> 
                                    <select class="form-control" data-plugin="select2" for="University" name="university_id">
                                        <?php foreach ($universities_list as $University) { ?>
                                            <option <?php if(isset($details->university_id) && $details->university_id==$University->university_id){ echo "selected"; } ?> value="<?php echo $University->university_id;  ?>"><?php echo $University->university_name;  ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="College Name" class ="form-control-label col-sm-3 col-xl-2"><?php echo $type ?> College Name</label>
                                <div class="col-sm-9 col-xl-10">
                                   
                                    <input required type="text" class="form-control" name="college_name" placeholder="Enter College Name" value="<?php if(isset($details->college_id) && strlen(trim($details->college_id))) { echo html_escape($details->college_name); } ?>">
                                    <?php if(isset($details->college_id)){ ?>
                                        <input type="hidden" name="college_id" value="<?php echo $details->college_id; ?>">
                                    <?php } ?>
                                    <input type="hidden" name="college_type_id" value="<?php echo $college_type_id->college_type_id; ?>">
                                    <input type="hidden" name="type" value="<?php echo $type; ?>">
                                   
                                </div>
                            </div>

                            <div class=""><!-- col-md-9 offset-md-3 -->
                                <button type="submit" class="btn-primary btn pullRight">
                                    <?php if(isset($details->college_id)){ ?>Update <?php }else { ?>Add New <?php } ?></button>
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