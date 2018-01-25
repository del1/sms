<!-- Page -->
<style type="text/css">
    .btnadd{
        margin-left: 28px;
    }
    .btnright{
        margin-right: 28px;
    }
    .shadow{
        box-shadow: 0 10px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19) !important;
    }
</style>
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Follow Up Updates</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item active">Follow Up Updates</li>
        </ol>
    </div>
    <div class="page-content container-fluid">
        <div class="panel-body">
            <?php if($this->session->flashdata('error')) { ?>
                <?php echo $this->session->flashdata('error'); ?>
            <?php } ?>
            <?php if($this->session->flashdata('success')) { ?>
                <p class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></p>
            <?php } ?>
            <table id="university_list" class="table table-hover dataTable table-striped w-full table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Enquiry Date</th>
                        <th>Student Name</th>
                        <th>View Details</th>
                        <th>Status</th>
                        <th>Followed Up</th>
                    </tr>
                </thead>
                <tbody>
                
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- End Page -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
        var table=$("#university_list").DataTable( {
            "order": [[ 0, "asc" ]],
            "bAutoWidth": true,
            stateSave: true,
            responsive: true,
            'info': false,
            "fnDrawCallback": function(e) {
                var elems = Array.prototype.slice.call(document.querySelectorAll('.switch'));
                elems.forEach(function(elem) {
                    if(!elem.hasAttribute("data-switchery")){
                        var switchery = new Switchery(elem,{color: '#3aa99e',secondaryColor: '#FF0000'});    
                    }
                });
            }
        })

    $("#university_list_length").append($("#add_university"));
    
    
    $(".switch").change(function(event) {
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var changeCheckbox = $(this)[0];//target
            var data={is_active:changeCheckbox.checked,pk_id:$(changeCheckbox).data('id'),type:$(changeCheckbox).data('type'),[csrfName]:csrfHash};
            $.post("<?php echo base_url('admin/changeAllStatus') ?>", data, 
                function(data, textStatus, xhr) {
                    if(changeCheckbox.checked)
                    {
                        toastr_type="success";
                        str="User Login Enabled";
                    }else{
                        toastr_type="warning";
                        str="User Login Disabled";
                    }
                    toastr.options = {
                      "closeButton": true
                    }
                    toastr[toastr_type](str);
            });
        });


        $(".delete").click(function(event){
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var row = table.row($(this).parents('tr'));
            data={[csrfName]:csrfHash,pk_id:$(this).data('id'),type:$(this).data('type'),is_secure_request:'uKrt)6'};
             bootbox.confirm({
                message: "Are you Sure, You want to delete this record?",
                callback: function (result) {
                    if(result==true)
                    {
                        $.post("<?php echo base_url('admin/delete') ?>", data, 
                            function(data, textStatus, xhr) {
                                console.log(data);
                                if(data=="success")
                                {
                                    row.remove().draw();
                                    toastr.success("Record delete successfully");
                                }else{
                                    toastr.warning("There was problem deleting the record");
                                }
                        });
                    }
                }
            })
        });

        $(document).on('click', '.access_rights', function(event) {
            event.preventDefault();
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var row = table.row($(this).parents('tr'));
            data={[csrfName]:csrfHash,userid:$(this).data('id'),is_secure_request:'uKrt)6'};
                $.post("<?php echo base_url('admin/getsubadmin_rightslist') ?>", data, 
                    function(data, textStatus, xhr) {
                        $("#targetBody").html(data);
                    });
        });
        $(document).on('click', '.save_permission', function(event) {
            event.preventDefault();
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var row = table.row($(this).parents('tr'));
            var formData = new FormData($("#permissionForm")[0]);
            formData.append('is_secure_request', 'uKrt)6');
            formURL= "<?php echo base_url('admin/agent_update_permissions') ?>";
            $.ajax({
                url: formURL,
                type: "POST",
                data:  formData,
                contentType: false,
                cache: false,
                processData:false,
                success: function(data, textStatus, jqXHR)
                {
                    toastr.success("Permission Updated successfully");
                }
            });
        });
    });
</script>