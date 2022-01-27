function switchEdit() {
    document.getElementById("username").disabled=false;
    document.getElementById("firstname").disabled=false;
    document.getElementById("lastname").disabled=false;

    document.getElementById('editDiv').style.display = "none";
    document.getElementById('saveDiv').style.display = "block";
    document.getElementById('cancelDiv').style.display = "block";
}
function switchCancel() {
    
    document.getElementById("username").disabled=true;
    document.getElementById("firstname").disabled=true;
    document.getElementById("lastname").disabled=true;
   
    document.getElementById('editDiv').style.display = "block";
    document.getElementById('saveDiv').style.display = "none";
    document.getElementById('cancelDiv').style.display = "none";

}