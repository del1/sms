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
                    <h1 class="page-title"><?php if(isset($details->user_id)) { echo "Manage Consultant"; }else{ echo "Add New Consultant"; } ?></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/consultants'); ?>">Consultants list</a></li>
                        <li class="breadcrumb-item active"><?php if(isset($details->user_id)) { echo $details->first_name." ".$details->last_name; }else{ echo "Add New Consultant"; } ?></li>
                    </ol>
                </div>
            </div>
            <!-- start from here -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 mt-20">
                        <?php $arr=array('class'=>"form-horizontal");
                            echo form_open_multipart('admin/add_update_consultant',$arr); ?>
                            <div class="form-group row">
                                <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-12">
                                    <label for="fname" class ="form-control-label">First Name</label>
                                    <input id="fname" required type="text" class="form-control" name="first_name" placeholder="Enter First Name" value="<?php if(isset($details->first_name) && strlen(trim($details->first_name))) { echo html_escape($details->first_name); } ?>">
                                    <?php if(isset($details->user_id)){ ?>
                                    <input type="hidden" name="user_id" value="<?php echo $details->user_id; ?>">
                                    <?php } ?>
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-12">
                                    <label for="lname" class ="form-control-label">Last Name</label>
                                    <input id="lname" required type="text" class="form-control" name="last_name" placeholder="Enter Last Name" value="<?php if(isset($details->last_name) && strlen(trim($details->last_name))) { echo html_escape($details->last_name); } ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-12">
                                    <label for="email" class ="form-control-label">Email Address</label>
                                    <input id="email" required type="text" class="form-control" name="email_id" placeholder="Enter Email Address" value="<?php if(isset($details->email_id) && strlen(trim($details->email_id))) { echo html_escape($details->email_id); } ?>">
                                </div>
                                <div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-12">
                                    <label for="phonenumber" class ="form-control-label">Phone Number</label>
                                    <input id="phonenumber" required type="text" class="form-control" name="phonenumber" placeholder="Enter Phone Number" value="<?php if(isset($details->phonenumber) && strlen(trim($details->phonenumber))) { echo html_escape($details->phonenumber); } ?>">
                                </div>
                            </div>

                            <div class=""><!-- col-md-9 offset-md-3 -->
                                <button type="submit" class="btn-primary btn pullRight">
                                    <?php if(isset($details->user_id)){ ?>Update <?php }else { ?>Add New <?php } ?></button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>