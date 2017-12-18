<style type="text/css">
    textarea {
        width: 100%;
        height: 262px;;
        border: 2px solid #765942;
        border-radius: 10px;
        //resize: none;
    }

</style>
<!-- Page -->
<div class="page">
    <div class="page-header">
    <h1 class="page-title">Manage About Us</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
            <li class="breadcrumb-item active">Manage About us content</li>
        </ol>
    </div>
    <div class="page-content container">
        <div class="row">
            <div class="col-xl-3 col-md-4">
            <!-- Panel -->
                <div class="panel">

                    <div class="panel-body">
                        <div class="list-group faq-list" role="tablist">
                            <?php $i=1; foreach ($about_us as $content) { ?>
                               <a class="list-group-item list-group-item-action <?php if($i==1){ echo 'active';}?>" data-toggle="tab" href="#category-<?php echo $i; ?>" aria-controls="category-<?php echo $i;?>" role="tab"><?php echo $content['section_name'] ;?></a>
                            <?php $i++;} ?>
                        </div>
                    </div>
                </div>
            <!-- End Panel -->
            </div>
            <div class="col-xl-9 col-md-8">
            <!-- Panel -->
                <div class="panel">
                    <?php $arr=array('id'=>"about_us_form");
                            echo form_open('admin/update_about_us',$arr); ?>
                    <div class="panel-body">
                        <div class="tab-content">
                            <?php $i=1; foreach ($about_us as $content) { ?>
                            <div class=" tab-pane animation-fade <?php if($i==1){ echo 'active';} ?>" id="category-<?php echo $i; ?>" role="tabpanel">
                                <div class="alert alert-success">
                                    <strong>Note: </strong> &lt;span&gt; Your text &lt;/span&gt; for colored text
                                </div>
                                <div class="panel-group panel-group-simple panel-group-continuous" id="accordion" aria-multiselectable="true" role="tablist">
                                    <div class="panel">
                                        <textarea name="<?php echo $content['section_name'] ;?>" placeholder="Enter <?php echo $content['section_name'] ;?> Text" ><?php echo $content['section_desc']; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <?php  $i++; }?>
                        </div>
                        <button type="button" class="btn btn-success save_about_us " style="float: right!important;">Save</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
                <!-- End Panel -->
            </div>
        </div>
    </div>
</div>
<!-- End Page -->
<script type="text/javascript">
    jQuery(document).ready(function($) {
         $(".save_about_us ").click(function(event) {
            event.preventDefault();
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var data = $("#about_us_form").serializeArray();
            $.post("<?php echo base_url('admin/update_about_us') ?>", data, 
                function(data, textStatus, xhr) {
                    console.log(data);
                    toastr_type="success";
                    str="Content updated successfully";
                    toastr.options = {
                      "closeButton": true
                    };
                    toastr[toastr_type](str);
            });
        });
    });
</script>