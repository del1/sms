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


    $(document).on('change', '.trigger', function(event) {
        event.preventDefault();
        if(this.value=="1"){
            var targetClass=this.dataset.target;
            var ab=document.getElementsByClassName(targetClass);
            for (var i = 0; i < ab.length; i++) {
                ab[i].removeAttribute('disabled');
            }
        }else{
             var targetClass=this.dataset.target;
            var ab=document.getElementsByClassName(targetClass);//.removeAttribute('readonly')
            $(ab).each(function(index, el) {
                $(this).attr('disabled',"true");
            });
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
    $(document).on('blur','#fname,#lname,#intro,#comment',function(event) {
        if($(this).val().trim().length)
        {
            $(this).parent().find('span.error').empty();
        }
    })
});