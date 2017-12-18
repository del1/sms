<!-- Page -->
<style type="text/css">
    .btnleft{
        margin-left: 28px;
    }
    .btnright{
        margin-right: 28px;
    }
</style>
<div class="page">
    <div class="page-header">
        <h1 class="page-title">User List</h1>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
        <li class="breadcrumb-item active">User List</li>
      </ol>
    </div>
    <div class="page-content container">
        <div class="panel-body">
            <a id="userlist" href="<?php echo base_url('admin/exportUsers'); ?>" class="btn btn-success btnleft" >Download Userlist</a>
            <table id="user_list_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive" ><!-- data-plugin="dataTable" -->
            <thead>
              <tr>
                <th>User Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Sign Up Date</th>
                <th>Last Logged</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($users_list as $user) { ?>
                    <tr>
                        <td><?php echo $user->user_id; ?></td>
                        <td><?php echo $user->first_name." ".$user->last_name; ?></td>
                        <td><a href="<?php echo base_url('admin/profile/'.$user->user_id);  ?>"><?php echo $user->email_id; ?> </a></td>

                        <td><?php echo date("jS F Y, g:i a", strtotime($user->signup_date)); ?></td>
                        <td><?php echo $user->last_login; ?> </td>
                        <td><input type="checkbox" data-id="<?php echo $user->user_id; ?>"  data-pk="user_id" data-type="users" class="switch" <?php if($user->is_active=='true'){echo 'checked';} ?> /></td>
                        <td><button data-id="<?php echo $user->user_id; ?>" class="btn btn-danger delete_user">Delete</button></td>
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
        var table=$("#user_list_table").DataTable( {
            "order": [[ 0, "asc" ]],
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

         $("#user_list_table_length").append($("#userlist"));

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
                        str="User Activated successfully";
                    }else{
                        toastr_type="warning";
                        str="User Deactivated successfully";
                    }
                    toastr.options = {
                      "closeButton": true
                    }
                    toastr[toastr_type](str);
            });
        });
        $(".delete_user").click(function(event){
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var row = table.row($(this).parents('tr'));
            data={[csrfName]:csrfHash,user_id:$(this).data('id'),is_secure_request:'uKrt)6'};
             bootbox.confirm({
                message: "Are you Sure, You want to delete this store?",
                callback: function (result) {
                    if(result==true)
                    {
                        $.post("<?php echo base_url('admin/delete_user') ?>", data, 
                            function(data, textStatus, xhr) {
                                console.log(data);
                                row.remove().draw();
                                toastr.success("User was successfully deleted");
                        });
                    }
                }
            })
        });
    });
</script>