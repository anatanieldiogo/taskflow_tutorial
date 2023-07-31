$(window).on('load', function () {
    getList()
});

/**LIST START */
function getList(){

}

function renderListFromTaskInfo(list){
    var render = `
    <option value="${list.id}">${list.list_name}</option>
    `
    return render
}

function renderList(list){
    var render = `
        <li><a href="/list/${list.id}" class="click">
            <div class="aside-list-color" style="background-color:${list.list_color};"></div> ${list.list_name} <span>${list.tasks_count}</span>
        </a></li>
    `
    return render
}

function renderLoadList(){
    var render = `
        <li class="load-list">Loading...</li>
    `
    return render
}
/**LIST END */

/** CREATE LIST */
$('#showe-list-form').click(function (e) { 
    e.preventDefault();
    $('.list-form').toggle();
    $('#list_name').focus();
});

$('#list_name').keypress(function(event) {
    if (event.which == 13) {
        event.preventDefault();

        if($(this).val() != ''){
            $('#store_list_form').submit()
            $(this).val('')
        }else{
            event.preventDefault();
        }
    }
});

$('#store_list_form').on('submit', function (e) {
    e.preventDefault();

});

/**PUT COLOR ON LIST BUTTON */
var colorsButtons = document.querySelectorAll('.list-form-list-color label');
$(colorsButtons[0]).css('border-color', 'var(--text-color)')

$.each(colorsButtons, function (indexInArray, valueOfElement) {
     $(valueOfElement).css('background-color', $(valueOfElement).attr('data-color'));

     $(valueOfElement).click(function (e) {

        $(".list-form-list-color label").css('border-color', '')

        if( $(this).is(':checked') ){
            $(this).css('border-color', '')
        }
        else{
            $(this).css('border-color', 'var(--text-color)')
        }
        
     });
});