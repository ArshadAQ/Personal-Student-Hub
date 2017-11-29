<form action="addcontact.php" id="form" method="post" name="form">
    <img id="close" src="images/glyphicons-193-remove-sign.png" onclick ="div_hide()">
        <h2>New Contact</h2>
    <hr>
    <div class="input-group">
        <span class="input-group-addon" style="height:20px;"><img src="../images/glyphicons-4-user.png" ></span>
        <input   id="name" name="name" placeholder="Name" type="text" class="form-control">
    </div>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input  id="mobileno" name="mobileno" placeholder="Mobile no" type="text" class="form-control">
    </div>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input   id="phoneno" name="phoneno" placeholder="Phone no" type="text" class="form-control">
    </div>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input   id="emailid" name="emailid" placeholder="Email ID" type="text" class="form-control">
    </div>
    
    <input  id="address_contact" name="address" placeholder="Address" type="text" class="form-control">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input   id="emailid" name="emailid" placeholder="Email ID" type="text">
    <a href="javascript:%20check_empty()" id="submit">Add</a>
</form>