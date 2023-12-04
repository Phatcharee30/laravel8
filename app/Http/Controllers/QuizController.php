<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function question( )
    {
    $questions = json_decode(file_get_contents("https://raw.githubusercontent.com/arc6828/cs/master/json/sci-mbti.json"));    
    return view("study/question", compact('questions'));
    }
    public function match( ){
    $summary = [ "CS" => 0, "IT" => 0, "DISE" => 0, "HE" => 0, "NU" => 0, "FB" => 0, "SET" => 0, "OHS" => 0 ];
    $majors = [
    "CS" => "วิทยาการคอมพิวเตอร์ (CS)",        
    "IT" => "เทคโนโลยีสารสนเทศ (IT)",
    "DISE" => "นวัตกรรมดิจิทัลและวิศวกรรมซอฟต์แวร์ (DISE)",
    "HE" => "คหกรรมศาสตร์ (HE)",
    "NU" => "โภชนาการและการกำหนดอาหาร (NU)",
    "FB" => "นวัตกรรมอาหารและเครื่องดื่มเพื่อสุขภาพ (FB)",
    "SET" => "วิทยาศาสตร์และเทคโนโลยีสิ่งแวดล้อม (SET)",
    "OHS" => "อาชีวอนามัยและความปลอดภัย (OHS)",
   ];
    foreach ($_POST as $key => $value) {
    if(!str_contains($key, "flexRadioDefault")) continue;
    [$code, $answer] = explode("-", $value);
    if ($answer == "yes") {            // if-yes
    $summary[$code] = isset($summary[$code]) ? $summary[$code] + 1 : 1;
    } else {            // if-no
    $summary[$code] = isset($summary[$code]) ? $summary[$code] + 0 : 0;
    }
   }
    $codes = array_keys($summary);
    $values = array_values($summary);

  return view("study/match", compact('codes','values','majors'));
    }
    //
}
