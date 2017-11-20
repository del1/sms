        <style type="text/css">
            .nav_tab_decor{
                padding: 0px !important;
            }
            .thumbnail{
                    display: block;
                    padding: 4px;
                    margin-bottom: 20px;
                    line-height: 1.42857143;
                    background-color: #fff;
                    border: 1px solid #ddd;
                    border-radius: 4px;
                    -webkit-transition: border .2s ease-in-out;
                    -o-transition: border .2s ease-in-out;
                    transition: border .2s ease-in-out;
            }
        </style>
<style type="text/css">
    textarea {
    resize: none;
}
</style>
<div class="page">
    <div class="page-content container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-header">
                    <h1 class="page-title"><?php if(isset($user_details->store_name) && strlen(trim($user_details->store_name))) { echo html_entity_decode($user_details->store_name);}else{ echo "Add New "; } ?> Store</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/userlist'); ?>">User List</a></li>
                        <li class="breadcrumb-item active"><?php if(isset($user_details->user_name) && strlen(trim($user_details->user_name))) { echo html_entity_decode($user_details->user_name);} ?></li>
                    </ol>
                </div>
            </div>
            <!-- start from here -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                            <div class="thumbnail" >
                                <h4>Profile Picture</h4>
                                <div class="form-group">
                                    <img src="<?php echo base_url('assets/images/profile_pic.png'); ?>" id="photo_base" class="img-thumbnail" >
                                </div>
                            </div>
                    </div>

                    <div class="col-sm-9 col md-9 mt-20">
                        <?php $arr=array('class'=>"form-horizontal");
                            echo form_open('admin/add_update_store',$arr); ?>
                            <div class="form-group row">
                                <label for="First Name" class ="form-control-label col-sm-3">First Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="store_name" placeholder="Enter First Name" value="<?php if(isset($user_details->first_name) && strlen(trim($user_details->first_name))) { echo html_escape($user_details->first_name  ); } ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Last Name" class ="form-control-label col-sm-3">Last Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" value="<?php if(isset($user_details->last_name) && strlen(trim($user_details->last_name))) { echo html_escape($user_details->last_name); } ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Email Id" class ="form-control-label col-sm-3">Email Id</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email_id" placeholder="Enter Email adress for user" value="<?php if(isset($user_details->email_id) && strlen(trim($user_details->email_id))) {  echo $user_details->email_id; } ?>"/>
                                    <?php if(isset($user_details->user_id)){ ?>
                                    <input type="hidden" name="user_id" value="<?php echo $user_details->user_id; ?>">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Signup Date" class ="form-control-label col-sm-3">Sign Up Date</label>
                                <div class="col-sm-8">
                                    <input type="text" disabled class="form-control" name="city" placeholder="Enter City for store" value="<?php if(isset($user_details->signup_date) && strlen(trim($user_details->signup_date))) { echo html_escape(date("jS F Y, g:i a", strtotime($user_details->signup_date))); } ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Last Logged" class ="form-control-label col-sm-3">Last Logged</label>
                                <div class="col-sm-8">
                                    <input type="text" disabled class="form-control" name="city" placeholder="Last Login time" value="<?php if(isset($user_details->last_login) && strlen(trim($user_details->last_login))) { echo html_escape(date("jS F Y, g:i a", strtotime($user_details->last_login))); } ?>"/>
                                </div>
                            </div>

                        <?php echo form_close(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page