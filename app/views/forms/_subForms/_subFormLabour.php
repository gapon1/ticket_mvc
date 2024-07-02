<form id="ticket-form-dynamic-sub-labour" method="post">
    <div class="sub-form-labour">
        <div class="form-row">
            <input type="hidden" name="ticket_id" value="<?= $id ?>">
            <div class="form-group col-md-2">
                <label>Staff</label>
                <select name="staff_id" class="form-control">
                    <?php foreach ($staffs as $staff): ?>
                        <option value="<?= $staff->id ?>"><?= $staff->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label>Position</label>
                <select name="position_id" class="form-control">
                    <?php foreach ($positions as $position): ?>
                        <option value="<?= $position->id ?>"><?= $position->title ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-1">
                <label>Uom</label>
                <select name="uom" class="form-control">
                    <?php foreach ($uoms as $uom): ?>
                        <option value="<?= $uom ?>"><?= $uom ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-1">
                <label>Reg Rate</label>
                <input type="number" name="regular_rate" class="reg-rate-labour form-control no_active" value="22">
            </div>
            <div id="reg_hours-group" class="form-group col-md-1">
                <label>Reg Hours</label>
                <input type="number" name="reg_hours" class="reg-hours-labour form-control">
            </div>
            <div class="form-group col-md-2">
                <label>Overtime Rate</label>
                <input type="number" name="overtime_rate" class="overtime-rate-labour form-control no_active"
                       value="33">
            </div>
            <div class="form-group col-md-1">
                <label>Overtime</label>
                <input type="number" name="overtime" class="overtime-labour form-control" value="33">
            </div>
            <input type="hidden" name="total" class="sub-total-labour form-control">
            <div class="form-group col-md-2" style="margin-top: 45px; text-align: center">
                <button id="empty" class="btn btn-danger remove-sub-form-labour">X</button>
                <button id="save_dynamic-labour" type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</form>