<!DOCTYPE html>
<html>

<head>	
	
		<!-- This links to the stylesheet that recognizes media queries -->
		<link href="media-queries.css" rel="stylesheet" type="text/css">
		
		<link rel="stylesheet" type="text/css" href="didit.css" />
		
		<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script src="jquery.gomap-1.3.2.js"></script>
		
				<!-- defines the OKbutton_Click of the second phone to display the thridphone -->
		<script>
			
			function OKbutton_Onclick(){
				$("#thirdphone").show(0);
					
					// pulls  data from the DB and creates checkbox list from PHP function createUserTask
				  $.ajax({
					  url:'createUserTask.php',
					  complete: function (response) {
						  $('#checklist').html(response.responseText);
					  },
					  error: function () {
						  $('#checklist').html('Unable to retrieve Task List');
					  },
				  });
  				  return false;		
			}
			
			function cancelButton_Onclick(){
				$("#secondphone").hide(0);
				$("#thirdphone").hide(0);
				$("#fourthphone").hide(0);
			}
				
			function backButton_onClick(){
				$("#thirdphone").hide(0);
				$("#fourthphone").hide(0);
			}
				
			function activateButton(){
				// setLongLat passed as a variable from the function below
				//setLatLong(35.083615, -106.6439937);
				setMarker(35.083615,-106.6439937,"DDC","CodeIt", false);
				$("#fourthphone").show(0);
			}
			
			function setLatLong(lat, longitude)
			{
				$(document).ready(function()
				{
					$('#diditMap').goMap(
					{
						latitude: lat,
						longitude: longitude,
						zoom: 12
					});
				});
			}
			
			function setMarker(lat, longitude, title, markerContent, popUpState)
			{
					$(document).ready(function()
					{
						$('#diditMap').goMap(
						{
							markers:
							[{
								latitude: lat,
								longitude: longitude,
								title: title,
								html :
								{
									content: markerContent,
									popup: popUpState
									
								}
							}],
							zoom: 15
						});
					});	
			};
		</script>
		
		<title> Didit </title>

</head>
	
		<body bgcolor="black">
		
			<div id="wrapper">
				<div id="header">
					<div id="logo"> <img src="globedirectionsorig.png" alt="Didit!" width="110" height="110"> 	
					</div>
			
					<div id="logotext"> Task Master </div>
			
					<div id="nav">
						<ul>
							<li><a class="vtip" title="Welcome Home" href="#"> Create Account </a></li>
							<li><a class="vtip" title="Want to know about us" href="#"> Login </a></li>
<!--							
							<li><a class="vtip" title="Check out our previous work" href="#">Portfolio</a></li>
							<li><a class="vtip" title="Hava a question? Then ask us." href="#">Contact Us</a></li>
-->				
						</ul>
						
					</div>
				</div>
					<nav id="navbar1">
					<a href="/html/">Personal</a> 
					<a href="/css/">Small Business</a> 
					<a href="/js/">Commercial</a> 
					
					</nav>
						
					<nav id="navbar2">
					<a href="/html/">Home</a> |
					<a href="/css/">About</a> |
					<a href="/js/">Overview</a> |
					<a href="/jquery/">Screenshots</a>
					</nav>
				
				
				<div id="content">
					<div id="firstphone">
					<!-- adding form to first iPhone -->
						<div id="formPhone1">
							 <form id="firstPhoneForm" method="post" action="postTask.php"> <!-- change action="" to do nothing b/c <script> will pick it up -->
								<table> Create DiDit! List 
									<tr></tr>
									<tr>
										<td><label for="description"> </label></td>
										<td><input type="text" name="task1" class="formInfo" id="taskbox" placeholder=" Task 1"/></td>
									</tr>
									<tr>
										<td><label for="task2"> </label></td>
										<td><input type="text" name="task2" class="formInfo" id="taskbox" placeholder=" Task 2"/></td>
									</tr>
									<tr>
										<td><label for="task3"> </label></td>
										<td><input type="text" name="task3" class="formInfo" id="taskbox" placeholder=" Task 3"/></td>
									</tr>
									<tr>
										<td><label for="task4"> </label></td>
										<td><input type="text" name="task4" class="formInfo" id="taskbox" placeholder=" Task 4"/></td>
									</tr>
									<tr>
										<td><label for="task5"> </label></td>
										<td><input type="text" name="task5" class="formInfo" id="taskbox" placeholder=" Task 5"/></td>
									</tr>
									<tr>
										<td><label for="task6"> </label></td>
										<td><input type="text" name="task6" class="formInfo" id="taskbox" placeholder=" Task 6"/></td>
									</tr>	
								</table>
				
<!-- submit button -->							
							 	<input type="submit" name="submit" value="insert" id="submitButton"/>		<!-- Submit Button -->
							</form>
						</div>	
					</div>

<!-- Phone Number TWO -->	
				
					<div id="secondphone">
						<button onclick="OKbutton_Onclick()" id="OKbutton"/>
						<button onclick="cancelButton_Onclick()" id="cancelButton"/>
					</div>
<!-- Phone Number TWO end -->

			
					<div id="thirdphone">
						<div id="thirdPhoneScreen">Check DiDit! Tasks
							<div id="checklist">
							</div>
<!-- BACK BUTTON & GO BUTTON -->
							<button onclick="backButton_onClick()" id="backButton"/>
							<button onclick="activateButton()" id="activateButton"/>
						</div>
					</div>
<!-- FOURTH PHONE BEGIN-->					
					<div id="fourthphone">
						<div id="fourthPhoneScreen">
							<div id="diditMap"></div>
<!-- Commented out the Bottom DIV	<div id="fourthBottom"><img src="bottomdistances.png"	alt="Map"></div> -->
						</div>
					</div>
<!-- FOURTH PHONE END -->					
				</div>
				
				<div id="subcontent">
					<div id="subcontent1">
						<ul><h3>Personal Assistant</h3>
								<li>Forget Dylan, Not!</li>
								<li>Punctuality</li>
								<li>Efficiency</li>
						</ul>	
					</div>
					<div id="subcontent2"> 
						<ul><h3>Small Business</h3>
								<li>Forget Dylan, Not!</li>
								<li>Punctuality</li>
								<li>Efficiency</li>
						</ul>
					</div>
					<div id="subcontent3"> 
						<ul><h3>Commerical</h3>
								<li>Forget Dylan, Not!</li>
								<li>Punctuality</li>
								<li>Efficiency</li>
						</ul>
					</div>
				</div>
			
				<div id="footer"><strong>Status: </strong><span id="statusBar">DidIt Loaded OK</span><br />
					FOOTER THIS!
				</div>
				
				<!-- Setting the form info for the 1st and 2nd phone also hiding the phones when the page loads-->
				<script>
					
					// hides the phones when the page loads
					$("#secondphone").hide(0);
					$("#thirdphone").hide(0);
					$("#fourthphone").hide(0);
					
					// this is just setting it up until it is called
					// in-line function after the submit all has to be within the () closing after brackets
					$("#firstPhoneForm").submit(function(event)
					{
						// on submit button, from previous phone will display the second phone
						$('#secondphone').show(0);
						 $.ajax({
								type: "POST",
								url: "postTask.php",
								data: $("#firstPhoneForm").serialize(), // serializes the form's elements.
								success: function(data)
								{
										$('#statusBar').html = data; // show response from the php script.
								}
						});
						return false; // avoid to execute the actual submit of the form.
						
						
					}); 
					

				</script>
			
				
			</body>
		
				
			
</html>	