
function checkAll(idkbk){
    var c = $('[data-name="c'+idkbk+'"]');
    c.prop('checked', true);
}
function uncheckAll(idkbk){
    var c = $('[data-name="c'+idkbk+'"]');
    c.prop('checked', false);
}
function setAllCheckbox(idkbk) {
    var com = $('#ca'+idkbk);
    if(com.prop('checked')){
        checkAll(idkbk);
    }else{
        uncheckAll(idkbk);
    }
    //sumCheckedRow();
}
function setCheckAllButton(idkbk){
    var n=$('#baris').prop('value');
    var stat= true;
    for(index=0; index<n; index++){
        if(!$('[data-id="'+idkbk+index+'"]').prop('checked')){
            stat= false;
        }
    }
    $('#ca'+idkbk).prop('checked', stat);
}
