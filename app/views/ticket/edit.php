<!DOCTYPE html>
<html>
<head>
    <title>Edit Ticket</title>

    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="/js/tinymce/tinymce.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
</nav>
<div class="container">
    <div class="row">
        <h2 class="title">Project</h2>
        <?php include __DIR__ . "/../../views/forms/generalForm.php"; ?>
    </div>

    <?php include __DIR__ . "/../../views/forms/textarea.php"; ?>

    <?php include __DIR__ . "/../../views/forms/labourForm.php"; ?>

    <?php include __DIR__ . "/../../views/forms/truckForm.php"; ?>

    <?php include __DIR__ . "/../../views/forms/miscellaneousForm.php"; ?>

</div>


<div class="jumbotron text-center" style="margin-bottom:0">
    <p>Footer</p>
</div>
</body>
</html>
