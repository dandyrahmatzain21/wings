<?php

namespace App\Http\Livewire;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\KeranjangModel;

class Nav extends Component
{
    public function __construct()
    {
        $this->KeranjangModel = new KeranjangModel();
    }

    public function render()
    {
        $id_customer = optional( Auth()->user())->id;
        return view('livewire.nav',[
            'total_keranjang' => $this->KeranjangModel->total_keranjang($id_customer),
        ]);
    }
}
