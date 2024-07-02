<form method="post" id="ticket-form-dynamic-sub">
    <div class="sub-form">
        <div class="form-row">
            <input name="ticket_id" id="misc_ticket_id" type="hidden" value="<?= $id ?>">
            <div class="form-group col-md-2">
                <label>Description</label>
                <input name="description" class="form-control" required>
                <div id="description-group"></div>
            </div>
            <div class="form-group col-md-2">
                <label>Cost</label>
                <input name="cost" type="number" class="form-control" required>
                <div id="cost-group"></div>
            </div>
            <div class="form-group col-md-2">
                <label>Price</label>
                <input name="price" type="number" class="miscellaneous-price form-control" required>
                <div id="price-group"></div>
            </div>
            <div class="form-group col-md-2">
                <label>Quantity</label>
                <input name="quantity" type="number" class="miscellaneous-quantity form-control" required>
                <div id="quantity-group-misc"></div>
            </div>
            <div class="form-group col-md-2">
                <label>Total</label>
                <input class="miscellaneous-total form-control no_active">
                <input name="total" type="hidden" class="miscellaneous-total">
            </div>
            <div class="form-group col-md-2 text-center" style="margin-top: 45px">
                <button id="empty" class="btn btn-danger remove-sub-form">X</button>
                <button id="save_dynamic" type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
</form>
