<form action="contactinfo.php" id="form_1" method="get" name="form_1">
    <img id="close" src="images/glyphicons-193-remove-sign.png" onclick ="div_hide_1()">
    <div class="panel panel-primary" style="border:0px;">
					<div class="panel-heading" style="font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
						<h3 class="panel-title">Contact Details</h3>
					</div>	
<table class="table table-striped" style="height:200px; margin-bottom:10px"  id="dev-table">
    <tbody>
        <tr class = "text-left">
            <td>Name:</td>
            <td id="Name" style="display:block"></td>
            <td id="txtN" style="display:none;"><input class="form-control" id="txtN_1" onchange="finishedEdit('txtN','txtN_1','Name','Yes')" onblur="finishedEdit('txtN','txtN_1','Name','No')" type="text" value=""></td>
            <td><a href="#" onclick="myFunction_edit('txtN','Name'); update_counter();">Edit</a></td>
        </tr>
        <tr class = "text-left">
            <td>Mobile no:</td>
            <td  id = "Mobileno"></td>
            <td id="txtM" style="display:none;"><input class="form-control" id="txtM_1" onchange="finishedEdit('txtM','txtM_1','Mobileno','Yes')" onblur="finishedEdit('txtM','txtM_1','Mobileno','No')" type="text" value=""></td>
            <td><a href="#" onclick="myFunction_edit('txtM','Mobileno')">Edit</a></td>
        </tr>
        <tr class = "text-left">
            <td>Phone no:</td>
            <td  id = "Phoneno"></td>
            <td id="txtP" style="display:none;"><input  class="form-control" id="txtP_1" onchange="finishedEdit('txtP','txtP_1','Phoneno','Yes')" onblur="finishedEdit('txtP','txtP_1','Phoneno','No')" type="text" value=""></td>
            <td><a href="#" onclick="myFunction_edit('txtP','Phoneno')">Edit</a></td>
        </tr>
        <tr class = "text-left">
            <td>Email ID:</td>
            <td  id = "EmailID"></td>
            <td id="txtE" style="display:none;"><input class="form-control" id="txtE_1" onchange="finishedEdit('txtE','txtE_1','EmailID','Yes')" onblur="finishedEdit('txtE','txtE_1','EmailID','No')" type="text" value=""></td>
            <td><a href="#" onclick="myFunction_edit('txtE','EmailID')">Edit</a></td>
        </tr>
        <tr class = "text-left">
            <td>Address:</td>
            <td  id = "Address"></td>
            <td id="txtA" style="display:none;"><input class="form-control" id="txtA_1" onchange="finishedEdit('txtA','txtA_1','Address','Yes')" onblur="finishedEdit('txtA','txtA_1','Address', 'No')" type="text" value=""></td>
            <td><a href="#" onclick="myFunction_edit('txtA','Address')">Edit</a></td>
        </tr>
    </tbody>
</table>
<div class="btn-group " style="border-radius:0px; margin-bottom:-10px">
  <a href="#" class="btn btn-primary" id="get">Get directions</a>
</div>
</div>
</form>
