// <?php

// namespace App\Http\Controllers\Item_setups;

// use App\Item_setups\Tbl_item;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use DB;
// class ItemsController extends Controller
// {
    // //
    // public function item_registration(Request $request)
    // {
        // $item_name=$request['item_name'];

        // $check= Tbl_item::where('item_name',$item_name)

            // ->first();
        // if(count($check)==1)
        // {
            // return  $item_name." "."Already Registered";
        // }
        // else{
            // Tbl_item::create($request->all());

            // return  "SuccessFul!!!..";
        // }
         
    // }

    // public function item_list()
    // {
        // return  DB::table('tbl_departments')
            // ->join('tbl_items','dept_id','=','tbl_departments.id')
            // ->get();
    // }


    // public function item_delete($id)
    // {

        // return Tbl_item::destroy($id);

    // }

    // public function item_update(Request $request)
    // {
        // $id=$request['id'];
        // return Tbl_item::where('id',$id)->update([
              // 'item_name'=>  $request['item_name'],
              // 'dept_id'=>  $request['dept_id'],
        // ]

        // );
    // }
// }
