<?php

namespace App\Exports;
use App\Models\BillDetail;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class BillExport implements FromCollection,WithHeadings
{
    public $id;

    public function __construct( $id)
    {
        $this->id =  $id;
    }
    
    public function collection()
    {
        $mang = BillDetail::Where('id_restaurant',$this->id)->select('id_bill')->groupByRaw('id_bill')->get()->toArray();
        $bill_details = BillDetail::Where('id_restaurant',$this->id)->get(); 
        
        $join = DB::table('bill')
                ->join('customer','bill.id_customer','=','customer.id')
                ->join('bill_detail','bill.id','=','bill_detail.id_bill')
                ->where('bill_detail.id_restaurant',$this->id)
                ->select('bill.id','customer.name','bill_detail.sum','bill.created_at', 'customer.phone','customer.address', 'bill.status')  
                ->wherein('bill.id',$mang)
                ->get();

        return $join;

    }

    public function headings() :array 
    {
        return [
            'Mã hóa đơn',
            'Tên khách hàng',
            'Tổng tiền (VNĐ)',
            'Ngày đặt hàng',
            'Số điện thoại',
            'Địa chỉ',
            'Trạng thái(1: Đã giao)',
        ];
    }


}
