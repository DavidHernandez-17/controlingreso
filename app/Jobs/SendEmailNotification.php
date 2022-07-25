<?php

namespace App\Jobs;

use App\Mail\ControlIngresoAA;
use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    
    protected $report;

    public function __construct(Report $report)
    {
        $this->report = $report; 
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $report = $this->report;
        $email = new ControlIngresoAA($report);
        Mail::to($this->report['email'])->send($email);
    }
}
