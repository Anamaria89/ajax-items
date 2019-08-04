
<!DOCTYPE html>

<html>

<head>

    <title>Laravel 5.5 Ajax Request example</title>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>

<body>

    <div class="container">

        <h1>Laravel 5.5 Ajax Request example</h1>

        <div id="result"></div>

        <form >

            <div class="form-group">

                <label>Name:</label>

                <input type="text" name="name" class="form-control" placeholder="Name" required="">

            </div>

            <div class="form-group">

                <label>Password:</label>

                <input type="password" name="password" class="form-control" placeholder="Password" required="">

            </div>

            <div class="form-group">

                <strong>Email:</strong>

                <input type="email" name="email" class="form-control" placeholder="Email" required="">

            </div>

            <div class="form-group">

                <button class="btn btn-success btn-submit">Submit</button>

            </div>

        </form>

    </div>

</body>

<script type="text/javascript">

//     
//    $.ajaxSetup({
//
//        headers: {
//
//            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//
//        }
//
//    });
//
//
//
//    $(".btn-submit").click(function(e){
//
//        e.preventDefault();
//
//
//
//        var name = $("input[name=name]").val();
//
//        var password = $("input[name=password]").val();
//
//        var email = $("input[name=email]").val();
//
//
//
//        $.ajax({
//
//           type:'POST',
//
//           url:'/ajaxRequest',
//
//           data:{name:name, password:password, email:email},
//
//           success:function(data){
//
//              alert(data.success);
//              console.log()
//              
//           }
//
//        });
//
//
//
//	});
//        

</script>
<script type="text/javascript">
        $(document).ready(function(){
            getItems();
            
            $('#itemForm').on('submit', function(e){
                e.preventDefault();
               
//
//
//
       var name = $("input[name=name]").val();

        var password = $("input[name=password]").val();

        var email = $("input[name=email]").val();
                
                addItem(name, password, email);
                
            });
            
            $('body').on('click', '.deleteLink', function(e){
                e.preventDefault();
                
                let id = $(this).data('id');
                
                deleteItem(id);
            });
             function deleteItem(id){
                $.ajax({
                    method:'POST',
                    url: 'http://ajax.local/api/items/'+id,
                    data: {_method: 'DELETE'}
                }).done(function(item){
                    alert('Item Removed');
                    location.reload();
                });
            }
            
            function addItem(name, password, email){
                $.ajax({
                    method:'POST',
                    url:'/ajaxRequest',
                    data: {name: name, password: password, email: email}
                }).done(function(item){
                    alert('Item # '+item.id+' added');
                    location.reload();
                });
            }
            function getItems(){
                $.ajax({
                    url:'/ajaxRequest',
                }).done(function(items){
                    let output = '';
                    $.each(items, function(key, item){
                        output += `
                        <li class="list-group-item">
                            <strong>${item.text}</strong>${item.body} <a href="#" class="deleteLink" data-id="${item.id}">Delete</a>
                        </li>
                                `;
                    });
                    $('#items').append(output);
                    
                });
            }
        });
</script>
</html>