
$(document).ready(function (){
    $('.add-to-cart-btn').on('click',function (event){
        event.preventDefault();
        $(event.target().closest('form'))
        let form = event.target().closest('form')
        console.log(form.serialize())
        $.ajax({
            url: 'http://laravel.test/add_to_cart',
            data: {id:10, name:'ololo'},
            type: 'POST',
            success:function (response){
                console.log()
            },
            error:function (request,status,error){
                alert('!!!!')
            },
            complete: function (data){
                alert("MMKLPL")
            }
        })
    })

})
