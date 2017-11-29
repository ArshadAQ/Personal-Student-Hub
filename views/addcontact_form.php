<form action="addcontact.php" id="form" method="post" name="form">
    <img id="close" src="images/glyphicons-193-remove-sign.png" onclick ="div_hide()">
        <h2 style="font-family:sans-serif">New Contact</h2>
    <hr>
    <input   id="name" name="name" placeholder="Name" type="text">
    <input  id="mobileno" name="mobileno" placeholder="Mobile no" type="text">
    <input   id="phoneno" name="phoneno" placeholder="Phone no" type="text">
    <input   id="emailid" name="emailid" placeholder="Email ID" type="text">
    <input  id="address_contact" name="address" placeholder="Address" type="text">
    <a href="javascript:%20check_empty()" id="submit">Add</a>
</form>