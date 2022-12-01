<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	<form method="post" action="">
	<table id="mytable">
		<tr>
			<td>Name:<input type="text" name="name[]"></td>
			<td>Email:<input type="text" name="email[]"></td>
			<td><button id="btn">Add more</button></td>
		</tr>
	</table>
	<input type="submit" name="save">
</form>
<?php 
   if(isset($_REQUEST['save']))
   {
   	 $name=$_REQUEST['name'];
     $email=$_REQUEST['email'];

    
     $con=mysqli_connect("localhost","root","","signup");
     $number=count($name);
     for($i=0;$i<$number;$i++)
    {
    	$qry=mysqli_query($con,"insert into multiple(name,email)values('$name[$i]','$email[$i]')");
    }
   }
?>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
	$(document).ready(function(){
		var i=1;
	$("#btn").click(function(e){
		e.preventDefault();
	html='';
	html+='<tr id="row'+i+'">';
	html+='<td>Name:<input type="text" name="name[]"></td>';
	html+='<td>Email:<input type="text" name="email"></td>';
	html+='<td><button id="'+i+'"class="delete">remove</button></td>';
	html+='</tr>';
	$("#mytable").append(html);
	i++;
	});
    $(document).on("click",".delete",function(e){
     e.preventDefault();
      var id= $(".delete").attr("id");
      $("#row"+id+"").remove();
    });
	});
</script>


</body>
</html>

