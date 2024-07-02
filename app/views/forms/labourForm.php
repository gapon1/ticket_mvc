<hr class="hr"/>
<div id="misc_container-labour" style="text-align: left">
    <h5 style="text-align: left">Labour</h5>
    <form id="ticket-form-dynamic-labour" method="post">
        <div id="sub-forms-container_main-labour"></div>
        <?php if (!empty($labours)): ?>
            <?php foreach ($labours as $index => $mod): ?>
                <input name="items_labour[<?= $index; ?>][id]" type="hidden" value="<?= $mod->id ?>">
                <div class="form-row sub-form-labour">
                    <div class="form-group col-md-2">
                        <label>Staff</label>
                        <select name="items_labour[<?= $index; ?>][staff_id]" class="form-control">
                            <?php foreach ($staffs as $staff): ?>
                                <option <?php if ($staff->id == $mod->staff_id) {
                                    echo 'selected';
                                } ?> value="<?= $staff->id ?>"><?= $staff->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Position</label>
                        <select name="items_labour[<?= $index; ?>][position_id]" class="form-control">
                            <?php foreach ($positions as $position): ?>
                                <option <?php if ($position->id == $mod->position_id) {
                                    echo 'selected';
                                } ?> value="<?= $position->id ?>"><?= $position->title ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Uom</label>
                        <select name="items_labour[<?= $index; ?>][uom]" class="form-control">
                            <?php foreach ($uoms as $uom): ?>
                                <option <?php if ($mod->uom == $uom) {
                                    echo 'selected';
                                } ?> value="<?= $uom ?>"><?= $uom ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <label>Reg Rate</label>
                        <input name="items_labour[<?= $index; ?>][regular_rate]"
                               class="reg-rate-labour form-control no_active" value="<?= $mod->regular_rate ?>">
                    </div>
                    <div class="form-group col-md-1">
                        <label>Reg Hours</label>
                        <input name="items_labour[<?= $index; ?>][reg_hours]" type="number"
                               class="reg-hours-labour form-control" value="<?= $mod->reg_hours ?>">
                    </div>
                    <div class="form-group col-md-2">
                        <label>Overtime Rate</label>
                        <input name="items_labour[<?= $index; ?>][overtime_rate]"
                               class="overtime-rate-labour form-control  no_active" value="<?= $mod->overtime_rate ?>">
                    </div>
                    <div class="form-group col-md-1">
                        <label>Overtime</label>
                        <input name="items_labour[<?= $index; ?>][overtime]" type="number"
                               class="overtime-labour form-control" value="<?= $mod->overtime ?>">
                    </div>
                    <input name="items_labour[<?= $index; ?>][total]" type="hidden"
                           class="sub-total-labour form-control" value="<?= $mod->total ?>">
                    <div class="form-group col-md-2 text-center" style="margin-top: 45px">
                        <button type="button" id="<?= $mod->id ?>" class="btn btn-danger remove-sub-form-labour">X
                        </button>
                        <button type="button" class="btn btn-primary add-sub-form-labour">+</button>
                    </div>
                </div>
            <?php endforeach; ?>
            <div class="container">
                <div class="form-group row">
                    <label for="inputExample" class="col-sm-8 col-form-label"><b>Sub-Total</b></label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" disabled id="grand-sub-total" value="0">
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="form-group col-md-12 text-right" style="margin-top: 30px">
                <button type="button" class="btn btn-primary add-sub-form-labour">+</button>
            </div>
        <?php endif; ?>
        <button type="submit" id="save-dynamic-form-misc-labour" style="display: none">Save</button>
    </form>
</div>
