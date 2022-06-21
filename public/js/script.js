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
        let lineNew = '<li link_action_js="'+lin.id+'" link_action_js="'+lin.status+'" class="link_action_js"><div class="px-3 py-2 rounded-md dark:bg-transparent dark:text-slate-300  cursor-pointer border">'+lin.link+'</div></li>';
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
});