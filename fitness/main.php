<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Your Body</title>    
    <link href="./style.css" rel="stylesheet" type="text/css">
</head>
    
    <?php
        session_start();
    
        require_once 'log.php';
    
        require_once 'functions.php';   
    ?>

<body id='main-body-div'>
    
        
        <div id='nav-link-id' class="nav-link-div">


            <div class="showHere" id='showing-div'>
                
                <div class="scale-div">
                    
                    <img id='scale-logo-main' src="scale.png">
                    
                </div>

                <div class="link-special">
                    
                    <h3 id='add-formB' onclick="openAddForm()">Add Meal</h3>

                    <h3 id='display-form-button' onclick='openForm()'>Reset Stats</h3>        
                    
                    <h3 id='account-divB' onclick="openClose('last-two')">Account</h3>

                </div>               
            

        </div>
            
            
        </div>
    
    <div class="two-forms">
        
        <div id='reset-form-div'>
    
            <span id="close-reset-icon" class="closeIcon" onclick="closeThisDiv('reset-form-div')">X</span>

            <form class="health-form" action='reset.php' onsubmit='return validNumbers()' method='post'>
                
                <h3>Reset Stats</h3>
                
                <input name='weight' id='weightF' type='number' max=650 placeholder='Weight' required>
                
                <input name='age' id='ageF' type='number' max=100 placeholder='Age' required>
                
                <input name='height' id='heightF' type='text' maxlength=3 placeholder='Height (decimal)' required>
                
                <div class='spacer-div'>
                    
                    <label for='maleB'>Male</label>
                    
                    <input id='maleB' type='radio' value='M' name='gButton'>
                    
                </div>
                
                <div class='spacer-div' id='second-form-div'>
                    
                    <label for='femaleB'>Female</label>
                    
                    <input id='femaleB' type='radio' value='F' name='gButton'>
                    
                </div>
                
                <input id='reset-subB' type='submit' value='Reset'>
                
            </form>

        </div>

        <div class='new-form' id='new-form-hidden'>

            <span id='close-icon' onclick="closeThisDiv2('new-form-hidden')">X</span>
            
            <h3 class="info-update-header">Update Values</h3>
            
            <p>For help finding nutritional values click <a id='ck-link' href='https://www.calorieking.com/' target='_blank'>here</a>.</p>

            <form id='form-update' action='./changes.php' target='_self' onsubmit='return validNumbers2()' method='post'>
                
                <input id='calor' placeholder='Calories' type='number' name='cals' required>
                
                <input id='prot' placeholder='Protein' type='number' name='pro' required>
                
                <input id='fa' placeholder='Fat' type='number' name='fat' required>
                
                <input id='su' placeholder='Sugar' type='number' name='sugar' required>
                
                <input id='cho' placeholder='Cholesterol' type='number' name='chol' required>
                
                <input id='new-meal-subB' type='submit' value='Update'>
                
            </form>


        </div>
    </div>
                     
 
    
    <div class="last-links" id='last-two'>
                        
                    <h3 id='logout-button' onclick="logout()">Log Out</h3>
                
                
               <?php
                
                   if(isset($_SESSION['cuser'])){

                    $emailA = $_SESSION['cemail'];

                    $query = "Select * from" {yourtablename} "where email='$emailA'";

                        $result = $conn->query($query);

                        if($result->num_rows){
                            
                            echo "<h3>Please verify your email</h3>.";
                            
                        }
                        else {
                            
                            echo "<h3 id='change-passB' onclick='changePasswordForm()'>Change Password</h3>";
                            
                        }

                    }
                    else {
                        die('You are not signed in!');
                    }

                    ?>
                            </div>


    <div class="container-div">
        
    <?php
    
    
    if(isset($_SESSION['cuser'])){
        
        if(isset($_GET['updated'])){
            
            $uEmail = $_SESSION['cuser'];
          
             $query = "SELECT * from" {yourtablename} "where email='$uEmail'";
        
        $result = $conn->query($query);
        
        if($result->num_rows){
            
            $row = $result->fetch_array(MYSQLI_ASSOC);
            
            $cals = $row['calories'];
            
            $pro = $row['protein'];
            
            $fat = $row['fat'];
            
            $sugar = $row['sugar'];
            
            $chol = $row['cholesterol'];
            
            $weight = $row['weight'];
            
            echo <<<_HERE
            
                <h1><span class='uname'>$uname's Stats</span></h1>
                
                <div class='body-stats'>    
                
                    <h2>Today's Stats:</h2>  
                    
                        <div class='spacer'>
                        
                            <h3 class='health-head' id='caloriesH'>$cals</h3> 

                            <p>Calories</p>
                        
                        </div>
                        
                        <div class='spacer'>
                        
                            <h3 class='health-head' id='proteinH'>$pro</h3>
                            
                            <p>Protein</p>
                            
                        </div>
                        
                        <div class='spacer'>
                        
                            <h3 class='health-head' id='fatH'>$fat</h3>
                            
                            <p>Fat</p>
                            
                        </div>
                        
                        <div class='spacer'>
                        
                            <h3 class='health-head' id='sugarH'>$sugar</h3>
                            
                            <p>Sugar</p>
                            
                        </div>
                        
                        <div class='spacer'>
                        
                            <h3 class='health-head' id='cholH'>$chol</h3>
                            
                            <p>Cholesterol</p>
                            
                        </div>
                </div>            
                
            _HERE;
            
            
            
            echo <<<_START
            
                <div class='new-form'>
                
                    <h3>Update Values</h3>
                    
                    <p>For help finding nutritional values click <a href='https://www.calorieking.com/' target='_self'>here</a>.</p>

                    <form id='form-update' action='./changes.php' onsubmit='return validNumbers2()' method='post' target='_self'>
                    
                        <input placeholder='Calories' type='number' name='cals'>
                        
                        <input placeholder='Protein' type='number' name='pro'>
                        
                        <input placeholder='Fat' type='number' name='fat'>
                        
                        <input placeholder='Sugar' type='number' name='sugar'>
                        
                        <input placeholder='Cholesterol' type='number' name='chol'>
                        
                        <input type='submit' value='Update'>                         
                        
                    </form>    
                    
                </div>            
            
            _START;
                
            
        }
        }
        else {
            //if form didn't updated page
    
            //if stats
            $uname = $_SESSION['cuser'];
            
            $uEmail = $_SESSION['cemail'];

            echo "<h1>Hey, <span class='uname'>$uname</span>!</h1>";

            $query = "SELECT * from" {yourtablename} "where email='$uEmail'";

            $result = $conn->query($query);

            if($result->num_rows){

                $row = $result->fetch_array(MYSQLI_ASSOC);

                $cals = $row['calories'];
                
                $pro = $row['protein'];
                
                $fat = $row['fat'];
                
                $sugar = $row['sugar'];
                
                $chol = $row['cholesterol'];
                
                $weight = $row['weight'];

            echo <<<_START
            
                    <h2>Today's Stats:</h2>
                    
                    <div class='body-stats'>     
                    
                        <div class='cal'>
                        
                            <h3 id='cal-stat-head' class='stat-head'>Calories</h3>
                            
                            <h3 class='health-head' id='caloriesH'>$cals</h3>
                            
                        </div>
                    
                    <div class='li-stats'>
                    
                        <div class='spacer2'>

                            <div class='spacer'>

                                <h3 class='sub-head'>Protein</h3>

                                <h3 class='health-head' id='proteinH'>$pro</h3>

                            </div>

                            <div class='spacer'>

                                <h3 class='sub-head'>Fat</h3>

                                <h3 class='health-head' id='fatH'>$fat</h3>  

                            </div>

                        </div>                                                                                  
                    
                        <div class='spacer2'>

                            <div class='spacer'>

                                <h3 class='sub-head'>Sugar</h3>

                                <h3 class='health-head' id='sugarH'>$sugar</h3>

                            </div>

                            <div class='spacer'>

                                <h3 class='sub-head'>Cholesterol</h3>

                                <h3 class='health-head' id='cholH'>$chol</h3>

                            </div>

                        </div>
                    
                    </div>
                    
                </div>      


            _START;
        }
        else {
            //if no stats
            echo <<<_ENTER
            
                <p>Enter info below to begin tracking health metrics.</p>
                
                <form class="health-form" action='health.php' onsubmit='return validNumbers()' method='post'>
                
                    <input name='weight' id='weightF' type='number' max=650 placeholder='Weight' required> 
                    
                    <input name='age' id='ageF' type='number' max=100 placeholder='Age' required> 
                    
                    <input name='height' id='heightF' type='text' maxlength=3 placeholder='Height (decimal)' required>
                    
                    <div class='spacer-div'>
                    
                        <label for='maleB'>Male</label>

                        <input id='maleB' type='radio' value='M' name='gButton'>
                    
                    </div>
                    
                    <div class='spacer-div' id='second-form-div'>
                    
                        <label for='femaleB'>Female</label>

                        <input id='femaleB' type='radio' value='F' name='gButton'>  
                    
                    </div>
                    
                    <input type='submit' value='Submit'>     
                    
                </form>        
            
            _ENTER;            
        }
            
    }
    }
    else {
        echo "You must log in!"."<br>";
        
        echo "<a href='index.php' target='_self'>Login</a>"."<br>";
        
        die('Restricted Page!');
    }
    
    ?>
    
        </div>
    
        
    
    <footer class="health-disclaim">
        
        <p class="disclaim-text">Losing more than 2 pounds in a week through calorie counting alone can cause health issues.</p>
        
        <p class="disclaim-text">Protein shown above is the minimum amount of protein someone of your stature should eat daily. More should generally be consumed.</p>
        
        <p class="disclaim-text">Disclaimer: The makers of body buddy do not claim to be dieticians.</p>     
        
    </footer>
     
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
    <script src="script.js" type="application/javascript"></script>
    

</body>
</html>
