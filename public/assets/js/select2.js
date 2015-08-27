$('.select2').each(function () {
  var $select = $(this);

  var currentValue = $select.val();
  var value = $select.data('value');
  var url = $select.data('ajax--url');

  if (url && value && !currentValue) {
    var request = $.ajax({
      url: url + '/init',
      data: {
        value: value
      }
    });

    request.then(function (response) {
      _.each(response.results, function (result) {
        console.log(result);

        var $option = $('<option>')
          .attr('value', result.id)
          .text(result.text)
          .prop('selected', true);

        $select.prepend($option);

        initSelect2($select);
      });
    });

  } else {
    initSelect2($select);
  }

  function initSelect2($select) {
    $select.select2({
      theme: 'bootstrap'
    });
  }
});
