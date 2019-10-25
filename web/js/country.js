'use strict';

$().ready(function () {
  $('.picker-countries').on('change', function () {
    let selectedOption = $(this).find("option:selected");
    selectedOption.attr('disabled','disabled').siblings().removeAttr('disabled');

    $.ajax({
      url: yii.getCurrentUrl() + '/sample',
      type: "GET",
      data :{ id: selectedOption.attr('value')},
      success: function(data){
        $('.cities').css('display', 'block');
        $('.cities__title').html(data.countryTitle);

        $('.cities__content').empty();
        data.search.forEach((e) => $('.cities__content').append('<li class="cities__item">' + e.title + '</li>'));
      },
      error: function(XMLHttpRequest, textStatus, errorThrown){
        console.log(XMLHttpRequest, textStatus, errorThrown);
      },
    });
  });
});
