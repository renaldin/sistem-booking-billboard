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

        $data = [
            'title'     => 'Data Order',
            'subTitle'  => 'Kelola Order',
            'order'     => $this->ModelOrder->dataOrder(),
        ];

        return view('admin.order.dataOrder', $data);
    }
}
