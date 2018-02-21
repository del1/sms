jQuery(document).ready(function($) { 
    $("#resideing_state").select2({
        placeholder: "Select State"
    });
    $("#total_experience").select2({
        placeholder: "Select Experience"
    });
    $("#ugrad_degree").select2({
        placeholder: "Select Undergraduate Degree"
    });
    $("#intrested_program").select2({
        placeholder: "Select Interested Program"
    });
        
    $("#enq_date").daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minDate: moment(),
        locale: {
            format: 'YYYY-MM-DD'
      } ,
    }, function (startDate, endDate, period) {
        //$(this).val(startDate.format('L') + ' – ' + endDate.format('L'))
    });

    $("#gmat_tenative_date").daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minDate: moment(),
        locale: {
            format: 'YYYY-MM-DD'
        } ,
    });

    $("#gre_tenative_date").daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minDate: moment(),
        locale: {
            format: 'YYYY-MM-DD'
        }
    });

    $("#followup_date").daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        minDate: moment(),
        drops: 'up',
        locale: {
            format: 'YYYY-MM-DD'
        }
    });
    $(document).on('input', '.numbercheck', function(event) {
        var value = $(this).val();
        if ((value !== '') && (value.indexOf('.') === -1)) {
        	if($(this).attr('id')=='gmat_score')
        	{
        		max_score=800;
        	}
        	if($(this).attr('id')=='gre_score')
        	{
        		max_score=340;
        	}
            $(this).val(Math.max(Math.min(value, max_score), 1));
        }
    });


    $(document).on('change', '.trigger', function(event) {
        event.preventDefault();
        var targetClass=this.dataset.target;
        if(this.value=="1"){
        	$("."+targetClass).removeAttr('disabled');
        	$("."+targetClass+"1").attr('disabled','true');
        }else{
        	
        	$("."+targetClass).attr('disabled','true');
        	$("."+targetClass+"1").removeAttr('disabled');
        	$("."+targetClass).parent().find('span.error').empty();
        }
    });

    $(document).on('change', '#resideing_country', function(event) {
        event.preventDefault();
        Ajaxdata.country_id=$(this).val();
        $.post(base_url+'admin/getStatesForCountry', Ajaxdata,
            function(data, textStatus, xhr) {
                $('#resideing_state').empty();
                $('#resident_city').empty();
                $('#resideing_state').select2({
                    dataType: 'json',
                    data: JSON.parse(data)
                });
            });
    });

    $(document).on('change', '#resideing_state', function(event) {
        event.preventDefault();
        Ajaxdata.state_id=$(this).val();
        $.post(base_url+'admin/getCitiesOfStates', Ajaxdata,
            function(data, textStatus, xhr) {
                $('#resident_city').empty();
                $('#resident_city').select2({
                    dataType: 'json',
                    data: JSON.parse(data)
                });
            });
    });

    $(document).on('change','#agent_id,#source_id,#lead_type_id,#resideing_state, #resident_city,#total_experience, #intrested_program,#ugrad_degree', function(event) {
        $(this).parent().find('span.error').empty();
    })
    $(document).on('blur','#fname,#lname,#intro,#comment,#gmat_score,#gre_score',function(event) {
        if($(this).val().trim().length)
        {
            $(this).parent().find('span.error').empty();
        }
    })
});

function greScoreCheck(score)
{
    if(parseInt(score) <=340)
    {
        return true;
    }else{
        return false;
    }
}


function gmatScoreCheck(score)
{
    if(parseInt(score) <=800)
    {
        return true;
    }else{
        return false;
    }
}