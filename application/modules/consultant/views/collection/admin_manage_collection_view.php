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
                    <h1 class="page-title">Manage Collection</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/collection_list'); ?>">Collection</a></li>
                        <li class="breadcrumb-item active">Manage Collection</li>
                    </ol>
                </div>
            </div>
            <?php $collectionDetails=$collectionDetails[0]; ?>
            <!-- start from here -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 mt-20">
                        <?php $arr=array('class'=>"form-horizontal");
                            echo form_open_multipart('admin/update_collection',$arr); ?>
                            <div class="form-group row">
                                <label for="Collection name" class ="form-control-label col-sm-3 col-xl-2">Collection Name</label>
                                <div class="col-sm-9 col-xl-10">
                                    <input type="text" class="form-control" name="collection_name" placeholder="Enter collection_name" value="<?php if(isset($collectionDetails['collection_name']) && strlen(trim($collectionDetails['collection_name']))) { echo html_escape($collectionDetails['collection_name']); } ?>"/>
                                </div>
                            </div>
                            <?php if(isset($collectionDetails) && !empty($collectionDetails)){ ?>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <img src="<?php echo 'https://res.cloudinary.com/'.CLOUDNARYNAME.'/image/upload/'.$collectionDetails['doc_path'] ?>" class="img-responsive">
                                    <!-- <div class="icondemo iconWrap">
                                        <span data-image="<?php //echo $image['document_id']; ?>" data-product="<?php //echo $product_details->product_id; ?>" class="icon wb-close-mini remove_image"></span>
                                    </div> -->
                                </div>
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
                    /*if(changeCheckbox.checked)
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
                    toastr[toastr_type](str);*/
            });
        });
</script>


