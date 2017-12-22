<!-- Page -->
<style type="text/css">
    @media (min-width: 768px) and (max-width: 991px){
        
    }
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
        <h1 class="page-title">Sub Admin Management</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item active">Sub Admin Management</li>
        </ol>
    </div>
    <div class="page-content container-fluid">
        <div class="panel-body">
            <a href="<?php echo base_url('admin/manage_subadmin'); ?>" id="add_university" class="btn btn-success btnadd">Add New</a>
            <table id="university_list" class="table table-hover dataTable table-striped w-full table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>Sub Admin Information</th>
                        <th>Last Login date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($consultant_list as $round) { ?>
                    <tr>
                        <td><b>Name:</b><span class="description">&nbsp;<?php echo $round->user_name; ?> </span><br>
                            <b>Email:</b><span class="description">&nbsp;<?php echo $round->email_id; ?></span><br>
                            <b>Sign Up Date:</b><span class="description">&nbsp;<?php echo date("jS F Y, g:i a", strtotime($round->signup_date)) ?></span></td>
                        <td><?php echo date("jS F Y, g:i a", strtotime($round->last_login)); ?></td>
                        <td><?php echo date("jS F Y, g:i a", strtotime($round->last_updated)); ?></td>
                        <td><a href="<?php echo base_url('admin/manage_subadmin/'.$round->user_id);?>" class="btn btn-icon btn-primary" role="button"><i class="icon wb-pencil" aria-hidden="true"></i></a>
                        <button type="button" data-id="<?php echo $round->user_id; ?>" data-pk="user_id" data-type="ref_approunds" class="btn btn-icon btn-danger delete ml-30"><i class="icon wb-trash" aria-hidden="true"></i></button><br>
                        <button data-toggle="modal" data-target="#modal" type="button" data-id="<?php echo $round->user_id; ?>" class="btn btn-icon btn-default mt-5 shadow access_rights">Access rights</button>

                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="modal modal-transparent modal-fullscreen fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container">
                <?php $arr=array('class'=>"form-horizontal");
                            echo form_open('admin/agent_update_permissions',$arr); ?>
                <div class="modal-header">
                    <h4>Assign Access Rights</h4>
                </div>
                <div class="modal-body">
                    <div class="row row-centered" id="targetBody"></div>
                </div>
                <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">Save changes</button>
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                 <?php echo form_close(); ?>
            </div>
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
                        str="University Enabled";
                    }else{
                        toastr_type="warning";
                        str="University Disabled";
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
    });
</script>