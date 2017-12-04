
    <?php foreach ($productList as $item):?>
        <div class="row justify-content-start item-product">
            <div class="col-xl-3 col-md-4 col-lg-3">
                <div class="rate round"><?=$item['rate']?></div>
                <a href="<?="/item/".$item['id_category']."/".$item['id']?>">
                    <img src="<?=$item['img']?>" class="img-thumbnail" alt="">
                </a>
            </div>
            <div class="col-xl-9 col-lg-9 col-md-8">

                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th colspan="2">
                            <a href="<?="/item/".$item['id_category']."/".$item['id']?>" class="name"><?=$item['name']?></a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="2">
                            <?=$item['description']?>
                        </td>
                    </tr>
                    <tr>
                        <th>Ціна:</th>
                        <td> <div class="price"> <?=$item['price']?> <?=$valut;?></div> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endforeach;?>
