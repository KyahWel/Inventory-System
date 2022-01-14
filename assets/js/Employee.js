const weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    function display_ct6() {
        var x = new Date()
        var month=monthNames[x.getMonth()];
        var day = x.getDate();
        var year=x.getFullYear();
        var minute =  x.getMinutes()
        var seconds =  x.getSeconds()
        if (day <10 ){day='0' + day;}
        if (minute <10 ){minute='0' + minute;}
        if (seconds <10 ){seconds='0' + seconds;}
        var days = weekday[x.getDay()]+',';
        var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
        hours = x.getHours( ) % 12;
        hours = hours ? hours : 12;
        var date = month+' '+day+' '+year; 
        var time = hours + ":" + minute + ":" + seconds + "" + ampm;
        document.getElementById('day').innerHTML = days;
        document.getElementById('date').innerHTML = date;
        document.getElementById('time').innerHTML = time;
           
            mytime=setTimeout('display_ct6()',1000)
        }      
display_ct6();