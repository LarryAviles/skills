<?php

namespace App\Http\Livewire;

use App\Models\Skill;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use function Symfony\Component\Translation\t;

class Skills extends Component
{
    public $search = '';
    public $showDeleted = false;
    protected $queryString = [
        'search' => ['except' => '']
    ];
    public function render()
    {
        $skills = Skill::where('name', 'like', "%{$this->search}%")->paginate(5);
        return view('livewire.skills')->with([
            'skills' => $skills
        ]);
    }

    public function delete(Skill $skill)
    {
        $skill->delete();
        return redirect()->to('dashboard');
    }
}
