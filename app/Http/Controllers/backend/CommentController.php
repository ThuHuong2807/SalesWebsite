<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function GetComment()
    {
        return view('backend.comment.comment');
    }
    public function GetEditComment()
    {
        return view('backend.comment.editcomment');
    }
}
