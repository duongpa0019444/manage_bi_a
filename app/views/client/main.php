<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from templates.seekviral.com/trimba3/forms/LoginSignUp_video/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Mar 2025 13:29:18 GMT -->

<head>

    <!-- <link rel="stylesheet" href="assets/css/colorvariants/default.css" id="defaultscheme"> -->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? "" ?></title>

    <!-- Trong admin/main.php -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.8/iconify-icon.min.js"></script>

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <!-- Bootstrap-5 -->
    <link rel="stylesheet" href="inc/css/bootstrap.min.css">

    <!-- custom-styles -->
    <link rel="stylesheet" href="inc/css/style.css">
    <link rel="stylesheet" href="inc/css/responsive.css">
    <link rel="stylesheet" href="inc/css/animation.css">


</head>

<body>
    <?php
    require_once __DIR__ . $view . ".php";
    ?>

    <script>
        function resetForm(formID) {
            //lấy form chứa nút button
            const formID = button.form;
            //Reset form
            formID.reset();
        }
    </script>

</body>
<!-- Bootstrap-5 -->
<script src="inc/js/bootstrap.min.js"></script>

<!-- Jquery -->
<script src="inc/js/jquery-3.6.1.min.js"></script>

<!-- My js -->
<script src="inc/js/custom.js"></script>

</html>