<?php

namespace App\Mail;

use App\Models\Report;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReportsUsers extends Mailable
{
    use Queueable, SerializesModels;

    private $Report;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Report $report)
    {
        $this->Report = $report;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Mail.generalreports', [
            'Report' => $this->Report
        ]);
    }
}
