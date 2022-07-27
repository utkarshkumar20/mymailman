<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../includes/config.php');
echo '<pre>';
if (isset($_POST['send'])) {
  $to = $_POST['TO'];
  $cc = $_POST['CC'];
  $bcc = $_POST['BCC'];
  $sub = $_POST['Subject'];
  $msg = $_POST['message'];
  $file = $_FILES['profilephoto']['name'];
  $id = $_SESSION['id'];

  print_r($_POST);  
  print_r($file);
  print_r($id);
  die(" end of code");
  
  if ($to == ' ' || $cc == ' ' || $bcc == ' ' || $sub == ' ' || $msg == '') {
    echo '<script>alert("please fill all field");</script>';
  } else {
      $query = "INSERT INTO email (sender,Receiver,cc,bcc,subject_line,messsage_send,attachement,date_time) VALUES ('$id','$to','$cc','$bcc','$sub','$msg','$file',NOW())" ;    
       $run = mysqli_query($con, $query);
        if ($run) {
          $_SESSION['status'] = "Message send successfully";
          $_SESSION['status_code'] = "success";
          header('Location:dashboard.php');
        }else{
          $_SESSION['status'] ="Message not send successfully";
          $_SESSION['status_code'] = "error";
          header('Location:dashboard.php');
        }
        // die("\n end the code");
      }
    }
      

if (isset($_post['close'])) {
  $query = "INSERT INTO email Values('','$id','$sub','$file','$msg',sysdate())";
  mysqli_query($con, $query);
  $_SESSION['status'] = "message saved...";
  $_SESSION['status_code'] = "success";
  header('Location:dashboarddraft.php');
}
?>



 <?php
  if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
  ?>
    <script>
      swal({
        title: "<?php echo $_SESSION['status']; ?>",
        icon: "<?php echo $_SESSION['status_code']; ?>",
        button: "ok",
      });
    </script>
  <?php  }
  unset($_SESSION['status']);
  ?>

