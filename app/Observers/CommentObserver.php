<?php

namespace App\Observers;

use App\Mail\CommentMail;
use App\Models\Assessment;
use App\Models\Comment;
use App\Models\Patient;
use App\Notifications\CommentNotification;
use App\User;
use Illuminate\Support\Facades\Mail;

class CommentObserver
{
    /**
     * Handle the comment "created" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function created(Comment $comment)
    {
        $patient = Patient::find($comment->patient_id);
        $assessment = Assessment::find($comment->assessment_id);
        $user = User::find($patient->created_by);

        if ($patient) {
            Mail::to($user->email)
                ->send(new CommentMail($comment, $user, $assessment, $patient));
        }
    }

    /**
     * Handle the comment "updated" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function updated(Comment $comment)
    {
        //
    }

    /**
     * Handle the comment "deleted" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function deleted(Comment $comment)
    {
        //
    }

    /**
     * Handle the comment "restored" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function restored(Comment $comment)
    {
        //
    }

    /**
     * Handle the comment "force deleted" event.
     *
     * @param  \App\Models\Comment  $comment
     * @return void
     */
    public function forceDeleted(Comment $comment)
    {
        //
    }
}
