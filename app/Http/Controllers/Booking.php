<?php

namespace App\Http\Controllers;

use App\Models\ModelReklame;
use App\Models\ModelUser;
use App\Models\ModelOrder;

class Booking extends Controller
{

    private $ModelReklame;
    private $ModelUser;
    private $ModelOrder;

    public function __construct()
    {
        $this->ModelReklame = new ModelReklame();
        $this->ModelUser = new ModelUser();
        $this->ModelOrder = new ModelOrder();
    }

    public function index()
    {
        if (!Session()->get('email')) {
            return redirect()->route('login');
        }

        $data = [
            'title'     => 'Data Booking',
            'booking'   => $this->ModelOrder->dataBooking(Session()->get('id_member'))
        ];

        return view('user.booking.dataBooking', $data);
    }
}
