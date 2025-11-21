<?php

namespace App\Livewire;

use App\Models\Course as CourseModel;
use App\Models\Level;
use Livewire\Component;

class CoursesPage extends Component
{
    public $search = '';
    public $level = '';
    public $courses = [];
    public $levels = [];
    public function mount()
    {
        $this->courses = CourseModel::where('status', 'published')->get();
        $this->levels = Level::get();
    }

    public function updatedSearch()
    {
        $this->courses = CourseModel::where('status', 'published')
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->get();
    }

    public function updatedLevel()
    {
        $this->levels = Level::when($this->level, function ($query) {
            $query->where('name', 'like', '%' . $this->level . '%');
        })->get();
    }

    public function filterByLevel($levelId)
    {
        $this->courses = CourseModel::where('status', 'published')
            ->where('level_id', $levelId)->get();
    }

    public function resetFilters()
    {
        $this->level = '';
        $this->courses = CourseModel::where('status', 'published')->get();
    }

    public function render()
    {
        return view('livewire.courses-page', [
            'courses' => $this->courses,
            'levels' => $this->levels
        ]);
    }
}
