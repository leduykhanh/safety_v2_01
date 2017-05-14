//<![CDATA[
$(window).load(function(){
// Add a new repeating section
var attrs = ['for', 'id', 'value', 'select'];
function resetAttributeNames(section) {
    var tags = section.find('input, label'), idx = section.index();
    tags.each(function() {
      var $this = $(this);
      $.each(attrs, function(i, attr) {
        var attr_val = $this.attr(attr);
        if (attr_val) {
            $this.attr(attr, attr_val.replace(/_\d+$/, '_'+(idx + 1)));



        }

      })


    })
}

function resetHazaradsAttributeNames(section) {
    var tags = section.find('input, label'), idx = section.index();
    tags.each(function() {
      var $this = $(this);
      $.each(attrs, function(i, attr) {
        var attr_val = $this.attr(attr);
        if (attr_val) {
            $this.attr(attr, attr_val.replace(/_\d+$/, '_'+(idx + 1)));



        }
      })


    })
}

$('.addMember').click(function(e){
        e.preventDefault();
        var MemberCount = $('#RA_MemberCount').val();
        if(MemberCount >= 5)
        {
           alert("You can't add more than 5 RA Member");
            return;
        }

        var toRepeatingGroup = $('.repeatingMember').first();
        var lastRepeatingGroup = $('.repeatingMember').last();
        var cloned = toRepeatingGroup.clone(true);
        cloned.insertAfter(lastRepeatingGroup);


        resetAttributeNames(cloned);



        var newMemberCount = parseInt(MemberCount) +1;
        $('#RA_MemberCount').val(newMemberCount);

    });

    $('.deleteMember').click(function(e){
        e.preventDefault();
        var current_fight = $(this).parent('div');
        var other_fights = current_fight.siblings('.repeatingMember');
        if (other_fights.length === 0) {
            alert("You should atleast have one RA Member");
            return;
        }
        current_fight.slideUp('slow', function() {
            current_fight.remove();
            var MemberCount = $('#RA_MemberCount').val();
            var newMemberCount = parseInt(MemberCount) -1;
            $('#RA_MemberCount').val(newMemberCount);
            // reset fight indexes
            other_fights.each(function() {
               resetAttributeNames($(this));
            })

        })



    });



$('.addWorkActivity').click(function(e){
        e.preventDefault();
        var toRepeatingGroup = $('.tocopy').first();
        var lastRepeatingGroup = $('.repeatingSection').last();
        var cloned = toRepeatingGroup.clone(true);
		var workactivityCount = $('#workactivityCount').val();
        var newworkactivityCount = parseInt(workactivityCount) +1;
        $('#workactivityCount').val(newworkactivityCount);

		var nextHzardsCounts =1;
	   cloned.find(".generate_dynamic_content").html("<div id=\"dynamic_data_control_injuery_"+newworkactivityCount+"_"+nextHzardsCounts+"\"></div>") ;
	   cloned.find("#get_injury_dynamic").attr("onchange","get_injuery(this,this.value,'dynamic_data_control_injuery_"+newworkactivityCount+"_"+nextHzardsCounts+"',"+newworkactivityCount+","+nextHzardsCounts+");");
	   cloned.find(".severity").removeAttr("id");
	   cloned.find(".severity").attr('id',"change_severity_"+newworkactivityCount+"_"+nextHzardsCounts);

	    cloned.find(".likelihood").removeAttr("id");
	   cloned.find(".likelihood").attr('id',"change_likehood_"+newworkactivityCount+"_"+nextHzardsCounts);


	    cloned.find(".head_title").html("Work Activity "+newworkactivityCount);
	    cloned.insertAfter(lastRepeatingGroup);

        resetAttributeNames(cloned);



    });



$('.addHazards').click(function(e){
        e.preventDefault();

        var currentHazardCounts = $(this).parent().parent().find('#hazardsCount').val();
        var nextHzardsCounts = parseInt(currentHazardCounts) + 1;
        $(this).parent().parent().find('#hazardsCount').val(nextHzardsCounts);

        var workactivityCount = $('#workactivityCount').val();



        var lastRepeatingGroup = $('.hazardSectionCopy').first();
        var cloned = lastRepeatingGroup.clone(true)
	 cloned.find(".generate_dynamic_content").html("<div id=\"dynamic_data_control_injuery_"+workactivityCount+"_"+nextHzardsCounts+"\"></div>") ;
	    cloned.find("#get_injury_dynamic").attr("onchange","get_injuery(this,this.value,'dynamic_data_control_injuery_"+workactivityCount+"_"+nextHzardsCounts+"',"+workactivityCount+","+nextHzardsCounts+");");
		 cloned.find(".severity").removeAttr("id");
	   cloned.find(".severity").attr('id',"change_severity_"+workactivityCount+"_"+nextHzardsCounts);

	    cloned.find(".likelihood").removeAttr("id");
	   cloned.find(".likelihood").attr('id',"change_likehood_"+workactivityCount+"_"+nextHzardsCounts);

        cloned.insertAfter($(this).parent('div'));
        resetHazaradsAttributeNames(cloned)
    });

$('.addActionMember').click(function(e){
        e.preventDefault();

        var currentHazardsActionOfficerCount = $(this).parent().parent().find('#hazardsActionOfficerCount').val();

        if(currentHazardsActionOfficerCount >= 5)
        {
           alert("You can't add more than 5 Action Officers");
            return;
        }

        var nextHazardsActionOfficerCount = parseInt(currentHazardsActionOfficerCount) + 1;
        $(this).parent().parent().find('#hazardsActionOfficerCount').val(nextHazardsActionOfficerCount);




        var lastRepeatingGroup = $('.repeatingActionOfficer').last();
        var cloned = lastRepeatingGroup.clone(true);


        cloned.insertAfter($(this).parent('div'));
        resetHazaradsAttributeNames(cloned);
    });
    $('.addOtherActionMember').click(function(e){
            e.preventDefault();

            var currentHazardsActionOfficerCount = $(this).parent().parent().find('#hazardsActionOfficerCount').val();

            if(currentHazardsActionOfficerCount >= 5)
            {
               alert("You can't add more than 5 Action Officers");
                return;
            }

            var nextHazardsActionOfficerCount = parseInt(currentHazardsActionOfficerCount) + 1;
            $(this).parent().parent().find('#hazardsActionOfficerCount').val(nextHazardsActionOfficerCount);

            var lastRepeatingGroup = $('.repeatingOtherActionOfficer').last();
            var cloned = lastRepeatingGroup.clone(true)
            cloned.insertAfter($(this).parent('div'));
            resetHazaradsAttributeNames(cloned);
        });

$('.deleteActonOfficer').click(function(e){
        e.preventDefault();
        console.log("called");
        var current_fight = $(this).parent('div');
        var other_fights = current_fight.siblings('.repeatingActionOfficer');
        if (other_fights.length === 0) {
            alert("You should atleast have one Action officer Member");
            return;
        }
        current_fight.slideUp('slow', function() {
              var currentHazardsActionOfficerCount = $(this).parent().parent().find('#hazardsActionOfficerCount').val();
             var nextHazardsActionOfficerCount = parseInt(currentHazardsActionOfficerCount) - 1;
            $(this).parent().parent().find('#hazardsActionOfficerCount').val(nextHazardsActionOfficerCount);
            current_fight.remove();


            // reset fight indexes
            other_fights.each(function() {
               resetAttributeNames($(this));
            })

        })



    });

// Delete a repeating section
$('.deleteWorkActivity').click(function(e){
        e.preventDefault();
        var current_fight = $(this).parent('div');
        var other_fights = current_fight.siblings('.repeatingSection');
        if (other_fights.length === 0) {
            alert("You should atleast have one workactivity");
            return;
        }
        current_fight.slideUp('slow', function() {
            current_fight.remove();

            // reset fight indexes
            other_fights.each(function() {
               resetAttributeNames($(this));
            })

        })
        var workactivityCount = $('#workactivityCount').val();
        var newworkactivityCount = parseInt(workactivityCount) -1;
        $('#workactivityCount').val(newworkactivityCount);


    });








// Delete a repeating section
$('.deleteHazards').click(function(e){
        e.preventDefault();

        var current_fight = $(this).parent('div');
        var other_fights = current_fight.siblings('.hazardSection');
        if (other_fights.length === 0) {
            alert("You should atleast have one hazards");
            return;
        }
        current_fight.slideUp('slow', function() {
            current_fight.remove();

            // reset fight indexes
            other_fights.each(function() {
               resetAttributeNames($(this));
            })

        })

        var currentHazardCounts = $(this).parent().parent().find('#hazardsCount').val();
        var nextHzardsCounts = parseInt(currentHazardCounts) - 1;
        $(this).parent().parent().find('#hazardsCount').val(nextHzardsCounts);


    });




$(".date").datepicker();

//likelihood chnage
$('.likelihood').on('change', function()
{
  var likelihood = parseInt(this.value);
      var severity  =  parseInt($(this).parent().siblings().find('.severity').val());
      var riskValue = likelihood * severity;


     if(riskValue > 0 && riskValue < 4)
     {
        var htmlRisk = '<span class="green">Low Risk</span>';

     }
     else if(riskValue > 3 && riskValue < 13)
     {
        var htmlRisk = '<span class="yellow">Medium Risk</span>';
     }
     else if(riskValue > 13 && riskValue < 26)
     {
        var htmlRisk = '<span class="red">High Risk - Additional Risk Control is required below</span>';
     }
     else
     {
        var htmlRisk = '';
     }

 //alert(htmlRisk+$(this).parent().parent().siblings().find('.riskLevel').html());



 $(this).parent().parent().siblings().find('.riskLevel').empty().append(htmlRisk);


});


$('.severity').on('change', function()
{
	   // or $(this).val()
	  var severity = parseInt(this.value);
	  var likelihood  =  parseInt($(this).parent().siblings().find('.likelihood').val());
	  var riskValue = likelihood * severity;


	 if(riskValue > 0 && riskValue < 4)
	 {
	    var htmlRisk = '<span class="green">Low Risk</span>';

	 }
	 else if(riskValue > 3 && riskValue < 13)
	 {
	 	var htmlRisk = '<span class="yellow">Medium Risk</span>';
	 }
	 else if(riskValue > 13 && riskValue < 26)
	 {
	 	var htmlRisk = '<span class="red">High Risk - Additional Risk Control is required below</span>';
	 }
	 else
	 {
	 	var htmlRisk = '';
	 }


 //alert(htmlRisk+$(this).parent().parent().siblings().find('.riskLevel').html());



 $(this).parent().parent().siblings().find('.riskLevel').empty().append(htmlRisk);

});

 $(document).on("click",'.add_others',function(e){
	var work_activity = $(this).attr('data-wrk');
	var hazards = $(this).attr('data-haz');
	var add_others = $('#add_others_'+work_activity+'_'+hazards+'>input').length +1;
	$('#add_others_'+work_activity+'_'+hazards).append('<label style=" float: left;width: 100%;" class="c_t_'+add_others+'">If others, please specify</label><input style="width: 82%;float: left;margin: 0px 5px 5px 0px;"  type="text" class="with_textbox_value c_t_'+add_others+'" name="ExistingRiskControl['+work_activity+']['+hazards+'][c_t_'+add_others+']" value=""/><a style=" float:left;" href="javascript:void(0)" class="btn btn-danger c_t_'+add_others+' remove_other_data" data-id ="add_others_'+work_activity+'_'+hazards+'" data-remove="c_t_'+add_others+'"> Remove</a> <br />');
	});

  $(document).on("click",'.add_others_injury',function(e){
    var currenthazardsOthersInjuryCount = $(this).parent().find('#hazardsOthersInjuryCount').val();
    var nexthazardsOthersInjuryCounts = parseInt(currenthazardsOthersInjuryCount) + 1;
    $(this).parent().find('#hazardsOthersInjuryCount').val(nexthazardsOthersInjuryCounts);

  var work_activity = $(this).attr('data-wrk');
 	var hazards = $(this).attr('data-haz');
 	var add_others_injury = $('#add_others_injury_'+work_activity+'_'+hazards+'>input').length +1;
 	$('#add_others_injury_'+work_activity+'_'+hazards).append('<label style=" float: left;width: 100%;" class="c_t_j_'+add_others_injury+'">If others, please specify</label><input style="width: 82%;float: left;margin: 0px 5px 5px 0px;"  type="text" class="with_textbox_value c_t_j_'+add_others_injury+'" name="InjuryAccidentOthers[]" value=""/><a style=" float:left;" href="javascript:void(0)" class="btn btn-danger c_t_j_'+add_others_injury+' remove_other_injury" data-id ="add_others_injury_'+work_activity+'_'+hazards+'" data-remove="c_t_j_'+add_others_injury+'"> Remove</a> <br />');
 	});

$(document).on("click",".remove_other_data",function(e){
	var data_remove = $(this).attr("data-remove");
	var data_id = $(this).attr("data-id");
	$("#"+data_id+" ."+data_remove).remove();

});
$(document).on("click",".remove_other_injury",function(e){
	var data_remove = $(this).attr("data-remove");
	var data_id = $(this).attr("data-id");
	$("#"+data_id+" ."+data_remove).remove();

});


/*$('.date').each(function(e){

  attrName = $(this).attr("id");
alert(attrName);
    $(this).datepicker();
});*/


});//]]>
