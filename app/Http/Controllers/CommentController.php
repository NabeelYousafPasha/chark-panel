<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Assessment;
use App\Models\Patient;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Patient $patient, Assessment $assessment)
    {
        $comments = Comment::where('assessment_id', '=', $assessment->id)
        ->where('patient_id', '=', $patient->id)
        ->latest()->get();

        return $this->renderView('dashboard.pages.comments.index', [
            'comments' => $comments,
            'assessment' => $assessment,
            'patient' => $patient,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Patient $patient, Assessment $assessment)
    {
        return $this->renderView('dashboard.pages.comments.form', [
            'assessment' => $assessment,
            'patient' => $patient
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Patient $patient,Assessment $assessment )
    {
        $this->validate($request, [
            'comment' => ['required', 'string', ],
        ]);

        $comment = Comment::create(array_merge($request->all(), [
            'created_by' => auth()->id(),
            'assessment_id' => $assessment->id,
            'patient_id' => $patient->id
        ]));

        (! $comment) ? $this->message('errorMessage') : $this->message('successMessage');

        return redirect()->route('dashboard.comment.index', ['patient' => $patient, 'assessment' => $assessment]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }
    protected function renderView($view, array $withParams = [])
    {

        $params = [
            'page' => 'Patient Comments',
            'resource' => 'Comments',
            'translationFromKey' => 'lang.models.comments.fillable',
            'crud' => [
                'CREATE_COMMENT' => [
        
                ],
                'EDIT_ASSESSMENT' => [
                    // 'route' => route('dashboard.assessment.edit.step', ['patient' => $patient, 'step' => 'step1']),
                    'can' => ! auth()->user()->cannot('update_assessment'),
                ],
                'DELETE_ASSESSMENT' => [
                    'can' => ! auth()->user()->cannot('delete_assessment'),
                ],
            ],
            'breadcrumbs' => array(
                [
                    'name' => 'Patients',
                    'route' => route('dashboard.patients.index'),
                    'active' => false,
                ],
                [
                    'name' => 'Assessment',
                    'route' => 'javascript:void(0)',
                    'active' => true,
                ],
            ),
        ];
        return parent::renderView($view, array_merge($withParams, $params));
    }
}
