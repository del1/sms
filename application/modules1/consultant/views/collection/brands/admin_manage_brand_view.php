<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.1/css/jquery.fileupload.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.19.1/css/jquery.fileupload-ui.css" />
<style type="text/css">
textarea {
    resize: none;
}
.img-responsive{
    display: block;
    max-width: 100%;
    height: auto;
}
.iconWrap{
    position: absolute;
    top: 2px;
    right: 17px;
    color: red;
    height: 25px;
    width: 25px;
    background: rgba(0,0,0, 0.5);
    border-radius: 100%;
    font-size: 17px;
    padding: 0px 8px;   
}
.lefticonWrap{
    position: absolute;
    top: 2px;
    left: 17px;
    color: red;
    height: 25px;
    width: 25px;
    background: rgba(0,0,0, 0.5);
    border-radius: 100%;
    font-size: 17px;
    padding: 0px 8px;   
}

.pullRight{
    float: right;
}
</style>
<div class="page">
    <div class="page-content container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-header">
                    <h1 class="page-title"><?php if(isset($brand_details->brand_name)&& strlen(trim($brand_details->brand_name))) { echo "Manage Brand"; }else{ "Add New Brand"; } ?></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/collection_list'); ?>">Collection</a></li>
                        <li class="breadcrumb-item active">Manage Brands</li>
                    </ol>
                </div>
            </div>
            <!-- start from here -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 mt-20">
                    <?php if($this->session->flashdata('error')) { ?>
                    <p class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></p>
                    <?php } ?>
                    <?php if($this->session->flashdata('success')) { ?>
                        <p class="alert alert-success"><?php echo $this->session->flashdata('success'); ?></p>
                    <?php } ?>
                        <?php $arr=array('class'=>"form-horizontal");
                            echo form_open_multipart('admin/add_update_brands',$arr); ?>
                            <div class="form-group row">
                                <label for="Brand name" class ="form-control-label col-sm-3 col-xl-2">Brand Name</label>
                                <div class="col-sm-9 col-xl-10">
                                    <input type="text" class="form-control" name="brand_name" placeholder="Enter brand name" value="<?php if(isset($brand_details->brand_name) && strlen(trim($brand_details->brand_name))) { echo html_escape($brand_details->brand_name); } ?>"/>
                                    <?php if(isset($brand_details->brand_id)){ ?>
                                    <input type="hidden" name="brand_id" value="<?php echo $brand_details->brand_id; ?>">
                                    <?php }  ?>
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Store Address" class ="form-control-label col-sm-3 col-xl-2">Upload Brand Images</label>
                                <div class="col-sm-9 col-xl-10">
                                    <span class="btn btn-sm btn-success fileinput-button">
                                    <i class="fa fa-plus"></i>
                                    <span>Add files...</span>
                                    <input id="uploadImage" type="file" accept="image/x-png,image/gif,image/jpeg" name="userfile[]" multiple>
                                </span>
                                </div>
                            </div>
                            <?php if(isset($brand_images) && !empty($brand_images)){ ?>
                            <div class="form-group row">
                                <?php foreach ($brand_images as $image) { ?>
                                <div class="col-sm-3">
                                    <img src="<?php echo 'https://res.cloudinary.com/'.CLOUDNARYNAME.'/image/upload/c_fill,g_faces:center,h_490,w_370/'.$image['doc_path'] ?>" class="img-responsive">
                                    <!-- <div class="icondemo iconWrap">
                                        <span data-image="<?php //echo $image['document_id']; ?>" data-product="<?php //echo $product_details->product_id; ?>" class="icon wb-close-mini remove_image"></span>
                                    </div> -->
                                    <div class="icondemo lefticonWrap">
                                        <input type="checkbox" data-pk="document_id" data-type="documents" class="checkBoxChange" <?php if($image['is_active']=="true"){ echo "checked"; } ?> data-id="<?php echo $image['document_id']; ?>">
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <?php } ?>
                            <div class=""><!-- col-md-9 offset-md-3 -->
                                <button type="submit" class="btn-primary btn pullRight">Update</button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
            $(".checkBoxChange").change(function(event) {
            var csrfName = "<?php echo $this->security->get_csrf_token_name(); ?>",
            csrfHash = "<?php echo $this->security->get_csrf_hash(); ?>";
            var changeCheckbox = $(this)[0];//target
            var data={is_active:changeCheckbox.checked,pk_id:$(changeCheckbox).data('id'),type:$(changeCheckbox).data('type'),[csrfName]:csrfHash};
            $.post("<?php echo base_url('admin/changeAllStatus') ?>", data, 
                function(data, textStatus, xhr) {
            });
        });
</script>


