$(function () {
  $('.cancel-modal-open').on('click', function () {
    $('.js-modal').fadeIn();
    var setting_reserve = $(this).attr('setting_reserve');
    var setting_part = $(this).attr('setting_part');
    var reserve_setting_id = $(this).attr('reserve_setting_id');
    $('.modal-inner-reserve').text(setting_reserve);
    $('.modal-inner-part').text(setting_part);
    $('.cancel-modal-hidden').val(reserve_setting_id);
    return false;
  });
  $('.js-modal-close').on('click', function () {
    $('.js-modal').fadeOut();
    return false;
  });

});
