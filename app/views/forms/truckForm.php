<hr class="hr"/>
<div id="misc_container-truck">
    <h4>Truck</h4>
    <div id="sub-forms-container_main-truck"></div>
    <?php if (!empty($ticketTrucks)): ?>
        <?php foreach ($ticketTrucks as $index => $mod): ?>
            <div class="form-row sub-form-truck">
                <div class="form-group col-md-2">
                    <label>Label</label>
                    <select name="job_id" class="form-control">
                        <?php foreach ($trucks as $truck): ?>
                            <option <?php if ($truck->id == $mod->id) {
                                echo 'selected';
                            } ?> value="<?= $truck->id ?>"><?= $truck->label ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Quantity</label>
                    <input type="number" class="quantity-truck form-control" value="<?= $mod->quantity ?>">
                </div>
                <div class="form-group col-md-2">
                    <label>Uom</label>
                    <select name="uom" class="uom-truck form-control">
                        <?php foreach ($uoms as $uom): ?>
                            <option <?php if ($mod->uom == $uom) {
                                echo 'selected';
                            } ?> value="<?= $uom ?>"><?= $uom ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label>Reg Rate</label>
                    <input type="number" class="reg-rate-truck form-control" value="<?= $mod->rate ?>">
                </div>
                <div class="form-group col-md-2">
                    <label>Total</label>
                    <input class="total-truck form-control" disabled value="<?= $mod->total ?>">
                </div>
                <div class="form-group col-md-2 text-center" style="margin-top: 45px">
                    <button type="button" id="<?= $mod->id ?>" class="btn btn-danger remove-sub-form-truck">X
                    </button>
                    <button type="button" class="btn btn-primary add-sub-form-truck">+</button>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="container">
            <div class="form-group row">
                <label for="inputExample" class="col-sm-8 col-form-label"><b>Sub-Total</b></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" disabled id="trucks-sub_total" value="0">
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="form-group col-md-12 text-right" style="margin-top: 45px">
            <button type="button" class="btn btn-primary add-sub-form-truck">+</button>
        </div>
    <?php endif; ?>
</div>