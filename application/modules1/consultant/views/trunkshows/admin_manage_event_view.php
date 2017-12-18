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
                    <h1 class="page-title"><?php if(isset($event_details->event_name) && strlen(trim($event_details->event_name))) { echo html_entity_decode($event_details->event_name);}else{ echo "Add New "; } ?> Event</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/show_stores_list/Events'); ?>">Store List</a></li>
                        <?php if(isset($event_details->store_id)){ ?>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/store_trunkshows_list/'.$event_details->store_id); ?>">Trunk Show Event List</a></li>
                        <?php } ?>
                        <li class="breadcrumb-item active"><?php if(isset($event_details->event_name) && strlen(trim($event_details->event_name))) { echo html_entity_decode($event_details->event_name);}else{ echo "Add New Event"; } ?></li>
                    </ol>
                </div>
            </div>
            <!-- start from here -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 col md-12 mt-20">
                        <?php $arr=array('class'=>"form-horizontal");
                            echo form_open('admin/add_update_events',$arr); ?>
                            <div class="form-group row">
                                <label for="Event Name" class ="form-control-label col-sm-3">Event Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="event_name" placeholder="Enter Event Name" value="<?php if(isset($event_details->event_name) && strlen(trim($event_details->event_name))) { echo html_escape($event_details->event_name); } ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Store Name" class ="form-control-label col-sm-3">Store Name</label>
                                <div class="col-sm-8">
                                    <select class="form-control" for="Select Store" name="store_id">
                                        <?php foreach ($store_list as $store) { ?>
                                            <option <?php if(isset($event_details->store_id) && $event_details->store_id==$store->store_id){ echo "selected"; } ?> value="<?php echo $store->store_id;  ?>"><?php echo $store->store_name;  ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php if(isset($event_details->store_id)){ ?>
                                    <input type="hidden" name="event_id" value="<?php echo $event_details->event_id; ?>">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Event Start Date" class ="form-control-label col-sm-3">Start Date</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="start_date" placeholder="Select Start date" value="<?php if(isset($event_details->start_date) && strlen(trim($event_details->start_date))) { echo html_escape($event_details->start_date); } ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Event End Date" class ="form-control-label col-sm-3">End Date</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="end_date" placeholder="Select End date" value="<?php if(isset($event_details->end_date) && strlen(trim($event_details->end_date))) { echo html_escape($event_details->end_date); } ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Event Description" class ="form-control-label col-sm-3">Event Description</label>
                                <div class="col-sm-8">
                                    <textarea name="event_desc" placeholder="Add Event Description" class="form-control" style="height: 102px;"><?php if(isset($event_details->event_desc) && strlen(trim($event_details->event_desc))) {  echo html_escape($event_details->event_desc); } ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-9 offset-md-3">
                                <button type="submit" class="btn-primary btn">
                                    <?php if(isset($event_details->store_id)){ ?>Update <?php }else { ?>Add New <?php } ?></button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page