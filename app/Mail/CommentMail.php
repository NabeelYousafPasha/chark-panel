<?php

namespace App\Mail;

use App\Models\Assessment;
use App\Models\Comment;
use App\Models\Patient;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommentMail extends Mailable
{
    use Queueable, SerializesModels;

    public $comment;
    public $user;
    public $assessment;
    public $patient;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        Comment $comment,
        User $user,
        Assessment $assessment,
        Patient $patient
    )
    {
        $this->comment = $comment;
        $this->user = $user;
        $this->assessment = $assessment;
        $this->patient = $patient;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Treatment Plan")
            ->markdown('emails.comment.notify')
            ->with([
                'comment' => $this->comment,
                'user' => $this->user,
                'assessment' => $this->assessment,
                'patient' => $this->patient,
            ]);
    }
}
