<?php
include("config.php");
?>

 <?php session_start();


?>


<?php

$form_value="";
$form_value1="";
$q_no="";
$question="";
$option="";
$name="";
$stud="";
$_SESSION="";
$student="";
$stud1="";
$count="0";
$totalsolve="0";
$count1="";
$numOfClicks="";

if (isset($_POST['submit']))
{
	$time=$_POST['time'];
$date=$_POST['date'];
$test=$_POST['test'];
$stud=$_POST['student'];
$question=$_POST['question1'];
$option =$_POST['option_selected1'];
$correct=$_POST['corr_opt1'];
$option1 =$_POST['option_selected2'];
$correct1=$_POST['corr_opt2'];
$option2 =$_POST['option_selected3'];
$correct2=$_POST['corr_opt3'];
$option3 =$_POST['option_selected4'];
$correct3=$_POST['corr_opt4'];
$option4 =$_POST['option_selected5'];
$correct4=$_POST['corr_opt5'];

     if (isset($_POST['option_selected1']))
	{
		$totalsolve=$totalsolve+"1";
      if($option==$correct)
        {
			
	         $count = $count + "1";       
     	}
	}
	
	 if (isset($_POST['option_selected2']))
	{
		$totalsolve=$totalsolve+"1";
      if($option1==$correct1)
        {
			
	          $count = $count + "1";
			
	    }
	}	
	if (isset($_POST['option_selected3']))
	{
		$totalsolve=$totalsolve+"1";
      if($option2==$correct2)
        {
		
	          $count = $count + "1";
			
	    }
	}
	if (isset($_POST['option_selected4']))
	{
		$totalsolve=$totalsolve+"1";
		if($option3==$correct3)
        {
			
	          $count = $count + "1";
			
	    }
	}
	if (isset($_POST['option_selected5']))
	{
		$totalsolve=$totalsolve+"1";
		if($option4==$correct4)
        {
			
	          $count = $count + "1";
			
	    }
	}
	


date_default_timezone_set('Asia/Kolkata');
$today1=date('h:i:s');
$_SESSION['time1']=$today1;

date_default_timezone_set('Asia/Kolkata');
$date1=date('y-m-d');
$_SESSION['date1']=$date1;

$sql="INSERT into tbexam_conduct(studentid,paper_name,date,time_in,time_out,result) VALUES('$stud','$test','$date','$time','{$_SESSION['time1']}','$count')";
$query="INSERT into final(id,test_name,Q1status,Q2status,Q3status,Q4status,Q5status) VALUES('$stud','$test','{$_SESSION['sub']}','{$_SESSION['sub1']}','{$_SESSION['sub2']}','{$_SESSION['sub3']}','{$_SESSION['sub4']}')";

{
	
 if(mysql_query($sql))
 {
	 
 if(mysql_query($query))
 {
 echo"<script>alert('you solve $totalsolve question and your score is $count');</script>";
	//header('location:linked.php'); 
 }
 else
 {
	echo "<script>alert('Registration unsuccessfully');</script>";
 }
 
 }
}
}
if (isset($_POST['next']))
{
	header('location:paper.php');
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style1.css">
<title></title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
 <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
</head>
<body>

<form action="" method="post" width="500px">
<div id="registration-form" >
	<div class='fieldset'>
    <legend>welcome <?php echo $_SESSION['name']; ?></legend>
	<input type="hidden" name="test" value="stack test">
	 <input type="hidden" name="stud" value="<?php echo$_SESSION['student'];?>">
	  <input type="hidden" name="time" value="<?php echo$_SESSION['timeque'];?>">
	  <input type="hidden" name="date" value="<?php echo$_SESSION['date1'];?>">
	  
	 <h3>Time Remaining<h3>
	 
<div id="clockdiv">
  
  <div>
    <span class="minutes"></span>
    <div class="smalltext">Mins</div>
  </div>
  <div>
    <span class="seconds"></span>
    <div class="smalltext">Secs</div>
  </div>
</div>
<!--<!-- css for  timer   -->
<style>
#clockdiv{
	font-family: sans-serif;
	color: #fff;
	display: inline-block;
	font-weight: 10;
	text-align: center;
	font-size: 12px;
	
}
#clockdiv >div{
	padding: 5px;
	border-radius: 7px;
	background: #456391;
	display: inline-block;
	
}

#clockdiv div >span{
	padding: 5px;
	border-radius: 3px;
	background: #c4d5ef;
	display: inline-block;
	align:right;
}

.smalltext{
padding-top: 3px;
font-size: 8px;
}        


</style>
<!--<!-- Javascript for  timer   -->
<script>
function getTimeRemaining(endtime) {
  var t = Date.parse(endtime) - Date.parse(new Date());
  var seconds = Math.floor((t / 1000) % 60);
  var minutes = Math.floor((t / 1000 / 60) % 10);
  var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
    return {
    'total': t,
    'hours': hours,
    'minutes': minutes,
    'seconds': seconds
  };
}

function initializeClock(id, endtime) {
  var clock = document.getElementById(id);
  var hoursSpan = clock.querySelector('.hours');
  var minutesSpan = clock.querySelector('.minutes');
  var secondsSpan = clock.querySelector('.seconds');

  function updateClock() {
    var t = getTimeRemaining(endtime);

     minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
    secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

    if (t.total <= 0) {
      clearInterval(timeinterval);
    }
  }

  updateClock();
  var timeinterval = setInterval(updateClock, 1000);
}

var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
initializeClock('clockdiv', deadline);
</script>    		
		
       <center><h2>Stack Test</center></h2>
         <input type="hidden" name="student" value="<?php echo $_SESSION['stud'];?>"><br>
			<div>
			<input type="text" name="question1" value="1.On which principle does stack work?"><br><br>
				<input type="radio" name="option_selected1" value="stckQ1A">A: FILO   <br>
				<input type="radio" name="option_selected1" value="stckQ1B">B: FIFO  <br>
				<input type="radio" name="option_selected1" value="stckQ1C">C: LILO  <br>
				<input type="radio" name="option_selected1" value="stckQ1D">D: LIFO/FILO <br><br>
				  <label ID="add" name="result" VALUE="" ></label>
				<input type="hidden" name="corr_opt1" value="stckQ1D">
			</div>
			
<script>
$(document).ready(function(){
 $('input[type="radio"]').click(function(){
 var option_selected1 = $(this).val();
 $.ajax({
 url:"insert.php",
 method:"POST",
 data:{option_selected1:option_selected1},
 success: function(data){
 $('#result').html(data);
 }
 });
 });
});

</script>
<script>
var count = 0
$('input[name=option_selected1]').click(function() {
	
  count++
 // $('#clicked').text(count); // update text
	if(count=="5")
	{ 
		document.getElementById('add').value = "status:Frustrated";
		
	}
	if(count=="4")
	{
		document.getElementById('add').value = "status:confuse";  
	}
   if(count=="3")
	{
		document.getElementById('add').value = "status:ok";  
	}
	if(count=="2")
	{
		document.getElementById('add').value = "status:good";  
	}
	if(count=="1")
	{
		document.getElementById('add').value = "status:confident";  
	}
});
</script>
	 
         <div>
			<input type="text" name="question1" value="2.Can stack be described as a pointer?"><br><br>
				<input type="radio" name="option_selected2" value="stckQ2A">A: Yes <br>
				<input type="radio" name="option_selected2" value="stckQ2B">B: No<br>
				<input type="radio" name="option_selected2" value="stckQ2C">C: Cant decide<br>
				<input type="radio" name="option_selected2" value="stckQ2D">D: Depends<br><br>
				<input type="hidden" name="corr_opt2" value="stckQ2A">
                <label ID="add1" name="result" VALUE="" ></label>
			</div>
			
	<script>
var count1 = 0
$('input[name=option_selected2]').click(function() {
	
  count1++
  //$('#clicked1').text(count); // update text
	if(count1=="5")
	{ count1="0";
		document.getElementById('add1').value = "status:Frustrated";
	}
	if(count1=="4")
	{
		document.getElementById('add1').value = "status:confuse";  
	}
   if(count1=="3")
	{
		document.getElementById('add1').value = "status:ok";  
	}
	if(count1=="2")
	{
		document.getElementById('add1').value = "status:good";  
	}
	if(count1=="1")
	{
		document.getElementById('add1').value = "status:confident";  
	}
});
</script>
	 
	 <div>
			<input type="text" name="question1" value="3.What is the result of the following operation Top (Push (S, X))?"><br><br>
				<input type="radio" name="option_selected3" value="stckQ3A">A: X <br>
				<input type="radio" name="option_selected3" value="stckQ3B">B:Null<br>
				<input type="radio" name="option_selected3" value="stckQ3C">C:S<br>
				<input type="radio" name="option_selected3" value="stckQ3D">D:None of these<br><br>
				<input type="hidden" name="corr_opt3" value="stckQ3A">
				<label ID="add2" name="result" VALUE="" ></label>
			</div>
		<script>
var count2 = 0
$('input[name=option_selected3]').click(function() {
  count2++
 // $('#clicked2').text(count); // update text
	if(count2=="5")
	{ count2="0";
		document.getElementById('add2').value = "status:Frustrated";
	}
	if(count2=="4")
	{
		document.getElementById('add2').value = "status:confuse";  
	}
   if(count2=="3")
	{
		document.getElementById('add2').value = "status:ok";  
	}
	if(count2=="2")
	{
		document.getElementById('add2').value = "status:good";  
	}
	if(count2=="1")
	{
		document.getElementById('add2').value = "status:confident";  
	}
});
</script>	
			<div>
			<input type="text" name="question1" value="4.The largest element of an array index is called its __?"><br><br>
				<input type="radio" name="option_selected4" value="stckQ4A">A:lower bound  <br>
				<input type="radio" name="option_selected4" value="stckQ4B">B:range <br>
				<input type="radio" name="option_selected4" value="stckQ4C">C:upper bound<br>
				<input type="radio" name="option_selected4" value="stckQ4D">D:none of these <br><br>
				<input type="hidden" name="corr_opt4" value="stckQ4C">
				<label ID="add3" name="result" VALUE="" ></label>
			</div>
<script>
var count3 = 0
$('input[name=option_selected4]').click(function() {
	
  count3++
 // $('#clicked3').text(count); // update text
	if(count3=="5")
	{ 
		document.getElementById('add3').value = "status:Frustrated";
		count3="0";
	}
	if(count3=="4")
	{
		document.getElementById('add3').value = "status:confuse";  
	}
   if(count3=="3")
	{
		document.getElementById('add3').value = "status:ok";  
	}
	if(count3=="2")
	{
		document.getElementById('add3').value = "status:good";  
	}
	if(count3=="1")
	{
		document.getElementById('add3').value = "status:confident";  
	}
});
</script>
			<div>
			<input type="text" name="question1" value="5.Which is/are the application(s) of stack? "><br><br>
				<input type="radio" name="option_selected5" value="stckQ5A">A: Function calls  <br>
				<input type="radio" name="option_selected5" value="stckQ5B">B: Large number Arithmetic<br>
				<input type="radio" name="option_selected5" value="stckQ5C">C: Evaluation of arithmetic expressions<br>
				<input type="radio" name="option_selected5" value="stckQ5D">D:All of the above<br><br>
				<input type="hidden" name="corr_opt5" value="stckQ5B">
				<label ID="add4" name="result" VALUE="" ></label>
			</div>
<script>
var count4 = 0
$('input[name=option_selected5]').click(function() {
	
  count4++
  //$('#clicked4').text(count); // update text
	if(count4=="5")
	{ 
		document.getElementById('add4').value = "status:Frustrated";
		count4="0";
	}
	if(count4=="4")
	{
		document.getElementById('add4').value = "status:confuse";  
	}
   if(count4=="3")
	{
		document.getElementById('add4').value = "status:ok";  
	}
	if(count4=="2")
	{
		document.getElementById('add4').value = "status:good";  
	}
	if(count4=="1")
	{
		document.getElementById('add4').value = "status:confident";  
	}
});
</script>
			<div>
			<center><input type="submit" name="submit" value="submit" style="width:120px;align:left;height:45px"></center><br><br>
			</div>
			<div>
			<center><input type="submit"  name="next" value="next test" style="width:120px;align:right;height:45px"></center><br><br>
			<legend></legend>
		</form>
	</div>
</div>
</body>
</html>


