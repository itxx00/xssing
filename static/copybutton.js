var client = new ZeroClipboard( document.getElementById("copy-button") );

client.on( "ready", function( readyEvent ) {
  client.on( "aftercopy", function( event ) {
    event.target.disabled = "disabled";
    $(event.target).attr('data-original-title', "已复制到剪贴板").tooltip('show');
    });
});

$(document).ready(function(){
    $('[rel="tooltip"]').tooltip();
    $('#copy-button').on('blur',function(){
        $(this).attr('data-original-title', "点击以复制");
    });
});
