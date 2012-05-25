$(document).ready( markInit );

function markInit(){
    $('.btn-success').live( 'click', clickYes );
    $('.btn-danger').live( 'click', clickNo );
    
    $('.part_title').live( 'click', toggleContent );
    

}

function toggleContent(){
    var el = $(this);
    el.parent().find('.part_content').slideToggle();
}

function clickYes(){
    var el = $(this);
    sendAnswer( el, 1 );
}

function clickNo(){
    var el = $(this);
    sendAnswer( el, 0 );
}

function sendAnswer( el, response ){
    
    var u_id = el.data( 'user_id' );
    var a_id = el.data( 'answer_id' );
    var s_id = el.data( 'scheme_id' );
    
    $.ajax({
        url: 'mark/savemark',
        type: 'POST',
        dataType: 'json',
        data: { u_id: u_id, a_id: a_id, s_id: s_id, response: response }        
    }).done( function(data){
        
        el.closest('.part_content').html(data.html);
        
        if( data.finished ){
            window.location.reload();
        }
    }).error( function(){
        el.closest( '.part_content').fadeIn();
    });
}