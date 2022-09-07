<!DOCTYPE HTML>
<html>
<head>

<link rel="stylesheet" href="boot/css/bootstrap.min.css">

<title>
</title>
</head>

<script src="jquery-2.2.3.min.js"></script>
<script src="boot/js/bootstrap.min.js"></script>
<script>


$(document).ready(function () {
		$("#done").bind("click", function () {
			var room = form.room.value;
		
		var name = form.name.value;
	
		var fail = false;
		if (name == "" || name == " ")
			fail = "Вы не указали название";
		
	if (fail)
alert(fail);
else 
		$.ajax ({
			url: "updateroom.php",
			type: "POST",
			data: ({name: $("#name").val(),room: $("#room").val() }),
			dataType: "html",
			
			success: function (data){
					alert("Приказ отправлен");
					
				
			}
	
});
	});

	$("#done1").bind("click", function () {
			
		
		var name1 = form1.name1.value;
		var number = form1.number.value;
		var housing = form1.housing.value;
		var fail = false;
		if (name1 == "" || name1 == " ")
			fail = "Вы не указали название";
		else if(number == "" || number == " ")
			fail = "Вы не указали номер";
	if(fail)
		alert(fail);
	
else 
		$.ajax ({
			url: "insert_3.php",
			type: "POST",
			data: ({name1: $("#name1").val(), housing: $("#housing").val(), number: $("#number").val()}),
			dataType: "html",
			
			success: function (data){
					alert("Приказ отправлен");
					
			}
	
});
	});
	
	
	$("#done2").bind("click", function () {
			var room2 = form2.room2.value;
			
		
		$.ajax ({
			url: "delete_1.php",
			type: "POST",
			data: ({room2: $("#room2").val()}),
			dataType: "html",
			
			success: function (data){
					alert("Комната удалена");
					
				
			}
	
});
	});

});
















</script>






<body>

<div class="container">
    
   <div class="row">
       <div class="col-sm-2 col-lg-10 col-lg-offset-1 well">
	   
	    <table class="table table-stripped">
<h1 align = "center">Список комнат</h1>

<tr>
<th>Название комнаты
</th>
<th>Номер комнаты
</th>
<th>Корпус
</th>
</tr>
 <?php 
 include ('connect.php');

 $type = mysqli_query($db, "SELECT * FROM room");
while ( $line = mysqli_fetch_array($type))
   {
	 $a = $line['id_housing'];
	   if ($a == 4){
		   
		   $b = "Лабораторный корпус";
		   
	   }
	   else {
		   
		   $b = "Офисный корпус";
		   
	   }
	   
	   
      echo '<tr class="warning"><td>'.$line['name_room'].'</td><td>'.$line['number_room'].'</td><td>'.$b.'</td></tr>';
    }
  ?>



</table>
</div>
</div>
</div>
<div class="container">
    
   <div class="row">
       <div class="col-sm-2 col-lg-10 col-lg-offset-1 well">
<form name = "form" id= "form" align="center" class="form-horizontal">
<h1>Переименование комнаты</h1>

<div class="col-sm-2 col-lg-5 col-lg-offset-3 well">

<p>Выберите комнату:</P> 
 <select name="room" size="1" id="room" >
   <?php 
 include ('connect.php');
 $type = mysqli_query($db, "SELECT * FROM room");
while ( $line = mysqli_fetch_array($type))
   {
      echo '<option value="'.$line['id_room'].'">'.$line['name_room'].'';
    }
  ?>
  </select>
  </div>
  <div class="col-sm-2 col-lg-5 col-lg-offset-3 well">
  <p>Новое название:</P> 
<input type="text" name="name" id="name" class="form-control"  > <br>
  </div>
   <div class="col-sm-2 col-lg-5 col-lg-offset-3 well">
  <input type="button" name="done" value="Готово" id="done" class="btn btn-success"> 
</div>  
</form>
</div>
</div>
</div>

<div class="container">
    
   <div class="row">
       <div class="col-sm-2 col-lg-10 col-lg-offset-1 well">
<form name = "form1" id= "form1" align="center" class="form-horizontal">
<h1>Добавление комнаты</h1>

  <div class="col-sm-2 col-lg-5 col-lg-offset-3 well">
  <p>Название:</P> 
<input type="text" name="name1" id="name1" class="form-control"  > <br>
  </div>
  <div class="col-sm-2 col-lg-5 col-lg-offset-3 well">
  <p>Номер комнаты:</P> 
<input type="number" name="number" id="number" class="form-control"  > <br>
  </div>
  <div class="col-sm-2 col-lg-5 col-lg-offset-3 well">

<p>Корпус:</P> 
 <select name="housing" size="1" id="housing" >
   <?php 
 include ('connect.php');
 $type = mysqli_query($db, "SELECT * FROM housing");
while ( $line = mysqli_fetch_array($type))
   {
      echo '<option value="'.$line['id_housing'].'">'.$line['name_housing'].'';
    }
  ?>
  </select>
  </div>
   <div class="col-sm-2 col-lg-5 col-lg-offset-3 well">
  <input type="button" name="done1" value="Готово" id="done1" class="btn btn-success"> 
</div>  
</form>
</div>
</div>
</div>
<div class="container">
    
   <div class="row">
       <div class="col-sm-2 col-lg-10 col-lg-offset-1 well">
<form name = "form2" id= "form2" align="center" class="form-horizontal">
<h1>Удаление комнаты</h1>

  <div class="col-sm-2 col-lg-5 col-lg-offset-3 well">

<p>Выберите комнату:</P> 
 <select name="room2" size="1" id="room2" >
   <?php 
 include ('connect.php');
 $type = mysqli_query($db, "SELECT * FROM room");
while ( $line = mysqli_fetch_array($type))
   {
      echo '<option value="'.$line['id_room'].'">'.$line['name_room'].'';
    }
  ?>
  </select>
  </div>
   <div class="col-sm-2 col-lg-5 col-lg-offset-3 well">
  <input type="button" name="done2" value="Удалить" id="done2" class="btn btn-danger"> 
</div>  
</form>
</div>
</div>
</div>

</body>
</html>