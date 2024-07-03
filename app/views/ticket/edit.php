<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>EDIT Ticket</title>
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="/js/tinymce/tinymce.min.js"></script>
    <script src="/js/ticket.js"></script>
    <script src="/js/miscellaneous.js"></script>
    <script src="/js/labour.js"></script>
    <script src="/js/truck.js"></script>
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

    <?php include __DIR__ . "/../../views/forms/labourForm.php"; ?>

    <?php include __DIR__ . "/../../views/forms/truckForm.php"; ?>

    <?php include __DIR__ . "/../../views/forms/miscellaneousForm.php"; ?>
    <div id="main-save-button"></div>

</div>

<!-- The Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Success</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Ticket updated.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="jumbotron text-center" style="margin-bottom:0">
    <p>Footer</p>
</div>
</body>
</html>
