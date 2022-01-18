var x = new Date()
var day = x.getDate();
var year = x.getFullYear();
var minute = x.getMinutes();
var seconds = x.getSeconds();
var hour = x.getHours();

var date = year+'-'+month+'-'+day;
var time = hours + ":" + minute + ":" + seconds

document.getElementById('date').value = date;
document.getElementById('time').value = time;
