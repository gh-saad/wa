base_url = "http://localhost/wa/wa/public/";
jQuery(document).ready(function() {

    $(".chat-list a").click(function() {
        $(".chatbox").addClass('showbox');
        return false;
    });

    $(".chat-icon").click(function() {
        $(".chatbox").removeClass('showbox');
    });


});

jQuery(document).click(function() {
    to = ""
    body = ""
    $.ajax({
        url: base_url+"send",
        type: "post",
        data: {to: to, body: body},
        success: function (res) {
            res = JSON.parse(res);
            
            
        },
            error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
});
