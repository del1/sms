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
        <h1 class="page-title"><?php echo $store_details->store_name; ?> - Trunk Show Event List</h1>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/show_stores_list/Events'); ?>">Store List</a></li>
        <li class="breadcrumb-item active"><?php echo $store_details->store_name; ?> - Manage Trunk Show events</li>
      </ol>
    </div>
    <div class="page-content container">
        <div class="panel-body">
            <a href="<?php echo base_url('admin/manage_event'); ?>" id="add_event" class="btn btn-success btnleft">Add Event</a>
            <table id="store_list_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive" ><!-- data-plugin="dataTable" -->
            <thead>
              <tr>
                <th>Event Id</th>
                <th>Event Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($event_list as $event) { ?>
                    <tr>
                        <td><?php echo $event->event_id; ?></td>
                        <td><?php echo $event->event_name; ?></td>
                        <td><?php echo $event->start_date; ?> </td>
                        <td><?php echo $event->end_date; ?> </td>
                        <td><input type="checkbox" data-id="<?php echo $event->event_id; ?>" class="switch" <?php if($event->is_active=='true'){echo 'checked';} ?> /></td>
                        <td><a href="<?php echo base_url('admin/manage_event/'.$event->event_id);?>" class="btn btn-primary" role="button">Manage</a>
                            <button data-id="<?php echo $event->event_id; ?>" class="btn btn-danger delete_event">Delete</button></td>
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
        var table=$("#store_list_table").DataTable( {
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
        $("#store_list_table_length").append($("#add_event"));

        $(".switch").change(function(event) {
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var changeCheckbox = $(this)[0];//target
            var data={is_active:changeCheckbox.checked,event_id:$(changeCheckbox).data('id'),[csrfName]:csrfHash};
            $.post("<?php echo base_url('admin/changeEventStatus') ?>", data, 
                function(data, textStatus, xhr) {
                    console.log(data);
                    if(changeCheckbox.checked)
                    {
                        toastr_type="success";
                        str="Event Activated successfully";
                    }else{
                        toastr_type="warning";
                        str="Event Deactivated successfully";
                    }
                    toastr.options = {
                      "closeButton": true
                    }
                    toastr[toastr_type](str);
            });
        });
        $(".delete_event").click(function(event){
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var row = table.row($(this).parents('tr'));
            data={[csrfName]:csrfHash,event_id:$(this).data('id'),is_secure_request:'uKrt)6'};
             bootbox.confirm({
                message: "Are you Sure, You want to delete this Event?",
                callback: function (result) {
                    if(result==true)
                    {
                        $.post("<?php echo base_url('admin/delete_events') ?>", data, 
                            function(data, textStatus, xhr) {
                                row.remove().draw();
                                toastr.success("Event was successfully deleted");
                        });
                    }
                }
            })
        });
    });
</script>