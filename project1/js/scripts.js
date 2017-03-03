var res= {
    loader : $('<div />',{class: 'loader'}),
    container: $('.container')
}

function post(){
    $.ajax({
        url : 'v2.php',
        beforeSend :function(){
            res.container.append(res.loader);
        },
        success: function(data){
            res.container.html(data);
            res.container.find(res.loader).remove();
        }
    });
    
};