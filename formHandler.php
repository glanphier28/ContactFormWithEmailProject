
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>WDV341 | Contact Form With Email</title>
    <style>
        h1, h2, h3 {
            text-align: center;
        }
        header {
            margin-left: -12px;
            margin-right: -12px;
        }
        body {
            background-color: #f8f9fa;
        }
        #body-container-main {
            margin-top: 0px;
        }
        #formInput {
            font-style: italic;
        }

    </style>
    <?php
        $formEmailAddress = $_POST['email'];
        $formFirstName = $_POST['first_name'];
        $formLastName = $_POST['last_name'];
        $formContactReason = $_POST['contact_reason'];
        $formComments = $_POST['commentBox']
        ?>


</head>
<body>
    
        <header class="bg-primary">
            <div class="container-fluid">
                <h1>WDV341</h1>
                <h2>Contact Form With Email</h2>
                <br>
            </div>
        </header>
        <div class="container shadow-sm bg-white rounded-bottom" id="body-container-main">
    
        <br>
        <div class="container" id="form-container">
            <h3>Thank you for the submission!</h3>
            <br>
            <div class="row">
            <div class="col-6">
           <p>Thank you <span id="formInput"><?php echo "$formFirstName $formLastName "?></span> for the form submission regarding <span id="formInput"><?php echo $formContactReason?></span>.</p>
           <p>A confirmation email has been sent to you at <span id="formInput"><?php echo "$formEmailAddress"?></span>.</p>
           <p>The following comments will be relayed: </p>
           <p><span id="formInput"><?php echo $formComments?></span></p>
            <br>
            </div>
            <div class="col-6">
                
            </div>
            </div>
        </div> 
        <?php

        $emailBody = "
        <html>
        <header style='background-color:#0d6efd'>
        <h1 style='text-align:center '>WDV341</h1>
        <h2 style='text-align:center'>Contact Form With Email</h2>
        </header>
        <body style='background-color:#ffffff'>
        <h3 style='text-align:center'>Submission Confirmation</h3>
        <p>Thank you <span style='font-style:italic'>$formFirstName</span>,</p>
        <p>Your submission has been recieved and we will get back to you as soon as possible.</p>
        <p>http://glanphier.com/WDV341/contactFormWithEmail/ContactFormWithEmail.html</p>
        <body>
        </html>
        ";

        $emailSubject = "Submission Confirmation";
        $adminEmailSubject = "New Submission Recieved";

        $emailHeaders = "MIME-Version: 1.0" . "\r\n";
        $emailHeaders .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $emailHeaders .= 'From: <info@glanphier.com>' . "\r\n";

    
        $adminConfirmationAddress = "info@glanphier.com";

        $adminEmailBody= "
        <html>
        <body>
        <h3>New Submission Confirmation</h3>
        <p>A new submission has been recieved from $formFirstName $formLastName.</p>
        <p>Submitter Email: $formEmailAddress.<p>
        <p>Contact Reason: $formContactReason.</p>
        <p>Comments: $formComments</p>
        <p>http://glanphier.com/WDV341/contactFormWithEmail/ContactFormWithEmail.html</p>
        <body>
        </html>
        ";
        mail($formEmailAddress, $emailSubject, $emailBody, $emailHeaders);
        //admin mail
        mail($adminConfirmationAddress, $adminEmailSubject, $adminEmailBody);
        ?>
    </div>
</body>
</html>