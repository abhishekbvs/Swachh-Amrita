$(function(){
    $('#modalButton').click(function(){
        $('.modal').modal('show')
            .find('#modalContent')
            .load($(this).attr('value'));
    });
});

function sendCheckInRequest(status, id){
    $.ajax({
        url:'/event/checkin',
        method:'post',
        data:{status:status,id:id},
        success:function(data){
            alert(data);
        },
        error:function(jqXhr,status,error){
            alert(error);
        }
    });
}