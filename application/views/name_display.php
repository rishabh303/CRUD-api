<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Admin</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone.js/1.0.0/backbone-min.js"></script>

</head>
<body>

<div class="container">
	<h1>Welcome to Admin!</h1>

<div id="data">
<table>
   <?php foreach ($names as $row) { ?>
   
   <tr>
      <td><?=$row->CAR_ID?></td>
      <td><?=$row->CAR_MODEL?></td>
      <td><?=$row->CAR_YEAR?></td>
      <td><?=$row->CAR_SEGMENT?></td>
    </tr>
    
    <?php } ?>
</table>
</div>

<br>

<p id="message"></p>
<p id="createmsg"></p>

<br> <br><br>

<h3>Create Persons</h3>

   <form>
   
   <label for='Name'> Car Id </label>
   <input type='text' name='name' id='name' size='30' /> <br>

   <label for='Address'> Car Model </label>
   <input type='text' name='address' id='address' size='30' /> <br>
   
      <label for='Telephone'> Car Year </label>
   <input type='text' name='telephone' id='telephone' size='30' /> <br>
       
       <label for='Telephone'> Car Segment </label>
   <input type='text' name='telephone' id='a' size='30' /> <br>
      
           <label for='Telephone'> Car Brand</label>
   <input type='text' name='telephone' id='b' size='30' /> <br>
    
          <label for='Telephone'> Car Code </label>
   <input type='text' name='telephone' id='c' size='30' /> <br>
      
           <label for='Telephone'> Car Fuel </label>
   <input type='text' name='telephone' id='d' size='30' /> <br>
   <input type="submit" value="Create" id="create" />
   
   </form>
   
   <br><br>

   
   <form>
     <label for="edit"> Type in the Car id to delete/edit</label>
       <input type="text" name="carid" id="carid" size="10" /> <br>
       
          <input type="submit" value="Delete" id="delete" />
             <input type="submit" value="Edit" id="edit" />
   </form>
   
   <br><br><br>
   
  <div id="editBox" style="display: none;"> 
   <form>
        <label for='Address'> Car ID </label>
   <input type='text' name='address' id='carID' size='30' /> <br>
   
   <label for='Address'> Car Model </label>
   <input type='text' name='address' id='address' size='30' /> <br>
   
      <label for='Telephone'> Car Year </label>
   <input type='text' name='telephone' id='telephone' size='30' /> <br>
       
       <label for='Telephone'> Car Segment </label>
   <input type='text' name='telephone' id='a' size='30' /> <br>
      
           <label for='Telephone'> Car Brand</label>
   <input type='text' name='telephone' id='b' size='30' /> <br>
    
          <label for='Telephone'> Car Code </label>
   <input type='text' name='telephone' id='c' size='30' /> <br>
      
           <label for='Telephone'> Car Fuel </label>
   <input type='text' name='telephone' id='d' size='30' /> <br>
   
      <input type="submit" value="Update" id="update">
   
   </form>
   
   </div>
   
   
  <script>
  
  $(document).ready(function() {
	  
	  $("#create").click(function(event) {
		  event.preventDefault();
		var name = $("input#name").val();  
	    var address = $("input#address").val(); 
	    var telephone = $("input#telephone").val();
            var a = $("input#a").val();
            var b = $("input#b").val();
            var c = $("input#c").val();
            var d = $("input#d").val();
	$.ajax({
		method: "POST",
		url: "<?php echo base_url(); ?>index.php/People/person",	
		dataType: 'JSON',
		data: {name: name, address: address, telephone: telephone,a: a,b: b,c: c,d: d},
		
		success: function(data) {
			console.log(name, address, telephone);
			$("#data").load(location.href + " #data");
			$("input#name").val(""); 
			$("input#address").val(""); 
			$("input#telephone").val("");  
		}
	});
	  });
  });
  
  
  
  
  
  $(document).ready(function() {
	  $("#delete").click(function(event) {
		  event.preventDefault();
		var carid = $("input#carid").val();  
	$.ajax({
		method: "GET",
		url: "<?php echo base_url(); ?>index.php/People/person",	
		dataType: 'JSON',
		data: {carid: carid},
		success: function(data) {
			console.log(carid);
			$("#data").load(location.href + " #data");
			$("#message").html("You have successfully deleted number " + carid + " Thank you");
			$("#message").show().fadeOut(3000);
			$("input#carid").val("");  
		}
	});
	  });
  });
  
  
  
   $(document).ready(function() {
	  $("#edit").click(function(event) {
		  event.preventDefault();
		var carID = $("input#carid").val();  
                
	$.ajax({
		method: "GET",
		url: "<?php echo base_url(); ?>index.php/People/user",	
		dataType: 'JSON',
		data: {carID: carID},
		
		success: function(data) {
			    console.log(carID);
			$.each(data,function(carID, address, telephone, a, b, c, d) {
			
			console.log(carID, name, address, telephone, a, b, c, d);
			$("input#carID").val(carID); 
			$("#editBox").show();
			$("input#address").val(name[0]);
			$("input#telephone").val(name[1]);
			$("input#a").val(name[2]);
			});
		}
	});
	  });
  });
  
  
  
   $(document).ready(function() {
	  
	  $("#update").click(function(event) {
		  event.preventDefault();
	    var personID = $("input#carID").val();
	    var address = $("input#address").val();  
	    var telephone = $("input#telephone").val(); 
	    var a = $("input#a").val();
            var b = $("input#b").val();
            var c = $("input#c").val();
            var d = $("input#d").val(); 
                 console.log(a,b);
	$.ajax({
		method: "POST",
		url: "<?php echo base_url(); ?>index.php/People/user",	
		dataType: 'JSON',
		data: {personID: personID, address: address, telephone: telephone,a: a,b: b,c: c,d: d},
		
		success: function(data) {
			console.log(personID, name, address, telephone);
			$("#data").load(location.href + " #data");
			$("#message").html("You have successfully updated " + address + " Thank you");
			$("#message").show().fadeOut(3000);
			$("#editBox").hide();
		}
	});
	  });
  });
  
  
     $(document).ready(function() {
		 
		var Create = Backbone.Model.extend({
			url: function () {
				var link = "<?php echo base_url(); ?>index.php/People/person?name=" + this.get("name");
				return link;
			},
			defaults: {
				name: null,
				address: null,
				telephone: null }
		});
		
		var createModel = new Create();
		
		var DisplayView = Backbone.View.extend({
			el: ".container", 
			model: createModel,
			initialize: function () {
				this.listenTo(this.model,"sync change",this.gotdata);
			},
			
			events: {
				"click #create" : "getdata"
			},
			
			getdata: function (event) {
				var name = $('input#name').val();
				var address = $('input#address').val();
				this.model.set({name: name, address: address});
				this.model.fetch();
			},
			
			gotdata: function () {
				$('#createmsg').html('Name ' + this.model.get('name') + ' and address ' + this.model.get('address') + ' has been created').show().fadeOut(5000);
			}
		});
		
		var displayView = new DisplayView();
		
	 });
  </script>



</div>

</body>
</html>