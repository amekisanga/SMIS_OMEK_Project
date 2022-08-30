// <?php

// namespace App\Http\Controllers\Item_setups;

// use App\Item_setups\Tbl_item_type_mapped;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\DB;

// class Item_type_mappController extends Controller
// {
    // //

    // // CRUD
    // public function item_type_map_registration(Request $request)
    // {
        
       // $data= Tbl_item_type_mapped::create($request->all());
        // if($data){
            // return "Send.......";
        // }
        // else{
            // return 'Failed..';
        // }
    // }

    // public function item_type_map_list()
    // {
      // return DB::table('vw_concept_dictionery')->get();

    // }


    // public function item_type_map_delete($id)
    // {

        // return Tbl_item_type_mapped::destroy($id);

    // }

    // public function item_type_map_update(Request $request)
    // {
        // $id=$request['id'];
        // return Tbl_item_type_mapped::where('id',$id)->update($request->all());
    // }
// }
