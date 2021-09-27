<script>
    function orderRedirection(val) {
        alert(val);
    }

    $(document).ready(function () {


    });
</script>

<form method="get" class="js-form-order-filtering">

    <div class="manage-toobar d-flex justify-content-between align-items-center">

        <div id="cartsnav">

            <a href="{{route('admin.order.index')}}"
               class="btn btn-link btn-sm px-0 <?php if (!isset($abandoned)): ?>font-weight-bold text-dark active<?php else: ?>text-muted<?php endif; ?>"><?php _e("Completed orders"); ?></a>
            <a href="{{route('admin.order.abandoned')}}"
               class="btn btn-link btn-sm <?php if (isset($abandoned)): ?>font-weight-bold text-dark active<?php else: ?>text-muted<?php endif; ?>"><?php _e("Abandoned carts"); ?></a>
        </div>

        <?php if ($orders->count() > 0) { ?>
        <div
            class="js-table-sorting text-end my-1 d-flex justify-content-center justify-content-sm-end align-items-center">
            <small><?php _e("Sort By"); ?>: &nbsp;</small>
            <div class="d-inline-block mx-1">
                <select class="form-control" onchange="location = this.value;">
                    <option <?php if($orderBy == 'created_at' && $orderDirection == 'asc'): ?>selected="selected"
                            <?php endif;?> value="{{route('admin.order.index')}}?orderBy=created_at&orderDirection=asc"><?php _e("Date"); ?> <?php _e("[ASC]"); ?></option>
                    <option <?php if($orderBy == 'created_at' && $orderDirection == 'desc'): ?>selected="selected"
                            <?php endif;?> value="{{route('admin.order.index')}}?orderBy=created_at&orderDirection=desc"><?php _e("Date"); ?> <?php _e("[DESC]"); ?></option>
                    <option <?php if($orderBy == 'order_status' && $orderDirection == 'asc'): ?>selected="selected"
                            <?php endif;?> value="{{route('admin.order.index')}}?orderBy=order_status&orderDirection=asc"><?php _e("Status"); ?> <?php _e("[ASC]"); ?></option>
                    <option <?php if($orderBy == 'order_status' && $orderDirection == 'desc'): ?>selected="selected"
                            <?php endif;?> value="{{route('admin.order.index')}}?orderBy=order_status&orderDirection=desc"><?php _e("Status"); ?> <?php _e("[DESC]"); ?></option>
                    <option <?php if($orderBy == 'amount' && $orderDirection == 'asc'): ?>selected="selected"
                            <?php endif;?> value="{{route('admin.order.index')}}?orderBy=amount&orderDirection=asc"><?php _e("Amount"); ?> <?php _e("[ASC]"); ?></option>
                    <option <?php if($orderBy == 'amount' && $orderDirection == 'desc'): ?>selected="selected"
                            <?php endif;?> value="{{route('admin.order.index')}}?orderBy=amount&orderDirection=desc"><?php _e("Amount"); ?> <?php _e("[DESC]"); ?></option>
                </select>
            </div>
        </div>
        <?php } ?>

    </div>

    <?php if ($orders->count() > 0 || $filteringResults) { ?>

    <div class="row" style="margin-top:25px;">

        <div class="col-md-4">
            <div class="form-group">
                <div class="input-group mb-0">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><?php _e("Price from"); ?></span>
                    </div>
                    <input type="number" class="form-control" value="{{$minPrice}}" name="minPrice" aria-label="">
                    <div class="input-group-append">
                        <span class="input-group-text"><?php _e("To"); ?></span>
                    </div>
                    <input type="number" class="form-control" value="{{$maxPrice}}" name="maxPrice" aria-label="">
                    <div class="input-group-append">
                        <span class="input-group-text">$</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="d-inline-block mx-1">
                <button type="submit" name="filteringResults" value="true" class="btn btn-success btn-block">
                <i class="mdi mdi-filter"></i> <?php _e("Filter"); ?></button>
            </div>
            <div class="d-inline-block mx-1">
                <a href="{{route('admin.order.index')}}" class="btn btn-success btn-block">
                    <?php _e("Clear"); ?>
                </a>
            </div>
        </div>
    </div>

    <?php } ?>

</form>
