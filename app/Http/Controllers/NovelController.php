<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Novel;
use DB;

class NovelController extends Controller
{
    protected $successStatus = 200;

    //add Novel
    public function addNovel(Request $request){
        if($request->hasFile('novel_cover') && $request->hasFile('novel_story')){

            $user = App\User::find($request->id);

            $novel = new Novel();
            $destinationPath = 'StoryNovels';

            $novel->novel_title=$request->novel_title;
            
            $story = $request->file('novel_story');
            $file_name  = "story_"  . $request->novel_title  . '.' . $story->extension();
            $request->novel_story->move($destinationPath,$file_name);

            $image = $request->file('novel_cover');
            $img_name   = 'img_'    . $request->novel_title . '.' . $image->extension();
            $request->novel_cover->move($destinationPath,$img_name);

            $novel->novel_genre=$request->novel_genre;
            $novel->novel_synopsis=$request->novel_synopsis;
            $novel->novel_story=$file_name;
            $novel->novel_cover=$img_name;
            $novel->novel_status='true';

            $novel->save();

            return response()->json([
                'success' =>true,
                'message' => "Data Novel Tersimpan"
            ]);
        }else{
            return response()->json([
                'success' =>false,
                'message' => "Gagal Menyimpan"
            ],500);
        }
        
    }

    public function deleteNovel($id){
        $novel = new Novel();
        
        $novel=Novel::find($id);
        $novel->novel_status='false';
        $novel->save();

        return response()->json([
            'success' =>true,
            'message' => "Data Novel Telah Dihapus"
        ]);
    }

    public function selectNovel(){

        $novel=Novel::orderBy('updated_at','desc')->get();

        return response()->json(
            $novel, $this-> successStatus
        );

    }

    public function selectById($id){
        $novel = Novel::where('id', $id)->first();
        return response()->json($novel);
    }



}
