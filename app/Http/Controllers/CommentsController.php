<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentsRequest;
use App\Models\{Pages, Cases, Comments};

class CommentsController extends Controller
{
    public function show($id, $type)
    {
        if ($type == 'page') {
            return $this->getPageComments($id);
        }
        if ($type == 'case') {
            return $this->getCaseComments($id);
        }

        return ;
    }

    private function getPageComments($id)
    {
        $page = Pages::with('comments')->findOrFail($id);

        return response()->json([
            'html' => view('comments.page', ['page' => $page])->render()
        ]);
    }
    private function getCaseComments($id)
    {
        $case = Cases::findOrFail($id);
        return response()->json([
            'html' => view('comments.case', ['case' => $case])->render()
        ]);
    }

    public function save(CommentsRequest $request)
    {
        try {
//            $comment = new Comments();
//            $comment->comment = $request->text_comment;
//            $comment->save();
            if ($request->get('type') == 'page')
                $morph = Pages::find($request->id);
            else
                $morph = Cases::find($request->id);

            $morph->comments()->create([
                'comment' => $request->text_comment
            ]);
//
//            $comment->morph()->associate($morph)->save();

//            $comment->page()->associate($morph)->save();

            return response()->json([
                'message' => 'Комментарий добавлен'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }
}
