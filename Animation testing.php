<!DOCTYPE html>
<html>
  <head>
  <style>
#test{
border-style: solid;
border-width: 5px;
}
</style>
    <title>Sprite attempt</title>
  </head>
  <body>
  <canvas id='test' width='1333' height='600' onload="startgame()" onmousedown="mousestuff(event)" onmouseup="resem(event)" onmousemove="graim(event)"></canvas>
<div style="display:none";> 
<img id="srcc" src="98874.png" height="512" width="512">
</div>
<script>
   var canvas = document.getElementById('test');
	var context = canvas.getContext('2d');
	var image = document.getElementById('srcc');
	frame = 0;
	sx = 0;
	sy = 0;
	swidth = 32;
	sheight = 32;
	setInterval(Drawing,500)
	function Drawing(){
	frame++;
	if(frame > 5){
		frame = 0;
	}	
	context.clearRect(0,0,canvas.width, canvas.height);	
	context.drawImage(image, swidth*frame, 0, swidth, sheight, 100, 100, 32, 32);
	console.log(frame)
	}

	
	
	
	
</script>
</body>
</html>
