$(document).ready(function () {
    let origin = location.origin;
    $('.delete-coffee').click(function () {
        if (confirm('Bạn chắc chắn muốn xóa?')) {
            let idCoffee = $(this).attr('data-id');
            $.ajax({
                url: origin + '/coffees/' + idCoffee + '/destroy',
                method: 'GET',
                dataType: 'json',
                success: function (res) {
                    $('#coffee-' + idCoffee).remove();
                    $('#text-success').hide();
                    alert(res);
                },
                error: function (error) {
                }
            })
        }
    })
    $('#searchCoffees').click(function () {
        let upPrice = $('#upPrice').val();
        let toPrice = $('#toPrice').val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: origin + '/coffees/search',
            method: 'POST',
            data: {
                upPrice: upPrice,
                toPrice: toPrice,
            }, success: function (res) {
                console.log(res);
            },
            error: function (error) {
                console.log(error);
            }
        })
    })
});
