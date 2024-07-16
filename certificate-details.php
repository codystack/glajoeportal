
<?php
session_start();

require_once "./admin/config/db.php";

if (isset($_GET['close'])) {
  session_destroy();
  unset($_SESSION['certNum']);
  header("location: /");
}

?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="ThankGod Okoro">
    <title>Glajoe Services :: Certificate Portal&trade;</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="http://glajoeservices.com.ng/wp-content/uploads/2017/03/favicon.png"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
  </head>
  <body>
    <div class="s130">
        <div class="row justify-content-center pt-30" style="background-color: white; border-radius: 20px;">
            <div class="col-8 col-lg-6" style="margin: 40px;">
                <div class="card">
                    <div class="card-body mt-3">
                        <div class="text-center mb-4">
                            <div class="mb-3">
                                <img alt="Certificate" src="./admin/img/svg/certificate.png" class="img-responsive mt-2" width="108" height="108">
                            </div>
                            <h4 class="mb-n3">Certificate/Report No.</h4>
                            <br /><img src="./admin/img/barcode.png">&nbsp; <?php echo $_SESSION['certNum']; ?>
                        </div>
                        <div class="col-6 mx-auto">
                        <hr />
                        <div class="card-body h-100">

                            <div class="row mt-3 mb-3 text-center">
                                <div class="col-md-6 col-lg-6">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1 mb-3">
                                            Title:<br />
                                            <strong>
                                                <?php echo $_SESSION['title']; ?>
                                            </strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6 text-right">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1 text-end">
                                            Client's Name:<br />
                                            <strong>
                                                <?php echo $_SESSION['client']; ?>
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr />
                            
                            <div class="row text-center mx-auto mt-3" style="width: 500px;">
                                <div class="col-md-12 col-lg-12">
                                    <embed id="myImg" class="inner-img mb-3" src="<?php echo './admin/'.$_SESSION['image']; ?>" style="width:100%;height:300px;"/>
                                    <a href="<?php echo './admin/'.$_SESSION['image']; ?>" target="_blank" class="btn"><i class="fas fa-download"></i> View Certificate</a>
                                </div>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/extention/choices.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php
        if (isset($_SESSION['message']))
        {
            ?>
            <script>
                swal({
                    title: "<?php echo $_SESSION['message_title']; ?>",
                    text: "<?php echo $_SESSION['message']; ?>",
                    icon: "error",
                    buttons: false,
                    timer: 3000
                });
            </script>
            <?php
            unset($_SESSION['message']);
        }
    ?>
  </body>
</html>