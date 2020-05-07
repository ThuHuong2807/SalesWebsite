<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\{question};

class QuestionController extends Controller
{
    public function GetQuestion()
    {
        $data['questions']=question::all();
        return view('backend.question.question',$data);
    }
    public function PostQuestion(request $request)
    {
        $question=new question;
        $question->user_question_name=$request->user_question_name;
        $question->user_question_email=$request->user_question_email;
        $question->user_question_describe=$request->user_question_describe;
        $question->user_question_content=$request->user_question_content;
        $question->save();
        return  redirect()->back()->with('thongbao','Cảm Ơn Bạn Đã Quan Tâm, Chúng Tôi Sẽ Liên Hệ Lại Bạn Sớm Nhất Có Thể, Hân Hạnh Được Phục Vụ Quý Khách');
    }
    public function DeleteQuestion($user_question_id)
    {
        question::destroy($user_question_id);
        return redirect()->back()->with('thongbao','Đã xóa Thành công');
    }
}
