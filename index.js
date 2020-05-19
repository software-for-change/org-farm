// functionality to create a dynamic select button for user to enter the number of food types they have.
function makeRow() {
    var div = document.createElement('div'),
        input = document.createElement('input'),
        a = document.createElement('a'),
        t = document.createTextNode('remove');
    div.className = 'line';
    input.type = 'text';
    a.href = '#';
    a.className = 'remScnt';
    a.appendChild(t);
    div.appendChild(input);
    div.insertBefore(a, input.nextSibling);

    return div;
}


$('#inputs').change(

function() {
    var num = $(this).val(),
        cur = $('div.line input:text'),
        curL = cur.length;
    if (!curL) {
        for (var i = 1; i <= num; i++) {

            $(makeRow()).appendTo($('body'));
        }
    }
    else if (num < curL) {
        var filled = cur.filter(

        function() {
            return $(this).val().length
        }),
            empties = curL - filled.length,
            dA = curL - num;

        if (empties >= num) {
            cur.filter(

            function() {
                return !$(this).val().length
            }).parent().slice(-num).remove();
        }
        else if (empties < num) {
            var remainder = num - empties;
            cur.filter(

            function() {
                return !$(this).val().length
            }).parent().slice(-num).remove();
            $('div.line').slice(-remainder).remove();
        }
    }
    else {
        var diff = num - curL;
        for (var i = 0; i < diff; i++) {
            $(makeRow()).appendTo($('body'));
        }
    }
});
$('body').on('click', '.line a.remScnt', function() {
    console.log($(this));
    $(this).parent().remove();
});