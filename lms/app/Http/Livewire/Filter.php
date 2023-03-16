<?php

namespace App\Http\Livewire;

use App\Course;
use Livewire\Component;

class Filter extends Component
{

    public $count = 0;

    public function render()
    {
        return view('livewire.filter');
    }


    public function increment()
    {
        $this->count=1;
    }

    public function get_course(){
        // $this->id =$id;
        // $this->month_courses = Course::with('category')->where('category_id',$id);
    }
}

