function getActualPrice() {
    var perc = $('#discountPerc').val();
            var prezzoIntero = $('#price').val();
            var prezzoEffettivo = ((1-perc/100)*prezzoIntero).toFixed(2);
            $('#prezzoeffettivo').text(prezzoEffettivo);
}
