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
                    <h1 class="page-title"><?php if(isset($job_details->store_name) && strlen(trim($job_details->store_name))) { echo html_entity_decode($job_details->store_name);}else{ echo "Add New "; } ?> Store</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/show_stores_list/Career'); ?>">Store List</a></li>
                        <?php if(isset($job_details->store_id)){ ?>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/Store_jobs_list/'.$job_details->store_id); ?>">Jobs List</a></li>
                        <?php } ?>
                        <li class="breadcrumb-item active"><?php if(isset($job_details->job_title) && strlen(trim($job_details->job_title))) { echo html_entity_decode($job_details->job_title);}else{ echo "Add New Job"; } ?> </li>
                    </ol>
                </div>
            </div>
            <!-- start from here -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 col md-12 mt-20">
                        <?php $arr=array('class'=>"form-horizontal");
                            echo form_open('admin/add_update_job',$arr); ?>
                            <div class="form-group row">
                                <label for="Job Title" class ="form-control-label col-sm-3">Job Title</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="job_title" placeholder="Enter Job Title" value="<?php if(isset($job_details->job_title) && strlen(trim($job_details->job_title))) { echo html_escape($job_details->job_title); } ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Store Name" class ="form-control-label col-sm-3">Store Name</label>
                                <div class="col-sm-8">
                                    <select class="form-control" for="Select Store" name="store_id">
                                        <?php foreach ($store_list as $store) { ?>
                                            <option <?php if(isset($job_details->store_id) && $job_details->store_id==$store->store_id){ echo "selected"; } ?> value="<?php echo $store->store_id;  ?>"><?php echo $store->store_name;  ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Job Description" class ="form-control-label col-sm-3">Job Description</label>
                                <div class="col-sm-8">
                                    <textarea name="job_desc" placeholder="Add Job Description" class="form-control" style="height: 102px;"><?php if(isset($job_details->job_desc) && strlen(trim($job_details->job_desc))) {  echo html_escape($job_details->job_desc); } ?></textarea>
                                    <?php if(isset($job_details->job_id)){ ?>
                                    <input type="hidden" name="job_id" value="<?php echo $job_details->job_id; ?>">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Job Responsibility" class ="form-control-label col-sm-3">Job Responsibility</label>
                                <div class="col-sm-8">
                                    <textarea name="job_responsibility" placeholder="Add Job Responsibility" class="form-control" style="height: 102px;"><?php if(isset($job_details->job_responsibility) && strlen(trim($job_details->job_responsibility))) {  echo html_escape($job_details->job_responsibility); } ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Job Requirements" class ="form-control-label col-sm-3">Job Requirements</label>
                                <div class="col-sm-8">
                                    <textarea name="job_requirements" placeholder="Add Job Requirements" class="form-control" style="height: 102px;"><?php if(isset($job_details->job_requirements) && strlen(trim($job_details->job_requirements))) {  echo html_escape($job_details->job_requirements); } ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Job Benifit" class ="form-control-label col-sm-3">Job Benifit</label>
                                <div class="col-sm-8">
                                    <textarea name="job_benifit" placeholder="Add Job Benifit" class="form-control" style="height: 102px;"><?php if(isset($job_details->job_benifit) && strlen(trim($job_details->job_benifit))) {  echo html_escape($job_details->job_benifit); } ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-9 offset-md-3">
                                <button type="submit" class="btn-primary btn">
                                    <?php if(isset($job_details->job_id)){ ?>Update <?php }else { ?>Add New <?php } ?></button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page