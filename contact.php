<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sent_mail($name,$message,$email,$subject){
    require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);


    $mail->isSMTP();             
                      
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'phpmailerdemo1@gmail.com';                     // SMTP username
    $mail->Password   = 'phpmailer12345';                               // SMTP password
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('abc@gmail.com','Ch.Balbir Singh Public School' );
    $mail->addAddress('phpmailerdemo1@gmail.com', 'Admin');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body= "Query from the user is mentioned below:<br>Name:".$name."<br>Email: ".$email." <br>Message: ".$message;
    $mail->SMTPSecure = 'tls';                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';
    if($mail->send()){
        return true;
    }
   
    else{
        return false;
    }

}

//Validation Errors
$errors=array('name'=>'','email'=>'','message'=>'','subject'=>'');

$name=$email=$message=$subject='';

if(isset($_POST['submit'])){
    include_once('connect.php');

    $name=$mysqli -> real_escape_string(stripslashes(strip_tags($_POST['name'])));
    $subject=$mysqli -> real_escape_string(stripslashes(strip_tags($_POST['subject'])));
    $email=$mysqli -> real_escape_string(stripslashes(strip_tags($_POST['email'])));
    $message=$mysqli -> real_escape_string(stripslashes(strip_tags($_POST['message'])));

    if($name=='')
    $errors['name']="Please fill your name!";
    if($subject=='')
    $errors['subject']="Please fill the subject!";
    if($email=='')
    $errors['email']="Please fill the email!";
    if($message=='')
    $errors['message']="Please write your query!";
    if(!preg_match("/^[a-z\sA-Z]*$/",$name))
    $errors['name']="Invalid name! Please enter a valid name.";
    if(!empty($email) && !filter_var($email,FILTER_VALIDATE_EMAIL))
    $errors['email']="Please enter a valid email adress!";

    if($errors['name'] || $errors['email'] || $errors['subject'] || $errors['message']){
        ?>
         <script type="text/javascript">alert(`Error! Please fill correct details!`);</script>
                <?php
    }
    else{
        $sql="INSERT INTO contact_us (`name`,`email`,`subject`,`message`,`created_at`)
        VALUES('$name','$email','$subject','$message',Now())";

        $result=$mysqli->query($sql);
            
            if($result){
              
              //send mail
              if(sent_mail($name,$message,$email,$subject)){
                  ?>
                  
                <script type="text/javascript">
                    alert(`Thank You for Contacting Us. Your query submitted successfully!`);
                    window.location="/School_Admission_Form/contact.php";
                </script>
                  <?php
              }
              else{
                
              }
             
            }
            else{
              echo 'Contact us Error';
            }
            
          }
    }


?>

<!DOCTYPE html>
<html lang="zxx">


<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="">
  
  <meta name="author" content="">

<title>Contact Us | Ch. Balbir Singh Public School, Hoshiarpur</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="assets/vendors/bootstrap/bootstrap.css">
  <!-- Iconfont Css -->
  <link rel="stylesheet" href="assets/vendors/fontawesome/css/all.css">
  <link rel="stylesheet" href="assets/vendors/bicon/css/bicon.min.css">
  <link rel="stylesheet" href="assets/vendors/themify/themify-icons.css">
  <!-- animate.css -->
  <link rel="stylesheet" href="assets/vendors/animate-css/animate.css">
  <!-- WooCOmmerce CSS -->
  <link rel="stylesheet" href="assets/vendors/woocommerce/woocommerce-layouts.css">
  <link rel="stylesheet" href="assets/vendors/woocommerce/woocommerce-small-screen.css">
  <link rel="stylesheet" href="assets/vendors/woocommerce/woocommerce.css">
   <!-- Owl Carousel  CSS -->
  <link rel="stylesheet" href="assets/vendors/owl/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl/assets/owl.theme.default.min.css">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  <style>
    .error {color:red;}
    
  </style>

</head>



<body id="top-header">
<?php
$includeFile = file_get_contents("header.php");
echo $includeFile;
?>

<section class="page-header">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
          <div class="page-header-content">
            <h1>Contact Us</h1>
            <ul class="list-inline mb-0">
              <li class="list-inline-item">
                <a href="#">Home</a>
              </li>
              <li class="list-inline-item">/</li>
              <li class="list-inline-item">
                  Contact
              </li>
            </ul>
          </div>
      </div>
    </div>
  </div>
</section>



<section class="contact-info section-padding">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6">
                <div class="section-heading center-heading">
                    <span class="subheading">Contact Us</span>
                    <h3>Have any query?</h3>
                    <p></p>
                </div>
            </div>
        </div>
       
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="contact-item">
                            <p>Email Us</p>
                            <h4>ch.balbir4771@gmail.com</h4>
                        </div>
                    </div>
                     <div class="col-lg-12 col-md-6">
                        <div class="contact-item">
                            <p>Make a Call</p>
                            <h4>01882-242609, 241977</h4>
                        </div>
                    </div>
                     <div class="col-lg-12 col-md-6">
                        <div class="contact-item">
                            <p>Address</p>
                            <h4>Ch. Balbir Singh Public School, Arya Samaj Road, Hoshiarpur, Punjab</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <form class="contact__form form-row " method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>" id="contactForm">
                    <div class="row">
                       <div class="col-12">
                           <div class="alert alert-success contact__msg" style="display: none" role="alert">
                               Your message was sent successfully.
                           </div>
                       </div>
                   </div>

                   <div class="row">
                       <div class="col-lg-6">
                           <div class="form-group">
                               <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" value="<?php echo $name; ?>">
                               <div class="error"><?php echo $errors['name']; ?></div>
                           </div>
                       </div>
                       
                       <div class="col-lg-6">
                           <div class="form-group">
                               <input type="text" name="email" id="email" class="form-control" placeholder="Email Address" value="<?php echo $email; ?>">
                               <div class="error"><?php echo $errors['email']; ?></div>
                           </div>
                       </div>
                       <div class="col-lg-12">
                           <div class="form-group">
                               <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" value="<?php echo $subject; ?>">
                               <div class="error"><?php echo $errors['subject']; ?></div>
                           </div>
                       </div>
                       
                       <div class="col-lg-12">
                           <div class="form-group">
                               <textarea id="message" name="message" cols="30" rows="6" class="form-control" placeholder="Your Message" value="<?php echo $message; ?>"></textarea>    
                               <div class="error"><?php echo $errors['message']; ?></div>
                               </div>
                       </div>
                   </div>

                   <div class="col-lg-12">
                       <div class="mt-4 text-right">
                           <button class="btn btn-main" type="submit" name="submit">Send Message <i class="fa fa-angle-right ml-2"></i></button>
                       </div>
                   </div>
               </form> 
            </div>
        </div>
    </div>
</section>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3400.703085239716!2d75.91531086472516!3d31.532313881365692!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1dbb9ba3ecd82e49!2sCh.Balbir%20Singh%20Sr.Sec%20Public%20School!5e0!3m2!1sen!2sin!4v1606562713674!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>


<?php
$includeFile = file_get_contents("footer.php");
echo $includeFile;
?>


    <!-- 
    Essential Scripts
    =====================================-->
    
    <!-- Main jQuery -->
    <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/vendors/jquery/jquery.js"></script>
    <!-- Bootstrap 4.5 -->
    <script src="assets/vendors/bootstrap/bootstrap.js"></script>
    <!-- Counterup -->
    <script src="assets/vendors/counterup/waypoint.js"></script>
    <script src="assets/vendors/counterup/jquery.counterup.min.js"></script>
    <script src="assets/vendors/jquery.isotope.js"></script>
    <script src="assets/vendors/imagesloaded.html"></script>
    <!--  Owlk Carousel-->
    <script src="assets/vendors/owl/owl.carousel.min.js"></script>
    <script src="assets/js/script.js"></script>


</body>
</html>