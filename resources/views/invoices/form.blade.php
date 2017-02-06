<div class="row">
    <div class="col-sm-4">
        <div class="form-group">
            <label>Invoice No</label>
            <input type="text" class="form-control" v-model="form.invoice">
            <p v-if="errors.invoice_no" class="error">@{{ errors.invoice_no[0] }}</p>
        </div>
        <div class="form-group">
            <label>Client</label>
            <input type="text" class="form-control" v-model="form.client">
            <p v-if="errors.client" class="error">@{{ errors.client[0] }}</p>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Client Address</label>
            <textarea class="form-control" v-model="form.address"></textarea>
            <p v-if="errors.client_address" class="error">@{{ errors.client_address[0] }}</p>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" v-model="form.title"></textarea>
            <p v-if="errors.title" class="error">@{{ errors.title[0] }}</p>
        </div>
        <div class="row">
            <div class="form-group col-sm-6">
                <label>Invoice Date</label>
                <input type="date" class="form-control" v-model="form.invoice_date"></textarea>
                <p v-if="errors.invoice_date" class="error">@{{ errors.invoice_date[0] }}</p>
            </div>
            <div class="form-group col-sm-6">
                <label>Due Date</label>
                <input type="date" class="form-control" v-model="form.due_date">
                <p v-if="errors.due_date" class="error">@{{ errors.due_date[0] }}</p>
            </div>
        </div>

    </div>
<hr>

</div>
<div v-if="errors.items_empty">
<p class="alert alert-danger">@{{ errors.items_empty[0] }}</p>
<hr>
</div>
<table class="table-bordered table-form">
<thead>
<tr>
    <th>Item Name</th>
    <th>Price</th>
    <th>Quantity</th>
    <th>Total</th>
</tr>
</thead>
<tbody>
<tr v-for="item in form.items">
    <td class="table-name" : class="{'table-error':errors['items.'+ $index + '.name']}">
        <textarea class="table_control" v-model="item.name"></textarea>
    </td>
    <td class="table-price" : class="{'table-error':errors['items.'+ $index + '.price']}">
        <input type="text" class= "table_control" v-model="item.price">
    </td>
    <td class="table-quantity" : class="{'table-error':errors['items.'+ $index + '.quantity']}" >
        <input type="text" class= "table_control" v-model="item.quantity">
    </td>
    <td class="table_total"><span class="table_text">@{{ item.quantity * item.price }}</span> </td>

</tr>
</tbody>
<tfoot>
<tr>
    <td class="table-empty" colspan="2"></td>
    <td class="table-label">Sub Total</td>
    <td class="table_amount">@{{ sub_total }}</td>
</tr>
<tr>
    <td class="table-empty" colspan="2"></td>
    <td class="table-label">Discount</td>
    <td class="table_discount" :class="{'table-error':errors.discount}">
        <input type="text" class= "table_discount_input" v-model="item.discount">
    </td>
</tr>
<tr>
    <td class="table-empty" colspan="2"></td>
    <td class="table-label">Grand Total</td>
    <td class="table_amount">@{{ grand_total }}</td>
</tr>
</tfoot>
</table>