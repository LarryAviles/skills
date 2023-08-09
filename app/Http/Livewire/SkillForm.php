<?php

namespace App\Http\Livewire;

use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class SkillForm extends Component
{

    use WithFileUploads;
    public $skill;
    public $skillId;
    public $name;
    public $percentage;
    public $color;
    public $img;
    public $public;
    public $showSaved = false;

    protected $rules = [
        'name' => 'required',
        'percentage' => 'required',
        'color' => 'required',
        'img' => 'image|max:2048',
    ];

    public function mount($skillId = null)
    {
        if ($skillId) {
            $skill = Skill::findOrFail($skillId);
            $this->skillId = $skillId;
            $this->name = $skill->name;
            $this->percentage = $skill->percentage;
            $this->color = $skill->color;
            $this->img = $skill->img;
            $this->public = $skill->public;
        }
    }

    public function save()
    {
        $this->validate();

        $data = [
            'user_id' => Auth::id(),
            'name' => $this->name,
            'percentage' => $this->percentage,
            'color' => $this->color,
            'img' => $this->img,
            'public' => $this->public,
        ];
        DB::transaction(function () use ($data) {

            if($this->img) {
                $imagePath = $this->img->store('skill_images', 'public');
                $data['img'] = $imagePath;
            }
            if ($this->skillId) {
                $this->skill->update($data);
            } else {
                Skill::create($data);
            }
        });

        $this->reset(['name','percentage','img','color','public']);
        return redirect()->route('dashboard');
    }
    public function render()
    {
        return view('livewire.skill-form');
    }
}
