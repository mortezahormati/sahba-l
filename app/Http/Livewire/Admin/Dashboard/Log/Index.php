<?php

namespace App\Http\Livewire\Admin\Dashboard\Log;

use App\Models\AiLogReport;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $paginationTheme = 'bootstrap';
    public AiLogReport $aiLogReport;
    public $readyToLoad = true;

    public $search;
    protected $queryString = ['search'];

    public function mount()
    {
        $this->aiLogReport = new AiLogReport();
    }

    public function loadAi(){
        $this->readyToLoad =true;
    }

    public function render()
    {
        $search =$this->search;
        $aiLogReportsCount = AiLogReport::all()->count();
        if($this->readyToLoad){
            $aiLogReports =AiLogReport::where('section' , 'LIKE' , "%{$search}%")
                ->orWhere('action' , 'LIKE' , "%{$search}%")
                ->orWhereHas('user' , function ($query) use ($search){
                    $query->where('name', 'LIKE', "%{$search}%");
                })
                ->latest()->paginate(config('services.paginate.table'));
        }else{
            $aiLogReports =[];
        }

        $data =[
          'aiLogReports' => $aiLogReports,
          'aiLogReportsCount' => $aiLogReportsCount,
        ];

        return view('livewire.admin.dashboard.log.index' , $data);
    }

    public function deleteAllAi()
    {
        \DB::table('ai_log_reports')->truncate();
        $this->emit('toast', 'success', __('admin.ai-log-reports.truncate'));
        return redirect(route('ai-log-report.index'));
    }





}
