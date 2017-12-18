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
</style>
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Universities List</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item active">Universities list</li>
        </ol>
    </div>
    <div class="page-content container-fluid">
        <div class="panel-body">
            <a href="<?php echo base_url('admin/manage_university'); ?>" id="add_university" class="btn btn-success btnadd">Add University</a>
            <a href="javascript:void(0)" id="export_universities" class="btn btn-success btnright">Export Universities</a>
            <table id="university_list" class="table table-hover dataTable table-striped w-full table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>University Id</th>
                        <th>University Name</th>
                        <th>Country</th>
                        <th>Added/Updated By</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($universities_list as $university) { ?>
                    <tr>
                        <td><?php echo $university->university_id; ?></td>
                        <td><?php echo $university->university_name; ?></td>
                        <td><?php echo $university->country_name; ?></td>
                        <td><?php echo $university->user_name." (".date("jS F Y, g:i a", strtotime($university->last_updated)). ")  "; ?></td>
                        <td><input type="checkbox" data-id="<?php echo $university->university_id; ?>" data-pk="university_id" data-type="ref_universities" class="switch" <?php if($university->is_active=='true'){echo 'checked';} ?> /></td>
                        <td><a href="<?php echo base_url('admin/manage_university/'.$university->university_id);?>" class="btn btn-icon btn-primary" role="button"><i class="icon wb-pencil" aria-hidden="true"></i></a>

                        <button type="button" data-id="<?php echo $university->university_id; ?>" data-pk="university_id" data-type="ref_universities" class="btn btn-icon btn-danger delete"><i class="icon wb-trash" aria-hidden="true"></i></button>
                        </td>
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
    $("#university_list_filter").prepend($("#export_universities"));
    
    
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
    });
</script>