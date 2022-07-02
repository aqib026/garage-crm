<tr id="row_id_{{ $ids }} ">
    <td>
        <select name="dealer_id[]" id="dealer_id_1" class="form-control">
            <option value="" disabled>select Dealer</option>
            @foreach ($dealers as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </td>
    <td>
        <input type="text" name="product_name[]" class="form-control">
    </td>
    <td>
        <input type="number" name="qty[]" class="form-control">

    </td>
    <td>
        <input type="text" name="price[]" class="form-control">
    </td>
    <td><i class="fa fa-trash"></i></td>
</tr>
