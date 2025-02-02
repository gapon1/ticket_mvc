<form id="ticket-form-dynamic-sub-truck" method="post">
    <div class="sub-form-truck">
        <div class="form-row">
            <div class="form-group col-md-2">
                <label>Label</label>
                <input name="label" type="text" class="form-control">
                <div id="label-group"></div>
            </div>
            <div class="form-group col-md-2">
                <label>Quantity</label>
                <input name="quantity" type="number" class="quantity-truck form-control">
                <div id="quantity-group"></div>
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
            <div class="form-group col-md-2" style="margin-top: 45px; text-align: center">
                <button id="empty" class="btn btn-danger remove-sub-form-truck">X</button>
                <button type="submit" id="save_dynamic-truck" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</form>
