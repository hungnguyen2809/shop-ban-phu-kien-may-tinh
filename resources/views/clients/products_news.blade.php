<?php
  use App\Models\ProductModel;
  use App\Models\CategoryModel;

  $products = ProductModel::orderBy('price', 'desc')->get();
  $rams = getProductForCategory(1, $products);
  $ssds = getProductForCategory(2, $products);
  $hhds = getProductForCategory(5, $products);
  $usbs = getProductForCategory(10, $products);
  $sdcards = getProductForCategory(9, $products);

  $results = $rams + $ssds + $hhds + $usbs + $sdcards;

  function getProductForCategory($idCategory, $products){
    $count = 0;
    $idFinds = CategoryModel::where('id_parent', '=', $idCategory)->select('id')->get();
    $productFinds = [];
    foreach($products as $product){
      foreach($idFinds as $idfind){
        if($product->id_category == $idfind->id){
          array_push($productFinds, $product);
          $count += 1;
          if ($count == 2) {
            break;
          }
        }
      }
    }
    return $productFinds;
  }

?>

<h3 class="tittle-w3l">
  Product News Hot
  <span class="heading-style">
    <i></i>
    <i></i>
    <i></i>
  </span>
</h3>
<!-- //tittle heading -->
<div class="content-bottom-in">
  <ul id="flexiselDemo1">
    @foreach ($results as $item)
    <li>
      <div class="w3l-specilamk">
        <div class="speioffer-agile">
            <a href="{{route('detailsProduct', $item->id)}}">
            <img style="width: 150px; height: 150px;" src="{{asset('storage/'.$item->images)}}" alt="product-alt">
          </a>
        </div>
        <div class="product-name-w3l">
          <h4>
          <a href="{{route('detailsProduct', $item->id)}}">{{ $item->name }}</a>
          </h4>
          <div class="w3l-pricehkj">
            <h6>{{ number_format($item->price) }} VND</h6>
          </div>
          <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
            <form action="#" method="post">
              <fieldset>
                <input type="hidden" name="cmd" value="_cart" />
                <input type="hidden" name="add" value="1" />
                <input type="hidden" name="business" value=" " />
                <input type="hidden" name="item_name" value="Aashirvaad, 5g" />
                <input type="hidden" name="amount" value="220.00" />
                <input type="hidden" name="discount_amount" value="1.00" />
                <input type="hidden" name="currency_code" value="USD" />
                <input type="hidden" name="return" value=" " />
                <input type="hidden" name="cancel_return" value=" " />
                <input type="submit" name="submit" value="Add to cart" class="button" />
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </li>
    @endforeach
  </ul>
</div>