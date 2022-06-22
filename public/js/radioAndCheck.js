function check(formId, fieldName) {
    if ($('input[name=' + fieldName + ']:checked').length <= 0) {
        $('.errors').remove();
        $('table').after('<ul class="errors"><li> Selezionare un elemento</li></ul>');
        event.preventDefault();
    }
    else {
        $('#' + formId).submit();
    }
}


function searchList(searchText, actionUrl) {
    $.ajax({
        type: 'GET',
        url: actionUrl,
        data: {'search': searchText},
        dataType: "json",
        success: function(data){
            $('table').html(data);
        }
    });
}

