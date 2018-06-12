<!DOCTYPE html>
<html>
<body>
<p id="demo"></p>
<script>
var myVar=setInterval(function(){myTimer()},10);
function myTimer() {
    var d = new Date();
    document.getElementById("demo").innerHTML = d.toLocaleTimeString();
}
</script>
</body>
</html>
