var x = new Date()
var day = x.getDate();
var year = x.getFullYear();
var minute = x.getMinutes();
var month = x.getMonth();
var seconds = x.getSeconds();
var hour = x.getHours();

var date = year+'-'+ month +'-'+day;
var time = hour + ":" + minute + ":" + seconds

document.getElementById('date').value = date;
document.getElementById('time').value = time;


