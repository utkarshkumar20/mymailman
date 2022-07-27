<?php
session_start();
include('../includes/config.php');

$user_id = $_SESSION['id'];
$query = "SELECT * FROM Signup_table where id = '$user_id'";
$result = mysqli_query($con, $query);
// var_dump($result);
if (mysqli_num_rows($result) > 0) {
  $user_data = $result->fetch_assoc();
}

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/dasboard.css">
  <script src="https://kit.fontawesome.com/2079f2e470.js" crossorigin="anonymous"></script>
  <!-- <link href="navbar-top-fixed.css" rel="stylesheet"> -->
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#form1").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
  <title>Mailman!</title>
</head>
<style>

</style>

<body>
  <!-- ******************************************************************************************************** -->
  <!-- header -->
  <!-- d-flex d-grid gap-2 d-md-flex justify-content-center navbar-form navbar-right -->
  <nav class="navbar navbar-expand-sm fixed-top bg-primary justify-content-around">
    <div class="container-fluid ">
      <div class="col-md-1 ">
        <a class="navbar-brand" href="#"><img src="../image/logo1.png" alt="" width="100%" height="50"></a>
      </div>
      <div class="col-md-2 "></div>
      <div class="col-md-6">
        <form class="form-outline d-flex gap-1 d-md-flex">
          <input class="form-control border border-dark rounded-pill" role="search" id="form1" type="search" placeholder="Search" aria-label="Search" />
          <span class="input-group-text border-0 rounded-pill" id="search-addon">
            <i class="fa-solid fa-magnifying-glass"></i>
          </span>
        </form>
      </div>

      <nav class="navbar navbar-dark ">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="true" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>
      <div class="collapse navbar-collapse justify-content-md-end" id="navbarCollapse">
        <div class="col-md-8 ">
          <form class="d-flex d-grid gap-1 d-md-flex ">
            <li type="button" class="nav-item dropdown btn btn-sm">
              <a class="form-control nav-link dropdown-toggle" href="#" id="navbarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <?php
                //  print_r($_SESSION);
                echo $user_data['Username'];
                //  die("vjhghj");
                ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="profile.php">Edit profile</a></li>
                <li><a class="dropdown-item" href="logout.php">logout</a></li>
              </ul>
            </li>
            <a href="#"><img src="./photo/<?php echo $user_data['image']; ?>" alt="not found" width="50px" style="border-radius:50%"></a>
          </form>
        </div>
      </div>
  </nav>

  <!-- ******************************************************************************************************************* -->

  <div class="row">
    <div class="col">
      <div class="sidenav flex-column p-1 bg-primary" style="width: 160px;">
        <ul class="nav nav-pills flex-column mb-auto my-5 py-5">
          <li class="nav-item">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
              Compose mail
            </button>
          </li>

          <!--**********************************************************  -->
          <li>
            <a class="nav-link link-dark" href="dashboard.php" onclick="return inboxfun()">
              <i class="fa-solid fa-inbox"></i>&nbsp;Inbox
            </a>
          </li>
          <li>
            <a class="nav-link link-dark" href="dashboarddraft.php">
              <i class="fa-solid fa-square-envelope"></i>&nbsp;draft
            </a>
          </li>
          <li>
            <a class="nav-link link-dark" href="dashboardsent.php">
              <i class="fa-solid fa-paper-plane"></i>&nbsp;Sent
            </a>
          </li>
          <li>
            <a class="nav-link link-dark" href="dashboardtrash.php">
              <i class="fa-solid fa-trash-can"></i> &nbsp;Trash
            </a>
          </li>
        </ul>
      </div>


    </div>
    <div class="col-12">
      <div class="main-1">
        <div class="d-flex gap-2">
          &nbsp; &nbsp;<input type="checkbox" id="" name="" value="">
          <button type="button" class="btn btn-secondary" id="read">Read</button>
          <button type="button" class="btn btn-secondary" id="unread">unread</button>
          <button type="button" class="btn btn-secondary" id="trash">Delete</button>
        </div>
        <br>
        <!-- ******************************************************************************************* -->
        <fieldset id="fsbox">
          <legend>
            Inbox
          </legend>
          <!-- <div class="border border-dark "> -->

          <table class="table" id="myTable">
            <?php
            echo '<tr><th>SenderAddress</th><th>subject</th><th>Date</th></tr>';
            ?>
          </table>

          <!-- </div> -->
        </fieldset>

        <div class="float-center">
          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="1">Previous</a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">Next</a>
              </li>
            </ul>
          </nav>
        </div>


      </div>
    </div>
  </div>

  <!-- Modal -->
  <form action="compose.php" method="post" enctype="multipart/form-data">
    <div class="modal fade text-primary" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Compose Mail</h5>
            <?php echo @$err; ?>
            <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <input type="hidden" name="usersender" value="<?php echo $user_data['Email']; ?>">
          </div>
          <div class="modal-body">
            <div class="col">
              <input class="form-control form-control-lg" type="email" name="TO" id="TO" placeholder="TO" required />
            </div>

            <div class="col">
              <input class="form-control form-control-lg" type="email" name="CC" id="CC" placeholder="CC" required />
            </div>

            <div class="col">
              <input class="form-control form-control-lg" type="email" name="BCC" id="BCC" placeholder="BCC" required />
            </div>

            <div class="col">
              <input class="form-control form-control-lg" type="text" name="Subject" id="Subject" placeholder="SUBJECT" required />
            </div>

            <div class="col">
              <textarea class="form-control form-control-lg" name="message" id="message" cols="10" rows="7" placeholder="Message" required></textarea>
            </div>

          </div>
          <div class="modal-footer d-flex">

            <label for="imageUpload" class="text-success"><i class='fal fa-plus'></i>Attachment</label>
            <input id="imageUpload" type="file" name="profilephoto" placeholder="Attachment" capture />
            <input class="btn btn-primary" type="submit" name="send" onclick="return validation()" value="Send" />
            <input type="reset" name="close" class="btn btn-danger" data-bs-dismiss="modal" value="Close" />
            <!-- <button type=" reset" name="close" class="btn btn-danger" data-bs-dismiss="modal">Close</button> -->

          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- *****************************************paggination************************************************************** -->


  <!-- if (doWork() === true) {
  console.log('✅ function returns true');
   } -->


  <!-- ******************************************************************************************************************* -->
  <script>
    function inboxfun() {
      var x = document.getElementById("read");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }

      var y = document.getElementById("unread");
      if (y.style.display === "none") {
        y.style.display = "block";
      } else {
        y.style.display = "none";
      }
      var z = document.getElementById("trash");
      if (z.style.display === "none") {
        z.style.display = "none";
      } else {
        z.style.display = "none";
      }

    }
  </script>


  <!-- *************************************************************************************************** -->

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


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>