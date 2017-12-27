<style type="text/css">
    .radio-inline{
        cursor: pointer;
    }
</style>
<?php 
$section[1]="Permission to manage section";
$section[2]="Master management";
$section[3]="Report";


foreach ($permission_list as $key => $value) {
    $permission_array[$value->section_id][$value->permission_id]=$value->permission;
} ?>
<?php
if(!empty($access_permission))
{
    foreach ($access_permission as $key => $value) {
        $edit[$value->permission_id]=$value->edit;
        $view1[$value->permission_id]=$value->view;
    }
} ?>
<?php foreach ($section as $key => $value) { ?>
<h5><?php echo $value; ?></h5>
<input type="hidden" name="userid" value="<?php echo $userid; ?>">
<table id="product_list<?php echo $key; ?>" class="table table-hover dataTable  w-full table-responsive" >
<tbody>
    <?php if(!empty($value)){
    foreach ($permission_array[$key] as $id => $permission) { ?>
        <tr>
            <td><?php echo $permission; ?></td>
            <td><label class="radio-inline"><input type="radio" <?php if(isset($edit[$id]) && $edit[$id]=="true") { echo  "checked";} ?> name="<?php echo $id; ?>" value="1"> Edit</label></td>
            <td><label class="radio-inline"><input type="radio" <?php if(isset($view1[$id]) && $view1[$id]=="true") { echo  "checked";} ?> name="<?php echo $id; ?>" value="0"> View</label></td>
        </tr>
    <?php } } ?>
</tbody>
</table>

<?php } ?>
