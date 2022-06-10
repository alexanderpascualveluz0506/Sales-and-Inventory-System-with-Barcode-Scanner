
<html>
<head>
<title>(Type a title for your page here)</title>
<script type="text/javascript"> 
function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}

function display_ct() {




var x = new Date();

const d = new Date();

const monthName = d.toLocaleString("default", {month: "long"});
const weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
let day = weekday[d.getDay()];
var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';

hours = x.getHours( ) % 12;
hours = hours ? hours : 12;
hours=hours.toString().length==1? 0+hours.toString() : hours;

var minutes=x.getMinutes().toString()
minutes=minutes.length==1 ? 0+minutes : minutes;

var seconds=x.getSeconds().toString()
seconds=seconds.length==1 ? 0+seconds : seconds;


var x1= day+", "+monthName + " " + x.getDate() + " " + x.getFullYear(); 
x1 = "  " +"  "+"  "+x1 + "  " +"  "+"  "+ hours+ ":" +  minutes + ":" +  seconds +" "+ampm;
document.getElementById('ct').innerHTML = x1;
display_c();
 }
</script>
</head>

<body onload=display_ct();>
<span id='ct' ></span>

</body>
</html>