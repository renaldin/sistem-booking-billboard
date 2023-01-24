<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\ModelOrder;
use Illuminate\Contracts\Session\Session;

class Order extends Controller
{

    private $ModelOrder;

    public function __construct()
    {
        $this->ModelOrder = new ModelOrder();
    }

    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('admin');
        }

        $orderTerakhir = $this->ModelOrder->dataOrderTerakhir();
        if ($orderTerakhir === null) {
            $num = 1;
        } else {
            $num = substr($orderTerakhir->id_pesanan, 1, strlen($orderTerakhir->id_pesanan));
            $num++;
        }

        if ($num < 10) {
            $id_pesanan = 'PO000' . $num;
        } else if ($num > 9 and $num < 100) {
            $id_pesanan = 'PO00' . $num;
        } else if ($num > 99 and $num < 1000) {
            $id_pesanan = 'PO0' . $num;
        } else {
            $id_pesanan = 'PO' . $num;
        }

        $data = [
            'title'     => 'Data Order',
            'subTitle'  => 'Kelola Order',
            'order'     => $this->ModelOrder->dataOrder(),
        ];

        return view('admin.order.dataOrder', $data);
    }
}
