<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\KeranjangModel;

class Header extends Component
{
    public function __construct()
    {
        $this->KeranjangModel = new KeranjangModel();
    }

    public function render()
    {
        $id_customer = optional( Auth()->user())->id;
        return view('livewire.header',[
            'total_keranjang' => $this->KeranjangModel->total_keranjang($id_customer),
        ]);
    }
}
