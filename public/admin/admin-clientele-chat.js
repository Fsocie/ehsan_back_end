$(document).ready(function(){

    function make_side_chatbox(client_id, client_name)
    {
        var box_content = '<div id="'+client_id+'" class="card-header msg_head"><div class="d-flex bd-highlight">'+
            '<div class="img_cont">'+
                '<img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img">'
                +'<span class="online_icon"></span>'+
                '</div><div class="user_info"><span>'+client_name+'</span><p>1767 Messages</p> </div>'+
            '<div class="video_cam"><span><i class="fas fa-video"></i></span><span><i class="fas fa-phone"></i></span></div></div><span id="action_menu_btn"><i class="fas fa-ellipsis-v"></i></span>'+
            '<div class="action_menu"><ul><li><i class="fas fa-user-circle"></i> View profile</li><li><i class="fas fa-users"></i> Add to close friends</li><li><i class="fas fa-plus"></i> Add to group</li><li><i class="fas fa-ban"></i> Block</li>'+
            '</ul> </div></div></div></div><div class="card-body msg_card_body" id="user_'+client_id+'" >'

            
            
            box_content +='</div><div class="card-footer"><div class="input-group"><div class="input-group-append"><span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span></div>'+
                '<textarea id="client_message_'+client_id+'" name="client_message_'+client_id+'" class="form-control type_msg" placeholder="Veuillez saisir votre message"></textarea><div class="input-group-append">'
                  +  ' <span id="'+client_id+'" class="input-group-text send_btn"><i class="fas fa-location-arrow"></i></span></div></div></div>';
             $('.side-box').html(box_content);
             fetch_chat_history(client_id);
            }

    function fetch_chat_history(client_id)
    {
        $.ajax({
            url:"/admin/messages/clientele/"+client_id,
            method:"GET",
            //data:{commande_id:commande_id},
            success:function(data){
                
                $('#user_'+client_id).html(data);
            }
            })
    
    }

    $(document).on('click','.send_btn',function(){
        var user_id = $(this).attr('id');
        var message = $('#client_message_'+user_id).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
           });
           $.post({
            url:"/propos/service_client/send/"+user_id,
            dataType: "json",
            data:{ contenu:message},
            success:function(response, textStatus, jqXHR)
            {
               
               $('textarea').val('');
               
               
            },
            error: function(msg){
                
            }
           })
    })
    
    $(document).on('click', '.chat_begin', function(){
        var user_id = $(this).data('userid');
        var nom = $(this).data('usernom');
        make_side_chatbox(user_id, nom);
        
        
        setTimeout(function(){ $( '.msg_card_body' ).scrollTop( 3500 ); }, 1500);
});
var pusher = new Pusher('710a42ce02a3f4836392');
var channel = pusher.subscribe('chat_client_channel');
channel.bind('chat_client', function(data) {

        var chatmess = '<div class="message-item">';
        var chatmess1 = '<div class="message-item user">';
        if(data.is_admin ==true && data.user_id == $('.msg_head').attr('id') )
        {
            chatmess = '<div class="d-flex justify-content-end mb-4"><div class="img_cont_msg"><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg"></div><div class="msg_cotainer">'+data.contenu+'</div></div>'
            $('#user_'+data.user_id).append(chatmess);    
        }
        if(data.is_admin== false &&  data.user_id == $('.msg_head').attr('id'))
        {
            chatmess = '<div class="d-flex justify-content-start mb-4"><div class="img_cont_msg"><img src="https://static.turbosquid.com/Preview/001292/481/WV/_D.jpg" class="rounded-circle user_img_msg"></div><div class="msg_cotainer">'+data.contenu+'</div></div>'
            $('#user_'+data.user_id).append(chatmess);
        }



        $('.input_send_holder').html('<input type = "submit" value = "Send" class = "btn btn-primary input_send" />');

         $(".msg_card_body").scrollTop($(".msg_card_body")[0].scrollHeight);
       /* $(".spinner-border").remove();*/
        $("html,body").animate({scrollTop: $('.msg_card_body .d-flex:last').offset().top - 30});
       /* $(".form-control").removeAttr('disabled');
        $('.form-control').attr('placeholder','Saisissez un message'); */

        });
});