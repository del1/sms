<?php if(!empty($followup_data)) {
    foreach ($followup_data as $key => $value) { ?>
    <tr>
        <td><?php echo date("jS F Y", strtotime($value->followup_date)); ?></td>
        <td><?php echo $value->first_name." ".$value->last_name; ?></td>
        <td><?php echo $value->followup_comment; ?></td>
        <td>
            <button type="button" data-toggle="modal" data-target="#myModal" data-id="<?php echo $value->followup_id; ?>" class="btn btn-outline btn-icon btn-warning btn-outline requestFollowUp" data-action="edit"><i class="icon wb-pencil" aria-hidden="true"></i></button>
            <button data-id="<?php echo $value->followup_id; ?>" type="button" class="btn  btn-outline btn-danger btn-sm requestFollowUp" data-action="delete"><i class="icon wb-trash" aria-hidden="true"></i></button>
        </td>
    </tr>
<?php } } ?>