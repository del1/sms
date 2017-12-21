<table id="product_list" class="table table-hover dataTable table-striped w-full table-bordered table-responsive" >
<thead>
  <tr>
    <th>Style Number/Name</th>
    <th>Likes</th>
    <th>Collection</th>
    <th>Brand</th>
    <th>Season</th>
  </tr>
</thead>
<tbody>
    <?php if(!empty($fav)){
    foreach ($product_list as $product) { ?>
        <tr>
            <td><?php echo $product->product_name; ?></td>
            <td><?php echo $product_likes[$product->product_id] ; ?></td>
            <td><?php echo $product->collection_name; ?></td>
            <td><?php echo $product->brand_name; ?> </td>
            <td><?php echo $product->season; ?> </td>
        </tr>
    <?php } } ?>
</tbody>
</table>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        var table=$("#product_list").DataTable( {
            "order": [[ 0, "asc" ]],
            stateSave: true,
            'info': false,
            responsive: true,
        })
    });
</script>