<div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-12">
    <label for="is_gre_taken" class="form-control-label">Is GRE Taken</label>
    <select class="form-control" name="is_gre_taken" id="is_gre_taken">
        <option hidden="" value="0">Yes/No</option>
        <option value="1">Yes</option>
        <option value="2">No</option>
    </select>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-12" id="gre_yes" style="display: none">
    <label for="gre_score" class="form-control-label">GRE Score</label>
    <input type="number" id="gre_score" maxlength="3" step="1" max="340" min="1" name="gre_score" placeholder="if (yes)" class="form-control gre_tar numbercheck">
    <span id="gre_score_error" class="error"></span>
</div>
<div class="col-md-6 col-lg-6 col-sm-6 col-xl-6 col-12" id="gre_no" style="display: none">
    <label for="gre_tentative_from_date" class="form-control-label" style="padding: .429rem 0;">Tentative GRE date</label>
    <div class="form-group row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xl-5 col-12 ">
            <div class="input-group">
                <input type="text" id="gre_tentative_from_date" name="gre_tentative_from_date" class="form-control" placeholder="From Date">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                <span id="gre_tentative_from_date_error" class="error"></span>
            </div>
        </div>
        <label for="gre_tentative_to_date" class="form-control-label col-md-1 col-sm-1 col-xl-1 col-lg-1 hidden-lg-down hidden-md-down hidden-sm-down hidden-xs-down" style="text-align: right;">to</label>
        <div class="col-md-12 col-lg-12 col-sm-12 col-xl-5 col-12">
            <div class="input-group">
                <input type="text" readonly id="gre_tentative_to_date" name="gre_tentative_to_date" class="form-control" placeholder="To Date">
                <span class="input-group-addon" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                <span id="gre_tentative_to_date_error" class="error"></span>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(document).on('change', '#is_gre_taken', function(event) {
			var res=$(this).val();
			if(res==1)
			{
				$("#gre_no").hide();
				$("#gre_yes").show();
			}else if(res==2)
			{
				$("#gre_yes").hide();
				$("#gre_no").show();
			}
		});
	});
	
</script>