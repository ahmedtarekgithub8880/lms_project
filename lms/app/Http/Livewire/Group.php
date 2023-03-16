<?php

namespace App\Http\Livewire;

use App\GroupTime;
use Livewire\Component;
use TCG\Voyager\Models\DataType;

class Group extends Component
{
    public $group_day_time =[];
    public $dataTypeContent;

    public function mount(){
        $this->group_day_time=GroupTime::where('group_id',$this->dataTypeContent->id)->get();
    }

    public function updated(){
        $this->group_day_time=GroupTime::where('group_id',$this->dataTypeContent->id)->get();
    }


    public function remove($id)
    {

        GroupTime::where('id' , $id)->delete();
        $this->updated();

    }

    public function render()
    {
        return view('livewire.group',[
            'group_day_time'=>$this->group_day_time
        ]);
    }
}



