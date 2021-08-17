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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index(Assessment $assessment)
    {
        $comments = Comment::where('assessment_id', '=', $assessment->id)
                    ->where('patient_id', '=', $assessment->patient_id)
                    ->latest()
                    ->get();

        return $this->renderView('dashboard.pages.comment.index', [
            'comments' => $comments,
            'assessment' => $assessment,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create(Assessment $assessment)
    {
        $form = $this->setForm(route('dashboard.comment.store', ['assessment' => $assessment,]), 'POST', 'dashboard.pages.comment._form', [
            'form_id' => 'create_form__comment',
            'form_name' => 'create_form__comment',
        ]);

        return $this->renderView('dashboard.pages.comment.form', [
            'assessment' => $assessment,
            'form' => $form,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request,Assessment $assessment )
    {
        $this->validate($request, [
            'comment' => ['required', 'string', ],
        ]);

        $comment = Comment::create(array_merge($request->all(), [
            'created_by' => auth()->id(),
            'assessment_id' => $assessment->id,
            'patient_id' => $assessment->patient_id
        ]));

        (! $comment) ? $this->message('errorMessage') : $this->message('successMessage');

        return redirect()->route('dashboard.comment.index', ['assessment' => $assessment]);
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


    /**
     * @param mixed $view
     * @param array $withParams
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function renderView($view, array $withParams = [])
    {
        $params = [
            'page' => 'Comments',
            'resource' => 'Comments',
            'translationFromKey' => 'lang.models.comments.fillable',
            'crud' => [
                'CREATE_COMMENT' => [
                    'can' => ! auth()->user()->cannot('create_comment'),
                ],
                'EDIT_ASSESSMENT' => [
                    'can' => ! auth()->user()->cannot('update_comment'),
                ],
                'DELETE_ASSESSMENT' => [
                    'can' => ! auth()->user()->cannot('delete_comment'),
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
                    'active' => false,
                ],
                [
                    'name' => 'Comments',
                    'route' => 'javascript:void(0)',
                    'active' => true,
                ],
            ),
        ];
        return parent::renderView($view, array_merge($withParams, $params));
    }
}
