$(document).ready(function() {
  class Tk{
    setTk(t=0){
      localStorage.setItem("tk", t);
    }
    getTk(){
      return localStorage.getItem("tk");
    }
  }

  let tkId = $('.tkidToken_JS').attr('tkid');
  var tkv = new Tk();

  if(tkId != null && tkId.length > 4 ){
    tkv.setTk(tkId);
  }

  function loadLinks(){
    $.ajax({
      url: "/api/listar_todos_os_links?Authorization=Bearer "+tkv.getTk(),
      type : 'get'
    })
    .done(function(msg){
      msg.map(function(lin){
        let lineNew = '<li class=""><div  link_action_js_id="'+lin.id+'" link_action_js_status="'+lin.status+'" class="px-3 py-2 rounded-md link_action_js_list_event dark:bg-transparent dark:text-slate-300  cursor-pointer border">'+lin.link+'</div></li>';
        $(".list_link_body").append(lineNew);
      });
    })
    .fail(function(jqXHR, textStatus, msg){
      console.log('Pedido falhou: '+ msg);
    });
  }

  loadLinks();

  $(document).on("click",".js_list_link_action_hidden",function() {
    $(".js_action_list_link").toggle();
  });
  
  $(document).on("click",".action_save_link_js",function() {
    $.ajax({
      url: "./api/cadastrar_link?Authorization=Bearer "+tkv.getTk(),
      type : 'post',
      data: {
        link: $(".input_action_save_link_js").val(),
        _token: $(".frame_input_action_save_link_js > input[name='_token']" ).val()
      },
      beforeSend : function(){
          console.log($(".frame_input_action_save_link_js > input[name='_token']" ).val());
      }
    })
    .done(function(msg){
      loadLinks();
    });
  });


  $(document).on("click",".close_js",function() {
    $(this).parent().addClass('off');
  });





  $(document).on("click",".link_action_js_list_event",function() {
    let link_action_js_get_id = $(this).attr('link_action_js_id');
    let link = $(this).html();


    $.ajax({
      url: "./api/listar_links_actions?Authorization=Bearer "+tkv.getTk(),
      type : 'post',
      data: {
        id_link: link_action_js_get_id,
        _token: $(".frame_input_action_save_link_js > input[name='_token']" ).val()
      }
    })
    .done(function(msg){
      $(".list_link_event_box").removeClass('off');
    
      $(".list_link_event_box  .js_url_name").html(link);
      $(".list_link_event_box  .list_link_event").html(' ');

      msg.map(function(lin){
        if(lin.error==200){
          $(".list_link_event_box  .list_link_event").append('<span><div  style="width: 1px; height: 20px; background: #10ff00; float:left; padding: 1px 1px; margin-right: 0px; border-right: solid 1px #fff;"> </div></span>');
        }else{
          $(".list_link_event_box  .list_link_event").append('<span><div  style=" height: 20px; background: #cb0303; float:left; padding: 1px 4px; margi-rightn: 0px; font-size: 10px; color: #fff;  border-right: solid 1px #fff;">'+lin.error+'</div></span>');
        }
      });      


    });















  });




});