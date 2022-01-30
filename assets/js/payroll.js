const weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];


var enableDisable = function() {
  var x = new Date();
  var days = weekday[x.getDay()];
  if (days != "Saturday") {
     document.getElementById("generatePayslip").disabled = true;
  } else {
    document.getElementById("generatePayslip").disabled = false;
  }
};
enableDisable();