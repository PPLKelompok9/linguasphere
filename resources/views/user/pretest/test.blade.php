@extends('user.layouts.layouts')
@section('content')
  <main class="py-[70px] flex items-center justify-center">
    <div class="border border-obito-grey bg-white rounded-[20px] p-[30px] w-[400px]">
    @if($current)
    <form method="POST" action="{{ route('pretest.test', [$slug, 'number' => $number]) }}"
      class="flex flex-col gap-[30px]">
      @csrf
      <input type="hidden" name="number" value="{{ $number }}">
      <div class="flex flex-col gap-[10px]">
      <div class="flex gap-[6px] w-full">
      <h1>{{ $number }}.</h1>
      <h1 class="mb-5">{{ $current['question'] }}</h1>
      </div>
      @foreach($current['choices'] as $choiceIndex => $choice)
      <div class="flex items-center gap-3 mb-2 border border-obito-grey p-4 rounded-lg">
      <input type="radio" name="answer" id="option{{ $choiceIndex }}" value="{{ $choice['value'] }}"
      class="form-radio h-5 w-5" required @if(isset($selected) && $selected == $choice['value']) checked @endif>
      <label for="option{{ $choiceIndex }}" class="text-sm">
      {{ chr(65 + $choiceIndex) }}. {{ $choice['text'] }}
      </label>
      </div>
    @endforeach
      </div>
      <div class="flex justify-between">
      <button type="submit" name="nav" value="back"
      class="px-4 py-2 {{ $number > 1 ? 'bg-gray-300' : 'bg-gray-200 cursor-not-allowed opacity-60' }}" {{ $number == 1 ? 'disabled' : '' }}>Back</button>
      @if($number < $total)
      <button type="submit" name="nav" value="next"
      class="px-4 py-2 bg-obito-green text-white rounded-lg">Next</button>
    @else
      <button type="submit" name="nav" value="finish"
      class="px-4 py-2 bg-obito-green text-white rounded-lg">Finish</button>
    @endif
      </div>
    </form>
    @else
    <p>Soal tidak ditemukan.</p>
    @endif
    </div>
  </main>
@endsection