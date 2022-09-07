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
			var sub = form.sub.value;
		var name = form.name.value;
		var desc = form.desc.value;
		var date = form.date.value;
		var fail = false;
		if (name == "" || name == " ")
			fail = "Вы не указали название";
		else if (desc == "" || desc == " ")
			fail = "Вы не описали приказ";
		else if (date == "" || date == " ")
			fail = "Вы не указали дату";
	if (fail)
alert(fail);
else 
		$.ajax ({
			url: "insert_1.php",
			type: "POST",
			data: ({name: $("#name").val(), desc: $("#desc").val(), date: $("#date").val(), room: $("#room").val(), sub: $("#sub").val() }),
			dataType: "html",
			
			success: function (data){
					alert("Приказ отправлен");
					
				
			}
	
});
	});
	$("#done1").bind("click", function () {
			var subdivision = form1.subdivision.value;
			
		var fail = false;
		if (subdivision == "" || subdivision == " "){
			fail = "Вы не указали название";
alert(fail);
		}
else 
		$.ajax ({
			url: "insert_2.php",
			type: "POST",
			data: ({subdivision: $("#subdivision").val()}),
			dataType: "html",
			
			success: function (data){
					alert("Отдел принят");
					
				
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
<h1 align = "center">Лабораторный корпус</h1>

<tr>
<th>Название комнаты
</th>
<th>Номер комнаты
</th>
<th>Подразделение 
</th>
</tr>
 <?php 
 include ('connect.php');
 $type = mysqli_query($db, "SELECT * FROM cm_2 WHERE id_housing = 4");
while ( $line = mysqli_fetch_array($type))
   {
      echo '<tr class="warning"><td>'.$line['name_room'].'</td><td>'.$line['number_room'].'</td><td>'.$line['name_subdivision'].'</td></tr>';
    }
  ?>



</table>
</div>
</div>
</div>

<div class="container">
    
   <div class="row">
       <div class="col-sm-2 col-lg-10 col-lg-offset-1 well">
	   
	    <table class="table table-stripped">
<h1 align = "center">Офисный корпус корпус</h1>

<tr>
<th>Название комнаты
</th>
<th>Номер комнаты
</th>
<th>Подразделение 
</th>
</tr>
 <?php 
 include ('connect.php');
 $type = mysqli_query($db, "SELECT * FROM cm_2 WHERE id_housing = 5");
while ( $line = mysqli_fetch_array($type))
   {
      echo '<tr class="warning"><td>'.$line['name_room'].'</td><td>'.$line['number_room'].'</td><td>'.$line['name_subdivision'].'</td></tr>';
    }
  ?>



</table>
</div>
</div>
</div>
<div class="container">
    
   <div class="row">
       <div class="col-sm-2 col-lg-10 col-lg-offset-1 well">
	   
	    <table class="table table-stripped">
<h1 align = "center">История приказов</h1>

<tr>
<th>Название 
</th>
<th>Описание
</th>
<th>Дата 
</th>
</tr>
 <?php 
 include ('connect.php');
 $type = mysqli_query($db, "SELECT * FROM document");
while ( $line = mysqli_fetch_array($type))
   {
      echo '<tr class="warning"><td>'.$line['name_document'].'</td><td>'.$line['description_document'].'</td><td>'.$line['date'].'</td></tr>';
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
<h1>Создание приказа</h1>

<div class="col-sm-2 col-lg-5 col-lg-offset-3 well">
<p>Название приказа:</P> 
<input type="text" name="name" id="name" class="form-control"  > <br>
</div>
<div class="col-sm-2 col-lg-5 col-lg-offset-3 well">
<p>Описание приказа:</P> 
<input type="text" name="desc" id="desc" class="form-control" > <br>
</div>
<div class="col-sm-2 col-lg-5 col-lg-offset-3 well">
<p>Выберите комнату:</P> 
 <select name="room" size="1" id="room" >
   <?php 
 include ('connect.php');
 $type = mysqli_query($db, "SELECT * FROM room");
while ( $line = mysqli_fetch_array($type))
   {
      echo '<option value="'.$line['name_room'].'">'.$line['name_room'].'';
    }
  ?>
  </select>
  </div>
  <div class="col-sm-2 col-lg-5 col-lg-offset-3 well">
  <p>Кому передать комнату:</P> 
 <select name="sub" size="1" id="sub" >
   <?php 
 include ('connect.php');
 $type = mysqli_query($db, "SELECT * FROM subdivision");
while ( $line = mysqli_fetch_array($type))
   {
      echo '<option value="'.$line['name_subdivision'].'">'.$line['name_subdivision'].'';
    }
  ?>
  </select>
  </div>
  <div class="col-sm-2 col-lg-5 col-lg-offset-3 well">
 <p>Укажите дату:</P> 
<input type="date" name="date" id="date" class="form-control"> <br>
</div>
  <br>
  <div class="col-sm-2 col-lg-5 col-lg-offset-3 well">
  <input type="button" name="done" value="Готово" id="done" class="btn btn-success"> 
</div>  
</form>
</div>
</div>
</div>




</body>
</html>