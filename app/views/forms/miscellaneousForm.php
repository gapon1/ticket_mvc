<hr class="hr"/>
<div id="misc_container" style="text-align: left">
    <h4>Miscellaneous</h4>
    <form id="ticket-form-dynamic" method="post">
    <div id="sub-forms-container"></div>
    <input name="ticket_id" id="misc_ticket_id" type="hidden" value="<?= $id ?>">
    <?php if (!empty($miscellaneous)): ?>
        <?php foreach ($miscellaneous as $index => $mod): ?>
            <input name="id" type="hidden" value="<?= $mod->id ?>">
            <div class="form-row sub-form">
                <div class="form-group col-md-2">
                    <label>Description</label>
                    <input name="description" class="form-control" value="<?= $mod->description ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Cost</label>
                    <input name="cost" type="number" class="form-control" value="<?= $mod->cost ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Price</label>
                    <input name="price" type="number" class="miscellaneous-price form-control" value="<?= $mod->price ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Quantity</label>
                    <input name="quantity" type="number" class="miscellaneous-quantity form-control" value="<?= $mod->quantity ?>" required>
                </div>
                <div class="form-group col-md-2">
                    <label>Total</label>
                    <input name="total" class="miscellaneous-total form-control no_active" value="<?= $mod->total ?>">
                </div>
                <div class="form-group col-md-2 text-center" style="margin-top: 45px">
                    <button type="button" id="<?= $mod->id ?>" class="btn btn-danger remove-sub-form">X</button>
                    <button type="button" class="btn btn-primary add-sub-form">+</button>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="container">
            <div class="form-group row">
                <label for="inputExample" class="col-sm-8 col-form-label"><b>Sub-Total</b></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control miscellaneous-sub_total" disabled>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="form-group col-md-12 text-right" style="margin-top: 45px">
            <button type="button" class="btn btn-primary add-sub-form">+</button>
        </div>
    <?php endif; ?>
        <button type="submit" id="save-dynamic-form-misc" style="display: none">Save</button>
    </form>
</div>