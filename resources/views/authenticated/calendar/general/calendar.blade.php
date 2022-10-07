@extends('layouts.sidebar')

@section('content')
<div class="vh-100 pt-5" style="background:#ECF1F6;">
  <div class="border w-75 m-auto pt-5 pb-5" style="border-radius:5px; background:#FFF;">
    <div class="w-75 m-auto border" style="border-radius:5px;">

      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <div class="w-100 m-auto">
        {!! $calendar->render() !!}
      </div>
    </div>
    <div class="text-right w-75 m-auto">
      <input type="submit" class="btn btn-primary" value="予約する" form="reserveParts">
    </div>
  </div>
</div>
<div class="modal js-modal">
  <div class="modal__bg js-modal-close"></div>
  <div class="modal__content" style="width:40%;">
      <div class="w-100">
        <div>
        <label for="setting_reserve">予約日：<p class="modal-inner-reserve w-100" name="setting_reserve">
        </p></label>
       </div>
        <div>
        <label for="setting_part">時間：<p class="modal-inner-part w-100" name="setting_part">
        </p></label>
        </div>
        <p>上記の予約をキャンセルしてもよろしいですか？</p>
        <div class="w-100 m-auto cancel-modal-btn d-flex">
          <a class="js-modal-close btn btn-danger d-inline-block" href="">閉じる</a>
          <input type="hidden" class="cancel-modal-hidden" name="reserve_setting_id" value="" form="deleteParts">
          <input type="submit" class="btn btn-primary d-block" value="キャンセル" onclick="return confirm('キャンセルしてよろしいですか？')" form="deleteParts">
        </div>
      </div>
  </div>
</div>
@endsection
