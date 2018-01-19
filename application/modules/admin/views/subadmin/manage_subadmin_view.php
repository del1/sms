<style type="text/css">
textarea {
    resize: none;
}
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
.error{
      border: 1px solid red !important;
    }
.errorText{
  color: red;
  font-weight: 500;
}
</style>
<div class="page">
    <div class="page-content container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-header">
                    <h1 class="page-title"><?php if(isset($user_details->user_name)&& strlen(trim($user_details->user_name))) { echo "Manage Subadmin"; }else{ "Add New SubAdmin"; } ?></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/subadmin'); ?>">Subadmin List</a></li>
                        <li class="breadcrumb-item active">Manage Subadmin</li>
                    </ol>
                </div>
            </div>

            <!-- start from here -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 mt-20">
                    <?php if($this->session->flashdata('error')) { ?>
                        <?php echo $this->session->flashdata('error'); ?>
                    <?php } ?>
                    <?php if($this->session->flashdata('success')) { ?>
                        <p class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></p>
                    <?php } ?>
                        <?php $arr=array('class'=>"form-horizontal");
                            echo form_open('admin/add_update_subadmin',$arr); ?>
                            <div class="form-group row">
                                <label for="Style Number/Name"  class ="form-control-label col-sm-3 col-xl-2">Username</label>
                                <div class="col-sm-9 col-xl-10">
                                    <input type="text" required="" data-id="user_name" data-name="Username" id="username" class="form-control " name="user_name" placeholder="Enter Username for user" value="<?php if(isset($user_details->user_name) && strlen(trim($user_details->user_name))) { echo html_escape($user_details->user_name); }else{ if($this->session->flashdata('setData')){ echo $this->session->flashdata('setData')['user_name']; }  } ?>"/>
                                    <span class="errorText"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="first_name"  class ="form-control-label col-sm-3 col-xl-2">First Name</label>
                                <div class="col-sm-9 col-xl-10">
                                    <input type="text" required="" data-id="user_name" data-name="first_name" id="first_name" class="form-control " name="first_name" placeholder="Enter First name for user" value="<?php if(isset($user_details->first_name) && strlen(trim($user_details->first_name))) { echo html_escape($user_details->first_name); }else{ if($this->session->flashdata('setData')){ echo $this->session->flashdata('setData')['first_name']; }  } ?>"/>
                                    <span class="errorText"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name"  class ="form-control-label col-sm-3 col-xl-2">Last Name</label>
                                <div class="col-sm-9 col-xl-10">
                                    <input type="text" required="" data-id="last_name" data-name="last_name" id="last_name" class="form-control " name="last_name" placeholder="Enter Last name for user" value="<?php if(isset($user_details->last_name) && strlen(trim($user_details->last_name))) { echo html_escape($user_details->last_name); }else{ if($this->session->flashdata('setData')){ echo $this->session->flashdata('setData')['last_name']; }  } ?>"/>
                                    <span class="errorText"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Style Number/Name" class ="form-control-label col-sm-3 col-xl-2">Email Address</label>
                                <div class="col-sm-9 col-xl-10">
                                    <input type="email" required="" data-id="email_id" data-name="Email Address" class="form-control chk" id="email_id" name="email_id" placeholder="Enter Email for user" value="<?php if(isset($user_details->email_id) && strlen(trim($user_details->email_id))) { echo html_escape($user_details->email_id); }else{ if($this->session->flashdata('setData')){ echo $this->session->flashdata('setData')['email_id']; }  } ?>"/>
                                    <span class="errorText"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Style Number/Name" class ="form-control-label col-sm-3 col-xl-2">Phone Number</label>
                                <div class="col-sm-9 col-xl-10">
                                    <input type="number" min="0" minlength=10 class="form-control" name="phonenumber" placeholder="Enter Phone Number of user" value="<?php if(isset($user_details->phonenumber) && strlen(trim($user_details->phonenumber))) { echo html_escape($user_details->phonenumber); }{ if($this->session->flashdata('setData')){ echo $this->session->flashdata('setData')['phonenumber']; }  } ?>"/>
                                    <input type="hidden" name="userlevel_id" value="4">
                                    <input type="hidden" name="user_id" id="user_id" value="<?php if(isset($user_details->user_id) && strlen(trim($user_details->user_id))) { echo html_escape($user_details->user_id); } ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Style Number/Name" class ="form-control-label col-sm-3 col-xl-2">Gender</label>
                                <div class="col-sm-9 col-xl-10 mt-10">
                                    <label class="radio-inline"><input <?php if(isset($user_details->gender_id) && $user_details->gender_id==1) { echo  "checked";}else{ if($this->session->flashdata('setData') && $this->session->flashdata('setData')['gender_id']==1){ echo 'checked'; }  } ?> type="radio" name="gender_id"  value="1"/> Male
                                    </label>
                                    <label class="radio-inline"><input <?php if(isset($user_details->gender_id) && $user_details->gender_id==2) { echo  "checked";}else{ if($this->session->flashdata('setData') && $this->session->flashdata('setData')['gender_id']==2){ echo 'checked'; }  } ?> type="radio" name="gender_id"  value="2"/> Female
                                    </label>
                                </div>
                            </div>
                        
                            <div class=""><!-- col-md-9 offset-md-3 -->
                                <button type="submit" class="btn-primary btn pullRight">
                                    <?php if(isset($user_details->user_id)){ ?>Update <?php }else { ?>Add New <?php } ?></button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $("#username").blur(function(event) {
        //check username changed for its
        //checkemail changed for itself
        var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            //check if valid username here
        if($.trim($(this).val()).length) {
            if(IsValidUsername($(this).val()))
            {
                $(this).removeClass('error');
                $(this).next().empty();
                    //check if username exist
                var ct=$(this);
                var data = {
                    user_id: $("#user_id").val(),
                    user_name: $(this).val(),
                    [csrfName]: csrfHash
                };
                $.post("<?php echo base_url('auth/check_username') ?>", data,
                function(data, textStatus, xhr) {
                    if (data != "not_found") {
                        ct.addClass('error');
                        ct.next().html("This Username is already exist");
                    } else {
                        ct.removeClass('error');
                        ct.next().empty();
                    }
                });
            }else{
                $(this).addClass('error');
                $(this).next().html("Username not valid");
            }
        }
    });

    $("#email_id").blur(function(event) {
        //check email changed for its
        //checkemail changed for itself
        var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            //check if valid username here
        if($.trim($(this).val()).length) {
            if(IsEmail($(this).val()))
            {
                $(this).removeClass('error');
                $(this).next().empty();
                //check if email exist
                var ct=$(this);
                var data = {
                    user_id: $("#user_id").val(),
                    email_id: $(this).val(),
                    [csrfName]: csrfHash
                };
                $.post("<?php echo base_url('auth/check_email') ?>", data,
                function(data, textStatus, xhr) {
                    if (data != "not_found") {
                        ct.addClass('error');
                        ct.next().html("This Email Address is already exist");
                    } else {
                        ct.removeClass('error');
                        ct.next().empty();
                    }
                });
            }else{
                $(this).addClass('error');
                $(this).next().html("Email Address not valid");
            }
        }
    });

    function IsEmail(email) {
                var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                return regex.test(email);
    }

    function IsValidUsername(username){
    var regex = /^[a-zA-Z]+([a-zA-Z0-9])+$/;
        return regex.test(username);
    }
</script>


