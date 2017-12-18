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
                    <h1 class="page-title"><?php if(isset($product_details->product_name)&& strlen(trim($product_details->product_name))) { echo "Manage Product"; }else{ "Add New Product"; } ?></h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/collection_list'); ?>">Collection</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/all_products'); ?>">All Products</a></li>
                        <li class="breadcrumb-item active"><?php if(isset($product_details->product_name)&& strlen(trim($product_details->product_name))) { echo $product_details->product_name; }else{ echo "Add New Product"; } ?></li>
                    </ol>
                </div>
            </div>

            <?php 
            
            foreach ($sub_catlist as $subcat) { 
                $subcat_array[$subcat->cat_id][]=$subcat;
            } 

            //for selected subcat in select2 plugin
            $subcat_id_array=array();
            if(isset($product_subcat_list) && !empty($product_subcat_list))
            {
                foreach ($product_subcat_list as $key => $value) {
                    $subcat_id_array[]=$value->sub_cat_id;
                }
            }
            ?>

            <!-- start from here -->
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12 col-md-12 mt-20">
                        <?php $arr=array('class'=>"form-horizontal");
                            echo form_open_multipart('admin/add_update_product',$arr); ?>
                            <div class="form-group row">
                                <label for="Style Number/Name" class ="form-control-label col-sm-3 col-xl-2">Style Number/Name</label>
                                <div class="col-sm-9 col-xl-10">
                                    <input type="text" class="form-control" name="product_name" placeholder="Enter Style Number/Name" value="<?php if(isset($product_details->product_name) && strlen(trim($product_details->product_name))) { echo html_escape($product_details->product_name); } ?>"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Collection " class ="form-control-label col-sm-3 col-xl-2">Collection Type</label>
                                <div class="col-sm-9 col-xl-10">
                                    <select class="form-control" for="Collection" name="collection_id">
                                        <?php foreach ($collection_list as $collection) { ?>
                                            <option <?php if(isset($product_details->collection_id) && $product_details->collection_id==$collection->collection_id){ echo "selected"; } ?> value="<?php echo $collection->collection_id;  ?>"><?php echo $collection->collection_name;  ?></option>
                                        <?php } ?>
                                    </select>
                                    <?php if(isset($product_details->product_id)){ ?>
                                    <input type="hidden" name="product_id" value="<?php echo $product_details->product_id; ?>">
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Brand" class ="form-control-label col-sm-3 col-xl-2">Brand</label>
                                <div class="col-sm-9 col-xl-10">
                                    <select class="form-control"  for="Brand" name="brand_id">
                                        <?php foreach ($brands_list as $brand) { ?>
                                            <option <?php if(isset($product_details->brand_id) && $product_details->brand_id==$brand->brand_id){ echo "selected"; } ?> value="<?php echo $brand->brand_id;  ?>"><?php echo $brand->brand_name;  ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="Season" class ="form-control-label col-sm-3 col-xl-2">Season</label>
                                <div class="col-sm-9 col-xl-10">
                                    <select class="form-control"  data-plugin="select2" for="Season" name="season_id">
                                        <?php foreach ($season_list as $season) { ?>
                                            <option <?php if(isset($product_details->season_id) && $product_details->season_id==$season->season_id){ echo "selected"; } ?> value="<?php echo $season->season_id;  ?>"><?php echo $season->season;  ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <?php foreach ($catagory_list as $catagory) { ?>
                            <div class="form-group row">
                                <label for="Season" class ="form-control-label col-sm-3 col-xl-2"><?php echo $catagory->cat_name; ?></label>
                                <div class="col-sm-9 col-xl-10">
                                    <select class="form-control" data-placeholder="Select catagories of <?php echo $catagory->cat_name; ?>" for="sub catagories for <?php echo $catagory->cat_name; ?>" multiple data-plugin="select2" name="sub_cat_id[]">
                                        <?php foreach ($subcat_array[$catagory->cat_id] as $subcat) { ?>
                                            <option <?php if(in_array($subcat->sub_cat_id,$subcat_id_array)) { echo "selected"; } ;?>  value="<?php echo $subcat->sub_cat_id;  ?>"><?php echo $subcat->sub_cat_name;  ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <?php } ?>

                            <div class="form-group row">
                                <label for="Store Address" class ="form-control-label col-sm-3 col-xl-2">Product Description</label>
                                <div class="col-sm-9 col-xl-10">
                                    <textarea name="product_desc" placeholder="Add product address" class="form-control" style="height: 102px;"><?php if(isset($product_details->product_desc) && strlen(trim($product_details->product_desc))) {  echo html_escape($product_details->product_desc); } ?></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Store Address" class ="form-control-label col-sm-3 col-xl-2">Upload Style Images</label>
                                <div class="col-sm-9 col-xl-10">
                                    <span class="btn btn-sm btn-success fileinput-button">
                                    <i class="fa fa-plus"></i>
                                    <span>Add files...</span>
                                    <input id="uploadImage" type="file" name="userfile[]" accept="image/x-png,image/gif,image/jpeg" multiple>
                                </span>
                                </div>
                            </div>
                            <?php if(isset($product_images_list) && !empty($product_images_list)){ ?>
                            <div class="form-group row">
                                <?php foreach ($product_images_list as $image) { ?>
                                <div class="col-sm-3">
                                    <img src="<?php echo 'https://res.cloudinary.com/'.CLOUDNARYNAME.'/image/upload/'.$image['doc_path'] ?>" class="img-responsive">
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
                                <button type="submit" class="btn-primary btn pullRight">
                                    <?php if(isset($product_details->product_id)){ ?>Update <?php }else { ?>Add New <?php } ?></button>
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


