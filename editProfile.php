<?php echo file_get_contents("html/header.html"); ?>

<div class="bg-white container">

    <form action="" method="post" class="row">

        <div class="col-md-6">

            <div class="form-group" id="errorLogin" >
            </div>
            <div class="form-group">
                <h5 class="mb-2">Διεύθηνση E-mail</h5>
                <label >Email </label>
                <input type="text" id="user" name="email1" class="form-control mb-2" placeholder="Παλία Διεύθηνση" required>    
                <label >Νέα Email </label>
                <input type="text" id="user" name="email2" class="form-control mb-2" placeholder="Καίνούρια Διεύθηνση" required>    
            </div>
            <div class="form-group">
                <h5 class="mb-2">Διεύθηνση E-mail</h5>
                <label >Email </label>
                <input type="text" id="user" name="email1" class="form-control mb-2" placeholder="Παλία Διεύθηνση" required>    
                <label >Νέα Email </label>
                <input type="text" id="user" name="email2" class="form-control mb-2" placeholder="Καίνούρια Διεύθηνση" required>    
            </div>
            <div class="form-group">
                <h5 class="mb-2">Διεύθηνση E-mail</h5>
                <label >Email </label>
                <input type="text" id="user" name="email1" class="form-control mb-2" placeholder="Παλία Διεύθηνση" required>    
                <label >Νέα Email </label>
                <input type="text" id="user" name="email2" class="form-control mb-2" placeholder="Καίνούρια Διεύθηνση" required>    
            </div>
            <div class="form-group">
                <h5 class="mb-2">Διεύθηνση E-mail</h5>
                <label >Email </label>
                <input type="text" id="user" name="email1" class="form-control mb-2" placeholder="Παλία Διεύθηνση" required>    
                <label >Νέα Email </label>
                <input type="text" id="user" name="email2" class="form-control mb-2" placeholder="Καίνούρια Διεύθηνση" required>    
            </div>

        </div>
        <!-- button col -->
        <div class="col-md-6">
            <input type="button" value="Αποθήκευση" class="btn btn-primary">
            <input type="button" value="Καθαρισμός" class="btn btn-secondary">
        </div>

    </form>

</div>

<?php echo file_get_contents("html/footer.html"); ?>