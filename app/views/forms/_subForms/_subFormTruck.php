<form id="ticket-form-dynamic-sub-truck" method="post">
    <div class="sub-form-truck">
        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Label</label>
                <select name="label" class="uom-truck form-control">
                    <?php foreach ($trucks as $truck): ?>
                        <option value="<?= $truck->id ?>"><?= $truck->label ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div id="quantity-group" class="form-group col-md-2">
                <label>Quantity</label>
                <input name="quantity" type="number" class="quantity-truck form-control">
            </div>
            <div class="form-group col-md-2">
                <label>Uom</label>
                <select name="uom" class="uom-truck form-control">
                    <?php foreach ($uoms as $uom): ?>
                        <option value="<?= $uom ?>"><?= $uom ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label>Reg rate</label>
                <input name="rate" class="reg-rate-truck form-control no_active" value="99">
            </div>
            <div class="form-group col-md-2">
                <label>Total</label>
                <input name="total" class="total-truck form-control no_active">
            </div>
            <div class="form-group col-md-2" style="margin-top: 45px">
                <button id="empty" class="btn btn-danger remove-sub-form-truck">X</button>
                <button type="submit" id="save_dynamic-truck" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</form>
