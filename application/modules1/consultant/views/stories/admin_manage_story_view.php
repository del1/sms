<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.1/css/jquery.fileupload.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.1/css/jquery.fileupload-ui.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.19.1/moment.min.js"></script>
<!-- Include Date Range Picker -->
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
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
.pullRight{
    float: right;
}
</style>
<div class="page">
    <div class="page-content container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-header">
                    <h1 class="page-title"><?php if(isset($story_details->story_id)&& strlen(trim($story_details->story_id))) { echo "Manage Story"; }else{ "Add New Story"; } ?></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Stories_list'); ?>">Stories List</a></li>
                        <li class="breadcrumb-item active"><?php if(isset($story_details->story_id)&& strlen(trim($story_details->story_id))) { echo $story_details->email; }else{ echo "Add New Story"; } ?></li>
                    </ol>
                </div>
            </div>

            <!-- start from here -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 mt-20">
                        <?php $arr=array('class'=>"form-horizontal");
                            echo form_open_multipart('admin/add_update_story',$arr); ?>
                            <div class="form-group row">
                                <label for="Bride Name" class ="form-control-label col-sm-3 col-xl-2">Bride First Name</label>
                                <div class="col-sm-9 col-xl-10">
                                    <input type="text" class="form-control" name="b_fname" placeholder="Bride First Name" value="<?php if(isset($story_details->b_fname) && strlen(trim($story_details->b_fname))) { echo html_escape($story_details->b_fname); } ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Groom name " class ="form-control-label col-sm-3 col-xl-2">Groom First Name</label>
                                <div class="col-sm-9 col-xl-10">
                                    <input type="text" class="form-control" name="g_fname" placeholder="Groom First Name" value="<?php if(isset($story_details->g_fname) && strlen(trim($story_details->g_fname))) { echo html_escape($story_details->g_fname); } ?>"/>
                                    <?php if(isset($story_details->story_id)){ ?>
                                    <input type="hidden" name="story_id" value="<?php echo $story_details->story_id; ?>">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Email" class ="form-control-label col-sm-3 col-xl-2">Email</label>
                                <div class="col-sm-9 col-xl-10">
                                   <input type="text" class="form-control" name="email" placeholder="Email Id" value="<?php if(isset($story_details->email) && strlen(trim($story_details->email))) { echo html_escape($story_details->email); } ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Select style" class ="form-control-label col-sm-3 col-xl-2">Dress style</label>
                                <div class="col-sm-9 col-xl-10">
                                    <input type="text" class="form-control" name="style" placeholder="Style Number" value="<?php if(isset($story_details->style) && strlen(trim($story_details->style))) { echo html_escape($story_details->style); } ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Select Wedding Day" class ="form-control-label col-sm-3 col-xl-2">Select Wedding Day</label>
                                <div class="col-sm-9 col-xl-10">
                                    <input type="text" class="form-control" id="wedding-day" name="wedding_day" placeholder="Select Wedding Day"  value="<?php if(isset($story_details->wedding_day) && strlen(trim($story_details->wedding_day))) { echo html_escape($story_details->wedding_day); } ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Brand" class ="form-control-label col-sm-3 col-xl-2">Select store for purchase</label>
                                <div class="col-sm-9 col-xl-10">
                                    <select class="form-control"  for="Brand" name="purchased_from_store">
                                        <?php foreach ($store_list as $store) { ?>
                                            <option <?php if(isset($story_details->purchased_from_store) && $story_details->purchased_from_store==$store->store_id){ echo "selected"; } ?> value="<?php echo $store->store_id;  ?>"><?php echo $store->store_name;  ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Wedding story discription" class ="form-control-label col-sm-3 col-xl-2">Product Description</label>
                                <div class="col-sm-9 col-xl-10">
                                    <textarea name="weddingstory_desc" placeholder="Add Wedding Description" class="form-control" style="height: 102px;"><?php if(isset($story_details->weddingstory_desc) && strlen(trim($story_details->weddingstory_desc))) {  echo html_escape($story_details->weddingstory_desc); } ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="select service" class ="form-control-label col-sm-3 col-xl-2">Select Service</label>
                                <div class="col-sm-9 col-xl-10">
                                    <select class="form-control"  for="Brand" name="service_id">
                                        <option hidden disabled="">Select Service</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="service name" class ="form-control-label col-sm-3 col-xl-2">Service name</label>
                                <div class="col-sm-9 col-xl-10">
                                    <input type="text" class="form-control" name="service_name" placeholder="Enter service name"  value="<?php if(isset($story_details->service_name) && strlen(trim($story_details->service_name))) { echo html_escape($story_details->service_name); } ?>"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="service Url" class ="form-control-label col-sm-3 col-xl-2">Service Url</label>
                                <div class="col-sm-9 col-xl-10">
                                    <input type="text" class="form-control" name="service_website" placeholder="Enter service Url"  value="<?php if(isset($story_details->service_website) && strlen(trim($story_details->service_website))) { echo html_escape($story_details->service_website); } ?>"/>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Story Images" class ="form-control-label col-sm-3 col-xl-2">Upload Style Images</label>
                                <div class="col-sm-9 col-xl-10">
                                    <span class="btn btn-sm btn-success fileinput-button">
                                    <i class="fa fa-plus"></i>
                                    <span>Add files...</span>
                                    <input id="uploadImage" type="file" accept="image/x-png,image/gif,image/jpeg" name="userfile[]" multiple>
                                </span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <img src="https://res.cloudinary.com/cmsakoreorg/image/upload/v1509129744/gr8ob50v4ce1wmqajyok.jpg" class="img-responsive">
                                    <div class="icondemo iconWrap">
                                        <span class="icon wb-close-mini"></span>
                                    </div>
                                    
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://res.cloudinary.com/cmsakoreorg/image/upload/v1509129744/gr8ob50v4ce1wmqajyok.jpg" class="img-responsive">
                                    <div class="icondemo iconWrap">
                                        <span class="icon wb-close-mini"></span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://res.cloudinary.com/cmsakoreorg/image/upload/v1509129744/gr8ob50v4ce1wmqajyok.jpg" class="img-responsive">
                                    <div class="icondemo iconWrap">
                                        <span class="icon wb-close-mini"></span>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <img src="https://res.cloudinary.com/cmsakoreorg/image/upload/v1509129744/gr8ob50v4ce1wmqajyok.jpg" class="img-responsive">
                                    <div class="icondemo iconWrap">
                                        <span class="icon wb-close-mini"></span>
                                    </div>
                                </div>
                            </div>
                            <div class=""><!-- col-md-9 offset-md-3 -->
                                <button type="submit" class="btn-primary btn pullRight">
                                    <?php if(isset($story_details->story_id)){ ?>Update <?php }else { ?>Add New <?php } ?></button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
jQuery(document).ready(function($) {
     $("#wedding-day").daterangepicker({
      singleDatePicker: true,
      showDropdowns: true,
      locale: {
        format: 'YYYY-MM-DD'
      },
    }, function (startDate, endDate, period) {
      $(this).val(startDate.format('L') + ' – ' + endDate.format('L'))
    });
});
 </script>

