<?php foreach ($last_followup as $key => $value) {
    if(!empty($value)){
        $followups[$key]=$value[0];
    }
} ?>

<?php if(!empty($student_details)) {
    foreach ($student_details as $key => $Student) { $Student=$Student[0]; ?>
    <tr>
        <td><span><img height="30" width="30" src="<?php echo base_url('assets/admin/images/'.$Student->lead_type.'.png'); ?>"></span></td><!-- <span><i class="fa fa-snowflake-o"></i><i class="fas fa-fire"></i></span> -->
        <td><?php echo $Student->first_name." ".$Student->last_name; ?></td>
        <td><?php echo date("d/m/y", strtotime($Student->enq_date)); ?></td>
        <td><?php echo $Student->phonenumber; ?></td>
        <td><?php echo $Student->intro; ?></td>
        <td data-id="<?php echo $Student->student_id; ?>">
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
        <td><?php if(isset($followups[$Student->student_id])) { echo date("d/m/y", strtotime($followups[$Student->student_id]->followup_date)); } ?></td>
        <td>
            <input type="checkbox" value="$student->student_id" name="">
        </td>
    </tr>
<?php } } ?>