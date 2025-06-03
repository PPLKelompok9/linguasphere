<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Pretest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PretestController extends Controller
{
  public function index()
  {
    $courses = Course::all();
    $pretests = Pretest::where('id_user', auth()->id())->get()->keyBy('id_course');
    return view('user.pretest.index', compact('courses', 'pretests'));
  }

  public function showTest($slug, Request $request)
  {
    $allQuestions = [
      'paket-intensive-1-bulan' => [
        [
          'question' => 'What time ___ you usually wake up?',
          'choices' => [
            ['text' => 'do', 'value' => 1],
            ['text' => 'does', 'value' => 0],
            ['text' => 'are', 'value' => 0],
            ['text' => 'did', 'value' => 0],
          ],
        ],
        [
          'question' => 'I have been living in this city ___ 2018.',
          'choices' => [
            ['text' => 'since', 'value' => 1],
            ['text' => 'for', 'value' => 0],
            ['text' => 'at', 'value' => 0],
            ['text' => 'on', 'value' => 0],
          ],
        ],
        [
          'question' => 'If I ___ more time, I would travel the world.',
          'choices' => [
            ['text' => 'have', 'value' => 0],
            ['text' => 'had', 'value' => 1],
            ['text' => 'will have', 'value' => 0],
            ['text' => 'has', 'value' => 0],
          ],
        ],
        [
          'question' => 'Choose the correct passive voice: "She writes a letter."',
          'choices' => [
            ['text' => 'A letter writes she', 'value' => 0],
            ['text' => 'A letter is written by her', 'value' => 1],
            ['text' => 'A letter has written by her', 'value' => 0],
            ['text' => 'A letter is wrote by her', 'value' => 0],
          ],
        ],
        [
          'question' => 'Which sentence is grammatically correct?',
          'choices' => [
            ['text' => 'He don’t like coffee', 'value' => 0],
            ['text' => 'He doesn’t likes coffee', 'value' => 0],
            ['text' => 'He doesn’t like coffee', 'value' => 1],
            ['text' => 'He isn’t likes coffee', 'value' => 0],
          ],
        ],
        [
          'question' => 'The synonym of the word “enormous” is:',
          'choices' => [
            ['text' => 'tiny', 'value' => 0],
            ['text' => 'fast', 'value' => 0],
            ['text' => 'huge', 'value' => 1],
            ['text' => 'little', 'value' => 0],
          ],
        ],
        [
          'question' => 'I enjoy ___ to music while studying.',
          'choices' => [
            ['text' => 'listen', 'value' => 0],
            ['text' => 'listened', 'value' => 0],
            ['text' => 'listening', 'value' => 1],
            ['text' => 'listens', 'value' => 0],
          ],
        ],
        [
          'question' => 'Which one is a formal way to say "give me your response"?',
          'choices' => [
            ['text' => 'Hit me up', 'value' => 0],
            ['text' => 'Let me know', 'value' => 0],
            ['text' => 'Send me your reply', 'value' => 1],
            ['text' => 'Gimme a word', 'value' => 0],
          ],
        ],
        [
          'question' => 'The report ___ by the manager tomorrow.',
          'choices' => [
            ['text' => 'is written', 'value' => 0],
            ['text' => 'was written', 'value' => 0],
            ['text' => 'will be written', 'value' => 1],
            ['text' => 'has written', 'value' => 0],
          ],
        ],
        [
          'question' => 'She speaks English more ___ than her brother.',
          'choices' => [
            ['text' => 'fluently', 'value' => 1],
            ['text' => 'fluent', 'value' => 0],
            ['text' => 'more fluent', 'value' => 0],
            ['text' => 'most fluent', 'value' => 0],
          ],
        ],
      ],
    ];

    $questions = $allQuestions[$slug] ?? [];
    $total = count($questions);
    $number = (int) $request->input('number', 1);

    if ($request->isMethod('post') && $request->has('answer')) {
      $answers = session('pretest_answers', []);
      $answers[$number] = $request->input('answer');
      session(['pretest_answers' => $answers]);
    } else {
      $answers = session('pretest_answers', []);
    }

    $nav = $request->input('nav');
    if ($nav === 'back' && $number > 1) {
      $number--;
    } elseif ($nav === 'next' && $number < $total) {
      $number++;
    } elseif ($nav === 'finish') {

      $course = Course::where('slug', $slug)->first();
      $pretest = Pretest::where('id_user', Auth::id())
        ->where('id_course', $course ? $course->id : null)
        ->first();

      $answers = session('pretest_answers', []);
      $score = 0;

      // Hitung skor (misal: 1 poin untuk jawaban benar)
      foreach ($answers as $idx => $ans) {
        if (isset($questions[$idx - 1])) {
          foreach ($questions[$idx - 1]['choices'] as $choice) {
            if ($choice['value'] == $ans && $choice['value'] == 1) {
              $score++;
            }
          }
        }
      }

      $data = [
        'skor' => $score,
        'id_user' => Auth::id(),
        'id_course' => $course ? $course->id : null,
      ];

      if ($pretest) {
        $pretest->update($data);
      } else {
        Pretest::create($data);
      }

      session()->forget('pretest_answers');

      if ($score <= 4) {
        $level = 'Pemula';
      } elseif ($score <= 7) {
        $level = 'Menengah';
      } else {
        $level = 'Professional';
      }

      $message = "Anda sudah menyelesaikan pretest $course->name . Dari hasil pretest yang Anda kerjakan, Anda berada di tingkat $level dengan skor $score.";

      return redirect()->route('pretest')->with('alert', $message);
    }

    $current = $questions[$number - 1] ?? null;
    $selected = $answers[$number] ?? null;

    return view('user.pretest.test', compact('current', 'number', 'total', 'slug', 'selected'));
  }
}
