
$(document).ready(function() {
    
    $("button").click(function() {
       
            var item = this.id;
            var data = {
              "action": item
            };
            data = $(this).serialize() + "&" + $.param(data);
           
            $.ajax({  
            type: 'get',  
            url: 'dataabaseInput.php',
            data: data,
            success: function(result) {
            alert(JSON.stringify(result));
            },
            error: function(result) {
                alert('error');
            }
            }); 
        
    });
    
});
