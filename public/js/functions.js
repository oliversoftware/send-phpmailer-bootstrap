
$(document).ready(function(){



    config.init();


})
var config=
{

    init:function() {
        $(document).on('click',".sendEmail",function() {config.onclickSendEmail()})

    },

    onclickSendEmail:function(){
        var url='http://localhost/enviarEmail/application/controllers/phpmailer.php';
        var name = $('#name').val();
        var email = $('#email').val();
        var subject = $('#subject').val();
        var message = $('#message').val();
        var mode = $('#mode').val();

        var params = {
            name: name,
            email: email,
            subject: subject,
            mode: mode,
            message: message
        }



        $.get(url,
            params,
            function (data) {

               $('#divExit').html(data)

            })




    }
}





