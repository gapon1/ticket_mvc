<form id="general_form" method="POST">
    <div class="container">
        <div class="row">
            <div class="col">
                <input name="id" value="<?= $ticket['id'] ?>" type="hidden">
                <label class="d-inline-block" for="customer_id">Customer ID</label>
                <select id="customer-dropdown" name="customer_id" class="form-control">
                    <?php foreach ($customers as $customer): ?>
                        <option <?php if ($ticket['customer_id'] == $customer->id) {
                            echo 'selected';
                        } ?> value="<?= $customer->id ?>"><?= $customer->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <label class="d-inline-block" for="ordered_by">Order BY</label>
                <input name="ordered_by" value="<?= $ticket['ordered_by'] ?>" type="number" class="form-control"
                       id="order_by" required>
            </div>

            <div class="w-100"></div>

            <div class="col">
                <label class="d-inline-block" for="job_id">Job ID</label>
                <select id="job-dropdown" name="job_id" class="form-control no_active">
                    <?php foreach ($jobs as $job): ?>
                        <option <?php if ($ticket['job_id'] == $job->id) {
                            echo 'selected';
                        } ?> value="<?= $job->id ?>"><?= $job->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <label class="d-inline-block" for="dateInput">Date</label>
                <input name="date" value="<?= $ticket['date'] ?>" type="date" class="form-control" id="dateInput" required>
            </div>

            <div class="w-100"></div>

            <div class="col">
                <label class="d-inline-block" for="status_id">Status ID</label>
                <select name="status_id" class="form-control">
                    <?php foreach ($statuses as $status): ?>
                        <option <?php if ($ticket['status'] == $status) {
                            echo 'selected';
                        } ?> value="<?= $status ?>"><?= $status ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
                <label for="areaInput">Area/Field</label>
                <input name="area_field" value="<?= $ticket['area_field'] ?>" type="text" class="form-control"
                       id="areaInput" required>
            </div>

            <div class="w-100"></div>

            <div class="col">
                <label class="d-inline-block" for="location_id">Location ID</label>
                <select id="location-dropdown" name="location_id" class="form-control no_active">
                    <?php foreach ($locations as $location): ?>
                        <option <?php if ($ticket['location_id'] == $location->id) {
                            echo 'selected';
                        } ?> value="<?= $location->id ?>"><?= $location->location_lsd ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col">
            </div>
            <hr class="hr"/>
            <div class="col-md-12">
                <hr class="hr"/>
                <label>Description of Work</label>
                <textarea name="description" id="description"><?= $ticket['description'] ?></textarea>
            </div>
            <div class="col-md-12 text-right">
                <button id="save-dynamic-form" type="submit" class="btn btn-secondary text-right">FINISH</button>
            </div>
        </div>
    </div>
</form>
<script>
    tinymce.init({
        selector: '#description',
    });
</script>