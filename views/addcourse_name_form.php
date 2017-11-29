<form action="addcourse_name.php" id="form_2" method="post" name="form_2">
    <img id="close_1" src="images/glyphicons-193-remove-sign.png" onclick ="div_hide_2()">
    <div class="panel panel-primary" style="border:0px;">
					<div class="panel-heading" style="font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
						<h3 class="panel-title">Add course/topic</h3>
					</div>	
<table class="table table-striped" style="margin-bottom:10px"  id="dev-table_2">
    <tbody>
        <tr class = "text-left">
            <td>Name:</td>
            <td id="Name_1" style="display:block"><input class="form-control" type="text" value="" name="course_name"></td>
            <td><a href="#" onclick="myFunction_edit('txtN','Name'); update_counter();">Edit</a></td>
        </tr>
    </tbody>
</table>
<div class="btn-group" style="border-radius:0px; margin-bottom:-10px">
  <button class="btn btn-primary" onclick="div_hide_bookmark()">Add</button>
</div>
</div>
</form>
