<?php session_start(); include_once 'header.php';

if(!$_SESSION['adminid'])
{
    ?><script type="text/javascript">window.location.assign("index.php")</script>
    <?php
}
include_once 'constant.php';
?>
  <style type="text/css">
    body { padding: 10px;}
    .clonedInput { padding: 10px; border-radius: 5px; background-color: rgba(243, 237, 237, 0.51);}



    .red
    {
      color: red;
      font-size: 17px;
      font-weight: bolder;
    }
    .green
    {
      color: green;
      font-size: 17px;
      font-weight: bolder;
    }
    .yellow
    {
      color: yellow;
      font-size: 17px;
      font-weight: bolder;
    }

	.ui-datepicker-header ui-widget-header ui-helper-clearfix ui-corner-all
	{
		width:327;
	}

  </style>
<script src="js/new_wa.js" type='text/javascript'></script>


<?php
    include_once("config.php");
    $raMembers =(mysqli_query($con,"SELECT * FROM ramember"));

  ?>
<div class="container">

<form method="post" action="riskmange.php" class="inlineForm" enctype="multipart/form-data" >


  <input type="hidden" name="RA_MemberCount" id="RA_MemberCount" value="1" />
   <input type="hidden" name="workactivityCount" id="workactivityCount" value="1" />


      <div class="col-sm-12 form_pad">
                <h3>Add New Risk Assessment</h3>
                <hr class="add_risk">
                <div class="col-sm-12 form-row">
                            <div class="col-sm-6">
                              <label class="col-sm-4">RA Leader:</label>
                              <div class="col-sm-8"><?php echo $_SESSION['name']; ?></div>
                            </div>
                </div>

                <div class="col-sm-12 form-row">
                          <div class="col-sm-6">

                            <label class="col-sm-4">Company:</label>
                            <div class="col-sm-8">QE Safety Consultancy Pte Ltd</div>
                          </div>

                          <div class="col-sm-6">

                            <label class="col-sm-4">Reference No:</label>
                            <div class="col-sm-8">0000 (Ref. No. will be auto generated when saved.)</div>

                          </div>
                </div>


                <div class="col-sm-12 form-row">
                          <div class="col-sm-6">
                            <div class="col-sm-12 form-group float-label-control">
                                <label class="col-sm-12" for="">Risk Location</label>
                                <input name="location" type="text" class="form-control" placeholder="Risk Location" required>
                            </div>
<!--                             <label class="col-sm-4">Risk Location:</label>
                            <label class="col-sm-8">
                              <input name="location" class="span4" type="text" id="inputSaving" placeholder="" required></label> -->
                          </div>

                          <div class="col-sm-6">
                              <div class="col-sm-12 form-group float-label-control">
                                  <label class="col-sm-12" for="">Creation Date</label>
                                  <input name="creationDate" type="text" class="span4 date form-control" placeholder="Creation Date" required>
                              </div>                            
<!--                             <label class="col-sm-4">Creation Date:</label>
                            <label class="col-sm-8">
                               <input name="creationDate" class="span4 date" type="text" id="creationDate" placeholder="" required></label>


                            </label> -->

                          </div>
                </div>


                <div class="col-sm-12 form-row">
                            <div class="col-sm-6">
                              <div class="col-sm-12 form-group float-label-control">
                                  <label class="col-sm-12" for="">Risk Process</label>
                                  <input name="process" type="text" class="form-control" placeholder="Risk Process" required>
                              </div>
<!--                               <label class="col-sm-4">Risk Process:</label>
                              <label class="col-sm-8">
                                <input name="process" class="span4" type="text" id="inputSaving" placeholder="" required>
                              </label> -->
                            </div>
                            <div class="col-sm-6">
                              <label class="col-sm-4 compulsary">Next Review Date:</label>
                              <select  name="expiry_date">
                                <option value="1" selected>1 year</option>
                                <option value="2" >2 years</option>
                                <option value="3" >3 years</option>
                              </select>
                            </div>

                </div>
                <div class="col-sm-12"> <hr class="add_activity"></div>


               <div class="col-sm-12 form-row">

                  <a class="btn addMember" id="add_new_member">
                    <i class="fa fa-plus" ></i> Add RA Member</a>

               </div>

                <div class="clear-fix"></div>



                <div id="clonedInput1" class=" col-sm-12 form-row clonedInput repeatingMember">

                    <div class="col-sm-6">
                        <label class="col-sm-4">RA Members:</label>
                        <label class="col-sm-8">
                        <select  name="RA_Member[]" class="span4" type="text" id="inputSaving" placeholder="">
                          <option value="">-- Select RA members --</option>
                          <?php foreach ($raMembers as $raMember) {

                            echo "<option value=".$raMember["id"].">".$raMember["name"]."</option>";
                          }?>
                        </select>
                        </label>
                    </div>
                    <a class="col-sm-1 btn btn-danger deleteMember"><i class="fa fa-trash"></i>Remove</a>

              </div>






<div class="col-sm-12"> <hr class="add_risk"></div>

<div style="display:none" id="toCopyDiv">
      <div id="clonedInput1"  class=" col-sm-12  clonedInput repeatingSection tocopy">

              <div class="col-sm-7"><h3 class="head_title">Work Activity 2 </h3></div>

                   <button class="col-sm-2 btn addWorkActivity" id="add_new_work"><i class="fa fa-plus" ></i> New work activity</button>

                   <input type="hidden" name="workactivity_a_id_1" id="workactivity_a_id_1" value="1" />
                   <input type="hidden" name="hazardsCount[]" id="hazardsCount" value="1" />




                  <button class="col-sm-2 btn btn-danger  deleteWorkActivity " style="margin-left:5px;">Remove work action</button>


                    <div class="col-sm-12">
                        <hr class="add_risk" />
                        <div class="col-sm-12 form-row">
                            <label class="col-sm-3">Work Activity:</label>
                            <input class="col-sm-8" type="text" id="inputSaving" name="work_activity[]" value="" placeholder="" required>
                        </div>
                       <div class="clearfix"></div>
                       <hr class="add_activity"/>

                    </div>

                  <div class="col-sm-12 hazardSection hazardSectionCopy">



                        <div class="col-sm-6 form-row">
                          <div class="form-row">
                            <label class="col-sm-6">Hazard:</label>
                            <select class="col-sm-6" name="Hazard[]"  id="get_injury_dynamic" >
                            	<option value="">Choose Hazard</option>
                                <?php
                								foreach($harzard as $harzard_key => $harzard_value)
                								{
                									echo "<option value=\"".$harzard_key."\">".$harzard_value."</option>";
                								}
                								?>


                            </select>
                            <div class="ajax_loader" style="display:none;position: absolute;right: 0;">
                            	<img src="ajax-loader.gif" />
                            </div>
                          </div>
                          <div class="form-row other_hazard" style="display:none">
                            <label style=" float: left;width: 100%;" >If others, please specify</label>
                            <input style="width: 82%;float: left;margin: 0px 5px 5px 0px;"  type="text" class="with_textbox_value c_t_h_1" name="HazardOther[]" value=""/>
                          </div>
                          <div class="generate_dynamic_content">
                          <select class="col-sm-6" name="InjuryAccident[]" >
                          <option value="">Choose InjuryAccident</option>';
                          </select>
                          </div>

                          <div class="form-row">
                            <label class="col-sm-6">Severity:</label>

                            <select class="severity col-sm-6 btn btn-default  " id="change_severity" name="severity[]">
                              <option value="-">Select severity</option>
                              <option value="5">(5) Catastrophic</option>
                              <option value="4">(4) Major</option>
                              <option value="3">(3) Moderate</option>
                              <option value="2">(2) Minor</option>
                              <option value="1">(1) Negligible</option>
                            </select>


                          </div>

                          <div class="form-row">
                            <label class="col-sm-6">Likelihood:</label>
                            <select class="likelihood col-sm-6 btn btn-default " id="change_likehood" name="likelihood[]">
                              <option value="-">Select likelihood</option>
                              <option value="5">(5) Almost Certain</option>
                              <option value="4">(4) Frequent</option>
                              <option value="3">(3) Occasional</option>
                              <option value="2">(2) Remote</option>
                              <option value="1">(1) Rare</option>
                            </select>
                          </div>



                        </div>






                        <div class="col-sm-6 form-row">



                          <div class="form-row">
                            <label class="col-sm-4">Risk Level:</label>
                            <label class="col-sm-8 riskLevel"></label>

                          </div>

                          <div class="form-row">
                            <label class="col-sm-6">Additional Risk Control:</label>

                            <textarea class="col-sm-6" type="text" id="inputSaving" name="additionalRiskContro[]" rows="5"></textarea>


                          </div>
                          <div class="clearfix"></div>

                          <div class="form-row">
                            <label class="col-sm-6">Severity:</label>

                            <select class="severitysecond col-sm-6 btn btn-default  " id="inputSaving" name="severitySecond[]">
                            <option value="-">Select severity</option>
                               <option value="5">(5) Catastrophic</option>
                              <option value="4">(4) Major</option>
                              <option value="3">(3) Moderate</option>
                              <option value="2">(2) Minor</option>
                              <option value="1">(1) Negligible</option>
                            </select>


                          </div>

                          <div class="form-row">
                            <label class="col-sm-6">Likelihood:</label>
                            <select class="likelihoodsecond col-sm-6 btn btn-default  " id="inputSaving" name="likelihoodSecond[]">
                              <option value="-">Select likelihood</option>
                              <option value="5">(5) Almost Certain</option>
                              <option value="4">(4) Frequent</option>
                              <option value="3">(3) Occasional</option>
                              <option value="2">(2) Remote</option>
                              <option value="1">(1) Rare</option>
                            </select>
                          </div>







                        </div>
                       <div class="clearfix"></div>


                       <hr class="add_activity"/>



                       <div class="col-sm-12 form-row">
                             <input type="hidden" name="hazardsActionOfficerCount[]" id="hazardsActionOfficerCount" value="1" />
                                <div class="row col-sm-12 form-row">

                                    <a class="col-sm-2 btn addActionMember" id="add_new_member"><i class="fa fa-plus"></i>Action Officer</a>
                                    <a class="col-sm-2 col-sm-offset-1 btn addOtherActionMember" id="add_new_other_member"><i class="fa fa-plus"></i> Others</a>
                                    <div class="col-sm-1"> </div>
                                    <div class="form-row col-sm-6">
                                      <label class="col-sm-6">Action Date:</label>
                                      <select class="col-sm-2 btn btn-default" id="inputSaving" name="actionDate[]">
                                         <?php for ($i=1; $i < 32; $i++)
                                        {
                                          # code...
                                          ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                          <?php
                                        }
                                       ?>
                                      </select>

                                      <select class="col-sm-2 btn btn-default" id="inputSaving" name="actionMonth[]">
                                        <?php for ($i=1; $i < 13; $i++)
                                        {
                                          # code...
                                          ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                          <?php
                                        }
                                       ?>
                                      </select>

                                      <select class="col-sm-2 btn btn-default" id="inputSaving" name="actionYear[]">
                                        <?php for ($i=2016; $i < 2025; $i++)
                                        {
                                          # code...
                                          ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                          <?php
                                        }
                                       ?>

                                      </select>

                                    </div>
                                </div>
                                <div id="clonedInput1" class="row repeatingActionOfficer">

                                    <div class="col-sm-6">

                                        <label class="col-sm-6">Action Officer:</label>
                                        <select name="actionOfficer[]" class="col-sm-6" type="text" id="inputSaving" placeholder="">
                                          <?php foreach ($raMembers as $raMember) {
                                            echo "<option value=".$raMember["id"].">".$raMember["name"]."</option>";
                                          }?>
                                        </select>
                                    </div>
                                     <button class="col-sm-1 btn btn-danger deleteActonOfficer" style="margin-left:20px;">Remove</button>
                                </div>
                                <div style="display:none">
                                  <div class="row repeatingOtherActionOfficer">

                                      <div class="col-sm-6">

                                          <label class="col-sm-6">Action Officer:</label>
                                          <input type="text" name="actionOfficer[]"   class="col-sm-6" >
                                      </div>
                                       <button class="col-sm-1 btn btn-danger deleteActonOfficer" style="margin-left:20px;">Remove</button>
                                  </div>
                                </div>
                            </div>


                      <div class="clearfix"></div>
                      <hr class="add_activity"/>


                        <div class="clearfix"></div>


                       <div class="clearfix"></div>
                       <a class="btn addHazards" id="add_new_work"><i class="fa fa-plus"></i> Add hazards</a>
                       <button class="btn btn-danger pull-right deleteHazards">Remove Hazards</button>
                      <div class="clearfix"></div>
                        <hr class="add_activity"/>
                  </div>
          </div>

</div>

          <div id="clonedInput1" class=" col-sm-12 clonedInput repeatingSection">

              <div class="col-sm-7"><h3>Work Activity 1</h3></div>

               <button class="col-sm-2 btn addWorkActivity" id="add_new_work"><i class="fa fa-plus" ></i> New work activity</button>

               <input type="hidden" name="workactivity_a_id_1" id="workactivity_a_id_1" value="" />
               <input type="hidden" name="hazardsCount[]" id="hazardsCount" value="1" />

              <div class="col-sm-3"></div>
               <div class="col-sm-2 text-right">
                  <a class="btn btn-danger  deleteWorkActivity" style="margin-left:5px; margin-top:15px;"><i class="fa fa-trash" ></i> Delete</a>
               </div>
               <hr />

                    <div class="col-sm-12">
                        
                        <div class="col-sm-12 form-group float-label-control">
                            <label class="col-sm-12" for="">Work Activity</label>
                            <input name="work_activity[]" type="text" class="form-control" placeholder="Work Activity" required>
                        </div>
<!--                         <div class="col-sm-12 form-row">
                            <label class="col-sm-3" >Work Activity :</label>
                            <input class="col-sm-8" type="text" id="inputSaving" name="work_activity[]" value="" placeholder="" required>
                        </div> -->
                       <div class="clearfix"></div>

                    </div>

                  <div class="col-sm-12 hazardSection">



                        <div class="col-sm-6 form-row">
                          <div class="form-row">
                            <label class="col-sm-6">Hazard:</label>
                            <select class="col-sm-6" name="Hazard[]"  onchange="get_injuery(this,this.value,'dynamic_data_control_injuery_1_1',1,1);">
                            	<option value="">Choose Hazard</option>
                                 <?php
								foreach($harzard as $harzard_key => $harzard_value)
								{
									echo "<option value=\"".$harzard_key."\">".$harzard_value."</option>";
								}
								?>

                            </select>
                               <div class="ajax_loader" style="display:none;position: absolute;right: 0;">
                                    <img src="ajax-loader.gif" />
                                </div>
                          </div>
                          <div class="form-row other_hazard" style="display:none">
                            <label style=" float: left;width: 100%;" >If others, please specify</label>
                            <input style="width: 82%;float: left;margin: 0px 5px 5px 0px;"  type="text" class="with_textbox_value c_t_h_1" name="HazardOther[]" value=""/>
                          </div>
                        <div id="dynamic_data_control_injuery_1_1">

                       	</div>

                          <div class="form-row">
                            <label class="col-sm-6">Severity:</label>

                            <select class="severity col-sm-6 btn btn-default" id="change_severity_1_1" name="severity[]">
                              <option value="-">Select severity</option>
                              <option value="5">(5) Catastrophic</option>
                              <option value="4">(4) Major</option>
                              <option value="3">(3) Moderate</option>
                              <option value="2">(2) Minor</option>
                              <option value="1">(1) Negligible</option>
                            </select>


                          </div>

                          <div class="form-row">
                            <label class="col-sm-6">Likelihood:</label>
                            <select class="likelihood col-sm-6 btn btn-default  " id="change_likehood_1_1" name="likelihood[]">
                              <option value="-">Select likelihood</option>
                              <option value="5">(5) Almost Certain</option>
                              <option value="4">(4) Frequent</option>
                              <option value="3">(3) Occasional</option>
                              <option value="2">(2) Remote</option>
                              <option value="1">(1) Rare</option>
                            </select>
                          </div>

                        </div>


                        <div class="col-sm-6 form-row">



                          <div class="form-row">
                            <label class="col-sm-4">Risk Level:</label>
                            <label class="col-sm-8 riskLevel"></label>
                          </div>

                          <div class="form-row">
                            <label class="col-sm-6">Additional Risk Control:</label>

                            <textarea class="col-sm-6" type="text" id="inputSaving" name="additionalRiskContro[]" rows="5"></textarea>


                          </div>
                          <div class="clearfix"></div>

                          <div class="form-row">
                            <label class="col-sm-6">Severity:</label>

                            <select class="severitysecond col-sm-6 btn btn-default " id="inputSaving" name="severitySecond[]">
                              <option value="-">Select severity</option>
                              <option value="5">(5) Catastrophic</option>
                              <option value="4">(4) Major</option>
                              <option value="3">(3) Moderate</option>
                              <option value="2">(2) Minor</option>
                              <option value="1">(1) Negligible</option>
                            </select>


                          </div>

                          <div class="form-row">
                            <label class="col-sm-6">Likelihood:</label>
                            <select class="likelihoodsecond col-sm-6 btn btn-default " id="inputSaving" name="likelihoodSecond[]">
                              <option value="-">Select likelihood</option>
                              <option value="5">(5) Almost Certain</option>
                              <option value="4">(4) Frequent</option>
                              <option value="3">(3) Occasional</option>
                              <option value="2">(2) Remote</option>
                              <option value="1">(1) Rare</option>
                            </select>
                          </div>







                        </div>
                       <div class="clearfix"></div>


                       <hr class="add_activity"/>


                            <div class="col-sm-12 form-row">
                             <input type="hidden" name="hazardsActionOfficerCount[]" id="hazardsActionOfficerCount" value="1" />
                                <div class="row col-sm-12 form-row">
                                    <a class="col-sm-2 btn addActionMember" id="add_new_member"><i class="fa fa-plus"></i>Action Officer</a>
                                    <a class="col-sm-2 col-sm-offset-1 btn addOtherActionMember" id="add_new_other_member"><i class="fa fa-plus"></i> Others</a>
                                    <div class="col-sm-1"> </div>
                                    <div class="form-row col-sm-6">
                                      <label class="col-sm-6">Action Date:</label>
                                      <select class="col-sm-2 btn btn-default" id="inputSaving" name="actionDate[]">
                                         <?php for ($i=1; $i < 32; $i++)
                                        {
                                          # code...
                                          ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                          <?php
                                        }
                                       ?>
                                      </select>

                                      <select class="col-sm-2 btn btn-default" id="inputSaving" name="actionMonth[]">
                                        <?php for ($i=1; $i < 13; $i++)
                                        {
                                          # code...
                                          ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                          <?php
                                        }
                                       ?>
                                      </select>

                                      <select class="col-sm-2 btn btn-default" id="inputSaving" name="actionYear[]">
                                        <?php for ($i=2016; $i < 2025; $i++)
                                        {
                                          # code...
                                          ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                          <?php
                                        }
                                       ?>

                                      </select>

                                    </div>
                                </div>
                                <div id="clonedInput1" class="row repeatingActionOfficer">

                                    <div class="col-sm-6">

                                        <label class="col-sm-6">Action Officer:</label>
                                        <select name="actionOfficer[]" class="col-sm-6" type="text" id="inputSaving" placeholder="">
                                          <?php foreach ($raMembers as $raMember) {
                                            echo "<option value=".$raMember["id"].">".$raMember["name"]."</option>";
                                          }?>
                                        </select>
                                    </div>
                                    <button class="col-sm-1 btn btn-danger deleteActonOfficer" style="margin-left:20px;">Remove</button>
                                </div>
                            </div>





                      <div class="clearfix"></div>
                      <hr class="add_activity"/>


                        <div class="clearfix"></div>
                       <a class="btn addHazards" id="add_new_work"><i class="fa fa-plus"></i> Add hazards</a>
                       <button class="btn btn-danger pull-right deleteHazards">Remove Hazards</button>
                      <div class="clearfix"></div>
                        <hr class="add_activity"/>
                  </div>
          </div>

        <div class="col-sm-12 form_pad">
            <h3>Declaration of Risk Assessment</h3>
            <hr class="add_risk" />
            <div class="row form-row">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <label>I hereby confirm that all information above are accurate to my best knowledge.</label>
                </div>
            </div>



            <div class="row form-below">
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class=" col-sm-8 btn-right">



                        <input class="btn draft" type="submit" value="Save as Draft" name="saveAsDraft"  >

                         <input class="btn draft" type="submit" value="Next" name="saveAsDraft" style="padding-left:30px; padding-right:30px;"  >
                         <input class="btn " type="submit" id="cancel" value="Cancel" name="Cancel"   style="padding-left:30px; padding-right:30px;"   >




                    </div>
                </div>
            </div>

        </div>




    </form>
</div>



<script type="text/javascript">
    document.getElementById("cancel").onclick = function () {
        location.href = "listwork_activity.php";
    };
</script>




<script type="text/javascript">

$('.draft').click(function(e){
  $("#toCopyDiv input").prop('required', false);
  $("#toCopyDiv select").prop('required', false);


});
function risk_control(this_value,class_value)
{
	if($(this_value).prop("checked") == true)
	{
		$("."+class_value).prop("checked",true);
	}else
	{
		$("."+class_value).prop("checked",false);
	}

}
  //  $('#edit-submitted-first-name').prop('required', false);
function get_injuery(main,thisvalue,option_id,wrk,haz)
{
  if (thisvalue === "other") {
    $(main).parent().parent().find(".other_hazard").css("display","block");
    // return;
  }
  else
    $(main).parent().parent().find(".other_hazard").css("display","none");
	$(main).parent().find(".ajax_loader").css("display","block");
	$.ajax({
		type:"POST",
		url:"get_ajax.php",
		data:{"key_value":thisvalue,wrk_act:wrk,hazard:haz},
		success:function(response){
			$(main).parent().find(".ajax_loader").css("display","none");
			$("#"+option_id).html(response);
		}
	});
}
function servity_hood(main,thisvalue,wrk,haz){
	var servity = $(main).find(':selected').attr('data-servity');
	$('#change_severity_'+wrk+'_'+haz).val(servity);
	$('.severity').trigger('change');
	$('#change_likehood_'+wrk+'_'+haz).val(servity);
	$('.likelihood').trigger('change');
}

</script>
 <?php include_once 'footer.php';?>
