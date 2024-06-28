<?php
/**
 * @var $ticket
 * @var $customers
 * @var $jobs
 * @var $statuses
 * @var $locations
 */
?>
<div class="container">
    <div class="row">
        <div class="col">
            <label class="d-inline-block" for="customer_id">Customer ID</label>
            <select name="customer_id" class="form-control">
                <?php foreach ($customers as $customer): ?>
                    <option <?php if ($ticket['customer_id'] == $customer->id) {
                        echo 'selected';
                    } ?> value="<?= $customer->id ?>"><?= $customer->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col">
            <label class="d-inline-block" for="order_by">Order BY</label>
            <input value="<?= $ticket['ordered_by'] ?>" type="text" class="form-control" id="order_by">
        </div>

        <div class="w-100"></div>

        <div class="col">
            <label class="d-inline-block" for="job_id">Job ID</label>
            <select name="job_id" class="form-control">
                <?php foreach ($jobs as $job): ?>
                    <option <?php if ($ticket['job_id'] == $job->id) {
                        echo 'selected';
                    } ?> value="<?= $job->id ?>"><?= $job->name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col">
            <label class="d-inline-block" for="dateInput">Date</label>
            <input value="<?= $ticket['date'] ?>" type="date" class="form-control" id="dateInput">
        </div>

        <div class="w-100"></div>

        <div class="col">
            <label class="d-inline-block" for="status_id">Status ID</label>
            <select name="job_id" class="form-control">
                <?php foreach ($statuses as $status): ?>
                    <option <?php if ($ticket['status'] == $status) {
                        echo 'selected';
                    } ?> value="<?= $status ?>"><?= $status ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col">
            <label for="areaInput">Area/Field</label>
            <input value="<?= $ticket['area_field'] ?>" type="text" class="form-control" id="areaInput">
        </div>

        <div class="w-100"></div>

        <div class="col">
            <label class="d-inline-block" for="location_id">Location ID</label>
            <select name="job_id" class="form-control">
                <?php foreach ($locations as $location): ?>
                    <option <?php if ($ticket['location_id'] == $location->id) {
                        echo 'selected';
                    } ?> value="<?= $location->id ?>"><?= $location->location_lsd ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col"></div>

    </div>
</div>