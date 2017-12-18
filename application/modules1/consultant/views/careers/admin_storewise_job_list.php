<!-- Page -->
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Job List - <?php echo $store_details->store_name; ?> - </h1>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/show_stores_list/Career'); ?>">Store List</a></li>
        <li class="breadcrumb-item active"><?php echo $store_details->store_name; ?> - Manage Jobs</li>
      </ol>
    </div>
    <div class="page-content container">
        <div class="panel-body">
            <a href="<?php echo base_url('admin/manage_job'); ?>" class="btn btn-success">Add New Job</a>
            <table id="career_list_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive" ><!-- data-plugin="dataTable" -->
            <thead>
              <tr>
                <th>Job Id</th>
                <th>Job Title</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($jobs_list as $job) { ?>
                    <tr>
                        <td><?php echo $job->job_id; ?></td>
                        <td><?php echo $job->job_title; ?></td>
                        <td><input type="checkbox" data-id="<?php echo $job->job_id; ?>" class="switch" <?php if($job->is_active=='true'){echo 'checked';} ?>/></td>
                        <td><a href="<?php echo base_url('admin/manage_job/'.$job->job_id);?>" class="btn btn-primary" role="button">Manage</a>
                            <button data-id="<?php echo $job->job_id; ?>" class="btn btn-danger delete_job">Delete</button></td>
                    </tr>
                <?php } ?>
            </tbody>
          </table>
        </div>
    </div>
</div>

<!-- End Page -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        var table=$("#career_list_table").DataTable( {
            "order": [[ 0, "desc" ]],
            stateSave: true,
            responsive: true,
            "fnDrawCallback": function(e) {
                var elems = Array.prototype.slice.call(document.querySelectorAll('.switch'));
                elems.forEach(function(elem) {
                    if(!elem.hasAttribute("data-switchery")){
                        var switchery = new Switchery(elem,{color: '#3aa99e',secondaryColor: '#FF0000'});    
                    }
                });
            }
        });

        $(".switch").change(function(event) {
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var changeCheckbox = $(this)[0];//target
            var data={is_active:changeCheckbox.checked,job_id:$(changeCheckbox).data('id'),[csrfName]:csrfHash};
            $.post("<?php echo base_url('admin/changeJobStatus') ?>", data, 
                function(data, textStatus, xhr) {
                    console.log(data);
                    if(changeCheckbox.checked)
                    {
                        toastr_type="success";
                        str="Job Activated successfully";
                    }else{
                        toastr_type="warning";
                        str="Job Deactivated successfully";
                    }
                    toastr.options = {
                      "closeButton": true
                    }
                    toastr[toastr_type](str);
            });
        });
        $(".delete_job").click(function(event){
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var row = table.row($(this).parents('tr'));
            data={[csrfName]:csrfHash,job_id:$(this).data('id'),is_secure_request:'uKrt)6'};
             bootbox.confirm({
                message: "Are you Sure, You want to delete this job?",
                callback: function (result) {
                    if(result==true)
                    {
                        $.post("<?php echo base_url('admin/delete_job') ?>", data, 
                            function(data, textStatus, xhr) {
                                row.remove().draw();
                                toastr.success("Job was successfully deleted");
                        });
                    }
                }
            })
        });
    });
</script>