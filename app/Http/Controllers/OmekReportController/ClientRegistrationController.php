<?php

namespace App\Http\Controllers\OmekReportController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Excel;
use PDF;

class ClientRegistrationController extends Controller
{
    //
    public function cliregistrationnreport(Request $request)
    {
        $datefrom=$request['datefrom'];
        $dateto=$request['dateto'];
		$facility_id=$request['facility_id'];

        return DB::table('tbl_sales')
        ->join('tbl_clients',"tbl_sales.client_id","=","tbl_clients.id")
        ->join('tbl_items',"tbl_sales.item_id","=","tbl_items.id")
        ->join('tbl_item_departments',"tbl_items.item_department_id","=","tbl_item_departments.id")
        ->select('tbl_sales.date_sold','tbl_sales.time_sold','tbl_clients.client_name','tbl_items.item_name',
        'tbl_item_departments.item_department','tbl_sales.sale_amount_total')
        ->where('tbl_sales.date_sold','>=',$datefrom)   
        ->where('tbl_sales.date_sold','<=',$dateto)          
		->where('tbl_sales.facility_id',$facility_id)
        ->get();    
	// 	 	->join('tbl_items',"tbl_sales.item_id","=","tbl_items.id")
	// 		->join('tbl_item_departments',"tbl_items.item_department_id","=","tbl_item_departments.id")
	// 	 	->select('tbl_sales.*','tbl_items.id as itemid','tbl_items.item_name',
	// 		'tbl_item_departments.id as itemdepartmentid','tbl_item_departments.item_department')
	// 	    ->where('tbl_sales.date_sold','>=',$datefrom)   
    //         ->where('tbl_sales.date_sold','<=',$dateto)          
	// 		->where('tbl_sales.facility_id',$facility_id)
	// 		//->groupBy('tbl_item_departments.id')
	// 	->get();

    }

    Public function downloadExcels()
	{
		
		$customer_data = DB::table('tbl_sales')->get()->toArray();

		$customer_array[] = array('ID', 'Department');
		foreach($customer_data as $customer)
		{
		 $customer_array[] = array(
		  'ID'  => $customer->id,
		  'Department'   => $customer->department_name
		 );
		
		 //return $customer_data;
		}
	//return $customer_array;
	return	Excel::create('Customer Data', function($excel) use ($customer_array){
			 $excel->setTitle('Customer Data');
			 $excel->sheet('Customer Data', function($sheet) use ($customer_array){
			  $sheet->fromArray($customer_array, null, 'A1', false, false);
			 });
			})->download('data.xlsx', \Maatwebsite\Excel\Excel::XLSX);

	}

	public function downloadExcel($type)  
    {  
        // $type;
		//return $type;
        //return $data = Item::get()->toArray(); 
        $data = DB::table('tbl_sales')->get()->toArray();
		//return $data; 
		foreach($data as $customer)
		{
		 $customer_array[] = array(
		  'ID'  => $customer->id,
		  'Department'   => $customer->department_name
		 );
		}
		//return $customer_array;
        return Excel::create('Customer_Dataa', function($excel) use ($customer_array) {  
            $excel->setTitle('Customer_Data');
            $excel->sheet('mySheet', function($sheet) use ($customer_array) 
            //$sheet->fromArray($customer_array, null, 'A1', false, false); 
            {  
            $sheet->fromArray($customer_array);  
            });  
        })->download($type); 
	}

	public function pdfview(Request $request)  
    {  
        $items = DB::table('tbl_sales')->get();
		//$items = DB::table("items")->get();  
        view()->share('items',$items);  
  
        if($request->has('download')){ 
		foreach($items as $customer)
		{
		 $pdf[] = array(
		  'ID'  => $customer->id,
		  'Department'   => $customer->department_name
		 );
		} 
            // $pdf = PDF::loadView('pdfview');  
            return $pdf->download('pdfview.pdf');  
        }  
  
        return view('pdf');  
    }  
		
	// 	Excel::create('Customer Data', function($excel) use ($customer_array){
	// 	 $excel->setTitle('Customer Data');
	// 	 $excel->sheet('Customer Data', function($sheet) use ($customer_array){
	// 	  $sheet->fromArray($customer_array, null, 'A1', false, false);
	// 	 });
	// 	})->download('data.xlsx', \Maatwebsite\Excel\Excel::XLSX);

	// 	//$data = Item::get()->toArray();
	// 	// $data = Tbl_client::get()->toArray();

	// 	// return Excel::create('onlinecode_example', function($excel) use ($data) {

	// 	// 	$excel->sheet('mySheet', function($sheet) use ($data)
	//     //     {
	// 	// 		$sheet->fromArray($data);
	//     //     });
	// 	// })->download($type);
	// }

	public function exportToExcel(Request $request)
    {
        $data = $request->all();
        //ob_end_clean();
        return (new InvoicesExport($data))->download('data_export.xlsx');
    }

}
