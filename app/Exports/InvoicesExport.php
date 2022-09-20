<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
//use App\Models\TdlService\TdlLicense;
use DB;
//use Auth;

class InvoicesExport implements FromCollection, WithHeadings, ShouldAutoSize, WithColumnFormatting, WithEvents
{
    use Exportable;

    public function __construct($data)
    {
        $this->data     = $data;
    }

    public function collection()
    {
        // $data              = $this->data;
        // $name     =  isset($data['name']) ? $data['name'] : "";

        // $tdl_licenses = DB::table('tbl_sales')->get();
        // $tdl_licenses = TdlLicense::with(['tdlApplication', 'tdlApplication.tdlCategory', 'tdlApplication.regClients', 'tdlApplication.station', 'tdlApplication.tdlAttachment'])
        //     ->join('tdl_applications', 'tdl_applications.id', '=', 'tdl_licenses.application_id')
        //     ->join('tdl_categories', 'tdl_categories.id', '=', 'tdl_applications.category_id')
        //     ->join('reg_clients', 'reg_clients.id', '=', 'tdl_applications.client_id')
        //     ->join('stations', 'stations.id', '=', 'tdl_applications.station_id')
        //     ->select(
        //         'tdl_licenses.license_number as license_number',
        //         'reg_clients.name as client',
        //         'tdl_categories.tdl_category_name as category',
        //         'stations.name',
        //         'tdl_licenses.issued_date',
        //         'tdl_licenses.expired_date',
        //     )
        //     ->where('reg_clients.name', 'ILIKE', '%' . $name . '%')
        //     ->orderBy('license_number', 'desc');

        // return $tdl_licenses->get();

        $customer_data = DB::table('tbl_sales')->get();

        	// $customer_array[] = array('ID', 'Department');
        	// foreach($customer_data as $customer)
        	// {
        	//  $customer_array[] = array(
        	//   'ID'  => $customer->id,
        	//   'Department'   => $customer->department_name
        	//  );
        	// }

            return $customer_data;
    }

    // public function headings(): array
    // {

    //     return [
    //         'License Number',
    //         'Client',
    //         'Category',
    //         'Issued Station',
    //         'Issued Date',
    //         'Expired Date',
    //     ];
    // }

    // public function registerEvents(): array
    // {
    //     return [
    //         AfterSheet::class    => function (AfterSheet $event) {
    //             $cellRange = 'A1:F1';
    //             $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
    //         },
    //     ];
    // }

    // public function columnFormats(): array
    // {
    //     return [
    //         'F' => \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1
    //     ];
    // }
}