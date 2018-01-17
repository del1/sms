<div class="form-group row row-centered" >
    <label for="enquiery_date_nfup" class="form-control-label col-md-3 col-sm-3 col-xl-3 col-lg-3 modal-label">Follow-up date</label>
    <div class="col-md-9 col-lg-9 col-sm-9  col-xl-9">
        <input id="enquiery_date_nfup" type="text" name="followup_date" class="form-control" value="<?php if(isset($followup_data->followup_date)){ echo $followup_data->followup_date;} ?>">
        <input type="hidden" name="enq_id" value="<?php echo $followup_data->enq_id; ?>">
        <?php if(isset($followup_data->followup_id)){ ?>
            <input type="hidden" name="followup_id" value="<?php echo $followup_data->followup_id; ?>">
        <?php } ?>
    </div>
</div>
<div class="form-group row row-centered" >
    <label for="agent_id" class="form-control-label col-md-3 col-sm-3 col-xl-3 col-lg-3 modal-label">Select Agent</label>
    <div class="col-md-9 col-lg-9 col-sm-9  col-xl-9 Followup">
        <select id="agent_id" data-plugin="select2" name="agent_id" class="form-control">
            <option hidden="" value="0">Select Agent</option>
            <?php foreach ($agent_list as $key => $value) { ?>
                <option <?php if (isset($followup_data->agent_id) &&  $followup_data->agent_id==$value->user_id) { echo "selected"; }; ?> value="<?php echo $value->user_id; ?>"><?php echo $value->user_name; ?></option>
            <?php } ?>
        </select>
        <span class="error"></span>
    </div>
</div>
<div class="form-group row row-centered" >
    <label for="followup_comment" class="form-control-label col-md-3 col-sm-3 col-xl-3 col-lg-3 modal-label">Follow-up comment</label>
    <div class="col-md-9 col-lg-9 col-sm-9  col-xl-9">
        <textarea id="followup_comment" class="form-control" name="followup_comment"><?php if(isset($followup_data->followup_comment)){ echo $followup_data->followup_comment;} ?></textarea>
        <span class="error"></span>
    </div>
</div>