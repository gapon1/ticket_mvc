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
    <script>
        tinymce.init({
            selector: '#mytextarea',
        });
    </script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
</nav>
<div class="container">
    <div class="row">

        <h2 class="title">Project</h2>

        <div class="container">
            <div class="row">
                <div class="col">
                    <label class="d-inline-block" for="customer_id">Customer ID</label>
                    <select name="customer_id" class="form-control">
                        <option>Default select</option>
                        <option>Action</option>
                        <option>Another action</option>
                    </select>
                </div>
                <div class="col">
                    <label class="d-inline-block" for="order_by">Order BY</label>
                    <input type="text" class="form-control" id="order_by">
                </div>

                <div class="w-100"></div>

                <div class="col">
                    <label class="d-inline-block" for="job_id">Job ID</label>
                    <select name="job_id" class="form-control">
                        <option>job_id</option>
                        <option>Action</option>
                        <option>Another action</option>
                    </select>
                </div>
                <div class="col">
                    <label class="d-inline-block" for="dateInput">Date</label>
                    <input type="date" class="form-control" id="dateInput">
                </div>

                <div class="w-100"></div>

                <div class="col">
                    <label class="d-inline-block" for="status_id">Status ID</label>
                    <select name="job_id" class="form-control">
                        <option>job_id</option>
                        <option>Action</option>
                        <option>Another action</option>
                    </select>
                </div>
                <div class="col">
                    <label for="areaInput">Area/Field</label>
                    <input type="text" class="form-control" id="areaInput">
                </div>

                <div class="w-100"></div>

                <div class="col">
                    <!--                //Location ID-->
                    <label class="d-inline-block" for="location_id">Location ID</label>
                    <select name="job_id" class="form-control">
                        <option>job_id</option>
                        <option>Action</option>
                        <option>Another action</option>
                    </select>
                </div>
                <div class="col"></div>

            </div>
        </div>

    </div>


    <hr class="hr"/>
    <h6>Description of Work</h6>
    <textarea id="mytextarea">Hello, World!</textarea>


    <hr class="hr"/>
    <h4>Labour</h4>
    <hr class="hr"/>
    <h4>Truck</h4>
    <hr class="hr"/>
    <h4>Miscellaneous</h4>




</div>


<div class="jumbotron text-center" style="margin-bottom:0">
    <p>Footer</p>
</div>
</body>
</html>
