<?php

namespace App\Livewire;

use App\Models\Course as CourseModel;
use Livewire\Component;

class CoursesPage extends Component
{
    public function courses()
    {
        return CourseModel::where('status', 'published')->get();
    }
    public function render()
    {
        return view('livewire.courses-page',[
            'courses' => $this->courses(),
        ]);
    }
}
