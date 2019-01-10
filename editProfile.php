<?php
    require("authenticate.php");
    include("header.php");
    // Edit profile Script
    include("config.php");

    if ( isset($_POST['edit'])  ) {

        // Retrieve form data
        $username = $_POST['fuser'];
        $email = $_POST['femail'];
        $password1 = $_POST['fpass1'];
        $password2 = $_POST['fpass2'];
        $password3 = $_POST['fpass3'];
        $phone = $_POST['fphone'];

        // Update username
        if ( isset($username) ) {
        echo "working";
        // $mysqli->query("UPDATE users SET username = '$username' WHERE  username={$_SESSION['user']} ");
        echo "UPDATE users SET username = '$username' WHERE  username={$_SESSION['user']} ";
        }
 
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
                <input type="text" id="user" name="fuser" class="form-control mb-2" placeholder="καινούριο username">        
            </div>
            <div class="form-group">
                <h5 class="mb-2">Διεύθηνση E-mail</h5>
                <label >Email </label>
                <input type="text" id="user" name="femail" class="form-control mb-2" placeholder="Καίνούρια Διεύθηνση">    
            </div>
            <div class="form-group">
                <h5 class="mb-2">Κωδικός Πρόσβασης</h5>
                <label >Κωδικός </label>
                <input type="text" id="user" name="fpass1" class="form-control mb-2" placeholder="Παλιός Κωδικός">    
                <label >Καινούριος Κωδικός </label>
                <input type="text" id="user" name="fpass2" class="form-control mb-2" placeholder="Καινούριος Κωδικός">
                <label >Επιβεβαίωση Κωδικού </label>
                <input type="text" id="user" name="fpass3" class="form-control mb-2" placeholder="Καινούριος Κωδικός">      
            </div>
            <div class="form-group">
                <h5 class="mb-2">Τηλέφωνο</h5>
                <label >Καινούριο Τηλέφωνο </label>
                <input type="text" id="user" name="fphone" class="form-control mb-2" placeholder="Καινούριο Τηλέφωνο">     
            </div>
            

        </div>
        <!-- button col -->
        <div class="col-md-6 mt-5">
            
            <p> 
                Συμπληρώστε τα πεδία τα οποία θέλετε να αλλάξετε, αφήνοντας κενά
                τα υπόλοιπα. Στην συνέχεια πατήστε το κουμπί Αποθήκευση.
            </p>
            <input type="submit" name="edit" value="edit" class="btn btn-primary">
            <!-- <input type="button"  value="Καθαρισμός" class="btn btn-secondary"> -->
        </div>

    </form>

</div>

<?php echo file_get_contents("html/footer.html"); ?>