$(document).ready(function(){

    fetch_commande_main_notifications();
    get_header_notifications();
    get_header_commande_notification();
    count_not_read_services_clientele_messages();

     
     var cmd_ids = $('tbody tr');
       
       

    function count_not_read_services_clientele_messages()
    {
      $.ajax({
        url: "/admin/notifications/sidebar/services-clientele/messages-non-lus" ,
        method:"GET",
        success:function(data){
        /*$('#user_details').html(data);*/
          
          if(data!=0)
          {
            $( "span.right.badge.badge-danger.messages" ).replaceWith('<span class=\" right badge badge-danger messages\">'+data+'</span>"');    
          }
          
          
        } 
        })

    }

    function fetch_commande_main_notifications()
    {
        $.ajax({
        url: "/admin/notifications/commandes" ,
        method:"GET",
        success:function(data){
        /*$('#user_details').html(data);*/
          
          if(data==0)
          {
            $( "span.right.badge.badge-danger.commandes" ).remove();    
          }
          else{
            $( "span.right.badge.badge-danger.commandes" ).replaceWith( "<span class=\" right badge badge-danger commandes\">"+data+"</span>" ); 
            }
          
        } 
        })
    }
            
       

        function get_header_notifications(){

      
          $.get({
            url: "/admin/notifications/header/messages" ,
            success: function(data){
              var nombre_notifications =0;  
              
              $('div.commande-messages').html(data)
              var select = $('.commande-messages .dropdown-item')
               nombre_notifications = select.length;
               
               $('.chat').html(nombre_notifications);

            },
            error: function(msg) {

            }
        })
        }

        function get_header_commande_notification()
        {
          $.get({
            url: "/admin/notifications/header/commandes" ,
            success: function(data){
              var nombre_notifications =0;  
              
              $('div.commande-clientele .content').html(data)
              var select = $('.content .dropdown-item')
               nombre_notifications = select.length;
               
               if(nombre_notifications != 0)
               {
                $('.commande-notification').html(nombre_notifications);
                $('.commande-clientele .dropdown-header').html(nombre_notifications+' notifications')
               }
               if(nombre_notifications==0)
               {
                $('.commande-clientele .dropdown-header').html(' Aucune notification')
                $('.dropdown-footer').html('Aucune notification');
               }
                
               
            },
            error: function(msg) {

            }
           })
        }

        function get_messages_not_read(id){
             
          $.get({
            url: "/admin/notifications/commandes/"+id+"/messages-non-lus" ,
            success: function(data){
              
              
             
              //$('#'+data.commande_id).append('<span class="badge badge-warning navbar-badge">'+data.messages_non_lus+'</span>')
             
               $('#'+data.commande_id+' .badge').remove();
              if(data.messages_non_lus != 0){
                $('tr[data-commandeid ='+data.commande_id+']'+' .start_chat').append('<span class="badge badge-warning navbar-badge">'+data.messages_non_lus+'</span>')
              }
              
              
            },
           error: function(msg) {

           }
          })


        }



   

    });
    var pusher = new Pusher('710a42ce02a3f4836392');
    //var channel = pusher.subscribe('notification_channel');
    