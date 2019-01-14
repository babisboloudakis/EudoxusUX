<?php


    require("authenticate.php");    
    require("header.php");
    require("config.php");

    if($_SERVER["REQUEST_METHOD"] == "POST" ) {

        $title = $_POST['title'];
        $author = $_POST['author'];
        $description = $_POST['description'];
        // Filter title and author and description for SQL injection
        $title = mysqli_real_escape_string($mysqli,$title);
        $author = mysqli_real_escape_string($mysqli,$author);
        $description = mysqli_real_escape_string($mysqli,$description);
        // Type field
        $type = $_POST['categ'];
        //  Session id
        $pid = $_SESSION['id'];

        // Make sure, book doesn't exist
        $results = $mysqli->query("SELECT id FROM books WHERE name='$title' AND author='$author'");
        if ( $results->num_rows > 0 ) {
            
        } else {
            // book doesn't exist
            if ( !$mysqli->query("INSERT INTO books (name,author,description,category,pid) VALUES ('$title','$author','$description','$type','$pid')" ) ) {
            }
        }
    }

?>

    <!-- container for login page -->
      <div class="container" >
         <div class="row justify-content-center">

            <div class="col-5 rounder p-3 mb-5 mt-5 bg-white">
                <h3>Δημοσίευση Συγγράμματος</h3>
                <hr>
                <p>Εισάγετε τα στοιχεία του Συγγράμαματος
                </p>
                <form action = "" method = "post" class="login-form" >
                    <div class="form-group" id="errorLogin" >
                    </div>
                    <div class="form-group">
                        <label >Τίτλος</label>
                        <input type="text" name="title" class="form-control" placeholder="Τίτλος" required>    
                    </div>
                    <div class="form-group">
                        <label >Συγγραφέας</label>
                        <input type="text" class="form-control" name="author"  placeholder="Συγγραφέας" required>
                    </div>
                    <div class="form-group">
                        <label >Σύντομη Περιγραφή</label>
                        <input type="text" class="form-control" name="description"  placeholder="Περιγραφή" required>
                    </div>
                    <div class="form-group ">
                    <label>Κατηγορία</label>
                        <select id="inputState " name="categ" class="form-control">
                        <option value="Programming" >Programming</option>
                        <option value="Math" >Math</option>
                        <option value="Design" >Design</option>
                        <option value="Economics" >Economics</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary float-right">Δημοσίευση</button>
                        <button type="reset" class="btn btn-secondary float-left">Εκαθάριση</button>                              
                    </div>
               </form>
            </div>

         </div>
      </div>

<?php echo file_get_contents("html/footer.html") ?>