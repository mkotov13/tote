<?php

/* names are:
    city
    budget
    start-date
    end-date
    adult-count
    kids-count
    email
*/    

if(isset($_POST['email'])) {
 
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_from = "inquire@tote.co";
    $email_subject = "Tote signup form test";
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['budget']) ||
 
        !isset($_POST['city']) ||
       
        !isset($_POST['start_date']) ||
 
        !isset($_POST['end_date']) ||
 
        !isset($_POST['adult_count']) ||
       
        !isset($_POST['todd_count']) ||
       
       !isset($_POST['kids_count']) ||
 
        !isset($_POST['email'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
    
    // checkbox validation and storage
    
        $selectedMood  = 'None';
    if(isset($_POST['mood']) && is_array($_POST['mood']) && count($_POST['mood']) > 0){
        $selectedMood = implode(', ', $_POST['mood']);
    }

    $body .= 'Selected Mood: ' . $selectedMood;
 
    $city = $_POST['city']; // required
    $budget = $_POST['budget']; // required
    $start_date = $_POST['start_date']; // required
    $end_date = $_POST['end_date']; // required
    $adult_count = $_POST['adult_count']; // required
    $kids_count = $_POST['kids_count']; // not required
    $todd_count = $_POST['todd_count']; // not required
    $reply_email = $_POST['email']; // required
    
    // add hello@tote.co
    $email_to .= "maxkotovfromrussia@gmail.com";
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_to)) {
 
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  /*if(!preg_match($string_exp,$first_name)) {
 
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
 
  }
 
  if(!preg_match($string_exp,$last_name)) {
 
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
 
  }
 
  if(strlen($comments) < 2) {
 
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }*/
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
 
    }
 
    $email_message .= "From: ".clean_string($city)."\n"; 
    $email_message .= "Budget: ".clean_string($budget)."\n"; 
    $email_message .= "Start date: ".clean_string($start_date)."\n"; 
    $email_message .= "End Date: ".clean_string($end_date)."\n"; 
    $email_message .= "How many adults: ".clean_string($adult_count)."\n";
    $email_message .= "How many kids: ".clean_string($kids_count)."\n"; 
    $email_message .= "How many toddlers: ".clean_string($todd_count)."\n"; 
    $email_message .= "Selected Mood: " . $selectedMood."\n"; 
    $email_message .= "Reply Email: ".clean_string($reply_email)."\n";
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);
 
?>
 
 
 
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tote</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">
    <link href="css/row-feature.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    
    <!-- Favicon -->
    <link rel="icon" href="favicon.ico">

    <!-- new form script -->
    
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

</head>

<body>

    
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display--> 
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand topnav text-center" href="index.html"><img src="img/inline-logo-sm.png"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling-->
            <!-- /.navbar-collapse-->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Thanks for that!</h1>
                        <h3>We'll email you some ideas within 24 hours.</h3>
                        <a class="btn btn-primary btn-lg" href="index.html">Back to Home</a>
                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
 
<?php
 
}
 
?>