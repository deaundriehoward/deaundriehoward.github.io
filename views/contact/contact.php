<?php 
    // Submiting the Email and Contact Information

    if ($_POST["submit"]) {

        if ($_POST['name']) {
            $error ="<br/>Please enter your name.";
        }

        if ($_POST['email']) {
            $error = "<br/>Please enter your email address.";
        }

        if ($_POST['comment']){
            $error = "<br/> Please enter a comment.";
        }

        if ($_POST['email']!="" AND !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

            $error.= "<br/> Please enter a valid email address";
        }
        
        if ($error) {
                $result='<div class="alert alert-danger"><strong>There was an error in your form:</strong>'.$error.'</div>';
            } else {

                if (mail("deaundre7@gmail.com", "Comment from website!", "Name: ".$_POST['name']." 

                    Email: ".$_POST['email']."

                    Message: ".$_POST['comment'])) {

                    $result='<div class="alert alert-success"><strong> Thank you!<strong> I\'ll be in touch. </div>';

                } else {

                    $result='<div class="alert alert-danger"><Sorry, there was an error sending your message. Please try again later. </div>';
                }
            }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="test.css">
    <title> Email /Contact Form Testing Page</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 emailForm">
                <h1> Simple Email Form with PHP & Bootstrap </h1>
                <?php echo $result; ?>
                <br />
                <p class="lead"> Please feel free to say schmello!</p>

                <form method="post">
                    <div class="form-group">
                            
                            <label for="name"> Name: </label>

                            <input type="text" name="name" class="form-control" placeholder="Name" value="<?php echo $_POST['name'];?>" />
                    </div>

                    <div class="form-group">
                            
                            <label for="email"> Email: </label>

                            <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $_POST['email'];?>" />
                    </div>

                    <div class="form-group">
                            
                            <label for="comment"> Message: </label>

                            <textarea class="form-control" name="comment"><?php echo $_POST['comment'];?></textarea>
                    </div>

                    <input type="submit" name="submit" class="btn btn-succes btn-md" value="Submit">
                </form>
                <br/>
                <br/>
                <div>
                    <p><a href="../../index.html">Back to Home Page</a> </p>
                </div>
            </div>
        </div>
    </div>
    

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src-"test.js"></script>
</body>
</html>