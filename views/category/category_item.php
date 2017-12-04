
 <li class="active row active-category">
     <a href="/category/<?=$categoryItem['id']?>" class="line id-category"><?=$categoryItem['name']?>:</a>
     <div class="down-show row">
         <form method="post" action="/category/<?=$categoryItem['id']?>">
         <div class="row category-1">
             <p class="row lead ch">Ціна:</p>
             <div class="row lead ch"><?=$valut?></div>
             <div class="row lead ch">
                 <div class="col-lg-2 col-xl-3 col-md-3 col-sm-2 col-xs-2 ">від: </div>
                 <b class="col-lg-8 col-xl-7 col-md-8 col-sm-8 col-xs-8">
                     <input type="text" class="ex2ValMin form-control" name="minPrice" value="<?=$minPrice;?>"></b>
             </div>
             <div class="row center-block">
                 <b class="col-lg-8 col-xl-8 col-md-8 col-sm-8 col-xs-8">
                     <input type="text" class="span2 ex2 row col-lg-10 col-xl-10 col-md-10 col-sm-10 col-xs-10 center-block" value="" data-slider-min="<?=$minPrice;?>" data-slider-max="<?=$maxPrice;?>" data-slider-step="1" data-slider-value="[<?=$minPrice;?>,<?=$maxPrice;?>]"/>
                 </b>
             </div>
             <div class="row lead ch">
                 <div class="col-lg-2 col-xl-3 col-md-3 col-sm-3 col-xs-2 ">до: </div>
                 <b class="col-lg-8 col-xl-7 col-md-7 col-sm-8 col-xs-8">
                     <input type="text" class="ex2ValMax form-control"  name="maxPrice" value="<?=$maxPrice;?>">
                 </b>
             </div>
         </div>
             <div class="category-1 row">
                 <p class="lead ch key">Виробник: <span class="symbol-html-bot"></span></p>
                 <div class="visible-in" style="display: none;">
                     <?php foreach ($manufacturer as $val):?>
                         <div class="checkbox custom-control-input">
                             <label>
                                 <input type="checkbox" name="manufacturer[]" value="<?=$val;?>"><?=$val;?>
                             </label>
                         </div>
                     <?php endforeach;?>
                 </div>
             </div>
         <?php foreach ($valList as $key=>$value):?>
         <div class="category-1 row">
             <p class="lead ch key"><?=$key;?>: <span class="symbol-html-bot"></span></p>
             <div class="visible-in" style="display: none;">
                 <?php foreach ($value as $val):?>
                 <div class="checkbox custom-control-input">
                     <label>
                         <input type="checkbox" name="propety[<?=$key?>][]" value="<?=$val;?>"><?=$val;?>
                     </label>
                 </div>
                 <?php endforeach;?>
             </div>
         </div>
         <?php endforeach;?>
         <div class="category-1 row ead ch key">
             <button type="submit" name="submit" class="btn btn-outline-primary">Сортувати</button>
         </div>
         </form>
     </div>
 </li>