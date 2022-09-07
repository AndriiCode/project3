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
			
			var subdivision = form.subdivision.value;
			var responsible = form.responsible.value;
		var budget = form.budget.value;
	
		var fail = false;
		if (subdivision == "" || subdivision == " ")
			fail = "Вы не указали название";
		else if (responsible == "" || responsible == " ")
			fail = "Вы не указали ответственного";
		else if (budget == "" || budget == " ")
			fail = "Вы не указали бюджет";
	if (fail)
alert(fail);
else 
		$.ajax ({
			url: "insert_2.php",
			type: "POST",
			data: ({subdivision: $("#subdivision").val(), responsible: $("#responsible").val(), budget: $("#budget").val() }),
			dataType: "html",
			
			success: function (data){
					alert("Отдел принят");
					
				
			}
	
});
	});
	
$("#done1").bind("click", function () {
			
			var idsub = form1.idsub.value;
		
		$.ajax ({
			url: "delete_2.php",
			type: "POST",
			data: ({idsub: $("#idsub").val()}),
			dataType: "html",
			
			success: function (data){
					alert("Отдел уволин");
					
				
			}
	
});
	});
	
$("#done2").bind("click", function () {
			
			var sub = form2.sub.value;
			var newbud = form2.newbud.value;

	
		var fail = false;
		if (newbud == "" || newbud == " ")
			fail = "Вы не указали бюджет";
		
	if (fail)
alert(fail);
else 
		$.ajax ({
			url: "updatesub.php",
			type: "POST",
			data: ({sub: $("#sub").val(), newbud: $("#newbud").val()}),
			dataType: "html",
			
			success: function (data){
					alert("Бюджет изменён ");
					
				
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
<h1 align = "center">Подразделения</h1>

<tr>
<th>Подразделение 
</th>
<th>Ответственное лицо
</th>
<th>Бюджет
</th>
</tr>
 <?php 
 include ('connect.php');
 $type = mysqli_query($db, "SELECT * FROM subdivision");
while ( $line = mysqli_fetch_array($type))
   {
      echo '<tr class="warning"><td>'.$line['name_subdivision'].'</td><td>'.$line['responsible'].'</td><td>'.$line['budget'].'</td></tr>';
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
<h1>Принятие отдела</h1>
<div class="col-sm-2 col-lg-5 col-lg-offset-3 well">
<p>Название отдела:</P> 
<input type="text" name="subdivision" id="subdivision" class="form-control"  > <br>
</div>
<div class="col-sm-2 col-lg-5 col-lg-offset-3 well">
<p>Ответственное лицо:</P> 
<input type="text" name="responsible" id="responsible" class="form-control"  > <br>
</div>
<div class="col-sm-2 col-lg-5 col-lg-offset-3 well">
<p>Бюджет в $:</P> 
<input type="number" name="budget" id="budget" class="form-control"  > <br>
</div>
 <div class="col-sm-2 col-lg-5 col-lg-offset-3 well">
  <input type="button" name="done" value="Готово" id="done" class="btn btn-warning"> 
</div>  

</form>

</div>
</div>
</div>


<div class="container">
    
   <div class="row">
       <div class="col-sm-2 col-lg-10 col-lg-offset-1 well">
<form name = "form1" id= "form1" align="center" class="form-horizontal">
<h1>Увольнение отдела</h1>

<div class="col-sm-2 col-lg-5 col-lg-offset-3 well">

<p>Выберите отдел:</P> 
 <select name="idsub" size="1" id="idsub" >
   <?php 
 include ('connect.php');
 $type = mysqli_query($db, "SELECT * FROM subdivision");
while ( $line = mysqli_fetch_array($type))
   {
      echo '<option value="'.$line['id_subdivision'].'">'.$line['name_subdivision'].'';
    }
  ?>
  </select>
  </div>
   <div class="col-sm-2 col-lg-5 col-lg-offset-3 well">
  <input type="button" name="done1" value="Готово" id="done1" class="btn btn-danger"> 
</div>  
</form>
</div>
</div>
</div>

<div class="container">
    
   <div class="row">
       <div class="col-sm-2 col-lg-10 col-lg-offset-1 well">
<form name = "form2" id= "form2" align="center" class="form-horizontal">
<h1>Изменение бюджета</h1>

<div class="col-sm-2 col-lg-5 col-lg-offset-3 well">

<p>Выберите отдел:</P> 
 <select name="sub" size="1" id="sub" >
   <?php 
 include ('connect.php');
 $type = mysqli_query($db, "SELECT * FROM subdivision");
while ( $line = mysqli_fetch_array($type))
   {
      echo '<option value="'.$line['id_subdivision'].'">'.$line['name_subdivision'].'';
    }
  ?>
  </select>
  </div>
  <div class="col-sm-2 col-lg-5 col-lg-offset-3 well">
  <p>Новоый бюджет в $:</P> 
<input type="number" name="newbud" id="newbud" class="form-control"  > <br>
  </div>
   <div class="col-sm-2 col-lg-5 col-lg-offset-3 well">
  <input type="button" name="done2" value="Готово" id="done2" class="btn btn-success"> 
</div>  
</form>
</div>
</div>
</div>





</body>
</html>



