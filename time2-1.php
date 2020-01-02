<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Page-Enter" content="revealTrans(Duration=5.0,Transition=23)">
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>time</title>

<style>
div { display:inline; }

input {
	text-align: center;
	background: tan;
	font-size: 33pt;
	border: 1px outset #FFF
}

fieldset
{
	border: 1px solid saddlebrown;
}

legend
{
	color: #fff;
	background: saddlebrown;
	size: 25px;
	padding: 2px 6px
	
}

</style>

</head>

<!--開始就執行-->
<body onload="clock();return true" scroll="no">

<table align='center' height="800">
	<tr>
		<td>
			
			<fieldset>
				<legend>距離總統大選還有</legend>
				<form name="formnow">
				<input type="text" name="dd" size="1">天
				<input type="text" name="hh" size="2">時
				<input type="text" name="mm" size="2">分
				<input type="text" name="ss" size="2">秒
				</form>
			</fieldset>			
		</td>
	</tr>
</table>


<script>

//設定倒數之標的
var DifferenceHour 
var DifferenceMinute 
var DifferenceSecond 
var Tday = new Date("JaN 11, 2020 00:00:00") 
var daysms = 24 * 60 * 60 * 1000
var hoursms = 60 * 60 * 1000
var Secondms = 60 * 1000
var microsecond = 1000

function clock()
{
	
	var time = new Date()
	var hour = time.getHours()
	
	var minute = time.getMinutes()
	var second = time.getSeconds()
	var timevalue = ""+((hour > 12) ? hour-12:hour)
	
	
	timevalue +=((minute < 10) ? ":0":":")+minute
	timevalue +=((second < 10) ? ":0":":")+second
	timevalue +=((hour >12 ) ? " PM":" AM")
		
	
	var convertHour = DifferenceHour
	var convertMinute = DifferenceMinute
	var convertSecond = DifferenceSecond
	
	
	var Diffms = Tday.getTime() - time.getTime()
	
	
	DifferenceHour = Math.floor(Diffms / daysms)
	Diffms -= DifferenceHour * daysms
	DifferenceMinute = Math.floor(Diffms / hoursms)
	Diffms -= DifferenceMinute * hoursms
	DifferenceSecond = Math.floor(Diffms / Secondms)
	Diffms -= DifferenceSecond * Secondms	
	
	
	if(convertHour != DifferenceHour){
		document.formnow.dd.value=DifferenceHour
	}
	
	
	if(convertMinute != DifferenceMinute) {
		document.formnow.hh.value=DifferenceMinute
	}
	
	
	if(convertSecond != DifferenceSecond) {
		document.formnow.mm.value=DifferenceSecond
	}
	
	
	var dSecs = Math.floor(Diffms / microsecond)
	document.formnow.ss.value=dSecs
	
	
	setTimeout("clock()",1000)
} 
</script>

</body>
</html> 