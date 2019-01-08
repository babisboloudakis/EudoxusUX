<?php
    require("authenticate.php");
    include("header.php");
    // Edit profile Script
    include("config.php");

    echo "wtf";
    if ( isset($_POST['edit'])  ) {
        echo "wow";
        echo ' <script> alert("Form works!"); </script>';
        // Retrieve form data
        $username = $_POST['fuser'];
        $email = $_POST['femail'];
        $password1 = $_POST['fpass1'];
        $password2 = $_POST['fpass2'];
        $password3 = $_POST['fpass3'];
        $phone = $_POST['fphone'];

        // Update data on database
        echo $username;

    }

?>

<div class="bg-white container">

    <form method="post" action="" class="row">

        <div class="col-md-6">

            <div class="form-group" id="errorLogin" >
                
            </div>


            <div class="form-group">
                <h5 class="mb-2">Όνομα χρήστη</h5>
                <label >Username </label>
                <input type="text" id="user" name="fuser" class="form-control mb-2" placeholder="καινούριο username" required>        
            </div>
            <div class="form-group">
                <h5 class="mb-2">Διεύθηνση E-mail</h5>
                <label >Email </label>
                <input type="text" id="user" name="femail" class="form-control mb-2" placeholder="Καίνούρια Διεύθηνση" required>    
            </div>
            <div class="form-group">
                <h5 class="mb-2">Κωδικός Πρόσβασης</h5>
                <label >Κωδικός </label>
                <input type="text" id="user" name="fpass1" class="form-control mb-2" placeholder="Παλιός Κωδικός" required>    
                <label >Καινούριος Κωδικός </label>
                <input type="text" id="user" name="fpass2" class="form-control mb-2" placeholder="Καινούριος Κωδικός" required>
                <label >Επιβεβαίωση Κωδικού </label>
                <input type="text" id="user" name="fpass3" class="form-control mb-2" placeholder="Καινούριος Κωδικός" required>      
            </div>
            <div class="form-group">
                <h5 class="mb-2">Τηλέφωνο</h5>
                <label >Καινούριο Τηλέφωνο </label>
                <input type="text" id="user" name="fphone" class="form-control mb-2" placeholder="Καινούριο Τηλέφωνο" required>     
            </div>
            

        </div>
        <!-- button col -->
        <div class="col-md-6 mt-5">
            
            <p> 
                Συμπληρώστε τα πεδία τα οποία θέλετε να αλλάξετε, αφήνοντας κενά
                τα υπόλοιπα. Στην συνέχεια πατήστε το κουμπί Αποθήκευση.
            </p>
            <input type="button" name="edit" value="edit" class="btn btn-primary">
            <!-- <input type="button"  value="Καθαρισμός" class="btn btn-secondary"> -->
        </div>

    </form>

</div>

<?php echo file_get_contents("html/footer.html"); ?>