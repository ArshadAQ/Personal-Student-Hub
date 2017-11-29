<form id="form_4" method="post" name="form_4" onsubmit="div_hide_4()">
    <img id="close_3" src="images/glyphicons-193-remove-sign.png" onclick ="div_hide_4()">
    <div class="panel panel-primary" style="border:0px;">
					<div class="panel-heading" style="font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;">
						<h3 class="panel-title">Share bookmark</h3>
					</div>
<table class="table table-striped" style="margin-bottom:10px"  id="dev-table_4">
    <tbody>
        <tr class = "text-left">
            <td style = "width:100px">Share with:</td>
            <td id="#" style="display:block">
                <!--<input id="bookmark_contact" class="form-control" type="text" value="" name="Bookmark_contact" onfocus="div_show_dropdown()">-->
                <div class="form-group">
					<select id="select-to" class="contacts selectized" placeholder="Pick some people..." multiple="multiple" tabindex="-1" style="display: none;"></select>
					<!--<div class="selectize-control contacts multi">
					    <div class="selectize-input items not-full has-options">
						    <input type="text" autocomplete="off" tabindex="" id="select-to-selectized" placeholder="Pick some people..." style="width: 120px; opacity: 1; position: relative; left: 0px;">
						</div>
						<div class="selectize-dropdown multi contacts" style="display: none; width: 520px; top: 36px; left: 0px; visibility: visible;">
						    <div class="selectize-dropdown-content">
						        <div data-selectable="" data-value="brian@thirdroute.com" class="">
    						        <span class="label">Brian Reavis</span><span class="caption">brian@thirdroute.com</span>
    						    </div>
    						    <div data-selectable="" data-value="nikola@tesla.com">
    						        <span class="label">Nikola Tesla</span><span class="caption">nikola@tesla.com</span>
    					        </div>
    					        <div data-selectable="" data-value="someone@gmail.com">
    					            <span class="label">someone@gmail.com</span>
    					        </div>
    				        </div>
    				    </div>
    				</div>-->
				    <div class="value">Current Value: <span>null</span></div>
				</div>
                <!--<div class="form-group">
                    <select class="form-control" id="exampleSelect1">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>-->
                <!--<select class="selectpicker">
    <option>1</option>
    <option>2</option>
    <option>3</option>
</select>-->
                <!--<input class="form-control" type="text" value="" name="Bookmark_link">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown button
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                          </div>
                    </div>
                </input>-->
            </td>

        </tr>
    </tbody>
</table>
<div class="btn-group" style="border-radius:0px; margin-bottom:-10px">
  <button name= "share" class="btn btn-primary">Share</button>
</div>
</div>
</form>