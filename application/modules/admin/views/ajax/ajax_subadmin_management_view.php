
<?php 
$section[1]="Permission to manage section";
$section[2]="Master management";
$section[3]="Report";


foreach ($permission_list as $key => $value) {
    $permission_array[$value->section_id][$value->permission_id]=$value->permission;
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
            <td><input type="radio" name="<?php echo $id; ?>" value="1">Edit</td>
            <td><input type="radio" name="<?php echo $id; ?>" value="0">View</td>
        </tr>
    <?php } } ?>
</tbody>
</table>

<?php } ?>
