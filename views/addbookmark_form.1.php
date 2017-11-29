<form action="addbookmark.php" id="form_3" method="post" name="form_3">
    <img id="close_2" src="images/glyphicons-193-remove-sign.png" onclick ="div_hide_3()">
    <div class="panel panel-primary" style="border:0px;">
					<div class="panel-heading" style="font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
						<h3 class="panel-title">Add bookmark</h3>
					</div>	
<table class="table table-striped" style="margin-bottom:10px"  id="dev-table_3">
    <tbody>
        <tr class = "text-left">
            <td>Link:</td>
            <td id="link" style="display:block"><input class="form-control" type="text" value="" name="Bookmark_link"></td>
            <td></td>
        </tr>
        <tr class = "text-left">
            <td>Description:</td>
            <td id="desc" style="display:block"><input class="form-control" type="text" value="" name="Bookmark_desc"></td>
            <td></td>
        </tr>
    </tbody>
</table>
<div class="btn-group" style="border-radius:0px; margin-bottom:-10px">
  <button type="button" class="btn btn-primary" onclick="post_course_1('<?= $_GET["q"]; ?>', '')">Add</button>
</div>
</div>
</form>