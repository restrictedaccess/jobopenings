<!DOCTYPE html>
<html lang="en">
<head>
    <title>BPO Company Remote Staff Official Website | Hire Offshore Staff from Remote Staff | Outsource Staff,
        Inexpensive and Professional Online Staff, Virtual Assistant and IT Offshore Outsourcing BPO Services</title>
    {include file="include.tpl"}
    <script type="text/javascript" src="js/typeahead.bundle.min.js"></script>
    <script type="text/javascript" src="js/step2.js"></script>
    <script type="text/javascript" src="../../js/ga_tracking_code.js"></script>
</head>

<body>
{include file="header.tpl"}
<div id="container"><!-- Bootstrap container -->


    <!--  Start of Application Form Content -->
    <section id="application-form">
        <div class="col-md-1">&nbsp;</div>
        <div class="col-md-10">
            <p class="intro">
                You Can Earn Well, Excel and Achieve the Career Growth You Want -<br/>
                <span>By following these easy steps</span>
            </p>
            <div class="row">
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-10">
                    <section id="step1">
                        <div class="steps"><a href="#">Email Validation</a></div>
                    </section>
                    <!-- Step 2: Personal Details -->
                    <section id="step2">
                        <div class="steps"><a href="#">Personal Details</a></div>
                        <form method="POST" action="{$base_au_url}/portal/jobseeker_register/finalize_step2.php"
                              class="form-horizontal pb20" role="form" id="register-form" enctype="multipart/form-data">
                            <input type="hidden" name="hashcode" value="{$validation.hashcode}"/>
                            <input type="hidden" name="pc" value="{$cookie_promo_code}" id="pcode"/>
                            <input type="hidden" name="userid" id="jobseeker_userid"/>
                            <input type="hidden" name="session_code" id="jobseeker_session_code"/>
                            <p class="reqd marked">* Are required</p>
                            <div class="form-group">
                                <div class="col-sm-3 required-field">
                                    <label for="inputFirstName">First Name<span class="marked">*</span></label>
                                    <input type="text" name="first_name" class="form-control" id="inputFirstName"
                                           value="{$registration_data.fname}">
                                </div>
                                <div class="col-sm-3">
                                    <label for="inputMiddleName">Middle Name</label>
                                    <input type="text" name="middle_name" class="form-control" id="inputMiddleName">
                                </div>
                                <div class="col-sm-4 required-field">
                                    <label for="inputLastName">Last Name<span class="marked">*</span></label>
                                    <input type="text" name="last_name" class="form-control" id="inputLastName"
                                           value="{$registration_data.lname}">
                                </div>
                            </div>
                            <div class="form-group required-field">
                                <label class="col-sm-3 control-label">Date of Birth</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="birth_month">
                                        {foreach from=$option_months item=month key=k}
                                            {if $registration_data.bmonth eq $k}
                                                <option value="{$k}" selected>{$month}</option>
                                            {else}
                                                <option value="{$k}">{$month}</option>
                                            {/if}
                                        {/foreach}
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <select class="form-control" name="birth_day">
                                        {foreach from=$option_days item=day key=k}
                                            {if $registration_data.bday eq $k}
                                                <option value="{$k}" selected>{$day}</option>
                                            {else}
                                                <option value="{$k}">{$day}</option>
                                            {/if}
                                        {/foreach}
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="birth_year" class="form-control" placeholder="Year"
                                           value="{$registration_data.byear}"/>
                                </div>
                            </div>
                            <div class="form-group required-field">
                                <label for="inputCurrentJobTitle" class="col-sm-3 control-label">Current Job Title<span
                                            class="marked">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" name="current_job_title" class="form-control"
                                           id="inputCurrentJobTitle">
                                </div>
                            </div>
                            <div class="form-group required-field">
                                <label for="inputNationality" class="col-sm-3 control-label">Gender<span class="marked">*</span></label>
                                <div class="col-sm-5">
                                    <label class="radio-inline">
                                        <input type="radio" id="gender_male" name="gender" value="Male"
                                               {if $registration_data.gender eq 'Male'}checked{/if}> Male
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" id="gender_female" name="gender" value="Female"
                                               {if $registration_data.gender eq 'Female'}checked{/if}> Female
                                    </label>
                                </div>

                            </div>
                            <div class="form-group linesep">
                                <label for="inputNationality" class="col-sm-3 control-label">Nationality</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="nationality" id="inputNationality"
                                           value="{$registration_data.nationality}">
                                </div>

                            </div>
                            <div class="form-group required-field">
                                <label for="inputFacebook" class="col-sm-3 control-label">Email<span
                                            class="marked">*</span></label>
                                <div class="col-sm-5">
                                    <input type="email" name="email" class="form-control" id="inputEmail"
                                           value="{$validation.email}" readonly="">
                                </div>
                            </div>
                            <div class="form-group required-field">
                                <label for="inputReferred" class="col-sm-3 control-label">Password<span
                                            class="marked">*</span></label>
                                <div class="col-sm-5">
                                    <input type="password" name="password" class="form-control" id="inputPassword">
                                </div>
                            </div>
                            <div class="form-group linesep required-field">
                                <label for="inputReferred" class="col-sm-3 control-label">Confirm Password<span
                                            class="marked">*</span></label>
                                <div class="col-sm-5">
                                    <input type="password" name="confirm_password" class="form-control"
                                           id="inputConfirmPassword">
                                </div>
                            </div>

                            <div class="form-group required-field">
                                <label for="inputMobile" class="col-sm-3 control-label">Mobile No.<span
                                            class="marked">*</span></label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="handphone_country_code"
                                           id="inputHandphoneCountryCode" value="63">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="mobile" id="inputMobile">

                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-6"><span class="help-block" style="display:block!important">Mobile Number(ex. 9479959825)<br>Do NOT add any space or special character</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputLandline" class="col-sm-3 control-label">Landline No.</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="tel_area_code" id="inputAreaCode">
                                </div>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="tel_no" id="inputLandline">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label"></label>
                                <div class="col-sm-6"><span class="help-block" style="display:block!important">Area Code(ex. 632) - Number(ex. 8464249)<br>Do NOT add any space or special character</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkype" class="col-sm-3 control-label">Skype ID</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="skype_id" id="inputSkype">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputLinkedin" class="col-sm-3 control-label">Linked In</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="linked_in" id="inputLinkedin">
                                </div>
                            </div>
                            <div class="form-group  linesep">
                                <label for="inputFacebook" class="col-sm-3 control-label">Facebook</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="facebook" id="inputFacebook">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputHomeEquipment" class="col-sm-3 control-label">Work from home
                                    equipment</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="inputHomeEquipment" name="equipment">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSpeedTest" class="col-sm-3 control-label">Speed Test</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="speed_test" id="inputSpeedTest">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3"></label>
                                <div class="col-sm-8">
                                    <span class="help-block" style="display:block!important">Go to <a
                                                href="http://speedtest.net" target="_blank">www.speedtest.net</a> website and place what your upload &amp; download Mbps speed .</span>
                                    <br/>
                                    <img src="/portal/images/speedtest.jpg" width="400" height="264" border="1">
                                </div>
                            </div>

                            <div id="skill-list">

                            </div>
                            <div class="form-group">
                                <div class="col-sm-5">
                                    <button class="btn btn-xs btn-default" id="add-more-skill">Add More Skill</button>

                                </div>
                            </div>
                            <div class="form-group linesep required-field">
                                <label for="inputUploadResume" class="col-sm-3 control-label">Upload Resume<span
                                            class="marked">*</span></label>
                                <div class="col-sm-5 padt7">
                                    <input type="file" id="inputUploadResume" name="resume">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Select Industry</label>
                                <div class="input-group col-sm-9">
                                    <input type="text" class="form-control" name="industry_list" readonly="readonly"
                                           placeholder="Please Select Industry">
                                    <span class="input-group-btn">
						            <button id="select-industry-launcher" class="btn btn-default" type="button"
                                            style="margin-top:0" data-toggle="modal" data-target=".bs-example-modal-lg"
                                            data-keyboard="false"><i
                                                class="glyphicon glyphicon-new-window"></i></button>
						          </span>

                                </div>
                            </div>
                            <div class="form-group linesep">
                                <label class="col-sm-3 control-label"></label>
                                <div class="input-group col-sm-9">
                                    <p id="industry-selection"></p>
                                </div>
                            </div>

                            <!-- industry list -->
                            <div id="industry_list"></div>
                            <!-- /industry list -->
                            <p class="muted">Let us know of your top 3 role preference.</p>
                            <div class="form-group">
                                <label for="selectPositionFirstChoice" class="col-sm-3">First Choice</label>
                                <div class="col-sm-5">
                                    <select id="selectPositionFirstChoice" name="position_first_choice"
                                            class="form-control position-choice"
                                            data-target="#task-list-position-first-choice">
                                        {$position_first_choice_options}
                                    </select>
                                    {*any experience doing this role?<br/> {$position_first_choice_exp_options}<br/>*}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="position_first_choice_exp_num" class="col-sm-3">Experience (in years)</label>
                                <div class="col-sm-5" style=" margin-bottom: 30px;">
                                    <input class="form-control" type="number" id="position_first_choice_exp_num" name="position_first_choice_exp_num" />
                                    {*<select id="selectPositionFirstChoice" name="position_first_choice"*}
                                            {*class="form-control position-choice"*}
                                            {*data-target="#task-list-position-first-choice">*}
                                        {*{$position_first_choice_options}*}
                                    {*</select>*}
                                    {*any experience doing this role?<br/> {$position_first_choice_exp_options}<br/>*}
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="selectPositionSecondChoice" class="col-sm-3">Second Choice</label>
                                <div class="col-sm-5">
                                    <select id="selectPositionSecondChoice" name="position_second_choice"
                                            class="form-control position-choice"
                                            data-target="#task-list-position-second-choice">
                                        {$position_second_choice_options}
                                    </select>
                                    {*any experience doing this role?<br/> {$position_second_choice_exp_options}<br/>*}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="position_second_choice_exp_num" class="col-sm-3">Experience (in years)</label>
                                <div class="col-sm-5" style=" margin-bottom: 30px;">
                                    <input class="form-control" type="number" id="position_second_choice_exp_num" name="position_second_choice_exp_num" />
                                    {*<select id="selectPositionFirstChoice" name="position_first_choice"*}
                                    {*class="form-control position-choice"*}
                                    {*data-target="#task-list-position-first-choice">*}
                                    {*{$position_first_choice_options}*}
                                    {*</select>*}
                                    {*any experience doing this role?<br/> {$position_first_choice_exp_options}<br/>*}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="selectPositionThirdChoice" class="col-sm-3">Third Choice</label>
                                <div class="col-sm-5">
                                    <select id="selectPositionThirdChoice" name="position_third_choice"
                                            class="form-control position-choice"
                                            data-target="#task-list-position-third-choice">
                                        {$position_third_choice_options}
                                    </select>
                                    {*any experience doing this role?<br/> {$position_third_choice_exp_options}<br/>*}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="position_third_choice_exp_num" class="col-sm-3">Experience (in years)</label>
                                <div class="col-sm-5">
                                    <input class="form-control" type="number" id="position_third_choice_exp_num" name="position_third_choice_exp_num" />
                                    {*<select id="selectPositionFirstChoice" name="position_first_choice"*}
                                    {*class="form-control position-choice"*}
                                    {*data-target="#task-list-position-first-choice">*}
                                    {*{$position_first_choice_options}*}
                                    {*</select>*}
                                    {*any experience doing this role?<br/> {$position_first_choice_exp_options}<br/>*}
                                </div>
                            </div>

                            <p class="muted" id="previous-task-label" style="margin-top:15px">Select Tasks previously
                                performed. Please also indicate how happy you are performing the task from 1-10, 10
                                being the highest.</p>

                            <div id="task-list-position-first-choice"></div>
                            <div id="task-list-position-second-choice"></div>
                            <div id="task-list-position-third-choice"></div>
                            <div class="form-group linesep"></div>

                            <div class="form-group required-field">
                                <label for="select_source" class="col-sm-3">How did you hear about us?<span
                                            class="marked">*</span></label>
                                <div class="col-sm-5">
                                    <select name="external_source" id="external_source_select" class="form-control">
                                        <option value="">Please Select</option>
                                        {foreach from=$sources item=source}
                                            <option value="{$source}">{$source}</option>
                                        {/foreach}
                                    </select>
                                </div>
                            </div>


                            <div class="form-group" id="external_source_others_div" style="display:none">
                                <label for="select_source" class="col-sm-3">Please Specify</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="external_source_others"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputReferred" class="col-sm-3 control-label">Referred by</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="referred" id="inputReferred">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input type="submit" class="btn btn-info" value="Save">
                                </div>
                            </div>
                        </form>
                    </section><!-- End of Step 2: Personal Details -->
                    <section id="step3">
                        <div class="steps"><a href="#">Schedule an Interview</a></div>
                    </section>
                </div>
            </div>
        </div>
        <div class="col-md-1">&nbsp;</div>
        <div class="clear">&nbsp;</div>
    </section><!--  end of Application Form Content -->

</div><!--  End of Container -->

{literal}
    <script type="text/x-handlebars-template" id="skill-item">
        <div class="form-group">
            <label class="col-sm-3 control-label">Add Skills</label>
            <div class="col-sm-3">
                <input type="text" name="skill[]" class="form-control skill-item" placeholder="Enter Skill"/>
            </div>
            <div class="col-sm-3">
                <select name="proficiency[]" class="form-control">
                    <option value="" label="Proficiency"></option>
                    <option value="3" label="Advanced">Advanced</option>
                    <option value="2" label="Intermediate">Intermediate</option>
                    <option value="1" label="Beginner">Beginner</option>
                </select>
            </div>
            <div class="col-sm-2">
                <select name="experience[]" id="experience" class="form-control">
                    <option value="" label="Years"></option>
                    <option value="0.5" label="Less than 6 months">Less than 6 months</option>
                    <option value="0.75" label="Over 6 months">Over 6 months</option>
                    <option value="1" label="1 year">1 year</option>
                    <option value="2" label="2 years">2 years</option>
                    <option value="3" label="3 years">3 years</option>
                    <option value="4" label="4 years">4 years</option>
                    <option value="5" label="5 years">5 years</option>
                    <option value="6" label="6 years">6 years</option>
                    <option value="7" label="7 years">7 years</option>
                    <option value="8" label="8 years">8 years</option>
                    <option value="9" label="9 years">9 years</option>
                    <option value="10" label="10 years">10 years</option>
                    <option value="11" label="More than 10 years">More than 10 years</option>
                </select>
            </div>
        </div>
    </script>
    <script type="text/x-handlebars-template" id="skill-item-no-label">
        <div class="form-group">
            <label class="col-sm-3 control-label"></label>
            <div class="col-sm-3">
                <input type="text" name="skill[]" class="form-control skill-item" placeholder="Enter Skill"/>
            </div>
            <div class="col-sm-3">
                <select name="proficiency[]" class="form-control">
                    <option value="" label="Proficiency"></option>
                    <option value="3" label="Advanced">Advanced</option>
                    <option value="2" label="Intermediate">Intermediate</option>
                    <option value="1" label="Beginner">Beginner</option>
                </select>
            </div>
            <div class="col-sm-2">
                <select name="experience[]" id="experience" class="form-control">
                    <option value="" label="Years"></option>
                    <option value="0.5" label="Less than 6 months">Less than 6 months</option>
                    <option value="0.75" label="Over 6 months">Over 6 months</option>
                    <option value="1" label="1 year">1 year</option>
                    <option value="2" label="2 years">2 years</option>
                    <option value="3" label="3 years">3 years</option>
                    <option value="4" label="4 years">4 years</option>
                    <option value="5" label="5 years">5 years</option>
                    <option value="6" label="6 years">6 years</option>
                    <option value="7" label="7 years">7 years</option>
                    <option value="8" label="8 years">8 years</option>
                    <option value="9" label="9 years">9 years</option>
                    <option value="10" label="10 years">10 years</option>
                    <option value="11" label="More than 10 years">More than 10 years</option>
                </select>
            </div>
            <div class="col-sm-1" style="height:34px;">
                <span class="glyphicon glyphicon-remove remove-skill"></span>
            </div>
        </div>
    </script>
    <script type="text/x-handlebars-template" id="task-item-template">
        {{#each result}}
        <div class="form-group">
            <div class="col-sm-8">
                <label class="checkbox">
                    <input type="checkbox" name="task[]" value="{{id}}"/>{{value}}
                </label>
            </div>
            <div class="col-sm-3">
                <select name="ratings[]" class="rating-select form-control">
                    <option value="">Select Rate</option>
                    {{#each ../ratings}}
                    <option value="{{this}}">{{this}}</option>
                    {{/each}}
                </select>
            </div>
        </div>

        {{/each}}
    </script>
    <script type="text/x-handlebars-template" id="industry-item-template">
        <input type="hidden" name="industry_id[]" value="{{id}}"/>
    </script>
{/literal}

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close close-industry" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Please Select Industry</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-6">
                    {foreach from=$industries1 item=industry}
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="{$industry.id}" data-value="{$industry.value}"
                                       class="industry-item">
                                {$industry.value}
                            </label>
                        </div>
                    {/foreach}
                </div>
                <div class="col-md-6">
                    {foreach from=$industries2 item=industry}
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="{$industry.id}" data-value="{$industry.value}"
                                       class="industry-item">
                                {$industry.value}
                            </label>
                        </div>
                    {/foreach}
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default close-industry">Close</button>
                <button id="confirm-industry" type="button" class="btn btn-primary">Confirm</button>
            </div>
        </div>
    </div>
</div>
{include file='footer.tpl'}
</body>