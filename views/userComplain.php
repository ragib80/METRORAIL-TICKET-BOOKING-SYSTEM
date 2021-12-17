<?php
require_once('topNav.php');

//$user = $_SESSION['username'];

?>

<div class="container-fluid" id="container-wrapper">
    <form method="post" action="../controllers/addComplain.php">
        <div class="form-group">
            <!--<input type="hidden" name="username" id="actionResult" value="<//?php $user; ?>" /> -->
            <label for="exampleFormControlSelect1">Complain type</label>
            <select class="form-control" id="exampleFormControlSelect1" name="type">
                <option value="Ticket Issue">Ticket Issue</option>
                <option value="Service">Service</option>
                <option value="Other">Other</option>

            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Complain description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="complainDetails"></textarea>
        </div>
        <input class="btn btn-primary" type="submit" name="submit" value="submit">
    </form>
</div>