<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{

    public function render()
    {
        $jumlah = 0;
       $data = [
            'jumlah_pesanan' => $this->$jumlah,
       ];
        return view('livewire\counter',$data);
    }
}
