<form id="form_3_1" method="post" name="form_3_1">
    <input type="hidden" name="c_name" value="<?= $_GET["q"]; ?>" />
    <img id="close_2_1" src="images/glyphicons-193-remove-sign.png" onclick ="div_hide_2_1()">
    <div class="panel panel-primary" style="border:0px;">
					<div class="panel-heading" style="font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
						<h3 class="panel-title">Modify bookmark</h3>
					</div>
<table class="table table-striped" style="margin-bottom:10px"  id="dev-table_3_1">
    <tbody>
        <tr class = "text-left">
            <td>New Link:</td>
            <td style="display:block"><input id="link_1" class="form-control" type="text" value="" name="Bookmark_link_1"></td>
            <td></td>
        </tr>
        <tr class = "text-left">
            <td>New Description:</td>
            <td style="display:block"><input  id="desc_1" class="form-control" type="text" value="" name="Bookmark_desc_1"></td>
            <td></td>
        </tr>
    </tbody>
</table>
<div class="btn-group" style="border-radius:0px; margin-bottom:-10px">
  <button type="button" name="modify_b" class="btn btn-primary">Modify</button>
</div>
</div>
</form>