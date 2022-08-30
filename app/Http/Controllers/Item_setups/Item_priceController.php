// <?php

// namespace App\Http\Controllers\item_setups;

// use App\Item_setups\Tbl_item_price;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use DB;
// class Item_priceController extends Controller
// {
    // //
    // public function item_price_registration(Request $request)
    // {
         
        // $payment_sub_category=$request['sub_category_id'];
        // $item_id=$request['item_id'];
        // $strtinYear=$request['startingFinancialYear'];
        // $endinYear=$request['endingFinancialYear'];
        // $facility_id=$request['facility_id'];
        // $price=$request['price'];
        // $check= Tbl_item_price::where('facility_id',$facility_id)
            // ->where('item_id',$item_id)
            // ->where('sub_category_id',$payment_sub_category)
            // ->where('startingFinancialYear',$strtinYear)
            // ->where('endingFinancialYear',$endinYear)
            // ->where('price',$price)
            // ->first();
        // if(count($check)==1)
        // {
            // return  "Item Already Assigned this Price for This Financial Year ".$strtinYear .' - '.$endinYear;
        // }
        // else{
            // Tbl_item_price::create($request->all());

            // return  "SuccessFul!!!..";
        // }

    // }

    // public function item_price_list()
    // {
        // return  DB::table('tbl_pay_cat_sub_categories')
            // ->join('tbl_item_prices','tbl_pay_cat_sub_categories.id','=','tbl_item_prices.sub_category_id')
            // ->join('tbl_items','tbl_item_prices.item_id','=','tbl_items.id')
            // ->select('tbl_pay_cat_sub_categories.sub_category_name','tbl_item_prices.*','tbl_items.item_name')
            // ->get();
    // }


    // public function item_price_delete($id)
    // {

        // return Tbl_item_price::destroy($id);

    // }

    // public function item_price_update(Request $request)
    // {
        // $id=$request['id'];
        // return Tbl_item_price::where('id',$id)->update($request->all());



    // }
// }
