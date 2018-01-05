<?php $student_info=$student_info[0]; ?>
<div class="form-group row col-md-6 col-sm-6 col-xl-6 col-6">
    <label for="fname"  class ="form-control-label col-md-4 col-sm-4 col-xl-4 col-4">First Name</label>
    <div class="col-sm-8 col-md-8 col-8 col-xl-8">
        <input type="text" readonly="" id="fname" class="form-control " name="first_name" placeholder="Enter Firstname for user" value="<?php if(isset($student_info->first_name) && strlen(trim($student_info->first_name))) { echo html_escape($student_info->first_name); } ?>"/>
    </div>
</div>
<div class="form-group row col-md-6 col-sm-6 col-xl-6 col-6">
    <label for="lname"  class ="form-control-label col-md-4 col-sm-4 col-xl-4 col-4">Last Name</label>
    <div class="col-sm-8 col-md-8 col-8 col-xl-8">
        <input type="text" readonly="" id="lname" class="form-control " name="last_name" placeholder="Enter Lastname for user" value="<?php if(isset($student_info->last_name) && strlen(trim($student_info->last_name))) { echo html_escape($student_info->last_name); } ?>"/>
    </div>
</div>
<div class="form-group row col-md-6 col-sm-6 col-xl-6 col-6">
    <label for="email_id"  class ="form-control-label col-md-4 col-sm-4 col-xl-4 col-4">Email Address</label>
    <div class="col-sm-8 col-md-8 col-8 col-xl-8">
        <input type="text" readonly="" id="email_id" class="form-control " name="email_id" placeholder="Enter Email Address for user" value="<?php if(isset($student_info->email_id) && strlen(trim($student_info->email_id))) { echo html_escape($student_info->email_id); } ?>"/>
    </div>
</div>

<div class="form-group row col-md-6 col-sm-6 col-xl-6 col-6">
    <label for="signup_date"  class ="form-control-label col-md-4 col-sm-4 col-xl-4 col-4">Signup Date</label>
    <div class="col-sm-8 col-md-8 col-8 col-xl-8">
        <input type="text" readonly="" id="signup_date" class="form-control " name="email_id" placeholder="Enter Email Address for user" value="<?php if(isset($student_info->signup_date) && strlen(trim($student_info->signup_date))) { echo html_escape(date("jS F Y, g:i a", strtotime($student_info->signup_date))); } ?>"/>
        
    </div>
</div>

<div class="form-group row col-md-6 col-sm-6 col-xl-6 col-6">
    <label for="phonenumber"  class ="form-control-label col-md-4 col-sm-4 col-xl-4 col-4">Phone number</label>
    <div class="col-sm-8 col-md-8 col-8 col-xl-8">
        <input type="text" readonly="" id="phonenumber" class="form-control " name="phonenumber" placeholder="Enter Phone number for user" value="<?php if(isset($student_info->phonenumber) && strlen(trim($student_info->phonenumber))) { echo html_escape($student_info->phonenumber); } ?>"/>
    </div>
</div>
<div class="form-group row col-md-6 col-sm-6 col-xl-6 col-6">
    <label for="last_updated"  class ="form-control-label col-md-4 col-sm-4 col-xl-4 col-4">Last Updated</label>
    <div class="col-sm-8 col-md-8 col-8 col-xl-8">
        <input type="text" readonly="" id="last_updated" class="form-control " name="last_updated"  value="<?php if(isset($student_info->last_updated) && strlen(trim($student_info->last_updated))) { echo html_escape(date("jS F Y, g:i a", strtotime($student_info->signup_date))); } ?>"/>
    </div>
</div>
<div class="form-group row col-md-6 col-sm-6 col-xl-6 col-6">
    <label for="country_name"  class ="form-control-label col-md-4 col-sm-4 col-xl-4 col-4">Country</label>
    <div class="col-sm-8 col-md-8 col-8 col-xl-8">
        <input type="text" readonly="" id="country_name" class="form-control " name="country_name"  value="<?php if(isset($student_info->country_name) && strlen(trim($student_info->country_name))) { echo html_escape($student_info->country_name); } ?>"/>
    </div>
</div>
<div class="form-group row col-md-6 col-sm-6 col-xl-6 col-6">
    <label for="state_name"  class ="form-control-label col-md-4 col-sm-4 col-xl-4 col-4">States</label>
    <div class="col-sm-8 col-md-8 col-8 col-xl-8">
        <input type="text" readonly="" id="state_name" class="form-control " name="state_name"  value="<?php if(isset($student_info->state_name) && strlen(trim($student_info->state_name))) { echo html_escape($student_info->state_name); } ?>"/>
    </div>
</div>
<div class="form-group row col-md-6 col-sm-6 col-xl-6 col-6">
    <label for="city_name"  class ="form-control-label col-md-4 col-sm-4 col-xl-4 col-4">City</label>
    <div class="col-sm-8 col-md-8 col-8 col-xl-8">
        <input type="text" readonly="" id="city_name" class="form-control " name="city_name"  value="<?php if(isset($student_info->city_name) && strlen(trim($student_info->city_name))) { echo html_escape($student_info->city_name); } ?>"/>
    </div>
</div>