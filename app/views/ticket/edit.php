<!DOCTYPE html>
<html>
<head>
    <title>Edit Ticket</title>

    <link rel="stylesheet" href="../../../public/css/main.css">
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
</head>
<body>

<div class="container">
    <div class="row">
        <h6>Project</h6>

        <div class="container">
            <div class="row">
                <div class="col">
                    <!--                // Customer Dropdown-->
                    <label class="d-inline-block" for="customer_id">Customer ID</label>
                    <select name="customer_id" class="form-control">
                        <option>Default select</option>
                        <option>Action</option>
                        <option>Another action</option>
                    </select>
                </div>
                <div class="col">
                    <label class="d-inline-block" for="order_by">Order BY</label>
                </div>

                <div class="w-100"></div>

                <div class="col">
                    <!--                // Job Dropdown-->
                    <label class="d-inline-block" for="job_id">Job ID</label>
                    <select name="job_id" class="form-control">
                        <option>job_id</option>
                        <option>Action</option>
                        <option>Another action</option>
                    </select>
                </div>
                <div class="col">
                    <label class="d-inline-block" for="date">Date</label>
                </div>

                <div class="w-100"></div>

                <div class="col">
                    <!--                //Status-->
                    <label class="d-inline-block" for="status_id">Status ID</label>
                    <select name="job_id" class="form-control">
                        <option>job_id</option>
                        <option>Action</option>
                        <option>Another action</option>
                    </select>
                </div>
                <div class="col">
                    <label class="d-inline-block" for="area">Area/Field</label>
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
</div>

</body>
</html>
