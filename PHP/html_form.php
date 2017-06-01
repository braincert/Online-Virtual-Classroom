<?php if(!$_REQUEST['ajax']){?> 
<link rel="stylesheet" type="text/css" href="https://www.braincert.com/static/app/bootstrap.min.css"  >
 <link rel="stylesheet" type="text/css" href="https://www.braincert.com/static/app/css.css">
    <link rel="stylesheet" type="text/css" href="https://www.braincert.com/static/app/pretty-json.css">
    <!-- lib -->
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://www.braincert.com/static/app/underscore-min.js"></script>
    <script type="text/javascript" src="https://www.braincert.com/static/app/backbone-min.js"></script>

    <!-- pretty JSON v 0.1  -->
    <script type="text/javascript" src="https://www.braincert.com/static/app/pretty-json-min.js"></script>
<table>
    <tr>
        <td>
            <a href="html_form.php?show=getClassList">Get ClassList</a>
        </td>
        <td>
            <a href="html_form.php?show=schedule">Class Schedule</a>
        </td>
        <td>
            <a href="html_form.php?show=removeclass">Remove Class</a>
        </td>
        
    </tr>
    <tr>
	    <td>
            <a href="html_form.php?show=getDiscount">List Class Discount</a>
        </td>
        <td>
            <a href="html_form.php?show=creatediscount">ADD Discount</a>
        </td>
        <td>
            <a href="html_form.php?show=removediscount">Remove Discount</a>
        </td>
    </tr>
	<tr>
		<td>
			<a href="html_form.php?show=getclassrecording">Get Class Recording</a>
		</td>
		<td>
			<a href="html_form.php?show=getrecording">Get record</a>
		</td>
		<td>
			<a href="html_form.php?show=changestatusrecording">Change Status of recording</a>
		</td>
		<td>
			<a href="html_form.php?show=removeclassrecording">Remove Class Recording</a>  
		</td>
	</tr>
	<tr>
		<td>
			<a href="html_form.php?show=getprice">List Class Prices</a>
		</td>
		<td>
			<a href="html_form.php?show=createprice">ADD price</a>
		</td>
		<td>
			<a href="html_form.php?show=removeprice">Remove Price</a>
		</td>
	</tr>
	<tr>
		<td>
			<a href="html_form.php?show=getlaunchurl">Get launch url</a>
		</td>
	</tr>
</table>

 
<?php } ?>
<?php
$show = '';
if(isset($_REQUEST['task'])){
require_once ('api-library.php'); 
$bc = new Braincert("CLGny53iAzrbrOTf9Agj");

	switch($_REQUEST['task']){
		case 'getClassList':
		 $classList = $bc -> getClassList($_POST);
		 // echo '<pre>';
		 print_r($classList);
		exit;
		break;
		
		case 'schedule':
		$bcgetclass = $bc -> getclass($_POST);
		// echo '<pre>';
	    print_r($bcgetclass);
		exit;
		break;
		
	 	case 'listPrices':
		$bclistPrices = $bc -> listPrices($_POST);
		// echo '<pre>';
		print_r($bclistPrices);
		exit;
		break;
		
		case 'listdiscount':
		$bclistdiscount = $bc -> listdiscount($_POST);
		// echo '<pre>';
	    print_r($bclistdiscount);
		exit;
		break;
		
		case 'getclassrecording':
		 $bclistPrices = $bc -> getclassrecording($_POST);
		// echo '<pre>';
	    print_r($bclistPrices);
		exit;
		break;
		
		case 'getrecording':
		 $getrecording = $bc -> getrecording($_POST);
		// echo '<pre>';
	    print_r($getrecording);
		exit;
		break;
		
		case 'changestatusrecording':
		 $changestatusrecording = $bc -> changestatusrecording($_POST);
		// echo '<pre>';
	    print_r($changestatusrecording);
		exit;
		break;
		
		case 'removediscount':
		$removediscount = $bc -> removediscount($_POST);
		// echo '<pre>';
	    print_r($removediscount);
		exit;
		break;
		
		case 'removeprice':
		$removeprice = $bc -> removeprice($_POST);
		// echo '<pre>';
	    print_r($removeprice);
		exit;
		break;

		case 'getlaunchurl':
		$getlaunchurl = $bc -> getlaunchurl($_POST);
		// echo '<pre>';
	    print_r($getlaunchurl);
		exit;
		break;
		
		
		case 'createprice':
		$createprice = $bc -> getPrice($_POST);
		// echo '<pre>';
	    print_r($createprice);
		exit;
		break;
		
		case 'creatediscount':
		$creatediscount = $bc -> getDiscount($_POST);
		// echo '<pre>';
	    print_r($creatediscount);
		exit;
		break;
		
		case 'removeclassrecording':
		$removeclassrecording = $bc -> removeclassrecording($_POST);
		// echo '<pre>';
	    print_r($removeclassrecording);
		exit;
		break;
		
		case 'removeclass':
		$removeclass = $bc -> removeclass($_POST);
		// echo '<pre>';
	    print_r($removeclass);
		exit;
		break;
		
		default:
		break;
	}
}
 ?>

<script type="text/javascript">
function displayresult(result,type){
	if(type == 'xml'){
		jQuery('#result').html(result);	
	}else{
		var json = result ; 
		var o;
		try{ o = JSON.parse(json); }
		catch(e){ 
			alert('not valid JSON');
			return;
		}
		  var el = {						 
			result: jQuery('#result')
		};
			var node = new PrettyJSON.view.Node({ 
			el:el.result, 
			data:o
		});
	}
}

function setweekday(el) {
	if(! jQuery(el).parent('label').closest(".active").length ) {
		jQuery(el).parent('label').addClass('active');
	}else{
		jQuery(el).parent('label').removeClass('active');
	}
}

jQuery(document).ready(function () {

 jQuery('#save_button').click( function(event) {
	var task = jQuery('#task').val();
	if(task == 'getClassList'){
		var class_id = jQuery('#class_id').val();
	}
	
	var type1 = '<?php echo $_REQUEST['format']?>';
	jQuery("#format").val(type1);
	jQuery.ajax({
	            url: 'html_form.php?ajax=true&task='+task,
	            type: 'POST',
				data: jQuery("#adminForm").serialize(),
	            success:function(result) 
	            {
					displayresult(result, type1);
					result2 = JSON.parse(result);
					var htmlstr = "<button class=\"btn btn-primary\" onclick=\"window.open('"+result2[0].launchurl+"');\" id=\"launch_button\">Launch</button>";
					if(result2[0].type == '1' && class_id != ''){
						jQuery('#launch-div').html(htmlstr);
					}
	            	//jQuery('#getClassListdiv').html(result);
					
	            }
	        });
       });
});
</script>            

<?php if($_REQUEST['show'] == 'schedule'){ 
	require_once ('api-library.php'); 
	$bc = new Braincert("CLGny53iAzrbrOTf9Agj");
	
	
?>
 <form class="form-horizontal form-validate" id="adminForm" method="post" enctype="multipart/form-data">
 
    <div class="control-group">
            <label class="span1 hasTip"  title="Class end time">Set Location:</label>
            <div class="controls">
            <select class="form-control valid" name="location_id" id="location_id">
				<option value="1">US East (Dallas, TX)</option>
				<option value="3">US East (New York)</option>
				<option value="8">US East (Miami, FL)</option>
				<option value="2">US West (Los Angeles, CA)</option>
				<option value="4">Europe (Frankfurt, Germany)</option>
				<option value="5">Europe (London)</option>
				<option value="9">Europe (Milan, Italy)</option>
				<option value="13">Europe (Paris, France)</option>
				<option value="6">Asia Pacific (Bangalore, India)</option>
				<option value="7">Asia Pacific (Singapore)</option>
				<option value="10">Asia Pacific (Tokyo, Japan)</option>
				<option value="14">Asia Pacific (Beijing, China)</option>
				<option value="11">Middle East (Dubai, UAE)</option>
				<option value="12">Australia (Sydney)</option>
			</select>
            </div>
        </div>
		<div class="control-group">
          	<label for="title" class="span1 hasTip" title="Classroom Title">Title:</label>
            <div class="controls">
	          	<input type="text" placeholder="Title" id="title" name="title">
            </div>
        </div>
        <div class="control-group">
          	<label for="date" class="span1 hasTip" title="Class date">Date:</label>
            <div class="controls">
          	<input type="text" placeholder="Date" id="date" name="date" >
			<b>(yyyy-mm-dd), Example: { 2014-09-04 }</b>
            </div>
        </div>
        <div class="control-group">
          	<label for="from" class="span1 hasTip" title="Class start time">From:</label>
            <div class="controls">
       		<input type="text" data-format="hh:mm A" placeholder="From" id="class_start_time" name="start_time" >
            <b>(hh:mmA), Example: { 09:50AM }</b>
            </div>
         </div>
       	<div class="control-group"> 
          	<label class="span1 hasTip"  title="Class end time">To:</label>
            <div class="controls">
       		<input type="text" data-format="hh:mm A" placeholder="To" id="class_end_time" name="end_time" >
            <b>(hh:mmA), Example: { 10:50AM }</b>
            </div>
       	</div>
        <div class="control-group">
              	<label class="span1 hasTip"  title="timezone">Time Zone:</label>
                <div class="controls">
                <select name="timezone" id="timezone" class="valid">
                    <option title="GMT Standard Time" value="28">(GMT) Greenwich Mean Time : Dublin, Edinburgh, Lisbon, London</option>
                    <option title="Greenwich Standard Time" value="30">(GMT) Monrovia, Reykjavik</option>
                    <option title="W. Europe Standard Time" value="72">(GMT+01:00) Amsterdam, Berlin, Bern, Rome, Stockholm, Vienna</option>
                    <option title="Romance Standard Time" value="53">(GMT+01:00) Brussels, Copenhagen, Madrid, Paris</option>
                    <option title="Central European Standard Time" value="14">(GMT+01:00) Sarajevo, Skopje, Warsaw, Zagreb</option>
                    <option title="W. Central Africa Standard Time" value="71">(GMT+01:00) West Central Africa</option>
                    <option title="Jordan Standard Time" value="83">(GMT+02:00) Amman</option>
                    <option title="Middle East Standard Time" value="84">(GMT+02:00) Beirut</option>
                    <option title="Egypt Standard Time" value="24">(GMT+02:00) Cairo</option>
                    <option title="South Africa Standard Time" value="61">(GMT+02:00) Harare, Pretoria</option>
                    <option title="FLE Standard Time" value="27">(GMT+02:00) Helsinki, Kyiv, Riga, Sofia, Tallinn, Vilnius</option>
                    <option title="Jerusalem Standard Time" value="35">(GMT+02:00) Jerusalem</option>
                    <option title="E. Europe Standard Time" value="21">(GMT+02:00) Minsk</option>
                    <option title="Namibia Standard Time" value="86">(GMT+02:00) Windhoek</option>
                    <option title="GTB Standard Time" value="31">(GMT+03:00) Athens, Istanbul, Minsk</option>
                    <option title="Arabic Standard Time" value="2">(GMT+03:00) Baghdad</option>
                    <option title="Arab Standard Time" value="49">(GMT+03:00) Kuwait, Riyadh</option>
                    <option title="Russian Standard Time" value="54">(GMT+03:00) Moscow, St. Petersburg, Volgograd</option>
                    <option title="E. Africa Standard Time" value="19">(GMT+03:00) Nairobi</option>
                    <option title="Georgian Standard Time" value="87">(GMT+03:00) Tbilisi</option>
                    <option title="Iran Standard Time" value="34">(GMT+03:30) Tehran</option>
                    <option title="Arabian Standard Time" value="1">(GMT+04:00) Abu Dhabi, Muscat</option>
                    <option title="Azerbaijan Standard Time" value="88">(GMT+04:00) Baku</option>
                    <option title="Caucasus Standard Time" value="9">(GMT+04:00) Baku, Tbilisi, Yerevan</option>
                    <option title="Mauritius Standard Time" value="89">(GMT+04:00) Port Louis</option>
                    <option title="Afghanistan Standard Time" value="47">(GMT+04:30) Kabul</option>
                    <option title="Ekaterinburg Standard Time" value="25">(GMT+05:00) Ekaterinburg</option>
                    <option title="Pakistan Standard Time" value="90">(GMT+05:00) Islamabad, Karachi</option>
                    <option title="West Asia Standard Time" value="73">(GMT+05:00) Islamabad, Karachi, Tashkent</option>
                    <option title="India Standard Time" value="33">(GMT+05:30) Chennai, Kolkata, Mumbai, New Delhi</option>
                    <option title="Sri Lanka Standard Time" value="62">(GMT+05:30) Sri Jayawardenepura</option>
                    <option title="Nepal Standard Time" value="91">(GMT+05:45) Kathmandu</option>
                    <option title="N. Central Asia Standard Time" value="42">(GMT+06:00) Almaty, Novosibirsk</option>
                    <option title="Central Asia Standard Time" value="12">(GMT+06:00) Astana, Dhaka</option>
                    <option title="Myanmar Standard Time" value="41">(GMT+06:30) Rangoon</option>
                    <option title="SE Asia Standard Time" value="59">(GMT+07:00) Bangkok, Hanoi, Jakarta</option>
                    <option title="North Asia Standard Time" value="50">(GMT+07:00) Krasnoyarsk</option>
                    <option title="China Standard Time" value="17">(GMT+08:00) Beijing, Chongqing, Hong Kong, Urumqi</option>
                    <option title="North Asia East Standard Time" value="46">(GMT+08:00) Irkutsk, Ulaan Bataar</option>
                    <option title="Malay Peninsula Standard Time" value="60">(GMT+08:00) Kuala Lumpur, Singapore</option>
                    <option title="W. Australia Standard Time" value="70">(GMT+08:00) Perth</option>
                    <option title="Taipei Standard Time" value="63">(GMT+08:00) Taipei</option>
                    <option title="Tokyo Standard Time" value="65">(GMT+09:00) Osaka, Sapporo, Tokyo</option>
                    <option title="Korea Standard Time" value="77">(GMT+09:00) Seoul</option>
                    <option title="Yakutsk Standard Time" value="75">(GMT+09:00) Yakutsk</option>
                    <option title="Cen. Australia Standard Time" value="10">(GMT+09:30) Adelaide</option>
                    <option title="AUS Central Standard Time" value="4">(GMT+09:30) Darwin</option>
                    <option title="E. Australia Standard Time" value="20">(GMT+10:00) Brisbane</option>
                    <option title="AUS Eastern Standard Time" value="5">(GMT+10:00) Canberra, Melbourne, Sydney</option>
                    <option title="West Pacific Standard Time" value="74">(GMT+10:00) Guam, Port Moresby</option>
                    <option title="Tasmania Standard Time" value="64">(GMT+10:00) Hobart</option>
                    <option title="Vladivostok Standard Time" value="69">(GMT+10:00) Vladivostok</option>
                    <option title="Central Pacific Standard Time" value="15">(GMT+11:00) Magadan, Solomon Is., New Caledonia</option>
                    <option title="New Zealand Standard Time" value="44">(GMT+12:00) Auckland, Wellington</option>
                    <option title="Fiji Standard Time" value="26">(GMT+12:00) Fiji, Kamchatka, Marshall Is.</option>
                    <option title="Azores Standard Time" value="6">(GMT-01:00) Azores</option>
                    <option title="Cape Verde Standard Time" value="8">(GMT-01:00) Cape Verde Is.</option>
                    <option title="Mid-Atlantic Standard Time" value="39">(GMT-02:00) Mid-Atlantic</option>
                    <option title="E. South America Standard Time" value="22">(GMT-03:00) Brasilia</option>
                    <option title="Argentina Standard Time" value="94">(GMT-03:00) Buenos Aires</option>
                    <option title="SA Eastern Standard Time" value="55">(GMT-03:00) Buenos Aires, Georgetown</option>
                    <option title="Greenland Standard Time" value="29">(GMT-03:00) Greenland</option>
                    <option title="Montevideo Standard Time" value="95">(GMT-03:00) Montevideo</option>
                    <option title="Newfoundland Standard Time" value="45">(GMT-03:30) Newfoundland</option>
                    <option title="Atlantic Standard Time" value="3">(GMT-04:00) Atlantic Time (Canada)</option>
                    <option title="SA Western Standard Time" value="57">(GMT-04:00) Georgetown, La Paz, San Juan</option>
                    <option title="Central Brazilian Standard Time" value="96">(GMT-04:00) Manaus</option>
                    <option title="Pacific SA Standard Time" value="51">(GMT-04:00) Santiago</option>
                    <option title="Venezuela Standard Time" value="76">(GMT-04:30) Caracas</option>
                    <option title="SA Pacific Standard Time" value="56">(GMT-05:00) Bogota, Lima, Quito</option>
                    <option title="Eastern Standard Time" value="23">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                    <option title="US Eastern Standard Time" value="67">(GMT-05:00) Indiana (East)</option>
                    <option title="Central America Standard Time" value="11">(GMT-06:00) Central America</option>
                    <option title="Central Standard Time" value="16">(GMT-06:00) Central Time (US &amp; Canada)</option>
                    <option title="Mexico Standard Time" value="37">(GMT-06:00) Guadalajara, Mexico City, Monterrey</option>
                    <option title="Canada Central Standard Time" value="7">(GMT-06:00) Saskatchewan</option>
                    <option title="US Mountain Standard Time" value="68">(GMT-07:00) Arizona</option>
                    <option title="Mexico Standard Time" value="38">(GMT-07:00) Chihuahua, La Paz, Mazatlan</option>
                    <option title="Mountain Standard Time" value="40">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                    <option title="Pacific Standard Time" value="52">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                    <option title="Pacific Standard Time (Mexico)" value="104">(GMT-08:00) Tijuana, Baja California</option>
                    <option title="Alaskan Standard Time" value="48">(GMT-09:00) Alaska</option>
                    <option title="Hawaiian Standard Time" value="32">(GMT-10:00) Hawaii</option>
                    <option title="Samoa Standard Time" value="58">(GMT-11:00) Midway Island, Samoa</option>
                    <option title="Dateline Standard Time" value="18">(GMT-12:00) International Date Line West</option>
                    <option title="Eastern Daylight Time" value="105">(GMT-4:00) Eastern Daylight Time (US &amp; Canada)</option>
                    <option title="Central Europe Standard Time" value="13">GMT+01:00) Belgrade, Bratislava, Budapest, Ljubljana, Prague</option>
                </select>
				</div>
		</div>
        <div class="control-group"> 
          	<label class="span1 hasTip"  title="Class end time">Description:</label>
            <div class="controls">
            <textarea rows="4" cols="50" name="description"></textarea>
       		<!--<input type="text" placeholder="description" id="description" name="description" >-->
            </div>
       	</div>
        
        <div class="control-group">
              	<label class="span1 hasTip"  title="category">Category:</label>
                <div class="controls">
                <select name="category" id="category" class="in-selection required error">
                <option value="">-- Select One --</option>
                <option value="1">Arts and Photography</option>
                <option value="2">Business</option>
                <option value="4">Crafts and Hobbies</option>
                <option value="5">Design</option>
                <option value="6">Education</option>
                <option value="7">Games</option>
                <option value="8">Health and Benefits</option>
                <option value="9">Humanities</option>
                <option value="10">Language</option>
                <option value="11">Lifestyle</option>
                <option value="12">Music and Movies</option>
                <option value="13">Sports</option>
                <option value="14">Technology</option>
                </select>
                </div>
		</div>
        
        <div class="control-group">  
          	<label class="span1 hasTip"  title="Recurring class">Recurring Class:</label>
            <div class="controls">
			<input type="radio" name="is_recurring" value="1">Yes    
			<input type="radio" name="is_recurring" value="0">No 
            </div>
       	</div>
        
        <div class="control-group"> 
	        <label class="span1 hasTip"  title="Class end time">When class repeats:</label>
            <div class="controls">
            <select name="repeat" style="display: inline-block;" class="required valid">
            <option value="">Select when class repeats</option>
            <option value="1">Daily (all 7 days)</option>
            <option value="2">6 Days(Mon-Sat)</option>
            <option value="3">5 Days(Mon-Fri)</option>
            <option value="4">Weekly</option>
            <option value="5">Once every month</option>
            <option value="6">On selected days</option>
            </select>
            </div>
		</div>
		<div class="control-group weeklytotaldays">
                <label class="control-label"></label>
                <div class="weekdays_label">
                <label for="su">
                    <input id="su" onclick="setweekday(this);" name="weekdays[]" type="checkbox" value="1" style="display:none;"> Sun
                </label>

                <label for="mo">
                    <input id="mo"  onclick="setweekday(this);" name="weekdays[]" type="checkbox" value="2" style="display:none;"> Mon
                </label>

                <label for="tue">
                    <input id="tue" onclick="setweekday(this);" name="weekdays[]"  type="checkbox" value="3" style="display:none;"> Tue
                </label>

                <label for="wed">
                    <input id="wed" onclick="setweekday(this);" name="weekdays[]" type="checkbox" value="4" style="display:none;"> Wed
                </label>

                <label for="thu">
                    <input id="thu"  onclick="setweekday(this);" name="weekdays[]" type="checkbox" value="5" style="display:none;"> Thu
                </label>

                <label for="fri">
                    <input id="fri"  onclick="setweekday(this);" name="weekdays[]"  type="checkbox" value="6" style="display:none;"> Fri
                </label>

                <label for="sat">
                    <input id="sat"  onclick="setweekday(this);" name="weekdays[]"  type="checkbox" value="7" style="display:none;"> Sat
                </label>
                </div>
             </div> 
        <div class="control-group">
        <label class="control-label" style="margin-left: 6px;">Ends:</label>
	        <div class="controls">
    		    
                    <span style="padding-bottom: 8px; cursor: pointer;float:left" class="radio1 inline">
                    <input type="radio" class="validate-recurring required error" name="afterclasses" id="optionsRadios1" value="0">
                    After&nbsp;
                    </span>
		        <div class="input-append">
                    <input type="text" class="span3" value="" name="end_classes_count" id="recurring_endclasses" style="min-height: 28px;">
                    <span class="add-on">Classes</span> (or)
                 </div>
		        <br><br>
                    <label style="padding-bottom: 8px; cursor: pointer;" class="radio1 inline">
                        <input type="radio" class="validate-recurring required error" name="afterclasses" id="optionsRadios2" value="1">
                        Ends on
			        </label>
		        <span>
                    <input type="text" class="span4" value="" name="end_date" id="recurring_enddate" style="min-height: 28px;">
		        </span>
	       
    	    </div>
        </div>

         <div class="control-group">
            <label class="span1 hasTip" title="Record Class">Allow attendees to change interface language:</label>
            <div class="controls">
            <input type="radio" id="allow_change_language_1" name="allow_change_interface_language" value="1">Yes
            <input type="radio" id="allow_change_language_2" name="allow_change_interface_language" value="0">No
            </div>
        </div>
          <?php           
               $langarray = array(1=> 'arabic',2=> 'bosnian',3=> 'bulgarian',4=> 'catalan',5=> 'chinese-simplified',6=> 'chinese-traditional',7=> 'croatian',8=> 'czech',9=> 'danish',10=> 'dutch',11=> 'english',12=> 'estonian',13=> 'finnish',14=> 'french',15=> 'german',16=> 'greek',17=> 'haitian-creole',18=> 'hebrew',19=> 'hindi',20=> 'hmong-daw',21=> 'hungarian',22=> 'indonesian',23=> 'italian',24=> 'japanese',25=> 'kiswahili',26=> 'klingon',27=> 'korean',28=> 'lithuanian',29=> 'malayalam',30=> 'malay',31=> 'maltese',32=> 'norwegian-bokma',33=> 'persian',34=> 'polish',35=> 'portuguese',36=> 'romanian',37=> 'russian',38=> 'serbian',39=> 'slovak',40=> 'slovenian',41=> 'spanish',42=> 'swedish',43=> 'tamil',44=> 'telugu',45=> 'thai',46=> 'turkish',47=> 'ukrainian',48=> 'urdu',49=> 'vietnamese',50=> 'welsh');
               ?>


        <div class="control-group" style="clear:both;" id="force_language">
                    <label class="span1 hasTip"  title="Set currency for shopping cart">Force Interface Language:</label>
                    <div class="controls">
                    <select class="in-selection required form-control" id="language" name="language">
    			    <?php  foreach($langarray as $key=>$val){  ?>
                         <option value="<?php echo $key;?>"><?php echo $val;?></option>
                    <?php } ?>
    	            </select>
                <br />
                <br />
                   </div>
        </div>

        <div class="control-group"> 
          	<label class="span1 hasTip"  title="Class end time">Record this class:</label>
            <div class="controls">
			<input type="radio" name="record" value="1">Yes
			<input type="radio" name="record" value="0">No
            </div>
       	</div>
       	<div class="control-group record_auto">
            <label class="span1 hasTip" title="Record Class">Start recording automatically when class starts:</label>
            <div class="controls">
            <input type="radio" name="start_recording_auto" value="2">
                    Yes&nbsp; &nbsp;    
            <input type="radio" name="start_recording_auto" value="1">
                    No
            </div>
        </div>

        <div class="control-group">
            <label class="span1 hasTip" title="Record Class">Classroom type:</label>
            <div class="controls">
            <input type="radio" class="required" name="classroom_type" id="classroom_typeyes" value="0"> whiteboard, audio/video, chat&nbsp; &nbsp;  
            <input type="radio"  class="required" name="classroom_type" id="classroom_typeno" value="1">
                    Whiteboard only
            </div>
        </div>

        <div class="control-group"> 
          	<label class="span1 hasTip"  title="Class end time">Who can see?:</label>
            <div class="controls">
			<input type="radio" name="whocansee" value="0">Public    
			<input type="radio" name="whocansee" value="1">Private 
            </div>
       	</div>
        <div class="control-group">  
          	<label class="span1 hasTip"  title="Class end time">Type:</label>
            <div class="controls">
			<input type="radio" name="ispaid" value="0">Free    
			<input type="radio" name="ispaid" value="1">Paid 
            </div>
       	</div>
       	
       	<div class="control-group">
              	<label class="span1 hasTip"  title="category">Currency:</label>
                <div class="controls">
				<select id="currency" name="currency" class="form-control valid">
					<option value="aud">AUD ($)</option>
					<option value="cad">CAD ($)</option>
					<option value="eur">EUR (&euro;)</option>
					<option value="gbp">GBP (&pound;)</option>
					<option value="nzd">NZD ($)</option> 
					<option value="usd" selected="selected">USD ($)</option> 
				</select>
                </div>
		</div>
        
        <div class="control-group"> 
          	<label class="span1 hasTip"  title="Max. attendees">Max. attendees:</label>
            <div class="controls">
       		<input type="text" placeholder="Max. attendees" id="seat_attendees" name="seat_attendees" >
            </div>
       	</div>
         <div class="control-group"> 
          	<label class="span1 hasTip"  title="Keywords">Keywords:</label>
            <div class="controls">
       		<input type="text" placeholder="Keywords" id="keywords" name="keywords" >
            </div>
       	</div>
        </div>
        <div>
        <input type="hidden" id="task" name="task" value="schedule"/>
        <input type="hidden" id="format" name="format" value=""/>
        <div class="control-group">
	        <div class="controls">
		        <button class="btn btn-primary" id="save_button" type="button" style="font-weight: bold;">Schedule class</button>
            </div>
     	</div>
        </div>
        
        
	</form>
   
 <?php } ?>
 
<?php if($_REQUEST['show'] == 'getClassList'){ ?>    
 <form class="form-horizontal form-validate" id="adminForm" method="post" enctype="multipart/form-data">
 <div class="control-group">
 <label class="span1 hasTip"  title="Class id">Class id:</label>
 <div class="controls">
	 <input type="text" placeholder="class id" id="class_id" name="class_id">
 </div>
 </div>
 <div class="control-group">
         <input type="hidden" id="task" name="task" value="getClassList"/>
         <input type="hidden" id="format" name="format" value=""/>
              <div class="controls">
                 <button class="btn btn-primary" id="save_button" type="button" style="font-weight: bold;">Get Class List</button>
             </div>
         </div>
    </form>
   
 <?php } ?>
  <?php if($_REQUEST['show'] == 'createprice'){ ?>
 <form class="form-horizontal form-validate" id="adminForm" method="post" enctype="multipart/form-data">
		<div class="control-group">
          	<label class="span1 hasTip" for="title"  title="Class id">Class id:</label>
            <div class="controls">
          	<input type="text" placeholder="Class id" id="class_id" name="class_id">
            </div>
        </div>
        <div class="control-group">
          	<label class="span1 hasTip" for="title"  title="Price">Price:</label>
            <div class="controls">
          	<input type="text" placeholder="price" id="price" name="price">
            </div>
        </div> 
         <div class="control-group">
          	<label  class="span1 hasTip" for="title"  title="Days (To Give Access for)">Days (To Give Access for):</label>
            <div class="controls">
          	<input type="text" placeholder="scheme_days" id="scheme_days" name="scheme_days">
            </div>
        </div>    
         <div class="control-group">
          	<label class="span1 hasTip" for="title"  title="Access type"> Access type:</label>
            <div class="controls">
          	<select  id="times" name="times">
				<option value="0">unlimited</option>
				<option value="1">limited</option>
			</select>
            </div>
        </div>    
         <div class="control-group">
          	<label class="span1 hasTip" for="title"  title="Number of Times">Number of Times:</label>
            <div class="controls">
          	<input type="text" placeholder="numbertimes" id="numbertimes" name="numbertimes">
            </div>
        </div>  
        
         <input type="hidden" id="task" name="task" value="createprice"/>
         <input type="hidden" id="format" name="format" value=""/>
         <div class="control-group">
          <div class="controls">
         <button class="btn btn-primary" id="save_button" type="button" style="font-weight: bold;">ADD Price</button>
         </div>
         </div>
    </form>
     
 <?php } ?>
 <?php if($_REQUEST['show'] == 'getprice'){ ?>
 <form class="form-horizontal form-validate" id="adminForm" method="post" enctype="multipart/form-data">
		<div class="control-group">
          	<label class="span1 hasTip" for="title"  title="Classroom id">Class id:</label>
            <div class="controls">
          	<input type="text" placeholder="class id" id="class_id" name="class_id">
            </div>
        </div>   
        
        
         <input type="hidden" id="task" name="task" value="listPrices"/>
         <input type="hidden" id="format" name="format" value=""/>
         <div class="control-group">
          <div class="controls">
         <button class="btn btn-primary" id="save_button" type="button" style="font-weight: bold;">Get Price List</button>
         </div>
         </div>
    </form>
      
 <?php } ?>
  <?php if($_REQUEST['show'] == 'removeprice'){ ?>
 <form class="form-horizontal form-validate" id="adminForm" method="post" enctype="multipart/form-data">
		<div class="control-group">
          	<label class="span1 hasTip" for="title"  title="Price id">Price id:</label>
            <div class="controls">
          	<input type="text" placeholder="Price id" id="id" name="id">
            </div>
        </div>    
         <input type="hidden" id="task" name="task" value="removeprice"/>
         <input type="hidden" id="format" name="format" value=""/>
         <div class="control-group">
          <div class="controls">
         <button class="btn btn-primary" id="save_button" type="button" style="font-weight: bold;">Remove Price</button>
         </div>
         </div>
    </form>
     
 <?php } ?>

 <?php if($_REQUEST['show'] == 'getlaunchurl'){ ?>
 <form class="form-horizontal form-validate" id="adminForm" method="post" enctype="multipart/form-data">

		<div class="control-group">
          	<label class="span1 hasTip" for="title"  title="Class id">Class id:</label>
            <div class="controls">
          	<input type="text" placeholder="Class id" id="class_id" name="class_id">
            </div>
        </div>    

        <div class="control-group">  
          	<label class="span1 hasTip"  title="Recurring class">Is Teacher:</label>
            <div class="controls">
			<input type="radio" name="isTeacher" value="1">Yes    
			<input type="radio" name="isTeacher" value="0">No 
            </div>
       	</div>

       	<div class="control-group">
          	<label class="span1 hasTip" for="User Name"  title="User Name">User Name:</label>
            <div class="controls">
          	<input type="text" placeholder="User Name" id="userName" name="userName">
            </div>
        </div> 

        <div class="control-group">
          	<label class="span1 hasTip" for="Course Name"  title="Course Name">Course Name:</label>
            <div class="controls">
          	<input type="text" placeholder="Course Name" id="courseName" name="courseName">
            </div>
        </div> 

        <div class="control-group">
          	<label class="span1 hasTip" for="Lesson Name"  title="Lesson Name">Lesson Name:</label>
            <div class="controls">
          	<input type="text" placeholder="Lesson Name" id="lessonName" name="lessonName">
            </div>
        </div> 

        
       	

         <input type="hidden" id="task" name="task" value="getlaunchurl"/>
         <input type="hidden" id="format" name="format" value=""/>
         <div class="control-group">
          <div class="controls">
         <button class="btn btn-primary" id="save_button" type="button" style="font-weight: bold;">Get Launch url</button>
         </div>
         </div>
    </form>
     
 <?php } ?>

 <?php if($_REQUEST['show'] == 'creatediscount'){ 
// echo date ('h:i:s');
 ?>
 <form class="form-horizontal form-validate" id="adminForm" method="post" enctype="multipart/form-data">
		<div class="control-group">
          	<label class="span1 hasTip" for="title"  title="Classroom id">Class id:</label>
            <div class="controls">
          	<input type="text" placeholder="class id" id="class_id" name="class_id">
            </div>
        </div>    
         <div class="control-group">
          	<label class="span1 hasTip" for="title"  title="discount_type">Discount Type:</label>
            <div class="controls">
            <select name="discount_type" class="valid"  id="coupon-type">
				<option value="0">$ Fixed Amount</option>
				<option value="1">% Percentage</option>
			</select>
            </div>
        </div>  
        <div class="control-group">
          	<label class="span1 hasTip" for="title"  title="Discount Price">Discount Price:</label>
            <div class="controls">
          	<input type="text" placeholder="discount" id="discount" name="discount">
            </div>
        </div> 
         <div class="control-group">
          	<label class="span1 hasTip" for="title"  title="Start Date">Start Date:</label>
            <div class="controls">
          	<input type="text" placeholder="start_date" id="start_date" name="start_date">
            <b>(yyyy-mm-dd), Example: { 2014-09-04 }</b>
            </div>
        </div> 
          <div class="control-group">
          	<label class="span1 hasTip" for="title"  title="End Date">End Date:</label>
            <div class="controls">
          	<input type="text" placeholder="end_date" id="end_date" name="end_date">
            <b>(yyyy-mm-dd), Example: { 2014-09-04 }</b>
            </div>
        </div>
        <div class="control-group">
          	<label class="span1 hasTip" for="title"  title="Discount Limit">Discount Limit:</label>
            <div class="controls">
          	<input type="text" placeholder="discount_limit" id="discount_limit" name="discount_limit">
            </div>
        </div> 
         <div class="control-group">
          	<label class="span1 hasTip" for="title"  title="discount_code">Discount Code:</label>
            <div class="controls">
          	<input type="text" placeholder="discount_code" id="discount_code" name="discount_code">
            </div>
        </div>   
        
         <input type="hidden" id="task" name="task" value="creatediscount"/>
         <input type="hidden" id="format" name="format" value=""/>
         <div class="control-group">
          <div class="controls">
         <button class="btn btn-primary" id="save_button" type="button" style="font-weight: bold;">ADD Discount</button>
         </div>
         </div>
    </form>
     
 <?php } ?>
 <?php if($_REQUEST['show'] == 'getDiscount'){ ?>
 <form class="form-horizontal form-validate" id="adminForm" method="post" enctype="multipart/form-data">
		<div class="control-group">
          	<label class="span1 hasTip" for="title"  title="Classroom id">class id:</label>
            <div class="controls">
          	<input type="text" placeholder="class id" id="class_id" name="class_id">
            </div>
        </div>    
         <input type="hidden" id="task" name="task" value="listdiscount"/>
         <input type="hidden" id="format" name="format" value=""/>
         <div class="control-group">
          <div class="controls">
         <button class="btn btn-primary" id="save_button" type="button" style="font-weight: bold;">Get Discount</button>
         </div>
         </div>
    </form>
     
 <?php } ?>
  <?php if($_REQUEST['show'] == 'removediscount'){ ?>
 <form class="form-horizontal form-validate" id="adminForm" method="post" enctype="multipart/form-data">
		<div class="control-group">
          	<label class="span1 hasTip" for="title"  title="Classroom id">Discount id:</label>
            <div class="controls">
          	<input type="text" placeholder="Discount id" id="discountid" name="discountid">
            </div>
        </div>    
         <input type="hidden" id="task" name="task" value="removediscount"/>
         <input type="hidden" id="format" name="format" value=""/>
          <div class="control-group">
           <div class="controls">
         <button class="btn btn-primary" id="save_button" type="button" style="font-weight: bold;">Remove Discount</button>
         </div>
         </div>
    </form>
      
 <?php } ?>
 
  <?php if($_REQUEST['show'] == 'getclassrecording'){ ?>
 <form class="form-horizontal form-validate" id="adminForm" method="post" enctype="multipart/form-data">
		<div class="control-group">
          	<label class="span1 hasTip" for="title"  title="Classroom id">class id:</label>
            <div class="controls">
          	<input type="text" placeholder="class id" id="class_id" name="class_id">
            </div>
        </div>    
         <input type="hidden" id="task" name="task" value="getclassrecording"/>
         <input type="hidden" id="format" name="format" value=""/>
          <div class="control-group">
           <div class="controls">
         <button class="btn btn-primary" id="save_button" type="button" style="font-weight: bold;">Get Classrecording</button>
         </div>
         </div>
    </form>
     
 <?php } ?>
  
  <?php if($_REQUEST['show'] == 'getrecording'){ ?>
 <form class="form-horizontal form-validate" id="adminForm" method="post" enctype="multipart/form-data">
		<div class="control-group">
          	<label class="span1 hasTip" for="title"  title="Record id">Record id:</label>
            <div class="controls">
          	<input type="text" placeholder="Record id" id="record_id" name="record_id">
            </div>
        </div>    
         <input type="hidden" id="task" name="task" value="getrecording"/>
         <input type="hidden" id="format" name="format" value=""/>
          <div class="control-group">
           <div class="controls">
         <button class="btn btn-primary" id="save_button" type="button" style="font-weight: bold;">Get Record</button>
         </div>
         </div>
    </form>
     
 <?php } ?>
   <?php if($_REQUEST['show'] == 'changestatusrecording'){ ?>
 <form class="form-horizontal form-validate" id="adminForm" method="post" enctype="multipart/form-data">
		<div class="control-group">
          	<label class="span1 hasTip" for="title"  title="Record id">Record id:</label>
            <div class="controls">
          	<input type="text" placeholder="Record id" id="id" name="id">
            </div>
        </div>    
         <input type="hidden" id="task" name="task" value="changestatusrecording"/>
         <input type="hidden" id="format" name="format" value=""/>
          <div class="control-group">
           <div class="controls">
         <button class="btn btn-primary" id="save_button" type="button" style="font-weight: bold;">Change Status Recording</button>
         </div>
         </div>
    </form>
      
 <?php } ?>
   <?php if($_REQUEST['show'] == 'removeclassrecording'){ ?>
 <form class="form-horizontal form-validate" id="adminForm" method="post" enctype="multipart/form-data">
		<div class="control-group">
          	<label class="span1 hasTip" for="title"  title="Record id">Record id:</label>
            <div class="controls">
          	<input type="text" placeholder="Record id" id="id" name="id">
            </div>
        </div>    
         <input type="hidden" id="task" name="task" value="changestatusrecording"/>
         <input type="hidden" id="format" name="format" value=""/>
          <div class="control-group">
           <div class="controls">
         <button class="btn btn-primary" id="save_button" type="button" style="font-weight: bold;">Remove Class Recording</button>
         </div>
         </div>
    </form>
    
 <?php } ?>
 
    <?php if($_REQUEST['show'] == 'removeclass'){ ?>
 <form class="form-horizontal form-validate" id="adminForm" method="post" enctype="multipart/form-data">
		<div class="control-group">
          	<label class="span1 hasTip" for="title"  title="Class id">Class id:</label>
            <div class="controls">
          	<input type="text" placeholder="Class id" id="cid" name="cid">
            </div>
        </div>    
         <input type="hidden" id="task" name="task" value="removeclass"/>
         <input type="hidden" id="format" name="format" value=""/>
          <div class="control-group">
           <div class="controls">
         <button class="btn btn-primary" id="save_button" type="button" style="font-weight: bold;">Remove Class</button>
         </div>
         </div>
    </form>
      
 <?php } ?>
 
<!--Result Div Start-->
<div class="control-group"><div class="controls"><div>Result</div></div></div>
<div id="result" style="width: 75%; margin-left: 170px;"></div>
<div class="control-group"><div class="controls"><div id="launch-div"></div></div>

</div>
<!--Result Div End-->
<style>
.control-group {
    clear: both;
    margin: 10px;
}
.control-group > label {
    display: block;
    float: left;
    width: 150px;
	font-weight: bold;
}
.controls > input{
	 min-height: 28px;
	}
	
td {
    padding-bottom: 5px !important;
}

table {
    margin: 14px 0;
}
tr {
    display: table-cell;
    padding: 0 15px;
    vertical-align: top;
}
td {
    display: table-row;
    line-height: 25px;
    vertical-align: top;
}
.control-group .controls > div {
    margin-left: 170px;
    width: 75%;
	font-weight: bold;
	font-size: 25px;
}
.form-horizontal .controls {
	
    margin-left: 170px;
}
.add-on {
    font-size: 13px;
}
.input-append {
    font-size: 12px !important;
	margin: 0 !important;
}
.controls input[type="radio"] {
    margin-bottom: 8px;
    margin-right: 3px;
}
.weekdays_label > label {
    border: 1px solid;
    cursor: pointer;
    float: left;
    font-size: 16px;
    margin: 5px;
    text-align: center;
    width: 40px;

}
.weekdays_label label.active {
    color: red;
}
</style>