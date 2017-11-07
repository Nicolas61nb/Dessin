<!DOCTYPE html>
<html>
	<head>
		<title>Exo JS</title>
	</head>
	<body>
		<canvas id="myCanvas" width="1300" height="500" style="border:3px solid #483D8B;"></canvas>
		<p>coleur</p>
		<input type="color" value="#D2691E" id="color">
		<p>tail</p>
		<input type="text" value="13" id="size" >
		<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script>
			var myMouse;
			var dernierX = 0;
			var dernierY = 0;
			var c = document.getElementById("myCanvas");
			c.width = $('#myCanvas').width();
			c.height = $('#myCanvas').height();
		$(window).resize(function () {
			var c = document.getElementById("myCanvas");
			c.width = $('#myCanvas').width();
			c.height = $('#myCanvas').height();
		});
		
		function drawPath() {
			var c = document.getElementById('myCanvas');
				var ctx = c.getContext("2d");
				ctx.moveTo(dernierX,dernierY);
				ctx.lineTo(event.clientX, event.clientY);
				ctx.strokeStyle = document.getElementById('color').value;
				ctx.lineWidth = document.getElementById('size').value;
				ctx.stroke();
				dernierX = event.clientX;
				dernierY = event.clientY;
			
		}
			$('#myCanvas')
				.mousemove(function() {
					if(myMouse === true) {
						path.push([event.offsetX, event.offsetY]);
						drawPath();
					}
				})
				.mousedown(function() 
				{
					dernierX = event.clientX;
					dernierY = event.clientY;
					path = [];
					myMouse = true;
				})

				.mouseup(function() 
				{
					myMouse = false;
					var data = 
					{
						path:path,
					};
				
					
					$.ajax(
					{
						url: 'http://draw.api.niamor.com/paths/add',
						method: 'POST',
						data: 
						{
							path: path,
							"strokeColor": document.getElementById('color').value,
							"lineWidth": document.getElementById('size').value,
						}
					})
					console.log(path);
				});

				// $.ajax(
				// 	url: 'http://draw.api.niamor.com/path'


		</script>
	</body>
</html>