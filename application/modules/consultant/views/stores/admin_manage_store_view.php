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
                    <h1 class="page-title"><?php if(isset($store_details->store_name) && strlen(trim($store_details->store_name))) { echo html_entity_decode($store_details->store_name);}else{ echo "Add New "; } ?> Store</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/stores_list'); ?>">Store List</a></li>
                        <li class="breadcrumb-item active"><?php if(isset($store_details->store_name) && strlen(trim($store_details->store_name))) { echo html_entity_decode($store_details->store_name);}else{ echo "Add New "; } ?> Store</li>
                    </ol>
                </div>
            </div>
            <!-- start from here -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 col md-12 mt-20">
                        <?php $arr=array('class'=>"form-horizontal");
                            echo form_open('admin/add_update_store',$arr); ?>
                            <div class="form-group row">
                                <label for="Store Name" class ="form-control-label col-sm-3">Store Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="store_name" placeholder="Enter Store Name" value="<?php if(isset($store_details->store_name) && strlen(trim($store_details->store_name))) { echo html_escape($store_details->store_name); } ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Email Id" class ="form-control-label col-sm-3">Email Id</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email_id" placeholder="Enter Email adress for store" value="<?php if(isset($store_details->email_id) && strlen(trim($store_details->email_id))) {  echo $store_details->email_id; } ?>"/>
                                    <?php if(isset($store_details->store_id)){ ?>
                                    <input type="hidden" name="store_id" value="<?php echo $store_details->store_id; ?>">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Store City" class ="form-control-label col-sm-3">City</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="city" placeholder="Enter City for store" value="<?php if(isset($store_details->city) && strlen(trim($store_details->city))) { echo html_escape($store_details->city); } ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Store State" class ="form-control-label col-sm-3">State</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="state" placeholder="Enter State for store" value="<?php if(isset($store_details->state) && strlen(trim($store_details->state))) {  echo html_escape($store_details->state); }?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Store Pincode" class ="form-control-label col-sm-3">Pincode</label>
                                <div class="col-sm-8">
                                    <input type="text"  class="form-control" name="pincode"  placeholder="Enter Pincode for store" value="<?php if(isset($store_details->pincode) && strlen(trim($store_details->pincode))) { echo html_escape($store_details->pincode); } ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Store Pincode" class ="form-control-label col-sm-3">Contact Number</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="contact_number" placeholder="Enter Contact Number of store" data-plugin="formatter" data-pattern="([[999]]) [[999]]-[[9999]]" value="<?php if(isset($store_details->contact_number) && strlen(trim($store_details->contact_number))) { echo html_escape($store_details->contact_number); } ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Store Address" class ="form-control-label col-sm-3">Store Address</label>
                                <div class="col-sm-8">
                                    <textarea name="address" placeholder="Add store address" class="form-control" style="height: 102px;"><?php if(isset($store_details->address) && strlen(trim($store_details->address))) {  echo html_escape($store_details->address); } ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Store Address" class ="form-control-label col-sm-3">Store Description</label>
                                <div class="col-sm-8">
                                    <textarea name="store_desc" placeholder="Add store Description" class="form-control" style="height: 102px;"><?php if(isset($store_details->store_desc) && strlen(trim($store_details->store_desc))) {  echo html_escape($store_details->store_desc); }?></textarea>
                                </div>
                            </div>
                            <div class="col-md-9 offset-md-3">
                                <button type="submit" class="btn-primary btn">
                                    <?php if(isset($store_details->store_id)){ ?>Update <?php }else { ?>Add New <?php } ?></button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page