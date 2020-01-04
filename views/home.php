<!-- Page Content -->
<div id="page-wrapper">
    <div class="container container-fluid">
         <?php if(!empty($array["warehouseList"])) : ?>
         <table style="text-align: left; margin-top: 20px; border: 1px grey solid; padding: 5px; border-radius: 5px">
             <thead>
                <tr>
                    <th style="width: 25%">Warehouse</th>
                    <th style="width: 25%">Title</th>
                    <th style="width: 25%">Capacity</th>
                    <th style="width: 25%">Stock</th>
                </tr>
             </thead>
            <tbody>
            <?php  foreach($array["warehouseList"]as $warehouseRow) : ?>
               <tr>
                   <td><?php echo $warehouseRow["name"]; ?></td>
                   <td><?php echo $warehouseRow["title"]; ?></td>
                   <td><?php echo $warehouseRow["capacity"]; ?></td>
               </tr>
                <tr>
                    <td colspan="3"></td>
                    <td style="margin-bottom: 10px">
                        <?php if(!empty($array["stockList"][$warehouseRow["id"]])) : ?>
                        <table style="margin-bottom: 20px;">
                            <thead>
                            <tr>
                                <th style="width: 33%">Product</th>
                                <th style="width: 33%">Quantity</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php  foreach($array["stockList"][$warehouseRow["id"]] as $stockRow) : ?>
                                <tr>
                                    <td style="width: 33%"><?php echo $stockRow["product"]; ?></td>
                                    <td style="width: 33%"><?php echo $stockRow["quantity"]; ?></td>
                                    <td style="width: 33%">
                                        <form action="/stockDelete" method="post">
                                            <input type="hidden" name="id" value="<?php echo $stockRow["id"]; ?>">
                                            <button type="submit">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                            No item
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
         </table>
        <?php endif; ?>
        <div style="margin-top: 20px; border: 1px grey solid; padding: 5px; border-radius: 5px">
            <h3>Add new warehouse</h3>
            <form action="/warehouse" method="post">
                <div style="margin-bottom: 5px;">
                    <input  type="text" name="name" placeholder="Name"/>
                </div>
                <div style="margin-bottom: 5px;">
                    <input  type="text" name="title" placeholder="Title"/>
                </div>
                <div style="margin-bottom: 5px;">
                    <input  type="number" name="capacity" placeholder="Capacity"/>
                </div>
                <button type="submit">Add Warehouse</button>
            </form>
        </div>
        <div style="margin-top: 20px; border: 1px grey solid; padding: 5px; border-radius: 5px">
            <h3>Add Stock</h3>
            <form action="/stock" method="post">
                <div style="margin-bottom: 5px;">
                    Warehouse:
                    <select  type="text" name="warehouse_id">
                        <?php  foreach($array["warehouseList"]as $warehouseRow) : ?>
                            <option value="<?php echo $warehouseRow["id"]; ?>"><?php echo $warehouseRow["name"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div style="margin-bottom: 5px;">
                    Product:
                    <select  type="text" name="product_id">
                        <?php  foreach($array["productList"]as $productListRow) : ?>
                            <option value="<?php echo $productListRow["id"]; ?>"><?php echo $productListRow["name"]; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div style="margin-bottom: 5px;">
                    <input  type="number" name="quantity" placeholder="Quantity"/>
                </div>
                <button type="submit">Add Stock</button>
            </form>
        </div>
    </div>
</div>
