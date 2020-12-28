<?php  
$admission_class=$first_name=$last_name=$mother_name=$father_name=$m_res_addr= $f_res_addr=$m_email= $f_email=$m_official=$f_official=$m_income=$f_income
=$aadhar_no=$last_school_name=$issued_date=$last_school_address=$transfer_cert_no=$sibling_name=$sibling_age=
$sibling_relation=$sibling_school_name=$dob=$sub1_name=$sub2_name=$sub3_name=$sub4_name=$sub5_name
=$sub6_name=$sub1_maxMarks=$sub2_maxMarks=$sub3_maxMarks=$sub4_maxMarks=$sub5_maxMarks=$sub6_maxMarks=$sub1_obtMarks=
$sub2_obtMarks=$sub3_obtMarks=$sub4_obtMarks=$sub5_obtMarks=$sub6_obtMarks=$sub1_percent=$sub2_percent=$sub3_percent=
$sub4_percent=$sub5_percent=$sub6_percent=$file_dob_dest=$category_file_dest=$aadhar_file_dest=$last_class
=$category=$last_school_affiliated=$m_occupation=$f_occupation=$other_board=$sub_name=$profile_photo=$m_phone=$f_phone=$m_qualification=$f_qualification=$aadhar_valid_no='';

$errors=array('m_income'=>'','f_income'=>'','firstnameerror'=>'','lastnameerror'=>'','m_nameerror'=>'','f_nameerror'=>'',
'aadhar_no_error'=>'','agree_term'=>'','file_dob'=>'','admission_class'=>'','category_file'=>'','aadhar_file'=>'','last_class'=>'',
'occupation'=>'','qualification'=>'','category'=>'','sub_name'=>'','other_board'=>'','profile_photo'=>'','sub_negative_marks'=>'',
'sub_invalid_marks'=>'','m_phone'=>'','f_phone'=>'');
require_once('connect.php');


if(isset($_POST['submit'])){


    $admission_class=$_POST['admission_class'];
    $session=$_POST['session'];
    $first_name = $mysqli -> real_escape_string(stripslashes(strip_tags($_POST["first_name"])));
    $last_name = $mysqli -> real_escape_string(($_POST["last_name"]));
    $gender=$_POST['gender'];
    $dob = $_POST["dob"];
    $mother_name=$mysqli -> real_escape_string(stripslashes(strip_tags($_POST['mother_name'])));
    $father_name=$mysqli -> real_escape_string(stripslashes(strip_tags($_POST['father_name'])));
    $m_qualification=$_POST['m_qualification'];   
    $f_qualification=$_POST['f_qualification'];
    $m_res_addr=$mysqli -> real_escape_string(stripslashes(strip_tags($_POST['m_res_addr'])));
    $f_res_addr=$mysqli -> real_escape_string(stripslashes(strip_tags($_POST['f_res_addr'])));
    $m_email=$mysqli -> real_escape_string(stripslashes(strip_tags($_POST['m_email'])));
    $f_email=$mysqli -> real_escape_string(stripslashes(strip_tags($_POST['f_email'])));
    $m_phone=$mysqli -> real_escape_string(stripslashes(strip_tags($_POST['m_phone'])));
    $f_phone=$mysqli -> real_escape_string(stripslashes(strip_tags($_POST['f_phone'])));
    $m_occupation=$_POST['m_occupation'];
    $f_occupation=$_POST['f_occupation'];
    $m_official=$mysqli -> real_escape_string(stripslashes(strip_tags($_POST['m_official'])));
    $f_official=$mysqli -> real_escape_string(stripslashes(strip_tags($_POST['f_official'])));
    $m_income=$_POST['m_income'];
    $f_income=$_POST['f_income'];
    $single_girl=$_POST['single_girl'];
    $specially_abled=$_POST['specially_abled'];
    $belonging_to_ews=$_POST['belonging_to_ews'];
    $category=$_POST['category'];
    $aadhar_no=$mysqli -> real_escape_string(stripslashes(strip_tags($_POST['aadhar_no'])));
    $last_school=$_POST['last_school_attended'];
    if($last_school=='other'){ 
      $last_school_name=$mysqli -> real_escape_string(stripslashes(strip_tags($_POST['last_school_name'])));
      $last_school_address=$mysqli -> real_escape_string(stripslashes(strip_tags($_POST['last_school_address'])));
    }
    $last_class=$_POST['last_class'];
    $last_school_affiliated=$_POST['last_school_affiliated'];
    
    if($last_school_affiliated=='Other'){
    $other_board=$_POST['other_board'];
    }
    $transfer_cert_no=$mysqli -> real_escape_string(stripslashes(strip_tags($_POST['transfer_cert_no'])));
    $issued_date=$_POST['issued_date'];
    $sibling_name=$mysqli -> real_escape_string(stripslashes(strip_tags($_POST['sibling_name'])));
    $sibling_relation=$mysqli -> real_escape_string(stripslashes(strip_tags($_POST['sibling_relation'])));
    $sibling_age=$mysqli -> real_escape_string(stripslashes(strip_tags($_POST['sibling_age'])));
    $sibling_school_name=$mysqli -> real_escape_string(stripslashes(strip_tags($_POST['sibling_school_name'])));
    $sub1_name= $mysqli -> real_escape_string(stripslashes(strip_tags($_POST['sub1_name'])));
    $sub2_name= $mysqli -> real_escape_string(stripslashes(strip_tags($_POST['sub2_name'])));
    $sub3_name= $mysqli -> real_escape_string(stripslashes(strip_tags($_POST['sub3_name'])));
    $sub4_name= $mysqli -> real_escape_string(stripslashes(strip_tags($_POST['sub4_name'])));
    $sub5_name= $mysqli -> real_escape_string(stripslashes(strip_tags($_POST['sub5_name'])));
    $sub6_name= $mysqli -> real_escape_string(stripslashes(strip_tags($_POST['sub6_name'])));
    $sub1_maxMarks=$_POST['sub1_maxMarks'];
    $sub2_maxMarks=$_POST['sub2_maxMarks'];
    $sub3_maxMarks=$_POST['sub3_maxMarks'];
    $sub4_maxMarks=$_POST['sub4_maxMarks'];
    $sub5_maxMarks=$_POST['sub5_maxMarks'];
    $sub6_maxMarks=$_POST['sub6_maxMarks'];
    $sub1_obtMarks=$_POST['sub1_obtMarks'];
    $sub2_obtMarks=$_POST['sub2_obtMarks'];
    $sub3_obtMarks=$_POST['sub3_obtMarks'];
    $sub4_obtMarks=$_POST['sub4_obtMarks'];
    $sub5_obtMarks=$_POST['sub5_obtMarks'];
    $sub6_obtMarks=$_POST['sub6_obtMarks'];
    $sub1_percent=$_POST['sub1_percent'];
    $sub2_percent=$_POST['sub2_percent'];
    $sub3_percent=$_POST['sub3_percent'];
    $sub4_percent=$_POST['sub4_percent'];
    $sub5_percent=$_POST['sub5_percent'];
    $sub6_percent=$_POST['sub6_percent'];
    $agree_term=false;
    $aadhar_valid_no=$_POST['aadhar_valid_no'];

    
  if(isset($_POST['agree'])){
    $agree_term=true;
  }


    $subject_info=['sub1_name'=>$sub1_name,'sub2_name'=>$sub2_name,'sub3_name'=>$sub3_name,'sub4_name'=>$sub4_name,'sub5_name'=>$sub5_name,'sub6_name'=>$sub6_name,'sub1_maxMarks'=>$sub1_maxMarks,'sub2_maxMarks'=>$sub2_maxMarks,'sub3_maxMarks'=>$sub3_maxMarks,
    'sub4_maxMarks'=>$sub4_maxMarks,'sub5_maxMarks'=>$sub5_maxMarks, 'sub6_maxMarks'=>$sub6_maxMarks,
    'sub1_obtMarks'=>$sub1_obtMarks,'sub2_obtMarks'=>$sub2_obtMarks,'sub3_obtMarks'=>$sub3_obtMarks,'sub4_obtMarks'=>$sub4_obtMarks,'sub5_obtMarks'=>$sub5_obtMarks,
    'sub6_obtMarks'=>$sub6_obtMarks,'sub1_percent'=>$sub1_percent,'sub2_percent'=>$sub2_percent,'sub3_percent'=>$sub3_percent,'sub4_percent'=>$sub4_percent,'sub5_percent'=>$sub5_percent,'sub6_percent'=>$sub6_percent
];
    
    $subject_details=json_encode($subject_info);
  
//File Upload
$file_dob_err=$_FILES['file_dob']['error'];
$category_file_err=$_FILES['category_file']['error'];
$aadhar_file_err=$_FILES['aadhar_file']['error'];
$profile_photo_err=$_FILES['profile_photo']['error'];


$file_dob_name= $_FILES['file_dob']['name'];
$category_file_name= $_FILES['category_file']['name'];
$aadhar_file_name=$_FILES['aadhar_file']['name'];
$profile_photo_name=$_FILES['profile_photo']['name'];

$file_dob_tmp_name= $_FILES['file_dob']['tmp_name'];
$category_file_tmp_name= $_FILES['category_file']['tmp_name'];
$aadhar_file_tmp_name=$_FILES['aadhar_file']['tmp_name'];
$profile_photo_tmp_name=$_FILES['profile_photo']['tmp_name'];

$file_dob_size= $_FILES['file_dob']['size'];
$category_file_size= $_FILES['category_file']['size'];
$aadhar_file_size=$_FILES['aadhar_file']['size'];
$profile_photo_size=$_FILES['profile_photo']['size'];

$file_dob_type= $_FILES['file_dob']['type'];
$category_file_type= $_FILES['category_file']['type'];
$aadhar_file_type=$_FILES['aadhar_file']['type'];
$profile_photo_type=$_FILES['profile_photo']['type'];

$file_dob_arr= explode('.',$file_dob_name);
$category_arr= explode('.',$category_file_name);
$aadhar_arr=explode('.',$aadhar_file_name);
$profile_arr=explode('.',$profile_photo_name);

$file_dob_ext=strtolower(end($file_dob_arr));
$category_file_ext=strtolower(end($category_arr));
$aadhar_file_ext=strtolower(end($aadhar_arr));
$profile_photo_ext=strtolower(end($profile_arr));

$allowedExtensions=array('jpg','jpeg','png','pdf');
$maxsize = 5242880; 

if($agree_term){

  // Upload Profile Photo
  if($profile_photo_err  ==0){
    if(in_array($profile_photo_ext,$allowedExtensions)){
      if($profile_photo_size<$maxsize){
        $profile_photo_newName=uniqid('PROFILE_',false).".".$profile_photo_ext;
        $profile_photo_dest='uploads/'.$profile_photo_newName; 
        move_uploaded_file($profile_photo_tmp_name,$profile_photo_dest);
      }else{
        $errors['profile_photo']="File size exceeded!";
      }
    }else{
        $errors['profile_photo']="Invalid file type!";
    }
    }else
    {
      $errors['profile_photo']="Upload profile photo!";
    }
  
  //DOB Fileupload
  if($file_dob_err  ==0){
  if(in_array($file_dob_ext,$allowedExtensions)){
    if($file_dob_size<$maxsize){
      $file_dob_newName=uniqid('DOB_',false).".".$file_dob_ext;
      $file_dob_dest='uploads/'.$file_dob_newName; 
      move_uploaded_file($file_dob_tmp_name,$file_dob_dest);
    }else{
      $errors['file_dob']="File size exceeded!";
    }
  }else{
      $errors['file_dob']="Invalid file type!";
  }
  }else
  {
    $errors['file_dob']="Upload DOB Certificate!";
  }

  //Category File upload
  if($category_file_err==0){
  if(in_array($category_file_ext,$allowedExtensions)){
    if($category_file_size<$maxsize){
      $category_file_newName=uniqid('CATEGORY_',false).".".$category_file_ext;
      $category_file_dest='uploads/'.$category_file_newName; 
      move_uploaded_file($category_file_tmp_name,$category_file_dest);
    }else{
      $errors['category_file']="File size exceeded!";
    }
  }else{
      $errors['category_file']="Invalid file type!";
  }
  }else
    {
      $errors['category_file']="";
    }
  

  //Aadhar File upload
 if($aadhar_file_err==0){
  if(in_array($aadhar_file_ext,$allowedExtensions)){
    if($aadhar_file_size<$maxsize){
      $aadhar_file_newName=uniqid('AADHAR_',false).".".$aadhar_file_ext;
      $aadhar_file_dest='uploads/'.$aadhar_file_newName; 
      move_uploaded_file($aadhar_file_tmp_name,$aadhar_file_dest);
    }else{
      $errors['aadhar_file']="File size exceeded!";
    }
  }else{
$errors['aadhar_file']="Invalid file type!";
  }
}
  //Aadhar Validation

   

  //Income Validations
  
        if(!isset($admission_class) || !isset($session)){
            $errors['admission_class']='Please fill admission class and session first!';
        }
        if(!isset($gender)){
          $errors['gender']="Please fill the gender first!";
        }
        if(!isset($dob)){
          $errors['dob']="Please fill dob first!";
        }
        if($m_qualification =='' ){
          $errors['m_qualification']="Please select qualification details!";
        }

        if($f_qualification ==''){
          $errors['f_qualification']="Please select qualification details!";
        }
        if(!isset($m_occupation) || !isset($f_occupation)){
          $errors['occupation']="Please select occupation details!";
        }
        if(!isset($last_class)){
          $errors['last_class']="Please select last class attended!";
        }
        if(!isset($category)){
          $errors['category']="Please select category!";
        }  
        if($aadhar_valid_no==''){
          $errors['aadhar_no_error']="Please fill valid Aadhar Number!";
        }
      
               
         if(!preg_match("/^\d*\.?\d+$/",$m_income) || $m_income<0)
        {
            $errors['m_income']="Invalid Income";
          
        }
         if( !preg_match("/^\d*\.?\d+$/",$f_income) || $f_income<0){
          
          $errors['f_income']='Invalid Income';
        
        }
         if(!preg_match("/^[a-zA-Z]*$/",$first_name)){
          $errors['firstnameerror']='First name must contain only characters';
          }
        
         if(!preg_match("/^[a-zA-Z]*$/",$last_name)){
          $errors['lastnameerror']="Last name must contain only characters";
        
        }
         if(!preg_match("/^[a-z\sA-Z]*$/",$mother_name))
        {
          $errors['m_nameerror']='Name must have characters only';
        }

         if(!preg_match("/^[a-z\sA-Z]*$/",$father_name)){
          $errors['f_nameerror']='Name must have characters only';
        }

        if(!preg_match("/^[0-9]{10}+$/",$m_phone)){
          $errors['m_phone']="Invalid Mobile Number!";
        }
        if(!preg_match("/^[0-9]{10}+$/",$f_phone)){
          $errors['f_phone']="Invalid Mobile Number!";
        }

      
        
        if(!empty($sub4_name) && !empty($sub5_name) && !empty($sub6_name)){
          if(!preg_match("/^[a-z\sA-Z]*$/",$sub1_name) || !preg_match("/^[a-z\sA-Z]*$/",$sub2_name) || !preg_match("/^[a-z\sA-Z]*$/",$sub3_name) || 
          !preg_match("/^[a-z\sA-Z]*$/",$sub4_name) || !preg_match("/^[a-z\sA-Z]*$/",$sub5_name) || !preg_match("/^[a-z\sA-Z]*$/",$sub6_name))  {
            $errors['sub_name']='Subject name can have only characters and spaces!';
          }    
          
          //Subject marks check
          if(!preg_match("/^\d*\.?\d+$/",$sub1_obtMarks) || !preg_match("/^\d*\.?\d+$/",$sub2_obtMarks) || !preg_match("/^\d*\.?\d+$/",$sub3_obtMarks)
          || !preg_match("/^\d*\.?\d+$/",$sub4_obtMarks) || !preg_match("/^\d*\.?\d+$/",$sub5_obtMarks) || !preg_match("/^\d*\.?\d+$/",$sub6_obtMarks) || !preg_match("/^\d*\.?\d+$/",$sub1_maxMarks)
          || !preg_match("/^\d*\.?\d+$/",$sub2_maxMarks) || !preg_match("/^\d*\.?\d+$/",$sub3_maxMarks) || !preg_match("/^\d*\.?\d+$/",$sub4_maxMarks) || !preg_match("/^\d*\.?\d+$/",$sub5_maxMarks) || !preg_match("/^\d*\.?\d+$/",$sub6_maxMarks))
          {
              $errors['sub_invalid_marks']="Invalid subject marks!";
          
          }

          if($sub1_obtMarks<0 || $sub2_obtMarks<0 ||$sub3_obtMarks<0 ||$sub4_obtMarks<0 ||$sub5_obtMarks<0 ||$sub6_obtMarks<0 ||
          $sub1_maxMarks<0 ||$sub2_maxMarks<0 ||$sub3_maxMarks<0 ||$sub4_maxMarks<0 ||$sub5_maxMarks<0 ||$sub6_maxMarks<0 )
           {
              $errors['sub_negative_marks']="Subject marks can't be negative!";
            
          }
    }
      if(empty($sub4_name) || empty($sub5_name) || empty($sub6_name)){

        if(!preg_match("/^[a-z\sA-Z]*$/",$sub1_name) || !preg_match("/^[a-z\sA-Z]*$/",$sub2_name) || !preg_match("/^[a-z\sA-Z]*$/",$sub3_name))  {
          $errors['sub_name']='Subject name can have only characters and spaces!';
        }    
        
        //Subject marks check
        if(!preg_match("/^\d*\.?\d+$/",$sub1_obtMarks) || !preg_match("/^\d*\.?\d+$/",$sub2_obtMarks) || !preg_match("/^\d*\.?\d+$/",$sub3_obtMarks)
       || !preg_match("/^\d*\.?\d+$/",$sub1_maxMarks)|| !preg_match("/^\d*\.?\d+$/",$sub2_maxMarks) || !preg_match("/^\d*\.?\d+$/",$sub3_maxMarks))
        {
            $errors['sub_invalid_marks']="Invalid subject marks!";
        
        }

        if($sub1_obtMarks<0 || $sub2_obtMarks<0 ||$sub3_obtMarks<0  ||
          $sub1_maxMarks<0 ||$sub2_maxMarks<0 ||$sub3_maxMarks<0  )
           {
              $errors['sub_negative_marks']="Subject marks can't be negative!";
            
          }

      }


        

        //Check errors 

        if($errors['m_income'] || $errors['f_income'] || $errors['firstnameerror'] || $errors['lastnameerror'] || $errors['m_nameerror'] || $errors['f_nameerror']
        || $errors['aadhar_no_error'] || $errors['agree_term'] || $errors['file_dob'] || $errors['admission_class'] || $errors['category_file']
         || $errors['aadhar_file'] || $errors['last_class'] || $errors['occupation'] || $errors['qualification'] || $errors['category']
        || $errors['sub_name'] || $errors['other_board'] || $errors['profile_photo'] || $errors['sub_negative_marks'] || $errors['sub_invalid_marks'] || $errors['m_phone']
        || $errors['f_phone'] )
            {
                ?>
                <script type="text/javascript">alert(`Error! Please fill correct details!`);</script>
                
                <?php 
            }
      
          else{
          
          $sql = "INSERT INTO admission_details (
            first_name, last_name, dob, m_name, f_name, m_qualification, f_qualification, m_res_address, f_res_address, m_email, f_email, m_occupation, f_occupation,
            `gender`, `m_official_address`, `f_official_address`, `m_income`, `f_income`, `single_girl_child`, `specially_abled`, 
            `belong_ews`, `category`, `aadhar_number`, `last_school_name`, `last_school_address`, `last_class`, `last_school_affiliated`, 
            `transfer_cert_no`, `issued_date`, `sibling_name`, `sibling_relation`, `sibling_age`, `sibling_school_name`,`subject_details`,`session`,`admission_class`,`dob_file_path`,
            `aadhar_file_path`,`category_file_path`,`createdAt`,`other_board`,`profile_photo_path`,`last_school`
            ) 
            VALUES (
            '$first_name', '$last_name', '$dob', '$mother_name', '$father_name', '$m_qualification',
            '$f_qualification', '$m_res_addr ', '$f_res_addr', '$m_email', '$f_email', '$m_occupation', '$f_occupation',
            '$gender', '$m_official', '$f_official','$m_income',$f_income,'$single_girl','$specially_abled','$belonging_to_ews','$category',$aadhar_no,
            '$last_school_name','$last_school_address','$last_class','$last_school_affiliated','$transfer_cert_no','$issued_date',
            '$sibling_name','$sibling_relation','$sibling_age','$sibling_school_name','$subject_details','$session','$admission_class','$file_dob_dest',
            '$aadhar_file_dest','$category_file_dest',NOW(),'$other_board','$profile_photo_dest','$last_school'
            );";

            $result=$mysqli->query($sql);
            
            if($result){
              ?>
              <script type="text/javascript">
                alert('Application successfully submitted!');
                window.location="/School_Admission_Form";
              </script>
              <?php
              
            }
            else{
              echo 'Error';
            }
            
          }

}
else{
  $errors['agree_term']='You must accept the terms and conditions to submit the form.';
}

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags-->
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
<!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery/jquery-ui.min.js"></script>
    <script src="js/main.js"></script>

    <!-- Title Page-->
    <title>Admission Form</title>

    <!-- Icons font CSS-->
    <link
      href="vendor/mdi-font/css/material-design-iconic-font.min.css"
      rel="stylesheet"
      media="all"
    />
    <link
      href="vendor/font-awesome-4.7/css/font-awesome.min.css"
      rel="stylesheet"
      media="all"
    />
    <!-- Font special for pages-->
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i"
      rel="stylesheet"
    />

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all" />
    <link
      href="vendor/datepicker/daterangepicker.css"
      rel="stylesheet"
      media="all"
    />


    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all" />
    <link href="vendor/jquery/jquery-ui.css" rel="stylesheet"/>
   <link href="vendor/jquery/jquery-ui.theme.css"rel="stylesheet"/>
  </head>

  <body>
    <div class="page-wrapper p-t-30 p-b-10">
      <div class="wrapper wrapper--w790">
        <div class="card card-5">
          <div class="card-heading">
            <h2 class="title">Admission Form</h2>
          </div>

        <!-- Class & session -->
          <div class="card-body">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
              <div class="form-row" style="margin-top: 40px">
                <div class="name">Admission in Class<span style="color:red">*</span></div>
                <div class="value">
                  <div class="input-group">
                    <div class="row row-space">
                      <div class="col-2">
                        <div
                          class="rs-select2 js-select-simple select--no-search"
                        >
                          <select name="admission_class" id="admission_class"  value="<?php echo $admission_class ?>"  required 
                          onchange="find_last_class()">
                            <option disabled="disabled" selected="selected" default value="">
                              Select Class
                            </option>
                          <option value="1st" <?php if ( (isset($_POST['admission_class'])) && ($_POST['admission_class'] == '1st')){?> selected="selected" <?php }?>>1st</option>
                          <option value="2nd" <?php if ( (isset($_POST['admission_class'])) && ($_POST['admission_class'] == '2nd')){?> selected="selected" <?php }?>>2nd</option>
                          <option value="3rd" <?php if ( (isset($_POST['admission_class'])) && ($_POST['admission_class'] == '3rd')){?> selected="selected" <?php }?>>3rd</option>
                          <option value="4th" <?php if ( (isset($_POST['admission_class'])) && ($_POST['admission_class'] == '4th')){?> selected="selected" <?php }?>>4th</option>
                          <option value="5th" <?php if ( (isset($_POST['admission_class'])) && ($_POST['admission_class'] == '5th')){?> selected="selected" <?php }?>>5th</option>
                          <option value="6th" <?php if ( (isset($_POST['admission_class'])) && ($_POST['admission_class'] == '6th')){?> selected="selected" <?php }?>>6th</option>
                          <option value="7th" <?php if ( (isset($_POST['admission_class'])) && ($_POST['admission_class'] == '7th')){?> selected="selected" <?php }?>>7th</option>
                          <option value="8th" <?php if ( (isset($_POST['admission_class'])) && ($_POST['admission_class'] == '8th')){?> selected="selected" <?php }?>>8th</option>
                          <option value="9th" <?php if ( (isset($_POST['admission_class'])) && ($_POST['admission_class'] == '9th')){?> selected="selected" <?php }?>>9th</option>
                          <option value="10th" <?php if ( (isset($_POST['admission_class'])) && ($_POST['admission_class'] == '10th')){?> selected="selected" <?php }?>>10th</option>
                          <option value="11th" <?php if ( (isset($_POST['admission_class'])) && ($_POST['admission_class'] == '11th')){?> selected="selected" <?php }?>>11th</option>
                          <option value="12th" <?php if ( (isset($_POST['admission_class'])) && ($_POST['admission_class'] == '12th')){?> selected="selected" <?php }?>>12th</option>  
                          </select>
                               
                          <div class="select-dropdown"></div>
                        </div>
                        <span style="color:red"><?php echo $errors['admission_class']; ?></span>
                      </div>

                      <div class="col-2">
                        
                        <div
                          class="rs-select2 js-select-simple select--no-search"
                        >
                          <select name="session" required>
                            <option disabled="disabled" selected="selected">
                              Select Session
                            </option>
                            <option value="session1" <?php if ( (isset($_POST['session'])) && ($_POST['session'] == 'session1')){?> selected="selected" <?php }?> >Session 1</option>
                          <option value="session2" <?php if ((isset($_POST['session'])) && ($_POST['session'] == 'session2')) {?> selected="selected" <?php }?> >Session 2</option>
                        
                          </select>
                          <div class="select-dropdown"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

          <!-- PersonalDetails -->
                <label class="label label--block">Personal Details:</label><span style="color:red">*</span>
                <div
                  style="
                    border: 2px solid gray;
                    border-radius: 5px;
                    padding: 10px;
                    margin-top: 10px;
                    margin-bottom: 20px;
                  "
                >
                  <div class="form-row m-b-55">
                    <div class="name">Name<span style="color:red">*</span></div>
                    <div class="value">
                      <div class="row row-space">
                        <div class="col-2">
                          <div class="input-group-desc">
                            <input
                              class="input--style-5"
                              type="text"
                              name="first_name"
                              placeholder="First Name"
                              value="<?php echo $first_name;  ?>"
                              required="required"

                            />
                            <p style="color:red"><?php echo $errors['firstnameerror'] ?></p>
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="input-group-desc">
                            <input
                              class="input--style-5"
                              type="text"
                              name="last_name"
                              placeholder="Last Name"
                              value="<?php echo $last_name  ?>"
                              required

                            />
                            <p style="color:red"><?php echo $errors['lastnameerror'] ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>


<!-- neha -->

                <div class="form-row">
                    <div class="name">Gender<span style="color:red">*</span></div>
                    <div class="value">
                      <div class="row row-space">
                        <div class="col-2">
                        <div class="p-t-20">
                      <label class="radio-container m-r-55"
                        >Male
                        <input type="radio" name="gender" id="gender" value="M" required <?php if (isset($_POST["gender"]) && $_POST['gender']=='M') {echo 'checked="checked"';} ?> />
                        <span class="checkmark"></span>
                      </label>
                      <label class="radio-container"
                        >Female
                        <input type="radio" name="gender" value="F" required <?php if (isset($_POST["gender"]) && $_POST['gender']=='F') {echo 'checked="checked"';} ?> />
                        <span class="checkmark"></span>
                      </label>

                      <label class="radio-container" style="margin-left: 20px"
                        >Other
                        <input type="radio" name="gender" value="other" required <?php if (isset($_POST["gender"]) && $_POST['gender']=='other') {echo 'checked="checked"';} ?> />
                        <span class="checkmark"></span>
                      </label>
                    </div>
                        </div>
                        <div class="col-2">
                        <div class="name">Profile Photo<span style="color:red">*</span></div>
                          <div class="input-group-desc">
                            <input type="file" name="profile_photo" id="profile_photo" required/>
                          </div>
                          <span
                            ><span style="color:red">*</span><small
                              >(Upload profile photo. Max File Size 5
                              MB. Note: pdf, jpg, jpeg, png allowed)</small
                            >
                          </span>
                          <span style="color:red" ><?php echo $errors['profile_photo']; ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
               
                
                  
                  <!-- date of birth  -->
                  <div class="form-row">
                    <div class="name">DOB<span style="color:red">*</span></div>
                    <div class="value">
                      <div class="row row-space">
                        <div class="col-2">
                          <div class="input-group-desc">
                            <input
                              class="input--style-5"
                              style="width:270px"
                              type="text"
                              name="dob"
                              id="dob"
                              required
                              readonly="readonly"
                              placeholder="Date of Birth"
                              value="<?php echo $dob;  ?>"
                            />
                            <i class="fa fa-calendar"></i>
                          </div>

                        </div>
                        <div class="col-2">
                          <div class="input-group-desc">
                            <input type="file" name="file_dob" id="file" required/>
                          </div>
                          <span
                            ><span style="color:red">*</span><small
                              >(Upload DOB certificate. Max File Size 5
                              MB. pdf, jpg, jpeg, png allowed)</small
                            >
                          </span>
                          <span style="color:red" ><?php echo $errors['file_dob']; ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- parents details -->
                <label class="label label--block">Details of Parents<span style="color:red">*</span></label>
                <div
                  style="
                    border: 2px solid gray;
                    border-radius: 5px;
                    padding: 10px;
                    margin-top: 10px;
                    margin-bottom: 20px;
                  "
                >
                  <div class="form-row">
                    
                    <div class="name">Name<span style="color:red">*</span></div>
                    <div class="value">
                      <div class="row row-space">
                        <div class="col-2">
                          <div class="input-group-desc">
                            <input
                              class="input--style-5"
                              type="text"
                              placeholder="Mother's name"
                              name="mother_name"
                              value="<?php echo $mother_name  ?>"
                              required
                            />
                            <p style="color:red"><?php echo $errors['m_nameerror'] ?></p>
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="input-group-desc">
                            <input
                              class="input--style-5"
                              type="text"
                              placeholder="Father/Guardian name"
                              name="father_name"
                              value="<?php echo $father_name  ?>"
                              required
                            />
                            <p style="color:red"><?php echo $errors['f_nameerror'] ?></p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- 2nd -->

                  <div class="form-row">
                    <div class="name">Qualification<span style="color:red">*</span></div>
                    <div class="value">
                      <div class="row row-space">
                        <div class="col-2">
                      <div
                        class="rs-select2 js-select-simple select--no-search"
                      >
                        <select name="m_qualification" required="true"  >
                          <option disabled="disabled" selected="selected" value="">
                            Mother's Qualification
                          </option>
                        <option value="10th" <?php if ( (isset($_POST['m_qualification'])) && ($_POST['m_qualification'] == '10th')){?> selected="selected" <?php }?> >10th</option>
                        <option value="12th" <?php if ( (isset($_POST['m_qualification'])) && ($_POST['m_qualification'] == '12th')){?> selected="selected" <?php }?> >12th</option>
                        <option value="Diploma" <?php if ( (isset($_POST['m_qualification'])) && ($_POST['m_qualification'] == 'Diploma')){?> selected="selected" <?php }?> >Diploma</option>
                        <option value="Graduate" <?php if ( (isset($_POST['m_qualification'])) && ($_POST['m_qualification'] == 'Graduate')){?> selected="selected" <?php }?> >Graduate</option>
                        <option value="Post Graduate" <?php if ( (isset($_POST['m_qualification'])) && ($_POST['m_qualification'] == 'Post Graduate')){?> selected="selected" <?php }?> >Post Graduate</option>
                        <option value="Doctorate" <?php if ( (isset($_POST['m_qualification'])) && ($_POST['m_qualification'] == 'Doctorate')){?> selected="selected" <?php }?> >Doctorate</option>
                        <option value="NA" <?php if ( (isset($_POST['m_qualification'])) && ($_POST['m_qualification'] == 'NA')){?> selected="selected" <?php }?> >NA</option>
                        
                        </select>
                        <div class="select-dropdown"></div>
                        <span style="color:red"><?php echo $errors['qualification']; ?></span>
                        </div>
                      </div>

                        
                        <div class="col-2">
                        <div
                          class="rs-select2 js-select-simple select--no-search"
                        >
                          <select name="f_qualification" required="true" >
                            <option disabled="disabled" selected="selected" value="" >
                              Father's/Guardian's Qualification
                            </option>
                            <option value="10th"  <?php if ( (isset($_POST['f_qualification'])) && ($_POST['f_qualification'] == '10th')){?> selected="selected" <?php }?>>10th</option>
                            <option value="12th" <?php if ( (isset($_POST['f_qualification'])) && ($_POST['f_qualification'] == '12th')){?> selected="selected" <?php }?>>12th</option>
                            <option value="Diploma" <?php if ( (isset($_POST['f_qualification'])) && ($_POST['f_qualification'] == 'Diploma')){?> selected="selected" <?php }?>>Diploma</option>
                            <option value="Graduate" <?php if ( (isset($_POST['f_qualification'])) && ($_POST['f_qualification'] == 'Graduate')){?> selected="selected" <?php }?>>Graduate</option>
                            <option value="Post Graduate" <?php if ( (isset($_POST['f_qualification'])) && ($_POST['f_qualification'] == 'Post Graduate')){?> selected="selected" <?php }?>>Post Graduate</option>
                            <option value="Doctorate" <?php if ( (isset($_POST['f_qualification'])) && ($_POST['f_qualification'] == 'Doctorate')){?> selected="selected" <?php }?>>Doctorate</option>
                            <option value="NA" <?php if ( (isset($_POST['f_qualification'])) && ($_POST['f_qualification'] == 'NA')){?> selected="selected" <?php }?>>NA</option>
                         
                          </select>
                          <div class="select-dropdown"></div>
                          <span style="color:red"><?php echo $errors['qualification']; ?></span>
                        </div>
                      </div>

                       
                      </div>
                    </div>
                  </div>


                  <!-- 3rd -->

                  <div class="form-row">
                    <div class="name">Residential Address<span style="color:red">*</span></div>
                    <div class="value">
                      <div class="row row-space">
                        <div class="col-2">
                          <div class="input-group-desc">
                            <input
                              class="input--style-5"
                              type="text"
                              placeholder="Mother's res. address"
                              value="<?php echo $m_res_addr  ?>"
                              name="m_res_addr"
                            />
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="input-group-desc">
                            <input
                              class="input--style-5"
                              type="text"
                              placeholder="Father/Guardian res. address"
                              name="f_res_addr"
                              value="<?php echo $f_res_addr  ?>"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- 4th -->

                  <div class="form-row">
                    <div class="name">Email</div>
                    <div class="value">
                      <div class="row row-space">
                        <div class="col-2">
                          <div class="input-group-desc">
                            <input
                              class="input--style-5"
                              type="email"
                              name="m_email"
                              placeholder="Mother's Email"
                              value="<?php echo $m_email  ?>"
                              
                            />
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="input-group-desc">
                            <input
                              class="input--style-5"
                              type="email"
                              name="f_email"
                              placeholder="Father/Guardian Email"
                              value="<?php echo $f_email  ?>"
                              
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Phone number -->

                  <div class="form-row">
                    <div class="name">Phone Number<span style="color:red">*</span></div>
                    
                    <div class="value">
                       
                      <div class="row row-space">
                        <div class="col-2">
                          <div class="input-group-desc">
                            <input
                              class="input--style-5"
                              type="text"
                              name="m_phone"
                              maxlength="10"
                              placeholder="Mother's Mobile No."
                              value="<?php echo $m_phone  ?>"
                              required
                            />
                            <span style="color:red"><?php echo $errors['m_phone']; ?></span>
                    
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="input-group-desc">
                            <input
                              class="input--style-5"
                              type="text"
                              name="f_phone"
                              maxlength="10"
                              placeholder="Father/Guardian Mobile No."
                              value="<?php echo $f_phone  ?>"
                              required
                            />
                            <span style="color:red"><?php echo $errors['f_phone']; ?></span>
                    
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- 5th -->

                  <div class="form-row">
                    <div class="name">Occupation<span style="color:red">*</span></div>
                    <div class="value">
                      <div class="row row-space">
                        <div class="col-2">
                      <div
                        class="rs-select2 js-select-simple select--no-search"
                      >
                        <select name="m_occupation" required="true"  >
                        <option disabled="disabled" selected="selected" value="">
                          Mother's Occupation
                        </option>
                            <option value="Home Maker" <?php if ( (isset($_POST['m_occupation'])) && ($_POST['m_occupation'] == 'Home Maker')){?> selected="selected" <?php }?>  >Home Maker</option>
                            <option value="Private Sector" <?php if ( (isset($_POST['m_occupation'])) && ($_POST['m_occupation'] == 'Private Sector')){?> selected="selected" <?php }?> >Private Sector</option>
                            <option value="Public Sector" <?php if ( (isset($_POST['m_occupation'])) && ($_POST['m_occupation'] == 'Public Sector')){?> selected="selected" <?php }?> >Public Sector</option>
                            <option value="Health Services" <?php if ( (isset($_POST['m_occupation'])) && ($_POST['m_occupation'] == 'Health Services')){?> selected="selected" <?php }?> >Health Services</option>
                            <option value="Govt. and public administration" <?php if ( (isset($_POST['m_occupation'])) && ($_POST['m_occupation'] == 'Govt. and public administration')){?> selected="selected" <?php }?> >Govt. and Public Administration</option>
                            <option value="Human Services" <?php if ( (isset($_POST['m_occupation'])) && ($_POST['m_occupation'] == 'Human Services')){?> selected="selected" <?php }?> >Human Services</option>
                            <option value="Agriculture" <?php if ( (isset($_POST['m_occupation'])) && ($_POST['m_occupation'] == 'Agriculture')){?> selected="selected" <?php }?> >Agriculture</option>
                            <option value="Business" <?php if ( (isset($_POST['m_occupation'])) && ($_POST['m_occupation'] == 'Business')){?> selected="selected" <?php }?> >Business</option>
                            <option value="Service and Salesworker" <?php if ( (isset($_POST['m_occupation'])) && ($_POST['m_occupation'] == 'Service and Salesworker')){?> selected="selected" <?php }?> >Service and Salesworker</option>
                            <option value="Technicians" <?php if ( (isset($_POST['m_occupation'])) && ($_POST['m_occupation'] == 'Technicians')){?> selected="selected" <?php }?> >Technicians</option>
                            <option value="Education" <?php if ( (isset($_POST['m_occupation'])) && ($_POST['m_occupation'] == 'Education')){?> selected="selected" <?php }?> >Education</option>
                            <option value="Clerical support workers" <?php if ( (isset($_POST['m_occupation'])) && ($_POST['m_occupation'] == 'Clerical support workers')){?> selected="selected" <?php }?> >Clerical Support Workers</option>
                          
                        </select>
                       
                        <div class="select-dropdown"></div>
                        <span style="color:red"><?php echo $errors['occupation']; ?></span>
                        </div>
                      </div>

                        
                        <div class="col-2">
                        <div
                          class="rs-select2 js-select-simple select--no-search"
                        >
                          <select name="f_occupation" required="true" >
                            <option disabled="disabled" selected="selected" value="" >
                              Father's/Guardian's Occupation
                            </option>
                            <option value="Private Sector" <?php if ( (isset($_POST['f_occupation'])) && ($_POST['f_occupation'] == 'Private Sector')){?> selected="selected" <?php }?> >Private Sector</option>
                            <option value="Public Sector" <?php if ( (isset($_POST['f_occupation'])) && ($_POST['f_occupation'] == 'Public Sector')){?> selected="selected" <?php }?> >Public Sector</option>
                            <option value="Health Services" <?php if ( (isset($_POST['f_occupation'])) && ($_POST['f_occupation'] == 'Health Services')){?> selected="selected" <?php }?> >Health Services</option>
                            <option value="Govt. and public administration" <?php if ( (isset($_POST['f_occupation'])) && ($_POST['f_occupation'] == 'Govt. and public administration')){?> selected="selected" <?php }?> >Govt. and Public Administration</option>
                            <option value="Human Services" <?php if ( (isset($_POST['f_occupation'])) && ($_POST['f_occupation'] == 'Human Services')){?> selected="selected" <?php }?> >Human Services</option>
                            <option value="Agriculture" <?php if ( (isset($_POST['f_occupation'])) && ($_POST['f_occupation'] == 'Agriculture')){?> selected="selected" <?php }?> >Agriculture</option>
                            <option value="Business" <?php if ( (isset($_POST['f_occupation'])) && ($_POST['f_occupation'] == 'Business')){?> selected="selected" <?php }?> >Business</option>
                            <option value="Service and Salesworker" <?php if ( (isset($_POST['f_occupation'])) && ($_POST['f_occupation'] == 'Service and Salesworker')){?> selected="selected" <?php }?> >Service and Salesworker</option>
                            <option value="Technicians" <?php if ( (isset($_POST['f_occupation'])) && ($_POST['f_occupation'] == 'Technicians')){?> selected="selected" <?php }?> >Technicians</option>
                            <option value="Education" <?php if ( (isset($_POST['f_occupation'])) && ($_POST['f_occupation'] == 'Education')){?> selected="selected" <?php }?> >Education</option>
                            <option value="Clerical support workers" <?php if ( (isset($_POST['f_occupation'])) && ($_POST['f_occupation'] == 'Clerical support workers')){?> selected="selected" <?php }?> >Clerical Support Workers</option>
                          
                         
                          </select>
                          <div class="select-dropdown"></div>
                          <span style="color:red"><?php echo $errors['occupation']; ?></span>
                        </div>
                      </div>

                       
                      </div>
                    </div>
                  </div>

                  <!-- 6th -->

                  <div class="form-row">
                    <div class="name">Official Address<span style="color:red">*</span></div>
                    <div class="value">
                      <div class="row row-space">
                        <div class="col-2">
                          <div class="input-group-desc">
                            <input
                              class="input--style-5"
                              type="text"
                              name="m_official"
                              placeholder="Mother's official address"
                              value="<?php echo $m_official;  ?>"
                            />
                          </div>
                        </div>
                        <div class="col-2">
                          <div class="input-group-desc">
                            <input
                              class="input--style-5"
                              type="text"
                              name="f_official"
                              placeholder="Father/Guardian official address"
                              value="<?php echo $f_official;  ?>"
                            />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- 7th -->

                  <div class="form-row">
                    <div class="name">Annual Income<span style="color:red">*</span></div>
                    <div class="value">
                      <div class="row row-space">
                        <div class="col-2">
                          <div class="input-group-desc">
                            <input
                              class="input--style-5 income"
                              type="text"
                              name="m_income"
                              placeholder="Mother's income"
                              required
                              value="<?php echo $m_income;  ?>"
                            />
                           Lakhs per year
                           <p style="color:red"><?php echo $errors['m_income']; ?></p>

                          </div>
                        </div>
                        <div class="col-2">
                          <div class="input-group-desc">
                            <input
                              class="input--style-5 income"
                              type="text"
                              name="f_income"
                              placeholder="father annual income"
                              value="<?php echo $f_income;  ?>"
                            />
                            Lakhs per year
                            <p style="color:red"><?php echo $errors['f_income'];?></p>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- child specification section -->

                <label class="label label--block"
                  >Whether the Candidate is :<span style="color:red">*</span></label
                >
                <div
                  style="
                    border: 2px solid gray;
                    border-radius: 5px;
                    padding: 10px;
                    margin-top: 10px;
                    margin-bottom: 20px;
                  "
                >
                  <div class="form-row p-t-20">
                    <label class="label label--block">Single Girl Child<span style="color:red">*</span></label>
                    <div class="p-t-15">
                      <label class="radio-container m-r-55"
                        >Yes
                        <input type="radio" name="single_girl" value="Y" required <?php if (isset($_POST["single_girl"]) && $_POST['single_girl']=='Y') {echo 'checked="checked"';} ?>/>
                        <span class="checkmark"></span>
                      </label>
                      <label class="radio-container"
                        >No
                        <input type="radio" name="single_girl" value="N" required <?php if (isset($_POST["single_girl"]) && $_POST['single_girl']=='N') {echo 'checked="checked"';} ?>/>
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>

                  <div class="form-row p-t-20">
                    <label class="label label--block"
                      >Specially Abled(Divyangjan)<span style="color:red">*</span></label
                    >
                    <div class="p-t-15">
                      <label class="radio-container m-r-55"
                        >Yes
                        <input type="radio" name="specially_abled" value="Y" required <?php if (isset($_POST["specially_abled"]) && $_POST['specially_abled']=='Y') {echo 'checked="checked"';} ?> />
                        <span class="checkmark"></span>
                      </label>
                      <label class="radio-container"
                        >No
                        <input type="radio" name="specially_abled" value="N" required <?php if (isset($_POST["specially_abled"]) && $_POST['specially_abled']=='N') {echo 'checked="checked"';} ?> />
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>

                  <div class="form-row p-t-20">
                    <label class="label label--block">Belonging to EWS<span style="color:red">*</span></label>
                    <div class="p-t-15">
                      <label class="radio-container m-r-55"
                        >Yes
                        <input type="radio" name="belonging_to_ews" value="Y"  required <?php if (isset($_POST["belonging_to_ews"]) && $_POST['belonging_to_ews']=='Y') {echo 'checked="checked"';} ?> />
                        <span class="checkmark"></span>
                      </label>
                      <label class="radio-container"
                        >No
                        <input type="radio" name="belonging_to_ews" value="N" required <?php if (isset($_POST["belonging_to_ews"]) && $_POST['belonging_to_ews']=='N') {echo 'checked="checked"';} ?> />
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                </div>

                <!--  category section -->

                <div class="form-row" style="margin-top: 40px" id="form-row">
                  <div class="name">Category<span style="color:red">*</span></div>
                  <div class="value">
                    <div class="input-group">
                      <div class="row row-space">
                        <div class="col-2">
                          <div
                            class="rs-select2 js-select-simple select--no-search"
                          >
                            <select name="category" required="true" id="category">
                              <option disabled="disabled" selected="selected" value="">
                                Choose category
                              </option>
                              
                              <option value="SC" <?php if ( (isset($_POST['category'])) && ($_POST['category'] == 'SC')){?> selected="selected" <?php }?> >SC</option>
                              <option value="ST" <?php if ( (isset($_POST['category'])) && ($_POST['category'] == 'ST')){?> selected="selected" <?php }?> >ST</option>
                              <option value="OBC" <?php if ( (isset($_POST['category'])) && ($_POST['category'] == 'OBC')){?> selected="selected" <?php }?> >OBC</option>
                              <option value="EWS" <?php if ( (isset($_POST['category'])) && ($_POST['category'] == 'EWS')){?> selected="selected" <?php }?> >EWS</option>
                              <option value="general" <?php if ( (isset($_POST['category'])) && ($_POST['category'] == 'general')){?> selected="selected" <?php }?> >General</option>
                            </select>
                            <div class="select-dropdown"></div>
                            <span style="color:red"><?php echo $errors['category']; ?></span>
                          </div>
                        </div>
                        <div class="col-2" id="optionalELe">
                          <div class="input-group-desc">
                            <input
                              type="file"
                              name="category_file"
                              id="categoryFile"
                  
                            />
                          </div>
                          <span
                            >
                              <small>(Upload Category Certificate.Max File Size 5
                              MB. Note: pdf, jpg, jpeg, png allowed)
                              )</small
                            >
                          </span>
                          <span style="color:red"><?php echo $errors['category_file']; ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- aadhar section-->

                <div class="form-row" style="margin-top: 40px" id="aadhar">
                  <div class="name">Aadhar Number<span style="color:red">*</span></div>
                  <div class="value">
                    <div class="input-group">
                      <div class="row row-space">
                        <div class="col-2">
                          <input
                            class="input--style-5"
                            type="text"
                            id="aadhar_no"
                            name="aadhar_no"
                            maxLength="12"
                            required
                            onchange="aadhar_verify()"
                            value="<?php echo $aadhar_no;  ?>"
                            placeholder="Enter Aadhar Number"
                        
                          />
                          <input type="text" id="aadhar_valid_no" name="aadhar_valid_no"  value="<?php echo $aadhar_valid_no; ?>"  hidden/>
                          <p id= "aadhar_error" style="color:red"><?php echo $errors['aadhar_no_error'];?></p>
                        </div>
                        <div class="col-2">
                          <div class="input-group-desc">
                            <input
                              type="file"
                              name="aadhar_file"
                              id="aadhar"
                              
                            />
    
                          </div>
                          
                          <span
                            ><small
                              >(Upload Adhar Card. Max File Size 5
                              MB. Note: pdf, jpg, jpeg, png allowed))</small
                            >
                          </span>
                          <span style="color:red"><?php echo $errors['aadhar_file']; ?></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Selection of last school -->
              <div  id="lastSchool">
                <div class="form-row p-t-20" >
                    <label class="label label--block">Last School Attended<span style="color:red">*</span></label>
                    <div class="p-t-15">
                      <label class="radio-container m-r-55"
                        >Current
                        <input type="radio" name="last_school_attended" value="current"  required <?php if (isset($_POST["last_school_attended"]) && $_POST['last_school_attended']=='current') {echo 'checked="checked"';} ?> />
                        <span class="checkmark"></span>
                      </label>
                      <label class="radio-container"
                        >Other
                        <input type="radio" name="last_school_attended" value="other" required <?php if (isset($_POST["last_school_attended"]) && $_POST['last_school_attended']=='other') {echo 'checked="checked"';} ?> />
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    
                         
                  </div>
                  <?php if ($last_school_address && $last_school_name){?>
                          <!--  -->
                          <div id="lastSchoolInfo">
                                <div class="form-row">
                                  <div class="name">Name of Last School Attended<span style="color:red">*</span></div>
                                  <div class="value">
                                    <div class="input-group">
                                      <input
                                        class="input--style-5"
                                        type="text"
                                        name="last_school_name"
                                        required
                                        value="<?php echo $last_school_name;?>"
                                      />
                                    </div>
                                  </div>
                                </div>
                                <div class="form-row">
                                  <div class="name">Address of Last School Attended<span style="color:red">*</span></div>
                                  <div class="value">
                                    <div class="input-group">
                                      <input
                                        class="input--style-5"
                                        type="text"
                                        name="last_school_address"
                                        required
                                        value="<?php echo $last_school_address;?>"
                                      />
                                    </div>
                                  </div>
                                </div>
                          </div>
                          <!--  -->
                          <?php
                        }
                          ?>
                   
              </div>

               
                <!-- class last attended -->

                <div class="form-row" style="margin-top: 40px">
                  <div class="name">Class Last Attended</div>
                  <div class="value">
                    <div class="input-group">
                    <input
                        class="input--style-5"
                        type="text"
                        name="last_class"
                        id="last_class"
                        readonly="readonly"
                        placeholder="Last Class Attended"
                        value="<?php echo $last_class;?>"
                      />
                          </div>
                  </div>
                </div>

                <!--  Board Section -->
                <div class="form-row" style="margin-top: 40px" id="board-select">
                  <div class="name">Last School Affiliated To<span style="color:red">*</span></div>
                  <div class="value">
                    <div class="input-group">
                      <div
                        class="rs-select2 js-select-simple select--no-search"
                      >
                        <select name="last_school_affiliated" id="last_school_affiliated" required="true">
                          <option disabled="disabled" selected="selected" value="">
                            Select Board
                          </option>
                          <option value="CBSE" <?php if ( (isset($_POST['last_school_affiliated'])) && ($_POST['last_school_affiliated'] == 'CBSE')){?> selected="selected" <?php }?>>CBSE</option>
                          <option value="IB" <?php if ( (isset($_POST['last_school_affiliated'])) && ($_POST['last_school_affiliated'] == 'IB')){?> selected="selected" <?php }?>>IB</option>
                          <option value="ICSE" <?php if ( (isset($_POST['last_school_affiliated'])) && ($_POST['last_school_affiliated'] == 'ICSE')){?> selected="selected" <?php }?>>ICSE</option>
                          <option value="State" <?php if ( (isset($_POST['last_school_affiliated'])) && ($_POST['last_school_affiliated'] == 'State')){?> selected="selected" <?php }?>>State Board</option>
                          <option value="Other" <?php if ( (isset($_POST['last_school_affiliated'])) && ($_POST['last_school_affiliated'] == 'Other')){?> selected="selected" <?php }?>>Any Other</option>
                          
                        </select>
                        <?php if ( $other_board){?>
                          <div class="input-group-desc">
                          <br>
                          <label class='label label--block'>Enter Board</label>
                            <input class="input--style-5 input-subject" type="text" name="other_board" value="<?php echo $other_board; ?>"/>
                         </div>
                          
                          <?php
                        }
                          ?>
                          


                        <div class="select-dropdown"></div>
                        
                      </div>
                    </div>
                  </div>
                </div>

                <!-- result of last class -->

                <label class="label label--block">Result of last Class</label><span style="color:red">*</span>
                <div
                  style="
                    border: 2px solid gray;
                    border-radius: 5px;
                    margin-top: 10px;
                    margin-bottom: 20px;
                    padding: 20px;
                  "
                >
                  <label class="label label--block" style="padding-left: 50px"
                    >Subject Name
                  </label><span style="color:red">*</span>
        
                     
                  <label class="label label--block" style="padding-left: 55px"
                    >Max Marks
                  </label><span style="color:red">*</span>
                  <label class="label label--block" style="padding-left: 55px"
                    >Marks Obtd</label
                  ><span style="color:red">*</span>
                  <label class="label label--block" style="padding-left: 55px"
                    >% of marks
                  </label>

                  <!-- 1st -->
                  <div class="form-row" style="margin-top: 5px" id="input1">
                    <b>1.</b>
                    
                    <div class="value">
                      <div class="row row-space">
                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5 " type="text" name="sub1_name" value="<?php echo $sub1_name;  ?>" required/>
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5 input-max-mark" type="text" onkeyup="percentCal('input1')" name="sub1_maxMarks" value="<?php echo $sub1_maxMarks;  ?>"  required/>
                          </div>
                        </div>

                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5 input-obt-mark" type="text" step="any" onkeyup="percentCal('input1')" name="sub1_obtMarks" value="<?php echo $sub1_obtMarks;  ?>" required/>
                          </div>
                        </div>

                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5 input-mark-percent" type="text"  name="sub1_percent" value="<?php echo $sub1_percent;  ?>" readonly required/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- 2nd  -->

                  <div class="form-row" style="margin-top: 5px" id="input2">
                    <b>2.</b>
                    <div class="value">
                      <div class="row row-space">
                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5" type="text" name="sub2_name" value="<?php echo $sub2_name;  ?>"  required/>
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5 input-max-mark" type="text" onkeyup="percentCal('input2')" name="sub2_maxMarks" value="<?php echo $sub2_maxMarks;  ?>" required/>
                          </div>
                        </div>

                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5 input-obt-mark" type="text" onkeyup="percentCal('input2')" name="sub2_obtMarks" value="<?php echo $sub2_obtMarks; ?>" required/>
                          </div>
                        </div>

                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5 input-mark-percent" type="text" name="sub2_percent" readonly  value="<?php echo $sub2_percent;  ?>" required/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- 3rd -->

                  <div class="form-row" style="margin-top: 5px" id="input3">
                    <b>3.</b>
                    <div class="value">
                      <div class="row row-space">
                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5" type="text" name="sub3_name" value="<?php echo $sub3_name;  ?>" required/>
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5 input-max-mark" type="text" onkeyup="percentCal('input3')" name="sub3_maxMarks" value="<?php echo $sub3_maxMarks;  ?>" required/>
                          </div>
                        </div>

                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5 input-obt-mark" type="text" onkeyup="percentCal('input3')" name="sub3_obtMarks" value="<?php echo $sub3_obtMarks;  ?>" required/>
                          </div>
                        </div>

                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5 input-mark-percent" type="text" name="sub3_percent" readonly value="<?php echo $sub3_percent;  ?>"  required/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- 4th -->

                  <div class="form-row" style="margin-top: 5px" id="input4">
                    <b>4.</b>
                    <div class="value">
                      <div class="row row-space">
                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5" type="text"  name="sub4_name" value="<?php echo $sub4_name;  ?>" />
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5 input-max-mark" type="text" onkeyup="percentCal('input4')" name="sub4_maxMarks" value="<?php echo $sub4_maxMarks;  ?>" />
                          </div>
                        </div>

                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5 input-obt-mark" type="text" onkeyup="percentCal('input4')" name="sub4_obtMarks" value="<?php echo $sub4_obtMarks;  ?>" />
                          </div>
                        </div>

                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5 input-mark-percent" type="text" name="sub4_percent" readonly value="<?php echo $sub4_percent;  ?>" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- 5th -->

                  <div class="form-row" style="margin-top: 5px" id="input5">
                    <b>5.</b>
                    <div class="value">
                      <div class="row row-space">
                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5 " type="text" name="sub5_name" value="<?php echo $sub5_name;  ?>" />
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5 input-max-mark" type="text" onkeyup="percentCal('input5')" name="sub5_maxMarks" value="<?php echo $sub5_maxMarks;  ?>" />
                          </div>
                        </div>

                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5 input-obt-mark" type="text" onkeyup="percentCal('input5')" name="sub5_obtMarks" value="<?php echo $sub5_obtMarks;  ?>" />
                          </div>
                        </div>

                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5 input-mark-percent" type="text" name="sub5_percent" readonly value="<?php echo $sub5_percent;  ?>" />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- 6th -->

                  <div class="form-row" style="margin-top: 5px" id="input6">
                    <b>6.</b>
                    <div class="value">
                      <div class="row row-space">
                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5" type="text" name="sub6_name" value="<?php echo $sub6_name;  ?>" />
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5 input-max-mark" type="text" onkeyup="percentCal('input6')" name="sub6_maxMarks" value="<?php echo $sub6_maxMarks;  ?>" />
                          </div>
                        </div>

                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5 input-obt-mark" type="text" onkeyup="percentCal('input6')" name="sub6_obtMarks" value="<?php echo $sub6_obtMarks;  ?>" />
                          </div>
                        </div>

                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5 input-mark-percent" type="text" name="sub6_percent" readonly value="<?php echo $sub6_percent;  ?>" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <span style="color:red"><?php echo $errors['sub_name']; ?></span>
                    <span style="color:red"><?php echo $errors['sub_negative_marks']; ?></span>
                    <span style="color:red"><?php echo $errors['sub_invalid_marks']; ?></span>
                  </div>
                </div>

                <!-- transfer certificate details -->




                <label class="label label--block"
                  >Transfer Certificate Details:</label
                ><span style="color:red">*</span>
                <div
                  style="
                    border: 2px solid gray;
                    border-radius: 5px;
                    margin-top: 10px;
                    margin-bottom: 20px;
                    padding: 10px;
                  "
                >
                  
                <div class="form-row">
                  <div class="name">Transfer Certificate No.  & Issue Date<span style="color:red">*</span></div>
                  <div class="value">
                    <div class="row row-space">
                      <div class="col-2">
                        
                        <div class="input-group-desc">
                         
                          <input
                            class="input--style-5"
                            type="text"
                            name="transfer_cert_no"
                            required
                            placeholder="Transfer Certificate No."
                            value="<?php echo $transfer_cert_no;  ?>"
                          />
                        </div>
                      </div>
                      <div class="col-2">
                       
                        <div class="input-group-desc">
                          <div>
                          <input
                            class="input--style-5"
                            style="width:270px"
                            type="text"
                            name="issued_date"
                            id="issued_date"
                            readonly="readonly"
                            required
                            placeholder="Date of Issue"
                        
                            value="<?php echo $issued_date;  ?>"
                          /><i class="fa fa-calendar"></i>
                        </div>
                        </div>
                       
                      </div>
                    </div>
                  </div>
                </div>
              </div>
               

                <!-- details of siblings -->

                <label class="label label--block"
                  >Details of Siblings (if any)</label
                >
                <div
                  style="
                    border: 2px solid gray;
                    border-radius: 5px;
                    margin-top: 10px;
                    margin-bottom: 20px;
                    padding: 10px;
                  "
                >
                  <label class="label label--block" style="padding-left: 75px"
                    >Name </label
                  >&nbsp;&nbsp;&nbsp;
                  <label class="label label--block" style="padding-left: 75px"
                    >Brother/Sister</label
                  >
                  <label class="label label--block" style="padding-left: 75px"
                    >Age</label
                  >&nbsp;&nbsp;&nbsp;
                  <label class="label label--block" style="padding-left: 75px"
                    >School Studying In</label
                  >

                  <div class="form-row" style="margin-top: 5px">
                    <b></b>
                    <div class="value">
                      <div class="row row-space">
                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5" type="text" name="sibling_name" value="<?php echo $sibling_name;  ?>"/>
                          </div>
                        </div>
                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5" type="text" name="sibling_relation"  value="<?php echo $sibling_relation;  ?>"/>
                          </div>
                        </div>

                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5" type="text" name="sibling_age" value="<?php echo $sibling_age;  ?>"/>
                          </div>
                        </div>

                        <div class="col-3">
                          <div class="input-group-desc">
                            <input class="input--style-5" type="text" name="sibling_school_name" value="<?php echo $sibling_school_name;  ?>"/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <hr />

                <!-- declaration section -->
<div style="text-align:center">
                <label class="label" style="display:inline-block" >Declaration<span style="color:red">*</span></label>
</div>
                <div
                  style="
                    border: 2px solid gray;
                    border-radius: 5px;
                    padding: 10px;
                    margin-top: 10px;
                    margin-bottom: 20px;
                  "
                >
                <div class="form-row">
                  <div class="name"><input type="checkbox" name="agree" value="y" required/></div>
                  <div class="value">
                    
                    I hereby declare that the above information including name
                    of the candidate. The Guardian's name, Mother's name and
                    date of birth furnished by me is correct to my best knowledge and
                    belief.I shall abide by the rules of the school.
                  
                   
                  </div>
                </div>
               
               
           
             
                
                  <p style="color:red"><?php echo $errors['agree_term']; ?></p>                       
              </div>

                <button class="submit" type="submit" name="submit">Register</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
    <!-- Sweet alert -->
    
    
    <!-- Main JS-->
    
    <script src="js/global.js"></script>
  </body>

</html>
<!-- end document-->
