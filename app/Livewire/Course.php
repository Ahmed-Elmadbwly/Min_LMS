<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Course as CourseModel;

class Course extends Component
{
    public function courses()
    {
        return CourseModel::where('status', 'published')->limit(6)->get();
    }
    public function render()
    {
        return view('livewire.course',['courses' => $this->courses()]);
    }
}
