<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Sub_category;
use Livewire\Component;

class Filter extends Component
{
    public $selectedClass = null;
    public $selectedCategory = null;
   

    public $class = null;
    public $categories = null;
    public $subCategories =null;

    public function render()
    {
        return view('livewire.filter');
    }

    public function updatedSelectedClass($class){

        $this->categories =Category::where('class',$class)->get();
        
    }
    public function updatedSelectedCategory($categories){
        $this->subCategories = Sub_category::where('sub_categories_class',$this->selectedClass)->where('sub_categories_category_code',$categories)->get();
        
    }
}
