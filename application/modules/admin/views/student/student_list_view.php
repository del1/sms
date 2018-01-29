<!-- Page -->
<style type="text/css">
    .btnadd{
        margin-left: 28px;
    }
    .btnright{
        margin-right: 28px;
    }
    #levelInfo{
        font-weight: 100;
    }
</style>
<div class="page">
    <div class="page-header">
        <h1 class="page-title">Profile Summary</h1>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
        <li class="breadcrumb-item active">Profile Summary</li>
      </ol>
    </div>
    <div class="page-content container">
        <div class="panel-body">
            
            <a href="<?php echo base_url('admin/student/add'); ?>" id="manage_product" class="btn btn-success btnadd">Add Student</a>
            <table id="store_list_table" class="table table-hover dataTable table-striped w-full table-bordered table-responsive" ><!-- data-plugin="dataTable" -->
            <thead>
              <tr>
                <th>Enquiry date</th>
                <th>Student name</th>
                <th>Email Id</th>
                <th>Phone number</th>
                <th>Profile Details</th>
                <th>Convert to Customer</th>
              </tr>
            </thead>
            <tbody>
                <?php if(isset($student_list)) { foreach ($student_list as $student) { ?>
                    <tr>
                        <td><?php echo date("jS F Y", strtotime($student->enq_date)); ?></td>
                        <td class="stuname"><?php echo $student->first_name." ".$student->last_name; ?></td>
                        <td><?php echo $student->email_id; ?> </td>
                        <td><?php echo $student->phonenumber; ?> </td>
                        <td data-id="<?php echo $student->student_id; ?>">
                            <button  type="button" class="btn btn-success btn-xs requestInfo" data-level="Personal" data>
                                <span class="glyphicon glyphicon-search"></span> Personal
                            </button>
                            <button  type="button" class="btn btn-primary btn-xs requestInfo" data-level="Professional">
                                <span class="glyphicon glyphicon-search"></span> Professional
                            </button>
                            <button type="button" class="btn btn-warning btn-xs requestInfo" data-level="Application">
                                <span class="glyphicon glyphicon-search"></span> Application
                            </button>
                        </td>
                        <td><a href="<?php echo base_url('admin/student/manage_student/'.$student->student_id);?>" class="btn btn-primary" role="button">Manage</a>
                            <?php if($student->is_converted=="false"){ ?>
                                <button type="button" data-id="<?php echo $student->student_id; ?>" class="btn btn-icon btn-warning stuConvert">Convert</button>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } } ?>
            </tbody>
          </table>
        </div>
    </div>
</div>
<div class="modal modal-transparent modal-fullscreen fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container">
                <?php $arr=array('class'=>"form-horizontal", 'id'=>"permissionForm");
                            echo form_open('admin/student/updateStudentInfo',$arr); ?>
                <div class="modal-header">
                    <h4><span id="studentName"></span> - <span id="levelInfo"></span></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="targetBody"></div>
                </div>
                <div class="modal-footer">
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
        var table=$("#store_list_table").DataTable( {
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
            })
        $("#store_list_table_length").append($("#manage_product"));
        $("#store_list_table_filter").prepend($("#stylelist"));
        
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
                        str="Product Activated successfully";
                    }else{
                        toastr_type="warning";
                        str="Product Deactivated successfully";
                    }
                    toastr.options = {
                      "closeButton": true
                    }
                    toastr[toastr_type](str);
            });
        });

        $(document).on('click', '.requestInfo', function(event) {
            event.preventDefault();
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var level=$(this).data('level');
            $("#levelInfo").html(level+" Information");
            $("#studentName").html($(this).parents('tr').find('.stuname').html());
                data={[csrfName]:csrfHash,level:level,student_id:$(this).parent().data('id'),is_secure_request:'uKrt)12'};
                $.post("<?php echo base_url('admin/student/get_student_info') ?>", data, 
                    function(data, textStatus, xhr) {
                        $("#targetBody").html(data);
                        $("#modal").modal('show');
                    })
        });

        $(document).on('click', '.stuConvert', function(event) {
            event.preventDefault();
            $row=$(this);
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var student_id=$(this).data('id');
                data={[csrfName]:csrfHash,student_id:student_id,is_secure_request:'uKrt)12'};
                $.post("<?php echo base_url('admin/convert_student') ?>", data, 
                    function(data, textStatus, xhr) {
                        if(xhr['status']==200 && data=="true")
                        {
                            $row.remove();
                            toastr_type="success";
                            str="Candidate converted to customer successfully";
                            toastr.options = {
                                  "closeButton": true
                            }
                            toastr[toastr_type](str);
                        }
                })
        });

        
    });
</script>
