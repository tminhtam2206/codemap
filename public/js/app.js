function fhover(id){
    $('.card-'+id).hover(function(){
        $('.show-'+id).addClass('show-frame');
    }, function(){
        $('.show-'+id).removeClass('show-frame');
    });
}